<?php
include("conexion.php");

echo "<script>console.log('0')</script>";

if (isset($_POST['id'])) {
    $invoice_id = $_POST['id'];
    $invoice_table = mysqli_query($con, "SELECT *,DATE_FORMAT(date, '%d/%m/%Y %H:%i:%s') as spanish_date FROM `invoices` WHERE `invoices`.`quote`=$invoice_id");
    $invoice_row = mysqli_fetch_assoc($invoice_table);
    $company_table = mysqli_query($con, "SELECT * FROM `company`");
    $company_row = mysqli_fetch_assoc($company_table);
    $contact_id = $invoice_row['buyer_id'];
    $contact_table = mysqli_query($con, "SELECT * FROM `Contact` WHERE `Contact`.`id`= $contact_id");
    $contact_row = mysqli_fetch_assoc($contact_table);
    $aircraft_matricula = $invoice_row['aircraft'];
    $aircraft_table = mysqli_query($con, "SELECT * FROM `Aircraft` WHERE `Aircraft`.`matricula`='$aircraft_matricula'");
    $aircraft_row = mysqli_fetch_assoc($aircraft_table);
    $aircraft_img_table = mysqli_query($con, "SELECT * FROM `aircraft_img` WHERE `aircraft_img`.`matricula`='$aircraft_matricula'");
    $aircraft_img_dir = array();
    while ($aircraft_img_row = mysqli_fetch_assoc($aircraft_img_table)) {
        array_push($aircraft_img_dir, $aircraft_img_row['img_dir']);
    }
    $invoice_detail_table = mysqli_query($con, "SELECT * FROM `invoice_detail` WHERE `invoice_detail`.`id_invoice`='$invoice_id'");
    echo "<script>console.log('POST: $invoice_id')</script>";
}

echo "<script>console.log('1')</script>";

if (isset($_GET['id'])) {
    $invoice_id = $_GET['id'];
    $invoice_table = mysqli_query($con, "SELECT *,DATE_FORMAT(date, '%d/%m/%Y %H:%i:%s') as spanish_date FROM `invoices` WHERE `invoices`.`quote`=$invoice_id");
    $invoice_row = mysqli_fetch_assoc($invoice_table);
    $company_table = mysqli_query($con, "SELECT * FROM `company`");
    $company_row = mysqli_fetch_assoc($company_table);
    $contact_id = $invoice_row['buyer_id'];
    $contact_table = mysqli_query($con, "SELECT * FROM `Contact` WHERE `Contact`.`id`= $contact_id");
    $contact_row = mysqli_fetch_assoc($contact_table);
    $aircraft_matricula = $invoice_row['aircraft'];
    $aircraft_table = mysqli_query($con, "SELECT * FROM `Aircraft` WHERE `Aircraft`.`matricula`='$aircraft_matricula'");
    $aircraft_row = mysqli_fetch_assoc($aircraft_table);
    $aircraft_img_table = mysqli_query($con, "SELECT * FROM `aircraft_img` WHERE `aircraft_img`.`matricula`='$aircraft_matricula'");
    $aircraft_img_dir = array();
    while ($aircraft_img_row = mysqli_fetch_assoc($aircraft_img_table)) {
        array_push($aircraft_img_dir, $aircraft_img_row['img_dir']);
    }
    $invoice_detail_table = mysqli_query($con, "SELECT * FROM `invoice_detail` WHERE `invoice_detail`.`id_invoice`='$invoice_id'");
    echo "<script>console.log('GET: $invoice_id')</script>";
}

echo "<script>console.log('2')</script>";

