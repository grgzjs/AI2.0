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

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<!-- <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/app.js" type="text/javascript"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="assets/js/login-check.js" type="text/javascript"></script>

<body>
  <?php require_once("nav_header.html") ?>
  <div class="mai-wrapper">
    <?php require_once("nav_header2.html") ?>

    <style>
      .transparent-button {
        background-color: transparent;
        background-repeat: no-repeat;

        border: none;
        cursor: pointer;
        overflow: hidden;
        outline: none;
      }

      .transparent-button:focus {
        border: none;
        outline: none;
      }

      .user-image {
        display: block;
        width: 100%;
        height: auto;
      }

      .transparent-button:hover .image-overlay {
        opacity: .8;
      }

      .image-overlay {
        position: absolute;
        top: 0;
        /*  bottom: 0; */
        /* left: 0; */
        /* right: 0; */

        width: 180px;
        height: 180px;
        margin-bottom: 0.769231rem;

        opacity: 0;
        transition: .5s ease;
        background-color: black;
      }

      .overlay-text {
        color: white;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
      }
    </style>

    <div class="main-content container">
      <div class="user-profile">
        <div class="row">
          <div class="col-md-12">
            <div class="user-display">
              <div class="user-display-cover"><img src="assets/img/cover.jpg" alt="cover"></div>
              <div class="user-display-bottom" style="padding-bottom: 10%">
                <div class="user-display-id">
                  <button class="transparent-button" onclick="change_user_image()">
                    <img class="user-display-avatar" src="assets/img/avatars/no_user.jpg" alt="avatar" id="user-image">
                    <div class="user-display-avatar image-overlay">
                      <div class="overlay-text">Cambiar</div>
                    </div>
                  </button>
                  <div class="user-display-name" style="text-align: center"><?php echo "Username" ?></div>
                </div>
                <!-- <div class="user-display-stats">
                  <div class="user-display-stat"><span class="user-display-stat-counter">26</span><span class="user-display-stat-title">Issues</span></div>
                  <div class="user-display-stat"><span class="user-display-stat-counter">165</span><span class="user-display-stat-title">Commits</span></div>
                  <div class="user-display-stat"><span class="user-display-stat-counter">43</span><span class="user-display-stat-title">Followers</span></div>
                  <div class="user-display-stat"><span class="user-display-stat-counter">157</span><span class="user-display-stat-title">Following</span></div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="user-info-list card card-default">
              <div class="card-header card-header-divider">Datos de Usuario</div>
              <div class="card-body">
                <table class="no-border no-strip skills">
                  <tbody class="no-border-x no-border-y">
                    <tr>
                      <td class="item" style="text-align: left">Usuario</td>
                      <td style="text-align: right"><input class="form-control" type="text" placeholder="Ingrese nuevo Usuario" disabled></td>
                      <!-- <td><a class="btn btn-success btn-lg" style="text-align: right"><span class="glyphicon glyphicon-pencil"></span></a></td> -->
                    </tr>
                    <tr>
                      <td class="item" style="text-align: left">Email</td>
                      <td style="text-align: right"><input class="form-control" type="text" placeholder="Ingrese nuevo Email" disabled></td>
                    </tr>
                    <!-- <tr>
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
                    </tr> -->
                  </tbody>
                </table>

              </div>
              <div class="card-header card-header-divider">Redes Sociales</div>
              <div class="card-body">
                <table class="no-border no-strip social">
                  <tbody class="no-border-x no-border-y">
                    <tr>
                      <td class="icon"><a class="fa fa-facebook" href="#" style="background-color: white; margin-left: -8px; padding: 5px;"></a></td>
                      <td><input class="form-control" style="margin-left: -10px; width: 103%;" type="text" placeholder="Nuevo link de Facebook" disabled></td>
                    </tr>
                    <tr>
                      <td class="icon"><a class="fa fa-twitter" href="#" style="background-color: white; margin-left: -8px; padding: 5px;"></a></td>
                      <td><input class="form-control" style="margin-left: -10px; width: 103%;" type="text" placeholder="Nuevo link de Twitter" disabled></td>
                    </tr>
                    <tr>
                      <td class="icon"><a class="fa fa-dribbble" href="#" style="background-color: white; margin-left: -8px; padding: 5px;"></a></td>
                      <td><input class="form-control" style="margin-left: -10px; width: 103%;" type="text" placeholder="Nuevo link de Dribble" disabled></td>
                    </tr>
                    <tr>
                      <td class="icon"><a class="fa fa-github" href="#" style="background-color: white; margin-left: -8px; padding: 5px;"></a></td>
                      <td><input class="form-control" style="margin-left: -10px; width: 103%;" type="text" placeholder="Nuevo link de Github" disabled></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!--<div class="col-md-8">
             <div class="user-info-list card card-default">
              <div class="card-header card-header-divider">Configuración de Operador</div>
              <div class="card-body">
                <table class="no-border no-strip skills">
                  <tbody class="no-border-x no-border-y">
                    <tr>
                      <td class="item" style="text-align: center">Tipo de Operador</td>
                      <td style="text-align: center">
                        <select class="form-control custom-select" name="tipo-admin" id="tipo-admin" onchange="change_admin_type(this)">
                          <option value="None">...</option>
                          <option value="Administrador">Administrador</option>
                          <option value="Ventas">Ventas</option>
                          <option value="Despachador">Despachador</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td class="item" style="text-align: center">Moneda Local</td>
                      <td style="text-align: center">
                        <select class="form-control custom-select" name="moneda-local" id="moneda-local" onchange="change_currency(this)">
                          <option value="None">...</option>
                          <option value="USD">USD</option>
                          <option value="ARS">ARS</option>
                          <option value="MXN">MXN</option>
                          <option value="EUR">EUR</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td class="item" style="text-align: center">Tipo de Cotizacion</td>
                      <td style="text-align: center">
                        <select class="form-control custom-select" name="tipo-cotizacion" id="tipo-cotizacion" onchange="change_quotation_type(this)">
                          <option value="None">...</option>
                          <option value="Hora">Cotización por Hora</option>
                          <option value="KM">Cotización por KM</option>
                        </select>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div> -->
          <!-- <div class="card-header card-header-divider">Elsewhere</div>
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
          </div>-->
          <!-- <div class="col-md-8">
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
          </div> -->
        </div>
        <!-- <div class="row">
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
        </div> -->
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
    <script>
      function change_user_image() {
        console.log("Ask for image and validate");
      }

      function change_admin_type(element) {
        let new_user_type = "";
        switch (element.value) {
          case "Administrador":
            new_user_type = "admin";
            break;
          case "Ventas":
            new_user_type = "sales";
            break;
          case "Despachador":
            new_user_type = "dispatch";
            break;
          default:
            return
            break;
        }

        // do nothing if new type is same as current
        if (localStorage.getItem("user_type") == new_user_type) return;

        let credential = localStorage.getItem("email");

        console.log("profile_query.php?key=change_user_type&new_user_type=" + new_user_type + "&credential=" + credential)

        $.ajax({
          url: "profile_query.php?key=change_user_type&new_user_type=" + new_user_type + "&credential=" + credential, // your php file
          type: "GET", // type of the HTTP request
          success: function(data) {
            data = jQuery.parseJSON(data);

            // console.log(data);

            console.log("Admin type changed to " + element.value);
            localStorage.setItem("user_type", new_user_type)

            check_tabs(true);
          }
        });
      }

      function change_currency(element) {
        console.log("Currency changed to " + element.value);
      }

      function change_quotation_type(element) {
        console.log("Quotation type changed to " + element.value);
      }
    </script>
</body>

</html>