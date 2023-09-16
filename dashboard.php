<!DOCTYPE html>
<html>

<?php
include("conexion.php");
?>

<head>
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.ico">

  <title>AIS Home</title>

  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
  <!-- <link rel="stylesheet" href="css/styles.css" type="text/css" /> -->
</head>

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="assets/js/login-check.js" type="text/javascript"></script>

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

<body>
  <div id="error-popup" class="modal">
    <div class="modal-content">
      <span id="pop-up-close" class="close">&times;</span>
      <p id="popup-text" class="popup-text">Some text in the Modal..</p>
    </div>
  </div>
  <?php require_once("nav_header.html") ?>
  <!-- <nav class="navbar navbar-expand navbar-dark mai-top-header">
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
      </ul>
      </li>
      </ul>
      <ul class="nav navbar-nav float-lg-right mai-user-nav">
        <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><img src="assets/img/avatar.jpg" alt="Avatar"><span class="user-name">Demo Account</span><span class="angle-down s7-angle-down"></span></a>
          <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#"><span class="icon s7-home"></span><span id="account-name"></span></a><a class="dropdown-item" href="menuprofile.php"><span class="icon s7-user"></span>Profile</a><a class="dropdown-item" href="menuprofile.php"><span class="icon s7-tools"></span>Settings</a><a class="dropdown-item" href="login.php"><span class="icon s7-power"></span>Log Out</a></div>
        </li>
      </ul>
    </div>
  </nav> -->


  <!--COMIENZO BOTONERA PRINCIPAL-->

  <div class="mai-wrapper">
    <?php require_once("nav_header2.html"); ?>
    <!-- <nav class="navbar navbar-expand-lg mai-sub-header">
      <div class="container">
        <nav class="navbar navbar-expand-md">
          <button class="navbar-toggler hidden-md-up collapsed" type="button" data-toggle="collapse" data-target="#mai-navbar-collapse" aria-controls="mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-bar"><span></span><span></span><span></span></span></button>
          <div class="navbar-collapse collapse mai-nav-tabs" id="mai-navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="nav-item parent open"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-home"></span><span>Home</span></a>
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
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-users"></span><span>CRM</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="crmregistro.php"><span class="icon s7-user"></span><span class="name">Registro</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="crm.php"><span class="icon s7-id"></span><span class="name">Lista de Contactos </span></a>
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
                  <li class="nav-item"><a class="nav-link" href="contabilidadingresos.php"><span class="icon s7-cash"></span><span class="name">Gastos Gral</span></a>
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
      </div>
    </nav> -->


    <!--COMIENZO DASHBOARD-->

    <?php
    $month = date('m');
    $year = date('Y');
    $current_date = date('Y-m-d H:i:s');
    $status = 2;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $filter = $_POST["matricula_selector"];
      if ($filter == "General" || $filter == "") {
        //Cotizaciones
        $cot_result = mysqli_query($con, "SELECT COUNT(*) as quote FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year");
        $cot_row = mysqli_fetch_assoc($cot_result);
        // Assign the number of quotes generated this month to $quotesthismonth
        $quotesthismonth = $cot_row['quote'];

        //Amount
        $amount_result = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND moneda = 'USD'");
        $amount_row = mysqli_fetch_assoc($amount_result);
        $totalamountthismonth = $amount_row['amount'];

        $amount_result = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND moneda = 'MXN'");
        $amount_row = mysqli_fetch_assoc($amount_result);
        $totalamountthismonth2 = $amount_row['amount'];

        //Trips
        $trips_result = mysqli_query($con, "SELECT COUNT(*) as quote FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND Status = $status");
        $trip_row = mysqli_fetch_assoc($trips_result);
        // Assign the number of quotes generated this month to $quotesthismonth
        $tripsthismonth = $trip_row['quote'];

        //Total amount
        $total_result = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND status = $status AND moneda = 'USD'");
        $total_row = mysqli_fetch_assoc($total_result);
        $totaltripsthismonth = $total_row['amount'];

        $total_result = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND status = $status AND moneda = 'MXN'");
        $total_row = mysqli_fetch_assoc($total_result);
        $totaltripsthismonth2 = $total_row['amount'];
      } else {
        //Cotizaciones
        $cot_result = mysqli_query($con, "SELECT COUNT(*) as quote FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND aircraft='$filter'");
        $cot_row = mysqli_fetch_assoc($cot_result);
        // Assign the number of quotes generated this month to $quotesthismonth
        $quotesthismonth = $cot_row['quote'];

        //Amount
        $amount_result = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND aircraft='$filter' AND moneda = 'USD'");
        $amount_row = mysqli_fetch_assoc($amount_result);
        $totalamountthismonth = $amount_row['amount'];

        $amount_result = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND aircraft='$filter' AND moneda = 'MXN'");
        $amount_row = mysqli_fetch_assoc($amount_result);
        $totalamountthismonth2 = $amount_row['amount'];

        //Trips
        $trips_result = mysqli_query($con, "SELECT COUNT(*) as quote FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND status = $status AND aircraft='$filter'");
        $trip_row = mysqli_fetch_assoc($trips_result);
        // Assign the number of quotes generated this month to $quotesthismonth
        $tripsthismonth = $trip_row['quote'];

        //Total amount
        $total_result = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND status = $status AND aircraft='$filter' AND moneda = 'USD'");
        $total_row = mysqli_fetch_assoc($total_result);
        $totaltripsthismonth = $total_row['amount'];

        $total_result = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND status = $status AND aircraft='$filter' AND moneda = 'MXN'");
        $total_row = mysqli_fetch_assoc($total_result);
        $totaltripsthismonth2 = $total_row['amount'];
      }
    } else {
      //Cotizaciones
      $cot_result = mysqli_query($con, "SELECT COUNT(*) as quote FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year");
      $cot_row = mysqli_fetch_assoc($cot_result);
      // Assign the number of quotes generated this month to $quotesthismonth
      $quotesthismonth = $cot_row['quote'];

      //Amount
      $amount_result = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND moneda = 'USD'");
      $amount_row = mysqli_fetch_assoc($amount_result);
      $totalamountthismonth = $amount_row['amount'];

      $amount_result = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND moneda = 'MXN'");
      $amount_row = mysqli_fetch_assoc($amount_result);
      $totalamountthismonth2 = $amount_row['amount'];

      //Trips
      $trips_result = mysqli_query($con, "SELECT COUNT(*) as quote FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND status = $status");
      $trip_row = mysqli_fetch_assoc($trips_result);
      // Assign the number of quotes generated this month to $quotesthismonth
      $tripsthismonth = $trip_row['quote'];

      //Total amount
      $total_result = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND moneda = 'USD' AND status= $status");
      $total_row = mysqli_fetch_assoc($total_result);
      $totaltripsthismonth = $total_row['amount'];

      $total_result = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND status = $status AND moneda = 'MXN'");
      $total_row = mysqli_fetch_assoc($total_result);
      $totaltripsthismonth2 = $total_row['amount'];
    }

    // Format the number without extra decimals
    $tripsthismonth = number_format($tripsthismonth, 0);


    $plane_result = mysqli_query($con, "SELECT COUNT(*) as plane_quantity FROM Aircraft");
    $plane_row = mysqli_fetch_assoc($plane_result);
    $plane_quantity = $plane_row['plane_quantity'];

    $user_result = mysqli_query($con, "SELECT COUNT(*) as user_quantity FROM users");
    $user_row = mysqli_fetch_assoc($user_result);
    $user_quantity = $user_row['user_quantity'];


    $top_user_result = mysqli_query($con, "SELECT email, COUNT(*) AS user_quantity FROM logs GROUP BY email ORDER BY user_quantity DESC LIMIT 1");
    $top_user_row = mysqli_fetch_assoc($top_user_result);

    if ($top_user_row && $top_user_row['user_quantity'] > 0) {
      $search_user = $top_user_row['email'];
      $top_user_result = mysqli_query($con, "SELECT username FROM users WHERE email='$search_user'");
      if ($top_user_result) {
        $top_user_data = mysqli_fetch_assoc($top_user_result);
        $top_user = $top_user_data['username'];
      } else {
        $top_user = "información insuficiente";
      }
    } else {
      $top_user = "información insuficiente";
    }





    $top_saler_result = mysqli_query($con, "SELECT email, COUNT(*) AS saler_quantity FROM logs WHERE `action` = 'registered quote' GROUP BY email ORDER BY saler_quantity DESC LIMIT 1");
    $top_saler_row = mysqli_fetch_assoc($top_saler_result);
    if ($top_saler_row && $top_saler_row['saler_quantity'] > 0) {
      $search_saler = $top_saler_row['email'];
      $top_saler_result = mysqli_query($con, "SELECT username FROM users WHERE email='$search_saler'");
      if ($top_saler_result) {
        $top_saler_data = mysqli_fetch_assoc($top_saler_result);
        $top_saler = $top_saler_data['username'];
      } else {
        $top_saler = "información insuficiente";
      }
    } else {
      $top_saler = "información insuficiente";
    }
    ?>



    <div class="main-content container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group row">
            <div class="col-12">
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="matricula_selector_form" style="display:none">
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
                        echo "<option value='" . $plane_rows['matricula'] . "'>" . $plane_rows['matricula'] . "</option>";
                      }
                    } else {
                      echo "<option value='General'>General</option>";
                      while ($plane_rows = mysqli_fetch_assoc($aircraft)) {
                        if ($selectedValue == $plane_rows['matricula']) {
                          echo "<option value='" . $plane_rows['matricula'] . "' selected>" . $plane_rows['matricula'] . "</option>";
                        } else {
                          echo "<option value='" . $plane_rows['matricula'] . "'>" . $plane_rows['matricula'] . "</option>";
                        }
                      }
                    }
                  } else {
                    echo "<option value='General'>General</option>";
                    while ($plane_rows = mysqli_fetch_assoc($aircraft)) {
                      echo "<option value='" . $plane_rows['matricula'] . "'>" . $plane_rows['matricula'] . "</option>";
                    }
                  }

                  ?>
                </select>
              </form>
            </div>
          </div>


          <style>
            .vertical-hr {
              border: none;
              border-left: 1px solid hsla(200, 10%, 50%, 100);
              height: 100%;
              width: 1px;
            }
          </style>


          <div class="row">
            <div class="col-md-7">
              <div class="widget widget-fullwidth user-develop-chart">
                <div class="widget-head">
                  <div class="tools"><span class="icon s7-cloud-download"></span><span class="icon s7-refresh-2"></span></div><span class="title">Estadisticas Generales</span>
                </div>
                <div class="widget-chart-container">
                  <div class="legend-container" id="develop-chart-legend"></div>
                  <div id="develop-chart" style="height: 312px;"></div>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="widget-indicators">
                <div class="indicator-item">
                  <div class="indicator-item-icon">
                    <div class="icon"><span class="s7-user"></span></div>
                  </div>
                  <div class="indicator-item-value">
                    <span class="indicator-value-counter" data-toggle="counter" data-end="<?php echo $user_quantity; ?>">0</span>
                    <div class="indicator-value-title">Cantidad de usuarios</div>
                  </div>
                </div>
                <div class="indicator-item">
                  <div class="indicator-item-icon">
                    <div class="icon"><span class="s7-paper-plane"></span></div>
                  </div>
                  <div class="indicator-item-value">
                    <span class="indicator-value-counter" data-toggle="counter" data-end="<?php echo $quotesthismonth; ?>">0</span>
                    <div class="indicator-value-title">Cotizaciones del Mes</div>
                  </div>
                </div>
                <div class="indicator-item">
                  <div class="indicator-item-icon" style="flex: 0; width: 5em;">
                    <div class="icon"><span class="s7-graph"></span></div>
                  </div>
                  <div class="indicator-item-value" style="display: flex; flex: 1; flex-direction: row; padding-left: 1em;">
                    <div style="display: flex; flex-direction: column; text-align: right;">
                      <span class="indicator-value-counter" data-toggle="counter" data-decimals="2" data-end="<?php echo $totalamountthismonth; ?>" data-prefix="$">>0</span>
                      <div class="indicator-value-title">Total Cotizaciones (USD)</div>
                    </div>
                    <hr class="vertical-hr">
                    <div style="display: flex; flex-direction: column; text-align: right;">
                    <span class="indicator-value-counter" data-toggle="counter" data-decimals="2" data-end="<?php echo $totalamountthismonth2; ?>" data-prefix="$">>0</span>
                      <div class="indicator-value-title">Total Cotizaciones (MXN)</div>
                    </div>
                  </div>
                </div>
                <div class="indicator-item">
                  <div class="indicator-item-icon">
                    <div class="icon"><span class="s7-pin"></span></div>
                  </div>
                  <div class="indicator-item-value"><span class="indicator-value-counter" data-toggle="counter" data-end="<?php echo $tripsthismonth; ?>">0</span>
                    <div class="indicator-value-title">Viajes Confirmados</div>
                  </div>
                </div>
                <div class="indicator-item">
                  <div class="indicator-item-icon" style="flex: 0; width: 5em;">
                    <div class="icon"><span class="s7-cash"></span></div>
                  </div>
                  <div class="indicator-item-value" style="display: flex; flex: 1; flex-direction: row; padding-left: 2em;">
                    <div style="display: flex; flex-direction: column; text-align: right;">
                      <span class="indicator-value-counter" data-toggle="counter" data-decimals="2" data-end="<?php echo $totaltripsthismonth; ?>" data-prefix="$">>0</span>
                      <div class="indicator-value-title">Total Ventas (USD)</div>
                    </div>
                    <hr class="vertical-hr">
                    <div style="display: flex; flex-direction: column; text-align: right;">
                    <span class="indicator-value-counter" data-toggle="counter" data-decimals="2" data-end="<?php echo $totaltripsthismonth2; ?>" data-prefix="$">>0</span>
                      <div class="indicator-value-title">Total Ventas (MXN)</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- PHP TODO LIST-->

          <div class="row">
            <div class="col-lg-6">
              <div class="widget widget-fullwidth todo-list">

                <?php
                // Connect to the database
                // $con = mysqli_connect("localhost", "root", "", "YAC");

                // Check if the form was submitted
                // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //   // Get the task description from the form
                //   $task = $_POST['task'];

                //   // Insert the new task into the database
                //   mysqli_query($con, "INSERT INTO tasks (status, task) VALUES ('pending', '$task')");

                //   // Redirect back to the same page to avoid resubmitting the form
                //   header("Location: " . $_SERVER['PHP_SELF']);
                //   exit;
                // }

                // Execute the SQL query to get the pending tasks
                $result = mysqli_query($con, "SELECT * FROM tasks WHERE status = 'pending'");

                // Check if there are any pending tasks
                if (mysqli_num_rows($result) > 0) {
                  echo '
              <div class="widget-head"><span class="title">Notas</span></div>
                <div class="todo-list-container">
                  <ul class="todo-tasks">';

                  // Loop through the results and create a list item for each task
                ?>
                  <div id="elementosContainer" name="elementosContainer">
                    <!-- Los elementos se mostrarán aquí -->
                  </div>
                  <!-- // while ($row = mysqli_fetch_assoc($result)) {
              //   echo '
              //   <li class="todo-task">
              //     <label class="custom-control custom-checkbox">
              //       <input class="custom-control-input" type="checkbox"><span class="custom-control-label">' . $row['task'] . '</span>
              //     </label><a class="close" href="javascript:deleteTask(' . $row['id'] . ')"><span class="icon s7-close"></span></a>
              //   </li>';
              // } -->
                <?php
                  echo '
                  </ul>
                  </div>
                  <div class="todo-new-task" id="todo-new-task">
                  <div class="input-group">
                    <input id="task-text" class="form-control" type="text" name="task" placeholder="Agregar una nota...">
                    <div class="input-group-append"><button class="btn btn-primary" onclick="addTask()"><i class="icon s7-plus"></i></button></div>
                  </div>
                </div>
              </div>
            </div>';
                } else {
                  echo '
          
            <div class="widget-head"><span class="title">Lista de Pendientes</span></div>
            <div class="todo-list-container">
              <p>No hay tareas pendientes.</p>
            </div>
            <form method="POST">
              <div class="todo-new-task" id="todo-new-task">
                <div class="input-group">
                  <input class="form-control" type="text" name="task" placeholder="Add a new task...">
                  <div class="input-group-append"><button class="btn btn-primary" type="submit"><i class="icon s7-plus"></i></button></div>
                </div>
              </div>
            </form>
          </div>
        </div>';
                }

                // Close the database connection
                mysqli_close($con);

                ?>

                <div class="col-sm-6 col-lg-3">
                  <div class="widget widget-fullwidth earnings">
                    <div class="widget-head">
                      <div class="tools"><span class="icon s7-refresh-2"></span></div><span class="title">Ventas Semanales</span>
                    </div>
                    <div class="earnings-resume">
                      <div class="earnings-value earnings-value-big"><span class="earnings-counter" data-toggle="counter" data-end="127.95" data-decimals="2" data-prefix="$">0</span><span class="earnings-title">Actual</span></div>
                      <div class="earnings-value"><span class="earnings-counter" data-toggle="counter" data-end="527" data-decimals="2" data-prefix="$">0</span><span class="earnings-title">Estimado</span></div>
                      <div class="earnings-value"><span class="earnings-counter" data-toggle="counter" data-end="79" data-suffix="%">0</span><span class="earnings-title">Inc. Ventas</span></div>
                    </div>
                    <div class="earnings-chart">
                      <div id="earnings-chart" style="height: 56px;"></div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                  <div class="usage usage-dark">
                    <div class="usage-head"><span class="usage-head-title">Top saler</span>
                    </div>
                    <div class="usage-resume">
                      <h5 class="usage-data"><span class="usage-title"><?php echo $top_saler ?></span></h5>
                      <div class="usage-icon"><span class="icon s7-graph3"></span></div>
                    </div>
                  </div>
                  <div class="usage usage-dark">
                    <div class="usage-head"><span class="usage-head-title">Top user</span>
                    </div>
                    <div class="usage-resume">
                      <h5 class="usage-data"><span class="usage-title"><?php echo $top_user ?></span></h5>
                      <div class="usage-icon"><span class="icon s7-timer"></span></div>
                    </div>
                  </div>

                </div>
                <!-- <div class="col-sm-6 col-lg-3">
               <div class="usage usage-dark">
                <div class="usage-head"><span class="usage-head-title">Marketing</span>
                  <div class="usage-head-tools"><span class="icon s7-refresh-2"></span></div>
                </div>
                <div class="usage-resume">
                  <div class="usage-data"><span class="usage-counter" data-toggle="counter" data-end="73.6" data-decimals="1" data-suffix="%"></span><span class="usage-title">Download Files</span><span class="usage-detail">13,5 MB</span></div>
                  <div class="usage-icon"><span class="icon s7-graph3"></span></div>
                </div>
              </div> 
               <div class="usage usage-primary">
                <div class="usage-head"><span class="usage-head-title">Server CPU</span>
                  <div class="usage-head-tools"><span class="icon s7-refresh-2"></span></div>
                </div>
                <div class="usage-resume">
                  <div class="usage-data"><span class="usage-counter" data-toggle="counter" data-end="33.9" data-decimals="1" data-suffix="%"></span><span class="usage-title">Total Usage</span><span class="usage-detail">178 MB</span></div>
                  <div class="usage-icon"><span class="icon s7-timer"></span></div>
                </div> 
              </div> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
              <div class="form-group row">
                <div class="col-12">
                  <div class="usage usage-dark">
                    <div class="usage-head"><span class="usage-head-title">Cantidad de aeronaves</span>
                    </div>
                    <div class="usage-resume">
                      <h5 class="usage-data"><span class="usage-title"><?php echo $plane_quantity ?></span></h5>
                      <div class="usage-icon"><span class="icon s7-paper-plane"></span></div>
                    </div>
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
      <script src="assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
      <script src="assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
      <script src="assets/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
      <script src="assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
      <script src="assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
      <script src="assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
      <script src="assets/lib/jquery-flot/plugins/jquery.flot.tooltip.js" type="text/javascript"></script>
      <script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
      <script src="assets/js/app-dashboard.js" type="text/javascript"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          //-initialize the javascript
          App.init();
          App.dashboard();
        });
      </script>
      <script>
        let user_type = localStorage.getItem("user_type");
        let selectElement = document.getElementById("matricula_selector");
        let matricula_selector_form = document.getElementById("matricula_selector_form");

        if (user_type == "owner") {
          document.getElementById("matricula_selector_form").style.display = "block";
        }

        cargarDatosTabla();


        // Agrega un evento de cambio al select
        selectElement.addEventListener("change", function() {
          let selectedValue = selectElement.value;
          console.log(selectedValue);
          matricula_selector_form.submit();

        });



        function addTask() {
          let task_name = document.getElementById("task-text").value;
          // execute query to load taks
          $.ajax({
            url: "task_query.php?task_to_add=" + task_name + "&task_to_delete=" + 0, // your php file
            type: "GET", // type of the HTTP request
            success: function(data) {
              cargarDatosTabla();
              document.getElementById("task-text").value = "";
              let log_user_type = localStorage.getItem("user_type");
              let log_email = localStorage.getItem("email");
              let log_username = localStorage.getItem("username");
              $.ajax({
                url: "logs_query.php?email=" + log_email + "&username=" + log_username + "&role=" + log_user_type + "&action='registered note'", // your php file
                type: "GET"
              });
            }

          });
        }

        function deleteTask(task_id) {
          // execute query to delete taks
          $.ajax({
            url: "task_query.php?task_to_delete=" + task_id + "&task_to_add=" + 0, // your php file
            type: "GET", // type of the HTTP request
            success: function(data) {
              cargarDatosTabla();
              let log_user_type = localStorage.getItem("user_type");
              let log_email = localStorage.getItem("email");
              let log_username = localStorage.getItem("username");
              $.ajax({
                url: "logs_query.php?email=" + log_email + "&username=" + log_username + "&role=" + log_user_type + "&action='deleted note'", // your php file
                type: "GET"
              });
            }
          });

        }



        function cargarDatosTabla() {
          let user_type = localStorage.getItem("user_type") == "unset" ? 0 : 1;
          $.ajax({
            url: "task_query.php?task_to_delete=" + 0 + "&task_to_add=" + 0 + "&user_unset=" + user_type,
            method: "GET",
            success: function(data) {
              $("#elementosContainer").html(data);
            },
            error: function(error) {
              console.error("Error al cargar la tabla:", error);
            }
          });
        }

        function doneTask(id) {
          $.ajax({
            url: "task_query.php?done_task=" + id,
            method: "GET",
            success: function(data) {
              console.log(data)
              deleteTask(id);
            }
          });
        }
      </script>

      <script>
        // TODO: an eye icon could be added to show the password onclick
        // it should change the type of input from password to text and viceversa on toggle

        function userUnset() {
          if (localStorage.getItem("user_type") != "unset") return;

          document.getElementById("todo-new-task").style.display = "none";

          let popup = document.getElementById("error-popup");
          let popup_text = document.getElementById("popup-text");

          popup.style.display = "block";
          popup_text.innerHTML = "Bienvenido! Todavía no tiene asignado un rol. Aguarde a que un administrador atienda la sitaución.";
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

        // checks if user is unset
        userUnset();
      </script>

</body>

</html>