if ($_POST['aksi'] == 'guardardetalle') {
    echo "<script>console.log('aksi has value')</script>";
    $sql_tramos = 'select Id from invoice_detail where id_invoice=' . $invoice_id;
    $id_tramos = mysqli_query($con, $sql_tramos);
    $tramos_id = array();
    while ($row_tramo_id = mysqli_fetch_assoc($id_tramos)) {
        array_push($tramos_id, $row_tramo_id["Id"]);
    }

    echo "<script>console.log('array is set')</script>";
    // echo "<script>console.log('guardar detalle')</script>";
    for ($i = 1; $i <= 6; $i++) {
        echo "<script>console.log('$i')</script>";
        if (!isset($_POST["fbo" . $i])) {
            echo "<script>console.log('fbo not set: " . $_POST["fbo" . $i] . "')</script>";
            break;
        }
        echo "<script>console.log('fbo IS set')</script>";
        $fbo = $_POST["fbo" . $i];
        echo "<script>console.log('fbo got')</script>";
        $fuel = $_POST["fuel" . $i];
        echo "<script>console.log('fuel got')</script>";
        $catering = $_POST["catering" . $i];
        echo "<script>console.log('catering got')</script>";
        $notas = $_POST["notas" . $i];
        echo "<script>console.log('notas got')</script>";
        $tramo = $tramos_id[$i - 1];
        echo "<script>console.log('data got')</script>";
        $sql_add_tramo_detail = "INSERT into opstramo_detail (tramo_id,fbo,fuel,catering,notas) values (" . $tramo . ",'" . $fbo . "','" . $fuel . "','" . $catering . "','" . $notas . "')";
        echo "<script>console.log('$sql_add_tramo_detail')</script>";
        $add_tramo_detail = mysqli_query($con, $sql_add_tramo_detail);
    }
    echo "<script>console.log('finished inserting values')</script>";
    // echo "<script>console.log('inserted details')</script>";
    // header("Location: http://grupogustoso.com/opsmain.php");
    // echo "<script>window.location.href='opsmain.php';</script>";
    echo "<script>console.log('guardardetalle')</script>";
}

echo "<script>console.log('finished getting data')</script>";
?>

<!DOCTYPE html>
<html lang="en">

