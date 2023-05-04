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
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/fuelux/css/wizard.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/dropzone/dropzone.css"/>
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

    <!--COMIENZO BOTONERA PRINCIPAL-->

    <div class="mai-wrapper"> 
      <nav class="navbar navbar-expand-lg mai-sub-header">
        <div class="container">
                    <nav class="navbar navbar-expand-md">
                      <button class="navbar-toggler hidden-md-up collapsed" type="button" data-toggle="collapse" data-target="#mai-navbar-collapse" aria-controls="mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">       <span class="icon-bar"><span></span><span></span><span></span></span></button>
                      <div class="navbar-collapse collapse mai-nav-tabs" id="mai-navbar-collapse">
                        <ul class="nav navbar-nav">
                                    
                                    <li class="nav-item parent open"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-portfolio"></span><span>Operaciones</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="opsmain.php"><span class="icon s7-diamond"></span><span class="name">Base de vuelos</span></a>
                                                  </li>
                                               
                                      </ul>
                                    </li>
                           
                                  
                        </ul>
                      </div>
                    </nav>
          <!--<div class="search">
            <input type="text" placeholder="Search..." name="q"><span class="s7-search"></span>
          </div>-->
        </div>
      </nav>

<!--COMIENZO REGISTRACION PRINCIPAL-->

  <head>

    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/fuelux/css/wizard.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/>
  </head>
  <body>

  <?php
$quote=$_GET['id'];
$sql='select * from invoice_detail where id_invoice='.$quote;
$detail = mysqli_query($con, $sql);
$detail2 = mysqli_query($con, $sql);
if(isset($_POST['guardar'])){
  $funcion=$_POST['funcionpilot'];
  $contact_id=$_POST['idpilot'];
  $tramoid=$_POST['tramoid'];
  
$sql="insert into opstramo (contact_id,tramo_id,funcion) values (".$contact_id.",".$tramoid.",'".$funcion."')";
$update = mysqli_query($con,$sql) ;

}

?>

      <div class="main-content container">
        <div class="row wizard-row">
          <div class="col-md-12 fuelux">
            <div class="block-wizard">
              <div class="wizard wizard-ux" id="wizard1">
                <div class="steps-container">
                  <ul class="steps">
                  <?php
                $i=1;
                while($rowdetail2 = mysqli_fetch_assoc($detail2)){   

?>

                    <li class="active" data-step="<?php echo $i?>">Tramo <?php echo $i?><span class="chevron"></span></li>

<?php
$i++;
}
?>
                  </ul>
                </div>
                <div class="actions">
                  <button class="btn btn-xs btn-prev btn-secondary" type="button"><i class="icon s7-angle-left"></i>Prev</button>
                  <button class="btn btn-xs btn-next btn-secondary" type="button" data-last="Finish">Next<i class="icon s7-angle-right"></i></button>
                </div>
                <div class="step-content">
