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
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/>
  </head>
  <body>
  <nav class="navbar navbar-expand navbar-dark mai-top-header">
      <div class="container"><a class="paddingright-20" href="#">AI Soft V1.0</a>
        <ul class="nav navbar-nav mai-top-nav">
          <!--<li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Company</a></li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">Services<span class="angle-down s7-angle-down"></span></a>
            <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Information</a><a class="dropdown-item" href="#">Company</a><a class="dropdown-item" href="#">Documentation</a><a class="dropdown-item" href="#">API Settings</a><a class="dropdown-item" href="#">Export Info</a></div>
          </li>
          <li class="nav-item"><a class="nav-link" href="#">Support</a></li>-->
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
            <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#"><span class="icon s7-home"></span>My Account</a><a class="dropdown-item" href="pages-profile.html"><span class="icon s7-user"></span>Profile</a><a class="dropdown-item" href="#"><span class="icon s7-cash"></span>Billing</a><a class="dropdown-item" href="#"><span class="icon s7-tools"></span>Settings</a><a class="dropdown-item" href="pages-login.html"><span class="icon s7-power"></span>Log Out</a></div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="mai-wrapper">
      <nav class="navbar navbar-expand-lg mai-sub-header">
        <div class="container">
                    <nav class="navbar navbar-expand-md">
                      <button class="navbar-toggler hidden-md-up collapsed" type="button" data-toggle="collapse" data-target="#mai-navbar-collapse" aria-controls="mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">       <span class="icon-bar"><span></span><span></span><span></span></span></button>
                      <div class="navbar-collapse collapse mai-nav-tabs" id="mai-navbar-collapse">
                        <ul class="nav navbar-nav">
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-home"></span><span>Home</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="index.html"><span class="icon s7-monitor"></span><span class="name">Dashboard</span></a>
                                                  <!--</li>
                                                  <li class="nav-item dropdown parent"><a class="nav-link" href="ui-elements.html" data-toggle="dropdown"><span class="icon s7-diamond"></span><span class="name">UI Elements</span></a>
                                                              <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item" href="ui-general.html">General</a><a class="dropdown-item" href="ui-cards.html">Cards</a><a class="dropdown-item" href="ui-buttons.html">Buttons</a><a class="dropdown-item" href="ui-typography.html">Typography</a><a class="dropdown-item" href="ui-grid.html">Grid</a>
                                                              </div>
                                                  </li>
                                                  <li class="nav-item dropdown parent"><a class="nav-link" href="ui-elements.html" data-toggle="dropdown"><span class="icon s7-diamond"></span><span class="name">Components</span></a>
                                                              <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item" href="ui-alerts.html">Alerts</a><a class="dropdown-item" href="ui-icons.html">Icons</a><a class="dropdown-item" href="ui-tabs-accordions.html">Tabs &amp; Accordions</a>
                                                              </div>
                                                  </li>
                                                  <li class="nav-item dropdown parent"><a class="nav-link" href="plugins.html" data-toggle="dropdown"><span class="icon s7-plugin"></span><span class="name">Plugins</span></a>
                                                              <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item" href="ui-modals.html">Modals</a><a class="dropdown-item" href="ui-nestable-lists.html">Nestable Lists</a><a class="dropdown-item" href="ui-notifications.html">Notifications</a><a class="dropdown-item" href="ui-sweetalert2.html">Sweet Alerts2</a>
                                                              </div>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="documentation.html"><span class="icon s7-notebook"></span><span class="name">Documentation</span></a>
                                                  </li>-->
                                      </ul>
                                    </li>
                                    <li class="nav-item parent open"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-rocket"></span><span>Quote</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link active" href="hello.php"><span class="icon s7-user"></span><span class="name">Quoting Tool</span></a>
                                                  </li>
                                                  <!--<li class="nav-item"><a class="nav-link" href="form-validation.html"><span class="name">Validation</span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="form-masks.html"><span class="name">Masks</span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="form-multiselect.html"><span class="name">Multiselect</span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="form-wizard.html"><span class="name">Wizard</span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="form-upload.html"><span class="name">Upload</span></a>
                                                  </li>-->
                                      </ul>
                                    </li>
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-diamond"></span><span>CRM</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="crm.php"><span class="icon s7-graph"></span><span class="name">Contact Database</span></a>
                                                  </li>
                                                  <!--<li class="nav-item"><a class="nav-link" href="tables-datatables.html"><span class="icon s7-box2"></span><span class="name">Data Tables</span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="tables-filters.html"><span class="icon s7-box2"></span><span class="name">Filters</span></a>
                                                  </li>-->
                                      </ul>
                                    </li>
                                    <!--<li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-portfolio"></span><span>Calendar</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="tables-general.html"><span class="icon s7-diamond"></span><span class="name">Schedule</span></a>
                                                  </li>-->
                                                  <!--<li class="nav-item"><a class="nav-link" href="pages-pricing-tables.html"><span class="icon s7-cash"></span><span class="name">Pricing</span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="pages-invoice.html"><span class="icon s7-wallet"></span><span class="name">Invoice</span></a>
                                                  </li>
                                                  <li class="nav-item dropdown parent"><a class="nav-link" href="login.html" data-toggle="dropdown"><span class="icon s7-diamond"></span><span class="name">Login</span></a>
                                                              <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item" href="pages-login.html">Login</a><a class="dropdown-item" href="pages-sign-up.html">Sign Up</a><a class="dropdown-item" href="pages-forgot-password.html">Forgot Password</a>
                                                              </div>
                                                  </li>
                                                  <li class="nav-item dropdown parent"><a class="nav-link" href="mail.html" data-toggle="dropdown"><span class="icon s7-mail"></span><span class="name">Mail</span></a>
                                                              <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item" href="email-inbox.html">Inbox</a><a class="dropdown-item" href="email-detail.html">Detail</a><a class="dropdown-item" href="email-compose.html">Compose</a>
                                                              </div>
                                                  </li>
                                                  <li class="nav-item dropdown parent"><a class="nav-link" href="maps.html" data-toggle="dropdown"><span class="icon s7-map-marker"></span><span class="name">Maps</span></a>
                                                              <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item" href="maps-google.html">Google Maps</a><a class="dropdown-item" href="maps-vector.html">Vector Maps</a>
                                                              </div>
                                                  </li>
                                                  <li class="nav-item dropdown parent"><a class="nav-link" href="extra.html" data-toggle="dropdown"><span class="icon s7-diamond"></span><span class="name">Extra Pages</span></a>
                                                              <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item" href="pages-blank.html">Blank Page</a><a class="dropdown-item" href="pages-blank-header.html">Blank Page Header</a><a class="dropdown-item" href="pages-404.html">404 Page</a><a class="dropdown-item" href="pages-gallery.html">Gallery</a><a class="dropdown-item" href="pages-calendar.html">Calendar</a><a class="dropdown-item" href="pages-timeline.html">Timeline</a><a class="dropdown-item" href="pages-timeline2.html">Timeline v2</a>
                                                              </div>
                                                  </li>-->
                                      </ul>
                                    </li>
                                    <!--<li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-display1"></span><span>Marketing</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="charts-flot.html"><span class="icon s7-box2"></span><span class="name">Graphic</span></a>
                                                  </li>-->
                                                  <!--<li class="nav-item"><a class="nav-link" href="charts-sparklines.html"><span class="icon s7-graph1"></span><span class="name">Sparklines</span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="charts-morris.html"><span class="icon s7-graph3"></span><span class="name">Morris.js</span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="charts-chartjs.html"><span class="icon s7-graph2"></span><span class="name">Chart.js</span></a>
                                                  </li>-->
                                      </ul>
                                    <!--</li>
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-tools"></span><span>Layouts</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item dropdown parent mega-menu"><a class="nav-link" href="mega-menu.html" data-toggle="dropdown"><span class="icon s7-ribbon"></span><span class="name">Mega Menu</span></a>
                                                              <div class="dropdown-menu mai-mega-menu mai-sub-nav" role="menu">
                                                                <div class="mai-mega-menu-row">
                                                                  <div class="mai-mega-menu-column">
                                                                              <div class="mai-mega-menu-section parent"><a class="nav-link" href="#"><span class="icon s7-note2"></span><span>Forms</span></a>
                                                                                <div class="mai-mega-menu-sub-items mai-sub-nav"><a class="dropdown-item active" href="form-elements.html">Elements</a><a class="dropdown-item" href="form-validation.html">Validation</a><a class="dropdown-item" href="form-masks.html">Input Masks</a><a class="dropdown-item" href="form-xeditable.html">X Editable</a><a class="dropdown-item" href="form-multiselect.html">Multiselect</a><a class="dropdown-item" href="form-wizard.html">Wizard</a><a class="dropdown-item" href="form-upload.html">Multi Upload</a>
                                                                                </div>
                                                                              </div>
                                                                  </div>
                                                                  <div class="mai-mega-menu-column">
                                                                              <div class="mai-mega-menu-section parent"><a class="nav-link" href="#"><span class="icon s7-keypad"></span><span>Tables</span></a>
                                                                                <div class="mai-mega-menu-sub-items mai-sub-nav"><a class="dropdown-item" href="tables-general.html">General</a><a class="dropdown-item" href="tables-datatables.html">Datatables</a>
                                                                                </div>
                                                                              </div>
                                                                  </div>
                                                                  <div class="mai-mega-menu-column">
                                                                              <div class="mai-mega-menu-section parent"><a class="nav-link" href="#"><span class="icon s7-bookmarks"></span><span>Pages</span></a>
                                                                                <div class="mai-mega-menu-sub-items mai-sub-nav"><a class="dropdown-item" href="pages-login.html">Login</a><a class="dropdown-item" href="pages-sign-up.html">Sign Up</a><a class="dropdown-item" href="pages-forgot-password.html">Forgot Password</a><a class="dropdown-item" href="pages-blank.html">Blank Page</a><a class="dropdown-item" href="pages-calendar.html">Calendar</a><a class="dropdown-item" href="pages-gallery.html">Gallery</a><a class="dropdown-item" href="pages-pricing-tables.html">Pricing Tables</a><a class="dropdown-item" href="pages-invoice.html">Invoice</a><a class="dropdown-item" href="pages-profile.html">Profile</a><a class="dropdown-item" href="pages-404.html">404 Page</a>
                                                                                </div>
                                                                              </div>
                                                                  </div>
                                                                  <div class="mai-mega-menu-column">
                                                                              <div class="mai-mega-menu-section parent"><a class="nav-link" href="#"><span class="icon s7-map"></span><span>Maps</span></a>
                                                                                <div class="mai-mega-menu-sub-items mai-sub-nav"><a class="dropdown-item" href="maps-google.html">Google Maps</a><a class="dropdown-item" href="maps-vector.html">Vector Maps</a>
                                                                                </div>
                                                                              </div>
                                                                              <div class="mai-mega-menu-section parent"><a class="nav-link" href="#"><span class="icon s7-mail"></span><span>Mail</span></a>
                                                                                <div class="mai-mega-menu-sub-items mai-sub-nav"><a class="dropdown-item" href="email-inbox.html">Inbox</a><a class="dropdown-item" href="email-detail.html">Detail</a><a class="dropdown-item" href="email-compose.html">Compose</a>
                                                                                </div>
                                                                              </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="layout-logo-mobile.html"><span class="icon s7-leaf"></span><span class="name">Logo Mobile</span></a>
                                                  </li>
                                      </ul>
                                    </li>-->
                        </ul>
                      </div>
                    </nav>
          <!--<div class="search">
            <input type="text" placeholder="Search..." name="q"><span class="s7-search"></span>
          </div>-->
        </div>
      </nav>
      <div class="main-content container">
        <!--<div class="row">
          <div class="col-md-6">
            <div class="card card-default">
              <div class="card-header card-header-divider">Basic Form<span class="card-subtitle">This is the default bootstrap form layout</span></div>
              <div class="card-body">
                <form>
                  <div class="form-group mt-1">
                    <label for="emailExample1">Email address</label>
                    <input class="form-control" id="emailExample1" type="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" placeholder="Enter password">
                  </div>
                  <div class="row pt-0 pt-0 pt-lg-5">
                    <div class="col-lg-6 pb-4 pb-lg-0">
                      <label class="custom-control custom-checkbox mt-2">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember me</span>
                      </label>
                    </div>
                    <div class="col-lg-6">
                      <p class="text-right">
                        <button class="btn btn-space btn-primary" type="submit">Submit</button>
                        <button class="btn btn-space btn-secondary">Cancel</button>
                      </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>-->

          <!--<div class="col-md-6">
            <div class="card card-default">
              <div class="card-header card-header-divider">Horizontal Form<span class="card-subtitle">This is the horizontal bootstrap layout</span></div>
              <div class="card-body">
                <form>
                  <div class="form-group row mt-4">
                    <label class="col-3 col-lg-2 col-form-label" for="inputEmail3">Email</label>
                    <div class="col-9 col-lg-10">
                      <input class="form-control" id="inputEmail3" type="email" placeholder="Enter email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-3 col-lg-2 col-form-label" for="inputPassword3">Password</label>
                    <div class="col-9 col-lg-10">
                      <input class="form-control" id="inputPassword3" type="password" placeholder="Enter password">
                    </div>
                  </div>
                  <div class="row pt-0 pt-0 pt-lg-5">
                    <div class="col-lg-6 pb-4 pb-lg-0">
                      <label class="custom-control custom-checkbox mt-2">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember me</span>
                      </label>
                    </div>
                    <div class="col-lg-6">
                      <p class="text-right">
                        <button class="btn btn-space btn-primary" type="submit">Register</button>
                        <button class="btn btn-space btn-secondary">Cancel</button>
                      </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>-->
        <?php
        if(isset($_POST['save'])){
				$first_name	     = mysqli_real_escape_string($con,(strip_tags($_POST["first_name"],ENT_QUOTES)));//Escanpando caracteres
				$last_name	     = mysqli_real_escape_string($con,(strip_tags($_POST["last_name"],ENT_QUOTES)));//Escanpando caracteres
        $phone_number	     = mysqli_real_escape_string($con,(strip_tags($_POST["phone_number"],ENT_QUOTES)));//Escanpando caracteres
        $address	     = mysqli_real_escape_string($con,(strip_tags($_POST["address"],ENT_QUOTES)));//Escanpando caracteres  
        $email	     = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));//Escanpando caracteres
        $notes	     = mysqli_real_escape_string($con,(strip_tags($_POST["notes"],ENT_QUOTES)));//Escanpando caracteres
        $sql= "insert into Contact (First_Name,Last_Name,Phone_Number,Address,Email,Notes) Values ('$first_name','$last_name','$phone_number','$address','$email','$notes')";
        echo $sql;
        $update = mysqli_query($con,sql) 
        or die(mysqli_error());
        echo $update;
      
      }
