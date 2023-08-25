<!DOCTYPE html>
<html>

<?php include("conexion.php"); ?>

<head>
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <title>AIS Quote</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <!-- <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" /> -->
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
  <link rel="stylesheet" href="css/styles.css" type="text/css" />
  <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
</head>

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="assets/js/login-check.js" type="text/javascript"></script>
<script src="assets/js/user-validation.js" type="text/javascript"></script>

<body id="body">
  <?php require_once("nav_header.html") ?>
  <div class="mai-wrapper">
    <?php require_once("nav_header2.html"); ?>
    <div class="main-content container">

      <?php
      // SECCION DE BORRAR Y EDITAR
      $sqllist = "select * from invoices";
      $rows = mysqli_query($con, $sqllist);


      if (isset($_POST['username']) && $_POST['aksi'] == 'delete') {
        $nik = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES)));
        $delete = mysqli_query($con, "DELETE from invoices WHERE quote=$nik");
        if ($delete) {
          echo '<script type="text/javascript">',
          'window.location.href="hello.php";',
          '</script>';
          //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
        } else {
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, Data cannot be deleted.</div>';
        }
      }

      if (isset($_POST['aksi']) && $_POST['aksi'] == 'edit') {
        $nik = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES))); //id_invoice
        $edit = mysqli_query($con, "select * from invoices WHERE quote=$nik");
        if ($edit) {
          $rowedit = mysqli_fetch_assoc($edit);
          $idbuyer = $rowedit["buyer_id"];
          //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
        } else {
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, Data cannot be deleted.</div>';
        }
      }else{
        $rowedit=array(
          "aircraft" => "",
        );
      }
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
      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header card-header-divider">Info de Cotizacion<span class="card-subtitle">Ingresa detalles del comprador</span></div>
            <!-- <div class="card-body pl-sm-5"> -->
            <form id="quote-form" action="pdfgen.php" method="post" >
              <!-- </div> -->
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">Comprador:</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <script type="text/javascript">
                    window.addEventListener("load", function() {
                      updateaddress(document.getElementById("name-select"))
                    }, false);
                  </script>
                  <?php
                  $queryBuyer = "select * from Contact order by id";
                  $buyers = mysqli_query($con, $queryBuyer);

                  if (isset($edit)) {
                    $queryBuyer = "select * from Contact where id=" . $idbuyer;
                    $buyers = mysqli_query($con, $queryBuyer);
                    $rowbuyer = mysqli_fetch_assoc($buyers)
                  ?>
                    <select readonly='readonly' required id="name-select" name="buyer" class="form-control custom-select">
                      <option readonly='readonly' value="<?php echo $rowbuyer['id'] . '**' . $rowbuyer['address']; ?>"><?php echo $rowbuyer['first_name'] . ' ' . $rowbuyer['last_name']; ?> </option>
                    </select>
                  <?php
                  } else {
                  ?>
                    <select required id="name-select" name="buyer" class="form-control custom-select" onchange="updateaddress(this)">
                      <?php
                      while ($rowbuyer = mysqli_fetch_assoc($buyers)) {
                      ?>
                        <option value="<?php echo $rowbuyer['id'] . '**' . $rowbuyer['address']; ?>"><?php echo $rowbuyer['first_name'] . ' ' . $rowbuyer['last_name']; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  <?php
                  }
                  ?>
                </div>
              </div>


              <div class="form-group row">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">Direccion:</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <?php
                  if (isset($edit)) {
                    //$queryBuyer = "select * from Contact where id=" . $idbuyer;
                    //$buyers = mysqli_query($con, $queryBuyer);
                  ?>
                    <input class="form-control" type="text" value="<?php echo $rowbuyer['address']; ?>" placeholder="<?php echo $rowbuyer['address']; ?>" name="address" id="address" readonly='readonly'>
                    <!-- <input class="form-control" type='text' name='buyer' value="<?php //echo $rowbuyer['first_name'] . ' ' . $rowbuyer['last_name'];?>" readonly='readonly'> -->
                  <?php
                  } else {
                  ?>
                    <input required class="form-control" type="text" value="<?php echo $rowbuyer['address']; ?>" placeholder="<?php echo $rowbuyer['address']; ?>" name="address" id="address" disabled>
                  <?php
                  }
                  ?>
                  <!-- <div class="form-control" id='divaddress'>
                      <?php // echo $rowedit['address']; 
                      ?>
                    </div>
                    <input class="form-control" type="hidden" value="<?php //echo $rowedit['address']; 
                                                                      ?>" placeholder="address" name="address" id="address"> -->
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">Aeronave:</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <script type="text/javascript">
                    window.addEventListener("load", function() {
                      update_km_price(document.getElementById("aircraft"))
                    }, false);
                  </script>
                  <?php
                  //AIRCRAFT TABLE
                  $sqlaircraft = 'select * from Aircraft';
                  $aircraft = mysqli_query($con, $sqlaircraft);


                  ?>
                  <select required name='aircraft' class="form-control custom-select" id="aircraft" onchange="update_km_price(this)">
                    <?php
                    while ($rowaircraft = mysqli_fetch_assoc($aircraft)) {
                    ?>
                      <option value="<?php echo $rowaircraft['matricula'] . '*' . $rowaircraft['preciokm'] . '*' . $rowaircraft['precioh'] . '*' . $rowaircraft['cruisespeed'] ?>" <?php echo($rowedit['aircraft'] == $rowaircraft['matricula']) ? 'selected="selected"' : ''; ?>> 
                        <?php echo $rowaircraft['matricula']; ?>
                      </option>
                      <?php
                    }
                      ?>
                  </select>
                </div>
              </div>


              <div class="card-header card-header-divider"> Detalle de Tramos<span class="card-subtitle">Ingresa las piernes de vuelo</span></div>
              <br>

              <div id='form-container'>

                <div class="form-group row">
                  <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                  <style>
                    .center-text {
                      display: flex;
                      align-items: center
                    }
                  </style>
                  <div class="col-12 col-sm-8 col-lg-2 center-text">Fecha</div>
                  <div class="col-12 col-sm-8 col-lg-2 center-text">Origen</div>
                  <div class="col-12 col-sm-8 col-lg-2 center-text">Destino</div>
                  <div class="col-12 col-sm-8 col-lg-1 center-text">Pax</div>
                  <div class="col-12 col-sm-8 col-lg-2 center-text">Tiempo de vuelo</div>
                </div>
                <?php
                //if (isset($_POST['aksi']) && $_POST['aksi'] == 'edit') {
                $i = 1;
                if (isset($edit)){
                  $editdetail = mysqli_query($con, "select * from invoice_detail WHERE id_invoice=$nik");
                  while ($rowdetail = mysqli_fetch_assoc($editdetail)) {
                    //$i esta hecho para view y reveer el pdf
                ?>
                    <div class="form-group row" id="tramo-<?php echo $i;?>">
                      <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                      <div class="col-12 col-sm-8 col-lg-2">
                        <input required class="form-control" type="date" value="<?php echo substr($rowdetail['fecha'],0,10); ?>" placeholder="Fecha" name="<?php echo 'fdateh' . $i; ?>" id="<?php echo 'fdate' . $i; ?>">
                      </div>
                      <div class="col-12 col-sm-8 col-lg-2">
                        <input required class="form-control" type="text" value="<?php echo $rowdetail['origen']; ?>" placeholder="origen" name="<?php echo 'forigenh' . $i; ?>" id="<?php echo 'forigen' . $i; ?>" onkeyup="get_airports(this)" onchange="origen_changed(this)">
                        <!--<div class="dropdown-menu dropdown-menu-left" role="menu" id="<?php //echo 'origen-dropdown' . $i; ?>" style="max-height:19em; overflow: auto;"> -->
                      </div>
                      <div class="col-12 col-sm-8 col-lg-2">
                        <input required class="form-control" type="text" value="<?php echo $rowdetail['destino']; ?>" placeholder="destino" name="<?php echo 'fdestinoh' . $i; ?>" id="<?php echo 'fdestino' . $i; ?>" onkeyup="get_airports(this)" onchange="destino_changed(this)">
                        <!--<div class="dropdown-menu dropdown-menu-left" role="menu" id="<?php //echo 'destino-dropdown' . $i; ?>" style="max-height:19em; overflow: auto;"> -->
                      </div>
                      <div class="col-12 col-sm-8 col-lg-1">
                        <input required class="form-control" type="text" value="<?php echo $rowdetail['Pax']; ?>" placeholder="pax" name="<?php echo 'fpaxh' . $i; ?>" id="<?php echo 'fpax' . $i; ?>">
                      </div>
                      <div class="col-12 col-sm-8 col-lg-1">
                        <input required class="form-control" type="text" value="<?php echo $rowdetail['tiempo_vuelo']; ?>" name="<?php echo 'fh_vueloh' . $i; ?>" id="<?php echo 'h_vuelo' . $i; ?>" onchange="editSubtotal(this.value)" readonly> 
                        <input required class="form-control" type="hidden" value="<?php echo $rowdetail['nm_vuelo']; ?>" placeholder="kms" name="<?php echo 'fnm_vueloh' . $i; ?>" id="<?php echo 'nm_vuelo' . $i; ?>">
                        <input required class="form-control" type="hidden" value="<?php echo $rowdetail['Id']; ?>" placeholder="" name="<?php echo 'fidh' . $i; ?>" id="<?php echo 'fid' . $i; ?>">
                      </div>
                    </div>
                <?php
                  $i++;
                  }
                  ?>
                  <!-- <script>setTimeout(() => { add_tramo(); }, 1000);</script>
                  <button id="add-tramo-btn" class="btn btn-primary" onclick='javascript:add_tramo()' type="button">
                    <img src="assets/img/icons/icono-11.png" alt="" class="ai-icon">
                  </button>
                  <button id="delete-tramo-btn" class="btn btn-danger" onclick='javascript:delete_tramo()' type="button" <?php echo ($i==1)?'style="display:none"':''; ?>>
                    <img src="assets/img/icons/icono-9.png" alt="" class="ai-icon">
                  </button> -->
                <?php
                }//else{
                  ?>

                  <?php
                  $query_airports = mysqli_query($con, "SELECT airport_code, airport_name FROM airports");
                  ?>
                  <script>
                    var airports = [];
                  </script>
                  <?php
                  while ($row_airport = mysqli_fetch_assoc($query_airports)) { ?>
                    <script>
                      airports.push(['<?php echo $row_airport["airport_code"] ?>', '<?php echo $row_airport["airport_name"] ?>']);
                    </script>
                  <?php
                  }
                  ?>

                  <div class="form-group row" id="tramo-<?php echo $i;?>">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">
                      <input <?php echo isset($edit)? "":"required" ?> class="form-control" type="date" placeholder="fecha" name="fdate1" id="fdate<?php echo $i;?>">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-2">
                      <input <?php echo isset($edit)? "":"required" ?> class="form-control" type="text" data-toggle="dropdown" placeholder="origen" name="forigen1" id="forigen<?php echo $i;?>" onkeyup="get_airports(this)" onchange="origen_changed(this)">
                      <!-- <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Seleccionar <span class="icon-dropdown s7-angle-down"></span></button> -->
                      <div class="dropdown-menu dropdown-menu-left" role="menu" id="origen-dropdown1" style="max-height:19em; overflow: auto;">
                      </div>
                      <!-- <select class="form-control custom-select" name="forigen1" id="forigen1" onchange="origen_changed(this)">
                        <option value="none">...</option>
                      </select> -->
                    </div>
                    <div class="col-12 col-sm-8 col-lg-2">
                      <input <?php echo isset($edit)? "":"required" ?> class="form-control" type="text" data-toggle="dropdown" placeholder="destino" name="fdestino1" id="fdestino<?php echo $i;?>" onkeyup="get_airports(this)" onchange="destino_changed(this)">
                      <div class="dropdown-menu dropdown-menu-left" role="menu" id="destino-dropdown1" style="max-height:19em; overflow: auto;">
                      </div>
                      <!-- <select class="form-control custom-select" name="fdestino1" id="fdestino1" onchange="destino_changed(this)">
                        <option value="none">...</option>
                      </select> -->
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                      <input <?php echo isset($edit)? "":"required" ?> class="form-control" type="text" placeholder="pax" name="fpax1" id="fpax<?php echo $i;?>">
                    </div>
                    <!-- <div class="col-12 col-sm-8 col-lg-1"> -->
                      <input class="form-control" type="hidden" placeholder="" name="nm_vuelo1" id="nm_vuelo<?php echo $i;?>" onchange="//editSubtotal(this.value)" readonly>
                    <!-- </div> -->
                    <div class="col-12 col-sm-8 col-lg-1">
                      <input <?php echo isset($edit)? "":"required" ?> class="form-control" type="text" placeholder="Hs" name="h_vuelo1" id="h_vuelo<?php echo $i;?>" onchange="editSubtotal(this.value)" readonly> 
                    </div>
                    <button id="add-tramo-btn" class="btn btn-primary" onclick='javascript:add_tramo()' type="button">
                      <img src="assets/img/icons/icono-11.png" alt="" class="ai-icon">
                    </button>
                    <button id="delete-tramo-btn" class="btn btn-danger" onclick='javascript:delete_tramo()' type="button" style="display:<?php echo isset($edit)? "block":"none" ?>">
                      <img src="assets/img/icons/icono-9.png" alt="" class="ai-icon">
                    </button>
                  </div>

                  <script>
                    // console.log(airports);
                    function populate_selects(origen_select_name, destino_select_name) {
                      let origen_select = document.getElementById(origen_select_name);
                      let destino_select = document.getElementById(destino_select_name);

                      airports.forEach(airport => {
                        let origen_option = document.createElement("option");
                        origen_option.value = airport[0];
                        origen_option.innerHTML = airport[1];

                        let destino_option = origen_option.cloneNode(true);

                        origen_select.appendChild(origen_option);
                        destino_select.appendChild(destino_option);
                      });
                    }

                    populate_selects("forigen1", "fdestino1");
                  </script>
              <?php //} ?>
              </div>

              <hr>
              <br>

              <div class="form-group row">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">Subtotal:</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <input required class="form-control" type="text" value="<?php echo isset($edit)? $rowedit['subtotal']:"0" ?>" placeholder="subtotal" name="subtotal" id="subtotal" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">Adicionales:</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <input required class="form-control" value="<?php echo isset($edit)? $rowedit['addons']:"" ?>" placeholder="Adicionales" name="addons" id="addons" onchange="editTotal()">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">Impuesto:</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <input required class="form-control" value="<?php echo isset($edit)? $rowedit['tax']:"" ?>" placeholder="Impuesto(%)" name="tax" id="tax" onchange="editTotal()">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">Total:</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <input required class="form-control" type="text" value="<?php echo isset($edit)? $rowedit['amount']:"0" ?>" placeholder="amount" name="amount" id="amount" readonly>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 col-sm-8 col-lg-6">
                  <?php
                  if(isset($edit)){
                    ?>
                    <input class="form-control" type="hidden" value="<?php echo $rowedit['quote']; ?>" placeholder="idpdf" name="idpdf" id="idpdf">
                    <?php
                  }
                  ?>    
                </div>



                <div class="col-lg-6 pb-4 pb-lg-0">
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                  <p class="text-right">
                    <button class="btn btn-space btn-primary" name="save" type="submit">Procesar</button>
                    <a class="btn btn-space btn-secondary" href="hellolist.php">Cancelar</a>
                  </p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <script>
    var tramo = <?php echo $i;?>;

    //$('#quote-form').on('submit', function(e) {
      //e.preventDefault();
      // alert($(this).serialize());
      //$.post('pdfgen.php', $(this).serialize());
      //location.reload();
    //});

    function add_tramo() {
      tramo++;

      // can be limited
      let master_container = document.getElementById('form-container')

      let new_container = document.createElement('div')
      master_container.appendChild(new_container)

      let label = document.createElement('label')
      new_container.classList.add('form-group', 'row')
      new_container.setAttribute("id", "tramo-" + tramo);

      label.classList.add('col-12', 'col-sm-1', 'col-form-label', 'text-sm-right')
      new_container.appendChild(label)

      let date_div = document.createElement('div')
      new_container.appendChild(date_div)
      let date_input = document.createElement('input')
      date_div.appendChild(date_input)

      date_div.classList.add('col-12', 'col-sm-8', 'col-lg-2')
      date_input.classList.add('form-control')
      date_input.setAttribute('required','')
      date_input.type = 'date'
      date_input.placeholder = 'fecha'
      date_input.name = 'fdate' + tramo
      date_input.id = 'fdate' + tramo
      date_input.min = document.getElementById('fdate' + (tramo - 1)).value;

      let origen_div = document.createElement('div')
      new_container.appendChild(origen_div)
      let origen_input = document.createElement('input')
      origen_div.appendChild(origen_input)
      let origen_dropdown = document.createElement('div')
      origen_div.appendChild(origen_dropdown)
      origen_dropdown.classList.add('dropdown-menu', 'dropdown-menu-left')
      origen_dropdown.id = 'origen-dropdown' + tramo
      origen_dropdown.style = "max-height:19em; overflow: auto;"
      origen_dropdown.role = "menu"


      origen_div.classList.add('col-12', 'col-sm-8', 'col-lg-2')
      origen_input.classList.add('form-control')
      origen_input.setAttribute('required','')
      origen_input.name = 'forigen' + tramo
      origen_input.id = 'forigen' + tramo
      origen_input.placeholder = 'origen'
      origen_input.value = document.getElementById('fdestino' + (tramo - 1)).value
      origen_input.setAttribute("data-toggle","dropdown")
      // origen_select.onchange = origen_changed(this)
      origen_input.addEventListener('change', function() {
        origen_changed(this)
      }, false);
      origen_input.addEventListener('keyup', function() {
        get_airports(this)
      }, false)

      let origen_none_option = document.createElement("option");
      origen_none_option.value = "none";
      origen_none_option.innerHTML = "...";
      origen_input.appendChild(origen_none_option);

      let destino_div = document.createElement('div')
      new_container.appendChild(destino_div)
      let destino_input = document.createElement('input')
      destino_div.appendChild(destino_input)
      let destino_dropdown = document.createElement('div')
      destino_div.appendChild(destino_dropdown)
      destino_dropdown.classList.add('dropdown-menu', 'dropdown-menu-left')
      destino_dropdown.id = 'destino-dropdown' + tramo
      destino_dropdown.style = "max-height:19em; overflow: auto;"
      destino_dropdown.role = "menu"

      destino_div.classList.add('col-12', 'col-sm-8', 'col-lg-2')
      destino_input.classList.add('form-control')
      destino_input.setAttribute('required','')
      destino_input.name = 'fdestino' + tramo
      destino_input.id = 'fdestino' + tramo
      destino_input.placeholder = 'destino'
      destino_input.setAttribute("data-toggle","dropdown")
      destino_input.addEventListener('change', function() {
        destino_changed(this)
      }, false);
      destino_input.addEventListener('keyup', function() {
        get_airports(this)
      }, false)

      let destino_none_option = origen_none_option.cloneNode(true);
      destino_input.appendChild(destino_none_option);

      populate_selects(origen_input.name, destino_input.name);
      origen_input.value = document.getElementById('fdestino' + (tramo - 1)).value

      let pax_div = document.createElement('div')
      new_container.appendChild(pax_div)
      let pax_input = document.createElement('input')
      pax_div.appendChild(pax_input)

      pax_div.classList.add('col-12', 'col-sm-8', 'col-lg-1')
      pax_input.classList.add('form-control')
      pax_input.setAttribute('required','')
      pax_input.type = 'text'
      pax_input.placeholder = 'pax'
      pax_input.name = 'fpax' + tramo

      // let km_div = document.createElement('div')
      // new_container.appendChild(km_div)
      // let km_input = document.createElement('input')
      // km_div.appendChild(km_input)

      // km_div.classList.add('col-12', 'col-sm-8', 'col-lg-1')
      // km_input.classList.add('form-control')
      // km_input.type = 'text'
      // km_input.placeholder = 'kms'
      // km_input.name = 'km_vuelo' + tramo
      // km_input.id = 'km_vuelo' + tramo
      // km_input.readOnly = 'readonly'
      // km_input.addEventListener('change', function() {
      //   editSubtotal(this.value);
      // }, false)

      let nm_div = document.createElement('div')
      new_container.appendChild(nm_div)
      let nm_input = document.createElement('input')
      nm_div.appendChild(nm_input)

      //nm_div.classList.add('col-12', 'col-sm-8', 'col-lg-1')
      //km_input.classList.add('form-control')
      nm_input.type = 'hidden'
      nm_input.placeholder = 'nm'
      nm_input.name = 'nm_vuelo' + tramo
      nm_input.id = 'nm_vuelo' + tramo
      nm_input.readOnly = 'readonly'

      let h_div = document.createElement('div')
      new_container.appendChild(h_div)
      let h_input = document.createElement('input')
      h_div.appendChild(h_input)

      h_div.classList.add('col-12', 'col-sm-8', 'col-lg-1')
      h_input.classList.add('form-control')
      h_input.setAttribute('required','')
      h_input.type = 'text'
      h_input.placeholder = 'Hs'
      h_input.name = 'h_vuelo' + tramo
      h_input.id = 'h_vuelo' + tramo
      h_input.readOnly = 'readonly'
      h_input.addEventListener('change', function() {
        editSubtotal(this.value);
      }, false)

      // move buttons to new element
      let add_tramo_bnt = document.getElementById('add-tramo-btn')
      let delete_tramo_bnt = document.getElementById('delete-tramo-btn')

      new_container.appendChild(add_tramo_bnt)
      new_container.appendChild(delete_tramo_bnt)

      if ((tramo - 1) == 1) {
        delete_tramo_bnt.style.display = "block";
      }
    }

    function delete_tramo() {
      // deletes last tramo price
      // console.log('h_vuelo' + tramo)
      // let substract_price = 0
      // let substract_amount = document.getElementById('h_vuelo' + tramo).value;

      // if (false) {
      //   substract_price = substract_amount * kmPrice;
      // } else {
      //   substract_price = substract_amount * hPrice;
      // }

      // substract_price = Math.round((substract_price + Number.EPSILON) * 100) / 100;
      

      // editSubtotal(document.getElementById('h_vuelo' + tramo).value * -1)

      let add_tramo_bnt = document.getElementById('add-tramo-btn')
      let delete_tramo_bnt = document.getElementById('delete-tramo-btn')

      let prev_container = document.getElementById("tramo-" + (tramo - 1))
      prev_container.appendChild(add_tramo_bnt)
      prev_container.appendChild(delete_tramo_bnt)

      let last_container = document.getElementById("tramo-" + tramo)
      last_container.remove() // delete the new container
      
      editSubtotal();

      tramo--

      if (tramo == 1) {
        delete_tramo_bnt.style.display = "none";
      }
    }

    kmPrice = 0
    hPrice = 0
    cruise_speed = 0

    function editSubtotal(newPrice) {
      // let curr_val = document.getElementById('subtotal').value
      // console.log(curr_val)

      let new_price = 0
      let total_hours = 0

      for (let i = 1; i < 10; i++) {
        //console.log(i);
        let h_vuelo = document.getElementById("h_vuelo" + i)
        if (h_vuelo == null) break
        // total_hours += h_vuelo.value
        //console.log("h_vuelo.getAttribute('value'): ");
        //console.log(h_vuelo.getAttribute('value'));
        //console.log(h_vuelo.value);
        if(h_vuelo.value){
          total_hours += parseFloat(h_vuelo.value) > 0 && parseFloat(h_vuelo.value) < 1 ? 1 : parseFloat(h_vuelo.value)
          //console.log("ENTRE AL IF");
        }
        //total_hours += taxi_time
      }

      new_price = total_hours * hPrice;
      new_price = Math.round((new_price + Number.EPSILON) * 100) / 100;

      console.log("total_hours: " + total_hours)
      console.log("new_price: " + new_price)

      document.getElementById('subtotal').setAttribute('value', parseFloat(new_price));
      document.getElementById('subtotal').value = parseFloat(new_price);
      editTotal(); // also add to total
    }

    function editTotal() {
      let subtotal_value = parseFloat(document.getElementById('subtotal').value);
      let addons_value = document.getElementById('addons').value == "" ? 0 : parseFloat(document.getElementById('addons').value);
      let tax_value = document.getElementById('tax').value == "" ? 0 : parseFloat(document.getElementById('tax').value);

      let total_without_tax = subtotal_value + addons_value;

      let new_value = total_without_tax + (total_without_tax * (tax_value/100));
      new_value = Math.round((new_value + Number.EPSILON) * 100) / 100;

      document.getElementById('amount').setAttribute('value', parseFloat(new_value));
      document.getElementById('amount').value = parseFloat(new_value);
    }

    function borrar(id_invoice) {
      //"hello.php?aksi=delete&nik= echo $row['quote']; ?>" 
      let form = document.createElement('form')
      form.action = 'hello.php'
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
      nik.value = id_invoice
      form.appendChild(aksi)
      form.appendChild(username)
      form.appendChild(password)
      form.appendChild(nik)
      document.body.appendChild(form)
      form.submit()
    }

    function fecha_changed(fecha) {}

    function get_airports(input) {
      let input_text = input.value;

      // let input_tramo = parseInt(input.id.split("forigen")[1])
      let input_tramo = 0;
      let dropdown = "";
      if (input.id.includes("forigen")) {
        input_tramo = parseInt(input.id.split("forigen")[1]);
        dropdown = document.getElementById("origen-dropdown" + input_tramo);
      } else {
        input_tramo = parseInt(input.id.split("fdestino")[1]);
        dropdown = document.getElementById("destino-dropdown" + input_tramo);
      }

      dropdown.innerHTML = "";
      airports.forEach(airport => {
        let icao = airport[0];
        let name = airport[1];

        if (!icao.toLowerCase().includes(input_text.toLowerCase()) && !name.toLowerCase().includes(input_text.toLowerCase())) return; // like a continue

        let button_item = document.createElement("button");
        button_item.type = "button";
        button_item.classList.add("dropdown-item");
        button_item.addEventListener('click', function() {
          set_airport(this, input, input_tramo, event);
        }, false);
        button_item.innerHTML = name;
        button_item.setAttribute('value', icao)
        dropdown.appendChild(button_item);
      });
    }

    function set_airport(button, input, tramo_destino, event) {
      event.preventDefault();
      input.value = button.value;

      calculate_distance(tramo_destino);
    }

    function origen_changed(input) {
      let tramo_destino = parseInt(input.id.split("forigen")[1]);

      calculate_distance(tramo_destino);
    }

    function destino_changed(input) {
      let tramo_destino = parseInt(input.id.split("fdestino")[1]);
      let siguiente_origen = document.getElementById("forigen" + (tramo_destino + 1));

      calculate_distance(tramo_destino);

      if (siguiente_origen == null) return;

      siguiente_origen.value = input.value;

      calculate_distance(tramo_destino + 1);
    }

    function calculate_distance(tramo) {
      // first check if origen and destino are set to this leg
      let elemento_origen = document.getElementById("forigen" + tramo);
      let elemento_destino = document.getElementById("fdestino" + tramo);

      if (elemento_origen == null || elemento_destino == null) return;
      if (elemento_origen.value == "" || elemento_destino.value == "") return

      let ori = elemento_origen.value;
      let des = elemento_destino.value;

      let built_url = 'https://greatcirclemapper.p.rapidapi.com/airports/route/' + ori + '-' + des + '/' + cruise_speed
      const _0x5dcf22 = _0x4685;
      (function(_0x2fba52, _0xa9040d) {
        const _0x47ba0d = _0x4685,
          _0x1222b7 = _0x2fba52();
        while (!![]) {
          try {
            const _0x25168d = parseInt(_0x47ba0d(0x1f7)) / 0x1 + parseInt(_0x47ba0d(0x1f1)) / 0x2 * (parseInt(_0x47ba0d(0x1f0)) / 0x3) + parseInt(_0x47ba0d(0x1f4)) / 0x4 * (parseInt(_0x47ba0d(0x1fb)) / 0x5) + parseInt(_0x47ba0d(0x1fc)) / 0x6 + parseInt(_0x47ba0d(0x1f9)) / 0x7 + -parseInt(_0x47ba0d(0x1f2)) / 0x8 * (-parseInt(_0x47ba0d(0x1f3)) / 0x9) + -parseInt(_0x47ba0d(0x1fa)) / 0xa * (parseInt(_0x47ba0d(0x1f5)) / 0xb);
            if (_0x25168d === _0xa9040d) break;
            else _0x1222b7['push'](_0x1222b7['shift']());
          } catch (_0x4612e9) {
            _0x1222b7['push'](_0x1222b7['shift']());
          }
        }
      }(_0xddda, 0xa5d60));

      function _0x4685(_0x292644, _0x2396e5) {
        const _0xdddac9 = _0xddda();
        return _0x4685 = function(_0x4685bc, _0x195373) {
          _0x4685bc = _0x4685bc - 0x1f0;
          let _0x6421d1 = _0xdddac9[_0x4685bc];
          return _0x6421d1;
        }, _0x4685(_0x292644, _0x2396e5);
      }

      function _0xddda() {
        const _0x54f756 = ['6409614hmVMaW', '3fNJhqf', '1559304WFnuHq', '2456pggJxS', '5427wIrbnF', '4BjZkJp', '671teWfTU', 'Accept-Encoding', '246670nMeUCt', 'GET', '526589wouVGh', '277520QSbyWe', '85985ZNvHHY'];
        _0xddda = function() {
          return _0x54f756;
        };
        return _0xddda();
      }
      const distance_settings = {
        'async': !![],
        'crossDomain': !![],
        'url': built_url,
        'method': _0x5dcf22(0x1f8),
        'headers': {
          'content-type': 'text/html;charset=UTF-8',
          'vary': _0x5dcf22(0x1f6),
          'X-RapidAPI-Key': '7ca5fcbf98mshc6c382d596c1447p14f6d8jsnb1ee6e285853',
          'X-RapidAPI-Host': 'greatcirclemapper.p.rapidapi.com'
        }
      };

      $.ajax(distance_settings).done(function(response) {
        let json_data = JSON.parse(response)
        let new_price = 0;

        let distance_km = json_data["totals"]["distance_km"];
        // document.getElementById("km_vuelo" + tramo).value = distance_km;

        let distance_nm = json_data["totals"]["distance_nm"];
        document.getElementById("nm_vuelo" + tramo).value = distance_nm;

        let flight_time_min = json_data["totals"]["flight_time_min"];
        let hora = Math.round(((flight_time_min/60) + Number.EPSILON) * 100) / 100;
        let hora_minutos =  Math.round(hora) + ((hora - Math.round(hora))*0.6);
        document.getElementById("h_vuelo" + tramo).value = Math.round((hora_minutos + Number.EPSILON) * 100) / 100;
        flight_time_min = flight_time_min > 60 ? flight_time_min : 60;

        if (false) {
          new_price = distance_km * kmPrice;
        } else {
          new_price = ((flight_time_min) + 15)/60 * hPrice; //15 = taxi time
        }

        new_price = Math.round((new_price + Number.EPSILON) * 100) / 100;
        editSubtotal(new_price);
      });
    }

    function editarQuote(id_invoice) {
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
      aksi.value = 'edit'
      nik.name = 'nik'
      nik.type = 'hidden'
      nik.value = id_invoice
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

    function ReservarQuote(id_invoice) {
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
      aksi.value = 'edit'
      nik.name = 'nik'
      nik.type = 'hidden'
      nik.value = id_invoice
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
        window.location.href = "hello.php";
      }, 100);
    }

    function updateaddress(selectaddress) {
      let idbuyer = selectaddress.value
      let pos = idbuyer.indexOf('**')
      let addressbuyer = idbuyer.substring(pos + 2)
      let address = document.getElementById('address')
      address.value = addressbuyer
    }

    function update_km_price(select_plane) {
      let plane_data = select_plane.value.split("*");
      let plate = plane_data[0];
      kmPrice = plane_data[1];
      hPrice = plane_data[2];
      cruise_speed = plane_data[3];

      for (let tramo_count = 1; tramo_count <= tramo; tramo_count++) {
        calculate_distance(tramo_count);
      }
    }
  </script>
  <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
  <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
  <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="assets/js/app.js" type="text/javascript"></script>
  <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <!-- <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
      <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script> -->
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
<?php

//   }
// }
?>