<?php
$i=1;
while($rowdetail = mysqli_fetch_assoc($detail)){    
?>
                
                  <div class="step-pane active" data-step="<?php echo $i?>">
                    
                      <form class="form-horizontal group-border-dashed" action="#" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="">
                        <div class="form-group row">
                          <div class="offset-sm-4 col-sm-6">
                            <h4 class="wizard-title">Programacion - Vuelo # <?php echo $quote ?></h4>
                            <h5  class="wizard-title">  Tramo - <?php echo $rowdetail['origen'].' - '. $rowdetail['destino']?></h5>
                            <input type="hidden" id='tramoid' value="<?php echo $rowdetail['id'] ?>">
                          </div>
                        </div>

<!--COMIENZO Tripulacion-->

                        <div class="card-header">Informacion de Tripulacion<span class="card-subtitle">Ingresa los detalles de Tripulacion</span></div>
 
  
                        <div class="form-group row">
                        <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                        <div class="col-12 col-sm-10 col-lg-12">
                        <div class="input-group">
                        <select class="form-control custom-select" name="tripulacion" id='tripulacion' onchange='javascript:updatepilot()'>
                        <option value="">...</option>

<?php 
$sqllist = "select * from contact where typeclient='Empleados' order by last_name" ;
$rows = mysqli_query($con, $sqllist);
while($row = mysqli_fetch_assoc($rows)){
?>
                    
                      <option value="<?php echo $row['id'].'*'.$row['pais'].'*'.$row['f_nacimiento'].'*'.$row['dnipass'].'*'.$row['licencia'] ?>"><?php echo $row['last_name'].', '.$row['first_name']?></option>
<?php
}
?>
                     </select>  
            
                      <div class="col-12 col-sm-8 col-lg-2">
                      <input class="form-control" type="text" value="" placeholder="F.Nacimiento" id='f_nacimientopilot' name="f_nacimiento">
                      </div>
                      <div class="col-12 col-sm-8 col-lg-2">
                      <input class="form-control" type="text" value="" placeholder="Pais" id='paispilot'name="Pais">
                      <input class="form-control" type="hidden" value="" id='idpilot'name="idpilot">
                    </div>
                    <div class="col-10 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" value="" placeholder="DNI/PASS" id='dnipasspilot' name="dnipass">
                    </div>
                    <div class="col-10 col-sm-8 col-lg-2">
                    <input class="form-control" type="text" value="" placeholder="Licencia" id='licenciapilot' name="Licencia">
                    </div>
                    <div class="col-12 col-sm-8 col-lg-2">
                    
                    <select class="form-control custom-select" name="funcion" id='funcion'>
                    <option value="Piloto" <?php if ($row['funcion'] == 'Piloto') { echo 'selected'; } ?>>Piloto</option>
                    <option value="Copiloto" <?php if ($row['funcion'] == 'Copiloto') { echo 'selected'; } ?>>Copiloto</option>
                    <option value="TCP" <?php if ($row['funcion'] == 'TCP') { echo 'selected'; } ?>>TCP</option>
                    </select>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary " onclick='javascript:addbutton2()' type="button">+</button>
                    </div>
                    </div>
                    
                    <div class="form-group row">
                    <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-10 col-lg-12 row" id='divpilot'>
                    <?php 
                      if(isset($tramoid)){
                      $sqlpilotlist = "select * from opstramo o, contact c where o.contact_id=c.id and o.tramo_id=".$tramoid;
                      $rowspilot = mysqli_query($con, $sqlpilotlist);
                      while($rowp = mysqli_fetch_assoc($rowspilot)){
                      ?>
                      
                    
                      <input class="col-12 col-sm-3 col-lg-3"  value="<?php echo $rowp['last_name'].', '.$rowp['first_name']?>" readonly>
                      <input class="col-12 col-sm-3 col-lg-3"  value="<?php echo $rowp['f_nacimiento']?>" readonly>
                      <input class="col-12 col-sm-2 col-lg-2"  value="<?php echo $rowp['pais']?>" readonly>
                      <input class="col-12 col-sm-2 col-lg-2"  value="<?php echo $rowp['licencia']?>" readonly>
                      <input class="col-12 col-sm-2 col-lg-2"  value="<?php echo $rowp['dnipass']?>" readonly>
                      

                      <?php
                      }
                    }
                      ?>
                    </div>
                  </div>



</div>
<hr>

<!--COMIENZO Pasajeros-->

                    <div class="card-header">Informacion de Pasajeros<span class="card-subtitle">Ingresa los detalles de Pasajeros</span></div>
<br>
          
                      
                     <div class="form-group row">
                     <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>
                     <div class="col-12 col-sm-8 col-lg-3">
                     <select class="form-control custom-select" name="cliente" id='cliente' onchange='javascript:updatepax()'>
  
<?php 
$sqllist = "select * from contact where typeclient <>'Empleados' order by last_name" ;
$rows = mysqli_query($con, $sqllist);
while($row = mysqli_fetch_assoc($rows)){

?>

                    
                       <option value="<?php echo $row['id'].'*'.$row['pais'].'*'.$row['f_nacimiento'].'*'.$row['dnipass'] ?>"><?php echo $row['last_name'].', '.$row['first_name']?></option>
  <?php
  }
  ?>
                       </select>  
                      </div>
                
                        <div class="col-12 col-sm-8 col-lg-3">
                      <input class="form-control" type="text" value="" placeholder="Pais" id='pais' name="pais">
                        </div>
                      <div class="col-12 col-sm-8 col-lg-2">
                      <input class="form-control" type="text" value="" placeholder="F.Nacimiento" id='f_nacimiento' name="f_nacimiento">
                      </div>
                        <div class="col-10 col-sm-8 col-lg-2">
                        <input class="form-control" type="text" value="" placeholder="DNI/PASS" id='dnipass' name="dnipass">
                        </div>
                         <div class="input-group-append">
                         <button class="btn btn-primary " onclick='javascript:addbutton()' type="button">+</button>
                         </div>
                         </div>

                         <div class="form-group row">
                         <label class="col-12 col-sm-2 col-form-label text-sm-right"></label>
                         <div class="col-10 col-sm-8 col-lg-10 row" id='divpax'>
                         </div>
                        </div>
                    
</div>                 

<hr>
                        <div class="card-header">Informacion de Tramo<span class="card-subtitle">Ingresa los detalles del Tramo</span></div>
<br>  

                        <div class="form-group row">
                          <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">FBO</label>
                          <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="Text" placeholder="Ingrese el FBO">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Fuel</label>
                          <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="Text" placeholder="informacion de Combustible">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Catering</label>
                          <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="Text" placeholder="Ingrese el Comisariato ">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Notas Especiales</label>
                          <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="Text" placeholder="Ingrese Notas ">
                          </div>
                        </div>
                        <div class="form-group row pt-3">
                        <div class="col-sm-12">
                            <button class="btn btn-secondary btn-space">Cancel</button>
                            <button class="btn btn-primary btn-space wizard-next" data-wizard="#wizard1">Next Step</button>
                          </div>
                        </div>
                      </form>
                    
                  </div>


       

<?php
$i++;
}
?>

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
    <script src="assets/lib/fuelux/js/wizard.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
    <script src="assets/lib/dropzone/dropzone.js" type="text/javascript"></script>
    <script src="assets/js/app-form-wizard.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.wizard();
      });


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


