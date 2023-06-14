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
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>AIS Ingresos</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/fuelux/css/wizard.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/dropzone/dropzone.css"/>
    <script>
            window.hs_config = {"autopath":"@@autopath","deleteLine":"hs-builder:delete","deleteLine:build":"hs-builder:build-delete","deleteLine:dist":"hs-builder:dist-delete","previewMode":false,"startPath":"/index.html","vars":{"themeFont":"https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap","version":"?v=1.0"},"layoutBuilder":{"extend":{"switcherSupport":true},"header":{"layoutMode":"default","containerMode":"container-fluid"},"sidebarLayout":"default"},"themeAppearance":{"layoutSkin":"default","sidebarSkin":"default","styles":{"colors":{"primary":"#377dff","transparent":"transparent","white":"#fff","dark":"132144","gray":{"100":"#f9fafc","900":"#1e2022"}},"font":"Inter"}},"languageDirection":{"lang":"en"},"skipFilesFromBundle":{"dist":["assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","assets/js/demo.js"],"build":["assets/css/theme.css","assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js","assets/js/demo.js","assets/css/theme-dark.css","assets/css/docs.css","assets/vendor/icon-set/style.css","assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js","assets/js/demo.js"]},"minifyCSSFiles":["assets/css/theme.css","assets/css/theme-dark.css"],"copyDependencies":{"dist":{"*assets/js/theme-custom.js":""},"build":{"*assets/js/theme-custom.js":"","node_modules/bootstrap-icons/font/*fonts/**":"assets/css"}},"buildFolder":"","replacePathsToCDN":{},"directoryNames":{"src":"./src","dist":"./dist","build":"./build"},"fileNames":{"dist":{"js":"theme.min.js","css":"theme.min.css"},"build":{"css":"theme.min.css","js":"theme.min.js","vendorCSS":"vendor.min.css","vendorJS":"vendor.min.js"}},"fileTypes":"jpg|png|svg|mp4|webm|ogv|json"}
            window.hs_config.gulpRGBA = (p1) => {
  const options = p1.split(',')
  const hex = options[0].toString()
  const transparent = options[1].toString()

  var c;
  if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
    c= hex.substring(1).split('');
    if(c.length== 3){
      c= [c[0], c[0], c[1], c[1], c[2], c[2]];
    }
    c= '0x'+c.join('');
    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+',' + transparent + ')';
  }
  throw new Error('Bad Hex');
}
            window.hs_config.gulpDarken = (p1) => {
  const options = p1.split(',')

  let col = options[0].toString()
  let amt = -parseInt(options[1])
  var usePound = false

  if (col[0] == "#") {
    col = col.slice(1)
    usePound = true
  }
  var num = parseInt(col, 16)
  var r = (num >> 16) + amt
  if (r > 255) {
    r = 255
  } else if (r < 0) {
    r = 0
  }
  var b = ((num >> 8) & 0x00FF) + amt
  if (b > 255) {
    b = 255
  } else if (b < 0) {
    b = 0
  }
  var g = (num & 0x0000FF) + amt
  if (g > 255) {
    g = 255
  } else if (g < 0) {
    g = 0
  }
  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
}
            window.hs_config.gulpLighten = (p1) => {
  const options = p1.split(',')

  let col = options[0].toString()
  let amt = parseInt(options[1])
  var usePound = false

  if (col[0] == "#") {
    col = col.slice(1)
    usePound = true
  }
  var num = parseInt(col, 16)
  var r = (num >> 16) + amt
  if (r > 255) {
    r = 255
  } else if (r < 0) {
    r = 0
  }
  var b = ((num >> 8) & 0x00FF) + amt
  if (b > 255) {
    b = 255
  } else if (b < 0) {
    b = 0
  }
  var g = (num & 0x0000FF) + amt
  if (g > 255) {
    g = 255
  } else if (g < 0) {
    g = 0
  }
  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
}
            </script>
  </head>
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
        </ul>
        <ul class="nav navbar-nav float-lg-right mai-user-nav">
          <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><img src="assets/img/avatar.jpg" alt="Avatar"><span class="user-name">Demo Account</span><span class="angle-down s7-angle-down"></span></a>
            <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#"><span class="icon s7-home"></span>My Account</a><a class="dropdown-item" href="menuprofile.php"><span class="icon s7-user"></span>Profile</a><a class="dropdown-item" href="menuprofile.php"><span class="icon s7-tools"></span>Settings</a><a class="dropdown-item" href="login.php"><span class="icon s7-power"></span>Log Out</a></div>
          </li>
        </ul>
      </div>
    </nav>

    <!--COMIENZO BOTONERA PRINCIPAL-->

    <div class="mai-wrapper"> 
      <nav class="navbar navbar-expand-lg mai-sub-header">
        <div class="container">
                    <nav class="navbar navbar-expand-md">
                      <button class="navbar-toggler hidden-md-up collapsed" type="button" data-toggle="collapse" data-target="#mai-navbar-collapse" aria-controls="mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">       <span class="icon-bar"><span></span><span></span><span></span></span></button>
                      <div class="navbar-collapse collapse mai-nav-tabs" id="mai-navbar-collapse">
                        <ul class="nav navbar-nav">
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-home"></span><span>Home</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="dashboard.php"><span class="icon s7-monitor"></span><span class="name">Dashboard</span></a>

                                      </ul>
                                    </li>
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-paper-plane"></span><span>Quote</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="javascript:loginuser()"><span class="icon s7-science"></span><span class="name">Cotizador</span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="javascript:loginuserhellolist()"><span class="icon s7-albums"></span><span class="name">Base de Cotizaciones</span></a>
                                                  </li>
                                                
                                      </ul>
                                    </li>
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-users"></span><span>CRM</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="crmregistro.php"><span class="icon s7-user"></span><span class="name">Regristro</span></a>
                                                  </li> 
                                                  <li class="nav-item"><a class="nav-link" href="crm.php"><span class="icon s7-id"></span><span class="name">Base de contactos </span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="aircraft_setup.php"><span class="icon s7-plane"></span><span class="name">Config. Aeronaves</span></a>
                                                  </li>
                                                  <li class="nav-item dropdown parent"><a class="nav-link" href="mail.html" data-toggle="dropdown"><span class="icon s7-mail"></span><span class="name">Mail</span></a>
                                                    <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item active" href="email-inbox.html">Inbox</a><a class="dropdown-item" href="email-detail.html">Detail</a><a class="dropdown-item" href="email-compose.html">Compose</a>
                                                    </div>
                                        </li>
                                            
                                      </ul>
                                    </li>
                                    
                                    <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-portfolio"></span><span>Operaciones</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="opsmain.php"><span class="icon s7-diamond"></span><span class="name">Base de vuelos</span></a>
                                                  </li>
                                               
                                      </ul>
                                    </li>
                                    <li class="nav-item parent open"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-piggy"></span><span>Contabilidad</span></a>
                                      <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                  <li class="nav-item"><a class="nav-link" href="contabilidadgastos.php"><span class="icon s7-shopbag"></span><span class="name">Gastos Generales</span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="contabilidadingresos.php"><span class="icon s7-cash"></span><span class="name">Ingresos Generales</span></a>
                                                  </li>
                                                  <li class="nav-item"><a class="nav-link" href="contabilidadgastos.php"><span class="icon s7-box2"></span><span class="name">Reportes</span></a>
                                                  </li>
                                      </ul>
                                           
                                    </li>
                                      <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-display1"></span><span>Admin</span></a>
                                        <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                                                    <li class="nav-item"><a class="nav-link" href="charts-flot.html"><span class="icon s7-box2"></span><span class="name">Reporte General</span></a>
                                                    </li>    
                                                    </ul>
                                  
                        </ul>
                      </div>
                    </nav>
          <!--<div class="search">
            <input type="text" placeholder="Search..." name="q"><span class="s7-search"></span>
          </div>-->
        </div>
      </nav>

