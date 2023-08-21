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
  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
  <link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="assets/js/login-check.js" type="text/javascript"></script>

<body class="mai-splash-screen">
  <div class="mai-wrapper mai-login">
    <div class="main-content container">
      <div class="splash-container row">
        <div id="error-popup" class="modal">
          <div class="modal-content">
            <span id="pop-up-close" class="close">&times;</span>
            <p id="popup-text" class="popup-text">Some text in the Modal..</p>
          </div>
        </div>
        <div class="col-md-6 user-message"><span class="splash-message text-right">Hola!<br> es bueno<br> verte de nuevo</span><span class="alternative-message text-right">No tienes cuenta? <a href="loginsignup.php">Creá tu cuenta</a></span></div>
        <div class="col-md-6 form-message"><img class="youlogo" src="src/youlogo.svg" alt="logo" width="338" height="56"><span class="splash-description text-center mt-5 mb-5">Ingresá a tu cuenta</span>
          <form method='POST' id='login-form' action='dashboard.php'>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend"><i class="icon s7-user"></i></div>
                <input id="input-user" class="form-control" name="username" type="text" placeholder="Usuario o Email"> <!-- onchange="validateUser()" -->
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend"><i class="icon s7-lock"></i></div>
                <input id="input-pssw" class="form-control" name="password" type="password" placeholder="Contraseña"> <!-- onchange="validatePssw()" -->
              </div>
            </div>
            <div class="form-group login-submit"><a class="btn btn-lg btn-primary btn-block" onclick='validateLogin()' value='login' data-dismiss="modal">Ingresar</a></div>
            <div class="form-group row login-tools">
              <div class="col-sm-6 login-remember">
                <!-- <label class="custom-control custom-checkbox mt-2">
                  <input class="custom-control-input" type="checkbox"><span id="remember-me-chckbox" class="custom-control-label">Recuerdame</span>
                </label> -->
              </div>
              <!-- <div class="col-sm-6 pt-2 text-sm-right login-forgot-password"><a href="loginforgot.php">Olvidaste tu contraseña?</a></div> -->
            </div>
          </form>
          <div class="out-links"><a href="#">© 2023 Gustoso Soft</a></div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      //-initialize the javascript
      App.init();
    });
  </script>
  <script>
    // TODO: an eye icon could be added to show the password onclick
    // it should change the type of input from password to text and viceversa on toggle

    function validateLogin() {
      let popup = document.getElementById("error-popup");
      let popup_text = document.getElementById("popup-text");

      let user = document.getElementById("input-user").value;
      let pssw = document.getElementById("input-pssw").value;

      const rand = () => {
        return Math.random().toString(36).substring(2);
      };

      const token = () => {
        let token = "";
        for (let i = 0; i < 24; i++) {
          token += rand();
        }
        return token;
      };

      let token_generated = token().toString().substring(0, 250);

      $.ajax({
        url: "login_query.php?check_username=" + user + "&check_password=" + pssw, // your php file
        type: "GET", // type of the HTTP request
        success: function(data) {
          user_data = jQuery.parseJSON(data);
        
          if (user_data[0] == 1) {
            localStorage.setItem('token', token_generated);
            localStorage.setItem('username', user_data[1]);
            localStorage.setItem('email', user_data[2]);
            localStorage.setItem('user_type', user_data[3]);

            document.getElementById("login-form").submit();
          } else {
            popup.style.display = "block";
            popup_text.innerHTML = "El usuario o la contraseña ingresados son incorrectos.<br>Recuerda que si no estás registrado puedes hacerlo <a href='loginsignup.php'>aquí</a>.";
          }
        }
      });
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
</body>

</html>