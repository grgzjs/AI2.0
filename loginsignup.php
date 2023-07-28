<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <title>AIS Login 3</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
  <link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<!-- <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/app.js" type="text/javascript"></script> -->

<script src="assets/js/login-check.js" type="text/javascript"></script>

<body class="mai-splash-screen">
  <div class="mai-wrapper mai-sign-up">
    <div class="main-content container">
      <div class="splash-container row">
        <div id="error-popup" class="modal">
          <div class="modal-content">
            <span id="pop-up-close" class="close">&times;</span>
            <p id="popup-text" class="popup-text">Some text in the Modal..</p>
          </div>
        </div>
        <div class="col-md-6 form-message"><img class="logo-img mb-4" src="src/youlogo.svg" alt="logo" width="338" height="56"><span class="splash-description text-center mt-4 mb-4">Registrarse</span>
          <form method='POST' id='login-form' action='dashboard.php' class="sign-up-form">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend"><i class="icon s7-user"></i></div>
                <input id="input-user" class="form-control" id="username" type="text" placeholder="Usuario" autocomplete="off" onchange="validateUser()">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend"><i class="icon s7-mail"></i></div>
                <input id="input-email" class="form-control" id="email" type="text" placeholder="Email" autocomplete="off" onchange="validateEmail()">
              </div>
            </div>
            <div class="form-group inline row">
              <div class="col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend"><i class="icon s7-lock"></i></div>
                  <input id="input-pssw" class="form-control" id="pass1" type="password" placeholder="Contraseña" autocomplete="off" onchange="validatePssw()">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend"><i class="icon s7-lock"></i></div>
                  <input id="input-confirm" class="form-control" id="pass2" type="password" placeholder="Confirmar" autocomplete="off" onchange="validateConfirm()">
                </div>
              </div>
            </div>
            <div class="form-group sign-up-submit"><a class="btn btn-lg btn-primary btn-block" onclick='validateSignup()' value='signup' data-dismiss="modal">Registrarse</a></div>
            <!-- <div class="title mb-4"><span>Or</span></div>
            <div class="form-group row social-signup mb-4">
              <div class="col-6">
                <button class="btn btn-block btn-social btn-color btn-facebook" type="button"><i class="fa fa-facebook icon icon-left"></i> Facebook</button>
              </div>
              <div class="col-6">
                <button class="btn btn-block btn-social btn-color btn-google-plus" type="button"><i class="fa fa-google-plus icon icon-left"></i> Google plus</button>
              </div>
            </div> -->
            <p class="conditions">Al crear una cuenta, usted está aceptando los <a href="#" target="_blank">Términos y Condiciones</a>.</p>
          </form>
          <div class="out-links"><a href="#">© 2023 Gustoso Soft</a></div>
        </div>
        <div class="col-md-6 user-message"><span class="splash-message text-left">Bienvenido a<br> YouAir!<br> Disfrute</span></div> <!-- <span class="alternative-message text-right">Don't have an account? <a href="pages-sign-up.html">Sign Up</a></span> -->
      </div>
    </div>
  </div>
  <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
  <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
  <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="assets/js/app.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      //-initialize the javascript
      App.init();
    });
  </script>
  <script>
    // TODO: an eye icon could be added to show the password onclick
    // it should change the type of input from password to text and viceversa on toggle

    var validUser = false;
    var validPssw = false;
    var validMail = false;

    var username = "";
    var password = "";
    var email = "";

    function validateSignup() {
      let popup = document.getElementById("error-popup");
      let popup_text = document.getElementById("popup-text");

      // don't allow if inputs are not valid
      if (validUser && validMail && validPssw) {
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
          url: "login_query.php?new_username=" + username + "&new_password=" + password + "&new_email=" + email + "&new_token=" + token_generated + "&user_type=admin",
          type: "GET",
          success: function(data) {
            localStorage.setItem('token', token_generated);
            // localStorage.setItem('user_type', 'admin');
            document.getElementById("login-form").submit();
          }
        });
      } else {
        console.log(validUser);
        console.log(validMail);
        console.log(validPssw);
        popup.style.display = "block";
        popup_text.innerHTML = "El usuario, mail o contraseña ingresados no tienen formatos válidos.";
        return;
      }
    }

    function validateUser() {
      let popup = document.getElementById("error-popup");
      let popup_text = document.getElementById("popup-text");

      let user = document.getElementById("input-user").value;

      validUser = false;

      if (user == null || user == "") {
        popup.style.display = "block";
        popup_text.innerHTML = "La casilla de usuario no puede estar vacía.";
        return;
      }

      if (user.length < 4) {
        popup.style.display = "block";
        popup_text.innerHTML = "El usuario debe tener al menos 4 caracteres.";
        return;
      }

      if (/[\s]/g.test(user)) {
        popup.style.display = "block";
        popup_text.innerHTML = "El usuario no puede contener espacios.";
        return;
      }

      if (/[`!@#$%^&*()+\-=\[\]{};':"\\|,.<>\/?~]/g.test(user)) {
        popup.style.display = "block";
        popup_text.innerHTML = "Algunos caracteres en el usuario no son válidos.";
        return;
      }

      validUser = true;
      username = user;
    }

    function validatePssw() {
      let popup = document.getElementById("error-popup");
      let popup_text = document.getElementById("popup-text");

      let pssw = document.getElementById("input-pssw").value;

      validPssw = false;

      if (pssw == null || pssw == "") {
        popup.style.display = "block";
        popup_text.innerHTML = "La casilla de contraseña no puede estar vacía.";
        return;
      }

      if (pssw.length < 8) {
        popup.style.display = "block";
        popup_text.innerHTML = "La contraseña debe tener al menos 8 caracteres.";
        return;
      }

      if (!/[a-z]/g.test(pssw)) {
        popup.style.display = "block";
        popup_text.innerHTML = "La contraseña debe tener al menos una minúscula.";
        return;
      }

      if (!/[A-Z]/g.test(pssw)) {
        popup.style.display = "block";
        popup_text.innerHTML = "La contraseña debe tener al menos una mayúscula.";
        return;
      }

      if (!/[0-9]/g.test(pssw)) {
        popup.style.display = "block";
        popup_text.innerHTML = "La contraseña debe tener al menos un número.";
        return;
      }

      if (/[\s]/g.test(pssw)) {
        popup.style.display = "block";
        popup_text.innerHTML = "El usuario no puede contener espacios.";
        return;
      }

      if (/[`^()\[\]{}'"\\|<>\/]/.test(pssw)) {
        popup.style.display = "block";
        popup_text.innerHTML = "Algunos caracteres en la contraseña no son válidos.";
        return;
      }

      // only valid once confirmation is also valid
      // validPssw = true;
    }

    function validateConfirm() {
      let popup = document.getElementById("error-popup");
      let popup_text = document.getElementById("popup-text");

      let confirm = document.getElementById("input-confirm").value;
      let pssw = document.getElementById("input-pssw").value;

      validPssw = false;

      if (confirm != pssw) {
        popup.style.display = "block";
        popup_text.innerHTML = "Las contraseñas no concuerdan.";
        return;
      }

      validPssw = true;
      password = pssw;
    }

    function validateEmail() {
      let popup = document.getElementById("error-popup");
      let popup_text = document.getElementById("popup-text");

      let mail = document.getElementById("input-email").value;

      validMail = false;

      if (mail == null || mail == "") {
        popup.style.display = "block";
        popup_text.innerHTML = "La casilla de email no puede estar vacía.";
        return;
      }

      if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
        popup.style.display = "block";
        popup_text.innerHTML = "El email ingresado no cumple con el formato email (mail_de_ejemplo@ejemplo.com).";
        return;
      }

      validMail = true;
      email = mail;
    }

    window.onclick = function(event) {
      let popup = document.getElementById("error-popup");
      if (event.target == popup) {
        popup.style.display = "none";
      }
    }

    document.getElementById("pop-up-close").onclick = function() {
      document.getElementById('error-popup').style.display = 'none';
    }
  </script>
</body>

</html>