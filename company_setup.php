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
  <title>AIS Company Config</title>
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

      <?php //Funcionalidades
      $target_dir = "assets/img/company_uploads/";
      if (isset($_POST['save'])) {
        $something_was_uploaded = false;
        $nombre       = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES)));
        $email        = mysqli_real_escape_string($con, (strip_tags($_POST["email"], ENT_QUOTES)));
        $direccion    = mysqli_real_escape_string($con, (strip_tags($_POST["direccion"], ENT_QUOTES)));
        $telefono     = mysqli_real_escape_string($con, (strip_tags($_POST["telefono"], ENT_QUOTES)));
        $webpage      = mysqli_real_escape_string($con, (strip_tags($_POST["webpage"], ENT_QUOTES)));
        $tyc          = mysqli_real_escape_string($con, (strip_tags($_POST["tyc"], ENT_QUOTES)));

        $account      = mysqli_real_escape_string($con, (strip_tags($_POST["account"], ENT_QUOTES)));
        $aba          = mysqli_real_escape_string($con, (strip_tags($_POST["aba"], ENT_QUOTES)));
        $swift        = mysqli_real_escape_string($con, (strip_tags($_POST["swift"], ENT_QUOTES)));
        $bank_name    = mysqli_real_escape_string($con, (strip_tags($_POST["bank_name"], ENT_QUOTES)));
        $bank_address = mysqli_real_escape_string($con, (strip_tags($_POST["bank_address"], ENT_QUOTES)));

        $rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `company` WHERE company_id=1;"));
        echo "<script>console.log('rows: $rows')</script>";
        // return;
        if ($rows == 0) {
          mysqli_query($con, "INSERT INTO `company` (`company_id`, `name`, `email`, `direccion`, `telefono`, `webpage`, `tyc`, `account`, `aba`, `swift`, `bank_name`, `bank_address`) VALUES ('1', '$nombre', '$email', '$direccion', '$telefono', '$webpage', '$tyc', '$account', '$aba', '$swift', '$bank_name', '$bank_address');");
          $something_was_uploaded = true;
        } else {
          if ($nombre) {
            mysqli_query($con, "UPDATE `company` SET `name` = '$nombre' WHERE `company`.`company_id` = 1;");
            $something_was_uploaded = true;
          }
          if ($email) {
            mysqli_query($con, "UPDATE `company` SET `email` = '$email' WHERE `company`.`company_id` = 1;");
            $something_was_uploaded = true;
          }
          if ($direccion) {
            mysqli_query($con, "UPDATE `company` SET `direccion` = '$direccion' WHERE `company`.`company_id` = 1;");
            $something_was_uploaded = true;
          }
          if ($telefono) {
            mysqli_query($con, "UPDATE `company` SET `telefono` = '$telefono' WHERE `company`.`company_id` = 1;");
            $something_was_uploaded = true;
          }
          if ($webpage) {
            mysqli_query($con, "UPDATE `company` SET `webpage` = '$webpage' WHERE `company`.`company_id` = 1;");
            $something_was_uploaded = true;
          }
          if ($tyc) {
            mysqli_query($con, "UPDATE `company` SET `tyc` = '$tyc' WHERE `company`.`company_id` = 1;");
            $something_was_uploaded = true;
          }
          if ($account) {
            mysqli_query($con, "UPDATE `company` SET `account` = '$account' WHERE `company`.`company_id` = 1;");
            $something_was_uploaded = true;
          }
          if ($aba) {
            mysqli_query($con, "UPDATE `company` SET `aba` = '$aba' WHERE `company`.`company_id` = 1;");
            $something_was_uploaded = true;
          }
          if ($swift) {
            mysqli_query($con, "UPDATE `company` SET `swift` = '$swift' WHERE `company`.`company_id` = 1;");
            $something_was_uploaded = true;
          }
          if ($bank_name) {
            mysqli_query($con, "UPDATE `company` SET `bank_name` = '$bank_name' WHERE `company`.`company_id` = 1;");
            $something_was_uploaded = true;
          }
          if ($bank_address) {
            mysqli_query($con, "UPDATE `company` SET `bank_address` = '$bank_address' WHERE `company`.`company_id` = 1;");
            $something_was_uploaded = true;
          }
        }

        echo "<script>console.log('rows: $rows')</script>";

        if (count(array_filter($_FILES['imagen']['name'])) == 1) {
          $target_file = $target_dir . basename($_FILES["imagen"]["name"][0]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
          $check = getimagesize($_FILES["imagen"]["tmp_name"][0]);
          if ($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            echo "<script>console.log('File is an image -  " . $check["mime"] . "')</script>";
            $uploadOk = 1;
          } else {
            // echo "File is not an image.";
            echo "<script>console.log('File is not an image.')</script>";
            $uploadOk = 0;
          }

          if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            echo "<script>console.log('Sorry, file already exists.')</script>";
            $uploadOk = 0;
          }

          if ($_FILES["imagen"]["size"][0] > 50000000) {
            // echo "Sorry, your file is too large.";
            echo "<script>console.log('Sorry, your file is too large.')</script>";
            $uploadOk = 0;
          }

          if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo "<script>console.log('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
            $uploadOk = 0;
          }

          if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
            echo "<script>console.log('Sorry, your file was not uploaded.')</script>";
          } else {
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"][0], $target_file)) {
              mysqli_query($con, "UPDATE `company` SET `logo_dir` = '$target_file' WHERE `company`.`company_id` = 1;");
              $something_was_uploaded = true;
              // echo "The file ". htmlspecialchars( basename( $_FILES["imagen"]["name"])). " has been uploaded.";
              echo "<script>console.log('The file " . htmlspecialchars(basename($_FILES["imagen"]["name"])) . " has been uploaded.')</script>";
            } else {
              // echo "Sorry, there was an error uploading your file.";
              echo "<script>console.log('Sorry, there was an error uploading your file.')</script>";
            }
          }

          // return;
        }
        if ($something_was_uploaded) {
      ?>
          <script>
            setTimeout(() => {
              window.location.href = "company_setup.php?success";
            }, 100);
          </script>
      <?php
        }
      }
      ?>
      
      <!-- <div class="main-content container"> -->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header card-header-divider">Configuracion de la Compañia<span class="card-subtitle">Informacion de la Compañia</span></div>
            <div class="card-body pl-sm-5">
              <form action="company_setup.php" id="company-form" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Nombre</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="" placeholder="Nombre" name="nombre">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Email Corporativo</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="" placeholder="Email Corporativo" name="email">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Logo</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <!--<input type="file" class="" value="" name="imagen">-->
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" value="" name="imagen[]" id="imagen">
                      <label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
                    </div>
                  </div>
                </div>
                <script>
                  $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                  });
                </script>
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Dirección Corporativa</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="" placeholder="Dirección Corporativa" name="direccion">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Teléfono Corporativo</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="" placeholder="Teléfono Corporativo" name="telefono">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Página Web Oficial</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" type="text" value="" placeholder="Página Web Oficial" name="webpage">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-4 col-form-label text-sm-right">Términos y Condiciones</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <textarea name="tyc" wrap="hard" form="company-form" class="form-control" placeholder="Términos y Condiciones" cols="50" rows="10"></textarea>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card card-default">
                  <div class="card-header card-header-divider">Configuracion de Transferencia<span class="card-subtitle">Informacion de Transferencia</span></div>
                  <div class="card-body pl-sm-5">
                    <div class="form-group row">
                      <label class="col-12 col-sm-4 col-form-label text-sm-right">Cuenta Bancaria</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" type="text" value="" placeholder="Cuenta Bancaria" name="account">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-4 col-form-label text-sm-right">ABA Routing</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" type="text" value="" placeholder="ABA Routing" name="aba">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-4 col-form-label text-sm-right">SWIFT</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" type="text" value="" placeholder="SWIFT" name="swift">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-4 col-form-label text-sm-right">Nombre de Banco</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" type="text" value="" placeholder="Nombre de Banco" name="bank_name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-4 col-form-label text-sm-right">Dirección de Banco</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" type="text" value="" placeholder="Dirección de Banco" name="bank_address">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <p class="text-right">
                <button class="btn btn-space btn-primary" name="save" type="submit" id="submit_btn">Procesar</button>
                <!-- <button class="btn btn-space btn-secondary">Cancelar</button> -->
              </p>
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
    //POPUP SCRIPT
    let submit_btn = document.getElementById("submit_btn");
    submit_btn.addEventListener("click", function(event){
      let user_type = localStorage.getItem("user_type");
      let email = localStorage.getItem("email");
      let username = localStorage.getItem("username");
      $.ajax({
                url: "logs_query.php?email=" + email + "&username=" + username + "&role=" + user_type + "&action='edited company details'", // your php file
                type: "GET", // type of the HTTP request
                success: function(data) {
                  console.log(data)
                   console.log("registered quote");
                }
            });
    });

    function success() {
      let popup = document.getElementById("error-popup");
      let popup_text = document.getElementById("popup-text");

      popup.style.display = "block";
      popup_text.innerHTML = "Datos de la compañia actualizados correctamente.";
    };

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
    echo "<script>console.log('get success')</script>";
    echo '<script> success(); </script>';
  }
  ?>
</body>

</html>