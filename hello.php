<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="assets/img/favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

</head>
<?php
// PHP PARA PASAR POR EL LOGIN
session_start();
if(isset($_POST['username']) ||$_SESSION['user']||(isset($_GET['aksi']) && $_GET['aksi']=='edit')){
  $username = $_POST['username'];
  $password = $_POST['password'];
 if(($username=='test1' && $password=='test1')||$_SESSION['user'])
{
 $_SESSION['user']=$username;

    

include("conexion.php");
?>		
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>AIS Quote</title>
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
                                    <li class="nav-item parent open"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-paper-plane"></span><span>Quote</span></a>
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
                                                  <li class="nav-item"><a class="nav-link" href="crm.php"><span class="icon s7-id"></span><span class="name">Base de contactos </span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="aircraft_setup.php"><span class="icon s7-plane"></span><span class="name">Config. Aeronaves</span></a>
                                                  </li>
                                                  <li class="nav-item dropdown parent"><a class="nav-link" href="crmemail.php" data-toggle="dropdown"><span class="icon s7-mail"></span><span class="name">Mail</span></a>
                                                              <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item active" href="crmemail.php">Inbox</a><a class="dropdown-item" href="crmemail.php">Detail</a><a class="dropdown-item" href="crmemail.php">Compose</a>
                                                              </div>
                                                  </li>
                                            
                                      </ul>
                                    </li>
                                    
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-portfolio"></span><span>Operaciones</span></a>
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
       // SECCION DE BORRAR Y EDITAR
        $sqllist = "select * from invoices";
        $rows = mysqli_query($con, $sqllist) or die(mysqli_error());
       

        if(isset($_POST['username']) && ($_POST['aksi'] == 'delete' || $_POST['aksi']=='edit') ){
        $nik = mysqli_real_escape_string($con,(strip_tags($_POST["nik"],ENT_QUOTES))); 
        $delete = mysqli_query($con, "DELETE from invoices WHERE quote=$nik");
        if($delete){
          echo '<script type="text/javascript">',
     'window.location.href="hello.php";',
     '</script>'
;
        //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
        }else{
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, Data cannot be deleted.</div>';
        }
        }
        
        if(isset($_POST['aksi']) && $_POST['aksi'] == 'edit'){
          $nik = mysqli_real_escape_string($con,(strip_tags($_POST["nik"],ENT_QUOTES))); 
          $edit = mysqli_query($con, "select * from invoices WHERE quote=$nik");
          if($edit){
          $rowedit = mysqli_fetch_assoc($edit);
              
              
              
           
  ;
          //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
          }else{
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
              <div class="card-body pl-sm-5">
                <form action="report.php" method="post">
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Comprador:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <?php
                    $queryBuyer = "select * from Contact order by id";
                    $buyers = mysqli_query($con, $queryBuyer);
                  
                    if (isset ($edit))
                    {
                      $queryBuyer = "select * from Contact where id=".$idbuyer;
                    $buyers = mysqli_query($con, $queryBuyer);
                      ?>
                      <input class="form-control" type = 'text' name='buyer' value="<?php echo $rowbuyer['first_name'].' '.$rowbuyer['last_name'];?>" readonly='readonly'> 
                      <?php
                      }
                    else{
                      
                    
                    ?>

                      <select name="buyer" class="form-control custom-select" onblur="updateaddress(this)">
                        <?php
                           while ($rowbuyer = mysqli_fetch_assoc($buyers)) {     
                        ?>
                        <option  value="<?php echo $rowbuyer['id'].'**'.$rowbuyer['address'];?>"
                        ><?php echo $rowbuyer['first_name'].' '.$rowbuyer['last_name'];?> 
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
                      <div class="form-control" id='divaddress'>
                      <?php echo $rowedit['address'];?>
                        </div>
                    <input class="form-control" type="hidden" value="<?php echo $rowedit['address'];?>" placeholder="address" name="address" id="address">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Aeronave:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <?php
                      //AIRCRAFT TABLE
                      $sqlaircraft='select * from Aircraft';
                      $aircraft = mysqli_query($con, $sqlaircraft);
                      

                      ?>
                    <select name='aircraft' class="form-control custom-select" id="aircraft"> 
                      <?php
                      while($rowaircraft = mysqli_fetch_assoc($aircraft)){
                        ?>
                      <option value="<?php echo $rowaircraft['preciokm'].'*'.$rowaircraft['matricula']?>">
                        <?php
                        echo $rowaircraft['matricula'];
                        ?>
                        <?php
                      }
                        ?>

                    </select>
                    </div>
                    </div>
                    
           
                    <div class="card-header card-header-divider"> Detalle de Tramos<span class="card-subtitle">Ingresa las piernes de vuelo</span></div>    
                    <br>

                    <div class="form-group row">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                     <div class="col-12 col-sm-8 col-lg-2">Fecha</div>
                      <div class="col-12 col-sm-8 col-lg-2">Origen</div>
                      <div class="col-12 col-sm-8 col-lg-2">Destino</div>
                    <div class="col-12 col-sm-8 col-lg-1">Pax</div>
                    <div class="col-12 col-sm-8 col-lg-1">KM</div>
                    </div>
<?php
if(isset($_POST['aksi']) && $_POST['aksi'] == 'edit'){
$nik = mysqli_real_escape_string($con,(strip_tags($_POST["nik"],ENT_QUOTES))); 
$edit = mysqli_query($con, "select * from invoices WHERE quote=$nik");
if ($edit){
$editdetail = mysqli_query($con, "select * from invoice_detail WHERE id_invoice=$nik");
$i=0;
while($rowdetail = mysqli_fetch_assoc($editdetail)){
//$i esta hecho para view y reveer el pdf
  $i++;
?>
                      <div class="form-group row">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                     <div class="col-12 col-sm-8 col-lg-2">
                      <input class="form-control" type="date" value="<?php echo $rowdetail['fecha'];?>" placeholder="Fecha" name= "<?php echo 'fdateh'.$i;?>">
                        </div>
                
                        <div class="col-12 col-sm-8 col-lg-2">
                      <input class="form-control" type="text" value="<?php echo $rowdetail['origen'];?>" placeholder="origen" name="<?php echo 'forigenh'.$i;?>">
                        </div>
                      <div class="col-12 col-sm-8 col-lg-2">
                      <input class="form-control" type="text" value="<?php echo $rowdetail['destino'];?>" placeholder="destino" name="<?php echo 'fdestinoh'.$i;?>">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" value="<?php echo $rowdetail['pax'];?>" placeholder="pax" name="<?php echo 'fpaxh'.$i;?>">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" value="<?php echo $rowdetail['km_vuelo'];?>" placeholder="kms" name="<?php echo 'km_vueloh'.$i;?>" id="<?php echo 'km_vueloh'.$i;?>">
                    </div>
                    </div>
<?php
}}}
//if(!$edit)
?>
                    <div class="form-group row">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>

                    <div class="col-12 col-sm-8 col-lg-2">
                      <input class="form-control" type="date" placeholder="fecha" name="fdate1">
                        </div>
                        <div class="col-12 col-sm-8 col-lg-2">
  <?php
  //FUNCTION TO ADD THE AIRPORT TO ORIGEN  
    $sqlairports='select * from airports';
    $airport = mysqli_query($con, $sqlairports);
  ?>
  <select name='forigen1' class="form-control custom-select select2" id='select2'> 
    <script>
      document.onreadystatechange = function () {
    if (document.readyState == "interactive") {
      //document.getElementsByName('forigen1')[0].value=''
    }
}
      //(document).ready(function() {
       // $('.select2').select2();
      //});
    </script>
    <?php while($rowairport = mysqli_fetch_assoc($airport)): ?>
      <option>
        <?php echo $rowairport['airport_code']; ?>
      </option>
    <?php endwhile; ?>
  </select>
</div>

                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" placeholder="destino" name="fdestino1" id="fdestino1">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" placeholder="pax" name="fpax1">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" placeholder="kms" name="km_vuelo1" id="km_vuelo1">
                    </div>
                    </div>
                    


                    <div class="form-group row">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="date" placeholder="fecha" name="fdate2">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" placeholder="origen" name="forigen2" id="forigen2">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" placeholder="destino" name="fdestino2" id="fdestino2">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" placeholder="pax" name="fpax2">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" placeholder="kms" name="km_vuelo2"id="km_vuelo2">
                    </div>
                    </div>


                   
                    <div class="form-group row">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="date" placeholder="fecha" name="fdate3">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" placeholder="origen" name="forigen3" id="forigen3">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" placeholder="destino" name="fdestino3" id="fdestino3">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" placeholder="pax" name="fpax3">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" placeholder="kms" name="km_vuelo3" id="km_vuelo3">
                    </div>
                    </div>
                    
                    
                 
                    <div class="form-group row">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="date" placeholder="fecha" name="fdate4">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" placeholder="origen" name="forigen4">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" placeholder="destino" name="fdestino4">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" placeholder="pax" name="fpax4">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" placeholder="kms" name="km_vuelo4" id="km_vuelo4">
                    </div>
                    </div>
                    
                   
                    <div class="form-group row">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="date" placeholder="fecha" name="fdate5">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" placeholder="origen" name="forigen5">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" placeholder="destino" name="fdestino5">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" placeholder="pax" name="fpax5">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input class="form-control" type="text" placeholder="kms" name="km_vuelo5" id="km_vuelo5">
                    </div>
                    </div>
                    
                    <hr>
                    <br>
                    
                    <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Subtotal:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $rowedit['subtotal'];?>" placeholder="subtotal" name="subtotal" id="subtotal">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Adicionales:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $rowedit['addons'];?>" placeholder="addons" name="addons" id="addons">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Impuesto:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $rowedit['tax'];?>" placeholder="tax" name="tax" id="tax">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Total:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $rowedit['amount'];?>" placeholder="amount" name="amount" id="amount">
                    </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="hidden" value="<?php echo $rowedit['quote'];?>" placeholder="idpdf" name="idpdf" id="idpdf">
                    </div>
                    
                  
                
                    <div class="col-lg-6 pb-4 pb-lg-0">
                    </div>
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6">
                      <p class="text-right">
                        <button class="btn btn-space btn-primary" name="save" type="submit" >Procesar</button>
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

      function borrar(id_invoice){
      //"hello.php?aksi=delete&nik= echo $row['quote']; ?>" 
      //console.log('borrar '+id_invoice)
      let form=document.createElement('form')
      form.action='hello.php'
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
      nik.value=id_invoice
      form.appendChild(aksi)
      form.appendChild(username)
      form.appendChild(password)
      form.appendChild(nik)
      document.body.appendChild(form)
      form.submit()

      }
      //FUNCTION EDITAR - PROBLEMA CON NO EDITAR el SUBTOTAL + TAX + TOTAL
      function editarQuote(id_invoice){
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
    aksi.value='edit'
    nik.name='nik'
    nik.type='hidden'
    nik.value=id_invoice
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

function ReservarQuote(id_invoice){
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
    aksi.value='edit'
    nik.name='nik'
    nik.type='hidden'
    nik.value=id_invoice
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

//function para sumar km 
  document.getElementById('km_vuelo1').addEventListener('blur',refrescar)
  document.getElementById('km_vuelo2').addEventListener('blur',refrescar)
  document.getElementById('km_vuelo3').addEventListener('blur',refrescar)
  document.getElementById('km_vuelo4').addEventListener('blur',refrescar)
  document.getElementById('km_vuelo5').addEventListener('blur',refrescar)
  let km_v1=document.getElementById('km_vueloh1')
  if (km_v1){
    km_v1.addEventListener('blur',refrescar)
  }
  let km_v2=document.getElementById('km_vueloh2')
  if (km_v2){
    km_v2.addEventListener('blur',refrescar)
  }
  let km_v3=document.getElementById('km_vueloh3')
  if (km_v3){
    km_v3.addEventListener('blur',refrescar)
  }
  let km_v4=document.getElementById('km_vueloh4')
  if (km_v4){
    km_v4.addEventListener('blur',refrescar)
  }
  let km_v5=document.getElementById('km_vueloh5')
  if (km_v5){
    km_v5.addEventListener('blur',refrescar)
  }
 //function para agregar automatica el origen y destino 
  document.getElementById('fdestino1').addEventListener('blur',function (){
    let dest1=document.getElementById('fdestino1')
    let ori2=document.getElementById('forigen2')

    if(dest1!=undefined && ori2!=undefined)
    {
      ori2.value = dest1.value
    }

  })

  document.getElementById('fdestino2').addEventListener('blur',function (){
    let dest2=document.getElementById('fdestino2')
    let ori3=document.getElementById('forigen3')

    if(dest2!=undefined && ori3!=undefined)
    {
      ori3.value = dest2.value
    }

  })

  document.getElementById('tax').addEventListener('blur',calculartotal)

//function refrescar search quotes
function refreshpage(){
  setTimeout(() => {
    window.location.href="hello.php";
  }, 100);
   

}

  //function para sumar km  
  function refrescar() {
let km_vuelo1 = Number(document.getElementsByName('km_vuelo1')[0].value);
let km_vuelo2 = Number(document.getElementsByName('km_vuelo2')[0].value);
let km_vuelo3 = Number(document.getElementsByName('km_vuelo3')[0].value);
let km_vuelo4 = Number(document.getElementsByName('km_vuelo4')[0].value);
let km_vuelo5 = Number(document.getElementsByName('km_vuelo5')[0].value);
let totalh=0
if(document.getElementsByName('km_vueloh1')[0]){
  let km_vueloh1 = Number(document.getElementsByName('km_vueloh1')[0].value);
  totalh+=km_vueloh1
}
if(document.getElementsByName('km_vueloh2')[0]){
  let km_vueloh2 = Number(document.getElementsByName('km_vueloh2')[0].value);
  totalh+=km_vueloh2
}
if(document.getElementsByName('km_vueloh3')[0]){
  let km_vueloh3 = Number(document.getElementsByName('km_vueloh3')[0].value);
  totalh+=km_vueloh3
}
if(document.getElementsByName('km_vueloh4')[0]){
  let km_vueloh4 = Number(document.getElementsByName('km_vueloh4')[0].value);
  totalh+=km_vueloh4
}
if(document.getElementsByName('km_vueloh5')[0]){
  let km_vueloh5 = Number(document.getElementsByName('km_vueloh5')[0].value);
  totalh+=km_vueloh5
}

let rate=document.getElementById('aircraft').value
let total=(km_vuelo1+km_vuelo2+km_vuelo3+km_vuelo4+km_vuelo5)*parseFloat(rate)
total=total+totalh
document.getElementById('subtotal').value=total
calculartotal()
}
function calculartotal(){
    let addons=document.getElementById('addons')
    let tax=document.getElementById('tax')
    let subtotal=document.getElementById('subtotal')
    let amount=document.getElementById('amount')

    if(addons!=undefined && tax!=undefined && subtotal!=undefined)
    {
      console.log(subtotal.value)
      console.log(tax.value)
      console.log(addons.value)

      amount.value = parseFloat (subtotal.value) + parseFloat (addons.value) + parseFloat (tax.value)
    }

  }
//TRYING TO GET A TOTAL CALCULATE VALUE
function updateaddress(selectaddress) {
  let idbuyer=selectaddress.value
  let pos=idbuyer.indexOf('**')
  let addressbuyer=idbuyer.substring(pos+2)
  let divaddress=document.getElementById('divaddress')
  divaddress.innerHTML=addressbuyer
  let address=document.getElementById('address')
  address.value=addressbuyer
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
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.formElements();
      });
    </script>
  </body>
</html>
<?php

}
}
?>



