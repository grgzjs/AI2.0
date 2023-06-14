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
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/>
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
                          <div class="content"><span class="date">16 Sept</span><span class="name">Julio Sosa</span><span class="desc">message board en camino. </span></div></a></li>
                      <li><a href="#">
                          <div class="img"><img src="assets/img/avatars/img2.jpg" alt="Avatar"></div>
                          <div class="content"><span class="date">4 Sept</span><span class="name">Gustavo </span><span class="desc">dale play.</span></div></a></li>
                      <li><a href="#">
                          <div class="img"><img src="assets/img/avatars/img3.jpg" alt="Avatar"></div>
                          <div class="content"><span class="date">13 Aug</span><span class="name">Lupi</span><span class="desc">Dale, yo sigo trabajando en contenido.</span></div></a></li>
                      <li><a href="#">
                          <div class="img"><img src="assets/img/avatars/img4.jpg" alt="Avatar"></div>
                          <div class="content"><span class="date">13 Aug</span><span class="name">Julieta</span><span class="desc">Esta bueno esto.</span></div></a></li>
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
                          <div class="content"><span class="desc">This is a new message for my dear friend <strong>Julio</strong>.</span><span class="date">10 minutes ago</span></div></a></li>
                      <li><a href="#">
                          <div class="icon"><span class="s7-add-user"></span></div>
                          <div class="content"><span class="desc">You have a new fiend request pending from <strong>Julieta</strong>.</span><span class="date">2 days ago</span></div></a></li>
                      <li><a href="#">
                          <div class="icon"><span class="s7-graph1"></span></div>
                          <div class="content"><span class="desc">Your site visits have increased <strong>15.5%</strong> more since the last week.</span><span class="date">2 hours ago</span></div></a></li>
                      <li><a href="#">
                          <div class="icon"><span class="s7-check"></span></div>
                          <div class="content"><span class="desc">This is a new message for my dear friend <strong>Rob</strong>.</span><span class="date">10 minutes ago</span></div></a></li>
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
                      <button class="navbar-toggler hidden-md-up collapsed" type="button" data-toggle="collapse" data-target="#mai-navbar-collapse" aria-controls="mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">       <span class="icon-bar"><span></span><span></span><span></span></span></button>
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
                                    <li class="nav-item parent open"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-users"></span><span>CRM</span></a>
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
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-portfolio"></span><span>Operaciones</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="opsmain.php"><span class="icon s7-users"></span><span class="name">Base de vuelos</span></a>
                                                  </li>
                                               
                                      </ul>
                                    </li>
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-piggy"></span><span>Contabilidad</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="contabilidadgastos.php"><span class="icon s7-box2"></span><span class="name">Gastos Generales</span></a>
                                                  </li>
                                           
                                      </ul>
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

      <!--FINAL DE BOTONERA-->

      <div class="main-content container">
        

        <?php
   $sqllist = "select * from Aircraft";
   $rows = mysqli_query($con, $sqllist);


   if(isset($_GET['aksi']) == 'delete'){
   $nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES))); 
   $delete = mysqli_query($con, "DELETE from Aircraft WHERE matricula='$nik'");
   if($delete){
      echo '<script type="text/javascript">',
 'window.location.href="aircraft_setup.php";',
 '</script>';
     
     echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
   }else{
     echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, Data cannot be deleted.</div>';
   }
   }


        if(isset($_POST['save'])){
				$matricula	     = mysqli_real_escape_string($con,(strip_tags($_POST["matricula"],ENT_QUOTES)));//Escanpando caracteres
				$aeronave	     = mysqli_real_escape_string($con,(strip_tags($_POST["aeronave"],ENT_QUOTES)));//Escanpando caracteres
        $fabricacion	     = mysqli_real_escape_string($con,(strip_tags($_POST["fabricacion"],ENT_QUOTES)));//Escanpando caracteres
        $capacidad	     = mysqli_real_escape_string($con,(strip_tags($_POST["capacidad"],ENT_QUOTES)));//Escanpando caracteres  
        $cruisespeed	     = mysqli_real_escape_string($con,(strip_tags($_POST["cruisespeed"],ENT_QUOTES)));//Escanpando caracteres
        $preciokm         = mysqli_real_escape_string($con,(strip_tags($_POST["preciokm"],ENT_QUOTES)));//Escanpando caracteres
        $pesomaximo	     = mysqli_real_escape_string($con,(strip_tags($_POST["pesomaximo"],ENT_QUOTES)));//Escanpando caracteres
        $ascentspeed     = mysqli_real_escape_string($con,(strip_tags($_POST["ascentspeed"],ENT_QUOTES)));//Escanpando caracteres
        $fuelstop     = mysqli_real_escape_string($con,(strip_tags($_POST["fuelstop"],ENT_QUOTES)));//Escanpando caracteres
        $distancia    = mysqli_real_escape_string($con,(strip_tags($_POST["distancia"],ENT_QUOTES)));//Escanpando caracteres
        $pernocta    = mysqli_real_escape_string($con,(strip_tags($_POST["pernocta"],ENT_QUOTES)));//Escanpando caracteres
        $descentspeed    = mysqli_real_escape_string($con,(strip_tags($_POST["descentspeed"],ENT_QUOTES)));//Escanpando caracteres

     
        if ($matricula){
          $sql= "update Aircraft set matricula='$matricula',aeronave='$aeronave',fabricacion='$fabricacion',capacidad='$capacidad',cruisespeed='$cruisespeed',preciokm='$preciokm',pesomaximo='$pesomaximo',ascentspeed='$ascentspeed',fuelstop='$fuelstop',distancia='$distancia',pernocta='$pernocta',descentspeed='$descentspeed' where matricula='$matricula'";
        }
        else{
          $sql= "insert into Aircraft (matricula,aeronave,fabricacion,capacidad,cruisespeed,preciokm,pesomaximo,ascentspeed,fuelstop,distancia,pernocta,descentspeed) Values ('$matricula','$aeronave','$fabricacion','$capacidad','$cruisespeed','$preciokm','$pesomaximo','$ascentspeed','$fuelstop','$distancia','$pernocta','$descentspeed')";
       
            }
            $update = mysqli_query($con,$sql) 
            or die(mysqli_error());
        ?>

        <script>
          setTimeout(() => {
    window.location.href="aircraft_setup.php";
  }, 100);
  </script>
       <?php
      
      }