<!--COMIENZO REGISTRACION PRINCIPAL-->

  <head>

    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/fuelux/css/wizard.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/>
  </head>
  <body>
    
  <div class="main-content container">
  <!--<main id="content" role="main" class="main">-->
    <!-- Content -->
    <div class="content container-fluid">
      <div class="row">
        <div class="col-lg-9 mb-5 mb-lg-0">
          <!-- Card -->
          <div class="card card-lg">
            <!-- Body -->
            <div class="card-body">
              <div class="row justify-content-md-between">
                <!--<div class="col-md-4 mb-3 mb-md-0">
                  -- Logo --
                  <label class="form-check form-check-dashed" for="logoUploader">
                    <img id="logoImg" class="avatar avatar-xl avatar-4x3 avatar-centered h-100 mb-2" src="./assets/svg/illustrations/oc-browse-file.svg" alt="Image Description" data-hs-theme-appearance="default">
                    <img id="logoImg" class="avatar avatar-xl avatar-4x3 avatar-centered h-100 mb-2" src="./assets/svg/illustrations-light/oc-browse-file.svg" alt="Image Description" data-hs-theme-appearance="dark">

                    <span class="d-block">Browse your file here</span>

                    <input type="file" class="js-file-attach form-check-input" id="logoUploader" data-hs-file-attach-options='{
                              "textTarget": "#logoImg",
                              "mode": "image",
                              "targetAttr": "src",
                              "allowTypes": [".png", ".jpeg", ".jpg"]
                           }'>
                  </label>
                  -- End Logo --
                </div>-->
                <!-- End Col -->

                <div class="col-md-6 text-md-end">
                  

                  <!-- Form -->
                  <div class="d-grid d-md-flex justify-content-md-start mb-2 mb-md-4 justify-content-md-between">
                  <h2>Invoice #</h2>
                    <input type="text" class="form-control w-auto" placeholder="" aria-label="" value="0982131">
                  </div>
                  <!-- End Form -->

                  <textarea class="form-control" placeholder="Who is this invoice from?" id="invoiceAddressFromLabel" aria-label="Who is this invoice from?" rows="3"></textarea>
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->

              <hr class="my-5">

              <div class="row mb-3">
                <div class="col-md-5">
                  <!-- Form -->
                  <div class="mb-4">
                    <label for="invoiceAddressToLabel" class="form-label">Bill to:</label>
                    <textarea class="form-control" placeholder="Who is this invoice from?" id="invoiceAddressToLabel" aria-label="Who is this invoice from?" rows="3"></textarea>
                  </div>
                  <!-- End Form -->
                </div>
                <!-- End Col -->

                <div class="col-md-7 align-self-md-end">
                  <!-- Form -->
                  <div class="mb-4">
                    <dl class="row align-items-sm-center mb-3">
                      <dt class="col-md text-sm-end mb-2 mb-sm-0">Invoice date:</dt>
                      <dd class="col-md-auto mb-0">
                        <!-- Flatpickr -->
                        <div id="invoiceDateFlatpickr" class="js-flatpickr flatpickr-custom" data-hs-flatpickr-options='{
                              "appendTo": "#invoiceDateFlatpickr",
                              "dateFormat": "d/m/Y",
                              "wrap": true
                            }'>
                          <input type="text" class="flatpickr-custom-form-control form-control" placeholder="Select dates" data-input value="29/06/2020">
                        </div>
                        <!-- End Flatpickr -->
                      </dd>
                    </dl>

                    <dl class="row align-items-sm-center">
                      <dt class="col-md text-sm-end mb-2 mb-sm-0">Due date:</dt>
                      <dd class="col-md-auto mb-0">
                        <!-- Flatpickr -->
                        <div id="invoiceDueDateFlatpickr" class="js-flatpickr flatpickr-custom" data-hs-flatpickr-options='{
                              "appendTo": "#invoiceDueDateFlatpickr",
                              "dateFormat": "d/m/Y",
                              "wrap": true
                            }'>
                          <input type="text" class="flatpickr-custom-form-control form-control" placeholder="Select dates" data-input value="29/06/2020">
                        </div>
                        <!-- End Flatpickr -->
                      </dd>
                    </dl>
                  </div>
                  <!-- End Form -->
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->

              <div class="js-add-field" data-hs-add-field-options='{
                      "template": "#addInvoiceItemTemplate",
                      "container": "#addInvoiceItemContainer",
                      "defaultCreated": 0
                    }'>
                <!-- Title -->
                <div class="bg-light border-bottom p-2 mb-3">
                  <div class="row">
                    <div class="col-sm-5">
                      <h6 class="card-title text-cap">Item</h6>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-3 d-none d-sm-inline-block">
                      <h6 class="card-title text-cap">Quantity</h6>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-2 d-none d-sm-inline-block">
                      <h6 class="card-title text-cap">Rate</h6>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-2 d-none d-sm-inline-block">
                      <h6 class="card-title text-cap">Amount</h6>
                    </div>
                    <!-- End Col -->
                  </div>
                  <!-- End Row -->
                </div>
                <!-- End Title -->

                <!-- Content -->
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control mb-3" placeholder="Item name" aria-label="Item name">
                    <input type="text" class="form-control mb-3" placeholder="Description" aria-label="Description">
                  </div>
                  <!-- End Col -->

                  <div class="col-12 col-sm-auto col-md-3">
                    <!-- Quantity -->
                    <div class="quantity-counter mb-3">
                      <div class="js-quantity-counter row align-items-center">
                        <div class="col">
                          <input class="js-result form-control form-control-quantity-counter" type="text" value="1">
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                          <a class="js-minus btn btn-white btn-xs btn-icon rounded-circle" href="javascript:;">
                            <svg width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0 1C0 0.723858 0.223858 0.5 0.5 0.5H7.5C7.77614 0.5 8 0.723858 8 1C8 1.27614 7.77614 1.5 7.5 1.5H0.5C0.223858 1.5 0 1.27614 0 1Z" fill="currentColor" />
                            </svg>
                          </a>
                          <a class="js-plus btn btn-white btn-xs btn-icon rounded-circle" href="javascript:;">
                            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M4 0C4.27614 0 4.5 0.223858 4.5 0.5V3.5H7.5C7.77614 3.5 8 3.72386 8 4C8 4.27614 7.77614 4.5 7.5 4.5H4.5V7.5C4.5 7.77614 4.27614 8 4 8C3.72386 8 3.5 7.77614 3.5 7.5V4.5H0.5C0.223858 4.5 0 4.27614 0 4C0 3.72386 0.223858 3.5 0.5 3.5H3.5V0.5C3.5 0.223858 3.72386 0 4 0Z" fill="currentColor" />
                            </svg>
                          </a>
                        </div>
                        <!-- End Col -->
                      </div>
                      <!-- End Row -->
                    </div>
                    <!-- End Quantity -->
                  </div>
                  <!-- End Col -->

                  <div class="col-12 col-sm col-md-2">
                    <!-- Input Group -->
                    <div class="mb-3">
                      <input type="number" class="form-control" placeholder="00" aria-label="00">
                    </div>
                    <!-- End Input Group -->
                  </div>
                  <!-- End Col -->

                  <div class="col col-md-2">
                    <input type="number" class="form-control-plaintext mb-3" placeholder="$0.00" aria-label="$0.00">
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Content -->

                <!-- Container For Input Field -->
                <div id="addInvoiceItemContainer"></div>

                <a href="javascript:;" class="js-create-field form-link">
                  <i class="bi-plus"></i> Add item
                </a>

                <!-- Add Phone Input Field -->
                <div id="addInvoiceItemTemplate" style="display: none;">
                  <!-- Content -->
                  <div class="input-group-add-field">
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control mb-3" placeholder="Item name" aria-label="Item name">
                        <input type="text" class="form-control mb-3" placeholder="Description" aria-label="Description">
                      </div>
                      <!-- End Col -->

                      <div class="col-12 col-sm-auto col-md-3">
                        <!-- Quantity -->
                        <div class="quantity-counter mb-3">
                          <div class="js-quantity-counter row align-items-center">
                            <div class="col">
                              <input class="js-result form-control form-control-quantity-counter" type="text" value="1">
                            </div>
                            <!-- End Col -->

                            <div class="col-auto">
                              <a class="js-minus btn btn-white btn-xs btn-icon rounded-circle" href="javascript:;">
                                <svg width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M0 1C0 0.723858 0.223858 0.5 0.5 0.5H7.5C7.77614 0.5 8 0.723858 8 1C8 1.27614 7.77614 1.5 7.5 1.5H0.5C0.223858 1.5 0 1.27614 0 1Z" fill="currentColor" />
                                </svg>
                              </a>
                              <a class="js-plus btn btn-white btn-xs btn-icon rounded-circle" href="javascript:;">
                                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M4 0C4.27614 0 4.5 0.223858 4.5 0.5V3.5H7.5C7.77614 3.5 8 3.72386 8 4C8 4.27614 7.77614 4.5 7.5 4.5H4.5V7.5C4.5 7.77614 4.27614 8 4 8C3.72386 8 3.5 7.77614 3.5 7.5V4.5H0.5C0.223858 4.5 0 4.27614 0 4C0 3.72386 0.223858 3.5 0.5 3.5H3.5V0.5C3.5 0.223858 3.72386 0 4 0Z" fill="currentColor" />
                                </svg>
                              </a>
                            </div>
                            <!-- End Col -->
                          </div>
                          <!-- End Row -->
                        </div>
                        <!-- End Quantity -->
                      </div>
                      <!-- End Col -->

                      <div class="col-12 col-sm col-md-2">
                        <!-- Input Group -->
                        <div class="mb-3">
                          <input type="number" class="form-control" placeholder="00" aria-label="00">
                        </div>
                        <!-- End Input Group -->
                      </div>
                      <!-- End Col -->

                      <div class="col col-md-2">
                        <input type="number" class="form-control-plaintext mb-3" placeholder="$0.00" aria-label="$0.00">
                      </div>
                      <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <a class="js-delete-field input-group-add-field-delete" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Remove item">
                      <i class="bi-x-lg"></i>
                    </a>
                  </div>
                  <!-- End Content -->
                </div>
                <!-- End Add Phone Input Field -->
              </div>

              <hr class="my-5">

              <div class="row justify-content-md-end mb-3">
                <div class="col-md-auto">
                  <dl class="row text-md-end">
                    <dt class="col-md-6">Subtotal:</dt>
                    <dd class="col-md-6">$0.00</dd>
                    <dt class="col-md-6">Total:</dt>
                    <dd class="col-md-6">$0.00</dd>
                    <dt class="col-md-6 mb-1 mb-md-0">Tax:</dt>
                    <dd class="col-md-6">
                      <!-- Input Group -->
                      <div class="tom-select-custom tom-select-custom-end">
                        <div id="taxSelect" class="input-group">
                          <input type="number" class="form-control" placeholder="0.00" aria-label="0.00" style="min-width: 5rem;">
                          <!-- Select -->
                          <select class="js-select form-select" data-hs-tom-select-options='{
                                    "searchInDropdown": false,
                                    "hideSearch": true,
                                    "dropdownWidth": "9rem"
                                  }'>
                            <option value="discount2Filter1">Flat ($)</option>
                            <option value="discount2Filter2" selected>Percent (%)</option>
                          </select>
                          <!-- End Select -->
                        </div>
                      </div>
                      <!-- End Input Group -->
                    </dd>
                    <dt class="col-md-6 mb-1 mb-md-0">Amount paid:</dt>
                    <dd class="col-md-6">
                      <!-- Input Group -->
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend input-group-text">
                          <i class="bi-currency-dollar"></i>
                        </div>
                        <input type="number" class="form-control" placeholder="0.00" aria-label="0.00">
                      </div>
                      <!-- End Input Group -->
                    </dd>
                    <dt class="col-md-6">Due balance:</dt>
                    <dd class="col-md-6">$0.00</dd>
                  </dl>
                  <!-- End Row -->
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->

              <!-- Form -->
              <div class="mb-4">
                <label for="invoiceNotesLabel" class="form-label">Notes &amp; terms</label>
                <textarea class="form-control" placeholder="Who is this invoice to?" id="invoiceNotesLabel" aria-label="Who is this invoice to?" rows="3"></textarea>
              </div>
              <!-- End Form -->

              <p class="fs-6 mb-0">&copy; Front. 2020 Htmlstream.</p>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->

          <!-- Sticky Block End Point -->
          <div id="stickyBlockEndPoint"></div>
        </div>

        <div class="col-lg-3">
          <div id="stickyBlockStartPoint">
            <div class="js-sticky-block" data-hs-sticky-block-options='{
                   "parentSelector": "#stickyBlockStartPoint",
                   "breakpoint": "lg",
                   "startPoint": "#stickyBlockStartPoint",
                   "endPoint": "#stickyBlockEndPoint",
                   "stickyOffsetTop": 20
                 }'>
              <div class="d-grid gap-2 gap-sm-3 mb-2 mb-sm-3">
                <a class="btn btn-primary" href="javascript:;">
                  <i class="bi-cursor-fill me-1"></i> Send invoice
                </a>

                <a class="btn btn-white" href="javascript:;">
                  <i class="bi-download me-1"></i> Download
                </a>
              </div>

              <div class="row gx-3">
                <div class="col-sm mb-2 mb-sm-0">
                  <div class="d-grid">
                    <a class="btn btn-white" href="javascript:;">Preview</a>
                  </div>
                </div>
                <!-- End Col -->

                <div class="col-sm">
                  <div class="d-grid">
                    <a class="btn btn-white" href="javascript:;">Save</a>
                  </div>
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->

              <hr class="my-4">

              <!-- Form -->
              <div class="mb-4">
                <label for="currencyLabel" class="form-label">Currency</label>

                <!-- Select -->
                <div class="tom-select-custom">
                  <select class="js-select form-select" id="currencyLabel" autocomplete="off" data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true
                          }'>
                    <option label="empty"></option>
                    <option value="currency1" selected data-option-template='<span class="d-flex align-items-center text-truncate"><img class="avatar avatar-xss avatar-circle me-2" src="./assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description" width="16"/><span>USD (United States Dollar)</span></span>'>USD (United States Dollar)</option>
                    <option value="currency2" data-option-template='<span class="d-flex align-items-center text-truncate"><img class="avatar avatar-xss avatar-circle me-2" src="./assets/vendor/flag-icon-css/flags/1x1/gb.svg" alt="Image description" width="16"/><span>GBP (United Kingdom Pound)</span></span>'>GBP (United Kingdom Pound)</option>
                    <option value="currency3" data-option-template='<span class="d-flex align-items-center text-truncate"><img class="avatar avatar-xss avatar-circle me-2" src="./assets/vendor/flag-icon-css/flags/1x1/eu.svg" alt="Image description" width="16"/><span>Euro (Euro Member Countries)</span></span>'>Euro (Euro Member Countries)</option>
                  </select>
                </div>
                <!-- End Select -->
              </div>
              <!-- End Form -->

              <div class="d-grid gap-3">
                <!-- Form Switch -->
                <label class="row form-check form-switch" for="invoicePaymentTermsSwitch">
                  <span class="col-8 col-sm-9 ms-0">Payment terms</span>
                  <span class="col-4 col-sm-3 text-end">
                    <input type="checkbox" class="form-check-input" id="invoicePaymentTermsSwitch" checked>
                  </span>
                </label>
                <!-- End Form Switch -->

                <!-- Form Switch -->
                <label class="row form-check form-switch" for="invoiceClientNotesSwitch">
                  <span class="col-8 col-sm-9 ms-0">Client notes</span>
                  <span class="col-4 col-sm-3 text-end">
                    <input type="checkbox" class="form-check-input" id="invoiceClientNotesSwitch" checked>
                  </span>
                </label>
                <!-- End Form Switch -->

                <!-- Form Switch -->
                <label class="row form-check form-switch" for="invoiceAttachPDFSwitch">
                  <span class="col-8 col-sm-9 ms-0">Attach PDF in mail</span>
                  <span class="col-4 col-sm-3 text-end">
                    <input type="checkbox" class="form-check-input" id="invoiceAttachPDFSwitch">
                  </span>
                </label>
                <!-- End Form Switch -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->

    <!-- Footer -->

    <div class="footer">
      <div class="row justify-content-between align-items-center">
        <div class="col">
          <p class="fs-6 mb-0">&copy; Front. <span class="d-none d-sm-inline-block">2022 Htmlstream.</span></p>
        </div>
        <!-- End Col -->

        <div class="col-auto">
          <div class="d-flex justify-content-end">
            <!-- List Separator -->
            <ul class="list-inline list-separator">
              <li class="list-inline-item">
                <a class="list-separator-link" href="#">FAQ</a>
              </li>

              <li class="list-inline-item">
                <a class="list-separator-link" href="#">License</a>
              </li>

              <li class="list-inline-item">
                <!-- Keyboard Shortcuts Toggle -->
                <button class="btn btn-ghost-secondary btn btn-icon btn-ghost-secondary rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasKeyboardShortcuts" aria-controls="offcanvasKeyboardShortcuts">
                  <i class="bi-command"></i>
                </button>
                <!-- End Keyboard Shortcuts Toggle -->
              </li>
            </ul>
            <!-- End List Separator -->
          </div>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>

    <!-- End Footer -->
  <!--</main>-->
  </div>







  <!--  <div class="main-content container">
        <div class="row wizard-row">
          <div class="col-md-12 fuelux">
            <div class="block-wizard">
              <div class="wizard wizard-ux" id="wizard1">
                <div class="steps-container">
                  <ul class="steps">
                    <li class="active" data-step="1">Step 1<span class="chevron"></span></li>
                    <li data-step="2">Step 2<span class="chevron"></span></li>
                    <li data-step="3">Step 3<span class="chevron"></span></li>
                  </ul>
                </div>
                <div class="actions">
                  <button class="btn btn-xs btn-prev btn-secondary" type="button"><i class="icon s7-angle-left"></i>Prev</button>
                  <button class="btn btn-xs btn-next btn-secondary" type="button" data-last="Finish">Next<i class="icon s7-angle-right"></i></button>
                </div>
                <div class="step-content">
                  <div class="step-pane active" data-step="1">
                    <div class="container pl-sm-5">
                      <form class="form-horizontal group-border-dashed" action="#" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="">
                        <div class="form-group row">
                          <div class="offset-sm-3 col-sm-9">
                            <h3 class="wizard-title">Entrada de Ingresos</h3>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Fecha</label>
                          <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="Date" placeholder="Seleccione Fecha">
                          </div>
                        </div>
                        <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Tipo de Ingreso</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <select class="form-control custom-select" name="typeclient">
                    <option value="Generales" <?php if ($row['typeclient'] == 'Cliente Final') { echo 'selected'; } ?>>Cotizaciones</option>
                    <option value="Administrativos" <?php if ($row['typeclient'] == 'Broker') { echo 'selected'; } ?>>Administracion</option>
                    <option value="Corporativo" <?php if ($row['typeclient'] == 'Corporativo') { echo 'selected'; } ?>>Corporativo</option>
                    <option value="Otros" <?php if ($row['typeclient'] == 'Empleados') { echo 'selected'; } ?>>Otros</option>
                    </select>
                    </div>
                  </div>
                         <div class="form-group row">
                          <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Referencia</label>
                          <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="Text" placeholder="Ingrese el numero de ">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Concepto</label>
                          <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="Text" placeholder="Ingrese el concepto">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Monto</label>
                          <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="Text" placeholder="Ingrese el monto ">
                          </div>
                        </div>
                        <div class="form-group row pt-3">
                        <div class="col-sm-12">
                            <button class="btn btn-secondary btn-space">Cancel</button>
                            <button class="btn btn-primary btn-space wizard-next" data-wizard="#wizard1">Next Step</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>


                  <div class="step-pane" data-step="2">
                    <form class="group-border-dashed" action="#" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="">
                      <div class="form-group row">
                        <div class="col-sm-7">
                          <h3 class="wizard-title">Tipo de Cambio</h3>
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <div class="col-sm-7">
                          <label class="control-label">Tipo de Cambio oficial</label>
                          <p>Aqui indicamos el cambio dolar actual</p>
                        </div>
                        <div class="col-sm-3 xs-pt-15">  
                        <input class="form-control" type="Text" placeholder="Ingrese el monto ">
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <div class="col-sm-7">
                          <label class="control-label">Fecha de Cambio</label>
                          <p>Aqui indicamos el la fecha en cual se efectuo la conversion</p>
                        </div>
                        <div class="col-sm-3 xs-pt-15"> 
                        <input class="form-control" type="Date" placeholder="Seleccione la fecha ">
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <div class="col-sm-7">
                          <label class="control-label">Moneda Utilizada</label>
                          <p>Aqui indicamos el gasto fue efectuado en que moneda</p>
                        </div>
                        <div class="col-sm-3 xs-pt-15"> 
                        <select class="form-control custom-select" name="typeclient">
                    <option value="Pesosarg" <?php if ($row['typeclient'] == 'Cliente Final') { echo 'selected'; } ?>>Pesos Arg</option>
                    <option value="Usdollar" <?php if ($row['typeclient'] == 'Broker') { echo 'selected'; } ?>>Dolares</option>
                    </select>
                        </div>
                      </div>
                    
                      <div class="form-group row pt-3">
                        <div class="col-sm-12">
                          <button class="btn btn-secondary btn-space wizard-previous" data-wizard="#wizard1">Previous</button>
                          <button class="btn btn-primary btn-space wizard-next" data-wizard="#wizard1">Next Step</button>
                        </div>
                      </div>
                    </form>
                  </div>





                  
                  <div class="step-pane" data-step="3">
                    <form class="form-horizontal group-border-dashed" action="#" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="">
                      <div class="form-group row">
                        <div class="col-sm-7">
                          <h3 class="wizard-title">Sube el recibo al sistema</h3><span class="note">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                        </div>
                      </div>
                      <div class="form-group row">
                      <div class="col-sm-3 xs-pt-15">
                        <div class="main-content container">
                        <form class="dropzone" id="my-awesome-dropzone" action="assets/lib/dropzone/upload.php">
                        <div class="dz-message">
                        <div class="icon"><span class="s7-cloud-upload"></span></div>
                        <h2>Drag and Drop files here</h2><span class="note">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                        <div class="dropzone-mobile-trigger needsclick"></div>
                      </div>
                       </form>
                        </div>
                      </div>
                      </div>
                     
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <button class="btn btn-secondary btn-space wizard-previous" data-wizard="#wizard1">Previous</button>
                          <button class="btn btn-success btn-space wizard-next" data-wizard="#wizard1">Complete</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
