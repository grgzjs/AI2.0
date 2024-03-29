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
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <title>AIS Gastos</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/fuelux/css/wizard.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/dropzone/dropzone.css" />
</head>

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<!-- <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/app.js" type="text/javascript"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="assets/js/login-check.js" type="text/javascript"></script>

<?php
if (isset($_POST['guardar_gasto'])) {
  $tipo_ingreso = $_POST['tipo_gasto'] ? $_POST['tipo_gasto'] : 'null';
  $referencia = $_POST['referencia']; // unused
  $concepto = $_POST['concepto'] != null ? $_POST['concepto'] : 'null';
  $monto = $_POST['monto'] != null ? $_POST['monto'] : 0;
  $fecha_gasto = $_POST['fecha_gasto'] != null ? $_POST['fecha_gasto'] : 'null';

  $cambio = $_POST['cambio'] == "Pesos Arg" ? "ARS" : "USD";
  $fecha_cambio = $_POST['fecha_cambio']; // unused
  $file = $_POST['file']; 
  // figure out where to save
  $sql = "insert into gastos_generales (`date`,`type`,`concept`,`amount`, moneda_cambio,`file`) values ('" . $fecha_gasto . "','" . $tipo_ingreso . "','" . $concepto . "'," . $monto . ",'" . $cambio . "','". $file ."')";

  mysqli_query($con, $sql);
  // clean post data
}
?>