?>




<?php
if(isset($_POST['aksi']) && $_POST['aksi'] == 'edit'){
$nik = mysqli_real_escape_string($con,(strip_tags($_POST["nik"],ENT_QUOTES))); 
$edit = mysqli_query($con, "select * from Aircraft WHERE matricula='$nik'");
$rowaircraft = mysqli_fetch_assoc($edit);


}
?>



<!--AQUI COMIENZA EL FORMULARIO STEPS -->



<div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-divider">Registro de Aeronave<span class="card-subtitle">Ingresa la informacion de la Aeronave</span></div>
              <div class="card-body pl-sm-5">
                <form action="aircraft_setup.php" method="post" method="post">
                  <div class="form-group row">
                    <label class="col-12 col-sm-4 col-form-label text-sm-right">Matricula </label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="text" value="<?php echo $rowaircraft['matricula'];?>" placeholder="Matricula" name="matricula">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-4 col-form-label text-sm-right">Tipo de Aeronave</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="text" value="<?php echo $rowaircraft['aeronave'];?>" placeholder="Tipo de Aeronave" name="aeronave">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-4 col-form-label text-sm-right">Año de Fabricacion</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="text" value="<?php echo $rowaircraft['fabricacion'];?>" placeholder="Año de Fabricacion" name="fabricacion">
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card card-default">
              <div class="card-header card-header-divider">Configuracion Tecnica<span class="card-subtitle">Ingresa la informacion Tecnica</span></div>
              <div class="card-body pl-sm-5">

                  <div class="form-group row " style="justify-content: center;">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">Capacidad Maxima
                      <input class="form-control" type="text" value="<?php echo $rowaircraft['capacidad'];?>" placeholder="Capacidad Maxima" name="capacidad">
                    </div>
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">Velocidad Crucero
                      <input class="form-control" type="text" value="<?php echo $rowaircraft['cruisespeed'];?>" placeholder="Velocidad Crucero" name="cruisespeed">
                    </div>
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">Precio KM
                      <input class="form-control" type="text" value="<?php echo $rowaircraft['preciokm'];?>" placeholder="Precio KM" name="<?php echo 'preciokm'.$i;?>">
                      <!--ESTO ES PARA SUBIR EL COSTO A HELLO>PHP DE KM -->
                  </div>    
                  </div>
                  <div class="form-group row" style="justify-content: center;">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">Distancia Maxima
                      <input class="form-control" type="text" value="<?php echo $rowaircraft['distancia'];?>" placeholder="Distancia Maxima" name="distancia">
                    </div>
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">Velocidad Decenso
                      <input class="form-control" type="text" value="<?php echo $rowaircraft['descentspeed'];?>" placeholder="Velocidad Decenso" name="descentspeed">
                      </div>
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">Precio Pernocta
                    <input class="form-control" type="text" value="<?php echo $rowaircraft['pernocta'];?>" placeholder="Pernocta " name="pernocta">
                  </div>
                  </div>
                  <div class="form-group row" style="justify-content: center;">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">Peso Maximo
                      <input class="form-control" type="text" value="<?php echo $rowaircraft['pesomaximo'];?>" placeholder="Peso Maximo" name="pesomaximo">
                    </div>
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">Velocidad Ascenso
                      <input class="form-control" type="text" value="<?php echo $rowaircraft['ascentspeed'];?>" placeholder="Velocidad Acenso" name="ascentspeed">
                      </div>
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">Precio Fuel Stop
                    <input class="form-control" type="text" value="<?php echo $rowaircraft['fuelstop'];?>" placeholder="Parada Tecnica" name="fuelstop">
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                

              </div>
              <div class="col-lg-12">
                      <p class="text-right">
                        <button class="btn btn-space btn-primary" name="save" 
                        type="submit">Procesar</button>
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
                        <th style="width:5%;">
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </th>
                        <th style="width:20%;">Matricula </th>
                        <th style="width:17%;">tipo de AC </th>
                        <th style="width:15%;">Fabricacion #</th>
                        <th style="width:10%;">Precio Km</th>
                        <th style="width:10%;"></th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php
                   if(mysqli_num_rows($rows) == 0){
                   }else{
                   while($row = mysqli_fetch_assoc($rows)){
                      ?>
                      <tr>
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatar.jpg" alt="Avatar"><span><?php echo $row ['matricula']; ?>
                            </span>
                          </td>
                        <td class="cell-detail"> <span><?php echo $row ['aeronave']; ?>
                            </span>
                          </td>
                        <td class="cell-detail"><span><?php echo $row ['fabricacion']; ?>
                            </span>
                        </td>
                        <td class="cell-detail"><span><?php echo $row ['preciokm']; ?>
                            </span>
                          </td>
                        <td class="text-right">
                          <div class="btn-group btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Select <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                              <a class="dropdown-item" href='javascript:editarmatricula ("<?php echo $row['matricula']?>")'>Edit</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="aircraft_setup.php?aksi=delete&nik=<?php echo $row['matricula']; ?>" title="Eliminar" onclick="return confirm('Are you sure? <?php echo $row['matricula']; ?>')">Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php
                    }}
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
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.formElements();
      });
    </script>
    <script>
      //function para poder editar y borrar las quotes DESPUES DE PONERLE LOGIN
      function borrar(id){
      //"hello.php?aksi=delete&nik= echo $row['quote']; ?>" 
      //console.log('borrar '+id_invoice)
      let form=document.createElement('form')
      form.action='aircraft_setup.php'
      form.method='post'
      let username=document.createElement('input')
      let password=document.createElement('input')
      let aksi=document.createElement('input')
      let nik=document.createElement('input')
      username.value='test1'
      username.type='hidden'
      username.name='username'
      password.value='test1'
      password.type='hidden'
      password.name='password'
      aksi.name='aksi'
      aksi.type='hidden'
      aksi.value='delete'
      nik.name='nik'
      nik.type='hidden'
      nik.value=id
      form.appendChild(aksi)
      form.appendChild(username)
      form.appendChild(password)
      form.appendChild(nik)
      document.body.appendChild(form)
      form.submit()

      }
      //FUNCTION EDITAR - PROBLEMA CON NO EDITAR el SUBTOTAL + TAX + TOTAL
      function editarQuote(id){
    let form=document.createElement('form')
    form.action='aircraft_setup.php'
    form.method='post'
    let username=document.createElement('input')
    let password=document.createElement('input')
    let aksi=document.createElement('input')
    let nik=document.createElement('input')
    let edit=document.createElement('input')
    let amount=document.createElement('input')
    let date=document.createElement('input')
    username.value='test1'
    username.type='hidden'
    username.name='username'
    password.value='test1'
    password.type='hidden'
    password.name='password'
    aksi.name='aksi'
    aksi.type='hidden'
    aksi.value='edit'
    nik.name='nik'
    nik.type='hidden'
    nik.value=id
    edit.name='edit'
    edit.type='hidden'
    edit.value='yes'
    form.appendChild(aksi)
    form.appendChild(username)
    form.appendChild(password)
    form.appendChild(nik)
    form.appendChild(edit)
    document.body.appendChild(form)
    form.submit()
}

