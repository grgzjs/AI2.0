<?php
require("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>AIS Login</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/>
  </head>
  <body class="mai-splash-screen">
    <div class="mai-wrapper mai-login">
      <div class="main-content container">
        <div class="splash-container row">
          <div class="col-md-6 user-message"><span class="splash-message text-right">Hola!<br> es bueno<br> verte de nuevo</span><span class="alternative-message text-right">No tienes cuenta? <a href="loginsignup.php">Creá tu cuenta</a></span></div>
          <div class="col-md-6 form-message"><img class="youlogo" src="src/youlogo.svg" alt="logo" width="338" height="56"><span class="splash-description text-center mt-5 mb-5">Ingresá a tu cuenta</span>
            <form method = 'POST' id='form1' action = 'dashboard.html'>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><i class="icon s7-user"></i></div>
                  <input class="form-control" name="username" type="text" placeholder="Usuario" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><i class="icon s7-lock"></i></div>
                  <input class="form-control" name="password" type="password" placeholder="Contraseña">
                </div>
              </div>
              <div class="form-group login-submit"><a class="btn btn-lg btn-primary btn-block" onclick='document.getElementById("form1").submit()' value ='login' data-dismiss="modal">Ingresar</a></div>
              <div class="form-group row login-tools">
                <div class="col-sm-6 login-remember">
                  <label class="custom-control custom-checkbox mt-2">
                    <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Recuerdame</span>
                  </label>
                </div>
                <div class="col-sm-6 pt-2 text-sm-right login-forgot-password"><a href="loginforgot.php">Olvidaste tu cuenta?</a></div>
              </div>
            </form>
            <div class="out-links"><a href="#">© 2023 Gustoso Soft</a></div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      });
      
    </script>
  </body>
</html>