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
  <title>AIS Operations</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
</head>

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="assets/js/login-check.js" type="text/javascript"></script>

<body>
<?php require_once("nav_header.html") ?>

  <!--COMIENZO BOTONERA PRINCIPAL-->

  <div class="mai-wrapper">
  <?php require_once("nav_header2.html") ?>

    <!--FINAL BOTONERA PRINCIPAL-->

    <div class="main-content container">

      <?php

      //Seccion reservar

      if (isset($_POST['username']) && ($_POST['aksi'] == 'reservar')) {
        $nik = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES)));
        $reservar = mysqli_query($con, "UPDATE invoices SET STATUS =2 WHERE quote=$nik");
      }

      // SECCION DE BORRAR Y EDITAR
      $sqllist = "select i.*,c.* from invoices i, Contact c where i.status = 2 and i.buyer_id=c.id";
      $rows = mysqli_query($con, $sqllist);

      if (isset($_POST['username']) && ($_POST['aksi'] == 'delete' || $_POST['aksi'] == 'edit')) {
        $nik = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES)));
        $delete = mysqli_query($con, "DELETE from invoices WHERE quote=$nik");
        if ($delete) {
          echo '<script type="text/javascript">',
          'window.location.href="opsmain.php";',
          '</script>';
          //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
        } else {
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, Data cannot be deleted.</div>';
        }
      }

      if (isset($_POST['aksi']) && $_POST['aksi'] == 'edit') {
        $nik = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES)));
        $edit = mysqli_query($con, "select * from invoices WHERE quote=$nik");
        if ($edit) {
          $rowedit = mysqli_fetch_assoc($edit);;
          //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
        } else {
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, Data cannot be deleted.</div>';
        }
      }

      // if (isset($_POST['aksi']) && $_POST['aksi'] == 'anular') {
      //   $nik = mysqli_real_escape_string($con, (strip_tags($_POST['nik'], ENT_QUOTES)));
      //   $sql_anular = "UPDATE invoices SET STATUS = 1 WHERE quote=$nik";
      //   $anular = mysqli_query($con, $sql_anular);
      //   echo '<script>console.log("' . $sql_anular . '")</script>';
      //   if ($anular) {
      //     $rowedit = mysqli_fetch_assoc($anular);
      //   } else {
      //     echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error! Este vuelo no puede ser anulado.</div>';
      //   }
      // }

      /*if(isset($_POST['save'])){
      $first_name	     = mysqli_real_escape_string($con,(strip_tags($_POST["first_name"],ENT_QUOTES)));//Escanpando caracteres
      $last_name	     = mysqli_real_escape_string($con,(strip_tags($_POST["last_name"],ENT_QUOTES)));//Escanpando caracteres
      $phone_number	     = mysqli_real_escape_string($con,(strip_tags($_POST["phone_number"],ENT_QUOTES)));//Escanpando caracteres
      $address	     = mysqli_real_escape_string($con,(strip_tags($_POST["address"],ENT_QUOTES)));//Escanpando caracteres  
      $email	     = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));//Escanpando caracteres
      $notes	     = mysqli_real_escape_string($con,(strip_tags($_POST["notes"],ENT_QUOTES)));//Escanpando caracteres
      
      $sql= "insert into Contact (First_Name,Last_Name,Phone_Number,Address,Email,Notes) Values ('$first_name','$last_name','$phone_number','$address','$email','$notes')";
      $update = mysqli_query($con,$sql) 
      or die(mysqli_error());
      }*/
      ?>

      <!-- AQUI COMIENZA EL LISTADO-->
      <div class="row">
        <div class="col-sm-12">
          <div class="card card-default card-table">
            <div class="card-header">Lista de Vuelos Confirmados
              <div class="tools"><span class="icon s7-cloud-download"></span><span class="icon s7-edit"></span></div>
            </div>
            <div class="card-body">
              <div class="noSwipe">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="width:5%;">
                        <label class="custom-control custom-control-sm custom-checkbox">
                          <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                        </label>
                      </th>
                      <th style="width:10%;">Cotizacion</th>
                      <th style="width:15%;">Fecha </th>
                      <th style="width:15%;">Aeronave</th>
                      <th style="width:20%;">Comprador</th>
                      <th style="width:10%;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (mysqli_num_rows($rows) != 0) {
                      while ($row = mysqli_fetch_assoc($rows)) {
                    ?>
                        <tr>
                          <td>
                            <label class="custom-control custom-control-sm custom-checkbox">
                              <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                            </label>
                          </td>
                          <td class="cell-detail"><span><b><?php echo $row['quote']; ?></b>
                            </span>
                          </td>
                          <td class="cell-detail"> <span><?php echo $row['date']; ?>
                            </span>
                          </td>
                          <td class="cell-detail"><span><?php echo $row['aircraft']; ?>
                            </span>
                          </td>
                          <td class="cell-detail"><span><?php echo $row['first_name']; ?><?php echo ' ' . $row['last_name']; ?>
                            </span>
                          </td>
                          <td class="text-right">
                            <div class="btn-group btn-hspace">
                              <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Seleccionar <span class="icon-dropdown s7-angle-down"></span></button>
                              <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a class="dropdown-item" href='opsmain2.php?id=<?php echo $row['quote'] ?>' title="Cambiar">Programacion</a>
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href='reserva.php?id=<?php echo $row['quote'] ?>' title="View">Costos</a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href='paxreport.php?id=<?php echo $row['quote'] ?>' title="View">Detalles</a>
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" target='_blank' href='reportpdf.php?id=<?php echo $row['quote'] ?>' title="View">Tripsheet</a> -->
                                <a class="dropdown-item" target='_blank' href='reportpdf.php?id=<?php echo $row['quote'] ?>' title="View">Quote</a>
                                <div class="dropdown-divider"></div>
                                <?php
                                $quote = $row["quote"];
                                $sql_invoice_detail = "select Id, origen, destino from invoice_detail where id_invoice=$quote";
                                echo "<script>console.log('$sql_invoice_detail')</script>";
                                $invoice_detail = mysqli_query($con, $sql_invoice_detail);

                                $legs = array();
                                $leg_names = array();
                                while (($row_leg = mysqli_fetch_assoc($invoice_detail))) {
                                  array_push($legs, $row_leg["Id"]);
                                  array_push($leg_names, "(".$row_leg["origen"] ."-". $row_leg["destino"].")");
                                }
                                
                                for ($i=0; $i < count($legs); $i++) {
                                  $next_leg = ($i + 1) < count($legs) ? $legs[$i + 1] : "none";
                                ?>
                                  <a class="dropdown-item" target='_blank' href='gendecpdf.php?quote=<?php echo $row["quote"] ?>&leg=<?php echo $legs[$i] ?>&next_leg=<?php echo $next_leg ?>' title="View">GENDEC <?php echo $leg_names[$i] ?></a>
                                  <div class="dropdown-divider"></div>
                                <?php
                                }
                                ?>
                                <a class="dropdown-item" href='javascript:anular("<?php echo $row['quote'] ?>")' title="Eliminar">Anular</a>

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
  <script>
    //LOGIN PASSWORD OVERWRITE HELLO

    function anular(quote) {
      let form = document.createElement('form')

      let aksi = document.createElement('input')
      let nik = document.createElement('input')
      aksi.name = 'aksi'
      aksi.type = 'hidden'
      aksi.value = 'anular'
      nik.name = 'nik'
      nik.type = 'hidden'
      nik.value = quote

      form.appendChild(aksi)
      form.appendChild(nik)

      console.log(aksi.value)
      console.log(nik.value)

      document.body.appendChild(form)
      form.action = 'hellolist.php'
      form.method = 'post'
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

    //LOGIN PASSWORD OVERWRITE HELLOLISR

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

    function statusbooked(id_invoice) {
      let form = document.createElement('form')
      form.action = 'opsmain.php'
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
      aksi.value = 'reservar'
      nik.name = 'nik'
      nik.type = 'hidden'
      nik.value = id_invoice
      form.appendChild(aksi)
      form.appendChild(username)
      form.appendChild(password)
      form.appendChild(nik)
      document.body.appendChild(form)
      form.submit()
    }
  </script>
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
</body>

</html>