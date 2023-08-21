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
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <title>AI Soft V1.0</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
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
    <?php require_once("nav_header.html") ?>

    <!-- Starts email -->

    <div class="main-content container">
      <div class="row email">
        <div class="col-md-3 email-aside">
          <div class="aside-content">
            <div class="content">
              <div class="aside-header navbar-expand-sm">
                <button class="navbar-toggler" data-target=".aside-nav" data-toggle="collapse" type="button"><span class="icon s7-angle-down"></span></button><span class="title">Mail Service</span>
                <p class="description">Service description</p>
              </div>
              <div class="aside-nav navbar-collapse collapse">
                <ul class="navbar-nav">
                  <li class="nav-item active"><a class="nav-link" href="#"><span class="badge badge-primary">8</span><i class="icon s7-drawer"></i> Inbox</a></li>
                  <li class="nav-item"><a class="nav-link" href="#"><i class="icon s7-mail"></i> Sent Mail</a></li>
                  <li class="nav-item"><a class="nav-link" href="#"><span class="badge badge-light">4</span><i class="icon s7-portfolio"></i> Important</a></li>
                  <li class="nav-item"><a class="nav-link" href="#"><i class="icon s7-file"></i> Drafts</a></li>
                  <li class="nav-item"><a class="nav-link" href="#"><i class="icon s7-ticket"></i> Tags</a></li>
                  <li class="nav-item"><a class="nav-link" href="#"><i class="icon s7-trash"></i> Trash</a></li>
                </ul><span class="title">Labels</span>
                <ul class="navbar-nav nav-pills nav-stacked">
                  <li class="nav-item"><a class="nav-link" href="#"><span class="badge badge-info">2</span> Inbox</a></li>
                  <li class="nav-item"><a class="nav-link" href="#"><span class="badge badge-warning">7</span>Sent Mail</a></li>
                  <li class="nav-item"><a class="nav-link" href="#"><span class="badge badge-danger">0</span>Important</a></li>
                </ul>
                <div class="aside-compose"><a class="btn btn-secondary btn-block">Compose Email</a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 email-content">
          <div class="email-inbox-header">
            <div class="row">
              <div class="col-md-6">
                <div class="email-title"><span class="icon s7-drawer"></span> Inbox <span class="new-messages">2 new messages</span> </div>
              </div>
              <div class="col-md-6">
                <div class="email-search mt-2">
                  <div class="input-group input-search">
                    <input class="form-control" type="text" placeholder="Search mail..."><span class="input-group-btn">
                      <button class="btn btn-secondary" type="button"><i class="icon s7-search"></i></button></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="email-filters">
            <div class="email-filters-left">
              <label class="custom-control custom-checkbox mai-select-all">
                <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
              </label>
              <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">With selected <span class="icon-dropdown s7-angle-down"></span></button>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Mark as read</a><a class="dropdown-item" href="#">Mark as unread</a><a class="dropdown-item" href="#">Spam</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                </div>
              </div>
              <div class="btn-group">
                <button class="btn btn-secondary" type="button"><i class="icon s7-box1"></i></button>
                <button class="btn btn-secondary" type="button"><i class="icon s7-shield"></i></button>
                <button class="btn btn-secondary" type="button"><i class="icon s7-trash"></i></button>
              </div>
              <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Order by <span class="icon-dropdown s7-angle-down"></span></button>
                <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Date</a><a class="dropdown-item" href="#">From</a><a class="dropdown-item" href="#">Subject</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Size</a>
                </div>
              </div>
            </div>
            <div class="email-filters-right"><span class="email-pagination-indicator">1-50 of 253</span>
              <div class="btn-group email-pagination-nav">
                <button class="btn btn-secondary" type="button"><i class="s7-angle-left"></i></button>
                <button class="btn btn-secondary" type="button"><i class="s7-angle-right"></i></button>
              </div>
            </div>
          </div>
          <div class="email-list">
            <div class="email-list-item email-list-item-unread">
              <div class="email-list-actions">
                <label class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                </label><a class="favorite active" href="#"><span class="s7-star"></span></a>
              </div>
              <div class="email-list-detail"><span class="from">Penelope Thornton</span>
                <p class="msg">Urgent - You forgot your keys in the class room, please come imediatly!</p><span class="date"><i class="icon s7-paperclip"></i> 28 Jul</span>
              </div>
            </div>
            <div class="email-list-item email-list-item-unread">
              <div class="email-list-actions">
                <label class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                </label><a class="favorite" href="#"><span class="s7-star"></span></a>
              </div>
              <div class="email-list-detail"><span class="from">Benji Harper</span>
                <p class="msg">Urgent - You forgot your keys in the class room, please come imediatly!</p><span class="date"><i class="icon s7-paperclip"></i> 13 Jul</span>
              </div>
            </div>
            <div class="email-list-item email-list-item-unread">
              <div class="email-list-actions">
                <label class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                </label><a class="favorite" href="#"><span class="s7-star"></span></a>
              </div>
              <div class="email-list-detail"><span class="from">Justine Myranda</span>
                <p class="msg">Urgent - You forgot your keys in the class room, please come imediatly!</p><span class="date"><i class="icon s7-paperclip"></i> 23 Jun</span>
              </div>
            </div>
            <div class="email-list-item">
              <div class="email-list-actions">
                <label class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                </label><a class="favorite" href="#"><span class="s7-star"></span></a>
              </div>
              <div class="email-list-detail"><span class="from">Sherwood Clifford</span>
                <p class="msg">Urgent - You forgot your keys in the class room, please come imediatly!</p><span class="date"><i class="icon s7-paperclip"></i> 16 May</span>
              </div>
            </div>
            <div class="email-list-item">
              <div class="email-list-actions">
                <label class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                </label><a class="favorite" href="#"><span class="s7-star"></span></a>
              </div>
              <div class="email-list-detail"><span class="from">Kristopher Donny</span>
                <p class="msg">Urgent - You forgot your keys in the class room, please come imediatly!</p><span class="date"><i class="icon s7-paperclip"></i> 12 May</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/lib/jquery/jquery.min.js" type="text/javascript">
    // < /> <
    // script src = "assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js"
    // type = "text/javascript" >
  </script>
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
    //function para poder editar y borrar las quotes DESPUES DE PONERLE LOGIN
    function borrar(id) {
      //"hello.php?aksi=delete&nik= echo $row['quote']; ?>" 
      //console.log('borrar '+id_invoice)
      let form = document.createElement('form')
      form.action = 'crm.php'
      form.method = 'post'
      let username = document.createElement('input')
      let password = document.createElement('input')
      let aksi = document.createElement('input')
      let nik = document.createElement('input')
      username.value = 'test1'
      username.name = 'username'
      password.value = 'test1'
      password.name = 'password'
      aksi.name = 'aksi'
      aksi.value = 'delete'
      nik.name = 'nik'
      nik.value = id
      form.appendChild(aksi)
      form.appendChild(username)
      form.appendChild(password)
      form.appendChild(nik)
      document.body.appendChild(form)
      form.submit()

    }
    //FUNCTION EDITAR - PROBLEMA CON NO EDITAR el SUBTOTAL + TAX + TOTAL
    function editarQuote(id) {
      let form = document.createElement('form')
      form.action = 'crm.php'
      form.method = 'post'
      let username = document.createElement('input')
      let password = document.createElement('input')
      let aksi = document.createElement('input')
      let nik = document.createElement('input')
      let edit = document.createElement('input')
      let amount = document.createElement('input')
      let date = document.createElement('input')
      username.value = 'test1'
      username.name = 'username'
      password.value = 'test1'
      password.name = 'password'
      aksi.name = 'aksi'
      aksi.value = 'edit'
      nik.name = 'nik'
      nik.value = id
      edit.name = 'edit'
      edit.value = 'yes'
      form.appendChild(aksi)
      form.appendChild(username)
      form.appendChild(password)
      form.appendChild(nik)
      form.appendChild(edit)
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
      username.name = 'username'
      password.value = 'test1'
      password.name = 'password'
      aksi.name = 'aksi'
      aksi.value = 'login'
      nik.name = 'nik'
      edit.name = 'edit'
      edit.value = 'yes'
      amount.name = 'amount'
      amount.value = '<?php echo $rowedit["amount"]; ?>'
      date.name = 'date'
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
  </script>
</body>

</html>