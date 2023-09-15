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
    <title>AIS Reportes</title>
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
    <!--COMIENZO BOTONERA PRINCIPAL-->
    <div class="mai-wrapper">
        <?php require_once("nav_header2.html") ?>
        <!--FINAL BOTONERA PRINCIPAL-->
        <div class="main-content container">
            <form action="reportegeneral-pdf.php" id="reporte-form" method="post">
                <div class="form-group row">
                    <label class="col-auto col-form-label">Desde</label>
                    <div class="col">
                        <input class="form-control" onchange="reloadTable()" type="date" name="desde" id="desde">
                    </div>
                    <label class="col-auto col-form-label">Hasta</label>
                    <div class="col">
                        <input class="form-control" onchange="reloadTable()" type="date" name="hasta" id="hasta">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-default card-table">
                            <div class="card-body">
                                <div class="noSwipe">
                                    <table class="table table-striped table-hover ma-table-responsive" id="table">
                                        <thead>
                                            <tr>
                                                <th style="width:17%;">Fecha</th>
                                                <th style="width:15%;">Concepto</th>
                                                <th style="width:10%;">Tipo de Ingreso</th>
                                                <th style="width:13%;">Moneda de Cambio</th>
                                                <th style="width:13%;">Monto</th>
                                                <th style="width:10%;">Archivo</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <?php
                                            $sql_reporte = '
                                            SELECT `date`, `type`, `concept`, `amount`, `moneda_cambio`, `file` FROM `gastos_generales`
                                            UNION
                                            SELECT `date`, `tipoingreso` AS `type`, `concepto` AS `concept`, `monto` AS `amount`, `moneda_cambio`, `file` FROM `ingresos_generales`
                                            ORDER BY `date` DESC;';
                                            $reporte = mysqli_query($con, $sql_reporte);
                                            $total_pesos = 0;
                                            $total_usd = 0;
                                            while ($rowp = mysqli_fetch_assoc($reporte)) {
                                                $file_exists = $rowp["file"];
                                            ?>
                                                <tr>
                                                    <td class="cell-detail">
                                                        <span class="date"><?php echo $rowp["date"] ?></span>
                                                    </td>
                                                    <td class="cell-detail">
                                                        <span><?php echo $rowp["concept"] ?></span>
                                                    </td>
                                                    <td class="cell-detail">
                                                        <span><?php echo $rowp["type"] ?></span>
                                                    </td>
                                                    <td class="cell-detail">
                                                        <span><?php echo $rowp["moneda_cambio"] ?></span>
                                                    </td>
                                                    <td class="cell-detail">
                                                        <span>$<?php echo $rowp["amount"] ?></span>
                                                    </td>
                                                    <td class="cell-detail">
                                                        <?php
                                                        if ($file_exists != "") {
                                                            echo '<a style="font-size:1.5rem" href="ingresos/' . $rowp["file"] . '" download="' . $rowp["file"] . '">
                            <span class="icon s7-file"></span>
                        </a>';
                                                        }
                                                        ?>

                                                    </td>
                                                </tr>
                                            <?php
                                                if($rowp["moneda_cambio"]=="USD"){
                                                    $total_usd += $rowp["amount"];
                                                }else{
                                                    $total_pesos += $rowp["amount"];
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
                <div class="form-group row" style="display: flex; justify-content:end;">
                    <label class="col-auto col-form-label">Total Pesos:</label>
                    <div class="col-auto">
                        <input class="form-control" id="total_pesos" type="text" value="$<?php echo $total_pesos?>" disabled>
                    </div>
                    <label class="col-auto col-form-label">Total USD:</label>
                    <div class="col-auto">
                        <input class="form-control" id="total_usd" type="text" value="$<?php echo $total_usd?>" disabled>
                    </div>
                </div>
                <div class="form-group row" style="display: flex; justify-content:end;">
                    <div class="col-auto">
                        <button class="btn btn-space btn-primary" name="save" type="submit">Generar PDF</button>
                    </div>
                </div>
            </form>
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
        <script>
            function reloadTable() {
                $.ajax({
                    url: "reportegeneral-query.php",
                    type: "POST",
                    success: function(serverResponse) {
                        let userResponse = jQuery.parseJSON(serverResponse);
                        let inputDesde = document.getElementById('desde').value;
                        let inputHasta = document.getElementById('hasta').value;
                        let tbody = document.getElementById('tbody');
                        let table = document.getElementById('table');
                        tbody.remove();
                        console.log('Desde: ' + inputDesde + ' Hasta: ' + inputHasta);
                        if (inputDesde == '') {
                            inputDesde = new Date(0).getTime();
                        } else {
                            inputDesde = new Date(inputDesde).getTime();
                        }
                        if (inputHasta == '') {
                            inputHasta = new Date().getTime();
                        } else {
                            inputHasta = new Date(inputHasta).getTime();
                        }
                        let tbodyNew = document.createElement('tbody');
                        tbodyNew.setAttribute("id", "tbody");
                        table.appendChild(tbodyNew);
                        let total_usd = 0;
                        let total_pesos = 0;
                        for (const userKey in userResponse) {
                            const userData = userResponse[userKey];
                            if ((new Date(userData['date']).getTime() >= inputDesde) && (new Date(userData['date']).getTime() <= inputHasta)) {
                                let tr = document.createElement('tr');
                                tbodyNew.appendChild(tr);
                                let tdDate = document.createElement('td');
                                tdDate.classList.add('cell-detail');
                                tr.appendChild(tdDate);
                                let spanDate = document.createElement('span');
                                spanDate.classList.add('date');
                                spanDate.innerHTML = userData['date'];
                                tdDate.appendChild(spanDate);

                                let tdConcept = document.createElement('td');
                                tdConcept.classList.add('cell-detail');
                                tr.appendChild(tdConcept);
                                let spanConcept = document.createElement('span');
                                spanConcept.classList.add('date');
                                spanConcept.innerHTML = userData['concept'];
                                tdConcept.appendChild(spanConcept);

                                let tdType = document.createElement('td');
                                tdType.classList.add('cell-detail');
                                tr.appendChild(tdType);
                                let spanType = document.createElement('span');
                                spanType.classList.add('date');
                                spanType.innerHTML = userData['type'];
                                tdType.appendChild(spanType);

                                let tdMoneda = document.createElement('td');
                                tdMoneda.classList.add('cell-detail');
                                tr.appendChild(tdMoneda);
                                let spanMoneda = document.createElement('span');
                                spanMoneda.classList.add('date');
                                spanMoneda.innerHTML = userData['moneda_cambio'];
                                tdMoneda.appendChild(spanMoneda);

                                let tdAmount = document.createElement('td');
                                tdAmount.classList.add('cell-detail');
                                tr.appendChild(tdAmount);
                                let spanAmount = document.createElement('span');
                                spanAmount.classList.add('date');
                                spanAmount.innerHTML = userData['amount'];
                                tdAmount.appendChild(spanAmount);

                                let tdFile = document.createElement('td');
                                tdFile.classList.add('cell-detail');
                                tr.appendChild(tdFile);
                                console.log(userData['file']);
                                if(userData['file']!=''){
                                    console.log(userData['file']);
                                    let aFile = document.createElement('a');
                                    let spanFile = document.createElement('span');
                                    aFile.setAttribute("style", "font-size:1.5rem");
                                    aFile.setAttribute("href", "ingresos/"+userData['file']);
                                    aFile.setAttribute("download", "ingresos/"+userData['file']);
                                    spanFile.setAttribute("class", "icon s7-file");
                                    tdFile.appendChild(aFile);
                                    aFile.appendChild(spanFile);
                                }
                                if(userData['moneda_cambio']=='USD'){
                                    total_usd += parseFloat(userData['amount']);
                                }else{  
                                    total_pesos += parseFloat(userData['amount']);
                                }
                            }
                        }
                        document.getElementById('total_pesos').value = '$'+total_pesos;
                        document.getElementById('total_usd').value = '$'+total_usd;
                    },
                });
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                //-initialize the javascript
                App.init();
                App.formElements();
            });
        </script>
</body>

</html>