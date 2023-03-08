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
if(isset($_POST['username']) ||$_SESSION['user']){
  $username = $_POST['username'];
  $password = $_POST['password'];
 if(($username=='test1' && $password=='test1')||$_SESSION['user'])
{
 $_SESSION['user']=$username;

    

include("conexion.php");
?>	
<title>AI Soft V1.0</title>
	
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>AI Soft V1.0</title>
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
          <!--<li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Company</a></li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">Services<span class="angle-down s7-angle-down"></span></a>
            <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Information</a><a class="dropdown-item" href="#">Company</a><a class="dropdown-item" href="#">Documentation</a><a class="dropdown-item" href="#">API Settings</a><a class="dropdown-item" href="#">Export Info</a></div>
          </li>
          <li class="nav-item"><a class="nav-link" href="#">Support</a></li>-->
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
          <li class="dropdown nav-item mai-settings"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon s7-settings"></span></a>
            <ul class="dropdown-menu">
              <li>
                <div class="title">Settings</div>
                <div class="content">
                  <ul>
                    <li><span>Enable Notifications</span>
                      <div class="float-right">
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" checked="" name="check" id="switch1"><span>
                            <label for="switch1"></label></span>
                        </div>
                      </div>
                    </li>
                    <li><span>Auto Commit</span>
                      <div class="float-right">
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" checked="" name="check2" id="switch2"><span>
                            <label for="switch2"></label></span>
                        </div>
                      </div>
                    </li>
                    <li><span>Sidebar</span>
                      <div class="float-right">
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" name="check3" id="switch3"><span>
                            <label for="switch3"></label></span>
                        </div>
                      </div>
                    </li>
                    <li><span>Full-width Layout</span>
                      <div class="float-right">
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" checked="" name="check4" id="switch4"><span>
                            <label for="switch4"></label></span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav float-lg-right mai-user-nav">
          <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><img src="assets/img/avatar.jpg" alt="Avatar"><span class="user-name">Demo Account</span><span class="angle-down s7-angle-down"></span></a>
            <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#"><span class="icon s7-home"></span>My Account</a><a class="dropdown-item" href="pages-profile.html"><span class="icon s7-user"></span>Profile</a><a class="dropdown-item" href="#"><span class="icon s7-cash"></span>Billing</a><a class="dropdown-item" href="#"><span class="icon s7-tools"></span>Settings</a><a class="dropdown-item" href="pages-login.html"><span class="icon s7-power"></span>Log Out</a></div>
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
                                                  <li class="nav-item"><a class="nav-link" href="index.html"><span class="icon s7-monitor"></span><span class="name">Dashboard</span></a>

                                      </ul>
                                    </li>
                                    <li class="nav-item parent open"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-rocket"></span><span>Quote</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link active" href="hello.php"><span class="icon s7-user"></span><span class="name">Quoting Tool</span></a>
                                                  </li>
                                                
                                      </ul>
                                    </li>
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-diamond"></span><span>CRM</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="crm.php"><span class="icon s7-graph"></span><span class="name">Contact Database</span></a>
                                                  </li>
                                            
                                      </ul>
                                    </li>
                                    <!--
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-portfolio"></span><span>Calendar</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="pages-profile.html"><span class="icon s7-diamond"></span><span class="name">Schedule</span></a>
                                                  </li>
                                               
                                      </ul>
                                    </li>
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-display1"></span><span>Marketing</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="charts-flot.html"><span class="icon s7-box2"></span><span class="name">Graphic</span></a>
                                                  </li>-->
                                           
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
       

        if(isset($_POST['username']) && $_POST['aksi'] == 'delete'){
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
        
        if(isset($_GET['aksi']) && $_GET['aksi'] == 'edit'){
          $nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES))); 
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
              <div class="card-header card-header-divider">Quote Information<span class="card-subtitle">Please enter the quote details</span></div>
              <div class="card-body pl-sm-5">
                <form action="report.php" method="post">
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Buyer:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="text" value="<?php echo $rowedit['buyer'];?>" placeholder="buyer" name="buyer">
                    </div>
                  </div>
                  <!--<div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Address:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="text" placeholder="address" name="address">
                    </div>
                  </div>-->
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Address:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $rowedit['address'];?>" placeholder="address" name="address">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Aircraft:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <?php
                      //AIRCRAFT TABLE
                      $sqlaircraft='select * from Aircraft';
                      $aircraft = mysqli_query($con, $sqlaircraft);
                      

                      ?>
                    <select name='aircraft' class="form-control custom-select"> 
                      <?php
                      while($rowaircraft = mysqli_fetch_assoc($aircraft)){
                        ?>
                      <option>
                        <?php
                        echo $rowaircraft['name'];
                        ?>
                        <?php
                      }
                        ?>

                    </select>
                    </div>
                    </div>
                    

                    <hr>            
                    <div class="card-header card-header-divider">Leg Information</div>     
                    <br>

                    <div class="form-group row">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                     <div class="col-12 col-sm-8 col-lg-2">
                      F.Date</div>
                        
                        <div class="col-12 col-sm-8 col-lg-2">
                      F.Origen</div>
                      <div class="col-12 col-sm-8 col-lg-2">
                      F.Destino</div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    F.Pax</div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    KM</div>
                    </div>
<?php
if(isset($_GET['aksi']) && $_GET['aksi'] == 'edit'){
$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES))); 
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
                      <input readonly ='readonly' class="form-control" type="text" value="<?php echo $rowdetail['fecha'];?>" placeholder="date" name= "<?php echo 'fdateh'.$i;?>">
                        </div>
                        
                        <div class="col-12 col-sm-8 col-lg-2">
                      <input readonly ='readonly' class="form-control" type="text" value="<?php echo $rowdetail['origen'];?>" placeholder="origen" name="<?php echo 'forigenh'.$i;?>">
                        </div>
                      <div class="col-12 col-sm-8 col-lg-2">
                      <input readonly ='readonly' class="form-control" type="text" value="<?php echo $rowdetail['destino'];?>" placeholder="destino" name="<?php echo 'fdestinoh'.$i;?>">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input readonly ='readonly' class="form-control" type="text" value="<?php echo $rowdetail['pax'];?>" placeholder="pax" name="<?php echo 'fpaxh'.$i;?>">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-1">
                    <input readonly ='readonly' class="form-control" type="text" value="<?php echo $rowdetail['km_vuelo'];?>" placeholder="kms" name="<?php echo 'km_vueloh'.$i;?>" id="km_vuelo1">
                    </div>
                    </div>