<head id="head">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <link rel="stylesheet" href="assets/css/PDFstyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body id="pdf">
    <div class="container">
        <div id="pag1" class="container" style="height: 1500px;">
            <div class="container container-bg rounded-pill py-3 mt-3">
                <div class="row">
                    <div class="col-7">
                        <img src="<?php echo $company_row['logo_dir'] ?>" height="50px" class="rounded-circle ml-3">
                    </div>
                </div>
            </div>
            <br>
            <div class="container roboto-small">
                <div class="row">
                    <div class="col">
                        <div class="font-weight-bold">Date Created</div>
                    </div>
                    <div class="col text-right title-color mr-2"><?php echo $contact_row['first_name'] . " " . $contact_row['last_name']; ?></div>
                </div>
                <div class="row">
                    <div class="col"><?php echo $invoice_row['spanish_date']; ?></div>
                    <div class="col text-right title-color mr-2">
                        Phone: <?php echo $contact_row['phone_number']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right title-color mr-2">
                        Email: <a href="#"><?php echo $contact_row['email']; ?></a>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4">
                    <div class="title-color archivo-larger">
                        PREPARED FOR
                    </div>
                    <div class="row roboto-small">
                        <div class="col-auto font-weight-bold text-right ml-4 pr-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Company</div>
                        <div class="col text-left pl-0"><?php echo $company_row['name']; ?></div>
                    </div>
                    <div class="row roboto-small">
                        <div class="col-auto font-weight-bold text-right ml-5 pr-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email</div>
                        <div class="col text-left pl-0"><?php echo $company_row['email']; ?></div>
                    </div>
                    <div class="row roboto-small">
                        <div class="col-auto font-weight-bold text-right ml-5 pr-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telefono</div>
                        <div class="col text-left pl-0"><?php echo $company_row['telefono']; ?></div>
                    </div>
                    <div class="row roboto-small">
                        <div class="col-auto font-weight-bold text-right ml-5 pr-2">&nbsp;&nbsp;&nbsp;&nbsp;Dirección</div>
                        <div class="col text-left pl-0"><?php echo $company_row['direccion']; ?></div>
                    </div>
                    <div class="row roboto-small">
                        <div class="col-auto font-weight-bold text-right ml-5 pr-2">Pagina Web</div>
                        <div class="col text-left pl-0"><?php echo $company_row['webpage']; ?></div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="title-color mr-2 archivo-larger">
                            AIRCRAFT
                        </div>
                    </div>
                    <div class="row title-color archivo-larger" style="font-size: small;">
                        <?php echo $aircraft_matricula; ?> (<?php echo $aircraft_row['aeronave']; ?>)
                    </div>
                    <div class="row">
                        <?php foreach ($aircraft_img_dir as &$value) { ?>
                            <div class="col-auto mx-auto">
                                <img src="<?php echo $value ?>" height="130px" class="img-border">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col title-color archivo-larger">
                    TRIP ITINERARY
                </div>
            </div>
            <div class="roboto-small">
                <div class="row jostFont container-bg rounded-top-left rounded-top-right mt-3 mb-1 py-1 text-color">
                    <div class="col-1">Leg</div>
                    <div class="col-3">Departure</div>
                    <div class="col-3">Arrival</div>
                    <div class="col-1">Pax</div>
                    <div class="col-1">Flight</div>
                    <div class="col-1 pl-1">Distance</div>
                    <div class="col">Aircraft</div>
                </div>
                <?php
                $cont_tramo = 1;
                while ($invoice_detail_row = mysqli_fetch_assoc($invoice_detail_table)) {
                    $airport_code = $invoice_detail_row['origen'];
                    $airports_table = mysqli_query($con, "SELECT * FROM `airports` WHERE `airports`.`airport_code`= '$airport_code';");
                    $airports_row = mysqli_fetch_assoc($airports_table);
                ?>
                    <div class="row">
                        <div class="col-1"><?php echo $cont_tramo; ?></div>
                        <div class="col-3"><?php echo $invoice_detail_row['origen'] . " - " . $airports_row['airport_name'] . " - " . $airports_row['airport_city'] . ", " . $airports_row['airport_country']; ?> </div>
                        <?php
                        $airport_code = $invoice_detail_row['destino'];
                        $airports_table = mysqli_query($con, "SELECT * FROM `airports` WHERE `airports`.`airport_code`= '$airport_code';");
                        $airports_row = mysqli_fetch_assoc($airports_table);
                        ?>
                        <div class="col-3"><?php echo $invoice_detail_row['destino'] . " - " . $airports_row['airport_name'] . " - " . $airports_row['airport_city'] . ", " . $airports_row['airport_country']; ?></div>
                        <div class="col-1"><?php echo $invoice_detail_row['Pax']; ?></div>
                        <div class="col-1"><?php echo $invoice_detail_row['tiempo_vuelo']; ?></div>
                        <div class="col-1 pl-1"><?php echo $invoice_detail_row['nm_vuelo']; ?> nm</div>
                        <div class="col"><?php echo $aircraft_matricula; ?> (<?php echo $aircraft_row['aeronave']; ?>)</div>
                    </div>
                    <hr class="my-1">
                <?php
                    $cont_tramo++;
                }
                ?>
            </div>
            <br>

            <div class="row">
                <div class="col">
                    <!--ACA VA EL MAPA -->
                </div>
                <div class="col roboto-small">
                    <div class="row">
                        <?php
                        $invoice_detail_table = mysqli_query($con, "SELECT * FROM `invoice_detail` WHERE `invoice_detail`.`id_invoice`='$invoice_id';");
                        while ($invoice_detail_row = mysqli_fetch_assoc($invoice_detail_table)) {
                            $airport_code = $invoice_detail_row['origen'];
                            $airports_table = mysqli_query($con, "SELECT * FROM `airports` WHERE `airports`.`airport_code`= '$airport_code';");
                            $airports_row = mysqli_fetch_assoc($airports_table);
                        ?>
                            <div hidden class="row">
                                <span class="title-color font-weight-bold"><?php echo $airport_code; ?></span>&nbsp;- <?php echo $airports_row['airport_name']; ?>, <?php echo $airports_row['airport_city']; ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col title-color archivo-larger">
                    PASSENGER(S)
                </div>
            </div>
            <div class="roboto-small">
                <div class="row jostFont container-bg rounded-top-left rounded-top-right mt-3 mb-1 py-1 text-color">
                    <div class="col-auto">ID Checked</div>
                    <div class="col-4">Name</div>
                    <div class="col-2">Phone</div>
                    <div class="col-2">Fax/Email</div>
                    <div class="col-auto ml-3">Leg</div>
                    <?php
                    $invoice_detail_table = mysqli_query($con, "SELECT * FROM `invoice_detail` WHERE `invoice_detail`.`id_invoice`='$invoice_id';");
                    $cant_tramos = mysqli_num_rows($invoice_detail_table);
                    for ($i = 1; $i <= $cant_tramos; $i++) {
                        echo "<div class='col-auto pr-0'>$i</div>";
                    }
                    ?>
                </div>
                <?php
                $array_tramos = array();
                while ($invoice_detail_row = mysqli_fetch_assoc($invoice_detail_table)) {
                    $tramo_id = $invoice_detail_row['Id'];
                    $opstramo_table = mysqli_query($con, "SELECT * FROM `opstramo` WHERE `opstramo`.`tramo_id`=$tramo_id");
                    $array_pasajeros_por_tramo = array();
                    while ($opstramo_row = mysqli_fetch_assoc($opstramo_table)) {
                        if ($opstramo_row['funcion'] == 'null') {
                            array_push($array_pasajeros_por_tramo, $opstramo_row['contact_id']);
                        }
                    }
                    array_push($array_tramos, $array_pasajeros_por_tramo);
                }
                $array_pasajeros = array();
                foreach ($array_tramos as $tramos) {
                    foreach ($tramos as $pasajeros_por_tramo) {
                        $pasajero_ya_esta = false;
                        foreach ($array_pasajeros as $pasajeros) {
                            if ($pasajeros_por_tramo == $pasajeros) {
                                $pasajero_ya_esta = true;
                            }
                        }
                        if (!$pasajero_ya_esta) {
                            array_push($array_pasajeros, $pasajeros_por_tramo);
                            //echo "<script>console.log('pasajero por tramo: $pasajeros_por_tramo')</script>";
                        }
                    }
                }
                foreach ($array_pasajeros as $pasajero) {
                    $contacto_table = mysqli_query($con, "SELECT * FROM `Contact` WHERE `Contact`.`id`=$pasajero");
                    $contacto_row = mysqli_fetch_assoc($contacto_table);
                ?>
                    <div class="row">
                        <div class="col-auto text-white">ID Checked</div>
                        <div class="col-4"><?php echo $contacto_row['first_name'] . " " . $contacto_row['last_name']; ?></div>
                        <div class="col-2"><?php echo $contacto_row['phone_number']; ?></div>
                        <div class="col-2"><?php echo $contacto_row['email']; ?></div>
                        <div class="col-auto ml-3 text-white">Leg</div>
                        <?php
                        foreach ($array_tramos as $key => $tramos) {
                            $tramo_index = $key + 1;
                            $esta_en_el_tramo = false;
                            foreach ($tramos as $pasajeros_por_tramo) {
                                if ($pasajero == $pasajeros_por_tramo) {
                                    $esta_en_el_tramo = true;
                                }
                            }
                            if ($esta_en_el_tramo) {
                                echo "<div class='col-auto pr-0'>$tramo_index</div>";
                            } else {
                                echo "<div class='col-auto pr-0 text-white'>$tramo_index</div>";
                            }
                        }
                        ?>
                    </div>
                    <hr class="my-1">
                <?php
                }
                ?>
                <div class="row">
                    <div class="col">IDs Checked by:</div>
                </div>
                <hr class="my-1">
            </div>
            <br><br><br><br>
            <hr style="border: 1px solid;">
            <div class="d-flex flex-row-reverse">
                <span class="page-num-bg rounded-pill px-3 font-weight-bold"> 1/2 </span>
            </div>
        </div>
        <div id="pag2" class="container" style="height: 1500px;">
            <br>
            <div class="row">
                <div class="col title-color archivo-larger">
                    CATERING
                </div>
            </div>
            <?php
            $invoice_detail_table = mysqli_query($con, "SELECT * FROM `invoice_detail` WHERE `invoice_detail`.`id_invoice`='$invoice_id';");
            while ($invoice_detail_row = mysqli_fetch_assoc($invoice_detail_table)) {
                $tramo_id = $invoice_detail_row['Id'];
                $opstramo_detail_table = mysqli_query($con, "SELECT * FROM `opstramo_detail` WHERE `opstramo_detail`.`tramo_id`=$tramo_id");
                while ($opstramo_detail_row = mysqli_fetch_assoc($opstramo_detail_table)) {
                    if ($opstramo_detail_row['catering'] != 'null') {
            ?>
                        <div class="roboto-small">
                            <div class="row jostFont container-bg rounded-top-left rounded-top-right mt-3 mb-1 py-1 text-color">
                                <div class="col-4"><span class="font-weight-bold"><?php echo $invoice_detail_row['origen']; ?> </span><?php echo $invoice_detail_row['fecha']; ?></div>
                                <div class="col-4">Contact</div>
                                <div class="col-4">Address</div>
                            </div>
                            <div class="row">
                                <div class="col-4"><?php echo $opstramo_detail_row['catering']; ?></div>
                                <div class="col-4"></div>
                                <div class="col-4"></div>
                            </div>
                            <hr class="my-1">
                        </div>
                        <br>
            <?php
                    }
                }
            }
            ?>
            <div class="row">
                <div class="col title-color archivo-larger">
                    FIXED-BASE OPERATOR
                </div>
            </div>
            <?php
            $invoice_detail_table = mysqli_query($con, "SELECT * FROM `invoice_detail` WHERE `invoice_detail`.`id_invoice`='$invoice_id';");
            while ($invoice_detail_row = mysqli_fetch_assoc($invoice_detail_table)) {
                $tramo_id = $invoice_detail_row['Id'];
                $opstramo_detail_table = mysqli_query($con, "SELECT * FROM `opstramo_detail` WHERE `opstramo_detail`.`tramo_id`=$tramo_id");
                while ($opstramo_detail_row = mysqli_fetch_assoc($opstramo_detail_table)) {
                    if ($opstramo_detail_row['fbo'] != 'null') {
            ?>
                        <div class="roboto-small">
                            <div class="row jostFont container-bg rounded-top-left rounded-top-right mt-3 mb-1 py-1 text-color">
                                <div class="col-4"><span class="font-weight-bold"><?php echo $invoice_detail_row['origen']; ?> </span><?php echo $invoice_detail_row['fecha']; ?></div>
                                <div class="col-4">Contact</div>
                                <div class="col-4">Address</div>
                            </div>
                            <div class="row">
                                <div class="col-4"><?php echo $opstramo_detail_row['fbo']; ?></div>
                                <div class="col-4"></div>
                                <div class="col-4"></div>
                            </div>
                            <hr class="my-1">
                        </div>
                        <br>
            <?php
                    }
                }
            }
            ?>
            <div class="row">
                <div class="col title-color archivo-larger">
                    FUEL
                </div>
            </div>
            <?php
            $invoice_detail_table = mysqli_query($con, "SELECT * FROM `invoice_detail` WHERE `invoice_detail`.`id_invoice`='$invoice_id';");
            while ($invoice_detail_row = mysqli_fetch_assoc($invoice_detail_table)) {
                $tramo_id = $invoice_detail_row['Id'];
                $opstramo_detail_table = mysqli_query($con, "SELECT * FROM `opstramo_detail` WHERE `opstramo_detail`.`tramo_id`=$tramo_id");
                while ($opstramo_detail_row = mysqli_fetch_assoc($opstramo_detail_table)) {
                    if ($opstramo_detail_row['fuel'] != 'null') {
            ?>
                        <div class="roboto-small">
                            <div class="row jostFont container-bg rounded-top-left rounded-top-right mt-3 mb-1 py-1 text-color">
                                <div class="col-4"><span class="font-weight-bold"><?php echo $invoice_detail_row['origen']; ?> </span><?php echo $invoice_detail_row['fecha']; ?></div>
                                <div class="col-4">Contact</div>
                                <div class="col-4">Address</div>
                            </div>
                            <div class="row">
                                <div class="col-4"><?php echo $opstramo_detail_row['fuel']; ?></div>
                                <div class="col-4"></div>
                                <div class="col-4"></div>
                            </div>
                            <hr class="my-1">
                        </div>
                        <br>
            <?php
                    }
                }
            }
            ?>
            <br><br>
            <hr style="border: 1px solid;">
            <div class="d-flex flex-row-reverse align-bottom">
                <span class="page-num-bg rounded-pill px-3 font-weight-bold"> 2/2 </span>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>
</body>
<script>
    window.jsPDF = window.jspdf.jsPDF;
    document.getElementById("pdf").onload = function() {
        generatePDF()
    };

    function generatePDF() {
        const pdf = new jsPDF();
        const pag1 = document.querySelector("#pag1");
        var imgPag1;
        const pag2 = document.querySelector("#pag2");
        var imgPag2;

        html2canvas(pag1).then(canvas => {
            imgPag1 = canvas.toDataURL('image/png');
            pdf.addImage(imgPag1, 'PNG', 10, 10, 190, 290);

            html2canvas(pag2).then(canvas => {
                pdf.addPage();
                console.log("pag2");
                imgPag2 = canvas.toDataURL('image/png');
                pdf.addImage(imgPag2, 'PNG', 10, 10, 190, 290);
            }).then(function() {
                pdf.save("TripSheet.pdf");
                //setTimeout(() => {console.log("SAVE");}, 1000);
                location.href = "opsmain.php";
            });
        });
    }
</script>

</html>