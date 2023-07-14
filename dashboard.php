<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

</head>
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
                  <li class="nav-item"><a class="nav-link" href="javascript:loginuser()"><span class="icon s7-science"></span><span class="name">Cotizador</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="javascript:loginuser()"><span class="icon s7-albums"></span><span class="name">Lista de Cotizaciones</span></a>
                  </li>

                </ul>
              </li>
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-users"></span><span>CRM</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="crmregistro.php"><span class="icon s7-user"></span><span class="name">Regristro</span></a>
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
    </nav>


    <!--COMIENZO DASHBOARD-->

    <!-- PHP SUM QUOTES PER MONTH-->
    <?php
    // Connect to the database
    $con = mysqli_connect("localhost", "root", "", "YAC");

    // Get the current month and year
    $month = date('m');
    $year = date('Y');

    // Execute the SQL query to count the quotes generated this month
    $result = mysqli_query($con, "SELECT COUNT(*) as quote FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year");

    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

    // Assign the number of quotes generated this month to $quotesthismonth
    $quotesthismonth = $row['quote'];
    ?>

    <!-- PHP CALCULATION TOTAL SUM QUOTES PER MONTH-->

    <?php
    // Connect to the database
    $con = mysqli_connect("localhost", "root", "", "YAC");

    // Get the current month and year
    $month = date('m');
    $year = date('Y');

    // Execute the SQL query to get the total amount of all quotes generated this month
    $resultamount = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year");

    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($resultamount);

    // Assign the total amount of all quotes generated this month to $totalamountthismonth
    $totalamountthismonth = $row['amount'];

    // Add the $ sign to the total amount
    //$totalamountthismonth_with_sign = '$' . number_format($totalamountthismonth, 2);


    ?>

    <!-- PHP SUM TRIPS PER MONTH-->
    <?php
    // Connect to the database
    $con = mysqli_connect("localhost", "root", "", "YAC");

    // Get the current month and year
    $month = date('m');
    $year = date('Y');
    $status = 2;

    // Execute the SQL query to count the quotes generated this month
    $resultcon = mysqli_query($con, "SELECT COUNT(*) as quote FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND Status = $status");

    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($resultcon);

    // Assign the number of quotes generated this month to $quotesthismonth
    $tripsthismonth = $row['quote'];

    // Format the number without extra decimals
    $tripsthismonth = number_format($tripsthismonth, 0);

    ?>

    <!-- PHP CALCULATION TOTAL SUM TRIPS PER MONTH-->

    <?php
    // Connect to the database
    $con = mysqli_connect("localhost", "root", "", "YAC");

    // Get the current month and year
    $month = date('m');
    $year = date('Y');
    $status = 2;

    // Execute the SQL query to get the total amount of all quotes generated this month
    $resultamounttrips = mysqli_query($con, "SELECT SUM(amount) as amount FROM invoices WHERE MONTH(date) = $month AND YEAR(date) = $year AND Status = $status");

    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($resultamounttrips);

    // Assign the total amount of all quotes generated this month to $totalamountthismonth
    $totaltripsthismonth = $row['amount'];

    // Add the $ sign to the total amount
    //$totalamountthismonth_with_sign = '$' . number_format($totalamountthismonth, 2);

    ?>



    <div class="main-content container">
      <div class="row">
        <div class="col-md-7">
          <div class="widget widget-fullwidth user-develop-chart">
            <div class="widget-head">
              <div class="tools"><span class="icon s7-cloud-download"></span><span class="icon s7-refresh-2"></span></div><span class="title">Estadisticas Generales</span>
            </div>
            <div class="widget-chart-container">
              <div class="legend-container" id="develop-chart-legend"></div>
              <div id="develop-chart" style="height: 225px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="widget-indicators">
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
              <div class="indicator-item-icon">
                <div class="icon"><span class="s7-graph"></span></div>
              </div>
              <div class="indicator-item-value"><span class="indicator-value-counter" data-toggle="counter" data-decimals="2" data-end="<?php echo $totalamountthismonth; ?>" data-prefix="$">>0</span>
                <div class="indicator-value-title">Total Cotizaciones</div>
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
              <div class="indicator-item-icon">
                <div class="icon"><span class="s7-cash"></span></div>
              </div>
              <div class="indicator-item-value"><span class="indicator-value-counter" data-toggle="counter" data-decimals="2" data-end="<?php echo $totaltripsthismonth; ?>" data-prefix="$">0</span>
                <div class="indicator-value-title">Total Ventas</div>
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
            $con = mysqli_connect("localhost", "root", "", "YAC");

            // Check if the form was submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              // Get the task description from the form
              $task = $_POST['task'];

              // Insert the new task into the database
              mysqli_query($con, "INSERT INTO tasks (status, task) VALUES ('pending', '$task')");

              // Redirect back to the same page to avoid resubmitting the form
              header("Location: " . $_SERVER['PHP_SELF']);
              exit;
            }

            // Execute the SQL query to get the pending tasks
            $result = mysqli_query($con, "SELECT * FROM tasks WHERE status = 'pending'");

            // Check if there are any pending tasks
            if (mysqli_num_rows($result) > 0) {
              echo '
          
            <div class="widget-head"><span class="title">Lista de Pendientes</span></div>
            <div class="todo-list-container">
              <ul class="todo-tasks">';

              // Loop through the results and create a list item for each task
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<li class="todo-task">
            <label class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox"><span class="custom-control-label">' . $row['task'] . '</span>
            </label><a class="close" href="#"><span class="icon s7-close"></span></a>
          </li>';
              }

              echo '</ul>
      </div>
      <form method="POST">
        <div class="todo-new-task">
          <div class="input-group">
            <input class="form-control" type="text" name="task" placeholder="Add a new task...">
            <div class="input-group-append"><button class="btn btn-primary" type="submit"><i class="icon s7-plus"></i></button></div>
          </div>
        </div>
      </form>
    </div>
  </div>';
            } else {
              echo '
          
            <div class="widget-head"><span class="title">Lista de Pendientes</span></div>
            <div class="todo-list-container">
              <p>No hay tareas pendientes.</p>
            </div>
            <form method="POST">
              <div class="todo-new-task">
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



            <!-- END PHP TODO LIST-->


            <!--<div class="col-lg-6">
            <div class="widget widget-fullwidth todo-list">
              <div class="widget-head"><span class="title">Lista de Pendientes</span></div>
              <div class="todo-list-container">
                <ul class="todo-tasks">
                  <li class="todo-task">
                    <label class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Pellentesque habitant morbi tristique senectus et netus et.</span>
                    </label><a class="close" href="#"><span class="icon s7-close"></span></a>
                  </li>
                  <li class="todo-task">
                    <label class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Sed id interdum nunc. Ut sodales dolor non ultricies mattis. </span>
                    </label><a class="close" href="#"><span class="icon s7-close"></span></a>
                  </li>
                  <li class="todo-task">
                    <label class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Pellentesque habitant morbi tristique senectus et netus et.</span>
                    </label><a class="close" href="#"><span class="icon s7-close"></span></a>
                  </li>
                  <li class="todo-task">
                    <label class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Sed id interdum nunc. Ut sodales dolor non ultricies mattis. </span>
                    </label><a class="close" href="#"><span class="icon s7-close"></span></a>
                  </li>
                  <li class="todo-task">
                    <label class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Sed id interdum nunc. Ut sodales dolor non ultricies mattis. </span>
                    </label><a class="close" href="#"><span class="icon s7-close"></span></a>
                  </li>
                  <li class="todo-task">
                    <label class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Pellentesque habitant morbi tristique senectus et netus et.</span>
                    </label><a class="close" href="#"><span class="icon s7-close"></span></a>
                  </li>
                </ul>
              </div>
              <div class="todo-new-task">
                <div class="input-group">
                  <input class="form-control" type="text" placeholder="Add a new task...">
                  <div class="input-group-append"><i class="icon s7-plus"></i></div>
                </div>
              </div>
            </div>
          </div>-->
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
                  <div id="earnings-chart" style="height: 156px;"></div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
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