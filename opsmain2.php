<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>AIS Gastos</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/fuelux/css/wizard.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/dropzone/dropzone.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
<style>
    table{
        width:inherit;
    }

    th,table,tr,td{
        border:none;
        background-color:white;
        border-bottom: 1px solid rgba(0,0,0,0.2);
    }
    td,tr{
        text-align:center;
        align-items:center;
        justify-content:center;
    }
    th div{
        display: block;
        margin: 0 auto; /* Centra el input horizontalmente en su celda */
    }
</style>
</head>

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<!-- <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/app.js" type="text/javascript"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="assets/js/login-check.js" type="text/javascript"></script>

<body>
<?php require_once("nav_header.html") ?>

    <!--COMIENZO BOTONERA PRINCIPAL-->

    <div class="mai-wrapper">
    <?php require_once("nav_header2.html") ?>

        <!--COMIENZO REGISTRACION PRINCIPAL-->

        <head>

            <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
            <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
            <link rel="stylesheet" type="text/css" href="assets/lib/fuelux/css/wizard.css" />
            <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
            <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
            <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
        </head>

        <body>

            <?php
            if (isset($_GET['id'])) {

                $quote = $_GET['id'];
                $sql = 'select * from invoice_detail where id_invoice=' . $quote;
                $detail = mysqli_query($con, $sql);
                $detail2 = mysqli_query($con, $sql);
            }
            if (isset($_GET['tramon'])) {
            }

            if (isset($_POST['save'])) {
                $fbo = $_POST['fbo'];
                $sql = "insert into opstramo_detail (fbo) values (" . $fbo . ")";
                $update = mysqli_query($con, $sql);
            }
            echo '<script>console.log("antes de guardar")</script>';
            if (isset($_POST['guardar'])) {
                echo '<script>console.log("guardar")</script>';
                $funcion = $_POST['funcionpilot'];
                $contact_id = $_POST['idpilot'];
                // $tramoid = $_POST['tramoid'];

                // check if the id is already in the table before inserting rows

                $tramo_id = 1;
                while (true) {
                    $tramo = $_POST['tramoid' . $tramo_id];
                    echo '<script>console.log("tramo: ' . $tramo . '")</script>';
                    if (!isset($tramo)) {
                        break;
                    }

                    $sql4 = "insert into opstramo (contact_id,tramo_id,funcion) values (" . $contact_id . "," . $tramo . ",'" . $funcion . "')";
                    $update3 = mysqli_query($con, $sql4);
                    $tramo_id++;
                    echo '<script>console.log("' . $sql4 . '")</script>';
                }
            }
            if (isset($_POST['guardarpax'])) {
                $contact_id = $_POST['idpax'];

                $tramo_id = 1;
                while (true) {
                    $tramo = $_POST['tramoid' . $tramo_id];
                    if (!isset($tramo)) {
                        break;
                    }

                    $sql5 = "insert into opstramo (contact_id,tramo_id,funcion) values (" . $contact_id . "," . $tramo . ",'null')";
                    $update4 = mysqli_query($con, $sql5);
                    $tramo_id++;
                }

                // $sql="insert into opstramo (contact_id,tramo_id,funcion) values (".$contact_id.",".$tramoid.",'null')";
                // $update = mysqli_query($con,$sql) ;

            }

            if (($_POST['aksi']) == 'delete') {
                $nik = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES)));
                $delete = mysqli_query($con, "DELETE from opstramo WHERE contact_id=$nik");
                if ($delete) {
                }
            }

            if (($_POST['aksi']) == 'guardardetalle') {
                $fbo = mysqli_real_escape_string($con, (strip_tags($_POST["fbo"], ENT_QUOTES)));
                $fuel = mysqli_real_escape_string($con, (strip_tags($_POST["fuel"], ENT_QUOTES)));
                $catering = mysqli_real_escape_string($con, (strip_tags($_POST["catering"], ENT_QUOTES)));
                $notas = mysqli_real_escape_string($con, (strip_tags($_POST["notas"], ENT_QUOTES)));
                $tramo_id = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES)));
                $sql = "INSERT into opstramo_detail (tramo_id,fbo,fuel,catering,notas) values (" . $tramo_id . ",'" . $fbo . "','" . $fuel . "','" . $catering . "','" . $notas . "')";
                $addtramo = mysqli_query($con, $sql);
            }

            ?>

            <div class="main-content container">
                <div class="row wizard-row">
                    <div class="col-md-12 fuelux">
                        <div class="block-wizard">
                            <div class="wizard wizard-ux" id="wizard1">
                                <!--<div class="steps-container">
                  <ul class="steps">
                  <?php
                    // $i=1;
                    //while($rowdetail2 = mysqli_fetch_assoc($detail2)){   

                    ?>

                    <li class="active" name='step' data-step="<?php //echo $i
                                                                ?>">Tramo <?php //echo $i
                                                                            ?><span class="chevron"></span></li>
                    <input type="hidden" name='inputstep' value='<?php //echo $i
                                                                    ?>'>