<?php
}}}
//if(!$edit)
?>
                    <div class="form-group row">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>

                    <div class="col-12 col-sm-8 col-lg-2">
                      <input class="form-control" type="text" placeholder="date" name="fdate1">
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
  //document.getElementById('select2').select2()
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
                    <input class="form-control" type="text" placeholder="date" name="fdate2">
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
                    <input class="form-control" type="text" placeholder="date" name="fdate3">
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
                    <input class="form-control" type="text" placeholder="date" name="fdate4">
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
                    <input class="form-control" type="text" placeholder="date" name="fdate5">
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
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Addons:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $rowedit['addons'];?>" placeholder="addons" name="addons" id="addons">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Tax:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $rowedit['tax'];?>" placeholder="tax" name="tax" id="tax">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Amount:</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="<?php echo $rowedit['amount'];?>" placeholder="amount" name="amount" id="amount">
                    </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="hidden" value="<?php echo $rowedit['quote'];?>" placeholder="idpdf" name="idpdf" id="idpdf">
                    </div>
                    </div>
                  </div>
                  <div class="row pt-0 pt-0 pt-lg-5">
                    <div class="col-lg-6 pb-4 pb-lg-0">
                    </div>
                    <div class="col-lg-6">
                      <p class="text-right">
                        <button class="btn btn-space btn-primary" name="save" type="submit">Submit</button>
                        <button class="btn btn-space btn-secondary">Cancel</button>
                      </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="row">
<div class="col-sm-12">
<div class="card card-default card-table">
<div class="card-header">Quote List
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
<th style="width:20%;">Quote </th>
<th style="width:17%;">Date </th>
<th style="width:15%;">Aircraft</th>
<th style="width:10%;">Buyer</th>
<th style="width:10%;"></th>
</tr>
</thead>
<tbody>
<?php


