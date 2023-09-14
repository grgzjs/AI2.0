<!DOCTYPE html>
<html lang="en">

<?php
include("conexion.php");
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <title>AIS Operations</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/jquery.fullcalendar/fullcalendar.min.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
</head>

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<!-- <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/app.js" type="text/javascript"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="assets/js/login-check.js" type="text/javascript"></script>

<body>
  <?php require_once("nav_header.html") ?>

  <div class="mai-wrapper">
    <?php require_once("nav_header2.html") ?>

    <input id="matricula_selected" value="<?php echo isset($_POST["matricula_selector"]) ? $_POST["matricula_selector"] : "General"; ?>" hidden></input>

    <div class="container" style="padding-top:4em">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group row">
            <div class="col-12">
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="matricula_selector_form" style="display:none">
                <h4>Seleccione una Aeronave</h4>
                <select name="matricula_selector" id="matricula_selector" class="form-control custom-select">
                  <?php
                  $aircraft = mysqli_query($con, "SELECT * FROM Aircraft");

                  // Verificar si se ha enviado un valor para matricula_selector
                  if (isset($_POST['matricula_selector'])) {
                    $selectedValue = $_POST['matricula_selector'];

                    // Comprobar y marcar como seleccionado si coincide con el valor en el bucle
                    if ($selectedValue == 'General') {
                      echo "<option value='General' selected>General</option>";
                      while ($plane_rows = mysqli_fetch_assoc($aircraft)) {
                        echo "<option value='" . $plane_rows['matricula'] . "'>".$plane_rows['aeronave']." (" . $plane_rows['matricula'] . ")</option>";
                      }
                    } else {
                      echo "<option value='General'>General</option>";
                      while ($plane_rows = mysqli_fetch_assoc($aircraft)) {
                        if ($selectedValue == $plane_rows['matricula']) {
                          echo "<option value='" . $plane_rows['matricula'] . "' selected>" . $plane_rows['matricula'] . "</option>";
                        } else {
                          echo "<option value='" . $plane_rows['matricula'] . "'>".$plane_rows['aeronave']." (" . $plane_rows['matricula'] . ")</option>";
                        }
                      }
                    }
                  } else {
                    echo "<option value='General'>General</option>";
                    while ($plane_rows = mysqli_fetch_assoc($aircraft)) {
                      echo "<option value='" . $plane_rows['matricula'] . "'>".$plane_rows['aeronave']." (" . $plane_rows['matricula'] . ")</option>";
                    }
                  }
                  ?>
                </select>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main-content container">
      <div class="row full-calendar">
        <div class="col-md-12">
          <div class="card card-default card-fullcalendar">
            <div class="card-body">
              <div id="calendar"></div>
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
  <script src="assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
  <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <script src="assets/lib/jquery.fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
  <script src="assets/js/app-pages-calendar.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      //-initialize the javascript
      App.init();
      App.pageCalendar();
    });
  </script>
  <script>
    let user_type = localStorage.getItem("user_type");
    let matricula_selector_form = document.getElementById("matricula_selector_form");
    let selectElement = document.getElementById("matricula_selector");

    if (user_type == "owner") {
      document.getElementById("matricula_selector_form").style.display = "block";
    }

    // Agrega un evento de cambio al select
    selectElement.addEventListener("change", function() {
      matricula_selector_form.submit();
    });
  </script>
</body>

</html>