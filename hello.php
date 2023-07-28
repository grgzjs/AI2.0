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
<!-- <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/app.js" type="text/javascript"></script> -->

<script src="assets/js/login-check.js" type="text/javascript"></script>

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
              <li class="nav-item parent open"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-paper-plane"></span><span>Quote</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="hello.php"><span class="icon s7-science"></span><span class="name">Cotizador</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="hellolist.php"><span class="icon s7-albums"></span><span class="name">Lista de Cotizaciones</span></a>
                  </li>

                </ul>
              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-users"></span><span>CRM</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="crmregistro.php"><span class="icon s7-user"></span><span class="name">Regristro</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="crm.php"><span class="icon s7-id"></span><span class="name">Lista de Contactos </span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="aircraft_setup.php"><span class="icon s7-plane"></span><span class="name">Config. Aeronaves</span></a>
                  </li>
                  <!-- <li class="nav-item dropdown parent"><a class="nav-link" href="crmemail.php" data-toggle="dropdown"><span class="icon s7-mail"></span><span class="name">Mail</span></a>
                        <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item active" href="crmemail.php">Inbox</a><a class="dropdown-item" href="crmemail.php">Detail</a><a class="dropdown-item" href="crmemail.php">Compose</a>
                        </div>
                      </li> -->

                </ul>
              </li>

              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-portfolio"></span><span>Operaciones</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="opsmain.php"><span class="icon s7-diamond"></span><span class="name">Lista de Vuelos</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="ops_calendar.php"><span class="icon s7-diamond"></span><span class="name">Calendario</span></a>
                  </li>
                </ul>
              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-piggy"></span><span>Contabilidad</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="contabilidadgastos.php"><span class="icon s7-box2"></span><span class="name">Gastos Gral</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="contabilidadingresos.php"><span class="icon s7-cash"></span><span class="name">Gastos Gral</span></a>
                  </li>
                </ul>
                <!-- <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-display1"></span><span>Admin</span></a>
                    <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                      <li class="nav-item"><a class="nav-link" href="charts-flot.html"><span class="icon s7-box2"></span><span class="name">Reporte General</span></a>
                      </li>
                    </ul> -->


            </ul>

            </ul>
          </div>
        </nav>
        <!--<div class="search">
            <input type="text" placeholder="Search..." name="q"><span class="s7-search"></span>
          </div>-->
      </div>
    </nav>
    <div class="main-content container">

      <?php
      echo '<script>console.log("hello loaded")</script>';
      // SECCION DE BORRAR Y EDITAR
      $sqllist = "select * from invoices";
      $rows = mysqli_query($con, $sqllist);


      if (isset($_POST['username']) && ($_POST['aksi'] == 'delete' || $_POST['aksi'] == 'edit')) {
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
        $nik = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES)));
        $edit = mysqli_query($con, "select * from invoices WHERE quote=$nik");
        if ($edit) {
          $rowedit = mysqli_fetch_assoc($edit);;
          //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
        } else {
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, Data cannot be deleted.</div>';
        }
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
            <form id="quote-form"> <!-- action="report.php" method="post" > -->
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
                  ?>
                    <input class="form-control" type='text' name='buyer' value="<?php echo $rowbuyer['first_name'] . ' ' . $rowbuyer['last_name']; ?>" readonly='readonly'>
                  <?php
                  } else {
                  ?>
                    <select id="name-select" name="buyer" class="form-control custom-select" onblur="updateaddress(this)">
                      <?php
                      while ($rowbuyer = mysqli_fetch_assoc($buyers)) {
                      ?>
                        <option value="<?php echo $rowbuyer['id'] . '**' . $rowbuyer['address']; ?>"><?php echo $rowbuyer['first_name'] . ' ' . $rowbuyer['last_name']; ?>
                        </option>
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
                    $queryBuyer = "select * from Contact where id=" . $idbuyer;
                    $buyers = mysqli_query($con, $queryBuyer);
                  ?>
                    <input class="form-control" type="text" value="<?php echo $rowbuyer['address']; ?>" placeholder="<?php echo $rowbuyer['address']; ?>" name="address" id="address">
                    <!-- <input class="form-control" type='text' name='buyer' value="<?php //echo $rowbuyer['first_name'] . ' ' . $rowbuyer['last_name']; 
                                                                                      ?>" readonly='readonly'> -->
                  <?php
                  } else {
                  ?>
                    <input class="form-control" type="text" value="<?php echo $rowbuyer['address']; ?>" placeholder="<?php echo $rowbuyer['address']; ?>" name="address" id="address" disabled>
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
                  <select name='aircraft' class="form-control custom-select" id="aircraft" onblur="update_km_price(this)">
                    <?php
                    while ($rowaircraft = mysqli_fetch_assoc($aircraft)) {
                    ?>
                      <option value="<?php echo $rowaircraft['matricula'] . '*' . $rowaircraft['preciokm'] ?>">
                        <?php echo $rowaircraft['matricula']; ?>
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
                  <div class="col-12 col-sm-8 col-lg-1 center-text">KM</div>
                </div>
                <?php
                if (isset($_POST['aksi']) && $_POST['aksi'] == 'edit') {
                  $nik = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES)));
                  $edit = mysqli_query($con, "select * from invoices WHERE quote=$nik");
                  if ($edit) {
                    $editdetail = mysqli_query($con, "select * from invoice_detail WHERE id_invoice=$nik");
                    $i = 0;
                    while ($rowdetail = mysqli_fetch_assoc($editdetail)) {
                      //$i esta hecho para view y reveer el pdf
                      $i++;
                ?>
                      <div class="form-group row">
                        <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                        <div class="col-12 col-sm-8 col-lg-2">
                          <input class="form-control" type="date" value="<?php echo $rowdetail['fecha']; ?>" placeholder="Fecha" name="<?php echo 'fdateh' . $i; ?>">
                        </div>

                        <div class="col-12 col-sm-8 col-lg-2">
                          <input class="form-control" type="text" value="<?php echo $rowdetail['origen']; ?>" placeholder="origen" name="<?php echo 'forigenh' . $i; ?>">
                        </div>
                        <div class="col-12 col-sm-8 col-lg-2">
                          <input class="form-control" type="text" value="<?php echo $rowdetail['destino']; ?>" placeholder="destino" name="<?php echo 'fdestinoh' . $i; ?>">
                        </div>
                        <div class="col-12 col-sm-8 col-lg-1">
                          <input class="form-control" type="text" value="<?php echo $rowdetail['pax']; ?>" placeholder="pax" name="<?php echo 'fpaxh' . $i; ?>">
                        </div>
                        <div class="col-12 col-sm-8 col-lg-1">
                          <input class="form-control" type="text" value="<?php echo $rowdetail['km_vuelo']; ?>" placeholder="kms" name="<?php echo 'km_vueloh' . $i; ?>" id="<?php echo 'km_vueloh' . $i; ?>">
                        </div>
                      </div>
                <?php
                    }
                  }
                }
                //if(!$edit)
                ?>

                <div class="form-group row" id="tramo-1">
                  <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                  <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="date" placeholder="fecha" name="fdate1" id="fdate1">
                  </div>
                  <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" placeholder="origen" name="forigen1" id="forigen1">
                  </div>
                  <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" placeholder="destino" name="fdestino1" id="fdestino1">
                  </div>
                  <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" placeholder="pax" name="fpax1">
                  </div>
                  <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" placeholder="kms" name="km_vuelo1" id="km_vuelo1" onchange="editSubtotal(this.value)">
                  </div>
                  <button id="add-tramo-btn" class="btn btn-primary" onclick='javascript:add_tramo()' type="button">
                    <img src="assets/img/icons/icono-11.png" alt="" class="ai-icon">
                  </button>
                  <button id="delete-tramo-btn" class="btn btn-danger" onclick='javascript:delete_tramo()' type="button" style="display: none">
                    <img src="assets/img/icons/icono-9.png" alt="" class="ai-icon">
                  </button>
                </div>

              </div>

              <hr>
              <br>

              <div class="form-group row">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">Subtotal:</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <input class="form-control" type="text" value="0" placeholder="subtotal" name="subtotal" id="subtotal" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">Adicionales:</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <input class="form-control" type="text" value="<?php echo $rowedit['addons']; ?>" placeholder="addons" name="addons" id="addons" onchange="editTotal(this.value)">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">Impuesto:</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <input class="form-control" type="text" value="<?php echo $rowedit['tax']; ?>" placeholder="tax" name="tax" id="tax" onchange="editTotal(this.value)">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">Total:</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <input class="form-control" type="text" value="0" placeholder="amount" name="amount" id="amount" readonly>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 col-sm-8 col-lg-6">
                  <input class="form-control" type="hidden" value="<?php echo $rowedit['quote']; ?>" placeholder="idpdf" name="idpdf" id="idpdf">
                </div>



                <div class="col-lg-6 pb-4 pb-lg-0">
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                  <p class="text-right">
                    <button class="btn btn-space btn-primary" name="save" type="submit">Procesar</button>
                    <button class="btn btn-space btn-secondary">Cancelar</button>
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
    var tramo = 1;

    $('#quote-form').on('submit', function(e) {
      e.preventDefault();
      // alert($(this).serialize());
      $.post('report.php', $(this).serialize());
      location.reload();
    });

    function add_tramo() {
      tramo++;

      // let form_container = document.getElementById('quote-form');

      // can be limited using 'tramo'
      let master_container = document.getElementById('form-container')
      // form_container.appendChild(master_container)

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
      date_input.type = 'date'
      date_input.placeholder = 'fecha'
      date_input.name = 'fdate' + tramo
      date_input.id = 'fdate' + tramo
      date_input.min = document.getElementById('fdate' + (tramo - 1)).value;

      let origen_div = document.createElement('div')
      new_container.appendChild(origen_div)
      let origen_input = document.createElement('input')
      origen_div.appendChild(origen_input)

      origen_div.classList.add('col-12', 'col-sm-8', 'col-lg-2')
      origen_input.classList.add('form-control')
      origen_input.type = 'text'
      origen_input.placeholder = 'origen'
      origen_input.name = 'forigen' + tramo
      origen_input.id = 'forigen' + tramo
      origen_input.value = document.getElementById('fdestino' + (tramo - 1)).value

      let destino_div = document.createElement('div')
      new_container.appendChild(destino_div)
      let destino_input = document.createElement('input')
      destino_div.appendChild(destino_input)

      destino_div.classList.add('col-12', 'col-sm-8', 'col-lg-2')
      destino_input.classList.add('form-control')
      destino_input.type = 'text'
      destino_input.placeholder = 'destino'
      destino_input.name = 'fdestino' + tramo
      destino_input.id = 'fdestino' + tramo
      // destino_input.value = document.getElementById('forigen' + (tramo - 1)).value

      let pax_div = document.createElement('div')
      new_container.appendChild(pax_div)
      let pax_input = document.createElement('input')
      pax_div.appendChild(pax_input)

      pax_div.classList.add('col-12', 'col-sm-8', 'col-lg-1')
      pax_input.classList.add('form-control')
      pax_input.type = 'text'
      pax_input.placeholder = 'pax'
      pax_input.name = 'fpax' + tramo

      let km_div = document.createElement('div')
      new_container.appendChild(km_div)
      let km_input = document.createElement('input')
      km_div.appendChild(km_input)

      km_div.classList.add('col-12', 'col-sm-8', 'col-lg-1')
      km_input.classList.add('form-control')
      km_input.type = 'text'
      km_input.placeholder = 'kms'
      km_input.name = 'km_vuelo' + tramo
      km_input.id = 'km_vuelo' + tramo
      // km_input.onchange = editSubtotal(this.value)
      km_input.addEventListener('change', function() {
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
      let add_tramo_bnt = document.getElementById('add-tramo-btn')
      let delete_tramo_bnt = document.getElementById('delete-tramo-btn')

      let prev_container = document.getElementById("tramo-" + (tramo - 1))
      prev_container.appendChild(add_tramo_bnt)
      prev_container.appendChild(delete_tramo_bnt)

      let last_container = document.getElementById("tramo-" + tramo)
      last_container.remove() // delete the new container

      tramo--

      if (tramo == 1) {
        delete_tramo_bnt.style.display = "none";
      }
    }

    kmPrice = 0

    function editSubtotal(newPrice) {
      newPrice *= kmPrice
      document.getElementById('subtotal').setAttribute('value', parseFloat(document.getElementById('subtotal').value) + parseFloat(newPrice));
      document.getElementById('subtotal').value = parseFloat(document.getElementById('subtotal').value) + parseFloat(newPrice);
      editTotal(newPrice); // also add to total
    }

    function editTotal(newValue) {
      document.getElementById('amount').setAttribute('value', parseFloat(document.getElementById('amount').value) + parseFloat(newValue));
      document.getElementById('amount').value = parseFloat(document.getElementById('amount').value) + parseFloat(newValue);
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

    //FUNCTION EDITAR - PROBLEMA CON NO EDITAR el SUBTOTAL + TAX + TOTAL
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

    function update_km_price(selectPlane) {
      let idPlane = selectPlane.value
      let pos = idPlane.indexOf('*')
      kmPrice = idPlane.substring(pos + 2)
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