if (mysqli_num_rows($rows) == 0) {
}
else {
  while ($row = mysqli_fetch_assoc($rows)) {
?>
                      <tr>
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatar.jpg" alt="Avatar"><span><?php echo $row['quote']; ?>
                            </span>
                            <!--<span class="cell-detail-description">Developer</span>-->
                          </td>
                        <td class="cell-detail"> <span><?php echo $row['date']; ?>
                            </span>
                            <!--<span class="cell-detail-description">Bootstrap Admin</span>-->
                          </td>
                        <td class="cell-detail"><span><?php echo $row['aircraft']; ?>
                            </span>
                            <!--<span class="version">v1.2.0</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 45%"></div>
                          </div>-->
                        </td>
                        <td class="cell-detail"><span><?php echo $row['buyer']; ?>
                            </span>
                            <!--<span class="cell-detail-description">8:30</span>-->
                          </td>
                        <td class="text-right">
                          <div class="btn-group btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Select <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                              <a class="dropdown-item" href="hello.php?aksi=edit&nik=<?php echo $row['quote']; ?>" title="Cambiar" >View</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href='javascript:borrar ("<?php echo $row['quote']?>")' title="Eliminar" onclick="return confirm('Are you sure? <?php echo $row['quote']; ?>')">Delete</a>
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

  

	</div>
    </div>
    <script>
      //function para poder editar y borrar las quotes DESPUES DE PONERLE LOGIN
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
      username.name='username'
      password.value='test1'
      password.name='password'
      aksi.name='aksi'
      aksi.value='delete'
      nik.name='nik'
      nik.value=id_invoice
      form.appendChild(aksi)
      form.appendChild(username)
      form.appendChild(password)
      form.appendChild(nik)
      document.body.appendChild(form)
      form.submit()

      }
      //FUNCTION EDITAR - PROBLEMA CON NO EDITAR el SUBTOTAL + TAX + TOTAL
      function editar(id_invoice){
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
    username.name='username'
    password.value='test1'
    password.name='password'
    aksi.name='aksi'
    aksi.value='edit'
    nik.name='nik'
    nik.value=id_invoice
    edit.name='edit'
    edit.value='yes'
    amount.name='amount'
    amount.value='<?php echo $rowedit["amount"]; ?>'
    date.name='date'
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

  document.getElementById('tax').addEventListener('blur',function (){
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

  })
//function para sumar km  
  function refrescar() {
let km_vuelo1 = Number(document.getElementsByName('km_vuelo1')[0].value);
let km_vuelo2 = Number(document.getElementsByName('km_vuelo2')[0].value);
let km_vuelo3 = Number(document.getElementsByName('km_vuelo3')[0].value);
let km_vuelo4 = Number(document.getElementsByName('km_vuelo4')[0].value);
let km_vuelo5 = Number(document.getElementsByName('km_vuelo5')[0].value);

let total=(km_vuelo1+km_vuelo2+km_vuelo3+km_vuelo4+km_vuelo5)*3.9
document.getElementById('subtotal').value=total
}
//TRYING TO GET A TOTAL CALCULATE VALUE


//Another option 
//function refrescar() {
 // let km_vuelo1 = Number(document.getElementsByName('km_vuelo1')[0].value);
 // let km_vuelo2 = Number(document.getElementsByName('km_vuelo2')[0].value);
 // let km_vuelo3 = Number(document.getElementsByName('km_vuelo3')[0].value);
 // let km_vuelo4 = Number(document.getElementsByName('km_vuelo4')[0].value);
 // let km_vuelo5 = Number(document.getElementsByName('km_vuelo5')[0].value);

 // let subtotal = (km_vuelo1 + km_vuelo2 + km_vuelo3 + km_vuelo4 + km_vuelo5) * 3.9;
 // document.getElementById('subtotal').value = subtotal;
//}

//function calculateTotal(subtotal, addons, tax) {
 // let amount = subtotal + addons + tax;
//  return amount;
//}

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