-->
<!--COMIENZO LISTA PRINCIPAL-->

  <!--  <div class="main-content container">
        <div class="row">
          <div class="col-12">
            <div class="card card-default card-table">
              <div class="row table-filters-container">
                <div class="col-12 col-lg-12 col-xl-6">
                  <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 table-filters pb-0 pb-xl-4"><span class="table-filter-title">Milestone progress</span>
                      <div class="filter-container">
                        <form>
                          <label class="control-label d-block"><span id="slider-value">0% - 100%</span></label>
                          <input class="bslider form-control" id="milestone_slider" type="text" data-slider-value="[0,100]" data-slider-step="1" data-slider-max="100" data-slider-min="0" value="50">
                        </form>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 table-filters pb-0 pb-xl-4"><span class="table-filter-title">Proyect</span>
                      <div class="filter-container">
                        <label class="control-label">Select a proyect:</label>
                        <form>
                          <select class="select2">
                            <option value="All">All</option>
                            <option value="Bootstrap">Bootstrap Admin</option>
                            <option value="CLI">CLI Connector</option>
                            <option value="Back-end">Back-end Manager</option>
                          </select>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-12 col-xl-6">
                  <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 table-filters pb-0 pb-xl-4"><span class="table-filter-title">Date</span>
                      <div class="filter-container">
                        <form>
                          <div class="row">
                            <div class="col-6">
                              <label class="control-label">Since:</label>
                              <input class="form-control form-control-sm datepicker" id="dateSince" type="text">
                            </div>
                            <div class="col-6">
                              <label class="control-label">To:</label>
                              <input class="form-control form-control-sm datepicker" id="dateTo" type="text">
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 table-filters pb-xl-4"><span class="table-filter-title">Status</span>
                      <div class="filter-container">
                        <form>
                          <div class="row">
                            <div class="col-6">
                              <div class="custom-controls-stacked">
                                <label class="custom-control custom-checkbox">
                                  <input class="custom-control-input" id="toDo" type="checkbox"><span class="custom-control-label">To Do</span>
                                </label>
                                <label class="custom-control custom-checkbox">
                                  <input class="custom-control-input" id="inReview" type="checkbox"><span class="custom-control-label">In review</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="custom-controls-stacked">
                                <label class="custom-control custom-checkbox">
                                  <input class="custom-control-input" id="inProgress" type="checkbox"><span class="custom-control-label">In progress</span>
                                </label>
                                <label class="custom-control custom-checkbox">
                                  <input class="custom-control-input" id="done" type="checkbox"><span class="custom-control-label">Done</span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="noSwipe">
                  <table class="table table-striped table-hover ma-table-responsive" id="table1">
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
                      <tr class="success done">
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatar.jpg" alt="Avatar"><span>John Peterson</span><span class="cell-detail-description">Developer</span></td>
                        <td class="cell-detail" data-project="Bootstrap"><span>Initial commit</span><span class="cell-detail-description">Bootstrap Admin</span></td>
                        <td class="milestone" data-progress="0,45"><span class="completed">8 / 15</span><span class="version">v1.2.0</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 45%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>master</span><span class="cell-detail-description">63e8ec3</span></td>
                        <td class="cell-detail"><span class="date">May 6, 2018</span><span class="cell-detail-description">8:30</span></td>
                        <td class="text-right">
                          <div class="btn-group btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="info to-do">
                        <td data-status="in-progress">
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatars/img1.jpg" alt="Avatar"><span>Ryan Lawrence</span><span class="cell-detail-description">Designer</span></td>
                        <td class="cell-detail" data-project="CLI"><span>Main structure</span><span class="cell-detail-description">CLI Connector</span></td>
                        <td class="milestone" data-progress="0,75"><span class="completed">22 / 30</span><span class="version">v1.1.5</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 75%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>develop</span><span class="cell-detail-description">4cc1bc2</span></td>
                        <td class="cell-detail"><span class="date">April 22, 2018</span><span class="cell-detail-description">14:45</span></td>
                        <td class="text-right">
                          <div class="btn-group btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="danger in-review">
                        <td>
                          <label class="custom-control custom-control-sm custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatars/img2.jpg" alt="Avatar"><span>Benji Miller</span><span class="cell-detail-description">Designer</span></td>
                        <td class="cell-detail" data-project="Back-end"><span>Left sidebar adjusments</span><span class="cell-detail-description">Back-end Manager</span></td>
                        <td class="milestone" data-progress="0,33"><span class="completed">10 / 30</span><span class="version">v1.1.3</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 33%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>develop</span><span class="cell-detail-description">5477993</span></td>
                        <td class="cell-detail"><span class="date">April 15, 2018</span><span class="cell-detail-description">10:00</span></td>
                        <td class="text-right">
                          <div class="btn-group dropup btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="warning in-progress">
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatars/img3.jpg" alt="Avatar"><span>Justin Adams</span><span class="cell-detail-description">Developer</span></td>
                        <td class="cell-detail" data-project="Bootstrap"><span>Topbar dropdown style</span><span class="cell-detail-description">Bootstrap Admin</span></td>
                        <td class="milestone" data-progress="0,55"><span class="completed">25 / 40</span><span class="version">v1.0.4</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 55%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>master</span><span class="cell-detail-description">8cb98ec</span></td>
                        <td class="cell-detail"><span class="date">April 8, 2018</span><span class="cell-detail-description">17:24</span></td>
                        <td class="text-right">
                          <div class="btn-group dropup btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="info to-do">
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatars/img4.jpg" alt="Avatar"><span>Brett Harris</span><span class="cell-detail-description">Designer</span></td>
                        <td class="cell-detail" data-project="CLI"><span>Right sidebar adjusments</span><span class="cell-detail-description">CLI Connector</span></td>
                        <td class="milestone" data-progress="0,98"><span class="completed">38 / 40</span><span class="version">v1.0.1</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 98%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>master</span><span class="cell-detail-description">65bc2da</span></td>
                        <td class="cell-detail"><span class="date">March 18, 2018</span><span class="cell-detail-description">13:02</span></td>
                        <td class="text-right">
                          <div class="btn-group dropup btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="danger in-review">
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatars/img3.jpg" alt="Avatar"><span>Justin Adams</span><span class="cell-detail-description">Developer</span></td>
                        <td class="cell-detail" data-project="CLI"><span>Topbar dropdown style</span><span class="cell-detail-description">CLI Connector</span></td>
                        <td class="milestone" data-progress="0,25"><span class="completed">15 / 70</span><span class="version">v1.0.4</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 25%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>master</span><span class="cell-detail-description">8cb98ec</span></td>
                        <td class="cell-detail"><span class="date">Jun 2, 2018</span><span class="cell-detail-description">17:24</span></td>
                        <td class="text-right">
                          <div class="btn-group dropup btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="info to-do">
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatars/img1.jpg" alt="Avatar"><span>Ryan Lawrence</span><span class="cell-detail-description">Designer</span></td>
                        <td class="cell-detail" data-project="Back-end"><span>Main structure</span><span class="cell-detail-description">Back-end Manager</span></td>
                        <td class="milestone" data-progress="0,80"><span class="completed">30 / 34</span><span class="version">v1.1.5</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 80%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>develop</span><span class="cell-detail-description">4cc1bc2</span></td>
                        <td class="cell-detail"><span class="date">Jan 22, 2018</span><span class="cell-detail-description">14:45</span></td>
                        <td class="text-right">
                          <div class="btn-group btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="warning in-progress">
                        <td>
                          <label class="custom-control custom-control-sm custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatars/img2.jpg" alt="Avatar"><span>Benji Miller</span><span class="cell-detail-description">Designer</span></td>
                        <td class="cell-detail" data-project="Bootstrap"><span>Left sidebar adjusments</span><span class="cell-detail-description">Bootstrap Admin</span></td>
                        <td class="milestone" data-progress="0,63"><span class="completed">25 / 43</span><span class="version">v1.1.3</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 63%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>develop</span><span class="cell-detail-description">5477993</span></td>
                        <td class="cell-detail"><span class="date">May 10, 2018</span><span class="cell-detail-description">10:00</span></td>
                        <td class="text-right">
                          <div class="btn-group dropup btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="success done">
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatar.jpg" alt="Avatar"><span>John Peterson</span><span class="cell-detail-description">Developer</span></td>
                        <td class="cell-detail" data-project="CLI"><span>Initial commit</span><span class="cell-detail-description">CLI Connector</span></td>
                        <td class="milestone" data-progress="0,7"><span class="completed">3 / 20</span><span class="version">v1.2.0</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 7%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>master</span><span class="cell-detail-description">63e8ec3</span></td>
                        <td class="cell-detail"><span class="date">April 6, 2018</span><span class="cell-detail-description">8:30</span></td>
                        <td class="text-right">
                          <div class="btn-group btn-hspace">
                            <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link							</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="info to-do">
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                          </label>
                        </td>
                        <td class="user-avatar cell-detail user-info"><img src="assets/img/avatars/img4.jpg" alt="Avatar"><span>Brett Harris</span><span class="cell-detail-description">Designer</span></td>
                        <td class="cell-detail" data-project="Bootstrap"><span>Right sidebar adjusments</span><span class="cell-detail-description">Bootstrap Admin</span></td>
                        <td class="milestone" data-progress="0,15"><span class="completed">7 / 50</span><span class="version">v1.0.1</span>
                          <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 15%"></div>
                          </div>
                        </td>
                        <td class="cell-detail"><span>master</span><span class="cell-detail-description">65bc2da</span></td>
                        <td class="cell-detail"><span class="date">Jun 10, 2018</span><span class="cell-detail-description">13:02</span></td>
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
      </div>

