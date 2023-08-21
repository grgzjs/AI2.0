<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <title>AIS Plane Config</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
</head>

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<!-- <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/app.js" type="text/javascript"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="assets/js/login-check.js" type="text/javascript"></script>
<script src="assets/js/user-validation.js" type="text/javascript"></script>

<body>
  <?php require_once("nav_header.html") ?>
  <div class="mai-wrapper">
    <?php require_once("nav_header2.html"); ?>

    <!--FINAL DE BOTONERA-->

    <div class="main-content container">


      <?php
      $sqllist = "select * from Aircraft";
      $rows = mysqli_query($con, $sqllist);
      $target_dir = "assets/img/aircraft_uploads/";

      if (isset($_GET['aksi']) == 'delete') {
        $nik = mysqli_real_escape_string($con, (strip_tags($_GET["nik"], ENT_QUOTES)));
        $sql_delete = "DELETE from Aircraft WHERE matricula='" . $nik . "'";
        echo '<script>console.log("' . $sql_delete . '")</script>';
        $delete = mysqli_query($con, $sql_delete);
        if ($delete) {
          echo '<script type="text/javascript">',
          'window.location.href="aircraft_setup.php";',
          '</script>';

          // echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
        } else {
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error! Esta aeronave tiene vuelos programados.</div>';
        }
      }

      echo '<script>console.log("antes")</script>';
      if (isset($_POST['save'])) {
        $matricula       = mysqli_real_escape_string($con, (strip_tags($_POST["matricula"], ENT_QUOTES))); //Escanpando caracteres
        $aeronave       = mysqli_real_escape_string($con, (strip_tags($_POST["aeronave"], ENT_QUOTES))); //Escanpando caracteres
        $fabricacion       = mysqli_real_escape_string($con, (strip_tags($_POST["fabricacion"], ENT_QUOTES))); //Escanpando caracteres
        $capacidad       = mysqli_real_escape_string($con, (strip_tags($_POST["capacidad"], ENT_QUOTES))); //Escanpando caracteres  
        $cruisespeed       = mysqli_real_escape_string($con, (strip_tags($_POST["cruisespeed"], ENT_QUOTES))); //Escanpando caracteres
        // $preciokm         = mysqli_real_escape_string($con, (strip_tags($_POST["preciokm"], ENT_QUOTES))); //Escanpando caracteres
        $precioh = mysqli_real_escape_string($con, (strip_tags($_POST["precioh"], ENT_QUOTES)));
        $pesomaximo       = mysqli_real_escape_string($con, (strip_tags($_POST["pesomaximo"], ENT_QUOTES))); //Escanpando caracteres
        $ascentspeed     = mysqli_real_escape_string($con, (strip_tags($_POST["ascentspeed"], ENT_QUOTES))); //Escanpando caracteres
        $fuelstop     = mysqli_real_escape_string($con, (strip_tags($_POST["fuelstop"], ENT_QUOTES))); //Escanpando caracteres
        $distancia    = mysqli_real_escape_string($con, (strip_tags($_POST["distancia"], ENT_QUOTES))); //Escanpando caracteres
        $pernocta    = mysqli_real_escape_string($con, (strip_tags($_POST["pernocta"], ENT_QUOTES))); //Escanpando caracteres
        $descentspeed    = mysqli_real_escape_string($con, (strip_tags($_POST["descentspeed"], ENT_QUOTES))); //Escanpando caracteres

        if($matricula){
          $total = count(array_filter($_FILES['imagen']['name']));
          //echo "<script>console.log('Total: $total')</script>";
          for($i=0;$i < $total;$i++) {
            //echo $_FILES["imagen"]["name"][$i];
            $target_file = $target_dir . basename($_FILES["imagen"]["name"][$i]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["imagen"]["tmp_name"][$i]);
            if($check !== false) {
              //echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            } else {
              //echo "File is not an image.";
              $uploadOk = 0;
            }

            if (file_exists($target_file)) {
              //echo "Sorry, file already exists.";
              $uploadOk = 0;
            }

            if ($_FILES["imagen"]["size"][$i] > 50000000) {
              //echo "Sorry, your file is too large.";
              $uploadOk = 0;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
              //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
            }

            if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
            } else {
              if (move_uploaded_file($_FILES["imagen"]["tmp_name"][$i], $target_file)) {
                mysqli_query($con,"INSERT INTO `aircraft_img` (`matricula`, `img_dir`) VALUES ('$matricula', '$target_file');");
                //echo "The file ". htmlspecialchars( basename( $_FILES["imagen"]["name"])). " has been uploaded.";
              } else {
                //echo "Sorry, there was an error uploading your file.";
              }
            }
          }
        }
        
        if ($matricula) {
          // $sql = "update Aircraft set matricula='$matricula',aeronave='$aeronave',fabricacion='$fabricacion',capacidad='$capacidad',cruisespeed='$cruisespeed',preciokm='$preciokm',pesomaximo='$pesomaximo',ascentspeed='$ascentspeed',fuelstop='$fuelstop',distancia='$distancia',pernocta='$pernocta',descentspeed='$descentspeed' where matricula='$matricula'";
          $sql = "update Aircraft set matricula='$matricula',aeronave='$aeronave',fabricacion='$fabricacion',capacidad='$capacidad',cruisespeed='$cruisespeed',precioh='$precioh',pesomaximo='$pesomaximo',ascentspeed='$ascentspeed',fuelstop='$fuelstop',distancia='$distancia',pernocta='$pernocta',descentspeed='$descentspeed' where matricula='$matricula'";
        } else {
          // $sql = "insert into Aircraft (matricula,aeronave,fabricacion,capacidad,cruisespeed,preciokm,pesomaximo,ascentspeed,fuelstop,distancia,pernocta,descentspeed) Values ('$matricula','$aeronave','$fabricacion','$capacidad','$cruisespeed','$preciokm','$pesomaximo','$ascentspeed','$fuelstop','$distancia','$pernocta','$descentspeed')";
          $sql = "insert into Aircraft (matricula,aeronave,fabricacion,capacidad,cruisespeed,precioh,pesomaximo,ascentspeed,fuelstop,distancia,pernocta,descentspeed) Values ('$matricula','$aeronave','$fabricacion','$capacidad','$cruisespeed','$precioh','$pesomaximo','$ascentspeed','$fuelstop','$distancia','$pernocta','$descentspeed')";
        }

        echo '<script>console.log("' . $sql . '")</script>';
        $update = mysqli_query($con, $sql);

        echo '<script>console.log("update1: ' . $update . '")</script>';

        if ($update == 1) {
          // $sql = "insert into Aircraft (matricula,aeronave,fabricacion,capacidad,cruisespeed,preciokm,pesomaximo,ascentspeed,fuelstop,distancia,pernocta,descentspeed) Values ('$matricula','$aeronave','$fabricacion','$capacidad','$cruisespeed','$preciokm','$pesomaximo','$ascentspeed','$fuelstop','$distancia','$pernocta','$descentspeed')";
          $sql = "insert into Aircraft (matricula,aeronave,fabricacion,capacidad,cruisespeed,precioh,pesomaximo,ascentspeed,fuelstop,distancia,pernocta,descentspeed) Values ('$matricula','$aeronave','$fabricacion','$capacidad','$cruisespeed','$precioh','$pesomaximo','$ascentspeed','$fuelstop','$distancia','$pernocta','$descentspeed')";
          $update = mysqli_query($con, $sql);

          echo '<script>console.log("' . $sql . '")</script>';
        }

        echo '<script>console.log("update2: ' . $update . '")</script>';

      ?>
        <script>
          setTimeout(() => {
            window.location.href = "aircraft_setup.php";
          }, 100);
        </script>
      <?php
      }
      ?>


      <?php
      if (isset($_POST['aksi']) && $_POST['aksi'] == 'edit') {
        $nik = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES)));
        $edit = mysqli_query($con, "select * from Aircraft WHERE matricula='$nik'");
        $rowaircraft = mysqli_fetch_assoc($edit);
      }else{
        $rowaircraft = array(
        "matricula" => "",
        "aeronave" => "",
        "fabricacion" => "",
        "capacidad" => "",
        "cruisespeed" => "",
        "precioh" => "",
        "pesomaximo" => "",
        "ascentspeed" => "",
        "fuelstop" => "",
        "distancia" => "",
        "pernocta" => "",
        "descentspeed" => "",
        );
      }
      ?>



      <!--AQUI COMIENZA EL FORMULARIO STEPS -->



      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header card-header-divider">Registro de Aeronave<span class="card-subtitle">Ingresa la informacion de la Aeronave</span></div>
            <div class="card-body pl-sm-5">
              <form action="aircraft_setup.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Matricula </label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $rowaircraft['matricula']; ?>" placeholder="Matricula" name="matricula">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Tipo de Aeronave</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $rowaircraft['aeronave']; ?>" placeholder="Tipo de Aeronave" name="aeronave">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Año de Fabricacion</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $rowaircraft['fabricacion']; ?>" placeholder="Año de Fabricacion" name="fabricacion">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Imagenes de la Aeronave</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                  <!--<input type="file" class="" value="" name="imagen">-->
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" multiple value="<?php //echo $rowaircraft['imagen']; ?>" name="imagen[]" id="imagen">
                      <label class="custom-file-label" for="imagen">Seleccionar Archivos</label>
                    </div>
                  </div>
                </div>
                <script>
                $(".custom-file-input").on("change", function() {
                  var fileName = $(this).val().split("\\").pop();
                  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
                </script>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card card-default">
                  <div class="card-header card-header-divider">Configuracion Tecnica<span class="card-subtitle">Ingresa la informacion Tecnica</span></div>
                  <div class="card-body pl-sm-5">

                    <div class="form-group row " style="justify-content: center;">
                      <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                      <div class="col-12 col-sm-8 col-lg-2">Capacidad Maxima
                        <input class="form-control" type="text" value="<?php echo $rowaircraft['capacidad']; ?>" placeholder="Capacidad Maxima" name="capacidad">
                      </div>
                      <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                      <div class="col-12 col-sm-8 col-lg-2">Velocidad Crucero
                        <input class="form-control" type="text" value="<?php echo $rowaircraft['cruisespeed']; ?>" placeholder="Velocidad Crucero" name="cruisespeed">
                      </div>
                      <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                      <!-- <div class="col-12 col-sm-8 col-lg-2">Precio KM
                        <input class="form-control" type="text" value="<?php //echo $rowaircraft['preciokm']; ?>" placeholder="Precio KM" name="<?php echo 'preciokm' . $i; ?>">
                      </div> -->
                      <div class="col-12 col-sm-8 col-lg-2">Precio Hora
                        <input class="form-control" type="text" value="<?php echo $rowaircraft['precioh']; ?>" placeholder="Precio Hora" name="precioh<?php //echo 'precioh' . $i; ?>">
                      </div>
                    </div>
                    <div class="form-group row" style="justify-content: center;">
                      <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                      <div class="col-12 col-sm-8 col-lg-2">Distancia Maxima
                        <input class="form-control" type="text" value="<?php echo $rowaircraft['distancia']; ?>" placeholder="Distancia Maxima" name="distancia">
                      </div>
                      <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                      <div class="col-12 col-sm-8 col-lg-2">Velocidad Decenso
                        <input class="form-control" type="text" value="<?php echo $rowaircraft['descentspeed']; ?>" placeholder="Velocidad Decenso" name="descentspeed">
                      </div>
                      <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                      <div class="col-12 col-sm-8 col-lg-2">Precio Pernocta
                        <input class="form-control" type="text" value="<?php echo $rowaircraft['pernocta']; ?>" placeholder="Pernocta " name="pernocta">
                      </div>
                    </div>
                    <div class="form-group row" style="justify-content: center;">
                      <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                      <div class="col-12 col-sm-8 col-lg-2">Peso Maximo
                        <input class="form-control" type="text" value="<?php echo $rowaircraft['pesomaximo']; ?>" placeholder="Peso Maximo" name="pesomaximo">
                      </div>
                      <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                      <div class="col-12 col-sm-8 col-lg-2">Velocidad Ascenso
                        <input class="form-control" type="text" value="<?php echo $rowaircraft['ascentspeed']; ?>" placeholder="Velocidad Acenso" name="ascentspeed">
                      </div>
                      <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                      <div class="col-12 col-sm-8 col-lg-2">Precio Fuel Stop
                        <input class="form-control" type="text" value="<?php echo $rowaircraft['fuelstop']; ?>" placeholder="Parada Tecnica" name="fuelstop">
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
            <div class="col-lg-12">
              <p class="text-right">
                <button class="btn btn-space btn-primary" name="save" type="submit">Procesar</button>
                <button class="btn btn-space btn-secondary">Cancelar</button>
              </p>
            </div>
          </div>

        </div>
        </form>

      </div>


      <!-- AQUI TERMINA LA REGISTRACION-->

      <!-- AQUI COMIENZA EL LISTADO-->

      <div class="row">
        <div class="col-sm-12">
          <div class="card card-default card-table">
            <div class="card-header">Lista de Aeronaves
              <div class="tools"><span class="icon s7-cloud-download"></span><span class="icon s7-edit"></span></div>
            </div>
            <div class="card-body">
              <div class="table-responsive noSwipe">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <!-- <th style="width:5%;">
                        <label class="custom-control custom-control-sm custom-checkbox">
                          <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                        </label>
                      </th> -->
                      <th style="width:20%;">Matrícula </th>
                      <th style="width:17%;">Tipo de AC </th>
                      <th style="width:15%;">Año de Fabricacion</th>
                      <!-- <th style="width:10%;">Precio Km</th> -->
                      <th style="width:10%;">Precio Hora</th>
                      <th style="width:10%;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (mysqli_num_rows($rows) == 0) {
                    } else {
                      while ($row = mysqli_fetch_assoc($rows)) {
                    ?>
                        <tr>
                          <!-- <td>
                            <label class="custom-control custom-control-sm custom-checkbox">
                              <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                            </label>
                          </td> -->
                          <td class="cell-detail">
                            <!-- <img src="assets/img/avatar.jpg" alt="Avatar"> -->
                            <span><?php echo $row['matricula']; ?></span>
                          </td>
                          <td class="cell-detail">
                            <span><?php echo $row['aeronave']; ?></span>
                          </td>
                          <td class="cell-detail">
                            <span><?php echo $row['fabricacion']; ?></span>
                          </td>
                          <!-- <td class="cell-detail">
                            <span><?php echo $row['preciokm']; ?></span>
                          </td> -->
                          <td class="cell-detail">
                            <span><?php echo $row['precioh']; ?></span>
                          </td>
                          <td class="text-right">
                            <div class="btn-group btn-hspace">
                              <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Select <span class="icon-dropdown s7-angle-down"></span></button>
                              <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a class="dropdown-item" href='javascript:editarmatricula ("<?php echo $row['matricula'] ?>")'>Edit</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="aircraft_setup.php?aksi=delete&nik=<?php echo $row['matricula']; ?>" title="Eliminar">Delete</a> <!-- onclick="return confirm('Are you sure? <?php //echo $row['matricula']; 
                                                                                                                                                                                                            ?>')" -->
                              </div>
                            </div>
                          </td>
                        </tr>
                    <?php
                      }
                    }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
  <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
  <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="assets/js/app.js" type="text/javascript"></script>
  <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
  <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
  <script src="assets/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
  <script src="assets/lib/datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
  <script src="assets/js/app-form-elements.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      //-initialize the javascript
      App.init();
      App.formElements();
    });
  </script>
  <script>
    //function para poder editar y borrar las quotes DESPUES DE PONERLE LOGIN
    function borrar(id) {
      //"hello.php?aksi=delete&nik= echo $row['quote']; ?>" 
      //console.log('borrar '+id_invoice)
      let form = document.createElement('form')
      form.action = 'aircraft_setup.php'
      form.method = 'post'
      let username = document.createElement('input')
      let password = document.createElement('input')
      let aksi = document.createElement('input')
      let nik = document.createElement('input')
      username.value = 'test1'
      username.type = 'hidden'
      username.name = 'username'
      password.value = 'test1'
      password.type = 'hidden'
      password.name = 'password'
      aksi.name = 'aksi'
      aksi.type = 'hidden'
      aksi.value = 'delete'
      nik.name = 'nik'
      nik.type = 'hidden'
      nik.value = id
      form.appendChild(aksi)
      form.appendChild(username)
      form.appendChild(password)
      form.appendChild(nik)
      document.body.appendChild(form)
      form.submit()

    }
    //FUNCTION EDITAR - PROBLEMA CON NO EDITAR el SUBTOTAL + TAX + TOTAL
    function editarQuote(id) {
      let form = document.createElement('form')
      form.action = 'aircraft_setup.php'
      form.method = 'post'
      let username = document.createElement('input')
      let password = document.createElement('input')
      let aksi = document.createElement('input')
      let nik = document.createElement('input')
      let edit = document.createElement('input')
      let amount = document.createElement('input')
      let date = document.createElement('input')
      username.value = 'test1'
      username.type = 'hidden'
      username.name = 'username'
      password.value = 'test1'
      password.type = 'hidden'
      password.name = 'password'
      aksi.name = 'aksi'
      aksi.type = 'hidden'
      aksi.value = 'edit'
      nik.name = 'nik'
      nik.type = 'hidden'
      nik.value = id
      edit.name = 'edit'
      edit.type = 'hidden'
      edit.value = 'yes'
      form.appendChild(aksi)
      form.appendChild(username)
      form.appendChild(password)
      form.appendChild(nik)
      form.appendChild(edit)
      document.body.appendChild(form)
      form.submit()
    }

    function loginuser() {
      let form = document.createElement('form')
      form.action = 'hello.php'
      form.method = 'post'
      let username = document.createElement('input')
      let password = document.createElement('input')
      let aksi = document.createElement('input')
      let nik = document.createElement('input')
      let edit = document.createElement('input')
      let amount = document.createElement('input')
      let date = document.createElement('input')
      username.value = 'test1'
      username.type = 'hidden'
      username.name = 'username'
      password.value = 'test1'
      password.type = 'hidden'
      password.name = 'password'
      aksi.name = 'aksi'
      aksi.type = 'hidden'
      aksi.value = 'login'
      nik.name = 'nik'
      nik.type = 'hidden'
      edit.name = 'edit'
      edit.type = 'hidden'
      edit.value = 'yes'
      amount.name = 'amount'
      amount.type = 'hidden'
      amount.value = '<?php echo $rowedit["amount"]; ?>'
      date.name = 'date'
      date.type = 'hidden'
      date.value = '<?php echo $rowedit["date"]; ?>'
      form.appendChild(aksi)
      form.appendChild(username)
      form.appendChild(password)
      form.appendChild(nik)
      form.appendChild(edit)
      form.appendChild(amount)
      form.appendChild(date)
      document.body.appendChild(form)
      form.submit()
    }

    function loginuserhellolist() {
      let form = document.createElement('form')
      form.action = 'hellolist.php'
      form.method = 'post'
      let username = document.createElement('input')
      let password = document.createElement('input')
      let aksi = document.createElement('input')
      let nik = document.createElement('input')
      let edit = document.createElement('input')
      let amount = document.createElement('input')
      let date = document.createElement('input')
      username.value = 'test1'
      username.type = 'hidden'
      username.name = 'username'
      password.value = 'test1'
      password.type = 'hidden'
      password.name = 'password'
      aksi.name = 'aksi'
      aksi.value = 'login'
      aksi.type = 'hidden'
      nik.name = 'nik'
      nik.type = 'hidden'
      edit.name = 'edit'
      edit.type = 'hidden'
      edit.value = 'yes'
      amount.name = 'amount'
      amount.type = 'hidden'
      amount.value = '<?php echo $rowedit["amount"]; ?>'
      date.name = 'date'
      date.type = 'hidden'
      date.value = '<?php echo $rowedit["date"]; ?>'
      form.appendChild(aksi)
      form.appendChild(username)
      form.appendChild(password)
      form.appendChild(nik)
      form.appendChild(edit)
      form.appendChild(amount)
      form.appendChild(date)
      document.body.appendChild(form)
      form.submit()
    }


    //function refrescar search quotes
    function refreshpage() {
      setTimeout(() => {
        window.location.href = "aircraft_setup.php";
      }, 100);

    }

    function editarmatricula(matricula) {
      let form = document.createElement('form')
      form.action = 'aircraft_setup.php'
      form.method = 'post'
      let username = document.createElement('input')
      let password = document.createElement('input')
      let aksi = document.createElement('input')
      let nik = document.createElement('input')
      let edit = document.createElement('input')
      let amount = document.createElement('input')
      let date = document.createElement('input')
      username.value = 'test1'
      username.type = 'hidden'
      username.name = 'username'
      password.value = 'test1'
      password.type = 'hidden'
      password.name = 'password'
      aksi.name = 'aksi'
      aksi.type = 'hidden'
      aksi.value = 'edit'
      nik.name = 'nik'
      nik.type = 'hidden'
      nik.value = matricula
      edit.name = 'edit'
      edit.type = 'hidden'
      edit.value = 'yes'
      form.appendChild(aksi)
      form.appendChild(username)
      form.appendChild(password)
      form.appendChild(nik)
      form.appendChild(edit)
      document.body.appendChild(form)
      form.submit()

    }
  </script>
</body>

</html>