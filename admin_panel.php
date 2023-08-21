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
    <title>AIS Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
</head>

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="assets/js/login-check.js" type="text/javascript"></script>

<body>
    <?php require_once("nav_header.html") ?>
    <div class="mai-wrapper">
        <?php require_once("nav_header2.html") ?>
        <div class="main-content container">
            <?php
            if (isset($_GET['aksi']) == 'delete') {
                echo '<script>console.log("delete")</script>';
                $nik = mysqli_real_escape_string($con, (strip_tags($_GET["nik"], ENT_QUOTES)));
                $delete = mysqli_query($con, "DELETE from Contact WHERE id=$nik");
                if ($delete) {
                    echo '<script type="text/javascript">',
                    'window.location.href="crm.php";',
                    '</script>';

                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, Data cannot be deleted.</div>';
                }
            }

            echo '<script>console.log("antes")</script>';
            if (isset($_POST['save'])) {
                $typeclient       = mysqli_real_escape_string($con, (strip_tags($_POST["typeclient"], ENT_QUOTES))); //Escanpando caracteres
                $first_name       = mysqli_real_escape_string($con, (strip_tags($_POST["first_name"], ENT_QUOTES))); //Escanpando caracteres
                $last_name       = mysqli_real_escape_string($con, (strip_tags($_POST["last_name"], ENT_QUOTES))); //Escanpando caracteres
                $phone_number       = mysqli_real_escape_string($con, (strip_tags($_POST["phone_number"], ENT_QUOTES))); //Escanpando caracteres
                $address       = mysqli_real_escape_string($con, (strip_tags($_POST["address"], ENT_QUOTES))); //Escanpando caracteres  
                $email       = mysqli_real_escape_string($con, (strip_tags($_POST["email"], ENT_QUOTES))); //Escanpando caracteres
                $notes       = mysqli_real_escape_string($con, (strip_tags($_POST["notes"], ENT_QUOTES))); //Escanpando caracteres
                $id       = mysqli_real_escape_string($con, (strip_tags($_POST["id"], ENT_QUOTES))); //Escanpando caracteres
                $pais       = mysqli_real_escape_string($con, (strip_tags($_POST["pais"], ENT_QUOTES))); //Escanpando caracteres
                $funcion       = mysqli_real_escape_string($con, (strip_tags($_POST["funcion"], ENT_QUOTES))); //Escanpando caracteres
                $dnipass       = mysqli_real_escape_string($con, (strip_tags($_POST["dnipass"], ENT_QUOTES))); //Escanpando caracteres
                $licencia       = mysqli_real_escape_string($con, (strip_tags($_POST["licencia"], ENT_QUOTES))); //Escanpando caracteres
                $f_nacimiento      = mysqli_real_escape_string($con, (strip_tags($_POST["f_nacimiento"], ENT_QUOTES))); //Escanpando caracteres

                if (!isset($licencia) || $licencia == "") $licencia = "licencia";
                if (!isset($funcion) || $funcion == "") $funcion = "funcion";
                if (!isset($dnipass) || $dnipass == "") $dnipass = "dni";

                // echo '<script>console.log("id: '.$id.'")</script>';
                // echo '<script>console.log("isset?: '.isset($id).'")</script>';
                // echo '<script>console.log("empty?: '.empty($id).'")</script>';

                if (!empty($id)) {
                    $sql = "update Contact set typeclient='" . $typeclient . "',first_name='" . $first_name . "',last_name='" . $last_name . "',phone_number=" . $phone_number . ",address='" . $address . "',email='" . $email . "',notes='" . $notes . "',pais='" . $pais . "',funcion=" . $funcion . ",dnipass=" . $dnipass . ",licencia=" . $licencia . ",f_nacimiento='" . $f_nacimiento . "' where id=" . $id;
                } else {
                    $sql = "insert into Contact (typeclient,first_name,last_name,phone_number,address,email,notes,pais,funcion,dnipass,licencia,f_nacimiento) Values ('" . $typeclient . "','" . $first_name . "','" . $last_name . "'," . $phone_number . ",'" . $address . "','" . $email . "','" . $notes . "','" . $pais . "'," . $funcion . "," . $dnipass . "," . $licencia . ",'" . $f_nacimiento . "')";
                }

                echo '<script>console.log("' . $sql . '")</script>';
                $update = mysqli_query($con, $sql); //or die(mysqli_error());
                echo '<script>console.log("antes de salir")</script>';
            }
            echo '<script>console.log("despues")</script>';
            ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-default card-table">
                        <div class="card-header">Lista de Usuarios
                            <!-- <div class="tools"><span class="icon s7-cloud-download"></span><span class="icon s7-edit"></span></div> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive noSwipe">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <!-- <th style="width:5%;">
                        <label class="custom-control custom-control-sm custom-checkbox">
                          <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                        </label>
                      </th> -->
                                            <th style="width:10%;">Nombre de Usuario</th>
                                            <th style="width:12%;">Dirección de Email</th>
                                            <th style="width:8%;">Rol</th>
                                            <!-- <th style="width:10%;">Email</th>
                      <th style="width:8%;">Contacto</th>
                      <th style="width:10%;"></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sqllist = "SELECT username, email, user_type FROM users";
                                        $rows = mysqli_query($con, $sqllist);
                                        if (mysqli_num_rows($rows) == 0) {
                                            echo '<script>console.log("No Users")</script>';
                                        } else {
                                            $user_type_list = array("unset", "admin", "sales", "dispatch");
                                            $user_type_formal_list = array("Sin Rol", "Administrador", "Vendedor", "Despachador");

                                            while ($row = mysqli_fetch_assoc($rows)) {
                                        ?>
                                                <tr>
                                                    <!-- <td>
                            <label class="custom-control custom-control-sm custom-checkbox">
                              <input class="custom-control-input" type="checkbox"><span class="custom-control-label"></span>
                            </label>
                          </td> -->
                                                    <td class="cell-detail">
                                                        <span><?php echo $row['username']; ?></span>
                                                    </td>
                                                    </td>
                                                    <td class="cell-detail">
                                                        <span><?php echo $row['email']; ?></span>
                                                    </td>
                                                    <td class="cell-detail">
                                                        <!-- <span><?php echo $row['user_type']; ?></span> -->
                                                        <select class="form-control custom-select" <?php if ($row["user_type"] == "admin") echo 'disabled' ?> onchange="change_user_type(this, '<?php echo $row['email']; ?>')">
                                                            <option value="<?php echo $row["user_type"]; ?>">
                                                                <?php
                                                                $index = array_search($row["user_type"], $user_type_list);
                                                                echo $user_type_formal_list[$index];
                                                                ?>
                                                            </option>
                                                            <?php
                                                            $clone_user_type_list = $user_type_list;
                                                            for ($i = 0; $i < count($clone_user_type_list); $i++) {
                                                                if ($clone_user_type_list[$i] != $row["user_type"]) {
                                                            ?>
                                                                    <option value="<?php echo $clone_user_type_list[$i]; ?>"><?php echo $user_type_formal_list[$i]; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <!-- <td class="cell-detail"><span><?php echo $row['email']; ?>
                            </span>
                          </td>
                          <td class="cell-detail"><span><?php echo $row['typeclient']; ?>
                            </span>
                          </td> -->
                                                    <!-- <td class="text-right">
                            <div class="btn-group btn-hspace">
                              <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Seleccionar<span class="icon-dropdown s7-angle-down"></span></button>
                              <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a class="dropdown-item" href="javascript:editarcontacto(<?php echo $row['id']; ?>)">Editar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="crm.php?aksi=delete&nik=<?php echo $row['id']; ?>" title="Eliminar" onclick="return confirm('Are you sure? <?php echo $row['Last_Name']; ?>')">Borrar</a>
                              </div>
                            </div>
                          </td> -->
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
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

        function change_user_type(element, credential) {
            if (element.value == "") return;

            let new_user_type = element.value;

            // do nothing if new type is same as current
            // if (localStorage.getItem("user_type") == new_user_type) return;

            // let credential = localStorage.getItem("email");

            console.log("profile_query.php?key=change_user_type&new_user_type=" + new_user_type + "&credential=" + credential)

            $.ajax({
                url: "profile_query.php?key=change_user_type&new_user_type=" + new_user_type + "&credential=" + credential, // your php file
                type: "GET", // type of the HTTP request
                success: function(data) {
                    // data = jQuery.parseJSON(data);
                    
                    // if (new_user_type == "admin") element.setAttribute("disabled", true);
                }
            });
        }
    </script>
</body>

</html>