function updatepilot() {
let pax=document.getElementById('tripulacion').value
let array=pax.split('*')
document.getElementById('idpilot').value=array[0]
document.getElementById('paispilot').value=array[1]
document.getElementById('paispilot').classList.add('form-control')
document.getElementById('f_nacimientopilot').value=array[2]
document.getElementById('f_nacimientopilot').classList.add('form-control')
document.getElementById('dnipasspilot').value=array[3]
document.getElementById('dnipasspilot').classList.add('form-control')
document.getElementById('licenciapilot').value=array[4]
document.getElementById('licenciapilot').classList.add('form-control')
 
}


function addbutton2() {
let input0=document.createElement('input')
console.log ('1')
input0.type='hidden'
input0.name='idpilot'
input0.value=document.getElementById('idpilot').value
let input1=document.createElement('input')
input1.value=document.getElementById('tripulacion').value
input1.readOnly='readonly'
let input2=document.createElement('input')
console.log ('2')
input2.value=document.getElementById('paispilot').value
input2.readOnly='readonly'
let input3=document.createElement('input')
input3.value=document.getElementById('f_nacimientopilot').value
input3.readOnly='readonly'
let input4=document.createElement('input')
console.log ('3')
input4.value=document.getElementById('dnipasspilot').value
input4.readOnly='readonly'
let input5=document.createElement('input')
input5.value=document.getElementById('licenciapilot').value
input5.readOnly='readonly'
let input6=document.createElement('input')
input6.value=document.getElementById('funcion').value
input6.readOnly='readonly'
input6.name='funcionpilot'
let input7=document.createElement('input')
console.log ('4')
input7.value=document.getElementById('tramoid').value
input7.name='tramoid'
input1.classList.add('form-control','col-3')
document.getElementById('divpilot').appendChild(input1)
input2.classList.add('form-control','col-2')
document.getElementById('divpilot').appendChild(input2)
input3.classList.add('form-control','col-2')
document.getElementById('divpilot').appendChild(input3)
input4.classList.add('form-control','col-2')
document.getElementById('divpilot').appendChild(input4)
input5.classList.add('form-control','col-2')
document.getElementById('divpilot').appendChild(input5)
input6.classList.add('form-control','col-1')
document.getElementById('divpilot').appendChild(input6)
document.getElementById('divpilot').appendChild(input0)
let e=document.getElementById('tripulacion')
console.log ('5')
let nombre=e.options[e.selectedIndex].text;
input1.value=nombre
document.getElementById('paispilot').value=''
document.getElementById('dnipasspilot').value=''
document.getElementById('licenciapilot').value=''
document.getElementById('f_nacimientopilot').value=''
console.log('submnit');
let form=document.createElement('form')
console.log ('6')
form.appendChild(input0)
form.appendChild(input1)
form.appendChild(input2)
form.appendChild(input3)
form.appendChild(input4)
form.appendChild(input5)
form.appendChild(input6)
form.appendChild(input7)
let button1=document.createElement('button')
form.appendChild(button1)
button1.name='guardar'
form.action='opsmain2.php?id=<?php echo $quote?>'
form.method='post'
console.log('submnit2');
document.body.appendChild(form)
console.log ('7')
//form.submit()
button1.click() 
console.log('submnit3');
}




function updatepax() {
let pax=document.getElementById('cliente').value
let array=pax.split('*')
document.getElementById('pais').value=array[1]
document.getElementById('f_nacimiento').value=array[2]
document.getElementById('dnipass').value=array[3]

   
}



function addbutton() {
let input1=document.createElement('input')
input1.value=document.getElementById('cliente').value
input1.readOnly='readonly'
let input2=document.createElement('input')
input2.value=document.getElementById('pais').value
input2.readOnly='readonly'
let input3=document.createElement('input')
input3.value=document.getElementById('f_nacimiento').value
input3.readOnly='readonly'
let input4=document.createElement('input')
input4.value=document.getElementById('dnipass').value
input4.readOnly='readonly'
input1.classList.add('form-control','col-3')
document.getElementById('divpax').appendChild(input1)
input2.classList.add('form-control','col-3')
document.getElementById('divpax').appendChild(input2)
input3.classList.add('form-control','col-3')
document.getElementById('divpax').appendChild(input3)
input4.classList.add('form-control','col-3')
document.getElementById('divpax').appendChild(input4)
let e=document.getElementById('cliente')
let nombre=e.options[e.selectedIndex].text;
input1.value=nombre
document.getElementById('pais').value=''
document.getElementById('f_nacimiento').value=''
document.getElementById('dnipass').value=''


}


    </script>
  </body>
</html>