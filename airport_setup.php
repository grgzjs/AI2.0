<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <title>AIS Airport Config</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
</head>

<style>
  .modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
  }

  .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
  }

  .close {
    color: #f54c4c;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #c23636;
    text-decoration: none;
    cursor: pointer;
  }

  .popup-text {
    padding-top: 15px;
    padding-left: 20px;
    font-size: 1.35em;
  }

  .scrollable-table {
    width: calc(100% - 17px);
    display: block;
  }

  .thead-static {
    width: 100%;
    display: block;
  }

  .thead-static tr {
    display: block;
    width: 100%;
  }

  .tbody-scroll {
    height: 500px;
    overflow-y: auto;
    display: block;
    width: 100%;
  }

  .tbody-scroll tr {
    display: block;
    width: 100%;
  }
</style>

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<!-- <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="assets/js/login-check.js" type="text/javascript"></script>
<script src="assets/js/user-validation.js" type="text/javascript"></script>

<body>
  <div id="error-popup" class="modal">
    <div class="modal-content">
      <span id="pop-up-close" class="close">&times;</span>
      <p id="popup-text" class="popup-text">Some text in the Modal..</p>
    </div>
  </div>
  <?php require_once("nav_header.html") ?>
  <div class="mai-wrapper">
    <?php require_once("nav_header2.html"); ?>

    <!--FINAL DE BOTONERA-->

    <div class="main-content container">

      <?php
      if (isset($_POST['save'])) {

        $nombre       = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES)));
        $ciudad        = mysqli_real_escape_string($con, (strip_tags($_POST["ciudad"], ENT_QUOTES)));
        $pais        = mysqli_real_escape_string($con, (strip_tags($_POST["pais"], ENT_QUOTES)));
        $icao        = mysqli_real_escape_string($con, (strip_tags($_POST["icao"], ENT_QUOTES)));

        $insert_airport_query = "INSERT INTO `airports` (`airport_code`, `airport_name`, `airport_country`, `airport_city`) 
        VALUES ('$icao','$nombre','$pais','$ciudad')";

        if (mysqli_query($con, $insert_airport_query) == 1) {
      ?>
          <script>
            setTimeout(() => {
              window.location.href = "airport_setup.php?success";
            }, 100);
          </script>
        <?php
        } else {
        ?>
          <script>
            setTimeout(() => {
              window.location.href = "airport_setup.php?failure";
            }, 100);
          </script>
        <?php
        }
      }

      echo '<script>console.log("'.$_POST['delete'].'")</script>';

      if (isset($_POST['delete'])) {
        $icao        = mysqli_real_escape_string($con, (strip_tags($_POST["delete"], ENT_QUOTES)));

        $delete_airport_query = "DELETE FROM `airports` WHERE `airport_code`='$icao'";
        mysqli_query($con, $delete_airport_query);
        echo '<script>console.log("Hola3")</script>';
      }
      ?>

      <!-- <div class="main-content container"> -->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header card-header-divider">Configuracion de Aeropuertos<span class="card-subtitle">Cargar un nuevo aeropuerto</span></div>
            <div class="card-body pl-sm-5">
              <form action="airport_setup.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Nombre</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" required type="text" value="" placeholder="Nombre" name="nombre">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Ciudad</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" required type="text" value="" placeholder="Ciudad" name="ciudad">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">País</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" required type="text" value="" placeholder="País" name="pais">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Código</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" required type="text" value="" placeholder="ICAO" name="icao">
                  </div>
                </div>
                <div class="col-lg-12">
                  <p class="text-right">
                    <button class="btn btn-space btn-primary" name="save" type="submit" id="submit_btn">Procesar</button>
                  </p>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card card-default">
                  <div class="card-header card-header-divider">Lista de Aeropuertos<span class="card-subtitle">Los Aeropuertos Actualmente Registrados</span></div>
                  <div class="col-sm-12">
                    <div class="card card-default card-table">
                      <!-- <div class="card-header">Lista de Contactos
                        <div class="tools"><span class="icon s7-cloud-download"></span><span class="icon s7-edit"></span></div>
                      </div> -->
                      <div class="card-body">
                        <div class="table-responsive noSwipe">
                          <table class="table table-striped table-hover scrollable-table">
                            <thead class="thead-static">
                              <tr>
                                <th style="width:5%;">
                                  <!-- <label class="custom-control custom-control-sm custom-checkbox">
                                    <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                                  </label> -->
                                </th>
                                <th style="width:40%;">Nombre de Aeropuerto</th>
                                <th style="width:25%;">Ciudad</th>
                                <th style="width:15%;">País</th>
                                <th style="width:10%;">ICAO</th>
                                <th style="padding-right: 121px;"></th>
                              </tr>
                            </thead>
                            <tbody class="tbody-scroll">

                              <?php
                              $airport_query = "SELECT * FROM `airports`";
                              $airport_data = mysqli_query($con, $airport_query);
                              if (mysqli_num_rows($airport_data) == 0) {
                                echo '<script>console.log("Hola")</script>';
                              } else {
                                echo '<script>console.log("Hola2")</script>';
                                while ($airport_row = mysqli_fetch_assoc($airport_data)) {
                              ?>
                                  <tr>
                                    <td style="width:5%;">
                                      <!-- <label class="custom-control custom-control-sm custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                                      </label> -->
                                    </td>
                                    <td class="cell-detail" style="width:40%;">
                                      <span><?php echo $airport_row['airport_name'] == "" ? "-" : $airport_row['airport_name']; ?></span>
                                    </td>
                                    <td class="cell-detail" style="width:25%;">
                                      <span><?php echo $airport_row['airport_city'] == "" ? "-" : $airport_row['airport_city']; ?></span>
                                    </td>
                                    <td class="cell-detail" style="width:15%;">
                                      <span><?php echo $airport_row['airport_country'] == "" ? "-" : $airport_row['airport_country']; ?></span>
                                    </td>
                                    <td class="cell-detail" style="width:10%;">
                                      <span><?php echo $airport_row['airport_code'] == "" ? "-" : $airport_row['airport_code']; ?></span>
                                    </td>
                                    <td class="text-right">
                                      <div class="btn-group btn-hspace">
                                        <button class="btn btn-secondary btn-xs" type="button" onclick="javascript:delete_airport('<?php echo $airport_row['airport_code']; ?>')">Borrar</button>
                                        <!-- <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Seleccionar<span class="icon-dropdown s7-angle-down"></span></button> -->
                                        <!-- <div class="dropdown-menu dropdown-menu-right" role="menu">
                                          <a class="dropdown-item" href="javascript:editarcontacto(<?php //echo $row['id']; 
                                                                                                    ?>)">Editar</a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="crm.php?aksi=delete&nik=<?php //echo $row['id']; 
                                                                                                  ?>" title="Eliminar" onclick="return confirm('Are you sure? <?php //echo $row['Last_Name']; 
                                                                                                                                                              ?>')">Borrar</a>
                                        </div> -->
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
                  <!-- <div class="card-body pl-sm-5">
                    <div class="form-group row">
                      <label class="col-12 col-sm-4 col-form-label text-sm-right">Account</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" type="text" value="" placeholder="Account" name="account">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-4 col-form-label text-sm-right">ABA Routing</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" type="text" value="" placeholder="ABA Routing" name="aba">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-4 col-form-label text-sm-right">Swift</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" type="text" value="" placeholder="Swift" name="swift">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-4 col-form-label text-sm-right">Bank Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" type="text" value="" placeholder="Bank Name" name="bank_name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-4 col-form-label text-sm-right">Bank Address</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" type="text" value="" placeholder="Bank Address" name="bank_address">
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>

        </div>
        </form>

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
    
    let submit_btn = document.getElementById("submit_btn");
      submit_btn.addEventListener("click", function(event){
      let user_type = localStorage.getItem("user_type");
      let email = localStorage.getItem("email");
      let username = localStorage.getItem("username");
      $.ajax({
                url: "logs_query.php?email=" + email + "&username=" + username + "&role=" + user_type + "&action='registered airport'", // your php file
                type: "GET", // type of the HTTP request
                success: function(data) {
                  console.log(data)
                   console.log("registered quote");
                }
            });
    });
    function delete_airport(icao) {
      let user_type = localStorage.getItem("user_type");
      let email = localStorage.getItem("email");
      let username = localStorage.getItem("username");
      $.ajax({
                url: "logs_query.php?email=" + email + "&username=" + username + "&role=" + user_type + "&action='deleted airport'", // your php file
                type: "GET", // type of the HTTP request
                success: function(data) {
                  console.log(data)
                   console.log("registered quote");
                }
            });
      let form = document.createElement("form");
      form.action = "airport_setup.php";
      form.method = "post";

      let submit = document.createElement("button");
      submit.name = "delete";
      submit.type = "submit";
      submit.value = icao;
      
      form.appendChild(submit);

      document.body.appendChild(form);
      submit.click();
    }

    function success() {
      let popup = document.getElementById("error-popup");
      let popup_text = document.getElementById("popup-text");

      popup.style.display = "block";
      popup_text.innerHTML = "Aeropuerto cargado correctamente.";
    }

    function failure() {
      let popup = document.getElementById("error-popup");
      let popup_text = document.getElementById("popup-text");

      popup.style.display = "block";
      popup_text.innerHTML = "El aeropuerto ya está en el sistema";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      let popup = document.getElementById("error-popup");
      if (event.target == popup) {
        popup.style.display = "none";
      }
    }

    document.getElementById("pop-up-close").onclick = function() {
      document.getElementById("error-popup").style.display = "none";
    }
  </script>
  <?php
  if (isset($_GET['success'])) {
    echo '<script> success(); </script>';
  } else if (isset($_GET['failure'])) {
    echo '<script> failure(); </script>';
  }
  ?>
</body>

</html>