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
  <title>AIS Ingresos</title>
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
<script src="assets/js/user-validation.js" type="text/javascript"></script>

<?php
if (isset($_POST['guardar_ingreso'])) {
  $tipo_ingreso = $_POST['tipo_ingreso'] ? $_POST['tipo_ingreso'] : '-';
  $referencia = $_POST['referencia']; // unused
  $concepto = $_POST['concepto'] != null ? $_POST['concepto'] : '-';
  $monto = $_POST['monto'] != null ? $_POST['monto'] : 0;
  $fecha_gasto = $_POST['fecha_gasto'] != null ? $_POST['fecha_gasto'] : '-';

  // $cambio = $_POST['cambio'] == "Pesos Mex" ? "MXN" : "USD";
  $cambio = $_POST['cambio'];
  $file = $_POST['file'];

  if ($fecha_gasto != "-") {
    $sql = "insert into ingresos_generales (`date`,`tipoingreso`,`concepto`,`monto`, `moneda_cambio`,`file`) values ('" . $fecha_gasto . "','" . $tipo_ingreso . "','" . $concepto . "'," . $monto . ",'" . $cambio . "','" . $file . "')";
  }
  else {
    $sql = "insert into ingresos_generales (`tipoingreso`,`concepto`,`monto`, `moneda_cambio`,`file`) values ('" . $tipo_ingreso . "','" . $concepto . "'," . $monto . ",'" . $cambio . "','" . $file . "')";
  }

  mysqli_query($con, $sql);
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
                  <!-- <div class="container pl-sm-5"> -->
                  <!-- <form class="form-horizontal group-border-dashed" action="#" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate=""> -->
                  <div class="form-group row">
                    <div class="offset-sm-3 col-sm-9">
                      <h3 class="wizard-title">Ingresos Generales</h3>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Fecha</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input required id="fecha" class="form-control" type="Date" placeholder="Seleccione Fecha">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Tipo de Ingreso</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <select required id="tipo_ingreso" class="form-control custom-select" name="typeclient" onchange="check_type(this)">
                        <option value="Administrativos" <?php if ($row['typeclient'] == 'Broker') {
                                                          echo 'selected';
                                                        } ?>>Administracion</option>
                        <option value="Cotizaciones" <?php if ($row['typeclient'] == 'Cliente Final') {
                                                        echo 'selected';
                                                      } ?>>Cotización</option>
                        <option value="Corporativo" <?php if ($row['typeclient'] == 'Corporativo') {
                                                      echo 'selected';
                                                    } ?>>Corporativo</option>
                        <option value="Otros" <?php if ($row['typeclient'] == 'Empleados') {
                                                echo 'selected';
                                              } ?>>Otros</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row" id="quote-selector-container">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Concepto</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <select required class="form-control custom-select" id="concepto-quote">
                        <?php
                        $get_invoices_query = mysqli_query($con, "SELECT i.quote, c.first_name, c.last_name, c.id FROM invoices AS i LEFT JOIN Contact AS c ON i.buyer_id=c.id");
                        while ($invoice_row = mysqli_fetch_assoc($get_invoices_query)) {
                          echo "<option value='Quote#" . $invoice_row['quote'] . "'>#" . $invoice_row['quote'] . " (" . $invoice_row['first_name'] . " " . $invoice_row['last_name'] . ")</option>";
                        }
                        // <option value="Generales">Generales</option>
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row" id="concept-container">
                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Concepto</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input required id="concepto-regular" class="form-control" type="Text" placeholder="Ingrese el concepto">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Monto</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input required id="monto" class="form-control" type="Text" placeholder="Ingrese el monto ">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Moneda</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <!-- <input required id="monto" class="form-control" type="Text" placeholder="Ingrese el monto "> -->
                      <select required class="form-control custom-select" id="moneda_cambio" name="typeclient">
                        <?php
                          $get_currencies_query = mysqli_query($con, "SELECT moneda FROM currency");
                          while ($currency_row = mysqli_fetch_assoc($get_currencies_query)) {
                            echo "<option value='" . $currency_row['moneda'] . "'>" . $currency_row['moneda'] . "</option>";
                          }
                          // <option value="Generales">Generales</option>
                        ?>
                      </select>
                    </div>
                  </div>

                  <!-- <div class="step-pane" data-step="2"> -->
                  <!-- <form class="group-border-dashed" action="#" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate=""> -->
                  <!-- <div class="form-group row">
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
                      <input required class="form-control" type="Text" placeholder="Ingrese el monto ">
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
                      <select required id="moneda_cambio" class="form-control custom-select" name="typeclient">
                        <option value="Pesos Mex">Pesos Mex</option>
                        <option value="Usdollar">Dolares</option>
                      </select>
                    </div>
                  </div> -->

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
                        <input type="file" id="ingreso" name="ingreso" style="display:none" accept="image/*">
                        <form class="dropzone" id="my-awesome-dropzone" style="cursor:pointer;justify-content:center;text-align:center">
                          <label for="ingreso" style="cursor:pointer;">
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
                    <button class="btn btn-space btn-primary" onclick="javascript:save_all()">Guardar Ingreso</button>
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
      <div class="col-12">
        <div class="card card-default card-table">
          <!-- <div class="row table-filters-container">
            <div class="col-12 col-lg-12 col-xl-6">
              <div class="row">
                <div class="col-12 col-md-6 col-lg-6 table-filters pb-0 pb-xl-4"><span class="table-filter-title">Milestone progress</span>
                  <div class="filter-container">
                    <form>
                      <label class="control-label d-block"><span id="slider-value">0% - 100%</span></label>
                      <input class="bslider form-control" id="milestone_slider" type="text" data-slider-value="[0,100]" data-slider-step="1" data-slider-max="100" data-slider-min="0" value="50">
                    </form>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 table-filters pb-0 pb-xl-4"><span class="table-filter-title">Proyect</span>
                  <div class="filter-container">
                    <label class="control-label">Select a proyect:</label>
                    <form>
                      <select class="select2">
                        <option value="All">All</option>
                        <option value="Bootstrap">Bootstrap Admin</option>
                        <option value="CLI">CLI Connector</option>
                        <option value="Back-end">Back-end Manager</option>
                      </select>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-6">
              <div class="row">
                <div class="col-12 col-md-6 col-lg-6 table-filters pb-0 pb-xl-4"><span class="table-filter-title">Date</span>
                  <div class="filter-container">
                    <form>
                      <div class="row">
                        <div class="col-6">
                          <label class="control-label">Since:</label>
                          <input class="form-control form-control-sm datepicker" id="dateSince" type="text">
                        </div>
                        <div class="col-6">
                          <label class="control-label">To:</label>
                          <input class="form-control form-control-sm datepicker" id="dateTo" type="text">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 table-filters pb-xl-4"><span class="table-filter-title">Status</span>
                  <div class="filter-container">
                    <form>
                      <div class="row">
                        <div class="col-6">
                          <div class="custom-controls-stacked">
                            <label class="custom-control custom-checkbox">
                              <input class="custom-control-input" id="toDo" type="checkbox"><span class="custom-control-label">To Do</span>
                            </label>
                            <label class="custom-control custom-checkbox">
                              <input class="custom-control-input" id="inReview" type="checkbox"><span class="custom-control-label">In review</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="custom-controls-stacked">
                            <label class="custom-control custom-checkbox">
                              <input class="custom-control-input" id="inProgress" type="checkbox"><span class="custom-control-label">In progress</span>
                            </label>
                            <label class="custom-control custom-checkbox">
                              <input class="custom-control-input" id="done" type="checkbox"><span class="custom-control-label">Done</span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="card-body">
            <div class="noSwipe">
              <table class="table table-striped table-hover ma-table-responsive" id="table1">
                <thead>
                  <tr>
                    <th style="width:17%;">Fecha</th>
                    <th style="width:15%;">Concepto</th>
                    <th style="width:10%;">Tipo de Ingreso</th>
                    <th style="width:13%;">Moneda de Cambio</th>
                    <th style="width:13%;">Monto</th>
                    <th style="width:10%;">Archivo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql_ingresos = 'select *,DATE_FORMAT(date, "%d/%m/%Y") as spanish_date from ingresos_generales';
                  $ingresos = mysqli_query($con, $sql_ingresos);
                  while ($rowp = mysqli_fetch_assoc($ingresos)) {
                    $file_exists = $rowp["file"];
                  ?>
                    <tr>
                      <td class="cell-detail">
                        <span class="date"><?php echo $rowp["spanish_date"] ?></span>
                      </td>
                      <td class="cell-detail">
                        <span><?php echo $rowp["concepto"] ?></span>
                      </td>
                      <td class="cell-detail">
                        <span><?php echo $rowp["tipoingreso"] ?></span>
                      </td>
                      <td class="cell-detail">
                        <span><?php echo $rowp["moneda_cambio"] ?></span>
                      </td>
                      <td class="cell-detail">
                        <span>$<?php echo $rowp["monto"] ?></span>
                      </td>
                      <td class="cell-detail">
                        <?php
                        if ($file_exists != "") {
                          echo '<a style="font-size:1.5rem" href="ingresos/' . $rowp["file"] . '" download="' . $rowp["file"] . '">
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

    var concept_type = "regular";

    check_type(""); // defaults the selector value

    function check_type(selected_type) {
      if (selected_type.value == "Cotizaciones") {
        // $("#quote-selector-container").show();
        // $("#concept-container").hide();
        document.getElementById("concept-container").setAttribute("hidden", "")
        document.getElementById("quote-selector-container").removeAttribute("hidden")
        concept_type = "quote"
      } else {
        // $("#quote-selector-container").hide();
        // $("#concept-container").show();
        document.getElementById("concept-container").removeAttribute("hidden")
        document.getElementById("quote-selector-container").setAttribute("hidden", "")
        concept_type = "regular"
      }
    }

    function save_all() {

      let end_point = "reception_area_query.php";
      let form_data = new FormData();
      let input_file = document.getElementById("ingreso");
      form_data.append("ingreso_file", input_file.files[0]);
      fetch(end_point, {
        method: "POST",
        body: form_data
      }).then(() => {
        let form = document.createElement('form')

        // let tramo = document.createElement('input')
        // tramo.value = document.getElementById('tramo_reserva').value
        // tramo.name = 'tramo_reserva'

        let tipo_ingreso = document.createElement('input')
        tipo_ingreso.value = document.getElementById('tipo_ingreso').value
        tipo_ingreso.name = 'tipo_ingreso'
        // let referencia = document.createElement('input')
        // referencia.value = document.getElementById('referencia').value
        // referencia.name="referencia"

        let concepto = document.createElement('input')
        if (concept_type == "regular") {
          concepto.value = document.getElementById('concepto-regular').value
        } else if (concept_type == "quote") {
          concepto.value = document.getElementById('concepto-quote').value
        }
        concepto.name = "concepto"

        let monto = document.createElement('input')
        monto.value = document.getElementById('monto').value
        monto.name = "monto"
        let fecha_gasto = document.createElement('input')
        fecha_gasto.value = document.getElementById('fecha').value
        fecha_gasto.name = "fecha_gasto"

        let cambio = document.createElement('input')
        cambio.value = document.getElementById('moneda_cambio').value
        cambio.name = "cambio"

        // let fecha_cambio = document.createElement('input')
        // fecha_cambio.value = document.getElementById('fecha_cambio').value
        // fecha_cambio.name = "fecha_cambio"

        let file = document.createElement('input')
        file.value = input_file.files[0].name
        file.name = "file"
        let button1 = document.createElement('button')
        button1.name = 'guardar_ingreso'

        // form.appendChild(tramo)

        form.appendChild(tipo_ingreso)
        // form.appendChild(referencia)
        form.appendChild(concepto)
        form.appendChild(monto)
        form.appendChild(fecha_gasto)

        form.appendChild(cambio)
        // form.appendChild(fecha_cambio)
        form.appendChild(file)
        form.appendChild(button1)

        document.body.appendChild(form)
        form.action = 'contabilidadingresos.php'
        form.method = 'post'
        // form.submit()
        let user_type = localStorage.getItem("user_type");
        let email = localStorage.getItem("email");
        let username = localStorage.getItem("username");
        $.ajax({
          url: "logs_query.php?email=" + email + "&username=" + username + "&role=" + user_type + "&action='registered income'", // your php file
          type: "GET"
        });

        button1.click()
      }).catch(console.error);


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
  </script>
</body>

</html>