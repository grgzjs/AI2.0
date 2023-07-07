<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <title>AIS Profile</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
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
                  <li class="nav-item"><a class="nav-link" href="javascript:loginuser()"><span class="icon s7-science"></span><span class="name">Cotizador</span></a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="hellolist.php"><span class="icon s7-albums"></span><span class="name">Lista de Cotizaciones</span></a>
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
                  <li class="nav-item dropdown parent"><a class="nav-link" href="crmemail.php" data-toggle="dropdown"><span class="icon s7-mail"></span><span class="name">Mail</span></a>
                    <div class="dropdown-menu mai-sub-nav" role="menu"><a class="dropdown-item active" href="crmemail.php">Inbox</a><a class="dropdown-item" href="crmemail.php">Detail</a><a class="dropdown-item" href="crmemail.php">Compose</a>
                    </div>
                  </li>

                </ul>
              </li>

              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-portfolio"></span><span>Operaciones</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="opsmain.php"><span class="icon s7-diamond"></span><span class="name">Lista de Vuelos</span></a>
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
              <li class="nav-item parent"><a class="nav-link" href="#" role="button" aria-expanded="false"><span class="icon s7-display1"></span><span>Admin</span></a>
                <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                  <li class="nav-item"><a class="nav-link" href="charts-flot.html"><span class="icon s7-box2"></span><span class="name">Reporte General</span></a>
                  </li>
                </ul>


            </ul>

            </ul>
          </div>
        </nav>
        <!--<div class="search">
            <input type="text" placeholder="Search..." name="q"><span class="s7-search"></span>
          </div>-->
      </div>
    </nav>
    <div class="main-content container">
      <div class="user-profile">
        <div class="row">
          <div class="col-md-12">
            <div class="user-display">
              <div class="user-display-cover"><img src="assets/img/cover.jpg" alt="cover"></div>
              <div class="user-display-bottom">
                <div class="user-display-id"><img class="user-display-avatar" src="assets/img/avatars/img3.jpg" alt="avatar">
                  <div class="user-display-name">Justin Adams</div>
                </div>
                <div class="user-display-stats">
                  <div class="user-display-stat"><span class="user-display-stat-counter">26</span><span class="user-display-stat-title">Issues</span></div>
                  <div class="user-display-stat"><span class="user-display-stat-counter">165</span><span class="user-display-stat-title">Commits</span></div>
                  <div class="user-display-stat"><span class="user-display-stat-counter">43</span><span class="user-display-stat-title">Followers</span></div>
                  <div class="user-display-stat"><span class="user-display-stat-counter">157</span><span class="user-display-stat-title">Following</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="user-info-list card card-default">
              <div class="card-header card-header-divider">About Me</div>
              <div class="card-body">
                <table class="no-border no-strip skills">
                  <tbody class="no-border-x no-border-y">
                    <tr>
                      <td class="icon"><span class="icon s7-portfolio"></span></td>
                      <td class="item">Ocupation</td>
                      <td><input type="text" name="occupation" placeholder="Enter your occupation"></td>
                    </tr>
                    <tr>
                      <td class="icon"><span class="icon s7-gift"></span></td>
                      <td class="item">Birthday</td>
                      <td><input type="date" name="birthday"></td>
                    </tr>
                    <tr>
                      <td class="icon"><span class="icon s7-phone"></span></td>
                      <td class="item">Mobile</td>
                      <td><input type="tel" name="mobile" placeholder="Enter your mobile number"></td>
                    </tr>
                    <tr>
                      <td class="icon"><span class="icon s7-global"></span></td>
                      <td class="item">Website</td>
                      <td><input type="url" name="website" placeholder="Enter your website URL"></td>
                    </tr>
                    <tr>
                      <td class="icon"><span class="icon s7-map-marker"></span></td>
                      <td class="item">Location</td>
                      <td><textarea name="location" placeholder="Enter your location"></textarea></td>
                    </tr>
                  </tbody>
                </table>

              </div>
              <div class="card-header card-header-divider">Elsewhere</div>
              <div class="card-body">
                <table class="no-border no-strip social">
                  <tbody class="no-border-x no-border-y">
                    <tr>
                      <td class="icon"><span class="fa fa-facebook"></span></td>
                      <td class="item"><a href="#">Facebook</a></td>
                    </tr>
                    <tr>
                      <td class="icon"><span class="fa fa-twitter"></span></td>
                      <td class="item"> <a href="#">Twitter</a></td>
                    </tr>
                    <tr>
                      <td class="icon"><span class="fa fa-dribbble"></span></td>
                      <td class="item"> <a href="#">Dribble</a></td>
                    </tr>
                    <tr>
                      <td class="icon"><span class="fa fa-github"></span></td>
                      <td class="item"> <a href="#">Github</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
          <div class="col-md-8">
            <div class="widget widget-fullwidth user-develop-chart">
              <div class="widget-head">
                <div class="tools"><span class="icon s7-cloud-download"></span><span class="icon s7-refresh-2"></span></div><span class="title">Development Activity</span>
              </div>
              <div class="widget-chart-container">
                <div class="legend-container" id="develop-chart-legend"></div>
                <div id="develop-chart" style="height: 180px;"></div>
                <div class="chart-table pt-3">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:37%;">User</th>
                        <th style="width:36%;">Commit</th>
                        <th>Date</th>
                        <th class="actions"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="user-avatar"> <img src="assets/img/avatars/img1.jpg" alt="Avatar">Ryan Lawrence</td>
                        <td>Initial commit</td>
                        <td>May 6, 2016</td>
                        <td class="actions"><a class="icon" href="#"><i class="s7-trash"></i></a></td>
                      </tr>
                      <tr>
                        <td class="user-avatar"> <img src="assets/img/avatars/img2.jpg" alt="Avatar">Benji Miller</td>
                        <td>Main structure</td>
                        <td>April 22, 2016</td>
                        <td class="actions"><a class="icon" href="#"><i class="s7-trash"></i></a></td>
                      </tr>
                      <tr>
                        <td class="user-avatar"> <img src="assets/img/avatars/img3.jpg" alt="Avatar">Justine Adams</td>
                        <td>Left sidebar adjusments</td>
                        <td>April 15, 2016</td>
                        <td class="actions"><a class="icon" href="#"><i class="s7-trash"></i></a></td>
                      </tr>
                      <tr>
                        <td class="user-avatar"> <img src="assets/img/avatars/img4.jpg" alt="Avatar">Brett Harris</td>
                        <td>Topbar dropdown style</td>
                        <td>April 8, 2016</td>
                        <td class="actions"><a class="icon" href="#"><i class="s7-trash"></i></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="widget widget-calendar">
              <div class="cal-container">
                <div class="cal-calendar">
                  <div class="ui-datepicker"></div><a class="add-note" href="#"><span class="icon s7-plus"></span>Add a new note</a>
                </div>
                <div class="cal-notes"><span class="day">Thursday</span><span class="date">September 24</span><span class="title">Notes</span>
                  <ul>
                    <li><span class="hour">12h</span><span class="event-name">Meeting with investors</span></li>
                    <li><span class="hour">8h</span><span class="event-name">Dentist date</span></li>
                    <li><span class="hour">1h</span><span class="event-name">Lunch with Julie</span></li>
                    <li><span class="hour">11h</span><span class="event-name">Prepare report</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <ul class="timeline">
              <li class="timeline-item">
                <div class="timeline-date"><span>Sep 16, 2018</span></div>
                <div class="timeline-content">
                  <div class="timeline-avatar"><img class="circle" src="assets/img/avatars/img1.jpg" alt="Avatar"></div>
                  <div class="timeline-header"><span class="timeline-time">4:34 PM</span><span class="timeline-autor">Ryan Lawrence</span>
                    <p class="timeline-activity">Pellentesque imperdiet sit <a href="#">Amet nisl sed mattis</a>.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-item timeline-item-detailed">
                <div class="timeline-date"><span>Sep 13, 2018</span></div>
                <div class="timeline-content">
                  <div class="timeline-avatar"><img class="circle" src="assets/img/avatars/img2.jpg" alt="Avatar"></div>
                  <div class="timeline-header"><span class="timeline-time">9:54 AM</span><span class="timeline-autor">Benji Miller </span>
                    <p class="timeline-activity">Mauris condimentum est <a href="#">Viverra erat fermentum</a>.</p>
                    <div class="timeline-summary">
                      <p>Suspendisse ac libero sed mauris tempor vehicula porttitor non sapien. Aliquam viver...</p>
                    </div>
                  </div>
                </div>
              </li>
              <li class="timeline-item timeline-item-detailed timeline-item-gallery">
                <div class="timeline-date"><span>Aug 23, 2018</span></div>
                <div class="timeline-content">
                  <div class="timeline-avatar"><img class="circle" src="assets/img/avatars/img3.jpg" alt="Avatar"></div>
                  <div class="timeline-header"><span class="timeline-time">10:42 AM</span><span class="timeline-autor">Justin Adams </span>
                    <p class="timeline-activity">pellentesque tortor <a href="#">enim</a>.</p>
                    <div class="timeline-gallery"><img class="gallery-thumbnail" src="assets/img/gallery/img2.jpg" alt="Thumbnail"><img class="gallery-thumbnail" src="assets/img/gallery/img4.jpg" alt="Thumbnail"><img class="gallery-thumbnail" src="assets/img/gallery/img11.jpg" alt="Thumbnail"></div>
                  </div>
                </div>
              </li>
              <li class="timeline-item timeline-item-detailed">
                <div class="timeline-date"><span>Aug 6, 2018</span></div>
                <div class="timeline-content">
                  <div class="timeline-avatar"><img class="circle" src="assets/img/avatars/img4.jpg" alt="Avatar"></div>
                  <div class="timeline-header"><span class="timeline-time">7:15 PM</span><span class="timeline-autor">Brett Harris</span>
                    <p class="timeline-activity">Mauris condimentum est <a href="#">Vestibulum justo neque</a>.</p>
                    <div class="timeline-summary">
                      <p>Quisque condimentum enim nec porttitor egestas. Morbi fermentum in ante volutpat...</p>
                    </div>
                  </div>
                </div>
              </li>
              <li class="timeline-item">
                <div class="timeline-date"><span>Jun 11, 2018</span></div>
                <div class="timeline-content">
                  <div class="timeline-avatar"><img class="circle" src="assets/img/avatar.jpg" alt="Avatar"></div>
                  <div class="timeline-header"><span class="timeline-time">6:25 AM</span><span class="timeline-autor">Sherwood Clifford </span>
                    <p class="timeline-activity">pellentesque tortor <a href="#">Aliquam viverra</a>.</p>
                    <blockquote class="timeline-blockquote">
                      <p>Quisque condimentum enim nec porttitor egestas. </p>
                      <footer>Aliquam viverra ornare dolor.</footer>
                    </blockquote>
                  </div>
                </div>
              </li>
              <li class="timeline-item timeline-loadmore"><a class="btn btn-sm btn-secondary load-more-btn" href="#">Load more</a></li>
            </ul>
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
    <script src="assets/lib/countdown/jquery.countdown.min.js" type="text/javascript"></script>
    <script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/js/app-pages-profile.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        //-initialize the javascript
        App.init();
        App.profile();
      });
    </script>
</body>

</html>