?>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-divider">Contact Information<span class="card-subtitle">Please enter new contact details</span></div>
              <div class="card-body pl-sm-5">
                <form action="" method="post">
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">First Name</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="text" placeholder="First Name" name="first_name"> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Last Name</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="text" placeholder="Last name" name="last_name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Phone Number</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="text" placeholder="Phone Number" name="phone_number">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="text" placeholder="Address" name="address">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="text" placeholder="Email" name="mail">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Notes</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <textarea class="form-control" name="notes"></textarea>
                    </div>
                  </div>
                  <div class="row pt-0 pt-0 pt-lg-5">
                    <div class="col-lg-6 pb-4 pb-lg-0">
                      <!--<label class="custom-control custom-checkbox mt-2">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember me</span>
                      </label>-->
                    </div>
                    <div class="col-lg-6">
                      <p class="text-right">
                        <button class="btn btn-space btn-primary" name="save" type="submit">Submit</button>
                        <button class="btn btn-space btn-secondary">Cancel</button>
                      </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
                <div class="row">
          <div class="col-sm-12">
            <div class="card card-default card-table">
              <div class="card-header">Responsive Table
                <div class="tools"><span class="icon s7-cloud-download"></span><span class="icon s7-edit"></span></div>
              </div>
              <div class="card-body">
                <div class="table-responsive noSwipe">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:5%;">
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </th>
                        <th style="width:20%;">User</th>
                        <th style="width:17%;">Last Commit</th>
                        <th style="width:15%;">Milestone</th>
                        <th style="width:10%;">Branch</th>
                        <th style="width:10%;">Date</th>
                        <th style="width:10%;"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatar.jpg" alt="Avatar"><span>John Peterson</span><span class="cell-detail-description">Developer</span></td>
                        <td class="cell-detail"> <span>Initial commit</span><span class="cell-detail-description">Bootstrap Admin</span></td>
                        <td class="milestone"><span class="completed">8 / 15</span><span class="version">v1.2.0</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 45%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>master</span><span class="cell-detail-description">63e8ec3</span></td>
                        <td class="cell-detail"><span>May 06, 2018</span><span class="cell-detail-description">8:30</span></td>
                        <td class="text-right">
                          <div class="btn-group btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="online">
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatars/img1.jpg" alt="Avatar"><span>Ryan Lawrence</span><span class="cell-detail-description">Designer</span></td>
                        <td class="cell-detail"> <span>Main structure</span><span class="cell-detail-description">CLI Connector</span></td>
                        <td class="milestone"><span class="completed">22 / 30</span><span class="version">v1.1.5</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 75%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>develop</span><span class="cell-detail-description">4cc1bc2</span></td>
                        <td class="cell-detail"><span>Apr 22, 2018</span><span class="cell-detail-description">14:45</span></td>
                        <td class="text-right">
                          <div class="btn-group btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="custom-control custom-control-sm custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatars/img2.jpg" alt="Avatar"><span>Benji Miller</span><span class="cell-detail-description">Designer</span></td>
                        <td class="cell-detail"> <span>Left sidebar adjusments</span><span class="cell-detail-description">Back-end Manager</span></td>
                        <td class="milestone"><span class="completed">10 / 30</span><span class="version">v1.1.3</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 33%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>develop</span><span class="cell-detail-description">5477993</span></td>
                        <td class="cell-detail"><span>Apr 15, 2018</span><span class="cell-detail-description">10:00</span></td>
                        <td class="text-right">
                          <div class="btn-group dropup btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatars/img3.jpg" alt="Avatar"><span>Justin Adams</span><span class="cell-detail-description">Developer</span></td>
                        <td class="cell-detail"> <span>Topbar dropdown style</span><span class="cell-detail-description">Bootstrap Admin</span></td>
                        <td class="milestone"><span class="completed">25 / 40</span><span class="version">v1.0.4</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 55%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>master</span><span class="cell-detail-description">8cb98ec</span></td>
                        <td class="cell-detail"><span>Apr 08, 2018</span><span class="cell-detail-description">17:24</span></td>
                        <td class="text-right">
                          <div class="btn-group dropup btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="online">
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatars/img4.jpg" alt="Avatar"><span>Brett Harris</span><span class="cell-detail-description">Designer</span></td>
                        <td class="cell-detail"> <span>Right sidebar adjusments</span><span class="cell-detail-description">CLI Connector</span></td>
                        <td class="milestone"><span class="completed">38 / 40</span><span class="version">v1.0.1</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 98%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>master</span><span class="cell-detail-description">65bc2da</span></td>
                        <td class="cell-detail"><span>Mars 18, 2018</span><span class="cell-detail-description">13:02</span></td>
                        <td class="text-right">
                          <div class="btn-group dropup btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ESTE FORMULARIO CONTIENE CALENDARIO -->
        <!--<div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-divider">Bootstrap Datepicker<span class="card-subtitle">These are the basic bootstrap form elements</span></div>
              <div class="card-body pl-sm-5">
                <form>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Default</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control datepicker" id="datepicker1" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Today Highlighted</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control datepicker" id="datepicker2" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Month View</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control datepicker" id="datepicker3" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Year View</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control datepicker" id="datepicker4" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Decade View</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control datepicker" id="datepicker5" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Centuries View</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control datepicker" id="datepicker6" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Today Button</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control datepicker" id="datepicker7" type="text">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>-->

        <!--<div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-divider">Input File<span class="card-subtitle">These are the input file options</span></div>
              <div class="card-body pl-sm-5">
                <form>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Button File Input</label>
                    <div class="col-12 col-sm-6">
                      <input class="inputfile" type="file" name="file-1" id="file-1" data-multiple-caption="{count} files selected" multiple>
                      <label class="btn btn-secondary" for="file-1"> <i class="icon s7-upload"></i><span>Browse files...</span></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Custom Button File Input</label>
                    <div class="col-12 col-sm-6">
                      <input class="inputfile" type="file" name="file-2" id="file-2" data-multiple-caption="{count} files selected" multiple>
                      <label class="btn btn-primary" for="file-2"> <i class="icon s7-upload"></i><span>Browse files...</span></label>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-divider">Input Sizing<span class="card-subtitle">These are the different form control component sizes</span></div>
              <div class="card-body pl-sm-5">
                <form>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Large</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control form-control-lg" type="text" placeholder="Large input">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Default</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control" type="text" placeholder="Default input">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Small</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control form-control-sm" type="text" placeholder="Small input">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Extra Small</label>
                    <div class="col-12 col-sm-8 col-lg-6 pt-1">
                      <input class="form-control form-control-xs" type="text" placeholder="Extra small input">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>-->

        <!--<div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-divider">Select & Option Elements<span class="card-subtitle">Advanced custom radio & checkboxes components with pure css</span></div>
              <div class="card-body pl-sm-5">
                <form>
                  <div class="form-group row mt-3">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Icon Radio</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <div class="mai-radio-icon form-check form-check-inline">
                        <label class="custom-control custom-radio custom-radio-icon custom-control-inline">
                          <input class="custom-control-input" id="radioIcon1" type="radio" name="radio-icon" checked=""><span class="custom-control-label"><i class="s7-user-female"></i></span>
                        </label>
                        <label class="custom-control custom-radio custom-radio-icon custom-control-inline">
                          <input class="custom-control-input" id="radioIcon2" type="radio" name="radio-icon"><span class="custom-control-label"><i class="s7-user"></i></span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Checkbox</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <div class="custom-controls-stacked mt-2">
                        <label class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" checked=""><span class="custom-control-label">Option 1</span>
                        </label>
                        <label class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Option 2</span>
                        </label>
                        <label class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Option 3</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Inline Checkbox</label>
                    <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input class="custom-control-input" type="checkbox" checked=""><span class="custom-control-label">Option 1</span>
                      </label>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Option 2</span>
                      </label>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Option 3</span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Full Color</label>
                    <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input class="custom-control-input" type="checkbox" checked=""><span class="custom-control-label custom-control-color">Option 1</span>
                      </label>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label custom-control-color">Option 2</span>
                      </label>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label custom-control-color">Option 3</span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Radio</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <div class="custom-controls-stacked mt-2">
                        <label class="custom-control custom-radio">
                          <input class="custom-control-input" id="radio1stacked" type="radio" name="radio-stacked" checked=""><span class="custom-control-label">Option 1</span>
                        </label>
                        <label class="custom-control custom-radio">
                          <input class="custom-control-input" id="radio2stacked" type="radio" name="radio-stacked"><span class="custom-control-label">Option 2</span>
                        </label>
                        <label class="custom-control custom-radio">
                          <input class="custom-control-input" id="radio3stacked" type="radio" name="radio-stacked"><span class="custom-control-label">Option 3</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Inline Radio</label>
                    <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">
                      <label class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="radio-inline" checked=""><span class="custom-control-label">Option 1</span>
                      </label>
                      <label class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="radio-inline"><span class="custom-control-label">Option 2</span>
                      </label>
                      <label class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="radio-inline"><span class="custom-control-label">Option 3</span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Full Color</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <label class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="radio-color" checked=""><span class="custom-control-label custom-control-color">Option 1</span>
                      </label>
                      <label class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="radio-color"><span class="custom-control-label custom-control-color">Option 2</span>
                      </label>
                      <label class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="radio-color"><span class="custom-control-label custom-control-color">Option 3</span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Basic Select</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <select class="form-control custom-select">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Multiple Select</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <select class="form-control" multiple="">
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                      </select>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>-->

        <!--<div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-divider">Validation States<span class="card-subtitle">Default bootstrap validation states</span></div>
              <div class="card-body pl-sm-5">
                <form>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Input with Success</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control is-valid" type="text" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Input with Error</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control is-invalid" type="text" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Checkbox</label>
                    <div class="col-12 col-sm-8 col-lg-6 mt-2">
                      <div class="custom-controls-stacked form-group">
                        <label class="custom-control custom-checkbox">
                          <input class="custom-control-input is-valid" type="checkbox" checked=""><span class="custom-control-label">Success</span>
                        </label>
                      </div>
                      <div class="custom-controls-stacked form-group">
                        <label class="custom-control custom-checkbox">
                          <input class="custom-control-input is-invalid" type="checkbox"><span class="custom-control-label">Danger</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Inline Checkbox</label>
                    <div class="col-12 col-sm-8 col-lg-6 mt-2">
                      <div class="form-group">
                        <label class="custom-control custom-checkbox custom-control-inline">
                          <input class="custom-control-input is-valid" type="checkbox" checked=""><span class="custom-control-label">Success</span>
                        </label>
                        <label class="custom-control custom-checkbox custom-control-inline">
                          <input class="custom-control-input is-invalid" type="checkbox"><span class="custom-control-label">Danger</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Full Color</label>
                    <div class="col-12 col-sm-8 col-lg-6 mt-2">
                      <div class="form-group">
                        <label class="custom-control custom-checkbox custom-control-inline">
                          <input class="custom-control-input is-valid" type="checkbox" checked=""><span class="custom-control-label custom-control-color">Success</span>
                        </label>
                        <label class="custom-control custom-checkbox custom-control-inline">
                          <input class="custom-control-input is-invalid" type="checkbox"><span class="custom-control-label custom-control-color">Danger</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="card-divider"></div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Radio</label>
                    <div class="col-12 col-sm-8 col-lg-6 mt-2">
                      <div class="custom-controls-stacked form-group">
                        <label class="custom-control custom-radio">
                          <input class="custom-control-input is-valid" type="radio" checked name="radioStateColor"><span class="custom-control-label">Success</span>
                        </label>
                      </div>
                      <div class="custom-controls-stacked form-group">
                        <label class="custom-control custom-radio">
                          <input class="custom-control-input is-invalid" type="radio" name="radioStateColor"><span class="custom-control-label">Danger</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Inline Radio</label>
                    <div class="col-12 col-sm-8 col-lg-6 mt-2">
                      <div class="form-group">
                        <label class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input is-valid" type="radio" checked name="radioStateColor2"><span class="custom-control-label">Success</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input is-invalid" type="radio" name="radioStateColor2"><span class="custom-control-label">Danger</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Full Color</label>
                    <div class="col-12 col-sm-8 col-lg-6 mt-2">
                      <div class="form-group">
                        <label class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input is-valid" type="radio" checked name="radioStateColor3"><span class="custom-control-label custom-control-color">Success</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input is-invalid" type="radio" name="radioStateColor3"><span class="custom-control-label custom-control-color">Danger</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>-->

        <!--<div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-divider">Input Groups<span class="card-subtitle">Bootstrap input groups components</span></div>
              <div class="card-body pl-sm-5">
                <form>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Input Text</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                        <input class="form-control" type="text" placeholder="Username">
                      </div>
                      <div class="input-group mb-2">
                        <input class="form-control" type="text">
                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                      </div>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                        <input class="form-control" type="text">
                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Input Sizing</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <div class="input-group input-group-lg mb-2">
                        <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                        <input class="form-control" type="text" placeholder="Username">
                      </div>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                        <input class="form-control" type="text" placeholder="Username">
                      </div>
                      <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                        <input class="form-control" type="text" placeholder="Username">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Checkbox & Radio</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <label class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                            </label>
                          </div>
                        </div>
                        <input class="form-control" type="text">
                      </div>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <label class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio"><span class="custom-control-label"></span>
                            </label>
                          </div>
                        </div>
                        <input class="form-control" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Button Addons</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <div class="input-group mb-2">
                        <input class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button">Go!</button>
                        </div>
                      </div>
                      <div class="input-group mb-2">
                        <input class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action<span class="icon-dropdown s7-angle-down"></span></button>
                          <div class="dropdown-menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-2">
                        <input class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-primary" tabindex="-1" type="button">Action</button>
                          <button class="btn btn-primary dropdown-toggle dropdown-toggle-split" type="button" data-toggle="dropdown"><span class="icon-dropdown s7-angle-down"></span><span class="sr-only">Toggle Dropdown</span></button>
                          <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>-->

        <!--<div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-divider">Switch Component<span class="card-subtitle">Custom switch component using only css</span></div>
              <div class="card-body pl-sm-5">
                <form>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Sizes</label>
                    <div class="col-12 col-sm-8 col-lg-6 pt-2">
                      <div class="switch-button switch-button-xs">
                        <input type="checkbox" checked="" name="swt1" id="swt1"><span>
                          <label for="swt1"></label></span>
                      </div>
                      <div class="switch-button switch-button-sm">
                        <input type="checkbox" checked="" name="swt2" id="swt2"><span>
                          <label for="swt2"></label></span>
                      </div>
                      <div class="switch-button">
                        <input type="checkbox" checked="" name="swt3" id="swt3"><span>
                          <label for="swt3"></label></span>
                      </div>
                      <div class="switch-button switch-button-lg">
                        <input type="checkbox" checked="" name="swt4" id="swt4"><span>
                          <label for="swt4"></label></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mt-3">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Success</label>
                    <div class="col-12 col-sm-8 col-lg-6 pt-2">
                      <div class="switch-button switch-button-success">
                        <input type="checkbox" checked="" name="swt5" id="swt5"><span>
                          <label for="swt5"></label></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mt-3">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Warning</label>
                    <div class="col-12 col-sm-8 col-lg-6 pt-2">
                      <div class="switch-button switch-button-warning">
                        <input type="checkbox" checked="" name="swt6" id="swt6"><span>
                          <label for="swt6"></label></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mt-3">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Danger</label>
                    <div class="col-12 col-sm-8 col-lg-6 pt-2">
                      <div class="switch-button switch-button-danger">
                        <input type="checkbox" checked="" name="swt7" id="swt7"><span>
                          <label for="swt7"></label></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mt-3">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Yes/No Labels</label>
                    <div class="col-12 col-sm-8 col-lg-6 pt-2">
                      <div class="switch-button switch-button-yesno">
                        <input type="checkbox" checked="" name="swt8" id="swt8"><span>
                          <label for="swt8"></label></span>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>-->

        <!--<div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-divider">Advanced Controls<span class="card-subtitle">Select2 & Bootstrap slider plugins</span></div>
              <div class="card-body pl-sm-5">
                <form>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Select2</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <select class="select2">
                        <optgroup label="Alaskan/Hawaiian Time Zone">
                          <option value="AK">Alaska</option>
                          <option value="HI">Hawaii</option>
                        </optgroup>
                        <optgroup label="Pacific Time Zone">
                          <option value="CA">California</option>
                          <option value="NV">Nevada</option>
                          <option value="OR">Oregon</option>
                          <option value="WA">Washington</option>
                        </optgroup>
                        <optgroup label="Mountain Time Zone">
                          <option value="AZ">Arizona</option>
                          <option value="CO">Colorado</option>
                          <option value="ID">Idaho</option>
                          <option value="MT">Montana</option>
                          <option value="NE">Nebraska</option>
                          <option value="NM">New Mexico</option>
                          <option value="ND">North Dakota</option>
                          <option value="UT">Utah</option>
                          <option value="WY">Wyoming</option>
                        </optgroup>
                        <optgroup label="Central Time Zone">
                          <option value="AL">Alabama</option>
                          <option value="AR">Arkansas</option>
                          <option value="IL">Illinois</option>
                          <option value="IA">Iowa</option>
                          <option value="KS">Kansas</option>
                          <option value="KY">Kentucky</option>
                          <option value="LA">Louisiana</option>
                          <option value="MN">Minnesota</option>
                          <option value="MS">Mississippi</option>
                          <option value="MO">Missouri</option>
                          <option value="OK">Oklahoma</option>
                          <option value="SD">South Dakota</option>
                          <option value="TX">Texas</option>
                          <option value="TN">Tennessee</option>
                          <option value="WI">Wisconsin</option>
                        </optgroup>
                        <optgroup label="Eastern Time Zone">
                          <option value="CT">Connecticut</option>
                          <option value="DE">Delaware</option>
                          <option value="FL">Florida</option>
                          <option value="GA">Georgia</option>
                          <option value="IN">Indiana</option>
                          <option value="ME">Maine</option>
                          <option value="MD">Maryland</option>
                          <option value="MA">Massachusetts</option>
                          <option value="MI">Michigan</option>
                          <option value="NH">New Hampshire</option>
                          <option value="NJ">New Jersey</option>
                          <option value="NY">New York</option>
                          <option value="NC">North Carolina</option>
                          <option value="OH">Ohio</option>
                          <option value="PA">Pennsylvania</option>
                          <option value="RI">Rhode Island</option>
                          <option value="SC">South Carolina</option>
                          <option value="VT">Vermont</option>
                          <option value="VA">Virginia</option>
                          <option value="WV">West Virginia</option>
                        </optgroup>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">MultiTag Input</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <select class="tags" multiple="">
                        <option value="1">Green</option>
                        <option value="2">Red</option>
                        <option value="3">Blue</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Multitag from Select</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <select class="select2" multiple="">
                        <optgroup label="Alaskan/Hawaiian Time Zone">
                          <option value="AK">Alaska</option>
                          <option value="HI">Hawaii</option>
                        </optgroup>
                        <optgroup label="Pacific Time Zone">
                          <option value="CA">California</option>
                          <option value="NV">Nevada</option>
                          <option value="OR">Oregon</option>
                          <option value="WA">Washington</option>
                        </optgroup>
                        <optgroup label="Mountain Time Zone">
                          <option value="AZ">Arizona</option>
                          <option value="CO">Colorado</option>
                          <option value="ID">Idaho</option>
                          <option value="MT">Montana</option>
                          <option value="NE">Nebraska</option>
                          <option value="NM">New Mexico</option>
                          <option value="ND">North Dakota</option>
                          <option value="UT">Utah</option>
                          <option value="WY">Wyoming</option>
                        </optgroup>
                        <optgroup label="Central Time Zone">
                          <option value="AL">Alabama</option>
                          <option value="AR">Arkansas</option>
                          <option value="IL">Illinois</option>
                          <option value="IA">Iowa</option>
                          <option value="KS">Kansas</option>
                          <option value="KY">Kentucky</option>
                          <option value="LA">Louisiana</option>
                          <option value="MN">Minnesota</option>
                          <option value="MS">Mississippi</option>
                          <option value="MO">Missouri</option>
                          <option value="OK">Oklahoma</option>
                          <option value="SD">South Dakota</option>
                          <option value="TX">Texas</option>
                          <option value="TN">Tennessee</option>
                          <option value="WI">Wisconsin</option>
                        </optgroup>
                        <optgroup label="Eastern Time Zone">
                          <option value="CT">Connecticut</option>
                          <option value="DE">Delaware</option>
                          <option value="FL">Florida</option>
                          <option value="GA">Georgia</option>
                          <option value="IN">Indiana</option>
                          <option value="ME">Maine</option>
                          <option value="MD">Maryland</option>
                          <option value="MA">Massachusetts</option>
                          <option value="MI">Michigan</option>
                          <option value="NH">New Hampshire</option>
                          <option value="NJ">New Jersey</option>
                          <option value="NY">New York</option>
                          <option value="NC">North Carolina</option>
                          <option value="OH">Ohio</option>
                          <option value="PA">Pennsylvania</option>
                          <option value="RI">Rhode Island</option>
                          <option value="SC">South Carolina</option>
                          <option value="VT">Vermont</option>
                          <option value="VA">Virginia</option>
                          <option value="WV">West Virginia</option>
                        </optgroup>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Slider</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="bslider form-control" type="text" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Range Slider</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="bslider form-control" type="text" data-slider-value="[250,450]" data-slider-step="5" data-slider-max="1000" data-slider-min="10" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Vertical Slider</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                      <input class="form-control bslider" type="text" data-slider-selection="after" data-slider-orientation="vertical" data-slider-value="-13" data-slider-step="1" data-slider-max="20" data-slider-min="-20" value="">
                      <input class="form-control bslider" type="text" data-slider-selection="after" data-slider-orientation="vertical" data-slider-value="-9" data-slider-step="1" data-slider-max="20" data-slider-min="-20" value="">
                      <input class="form-control bslider" type="text" data-slider-selection="after" data-slider-orientation="vertical" data-slider-value="-5" data-slider-step="1" data-slider-max="20" data-slider-min="-20" value="">
                      <input class="form-control bslider" type="text" data-slider-selection="after" data-slider-orientation="vertical" data-slider-value="-2" data-slider-step="1" data-slider-max="20" data-slider-min="-20" value="">
                      <input class="form-control bslider" type="text" data-slider-selection="after" data-slider-orientation="vertical" data-slider-value="-5" data-slider-step="1" data-slider-max="20" data-slider-min="-20" value="">
                      <input class="form-control bslider" type="text" data-slider-selection="after" data-slider-orientation="vertical" data-slider-value="-9" data-slider-step="1" data-slider-max="20" data-slider-min="-20" value="">
                      <input class="form-control bslider" type="text" data-slider-selection="after" data-slider-orientation="vertical" data-slider-value="-13" data-slider-step="1" data-slider-max="20" data-slider-min="-20" value="">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>-->
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
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.formElements();
      });
    </script>
  </body>
</html>