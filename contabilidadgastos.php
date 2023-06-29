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

<body>
  <nav class="navbar navbar-expand navbar-dark mai-top-header">
    <div class="container"><a class="paddingright-20" href="#">AI Soft V1.0</a>
      <ul class="nav navbar-nav mai-top-nav">
      </ul>
      <ul class="navbar-nav float-lg-right mai-icons-nav">
        <li class="dropdown nav-item mai-messages"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon s7-comment"></span></a>
          <ul class="dropdown-menu">
            <li>
              <div class="title">Messages</div>
              <div class="mai-scroller-messages">
                <div class="content">
                  <ul>
                    <li><a href="#">
                        <div class="img"><img src="assets/img/avatars/img1.jpg" alt="avatar"></div>
                        <div class="content"><span class="date">16 Sept</span><span class="name">Julio Sosa</span><span class="desc">message board en camino. </span></div>
                      </a></li>
                    <li><a href="#">
                        <div class="img"><img src="assets/img/avatars/img2.jpg" alt="Avatar"></div>
                        <div class="content"><span class="date">4 Sept</span><span class="name">Gustavo </span><span class="desc">dale play.</span></div>
                      </a></li>
                    <li><a href="#">
                        <div class="img"><img src="assets/img/avatars/img3.jpg" alt="Avatar"></div>
                        <div class="content"><span class="date">13 Aug</span><span class="name">Lupi</span><span class="desc">Dale, yo sigo trabajando en contenido.</span></div>
                      </a></li>
                    <li><a href="#">
                        <div class="img"><img src="assets/img/avatars/img4.jpg" alt="Avatar"></div>
                        <div class="content"><span class="date">13 Aug</span><span class="name">Julieta</span><span class="desc">Esta bueno esto.</span></div>
                      </a></li>
                  </ul>
                </div>
              </div>
              <div class="footer"><a href="#">View all messages</a></div>
            </li>
          </ul>
        </li>
        <li class="dropdown nav-item mai-notifications"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon s7-bell"></span><span class="indicator"></span></a>
          <ul class="dropdown-menu">
            <li>
              <div class="title">Notifications</div>
              <div class="mai-scroller-notifications">
                <div class="content">
                  <ul>
                    <li><a href="#">
                        <div class="icon"><span class="s7-check"></span></div>
                        <div class="content"><span class="desc">This is a new message for my dear friend <strong>Julio</strong>.</span><span class="date">10 minutes ago</span></div>
                      </a></li>
                    <li><a href="#">
                        <div class="icon"><span class="s7-add-user"></span></div>
                        <div class="content"><span class="desc">You have a new fiend request pending from <strong>Julieta</strong>.</span><span class="date">2 days ago</span></div>
                      </a></li>
                    <li><a href="#">
                        <div class="icon"><span class="s7-graph1"></span></div>
                        <div class="content"><span class="desc">Your site visits have increased <strong>15.5%</strong> more since the last week.</span><span class="date">2 hours ago</span></div>
                      </a></li>
                    <li><a href="#">
                        <div class="icon"><span class="s7-check"></span></div>
                        <div class="content"><span class="desc">This is a new message for my dear friend <strong>Rob</strong>.</span><span class="date">10 minutes ago</span></div>
                      </a></li>
                  </ul>
                </div>
              </div>
              <div class="footer"><a href="#">View all notifications</a></div>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav float-lg-right mai-user-nav">
        <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><img src="assets/img/avatar.jpg" alt="Avatar"><span class="user-name">Demo Account</span><span class="angle-down s7-angle-down"></span></a>
          <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#"><span class="icon s7-home"></span>My Account</a><a class="dropdown-item" href="menuprofile.php"><span class="icon s7-user"></span>Profile</a><a class="dropdown-item" href="menuprofile.php"><span class="icon s7-tools"></span>Settings</a><a class="dropdown-item" href="login.php"><span class="icon s7-power"></span>Log Out</a></div>
        </li>
      </ul>
    </div>
  </nav>

  <!--COMIENZO BOTONERA PRINCIPAL-->

  <div class="mai-wrapper">
  <nav class="navbar navbar-expand-lg mai-sub-header">
      <div class="container">
        <nav class="navbar navbar-expand-md">
          <button class="navbar-toggler hidden-md-up collapsed" type="button" data-toggle="collapse" data-target="#mai-navbar-collapse" aria-controls="mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-bar"><span></span><span></span><span></span></span></button>
          <div class="navbar-collapse collapse mai-nav-tabs" id="mai-navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-home"></span><span>Home</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="dashboard.php"><span class="icon s7-monitor"></span><span class="name">Dashboard</span></a>

                </ul>
              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-paper-plane"></span><span>Quote</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="javascript:loginuser()"><span class="icon s7-science"></span><span class="name">Cotizador</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="javascript:loginuserhellolist()"><span class="icon s7-albums"></span><span class="name">Base de Cotizaciones</span></a>
                  </li>
                </ul>

              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-users"></span><span>CRM</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="crmregistro.php"><span class="icon s7-user"></span><span class="name">Regristro</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="crm.php"><span class="icon s7-id"></span><span class="name">Base de contactos</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="aircraft_setup.php"><span class="icon s7-plane"></span><span class="name">Config. Aeronaves</span></a>
                  </li>
                  <li class="nav-item dropdown parent"><a class="nav-link" href="mail.html" data-toggle="dropdown"><span class="icon s7-mail"></span><span class="name">Mail</span></a>
                    <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item active" href="email-inbox.html">Inbox</a><a class="dropdown-item" href="email-detail.html">Detail</a><a class="dropdown-item" href="email-compose.html">Compose</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="nav-item parent open"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-portfolio"></span><span>Operaciones</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="opsmain.php"><span class="icon s7-diamond"></span><span class="name">Base de vuelos</span></a>
                  </li>

                </ul>
              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-piggy"></span><span>Contabilidad</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="contabilidadgastos.php"><span class="icon s7-box2"></span><span class="name">Gastos Generales</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="contabilidadingresos.php"><span class="icon s7-cash"></span><span class="name">Gastos Generales</span></a>
                  </li>

                </ul>
              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-display1"></span><span>Admin</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="charts-flot.html"><span class="icon s7-box2"></span><span class="name">Reporte General</span></a>
                  </li>
                </ul>
            </ul>
          </div>
        </nav>
      </div>
    </nav>

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
                      <h3 class="wizard-title">Ingreso de Gastos</h3>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Fecha</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="Date" placeholder="Seleccione Fecha">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Tipo de Gasto</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <select class="form-control custom-select" name="typeclient">
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
                      <input class="form-control" type="Text" placeholder="Ingrese el concepto">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Monto</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="Text" placeholder="Ingrese el monto ">
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
                      <input class="form-control" type="Text" placeholder="Ingrese el monto ">
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <div class="col-sm-7">
                      <label class="control-label">Fecha de Cambio</label>
                      <p>Aqui indicamos el la fecha en cual se efectuo la conversion</p>
                    </div>
                    <div class="col-sm-3 xs-pt-15">
                      <input class="form-control" type="Date" placeholder="Seleccione la fecha ">
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <div class="col-sm-7">
                      <label class="control-label">Moneda Utilizada</label>
                      <p>Aqui indicamos el gasto fue efectuado en que moneda</p>
                    </div>
                    <div class="col-sm-3 xs-pt-15">
                      <select class="form-control custom-select" name="typeclient">
                        <option value="Pesosarg" <?php if ($row['typeclient'] == 'Cliente Final') {
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
                      <h3 class="wizard-title">Sube el recibo al sistema</h3><span class="note">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-3 xs-pt-15">
                      <div class="main-content container">
                        <!-- <form class="dropzone" id="my-awesome-dropzone" action="assets/lib/dropzone/upload.php"> -->
                        <div class="dz-message">
                          <div class="icon"><span class="s7-cloud-upload"></span></div>
                          <h2>Drag and Drop files here</h2><span class="note">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                          <div class="dropzone-mobile-trigger needsclick"></div>
                        </div>
                        <!-- </form> -->
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
                  <th style="width:10%;">Tramo</th>
                  <th style="width:17%;">Fecha</th>
                  <th style="width:15%;">Concepto</th>
                  <th style="width:10%;">Tipo de Gasto</th>
                  <th style="width:13%;">Moneda de Cambio</th>
                  <th style="width:13%;">Monto</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // obtener gastos_generales y opstramo_gastos (gastos por tramo) usando join en la query
                $sql_gastos = 'select * from YAC.opstramo_gastos as og left join YAC.gastos_generales as gg on og.`quote`=gg.`quote`';
                $gastos = mysqli_query($con, $sql_gastos);
                while ($rowp = mysqli_fetch_assoc($gastos)) {
                ?>
                  <tr>
                    <td class="cell-detail">
                      <span><?php echo $rowp["tramo"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span class="date"><?php echo $rowp["date"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span><?php echo $rowp["concepto"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span><?php echo $rowp["moneda_cambio"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span><?php echo $rowp["tipogasto"] ?></span>
                    </td>
                    <td class="cell-detail">
                      <span>$<?php echo $rowp["monto"] ?></span>
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