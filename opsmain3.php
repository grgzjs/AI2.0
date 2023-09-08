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
    <title>AIS Gastos</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/fuelux/css/wizard.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/dropzone/dropzone.css" />
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

        <!--COMIENZO REGISTRACION PRINCIPAL-->

        <!-- <head>

            <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css" />
            <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
            <link rel="stylesheet" type="text/css" href="assets/lib/fuelux/css/wizard.css" />
            <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
            <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css" />
            <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
        </head> -->

        <body>

            <?php
            if (isset($_GET['id'])) {

                $quote = $_GET['id'];
                $sql = 'select * from invoice_detail where id_invoice=' . $quote;
                $detail = mysqli_query($con, $sql);
                $detail2 = mysqli_query($con, $sql);
            }



            /*if(isset($_POST['guardar'])){
  $funcion=$_POST['funcionpilot'];
  $contact_id=$_POST['idpilot'];
  $tramoid=$_POST['tramoid'];

  $sql='select * from invoice_detail where id_invoice='.$quote;
  $detailtramo = mysqli_query($con, $sql);

  while($rowdetailtramo = mysqli_fetch_assoc($detailtramo)){   //hasta aca el bucle para guardar los tramos
    $sql="insert into opstramo (contact_id,tramo_id,funcion) values (".$contact_id.",".$rowdetailtramo['id'].",'".$funcion."')";
    $update = mysqli_query($con,$sql) ;
  }
  


}*/
            if (isset($_POST['guardarpax'])) {
                $contact_id = $_POST['idpax'];
                $tramoid = $_POST['tramoid'];

                $sql = "insert into opstramo (contact_id,tramo_id,funcion) values (" . $contact_id . "," . $tramoid . ",'null')";
                $update = mysqli_query($con, $sql);
            }

            if (($_POST['aksi']) == 'delete') {
                $nik = mysqli_real_escape_string($con, (strip_tags($_POST["nik"], ENT_QUOTES)));
                $delete = mysqli_query($con, "DELETE from opstramo WHERE id=$nik");
                if ($delete) {
                }
            }

            if ($_POST['aksi'] == 'guardardetalle') {
                $sql_tramos = 'select Id from invoice_detail where id_invoice=' . $quote;
                $id_tramos = mysqli_query($con, $sql_tramos);
                $tramos_id = array();
                while ($row_tramo_id = mysqli_fetch_assoc($id_tramos)) {
                    array_push($tramos_id, $row_tramo_id["Id"]);
                }

                // echo "<script>console.log('guardar detalle')</script>";
                for ($i = 1; $i <= 6; $i++) {
                    if (!isset($_POST["fbo" . $i])) {
                        break;
                    }
                    $fbo = $_POST["fbo" . $i];
                    $fuel = $_POST["fuel" . $i];
                    $catering = $_POST["catering" . $i];
                    $notas = $_POST["notas" . $i];
                    $tramo = $id_tramos[$i - 1];

                    $sql_add_tramo_detail = "INSERT into opstramo_detail (tramo_id,fbo,fuel,catering,notas) values (" . $tramo . ",'" . $fbo . "','" . $fuel . "','" . $catering . "','" . $notas . "')";
                    $add_tramo_detail = mysqli_query($con, $sql_add_tramo_detail);
                }
                // echo "<script>console.log('inserted details')</script>";
                // header("Location: http://grupogustoso.com/opsmain.php");
                echo "<script>window.location.href='opsmain.php';</script>";
            }

            ?>

            <div class="main-content container">
                <div class="row wizard-row">
                    <div class="col-md-12 fuelux">
                        <div class="block-wizard">
                            <div class="wizard wizard-ux" id="wizard1">
                                <!-- <div class="steps-container">
                  <ul class="steps">
                  <?php
                    // $i=1;
                    // while($rowdetail2 = mysqli_fetch_assoc($detail2)){   

                    ?>

                    <li class="active" name='step' data-step="<?php //echo $i
                                                                ?>">Tramo <?php //echo $i
                                                                            ?><span class="chevron"></span></li>
                    <input type="hidden" name='inputstep' value='<?php //echo $i
                                                                    ?>'>