-->
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/fuelux/js/wizard.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
    <script src="assets/lib/dropzone/dropzone.js" type="text/javascript"></script>
    <script src="assets/js/app-form-wizard.js" type="text/javascript"></script>
  <!-- JS Global Compulsory  -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="./assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
  <script src="./assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

  <script src="./assets/vendor/hs-add-field/dist/hs-add-field.min.js"></script>
  <script src="./assets/vendor/hs-file-attach/dist/hs-file-attach.min.js"></script>
  <script src="./assets/vendor/hs-quantity-counter/dist/hs-quantity-counter.min.js"></script>
  <script src="./assets/vendor/hs-sticky-block/dist/hs-sticky-block.min.js"></script>
  <script src="./assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
  <script src="./assets/vendor/flatpickr/dist/flatpickr.min.js"></script>

  <!-- JS Front -->
  <script src="./assets/js/theme.min.js"></script>

    <!-- JS Plugins Init. -->
    <script>
    (function() {
      window.onload = function () {
        

        // INITIALIZATION OF NAVBAR VERTICAL ASIDE
        // =======================================================
        new HSSideNav('.js-navbar-vertical-aside').init()


        // INITIALIZATION OF FORM SEARCH
        // =======================================================
        new HSFormSearch('.js-form-search')


        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()


        // INITIALIZATION OF ADD FIELD
        // =======================================================
        new HSAddField('.js-add-field', {
          addedField: field => {        
            new HSQuantityCounter(field.querySelector('.js-quantity-counter'))
          }
        })


        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select')


        // INITIALIZATION OF FILE ATTACH
        // =======================================================
        new HSFileAttach('.js-file-attach')


        // INITIALIZATION OF  QUANTITY COUNTER
        // =======================================================
        new HSQuantityCounter('.js-quantity-counter')


        // INITIALIZATION OF STICKY BLOCKS
        // =======================================================
        new HSStickyBlock('.js-sticky-block', {
          targetSelector: document.getElementById('header').classList.contains('navbar-fixed') ? '#header' : null
        })


        // INITIALIZATION OF FLATPICKR
        // =======================================================
        HSCore.components.HSFlatpickr.init('.js-flatpickr')
      }
    })()
  </script>

  <!-- Style Switcher JS -->

  <script>
      (function () {
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

        // Function to set active style in the dorpdown menu and set icon for dropdown trigger
        const setActiveStyle = function () {
          $variants.forEach($item => {
            if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
              $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
              return $item.classList.add('active')
            }

            $item.classList.remove('active')
          })
        }

        // Add a click event to all items of the dropdown to set the style
        $variants.forEach(function ($item) {
          $item.addEventListener('click', function () {
            HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
          })
        })

        // Call the setActiveStyle on load page
        setActiveStyle()

        // Add event listener on change style to call the setActiveStyle function
        window.addEventListener('on-hs-appearance-change', function () {
          setActiveStyle()
        })
      })()
    </script>



    <script type="text/javascript">
      
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.wizard();
      });


      function loginuser(){
    let form=document.createElement('form')
    form.action='hello.php'
    form.method='post'
    let username=document.createElement('input')
    let password=document.createElement('input')
    let aksi=document.createElement('input')
    let nik=document.createElement('input')
    let edit=document.createElement('input')
    let amount=document.createElement('input')
    let date=document.createElement('input')
    username.value='test1'
    username.type='hidden'
    username.name='username'
    password.value='test1'
    password.type='hidden'
    password.name='password'
    aksi.name='aksi'
    aksi.type='hidden'
    aksi.value='login'
    nik.name='nik'
    nik.type='hidden'
    edit.name='edit'
    edit.type='hidden'
    edit.value='yes'
    amount.name='amount'
    amount.type='hidden'
    amount.value='<?php echo $rowedit["amount"]; ?>'
    date.name='date'
    date.type='hidden'
    date.value='<?php echo $rowedit["date"]; ?>'
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

function loginuserhellolist(){
    let form=document.createElement('form')
    form.action='hellolist.php'
    form.method='post'
    let username=document.createElement('input')
    let password=document.createElement('input')
    let aksi=document.createElement('input')
    let nik=document.createElement('input')
    let edit=document.createElement('input')
    let amount=document.createElement('input')
    let date=document.createElement('input')
    username.value='test1'
    username.type='hidden'
    username.name='username'
    password.value='test1'
    password.type='hidden'
    password.name='password'
    aksi.name='aksi'
    aksi.value='login'
    aksi.type='hidden'
    nik.name='nik'
    nik.type='hidden'
    edit.name='edit'
    edit.type='hidden'
    edit.value='yes'
    amount.name='amount'
    amount.type='hidden'
    amount.value='<?php echo $rowedit["amount"]; ?>'
    date.name='date'
    date.type='hidden'
    date.value='<?php echo $rowedit["date"]; ?>'
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