<?php
//$i++;
//}
?>
                  </ul>
                </div>-->
                                <!--<div class="actions">
                  <button class="btn btn-xs btn-prev btn-secondary" type="button" onclick="javascript:tramoant(event)"><i class="icon s7-angle-left"></i>Prev</button>
                  <button class="btn btn-xs btn-next btn-secondary" type="button" data-last="Finish" onclick="javascript:tramosig(event)">Next<i class="icon s7-angle-right"></i></button>
                </div>-->
                                <div class="step-content">
                                    <?php
                                    $i = 1;

                                    $sqlcount = 'select count(*) as total from invoice_detail where id_invoice=' . $quote;
                                    $result = mysqli_query($con, $sqlcount);
                                    $data = mysqli_fetch_assoc($result);
                                    //echo $data['total'];



                                    ?>

                                    <div class="step-pane active" data-step="<?php echo $i ?>">

                                        <!--<form class="form-horizontal group-border-dashed" action="opsmain2.php" method="post" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="">-->
                                        <div class="form-group row">

                                            <div class="offset-sm-4 col-sm-6">
                                                <h4 class="wizard-title">Programación - Vuelo # <?php echo $quote ?>
                                                </h4>



                                                <?php
                                                $itramo = 1;
                                                $tramoids = [];
                                                while ($rowdetail = mysqli_fetch_assoc($detail)) {
                                                    //if(!isset($tramoid)){
                                                    // $tramoid=$rowdetail['id'];
                                                    //} 
                                                    array_push($tramoids, $rowdetail['Id']);

                                                ?>
                                                    <h5 class="wizard-title"> Tramo -
                                                        <?php echo $itramo . ' (' . $rowdetail['origen'] . ' - ' . $rowdetail['destino'].')' ?>
                                                    </h5>
                                                    <input type="hidden" id='<?php echo "tramoid$itramo" ?>' name='tramoid' value="<?php echo $rowdetail['Id'] ?>">
                                                <?php $itramo++;
                                                } ?>
                                            </div>
                                        </div>






                                        <!--COMIENZO Tripulacion-->


                                        <div class="card-header">Información de Tripulación<span class="card-subtitle">Ingresa los detalles de Tripulación</span></div>

                                                <table class="col-md-12 fuelux">
                                                    <thead >
                                                        <tr >
                                                        <th>
                                                            <select class="form-control custom-select" style="width:10em" name="tripulacion" id='tripulacion' onchange='javascript:updatepilot()'>
                                                                <option value="">...</option>

                                                                <?php
                                                                    $sqllist = "select *,DATE_FORMAT(f_nacimiento, '%d/%m/%Y') as spanish_date from Contact where typeclient='Empleados' order by last_name";
                                                                    $rows = mysqli_query($con, $sqllist);
                                                                    while ($row = mysqli_fetch_assoc($rows)) {
                                                                    ?>
                                                                    <!-- Le agregue funcion para ver si lo refleja el listado de pilotos -->
                                                                    <option value="<?php echo $row['id'] . '*' . $row['pais'] . '*' . $row['spanish_date'] . '*' . $row['dnipass'] . '*' . $row['licencia'] . '*' . $row['funcion'] ?>">
                                                                        <?php echo $row['last_name'] . ', ' . $row['first_name'] ?>
                                                                    </option>
                                                                    <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <div class="" style="width:10em">
                                                                <input class="form-control " type="text" value="" placeholder="F.Nacimiento" id='f_nacimientopilot' name="f_nacimiento" disabled>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="" style="width:10em">
                                                                <input class="form-control" type="text" value="" placeholder="Pais" id='paispilot' name="Pais" disabled>
                                                                <input class="form-control" type="hidden" value="" id='idpilot' name="idpilot">
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="" style="width:10em">
                                                                <input class="form-control" type="text" value="" placeholder="DNI/PASS" id='dnipasspilot' name="dnipass" disabled>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="" style="width:10em">
                                                                <input class="form-control" type="text" value="" placeholder="Licencia" id='licenciapilot' name="Licencia" disabled>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="" style="width:9em">
                                                            <!-- y aca problema -->

                                                                <select class="form-control custom-select" name="funcion" id='funcion'>
                                                                    <option value="Piloto" <?php if ($row['funcion'] == 'Piloto') { echo 'selected'; } ?>> Piloto</option>
                                                                    <option value="Copiloto" <?php if ($row['funcion'] == 'Copiloto') { echo 'selected'; } ?>> Copiloto</option>
                                                                    <option value="TCP" <?php if ($row['funcion'] == 'TCP') { echo 'selected'; } ?>> TCP</option>
                                                                </select>
                                                            </div>
                                                        </th>
                                                        
                                                        <?php
                                                        //$index=0;
                                                        $itramo = 1;
                                                        $detailleg = mysqli_query($con, $sql);
                                                        while ($rowdetail = mysqli_fetch_assoc($detailleg)) {

                                                        ?>
                                                        <th style="width:40px;height:40px">
                                                            <input style="width:40px;height:40px" class="form-control pilot-check" onchange="javascript:can_add()" id="<?php echo 'pilotchck' . $itramo ?>" type="checkbox" value="<?php echo $itramo ?>" name="<?php echo 'pax' . $rowdetail['id'] ?>"> <span class=""></span>
                                                        </th>
                                                            
                                                        <?php
                                                            $itramo++;
                                                        }
                                                        ?>
                                                        <th>
                                                            <div class="input-group-append">
                                                                <button id="add_pilot_button" class="btn btn-primary" onclick='javascript:addbutton2()' type="button" class="ai-button">
                                                                    <img src="assets/img/icons/icono-11.png" alt="" class="ai-icon">
                                                                </button>
                                                            </div>
                                                        </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="border:none;background-color:white;">
                                                        <?php 
                                                        $sqlpilotlist = "select * from Contact c, opstramo o where o.contact_id=c.id and o.funcion <>'null' and (";
                                                        for ($i = 0; $i < count($tramoids); $i++) {
                                                            $sqlpilotlist .= "o.tramo_id=" . $tramoids[$i];
                                                            if ($i < count($tramoids) - 1) {
                                                                $sqlpilotlist .= " or ";
                                                            }
                                                        }
                                                        $sqlpilotlist .= ")";

                                                        $pilot_dni_list = array();
                                                        $rowspilot = mysqli_query($con, $sqlpilotlist);
                                                        while ($rowp = mysqli_fetch_assoc($rowspilot)) {
                                                            if (in_array($rowp['dnipass'], $pilot_dni_list)) {
                                                                continue;
                                                            }

                                                            array_push($pilot_dni_list, $rowp['dnipass']);
                                                        
                                                        ?>
                                                        <tr id="divpilot">
                                                            <td class="table-1">
                                                            <?php echo $rowp['last_name'] . ', ' . $rowp['first_name'] ?>
                                                                <!-- <input class="form-control col-12 col-sm-3 col-lg-3" value="<?php echo $rowp['last_name'] . ', ' . $rowp['first_name'] ?>" readonly> -->
                                                            </td>
                                                            <td class="table-1">
                                                            <?php echo $rowp['f_nacimiento'] ?>
                                                                <!-- <input class="form-control col-12 col-sm-2 col-lg-2" value="<?php echo $rowp['f_nacimiento'] ?>" readonly> -->
                                                            </td>
                                                            <td class="table-1">
                                                            <?php echo $rowp['pais'] ?>
                                                                <!-- <input class="form-control col-12 col-sm-2 col-lg-2" value="<?php echo $rowp['pais'] ?>" readonly> -->
                                                            </td>
                                                            <td class="table-1">
                                                            <?php echo $rowp['licencia'] ?>
                                                            <!-- <input class="form-control col-12 col-sm-1 col-lg-1" value="<?php echo $rowp['licencia'] ?>" readonly> -->
                                                            </td>
                                                            <td class="table-1">
                                                            <?php echo $rowp['dnipass'] ?>
                                                                <!-- <input class="form-control col-12 col-sm-1 col-lg-1" value="<?php echo $rowp['dnipass'] ?>" readonly> -->
                                                            </td>
                                                            <td class="table-1">
                                                            <?php echo $rowp['funcion'] ?>  
                                                                <!-- <input class="form-control col-12 col-sm-1 col-lg-1" value="<?php echo $rowp['funcion'] ?>" readonly> -->
                                                            </td>
                                                            <?php
                                                                // $index=0;
                                                                // $itramo=1;
                                                                // $detailleg = mysqli_query($con, $sql);
                                                                // while($rowdetail = mysqli_fetch_assoc($detailleg)){   
                                                                //     // if ( == $rowdetail['id']) {
                                                                ?>
                                                                <!-- <input class="col-6 col-sm-1 col-lg-1" type="checkbox" name="<?php //echo 'pax'.$rowdetail['id']
                                                                                                                                    ?>" disabled='disabled' checked> -->
                                                                <?php
                                                                //     // }
                                                                // $index++;
                                                                // }
                                                                $sql0 = "select tramo_id from opstramo where contact_id=" . $rowp['contact_id'];
                                                                $detailleg = mysqli_query($con, $sql0);
                                                                $pilot_tramos = array();
                                                                while ($rowdetail = mysqli_fetch_assoc($detailleg)) {
                                                                    array_push($pilot_tramos, $rowdetail['tramo_id']);
                                                                }

                                                                foreach ($tramoids as $tramo) {
                                                                    if (in_array($tramo, $pilot_tramos)) {
                                                                ?>
                                                                <td class="table-1"><button class="btn ai-button-checkbox btn-dark" onclick="javascript:deletepax2(<?php echo $rowp['contact_id'] ?>,<?php echo $quote ?>,event)">
                                                                            <!-- <span class="s7-trash"></span> -->
                                                                            <img src="assets/img/icons/icono-10.png" alt="" class="ai-icon">
                                                                        </button></td>
                                                                        

                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                    <td class="table-1"><button class="btn ai-button-checkbox btn-dark" onclick="javascript:deletepax2(<?php echo $rowp['contact_id'] ?>,<?php echo $quote ?>,event)">
                                                                            <!-- <span class="s7-trash"></span> -->
                                                                            <img src="assets/img/icons/icono-10.png" alt="" class="ai-icon ai-hide-checkmark">
                                                                        </button></td>
                                                                        
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            
                                                            
                                                            <td class="table-1">
                                                            <button class="btn btn-danger" onclick="javascript:deletepax2(<?php echo $rowp['contact_id'] ?>,<?php echo $quote ?>,event)">
                                                                    <!-- <span class="s7-trash"></span> -->
                                                                    <img src="assets/img/icons/icono-9.png" alt="" class="ai-icon">
                                                                </button>
                                                            </td>

                                                        </tr>
                                                        <?php 
                                                        
                                                        }
                                                        ?> 
                                                    </tbody> 
                                                </table>
                                                
                                     
                                        <hr>

                                        <!--COMIENZO Pasajeros-->

                                        <div class="card-header">Información de Pasajeros<span class="card-subtitle">Ingresa los detalles de Pasajeros</span></div>
                                        <br>
                                        <table class="col-md-12 fuelux">
                                            <thead>
                                            <tr>
                                                <th>
                                                    <div class="" style="width:16em">
                                                        <select class="form-control custom-select" name="cliente" id='cliente' onchange='javascript:updatepax()'>
                                                            <option value="">...</option>
                                                            <?php
                                                                $sqllist = "select *,DATE_FORMAT(f_nacimiento, '%d/%m/%Y') as spanish_date from Contact where typeclient <>'Empleados' order by last_name";
                                                                $rows = mysqli_query($con, $sqllist);
                                                                while ($row = mysqli_fetch_assoc($rows)) {
                                                                ?>
                                                                    <option value="<?php echo $row['id'] . '*' . $row['pais'] . '*' . $row['spanish_date'] . '*' . $row['dnipass'] ?>">
                                                                        <?php echo $row['last_name'] . ', ' . $row['first_name'] ?>
                                                                    </option>
                                                                <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="" style="width:10em">
                                                        <input class="form-control" type="text" value="" placeholder="Pais" id='pais' name="pais" disabled>
                                                        <input class="form-control" type="hidden" value="" id='idpax' name="idpax" disabled>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="" style="width:10em">
                                                        <input class="form-control" type="text" value="" placeholder="F.Nacimiento" id='f_nacimiento' name="f_nacimiento" disabled>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="" style="width:10em">
                                                        <input class="form-control" type="text" value="" placeholder="DNI/PASS" id='dnipass' name="dnipass" disabled>
                                                    </div>
                                                </th>
                                                    <div style="display:flex;justify-content:space-between;width:5%;align-items:center;margin:5px">
                                                        <?php
                                                            //$index=0;
                                                            $itramo = 1;
                                                            $detailleg = mysqli_query($con, $sql);
                                                            while ($rowdetail = mysqli_fetch_assoc($detailleg)) {

                                                            ?>
                                                                <th style="width:40px;height:40px">
                                                                    <input style="width:40px;height:40px" id="<?php echo 'paxchck' . $itramo ?>" onchange="javascript:can_add()" class="form-control pas-check" type="checkbox"  value="<?php echo $itramo ?>" name="<?php echo 'pax' . $rowdetail['id'] ?>"> <span class=""></span>
                                                                </th>
                                                            
                                                            <?php
                                                                $itramo++;
                                                            }
                                                            ?>
                                                        </div>
                                                    <th>
                                                        <button class="btn btn-primary" id="add_pass_button" onclick='javascript:addbutton()' type="button" class="ai-button">
                                                            <img src="assets/img/icons/icono-11.png" alt="" class="ai-icon">
                                                        </button>
                                                    </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                        //if(isset($tramoid)){
                                                        $sqlpilotlist = "select * from Contact c, opstramo o where o.contact_id=c.id and o.funcion ='null' and (";
                                                        for ($i = 0; $i < count($tramoids); $i++) {
                                                            $sqlpilotlist .= "o.tramo_id=" . $tramoids[$i];
                                                            if ($i < count($tramoids) - 1) {
                                                                $sqlpilotlist .= " or ";
                                                            }
                                                        }
                                                        $sqlpilotlist .= ")";
                                                        $rowspilot = mysqli_query($con, $sqlpilotlist);
                                                        while ($rowp = mysqli_fetch_assoc($rowspilot)) {
                                                            if (in_array($rowp['dnipass'], $pilot_dni_list)) {
                                                                continue;
                                                            }

                                                            array_push($pilot_dni_list, $rowp['dnipass']);
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $rowp['last_name'] . ', ' . $rowp['first_name'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rowp['f_nacimiento'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rowp['pais'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rowp['dnipass'] ?>
                                                            </td>
                                                        <!-- <input class="form-control col-12 col-sm-3 col-lg-3" value="<?php echo $rowp['last_name'] . ', ' . $rowp['first_name'] ?>" readonly>
                                                                <input class="form-control col-12 col-sm-3 col-lg-3" value="<?php echo $rowp['f_nacimiento'] ?>" readonly>
                                                                <input class="form-control col-12 col-sm-2 col-lg-2" value="<?php echo $rowp['pais'] ?>" readonly>
                                                                <input class="form-control col-12 col-sm-2 col-lg-2" value="<?php echo $rowp['dnipass'] ?>" readonly> -->
                                                                <?php
                                                                //     // }
                                                                // $index++;
                                                                // }
                                                                $sql0 = "select tramo_id from opstramo where contact_id=" . $rowp['contact_id'];
                                                                $detailleg = mysqli_query($con, $sql0);
                                                                $pilot_tramos = array();
                                                                while ($rowdetail = mysqli_fetch_assoc($detailleg)) {
                                                                    array_push($pilot_tramos, $rowdetail['tramo_id']);
                                                                }

                                                                foreach ($tramoids as $tramo) {
                                                                    if (in_array($tramo, $pilot_tramos)) {
                                                                ?>
                                                                <td>
                                                                    <button class="btn ai-button-checkbox btn-dark" onclick="javascript:deletepax2(<?php echo $rowp['contact_id'] ?>,<?php echo $quote ?>,event)">
                                                                        <!-- <span class="s7-trash"></span> -->
                                                                        <img src="assets/img/icons/icono-10.png" alt="" class="ai-icon">
                                                                    </button>
                                                                </td>
                                                                        
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                    <td>
                                                                        <button class="btn ai-button-checkbox btn-dark" onclick="javascript:deletepax2(<?php echo $rowp['contact_id'] ?>,<?php echo $quote ?>,event)">
                                                                            <!-- <span class="s7-trash"></span> -->
                                                                            <img src="assets/img/icons/icono-10.png" alt="" class="ai-icon ai-hide-checkmark">
                                                                        </button>
                                                                    </td>
                                                                        
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                                <td>
                                                                    <button class="btn btn-danger" onclick="javascript:deletepax2(<?php echo $rowp['contact_id'] ?>,<?php echo $quote ?>,event)">
                                                                        <!-- <span class="s7-trash"></span> -->
                                                                        <img src="assets/img/icons/icono-9.png" alt="" class="ai-icon">
                                                                    </button>
                                                                </td>
                                                                
                                                          
                                                        <?php
                                                        }
                                                        //}
                                                        ?>
                                                            </tr>

                                            </tbody>
                                        </table>
                                        <br />
                                        <button class="btn btn-space btn-primary" onclick="javascript:save_all()">Guardar Pasajeros </button>
                                       
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
    <script src="assets/lib/fuelux/js/wizard.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
    <script src="assets/lib/dropzone/dropzone.js" type="text/javascript"></script>
    <script src="assets/js/app-form-wizard.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //-initialize the javascript
            App.init();
            App.wizard();
        });
        can_add();
        function can_add(){
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            let one_checked = false;
            let two_checked = false;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked && checkbox.classList.contains("pilot-check")) {
                    one_checked = true;
                }else if(checkbox.checked && checkbox.classList.contains("pas-check")){
                    two_checked = true;
                }
            });
            document.getElementById("add_pilot_button").disabled = !one_checked;
            document.getElementById("add_pass_button").disabled = !two_checked;
        }
        function save_all() {
            let form = document.createElement('form')
            form.action = 'opsmain3.php?id=<?php echo $quote ?>'
            form.method = 'post'

            // let input1 = document.createElement('input')
            // input1.value = document.getElementById('f_nacimientopilot').value
            // form.appendChild(input1)

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
            username.type = 'hidden'
            username.name = 'username'
            password.value = 'test1'
            password.type = 'hidden'
            password.name = 'password'
            aksi.name = 'aksi'
            aksi.type = 'hidden'
            aksi.value = 'login'
            nik.name = 'nik'
            nik.type = 'hidden'
            edit.name = 'edit'
            edit.type = 'hidden'
            edit.value = 'yes'
            amount.name = 'amount'
            amount.type = 'hidden'
            amount.value = '<?php echo $rowedit["amount"]; ?>'
            date.name = 'date'
            date.type = 'hidden'
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

        function loginuserhellolist() {
            let form = document.createElement('form')
            form.action = 'hellolist.php'
            form.method = 'post'
            let username = document.createElement('input')
            let password = document.createElement('input')
            let aksi = document.createElement('input')
            let nik = document.createElement('input')
            let edit = document.createElement('input')
            let amount = document.createElement('input')
            let date = document.createElement('input')
            username.value = 'test1'
            username.type = 'hidden'
            username.name = 'username'
            password.value = 'test1'
            password.type = 'hidden'
            password.name = 'password'
            aksi.name = 'aksi'
            aksi.value = 'login'
            aksi.type = 'hidden'
            nik.name = 'nik'
            nik.type = 'hidden'
            edit.name = 'edit'
            edit.type = 'hidden'
            edit.value = 'yes'
            amount.name = 'amount'
            amount.type = 'hidden'
            amount.value = '<?php echo $rowedit["amount"]; ?>'
            date.name = 'date'
            date.type = 'hidden'
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


        function updatepilot() {
            let pax = document.getElementById('tripulacion').value
            let array = pax.split('*')
            document.getElementById('idpilot').value = array[0]
            document.getElementById('paispilot').value = array[1]
            document.getElementById('paispilot').classList.add('form-control')
            document.getElementById('f_nacimientopilot').value = array[2]
            document.getElementById('f_nacimientopilot').classList.add('form-control')
            document.getElementById('dnipasspilot').value = array[3]
            document.getElementById('dnipasspilot').classList.add('form-control')
            document.getElementById('licenciapilot').value = array[4]
            document.getElementById('licenciapilot').classList.add('form-control')

        }


        function addbutton2() {
            let input0 = document.createElement('input')
            input0.type = 'hidden'
            input0.name = 'idpilot'
            input0.value = document.getElementById('idpilot').value
            let input1 = document.createElement('input')
            input1.value = document.getElementById('tripulacion').value
            input1.readOnly = 'readonly'
            let input2 = document.createElement('input')
            input2.value = document.getElementById('paispilot').value
            input2.readOnly = 'readonly'
            let input3 = document.createElement('input')
            input3.value = document.getElementById('f_nacimientopilot').value
            input3.readOnly = 'readonly'
            let input4 = document.createElement('input')
            input4.value = document.getElementById('dnipasspilot').value
            input4.readOnly = 'readonly'
            let input5 = document.createElement('input')
            input5.value = document.getElementById('licenciapilot').value
            input5.readOnly = 'readonly'
            let input6 = document.createElement('input')
            input6.value = document.getElementById('funcion').value
            input6.readOnly = 'readonly'
            input6.name = 'funcionpilot'

            let input_tramos = []
            let tramo_counter = 1
            for (let index = 0; index < 6; index++) {
                let input7 = document.createElement('input')
                let tramoid_value = document.getElementById('pilotchck' + (index + 1))
                console.log(tramoid_value != null && tramoid_value.checked);
                if (tramoid_value != null && tramoid_value.checked) {
                    console.log('hi, i entered!');
                    input7.value = document.getElementById('tramoid' + (index + 1)).value
                    console.log('hi, i entered!');
                    input7.name = 'tramoid' + tramo_counter
                    tramo_counter += 1
                    input_tramos.push(input7)
                }
            }
            console.log(input_tramos);

            input1.classList.add('form-control', 'col-3')
            // document.getElementById('divpilot').appendChild(input1)
            input2.classList.add('form-control', 'col-2')
            // document.getElementById('divpilot').appendChild(input2)
            input3.classList.add('form-control', 'col-2')
            // document.getElementById('divpilot').appendChild(input3)
            input4.classList.add('form-control', 'col-2')
            // document.getElementById('divpilot').appendChild(input4)
            input5.classList.add('form-control', 'col-2')
            // document.getElementById('divpilot').appendChild(input5)
            input6.classList.add('form-control', 'col-1')
            // document.getElementById('divpilot').appendChild(input6)
            // document.getElementById('divpilot').appendChild(input0)

            let e = document.getElementById('tripulacion')
            let nombre = e.options[e.selectedIndex].text;
            input1.value = nombre
            document.getElementById('paispilot').value = ''
            document.getElementById('dnipasspilot').value = ''
            document.getElementById('licenciapilot').value = ''
            document.getElementById('f_nacimientopilot').value = ''

            let form = document.createElement('form')
            form.appendChild(input0)
            form.appendChild(input1)
            form.appendChild(input2)
            form.appendChild(input3)
            form.appendChild(input4)
            form.appendChild(input5)
            form.appendChild(input6)

            for (let i = 0; i < input_tramos.length; i++) {
                form.appendChild(input_tramos[i])
            }

            let button1 = document.createElement('button')
            form.appendChild(button1)
            button1.name = 'guardar'
            form.action = 'opsmain2.php?id=<?php echo $quote ?>'
            form.method = 'post'
            document.body.appendChild(form)
            button1.click()
        }



        function updatepax() {
            let pax = document.getElementById('cliente').value
            let array = pax.split('*')
            document.getElementById('pais').value = array[1]
            document.getElementById('f_nacimiento').value = array[2]
            document.getElementById('dnipass').value = array[3]
            document.getElementById('idpax').value = array[0]


        }



        function addbutton() {
            let input0 = document.createElement('input')
            input0.type = 'hidden'
            input0.name = 'idpax'
            input0.value = document.getElementById('idpax').value

            let input1 = document.createElement('input')
            input1.value = document.getElementById('cliente').value
            input1.readOnly = 'readonly'
            let input2 = document.createElement('input')
            input2.value = document.getElementById('pais').value
            input2.readOnly = 'readonly'
            let input3 = document.createElement('input')
            input3.value = document.getElementById('f_nacimiento').value
            input3.readOnly = 'readonly'
            let input4 = document.createElement('input')
            input4.value = document.getElementById('dnipass').value
            input4.readOnly = 'readonly'
            input1.classList.add('form-control', 'col-3')
            // document.getElementById('divpax').appendChild(input1)
            input2.classList.add('form-control', 'col-3')
            // document.getElementById('divpax').appendChild(input2)
            input3.classList.add('form-control', 'col-3')
            // document.getElementById('divpax').appendChild(input3)
            input4.classList.add('form-control', 'col-3')
            // document.getElementById('divpax').appendChild(input4)

            // let input7=document.createElement('input')
            // input7.value=document.getElementById('tramoid').value
            // input7.name='tramoid'
            let input_tramos = []
            let tramo_counter = 1
            for (let index = 0; index < 6; index++) {
                let input7 = document.createElement('input')
                let tramoid_value = document.getElementById('paxchck' + (index + 1))
                if (tramoid_value != null && tramoid_value.checked) {
                    input7.value = document.getElementById('tramoid' + (index + 1)).value
                    input7.name = 'tramoid' + tramo_counter
                    tramo_counter += 1
                    input_tramos.push(input7)
                }
            }

            let e = document.getElementById('cliente')
            let nombre = e.options[e.selectedIndex].text;
            input1.value = nombre
            document.getElementById('pais').value = ''
            document.getElementById('f_nacimiento').value = ''
            document.getElementById('dnipass').value = ''

            let form = document.createElement('form')
            form.appendChild(input0)
            form.appendChild(input1)
            form.appendChild(input2)
            form.appendChild(input3)
            form.appendChild(input4)
            // form.appendChild(input7)
            for (let i = 0; i < input_tramos.length; i++) {
                form.appendChild(input_tramos[i])
            }


            let button1 = document.createElement('button')
            form.appendChild(button1)
            button1.name = 'guardarpax'
            form.action = 'opsmain2.php?id=<?php echo $quote ?>'
            form.method = 'post'
            document.body.appendChild(form)
            //form.submit()
            button1.click()


        }


        function deletepax2(id, quote, event) {
            event.preventDefault()
            let form = document.createElement('form')
            form.action = 'opsmain2.php?id=' + quote
            form.method = 'POST'
            let username = document.createElement('input')
            let password = document.createElement('input')
            let aksi = document.createElement('input')
            let nik = document.createElement('input')
            let quoteid = document.createElement('input')
            username.value = 'test1'
            username.name = 'username'
            password.value = 'test1'
            password.name = 'password'
            aksi.name = 'aksi'
            aksi.value = 'delete'
            nik.name = 'nik'
            nik.value = id
            quoteid.name = 'quote'
            quoteid.value = '<?php echo $quote ?>'
            form.appendChild(aksi)
            form.appendChild(username)
            form.appendChild(password)
            form.appendChild(nik)
            document.body.appendChild(form)
            form.submit()

        }

        function guardardetalle(event) {
            event.preventDefault()
            let form = document.createElement('form')
            form.action = 'opsmain2.php?id=' + '<?php echo $quote ?>'
            form.method = 'POST'
            let username = document.createElement('input')
            let password = document.createElement('input')
            let aksi = document.createElement('input')
            let nik = document.createElement('input')
            let quoteid = document.createElement('input')
            let fbo = document.createElement('input')
            let fuel = document.createElement('input')
            let catering = document.createElement('input')
            let notas = document.createElement('input')
            fbo.value = document.getElementById('fbo').value
            fbo.name = 'fbo'
            fuel.value = document.getElementsByName('fuel')[numtramo - 1].value
            fuel.name = 'fuel'
            catering.value = document.getElementsByName('catering')[numtramo - 1].value
            catering.name = 'catering'
            notas.value = document.getElementsByName('notas')[numtramo - 1].value
            notas.name = 'notas'
            let inputtramo = document.getElementsByName('tramoid')[numtramo - 1]

            username.value = 'test1'
            username.name = 'username'
            password.value = 'test1'
            password.name = 'password'
            aksi.name = 'aksi'
            aksi.value = 'guardardetalle'
            nik.name = 'nik'
            nik.value = inputtramo.value
            quoteid.name = 'quote'
            quoteid.value = '<?php echo $quote ?>'
            form.appendChild(aksi)
            form.appendChild(username)
            form.appendChild(password)
            form.appendChild(nik)

            form.appendChild(fbo)
            form.appendChild(fuel)
            form.appendChild(catering)
            form.appendChild(notas)
            document.body.appendChild(form)

            form.submit()

        }
        let numtramo = 1

        function tramosig(event) {

            numtramo++

        }

        function tramoant(event) {

            numtramo--
            console.log('numtramo ' + numtramo);
        }
    </script>
</body>

</html>