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
<script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/app.js" type="text/javascript"></script>

<script src="assets/js/login-check.js" type="text/javascript"></script>

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
                        <div class="content"><span class="date">16 Sept</span><span class="name">Julio Sosa</span><span class="desc">message board en camino. </span></div>
                      </a></li>
                    <li><a href="#">
                        <div class="img"><img src="assets/img/avatars/img2.jpg" alt="Avatar"></div>
                        <div class="content"><span class="date">4 Sept</span><span class="name">Gustavo </span><span class="desc">dale play.</span></div>
                      </a></li>
                    <li><a href="#">
                        <div class="img"><img src="assets/img/avatars/img3.jpg" alt="Avatar"></div>
                        <div class="content"><span class="date">13 Aug</span><span class="name">Lupi</span><span class="desc">Dale, yo sigo trabajando en contenido.</span></div>
                      </a></li>
                    <li><a href="#">
                        <div class="img"><img src="assets/img/avatars/img4.jpg" alt="Avatar"></div>
                        <div class="content"><span class="date">13 Aug</span><span class="name">Julieta</span><span class="desc">Esta bueno esto.</span></div>
                      </a></li>
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
                        <div class="content"><span class="desc">This is a new message for my dear friend <strong>Julio</strong>.</span><span class="date">10 minutes ago</span></div>
                      </a></li>
                    <li><a href="#">
                        <div class="icon"><span class="s7-add-user"></span></div>
                        <div class="content"><span class="desc">You have a new fiend request pending from <strong>Julieta</strong>.</span><span class="date">2 days ago</span></div>
                      </a></li>
                    <li><a href="#">
                        <div class="icon"><span class="s7-graph1"></span></div>
                        <div class="content"><span class="desc">Your site visits have increased <strong>15.5%</strong> more since the last week.</span><span class="date">2 hours ago</span></div>
                      </a></li>
                    <li><a href="#">
                        <div class="icon"><span class="s7-check"></span></div>
                        <div class="content"><span class="desc">This is a new message for my dear friend <strong>Rob</strong>.</span><span class="date">10 minutes ago</span></div>
                      </a></li>
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
          <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#"><span class="icon s7-home"></span>My Account</a><a class="dropdown-item" href="menuprofile.php"><span class="icon s7-user"></span>Profile</a><a class="dropdown-item" href="menuprofile.php"><span class="icon s7-tools"></span>Settings</a><a class="dropdown-item" href="login.php"><span class="icon s7-power"></span>Log Out</a></div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="mai-wrapper">
    <nav class="navbar navbar-expand-lg mai-sub-header">
      <div class="container">
        <nav class="navbar navbar-expand-md">
          <button class="navbar-toggler hidden-md-up collapsed" type="button" data-toggle="collapse" data-target="#mai-navbar-collapse" aria-controls="mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-bar"><span></span><span></span><span></span></span></button>
          <div class="navbar-collapse collapse mai-nav-tabs" id="mai-navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-home"></span><span>Home</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="dashboard.php"><span class="icon s7-monitor"></span><span class="name">Dashboard</span></a>

                </ul>
              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-paper-plane"></span><span>Quote</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                <li class="nav-item"><a class="nav-link" href="hello.php"><span class="icon s7-science"></span><span class="name">Cotizador</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="hellolist.php"><span class="icon s7-albums"></span><span class="name">Lista de Cotizaciones</span></a>
                  </li>
                </ul>
              </li>
              <li class="nav-item parent open"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-users"></span><span>CRM</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="crmregistro.php"><span class="icon s7-user"></span><span class="name">Regristro</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="crm.php"><span class="icon s7-id"></span><span class="name">Lista de Contactos</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="aircraft_setup.php"><span class="icon s7-plane"></span><span class="name">Config. Aeronaves</span></a>
                  </li>
                  <!-- <li class="nav-item dropdown parent"><a class="nav-link" href="mail.html" data-toggle="dropdown"><span class="icon s7-mail"></span><span class="name">Mail</span></a>
                    <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item active" href="email-inbox.html">Inbox</a><a class="dropdown-item" href="email-detail.html">Detail</a><a class="dropdown-item" href="email-compose.html">Compose</a>
                    </div>
                  </li> -->


                </ul>
              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-portfolio"></span><span>Operaciones</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="opsmain.php"><span class="icon s7-diamond"></span><span class="name">Lista de Vuelos</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="ops_calendar.php"><span class="icon s7-diamond"></span><span class="name">Calendario</span></a>
                  </li>

                </ul>
              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-piggy"></span><span>Contabilidad</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="contabilidadgastos.php"><span class="icon s7-box2"></span><span class="name">Gastos Gral</span></a>
                  </li>

                </ul>
            </ul>
            </li>

            </ul>

            </ul>
          </div>
        </nav>
      </div>
    </nav>

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