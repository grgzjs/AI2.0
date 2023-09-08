<!DOCTYPE html>
<html>

<?php include("conexion.php"); ?>

<head>
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <title>AIS Quote List</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
  <!-- <link rel="stylesheet" href="css/styles.css" type="text/css" /> -->
</head>

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<!-- <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/app.js" type="text/javascript"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="assets/js/login-check.js" type="text/javascript"></script>
<!-- <script src="assets/js/user-validation.js" type="text/javascript"></script> -->

<body>
<?php require_once("nav_header.html") ?>
  <div class="mai-wrapper">
  <?php require_once("nav_header2.html") ?>

    <!--FINAL DE BOTONERA-->

    <div class="main-content container">

      <?php
      //Seccion reservar



      // SECCION DE BORRAR Y EDITAR
      //$sqllist = "select * from invoices where status = 1";


      if (isset($_POST['username']) && $_POST['aksi'] == 'delete') {
        $nik = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES)));
        $delete = mysqli_query($con, "DELETE from invoices WHERE quote=$nik");
        if ($delete) {
          //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
        } else {
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, Data cannot be deleted.</div>';
        }
      }

      if (isset($_POST['aksi']) && $_POST['aksi'] == 'edit') {
        $nik = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES)));
        $sql_edit = "select * from invoices WHERE quote=$nik";
        $edit = mysqli_query($con, $sql_edit);
        if ($edit) {
          $rowedit = mysqli_fetch_assoc($edit);;
          //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
        } else {
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, Data cannot be deleted.</div>';
        }
      }

      if (isset($_POST['aksi']) && $_POST['aksi'] == 'anular') {
        $nik = mysqli_real_escape_string($con, (strip_tags($_POST['nik'], ENT_QUOTES)));
        $sql_anular = "UPDATE invoices SET STATUS = 1 WHERE quote=$nik";
        $anular = mysqli_query($con, $sql_anular);
        echo '<script>console.log("' . $sql_anular . '")</script>';
        if ($anular) {
          // $rowedit = mysqli_fetch_assoc($anular);
        } else {
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error! Este vuelo no puede ser anulado.</div>';
        }
      }

      $sqllist = "select i.*,c.* from invoices i, Contact c where i.status = 1 and i.buyer_id=c.id ORDER BY i.`date` DESC";
      $rows = mysqli_query($con, $sqllist);
      echo '<script>console.log("' . $sqllist . '")</script>';

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

      <!-- AQUI COMIENZA EL LISTADO-->

      <div class="row">
        <div class="col-sm-12">
          <div class="card card-default card-table">
            <div class="card-header">Lista de Cotizaciones
              <div class="tools"></div>
            </div>
            <div class="card-body">
              <div class="noSwipe">
                <table class="table table-striped table-hover" id="table1">
                  <thead>
                    <tr>
                      <th style="width:15%;">Cotizacion </th>
                      <th style="width:15%;">Fecha </th>
                      <th style="width:10%;">Aeronave</th>
                      <th style="width:10%;">Comprador</th>
                      <th style="width:10%;">Total</th>
                      <th style="width:10%;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (mysqli_num_rows($rows) != 0) {
                      while ($row = mysqli_fetch_assoc($rows)) {
                    ?>
                        <tr>
                          <td class="cell-detail"><span><b><?php echo $row['quote']; ?></b></span></td>
                          <td class="cell-detail"> <span><?php echo $row['date']; ?></span></td>
                          <td class="cell-detail"><span><?php echo $row['aircraft']; ?></span></td>
                          <td class="cell-detail"><span><?php echo $row['first_name']; ?><?php echo ' ' . $row['last_name']; ?></span></td>
                          <td class="cell-detail"><span>$<?php echo $row['amount']; ?></span></td>
                          <td class="text-right">
                            <div class="btn-group btn-hspace">
                              <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Seleccionar <span class="icon-dropdown s7-angle-down"></span></button>
                              <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a class="dropdown-item" href='javascript:editarQuote ("<?php echo $row['quote'] ?>")' title="Cambiar">Editar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href='pdfgen.php?id=<?php echo $row['quote'] ?>' title="View">Ver</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href='javascript:borrar ("<?php echo $row['quote'] ?>")' title="Eliminar">Borrar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href='javascript:statusbooked ("<?php echo $row['quote'] ?>")' title="Cambiar">Reservar</a>
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
    function borrar(id_invoice) {
      //"hello.php?aksi=delete&nik= echo $row['quote']; ?>" 
      //console.log('borrar '+id_invoice)
      let form = document.createElement('form')
      form.action = 'hellolist.php'
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
    //Status Function//
    function statusbooked(id_invoice) {
      let form = document.createElement('form')
      form.action = 'opsmain.php'
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
      aksi.value = 'reservar'
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

    //function para sumar km 
    document.getElementById('km_vuelo1').addEventListener('blur', refrescar)
    document.getElementById('km_vuelo2').addEventListener('blur', refrescar)
    document.getElementById('km_vuelo3').addEventListener('blur', refrescar)
    document.getElementById('km_vuelo4').addEventListener('blur', refrescar)
    document.getElementById('km_vuelo5').addEventListener('blur', refrescar)
    let km_v1 = document.getElementById('km_vueloh1')
    if (km_v1) {
      km_v1.addEventListener('blur', refrescar)
    }
    let km_v2 = document.getElementById('km_vueloh2')
    if (km_v2) {
      km_v2.addEventListener('blur', refrescar)
    }
    let km_v3 = document.getElementById('km_vueloh3')
    if (km_v3) {
      km_v3.addEventListener('blur', refrescar)
    }
    let km_v4 = document.getElementById('km_vueloh4')
    if (km_v4) {
      km_v4.addEventListener('blur', refrescar)
    }
    let km_v5 = document.getElementById('km_vueloh5')
    if (km_v5) {
      km_v5.addEventListener('blur', refrescar)
    }
    //function para agregar automatica el origen y destino 
    document.getElementById('fdestino1').addEventListener('blur', function() {
      let dest1 = document.getElementById('fdestino1')
      let ori2 = document.getElementById('forigen2')

      if (dest1 != undefined && ori2 != undefined) {
        ori2.value = dest1.value
      }

    })

    document.getElementById('fdestino2').addEventListener('blur', function() {
      let dest2 = document.getElementById('fdestino2')
      let ori3 = document.getElementById('forigen3')

      if (dest2 != undefined && ori3 != undefined) {
        ori3.value = dest2.value
      }

    })

    document.getElementById('tax').addEventListener('blur', calculartotal)

    //function refrescar search quotes
    function refreshpage() {
      setTimeout(() => {
        window.location.href = "hello.php";
      }, 100);


    }



    //TRYING TO GET A TOTAL CALCULATE VALUE
    function updateaddress(selectaddress) {
      let idbuyer = selectaddress.value
      let pos = idbuyer.indexOf('**')
      let addressbuyer = idbuyer.substring(pos + 2)
      let divaddress = document.getElementById('divaddress')
      divaddress.innerHTML = addressbuyer
      let address = document.getElementById('address')
      address.value = addressbuyer
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
  <script src="assets/lib/datatables/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
  <script src="assets/lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
  <script src="assets/lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
  <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
  <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
  <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
  <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
  <script src="assets/lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
  <script src="assets/js/app-tables-datatables.js" type="text/javascript"></script>
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