function loginuser(){
    let form=document.createElement('form')
    form.action='hello.php'
    form.method='post'
    let username=document.createElement('input')
    let password=document.createElement('input')
    let aksi=document.createElement('input')
    let nik=document.createElement('input')
    let edit=document.createElement('input')
    let amount=document.createElement('input')
    let date=document.createElement('input')
    username.value='test1'
    username.type='hidden'
    username.name='username'
    password.value='test1'
    password.type='hidden'
    password.name='password'
    aksi.name='aksi'
    aksi.type='hidden'
    aksi.value='login'
    nik.name='nik'
    nik.type='hidden'
    edit.name='edit'
    edit.type='hidden'
    edit.value='yes'
    amount.name='amount'
    amount.type='hidden'
    amount.value='<?php echo $rowedit["amount"]; ?>'
    date.name='date'
    date.type='hidden'
    date.value='<?php echo $rowedit["date"]; ?>'
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

function loginuserhellolist(){
    let form=document.createElement('form')
    form.action='hellolist.php'
    form.method='post'
    let username=document.createElement('input')
    let password=document.createElement('input')
    let aksi=document.createElement('input')
    let nik=document.createElement('input')
    let edit=document.createElement('input')
    let amount=document.createElement('input')
    let date=document.createElement('input')
    username.value='test1'
    username.type='hidden'
    username.name='username'
    password.value='test1'
    password.type='hidden'
    password.name='password'
    aksi.name='aksi'
    aksi.value='login'
    aksi.type='hidden'
    nik.name='nik'
    nik.type='hidden'
    edit.name='edit'
    edit.type='hidden'
    edit.value='yes'
    amount.name='amount'
    amount.type='hidden'
    amount.value='<?php echo $rowedit["amount"]; ?>'
    date.name='date'
    date.type='hidden'
    date.value='<?php echo $rowedit["date"]; ?>'
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
function refreshpage(){
  setTimeout(() => {
    window.location.href="aircraft_setup.php";
  }, 100);
   
}
function editarmatricula(matricula) {
  let form=document.createElement('form')
    form.action='aircraft_setup.php'
    form.method='post'
    let username=document.createElement('input')
    let password=document.createElement('input')
    let aksi=document.createElement('input')
    let nik=document.createElement('input')
    let edit=document.createElement('input')
    let amount=document.createElement('input')
    let date=document.createElement('input')
    username.value='test1'
    username.type='hidden'
    username.name='username'
    password.value='test1'
    password.type='hidden'
    password.name='password'
    aksi.name='aksi'
    aksi.type='hidden'
    aksi.value='edit'
    nik.name='nik'
    nik.type='hidden'
    nik.value=matricula
    edit.name='edit'
    edit.type='hidden'
    edit.value='yes'
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