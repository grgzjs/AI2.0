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
  <title>AIS CRM</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
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
                  <li class="nav-item"><a class="nav-link" href="javascript:loginuserhellolist()"><span class="icon s7-albums"></span><span class="name">Lista de Cotizaciones</span></a>
                  </li>
                </ul>
              </li>
              <li class="nav-item parent open"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-users"></span><span>CRM</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="crmregistro.php"><span class="icon s7-user"></span><span class="name">Regristro</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="crm.php"><span class="icon s7-id"></span><span class="name">Base de contactos</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="aircraft_setup.php"><span class="icon s7-plane"></span><span class="name">Config. Aeronaves</span></a>
                  </li>
                  <li class="nav-item dropdown parent"><a class="nav-link" href="mail.html" data-toggle="dropdown"><span class="icon s7-mail"></span><span class="name">Mail</span></a>
                    <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item active" href="crmemail.php">Inbox</a><a class="dropdown-item" href="crmemail.php">Detail</a><a class="dropdown-item" href="crmemail.php">Compose</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-portfolio"></span><span>Operaciones</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="opsmain.php"><span class="icon s7-diamond"></span><span class="name">Lista de Vuelos></span></a>
                  </li>

                </ul>
              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-piggy"></span><span>Contabilidad</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="contabilidadgastos.php"><span class="icon s7-box2"></span><span class="name">Gastos Gral</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="contabilidadingresos.php"><span class="icon s7-cash"></span><span class="name">Ingresos Gral</span></a>
                  </li>

                </ul>
              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-display1"></span><span>Admin</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="charts-flot.html"><span class="icon s7-box2"></span><span class="name">Reporte General</span></a>
                  </li>
                </ul>


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
      $sqllist = "select * from contact";
      $rows = mysqli_query($con, $sqllist);


      if (isset($_GET['aksi']) == 'delete') {
        $nik = mysqli_real_escape_string($con, (strip_tags($_GET["nik"], ENT_QUOTES)));
        $delete = mysqli_query($con, "DELETE from Contact WHERE id=$nik");
        if ($delete) {
          echo '<script type="text/javascript">',
          'window.location.href="crm.php";',
          '</script>';

          echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
        } else {
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, Data cannot be deleted.</div>';
        }
      }


      if (isset($_POST['save'])) {
        $typeclient       = mysqli_real_escape_string($con, (strip_tags($_POST["typeclient"], ENT_QUOTES))); //Escanpando caracteres
        $first_name       = mysqli_real_escape_string($con, (strip_tags($_POST["first_name"], ENT_QUOTES))); //Escanpando caracteres
        $last_name       = mysqli_real_escape_string($con, (strip_tags($_POST["last_name"], ENT_QUOTES))); //Escanpando caracteres
        $f_nacimiento     = mysqli_real_escape_string($con, (strip_tags($_POST["f_nacimiento"], ENT_QUOTES))); //Escanpando caracteres
        $phone_number       = mysqli_real_escape_string($con, (strip_tags($_POST["phone_number"], ENT_QUOTES))); //Escanpando caracteres
        $address       = mysqli_real_escape_string($con, (strip_tags($_POST["address"], ENT_QUOTES))); //Escanpando caracteres  
        $email       = mysqli_real_escape_string($con, (strip_tags($_POST["email"], ENT_QUOTES))); //Escanpando caracteres
        $notes       = mysqli_real_escape_string($con, (strip_tags($_POST["notes"], ENT_QUOTES))); //Escanpando caracteres

        $sql = "insert into Contact (typeclient,first_name,last_name,f_nacimiento,phone_number,address,email,notes) Values ('$typeclient','$first_name','$last_name','$f_nacimiento','$phone_number','$address','$email','$notes')";
        $update = mysqli_query($con, $sql); //or die(mysqli_error());


      }

      if (isset($_POST['aksi']) && $_POST['aksi'] == 'edit') {
        $sql = 'select * from Contact where id =' . $_POST['nik'];
        $rows = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($rows);
      }
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header card-header-divider">Informacion de Contactos<span class="card-subtitle">Ingresa los detalles de Contacto</span></div>
            <div class="card-body pl-sm-5">
              <form action="crm.php" method="post">
                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Tipo de Contacto</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <select class="form-control custom-select" name="typeclient" onchange="showHideFields(this.value)">
                      <option value="Cliente Final" <?php if ($row['typeclient'] == 'Cliente Final') {
                                                      echo 'selected';
                                                    } ?>>Cliente Final</option>
                      <option value="Broker" <?php if ($row['typeclient'] == 'Broker') {
                                                echo 'selected';
                                              } ?>>Broker</option>
                      <option value="Corporativo" <?php if ($row['typeclient'] == 'Corporativo') {
                                                    echo 'selected';
                                                  } ?>>Corporativo</option>
                      <option value="Proveedor" <?php if ($row['typeclient'] == 'Proveedor') {
                                                  echo 'selected';
                                                } ?>>Proveedor</option>
                      <option value="Empleados" <?php if ($row['typeclient'] == 'tripulacion') {
                                                  echo 'selected';
                                                } ?>>Tripulacion</option>
                    </select>

                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Nombre</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $row['first_name']; ?>" placeholder="Nombre" name="first_name">
                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Apellido</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $row['last_name']; ?>" placeholder="Apellido" name="last_name">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Fecha de Nacimiento</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="date" value="<?php echo $row['f_nacimiento']; ?>" placeholder="F.de Nacimiento" name="f_nacimiento">
                  </div>
                </div>
                <div class="form-group row" id="dnipass_div">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">DNI/Pasaporte</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $row['dnipass']; ?>" placeholder="DNI/Pasaporte" name="dnipass">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Telefono</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $row['phone_number']; ?>" placeholder="Telefono" name="phone_number">
                  </div>
                </div>
                <div class="form-group row" id="email_div">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $row['email']; ?>" placeholder="Email" name="email">
                  </div>
                </div>
                <div class="form-group row" id="address_div">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Direccion</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $row['address']; ?>" placeholder="Direccion" name="address">
                  </div>
                </div>
                <div class="form-group row" id="pais_div">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Pais</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $row['pais']; ?>" placeholder="Pais" name="pais">
                  </div>
                </div>
                <div class="form-group row" id="notes_div">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Notas</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <textarea class="form-control" placeholder="Observaciones" name="notes"><?php echo $row['notes']; ?></textarea>
                  </div>
                </div>

                <!-- <div class="form-group row" id="funcion_div" style="display:none;">
                 <label class="col-12 col-sm-3 col-form-label text-sm-right">Funcion</label>
                <div class="col-12 col-sm-8 col-lg-6">
                <select class="form-control custom-select" name="funcion">
                    <option value="Piloto" <?php if ($row['funcion'] == 'Piloto') {
                                              echo 'selected';
                                            } ?>>Piloto</option>
                    <option value="Copiloto" <?php if ($row['funcion'] == 'Copiloto') {
                                                echo 'selected';
                                              } ?>>Copiloto</option>
                    <option value="TCP" <?php if ($row['funcion'] == 'TCP') {
                                          echo 'selected';
                                        } ?>>TCP</option>
                    </select>
                </div>
                </div> -->

                <div class="form-group row" id="licencia_div" style="display:none;">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Licencia N</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="" placeholder="Licencia N" name="licencia">
                  </div>
                </div>


                <div class="row pt-0 pt-0 pt-lg-5">
                  <div class="col-lg-6 pb-4 pb-lg-0">
                    <!--<label class="custom-control custom-checkbox mt-2">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember me</span>
                      </label>-->
                  </div>
                  <div class="col-lg-6">
                    <p class="text-right">
                      <button class="btn btn-space btn-primary" name="save" value="submit" type="submit">Procesar</button>
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
    function showHideFields(selectedValue) {
      if (selectedValue === "Empleados") {
        // show tripulacion fields

        // show other fields

        //document.getElementById("funcion_div").style.display = "";
        document.getElementById("licencia_div").style.display = "";

        // hide tripulacion fields

        document.getElementById("email_div").style.display = "none";
        document.getElementById("address_div").style.display = "none";
        document.getElementById("notes_div").style.display = "none";

      } else {

        document.getElementById("email_div").style.display = "";
        document.getElementById("address_div").style.display = "";
        document.getElementById("notes_div").style.display = "";

        // hide other fields

        //document.getElementById("funcion_div").style.display = "none";
        document.getElementById("licencia_div").style.display = "none";


      }
    }


    //function para poder editar y borrar las quotes DESPUES DE PONERLE LOGIN
    function borrar(id) {
      //"hello.php?aksi=delete&nik= echo $row['quote']; ?>" 
      //console.log('borrar '+id_invoice)
      let form = document.createElement('form')
      form.action = 'crm.php'
      form.method = 'post'
      let username = document.createElement('input')
      let password = document.createElement('input')
      let aksi = document.createElement('input')
      let nik = document.createElement('input')
      username.value = 'test1'
      username.name = 'username'
      password.value = 'test1'
      password.name = 'password'
      aksi.name = 'aksi'
      aksi.value = 'delete'
      nik.name = 'nik'
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
      form.action = 'crm.php'
      form.method = 'post'
      let username = document.createElement('input')
      let password = document.createElement('input')
      let aksi = document.createElement('input')
      let nik = document.createElement('input')
      let edit = document.createElement('input')
      let amount = document.createElement('input')
      let date = document.createElement('input')
      username.value = 'test1'
      username.name = 'username'
      password.value = 'test1'
      password.name = 'password'
      aksi.name = 'aksi'
      aksi.value = 'edit'
      nik.name = 'nik'
      nik.value = id
      edit.name = 'edit'
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
      username.name = 'username'
      password.value = 'test1'
      password.name = 'password'
      aksi.name = 'aksi'
      aksi.value = 'login'
      nik.name = 'nik'
      edit.name = 'edit'
      edit.value = 'yes'
      amount.name = 'amount'
      amount.value = '<?php echo $rowedit["amount"]; ?>'
      date.name = 'date'
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
      username.name = 'username'
      password.value = 'test1'
      password.name = 'password'
      aksi.name = 'aksi'
      aksi.value = 'login'
      nik.name = 'nik'
      edit.name = 'edit'
      edit.value = 'yes'
      amount.name = 'amount'
      amount.value = '<?php echo $rowedit["amount"]; ?>'
      date.name = 'date'
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