<?php
// $i++;
// }
?>
                  </ul>
                </div> -->
                                <!-- <div class="actions">
                  <button class="btn btn-xs btn-prev btn-secondary" type="button" onclick="javascript:tramoant(event)"><i class="icon s7-angle-left"></i>Prev</button>
                  <button class="btn btn-xs btn-next btn-secondary" type="button" data-last="Finish" onclick="javascript:tramosig(event)">Next<i class="icon s7-angle-right"></i></button>
                </div> -->
                                <div class="step-content">
                                    <?php
                                    $i = 1;

                                    $sqlcount = 'select count(*) as total from invoice_detail where id_invoice=' . $quote;
                                    $result = mysqli_query($con, $sqlcount);
                                    $data = mysqli_fetch_assoc($result);
                                    // $i=1;

                                    // $sqlcount='select count(*) as total from invoice_detail where id_invoice='.$quote;
                                    // $result=mysqli_query($con, $sqlcount);
                                    // $data=mysqli_fetch_assoc($result);
                                    //echo $data['total'];


                                    // while($rowdetail = mysqli_fetch_assoc($detail)){   
                                    //   if(!isset($tramoid)){
                                    //     $tramoid=$rowdetail['id'];
                                    //   } 
                                    ?>

                                    <div class="step-pane active" data-step="<?php echo $i ?>">

                                        <form action="pdfTripSheet.php" method="post" class="form-horizontal group-border-dashed"> <!-- data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="" -->
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-6">
                                                    <h4 class="wizard-title">Programación - Vuelo # <?php echo $quote ?></h4>
                                                    <?php
                                                    $itramo = 1;
                                                    $tramoids = [];
                                                    while ($rowdetail = mysqli_fetch_assoc($detail)) {
                                                        //if(!isset($tramoid)){
                                                        // $tramoid=$rowdetail['id'];
                                                        //} 
                                                        array_push($tramoids, $rowdetail['origen'] . ' - ' . $rowdetail['destino'])

                                                    ?>
                                                        <h5 class="wizard-title"> Tramo -
                                                            <?php echo $itramo . ' (' . $rowdetail['origen'] . ' - ' . $rowdetail['destino'] . ')' ?>
                                                        </h5>
                                                        <input type="hidden" id='<?php echo "tramoid$itramo" ?>' name='tramoid' value="<?php echo $rowdetail['id'] ?>"> <?php $itramo++;
                                                                                                                                                                    } ?>
                                                </div>
                                            </div>


                                            <br>
                                            <!--COMIENZO tramo info-->

                                            <?php
                                            for ($i = 0; $i < count($tramoids); $i++) {
                                            ?>

                                                <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>

                                                <div class="card-header">
                                                    Tramo <?php echo $tramoids[$i]; ?>
                                                    <span class="card-subtitle">Ingresa los detalles del Tramo</span>
                                                </div>

                                                <label class="col-12 col-sm-1 col-form-label text-sm-right"></label>

                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">FBO</label>
                                                    <div class="col-12 col-sm-8 col-lg-6">
                                                        <input required class="form-control" type="Text" placeholder="Ingrese el FBO" name="fbo<?php echo ($i + 1) ?>" id="fbo<?php echo ($i + 1) ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Fuel</label>
                                                    <div class="col-12 col-sm-8 col-lg-6">
                                                        <input required class="form-control" type="Text" placeholder="información de Combustible" name="fuel<?php echo ($i + 1) ?>" id="fuel<?php echo ($i + 1) ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Catering</label>
                                                    <div class="col-12 col-sm-8 col-lg-6">
                                                        <input required class="form-control" type="Text" placeholder="Ingrese el Comisariato " name="catering<?php echo ($i + 1) ?>" id="catering<?php echo ($i + 1) ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-3 col-form-label text-left text-sm-right">Notas
                                                        Especiales</label>
                                                    <div class="col-12 col-sm-8 col-lg-6">
                                                        <input required class="form-control" type="Text" placeholder="Ingrese Notas " name="notas<?php echo ($i + 1) ?>" id="notas<?php echo ($i + 1) ?>">
                                                    </div>
                                                </div>

                                            <?php
                                            }
                                            ?>

                                            <div class="form-group row pt-3" style="display:flex;justify-content:center">
                                                <div>
                                                    <!-- <input type="hidden" value="<?php //echo $quote; ?>" name="id"> -->
                                                    <button class="btn btn-primary btn-space wizard-next" value="save" onclick="javascript:guardardetalle(event)">Guardar Detalles</button>
                                                    <!-- <input class="btn btn-primary btn-space wizard-next" name="aksi" value="Guardar Detalles" type="submit"></input> -->
                                                    <!-- <button class="btn btn-primary btn-space wizard-next" value="save" onclick="javascript:seepdf(event)">Ver Detalles</button> -->
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                    <?php
                                    // $i++;
                                    // }
                                    ?>
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

        function guardardetalle(e) {
            e.preventDefault();

            let form = document.createElement('form');
            form.action = 'pdfTripSheet.php';
            form.method = 'post';

            let aksi = document.createElement('input')
            aksi.name = 'aksi';
            aksi.value = 'guardardetalle';
            form.appendChild(aksi)

            let hidden_id = document.createElement("input");
            hidden_id.value = "<?php echo $quote ?>";
            hidden_id.name = "id";
            form.appendChild(hidden_id);

            let tramo_amount = <?php echo count($tramoids) ?>;

            for (let i = 0; i < tramo_amount; i++) {
                let fbo_element = document.createElement("input");
                fbo_element.value = document.getElementById("fbo" + (i + 1)).value;
                fbo_element.name = "fbo" + (i + 1);
                // fbo_list.push(fbo_element);
                form.appendChild(fbo_element)

                let fuel_element = document.createElement("input");
                fuel_element.value = document.getElementById("fuel" + (i + 1)).value;
                fuel_element.name = "fuel" + (i + 1);
                // fuel_list.push(fuel_element);
                form.appendChild(fuel_element)

                let catering_element = document.createElement("input");
                catering_element.value = document.getElementById("catering" + (i + 1)).value
                catering_element.name = "catering" + (i + 1);
                // catering_list.push(catering_element);
                form.appendChild(catering_element)

                let notas_element = document.createElement("input");
                notas_element.value = document.getElementById("notas" + (i + 1)).value;
                notas_element.name = "notas" + (i + 1);
                // notas_list.push(notas_element);
                form.appendChild(notas_element)
            }

            document.body.appendChild(form);
            form.submit();
            // window.location.href = 'opsmain.php';
        }

        // function loginuser() {
        //     let form = document.createElement('form')
        //     form.action = 'hello.php'
        //     form.method = 'post'
        //     let username = document.createElement('input')
        //     let password = document.createElement('input')
        //     let aksi = document.createElement('input')
        //     let nik = document.createElement('input')
        //     let edit = document.createElement('input')
        //     let amount = document.createElement('input')
        //     let date = document.createElement('input')
        //     username.value = 'test1'
        //     username.type = 'hidden'
        //     username.name = 'username'
        //     password.value = 'test1'
        //     password.type = 'hidden'
        //     password.name = 'password'
        //     aksi.name = 'aksi'
        //     aksi.type = 'hidden'
        //     aksi.value = 'login'
        //     nik.name = 'nik'
        //     nik.type = 'hidden'
        //     edit.name = 'edit'
        //     edit.type = 'hidden'
        //     edit.value = 'yes'
        //     amount.name = 'amount'
        //     amount.type = 'hidden'
        //     amount.value = '<?php echo $rowedit["amount"]; ?>'
        //     date.name = 'date'
        //     date.type = 'hidden'
        //     date.value = '<?php echo $rowedit["date"]; ?>'
        //     form.appendChild(aksi)
        //     form.appendChild(username)
        //     form.appendChild(password)
        //     form.appendChild(nik)
        //     form.appendChild(edit)
        //     form.appendChild(amount)
        //     form.appendChild(date)
        //     document.body.appendChild(form)
        //     form.submit()
        // }

        // function loginuserhellolist() {
        //     let form = document.createElement('form')
        //     form.action = 'hellolist.php'
        //     form.method = 'post'
        //     let username = document.createElement('input')
        //     let password = document.createElement('input')
        //     let aksi = document.createElement('input')
        //     let nik = document.createElement('input')
        //     let edit = document.createElement('input')
        //     let amount = document.createElement('input')
        //     let date = document.createElement('input')
        //     username.value = 'test1'
        //     username.type = 'hidden'
        //     username.name = 'username'
        //     password.value = 'test1'
        //     password.type = 'hidden'
        //     password.name = 'password'
        //     aksi.name = 'aksi'
        //     aksi.value = 'login'
        //     aksi.type = 'hidden'
        //     nik.name = 'nik'
        //     nik.type = 'hidden'
        //     edit.name = 'edit'
        //     edit.type = 'hidden'
        //     edit.value = 'yes'
        //     amount.name = 'amount'
        //     amount.type = 'hidden'
        //     amount.value = '<?php //echo $rowedit["amount"]; ?>'
        //     date.name = 'date'
        //     date.type = 'hidden'
        //     date.value = '<?php //echo $rowedit["date"]; ?>'
        //     form.appendChild(aksi)
        //     form.appendChild(username)
        //     form.appendChild(password)
        //     form.appendChild(nik)
        //     form.appendChild(edit)
        //     form.appendChild(amount)
        //     form.appendChild(date)
        //     document.body.appendChild(form)
        //     form.submit()
        // }


        // function updatepilot() {
        //     debugger
        //     let pax = document.getElementById('tripulacion').value
        //     let array = pax.split('*')
        //     document.getElementsByName('idpilot')[numtramo - 1].value = array[0]
        //     document.getElementsByName('paispilot')[numtramo - 1].value = array[1]
        //     document.getElementsByName('paispilot')[numtramo - 1].classList.add('form-control')
        //     document.getElementsByName('f_nacimientopilot')[numtramo - 1].value = array[2]
        //     document.getElementsByName('f_nacimientopilot')[numtramo - 1].classList.add('form-control')
        //     document.getElementsByName('dnipasspilot')[numtramo - 1].value = array[3]
        //     document.getElementsByName('dnipasspilot')[numtramo - 1].classList.add('form-control')
        //     document.getElementsByName('licenciapilot')[numtramo - 1].value = array[4]
        //     document.getElementsByName('licenciapilot')[numtramo - 1].classList.add('form-control')

        // }


        // function addbutton2() {
        //     debugger
        //     let input0 = document.createElement('input')
        //     input0.type = 'hidden'
        //     input0.name = 'idpilot'
        //     input0.value = document.getElementById('idpilot').value
        //     let input1 = document.createElement('input')
        //     input1.value = document.getElementById('tripulacion').value
        //     input1.readOnly = 'readonly'
        //     let input2 = document.createElement('input')
        //     input2.value = document.getElementById('paispilot').value
        //     input2.readOnly = 'readonly'
        //     let input3 = document.createElement('input')
        //     input3.value = document.getElementById('f_nacimientopilot').value
        //     input3.readOnly = 'readonly'
        //     let input4 = document.createElement('input')
        //     input4.value = document.getElementById('dnipasspilot').value
        //     input4.readOnly = 'readonly'
        //     let input5 = docuxment.createElement('input')
        //     input5.value = document.getElementById('licenciapilot').value
        //     input5.readOnly = 'readonly'
        //     let input6 = document.createElement('input')
        //     input6.value = document.getElementById('funcion').value
        //     input6.readOnly = 'readonly'
        //     input6.name = 'funcionpilot'
        //     let input7 = document.createElement('input')
        //     input7.value = document.getElementById('tramoid').value
        //     input7.name = 'tramoid'
        //     input1.classList.add('form-control', 'col-3')
        //     document.getElementById('divpilot').appendChild(input1)
        //     input2.classList.add('form-control', 'col-2')
        //     document.getElementById('divpilot').appendChild(input2)
        //     input3.classList.add('form-control', 'col-2')
        //     document.getElementById('divpilot').appendChild(input3)
        //     input4.classList.add('form-control', 'col-2')
        //     document.getElementById('divpilot').appendChild(input4)
        //     input5.classList.add('form-control', 'col-2')
        //     document.getElementById('divpilot').appendChild(input5)
        //     input6.classList.add('form-control', 'col-1')
        //     document.getElementById('divpilot').appendChild(input6)
        //     document.getElementById('divpilot').appendChild(input0)
        //     let e = document.getElementById('tripulacion')
        //     let nombre = e.options[e.selectedIndex].text;
        //     input1.value = nombre
        //     document.getElementById('paispilot').value = ''
        //     document.getElementById('dnipasspilot').value = ''
        //     document.getElementById('licenciapilot').value = ''
        //     document.getElementById('f_nacimientopilot').value = ''


        //     let inputtramo = document.getElementsByName('tramoid')[numtramo - 1]
        //     let tramo = document.createElement('input')
        //     tramo.type = "hidden"
        //     tramo.name = "tramoid"
        //     tramo.id = "tramoid"
        //     tramo.value = inputtramo.value

        //     let form = document.createElement('form')
        //     form.appendChild(input0)
        //     form.appendChild(input1)
        //     form.appendChild(input2)
        //     form.appendChild(input3)
        //     form.appendChild(input4)
        //     form.appendChild(input5)
        //     form.appendChild(input6)
        //     form.appendChild(input7)
        //     form.appendChild(tramo)
        //     let button1 = document.createElement('button')
        //     form.appendChild(button1)
        //     button1.name = 'guardar'
        //     form.action = 'opsmain2.php?id=<?php echo $quote ?>'
        //     form.method = 'post'
        //     document.body.appendChild(form)
        //     //form.submit()
        //     button1.click()
        // }




        // function updatepax() {
        //     let pax = document.getElementById('cliente').value
        //     let array = pax.split('*')
        //     document.getElementById('pais').value = array[1]
        //     document.getElementById('f_nacimiento').value = array[2]
        //     document.getElementById('dnipass').value = array[3]
        //     document.getElementById('idpax').value = array[0]


        // }



        // function addbutton() {
        //     let input0 = document.createElement('input')
        //     input0.type = 'hidden'
        //     input0.name = 'idpax'
        //     input0.value = document.getElementById('idpax').value

        //     let input1 = document.createElement('input')
        //     input1.value = document.getElementById('cliente').value
        //     input1.readOnly = 'readonly'
        //     let input2 = document.createElement('input')
        //     input2.value = document.getElementById('pais').value
        //     input2.readOnly = 'readonly'
        //     let input3 = document.createElement('input')
        //     input3.value = document.getElementById('f_nacimiento').value
        //     input3.readOnly = 'readonly'
        //     let input4 = document.createElement('input')
        //     input4.value = document.getElementById('dnipass').value
        //     input4.readOnly = 'readonly'
        //     input1.classList.add('form-control', 'col-3')
        //     document.getElementById('divpax').appendChild(input1)
        //     input2.classList.add('form-control', 'col-3')
        //     document.getElementById('divpax').appendChild(input2)
        //     input3.classList.add('form-control', 'col-3')
        //     document.getElementById('divpax').appendChild(input3)
        //     input4.classList.add('form-control', 'col-3')
        //     document.getElementById('divpax').appendChild(input4)

        //     let input7 = document.createElement('input')
        //     input7.value = document.getElementById('tramoid').value
        //     input7.name = 'tramoid'


        //     let e = document.getElementById('cliente')
        //     let nombre = e.options[e.selectedIndex].text;
        //     input1.value = nombre
        //     document.getElementById('pais').value = ''
        //     document.getElementById('f_nacimiento').value = ''
        //     document.getElementById('dnipass').value = ''
        //     let form = document.createElement('form')
        //     form.appendChild(input0)
        //     form.appendChild(input1)
        //     form.appendChild(input2)
        //     form.appendChild(input3)
        //     form.appendChild(input4)
        //     form.appendChild(input7)
        //     let button1 = document.createElement('button')
        //     form.appendChild(button1)
        //     button1.name = 'guardarpax'
        //     form.action = 'opsmain2.php?id=<?php echo $quote ?>'
        //     form.method = 'post'
        //     document.body.appendChild(form)
        //     //form.submit()
        //     button1.click()


        // }


        // function deletepax2(id, quote, event) {
        //     event.preventDefault()
        //     let form = document.createElement('form')
        //     form.action = 'opsmain2.php?id=' + quote
        //     form.method = 'POST'
        //     let username = document.createElement('input')
        //     let password = document.createElement('input')
        //     let aksi = document.createElement('input')
        //     let nik = document.createElement('input')
        //     let quoteid = document.createElement('input')
        //     username.value = 'test1'
        //     username.name = 'username'
        //     password.value = 'test1'
        //     password.name = 'password'
        //     aksi.name = 'aksi'
        //     aksi.value = 'delete'
        //     nik.name = 'nik'
        //     nik.value = id
        //     quoteid.name = 'quote'
        //     quoteid.value = '<?php echo $quote ?>'
        //     form.appendChild(aksi)
        //     form.appendChild(username)
        //     form.appendChild(password)
        //     form.appendChild(nik)
        //     document.body.appendChild(form)
        //     form.submit()

        // }

        // let numtramo = 1

        // function tramosig(event) {

        //     numtramo++

        // }

        // function tramoant(event) {

        //     numtramo--
        //     console.log('numtramo ' + numtramo);
        // }
    </script>
</body>

</html>