<body>
<?php require_once("nav_header.html") ?>

  <!--COMIENZO BOTONERA PRINCIPAL-->

  <div class="mai-wrapper">
  <?php require_once("nav_header2.html") ?>

    <!--COMIENZO REGISTRACION PRINCIPAL-->

    <head>
      <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
      <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
      <link rel="stylesheet" type="text/css" href="assets/lib/fuelux/css/wizard.css" />
      <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
      <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
      <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
    </head>

    <body>
      <div class="main-content container">
        <div class="row wizard-row">
          <div class="col-md-12 fuelux">
            <div class="block-wizard">
              <div class="wizard wizard-ux" id="wizard1">
                <!-- <div class="steps-container">
                  <ul class="steps">
                    <li class="active" data-step="1">Step 1<span class="chevron"></span></li>
                    <li data-step="2">Step 2<span class="chevron"></span></li>
                    <li data-step="3">Step 3<span class="chevron"></span></li>
                  </ul>
                </div> -->
                <!-- <div class="actions">
                  <button class="btn btn-xs btn-prev btn-secondary" type="button"><i class="icon s7-angle-left"></i>Prev</button>
                  <button class="btn btn-xs btn-next btn-secondary" type="button" data-last="Finish">Next<i class="icon s7-angle-right"></i></button>
                </div> -->
                <div class="step-content">
                  <!-- <div class="step-pane active" data-step="1"> -->
                  <!-- <div class="container pl-sm-7"> -->
                  <!-- <form class="form-horizontal group-border-dashed" action="#" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate=""> -->
                  <div class="form-group row">
                    <div class="offset-sm-3 col-sm-9">
                      <h3 class="wizard-title">Gastos Generales</h3>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Fecha</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input required id="fecha" class="form-control" type="Date" placeholder="Seleccione Fecha">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Tipo de Gasto</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <select required id="tipo_gasto" class="form-control custom-select" name="typeclient">
                        <option value="Generales" <?php if ($row['typeclient'] == 'Cliente Final') {
                                                    echo 'selected';
                                                  } ?>>Generales</option>
                        <option value="Administrativos" <?php if ($row['typeclient'] == 'Broker') {
                                                          echo 'selected';
                                                        } ?>>Administrativos</option>
                        <option value="Administrativos" <?php if ($row['typeclient'] == 'Broker') {
                                                          echo 'selected';
                                                        } ?>>Aeronave</option>
                        <option value="Administrativos" <?php if ($row['typeclient'] == 'Broker') {
                                                          echo 'selected';
                                                        } ?>>Comercializacion</option>
                        <option value="Corporativo" <?php if ($row['typeclient'] == 'Corporativo') {
                                                      echo 'selected';
                                                    } ?>>Corporativo</option>
                        <option value="Proveedor" <?php if ($row['typeclient'] == 'Proveedor') {
                                                    echo 'selected';
                                                  } ?>>Proveedor</option>
                        <option value="Otros" <?php if ($row['typeclient'] == 'Empleados') {
                                                echo 'selected';
                                              } ?>>Otros</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Concepto</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input required id="concepto" class="form-control" type="Text" placeholder="Ingrese el concepto">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Monto</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input required id="monto" class="form-control" type="Text" placeholder="Ingrese el monto ">
                    </div>
                  </div>
                  <!-- <div class="form-group row pt-3">
                      <div class="col-sm-12">
                        <button class="btn btn-secondary btn-space">Cancel</button>
                        <button class="btn btn-primary btn-space wizard-next" data-wizard="#wizard1">Next Step</button>
                      </div>
                    </div> -->
                  <!-- </form> -->
                  <!-- </div> -->
                  <!-- </div> -->

                  <!-- <div class="step-pane" data-step="2"> -->
                  <!-- <form class="group-border-dashed" action="#" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate=""> -->
                  <div class="form-group row">
                    <div class="col-sm-7">
                      <h3 class="wizard-title">Tipo de Cambio</h3>
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <div class="col-sm-7">
                      <label class="control-label">Tipo de Cambio oficial</label>
                      <p>Aqui indicamos el cambio dolar actual</p>
                    </div>
                    <div class="col-sm-3 xs-pt-15">
                      <input required id="monto_cambio" class="form-control" type="Text" placeholder="Ingrese el monto ">
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <div class="col-sm-7">
                      <label class="control-label">Fecha de Cambio</label>
                      <p>Aqui indicamos el la fecha en cual se efectuo la conversion</p>
                    </div>
                    <div class="col-sm-3 xs-pt-15">
                      <input required id="fecha_cambio" class="form-control" type="Date" placeholder="Seleccione la fecha ">
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <div class="col-sm-7">
                      <label class="control-label">Moneda Utilizada</label>
                      <p>Aqui indicamos el gasto fue efectuado en que moneda</p>
                    </div>
                    <div class="col-sm-3 xs-pt-15">
                      <select required id="cambio" class="form-control custom-select" name="typeclient">
                        <option value="Pesos Arg" <?php if ($row['typeclient'] == 'Cliente Final') {
                                                    echo 'selected';
                                                  } ?>>Pesos Arg</option>
                        <option value="Usdollar" <?php if ($row['typeclient'] == 'Broker') {
                                                    echo 'selected';
                                                  } ?>>Dolares</option>
                      </select>
                    </div>
                  </div>

                  <!-- <div class="form-group row pt-3">
                    <div class="col-sm-12">
                      <button class="btn btn-secondary btn-space wizard-previous" data-wizard="#wizard1">Previous</button>
                      <button class="btn btn-primary btn-space wizard-next" data-wizard="#wizard1">Next Step</button>
                    </div>
                  </div> -->
                  <!-- </form> -->
                  <!-- </div> -->

                  <!-- <div class="step-pane" data-step="3"> -->
                  <!-- <form class="form-horizontal group-border-dashed" action="#" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate=""> -->
                  <div class="form-group row">
                    <div class="col-sm-7">
                      <h3 class="wizard-title">Sube el recibo al sistema</h3>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-12 xs-pt-15">
                      <div class="main-content container">
                      <input type="file" id="gastos" name="gastos" style="display:none" accept="image/*">
                        <form class="dropzone" id="my-awesome-dropzone" style="cursor:pointer;justify-content:center;text-align:center">
                        <label for="gastos" style="cursor:pointer;">
                          <div class="dz-message">
                            <div class="icon"><span class="s7-cloud-upload"></span></div>
                            <h2>Search and select files here</h2>
                            <div id="needsclick" class="dropzone-mobile-trigger needsclick"></div>
                          </div>
                        </label>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div>
                    <button class="btn btn-space btn-primary" onclick="javascript:save_all()">Guardar Gasto General</button>
                  </div>

                  <!-- <div class="form-group row">
                    <div class="col-sm-12">
                      <button class="btn btn-secondary btn-space wizard-previous" data-wizard="#wizard1">Previous</button>
                      <button class="btn btn-success btn-space wizard-next" data-wizard="#wizard1">Complete</button>
                    </div>
                  </div> -->
                  <!-- </form> -->
                  <!-- </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <!--COMIENZO LISTA PRINCIPAL-->

  <div class="main-content container">
    <div class="row">
      <div class="col-12 card card-default card-table">
        <div class="card-body">
          <div class="noSwipe">
            <table class="table table-striped table-hover ma-table-responsive" id="table1">
              <thead>
                <tr>
                  <th style="width:17%;">Fecha</th>
                  <th style="width:15%;">Concepto</th>
                  <th style="width:10%;">Tipo de Gasto</th>
                  <th style="width:13%;">Moneda de Cambio</th>
                  <th style="width:13%;">Monto</th>
                  <th style="width:10%;">Archivo</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // obtener gastos_generales y opstramo_gastos (gastos por tramo) usando join en la query
                $sql_gastos_tramo = 'select * from opstramo_gastos';
                $gastos_tramo = mysqli_query($con, $sql_gastos_tramo);
                while ($rowp = mysqli_fetch_assoc($gastos_tramo)) {
                ?>
                  <tr>
                    <td class="cell-detail">
                      <span class="date"><?php echo $rowp["date"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span><?php echo $rowp["concepto"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span><?php echo $rowp["tipogasto"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span><?php echo $rowp["moneda_cambio"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span>$<?php echo $rowp["monto"] ?></span>
                    </td>
                    
                  </tr>
                <?php
                }

                $sql_gastos_generales = 'select * from gastos_generales';
                $gastos_generales = mysqli_query($con, $sql_gastos_generales);
                while ($rowp = mysqli_fetch_assoc($gastos_generales)) {
                  $file_exists = $rowp["file"];
                ?>
                  <tr>
                    <td class="cell-detail">
                      <span class="date"><?php echo $rowp["date"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span><?php echo $rowp["concept"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span><?php echo $rowp["type"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span><?php echo $rowp["moneda_cambio"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span>$<?php echo $rowp["amount"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <?php
                      if($file_exists !=""){
                        echo '<a style="font-size:1.5rem" href="gastos/'.$rowp["file"].'" download="'.$rowp["file"].'">
                        <span class="icon s7-file"></span>
                      </a>';
                      }
                      ?>
                      
                    </td>
                  </tr>
                <?php
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
  <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
  <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
  <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="assets/js/app.js" type="text/javascript"></script>
  <script src="assets/lib/fuelux/js/wizard.js" type="text/javascript"></script>
  <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
  <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
  <script src="assets/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
  <script src="assets/lib/dropzone/dropzone.js" type="text/javascript"></script>
  <script src="assets/js/app-form-wizard.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      //-initialize the javascript
      App.init();
      App.wizard();
    });

   
 
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



    function save_all() {
      let end_point = "reception_area_query.php";
      let form_data = new FormData();
      let input_file = document.getElementById("gastos");
      form_data.append("gastos_file", input_file.files[0]);
      fetch(end_point, {
        method: "POST",
        body: form_data
      }).then(()=>{
        
      let form = document.createElement('form')

// let tramo = document.createElement('input')
// tramo.value = document.getElementById('tramo_reserva').value
// tramo.name = 'tramo_reserva'

let tipo_ingreso = document.createElement('input')
tipo_ingreso.value = document.getElementById('tipo_gasto').value
tipo_ingreso.name = 'tipo_gasto'
// let referencia = document.createElement('input')
// referencia.value = document.getElementById('referencia').value
// referencia.name="referencia"
let concepto = document.createElement('input')
concepto.value = document.getElementById('concepto').value
concepto.name = "concepto"
let monto = document.createElement('input')
monto.value = document.getElementById('monto').value
monto.name = "monto"
let fecha_gasto = document.createElement('input')
fecha_gasto.value = document.getElementById('fecha').value
fecha_gasto.name = "fecha_gasto"

let cambio = document.createElement('input')
cambio.value = document.getElementById('cambio').value
cambio.name = "cambio"
let fecha_cambio = document.createElement('input')
fecha_cambio.value = document.getElementById('fecha_cambio').value
fecha_cambio.name = "fecha_cambio"
let file = document.createElement('input')
file.value = input_file.files[0].name
file.name = "file"
console.log("cree el archivo con: "+input_file.files[0].name)
let button1 = document.createElement('button')
button1.name = 'guardar_gasto'

// form.appendChild(tramo)

form.appendChild(tipo_ingreso)
// form.appendChild(referencia)
form.appendChild(concepto)
form.appendChild(monto)
form.appendChild(fecha_gasto)

form.appendChild(cambio)
form.appendChild(fecha_cambio)
form.appendChild(file)
form.appendChild(button1)

document.body.appendChild(form)
form.action = 'contabilidadgastos.php'
form.method = 'post'
// form.submit()
button1.click()
      }).catch(console.error);


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
  </script>
</body>

</html>