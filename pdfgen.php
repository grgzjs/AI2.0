<?php
    include("conexion.php");

    if(isset($_POST['save'])){
        $date = date("Y-m-d h:i:s");
        $buyer = $_POST['buyer'];
        $posbuyer = strrpos($buyer, "**");
        $idbuyer = substr($buyer, 0, $posbuyer);
        $aircraft = $_POST['aircraft'];
        $pos = strpos($aircraft, "*");
        $aircraft = substr($aircraft, 0, $pos);
        $preciokm = substr($aircraft, $pos + 1);
        $subtotal = str_replace("$", "", $_POST['subtotal']);
        $addons = str_replace("$", "", $_POST['addons']);
        $pernocta = str_replace("$", "", $_POST['pernocta']);
        $tax = $_POST['tax'];
        $amount = str_replace("$", "", $_POST['amount']);
        $moneda = $_POST["moneda"];

        $fdate1 = $_POST['fdate1'];
        $forigen1 = $_POST['forigen1'];
        $fdestino1 = $_POST['fdestino1'];
        $fpax1 = $_POST['fpax1'];
        $nm1 = $_POST['nm_vuelo1'];
        $h_vuelo1 = $_POST['h_vuelo1'];

        $fdate2 = $_POST['fdate2'];
        $forigen2 = $_POST['forigen2'];
        $fdestino2 = $_POST['fdestino2'];
        $fpax2 = $_POST['fpax2'];
        $nm2 = $_POST['nm_vuelo2'];
        $h_vuelo2 = $_POST['h_vuelo2'];

        $fdate3 = $_POST['fdate3'];
        $forigen3 = $_POST['forigen3'];
        $fdestino3 = $_POST['fdestino3'];
        $fpax3 = $_POST['fpax3'];
        $nm3 = $_POST['nm_vuelo3'];
        $h_vuelo3 = $_POST['h_vuelo3'];

        $fdate4 = $_POST['fdate4'];
        $forigen4 = $_POST['forigen4'];
        $fdestino4 = $_POST['fdestino4'];
        $fpax4 = $_POST['fpax4'];
        $nm4 = $_POST['nm_vuelo4'];
        $h_vuelo4 = $_POST['h_vuelo4'];

        $fdate5 = $_POST['fdate5'];
        $forigen5 = $_POST['forigen5'];
        $fdestino5 = $_POST['fdestino5'];
        $fpax5 = $_POST['fpax5'];
        $nm5 = $_POST['nm_vuelo5'];
        $h_vuelo5 = $_POST['h_vuelo5'];

        $subtotal = $subtotal == "" ? 0 : $subtotal;
        $addons = $addons == "" ? 0 : $addons;
        $tax = $tax == "" ? 0 : explode("%", $tax)[0];
        $amount = $amount == "" ? 0 : $amount;
        if(isset($_POST['idpdf'])){
            $idquote = $_POST['idpdf'];
            //echo "<script>console.log('ENTRE A IDPDF')</script>";
            $sql = "UPDATE `invoices` SET `date` = '$date', `aircraft` = '$aircraft', `moneda` = '$moneda', `subtotal` = '$subtotal', `tax` = '$tax', `amount` = '$amount', `addons` = '$addons', `pernocta` = '$pernocta', `buyer_id` = '$idbuyer', `status` = '1' WHERE `invoices`.`quote` = '$idquote'";
        }else{
            $sql = "insert into invoices (date,buyer_id,aircraft,moneda,subtotal,addons,pernocta,tax,amount,status) Values ('$date',$idbuyer,'$aircraft','$moneda',$subtotal,$addons,$pernocta,$tax,$amount,1)";
        }
        $update = mysqli_query($con, $sql);
        $query = "select * from invoices order by date desc";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $quote = $row['quote'];

        if(isset($_POST['idpdf'])){
            $fdatehr = 'fdateh1';
            $i = 0;
            while(!empty($_POST[$fdatehr])){
                //echo $i.'<br>';
                $i++;
                $fdatehr = 'fdateh'.$i+1;
                $fdateh = $_POST['fdateh'.$i];
                $forigenh = $_POST['forigenh'.$i];
                $fdestinoh = $_POST['fdestinoh'.$i];
                $fpaxh = $_POST['fpaxh'.$i];
                $fnm_vueloh = $_POST['fnm_vueloh'.$i];
                $fh_vueloh = $_POST['fh_vueloh'.$i];
                $fidh = $_POST['fidh'.$i];
                $sql = "UPDATE `invoice_detail` SET `fecha` = '$fdateh', `origen` = '$forigenh', `destino` = '$fdestinoh', `Pax` = '$fpaxh', `nm_vuelo` = '$fnm_vueloh', `tiempo_vuelo` = '$fh_vueloh', `id_invoice` = '$idquote' WHERE `invoice_detail`.`Id` = '$fidh'";
                $update = mysqli_query($con, $sql);
            }
            $editdetail = mysqli_query($con, "select * from invoice_detail WHERE id_invoice= $quote");
            $numrowstramo = mysqli_num_rows($editdetail);
            echo "<script>console.log('rows: $numrowstramo i: $i<-ACA!')</script>";
            if($i<$numrowstramo){
                //$x=$numrowstramo-$i;
                $cont=1;
                while ($rowdetail = mysqli_fetch_assoc($editdetail)) {
                    echo "<script>console.log('$x $cont <-ACA')</script>";
                    if($cont>$i){
                        $id_invoice_detail = $rowdetail['Id'];
                        mysqli_query($con, "DELETE FROM invoice_detail WHERE `invoice_detail`.`Id` = $id_invoice_detail");
                    }
                    $cont++;
                }
            }
        }

        if (!empty($fdate1)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,nm_vuelo,tiempo_vuelo,id_invoice) Values ('$fdate1','$forigen1','$fdestino1','$fpax1','$nm1','$h_vuelo1','$quote')";
            $update = mysqli_query($con, $sql);
        }
        if (!empty($fdate2)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,nm_vuelo,tiempo_vuelo,id_invoice) Values ('$fdate2','$forigen2','$fdestino2','$fpax2','$nm2','$h_vuelo2','$quote')";
            $update = mysqli_query($con, $sql);
        }
        if (!empty($fdate3)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,nm_vuelo,tiempo_vuelo,id_invoice) Values ('$fdate3','$forigen3','$fdestino3','$fpax3','$nm3','$h_vuelo3','$quote')";
            $update = mysqli_query($con, $sql);
        }
        if (!empty($fdate4)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,nm_vuelo,tiempo_vuelo,id_invoice) Values ('$fdate4','$forigen4','$fdestino4','$fpax4','$nm4','$h_vuelo4','$quote')";
            $update = mysqli_query($con, $sql);
        }
        if (!empty($fdate5)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,nm_vuelo,tiempo_vuelo,id_invoice) Values ('$fdate5','$forigen5','$fdestino5','$fpax5','$nm5','$h_vuelo5','$quote')";
            $update = mysqli_query($con, $sql);
        }
    }else{
        $quote = $_GET['id'];
    }
    $invoice = mysqli_query($con, 'select *,DATE_FORMAT(date, "%d/%m/%Y %H:%i:%s") as spanish_date from invoices where quote=' . $quote);
    $rowinvoice = mysqli_fetch_assoc($invoice);
    $company = mysqli_query($con, 'select * from company');
    $rowcompany = mysqli_fetch_assoc($company);
    $buyer = mysqli_query($con, 'select * from Contact where id=' . $rowinvoice['buyer_id']);
    $rowbuyer = mysqli_fetch_assoc($buyer);
    $aircraft_img = mysqli_query($con, 'select * from aircraft_img where matricula="' . $rowinvoice['aircraft'].'"');
    $aircraft_img_dir = array();
    while ($rowaircraft_img = mysqli_fetch_assoc($aircraft_img)) {
        array_push($aircraft_img_dir, $rowaircraft_img['img_dir']);
    }
    $detail_tramo = mysqli_query($con, 'select *,DATE_FORMAT(fecha, "%H:%i:%s %d/%m/%Y") as spanish_date from invoice_detail where id_invoice=' . $quote);
    //$tramoids = array();
    
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
</head>
<body id="pdf">
    <div class="container">
        <div id="pag1" style="height: 1500px;">
            <div class="container container-bg rounded-pill py-3 my-3 text-white">
                <div class="row">
                    <div class="col-7">
                        <img src="<?php echo $rowcompany['logo_dir']?>" height="50px" class="rounded-circle ml-3">
                    </div> 
                    <div class="col text-right mr-4 my-auto" style="font-family: 'Archivo', sans-serif; font-size: larger;">
                        C H A R T E R &nbsp;&nbsp;&nbsp;Q U O T E
                    </div>   
                </div>
            </div>
            <br>
            <p class="font-weight-bold">
                Quote # : <?php echo $rowinvoice['quote']?> <br>
                Date: <?php echo $rowinvoice['spanish_date']?> <br>
                Buyer: <?php echo $rowbuyer['first_name'].' '.$rowbuyer['last_name']?> <br>
                Address: <?php echo $rowbuyer['address']?> <br>
            </p>
            <p class="font-weight-bold"> Aircraft: <?php echo $rowinvoice['aircraft']?> </p>
            <div class="row">
                <?php foreach( $aircraft_img_dir as &$value) { ?>
                    <div class="col-auto mx-auto">
                        <img src="<?php echo $value ?>" height="150px" class="img-border">
                    </div>
                <?php } ?>
            </div>
            <br>
            <div class="container container-bg rounded-pill my-3 text-color">
                <div class="row font-weight-bold">
                    <div class="col-3">Fecha Vuelo</div>
                    <div class="col">Origen</div>
                    <div class="col">Destino</div>
                    <div class="col">Pasajeros</div>
                    <div class="col">Kilometros x Hora</div>
                </div>
            </div>
            <?php while ($rowdetail_tramo = mysqli_fetch_assoc($detail_tramo)){?>
                <div class="row font-weight-bold mx-auto text-secondary">
                    <div class="col-3"><?php echo $rowdetail_tramo['spanish_date']?></div>
                    <div class="col"><?php echo $rowdetail_tramo['origen']?></div>
                    <div class="col"><?php echo $rowdetail_tramo['destino']?></div>
                    <div class="col"><?php echo $rowdetail_tramo['Pax']?></div>
                    <div class="col"><?php echo $rowdetail_tramo['nm_vuelo']?></div>
                </div>
            <?php } ?>

            <hr class="hr-style">
            <div class="text-secondary font-weight-bold">
                <div class="row">
                    <div class="col-2">Subtotal:</div>
                    <div class="col">$<?php echo $rowinvoice['subtotal'] ?></div>
                </div>
                <div class="row">
                    <div class="col-2">Addons:</div>
                    <div class="col">$<?php echo $rowinvoice['addons'] ?></div>
                </div>
                <div class="row">
                    <div class="col-2">Pernocta:</div>
                    <div class="col">$<?php echo $rowinvoice['pernocta'] ?></div>
                </div>
                <div class="row">
                    <div class="col-2">Tax:</div>
                    <div class="col"><?php echo $rowinvoice['tax'] ?>%</div>
                </div>
                <div class="row">
                    <div class="col-2">Amount:</div>
                    <div class="col">$<?php echo $rowinvoice['amount'] ?></div>
                </div>
            </div>
            <hr class="hr-style">
            <br><br><br><br><br><br>
            <p style="font-family: 'Jost', sans-serif;">
                Le adjunto la cotización y nuestra información bancaria. Quedo a su disposición por cualquier consulta. <br>
                Atentamente
                <br><br><br>
                Departamento de Ventas - <?php echo $rowcompany['email']?>
            </p>
            <br><br><br><br><br><br><br><br><br><br><br><br>
            <hr style="border: 1px solid;">
            <div class="d-flex flex-row-reverse">
                <span class="page-num-bg rounded-pill px-3 font-weight-bold"> 1/4 </span>
            </div>
            <br><br> 
        </div>
        <div id="pag2" style="height: 1500px;"><!-- PAGINA 2-->
            <div class="container container-bg rounded-pill py-3 my-3 text-white">
                <div class="row">
                    <div class="col-7">
                        <img src="<?php echo $rowcompany['logo_dir']?>" height="50px" class="rounded-circle ml-3">
                    </div> 
                    <div class="col text-right mr-4 my-auto" style="font-family: 'Archivo', sans-serif; font-size: larger;">
                        C H A R T E R &nbsp;&nbsp;&nbsp;Q U O T E
                    </div>   
                </div>
            </div>
            <br>
            <p class="font-weight-bold">
                Quote # : <?php echo $rowinvoice['quote']?> <br>
                Date: <?php echo $rowinvoice['date']?> <br>
            </p>
            <br>

            <p style="font-size: smaller; font-family: 'Roboto', sans-serif;;">
                <?php echo $rowcompany['tyc']?>
                <br><br><br><br>
                Yo, ____________________________ acepto los términos y condiciones arriba descritas como la parte arrendadora. 
                <br><br>Firma: 
                <br><br>Fecha:
            </p>
            <br><br><br><br><br><br> 
            <hr style="border: 1px solid;">
            <div class="d-flex flex-row-reverse">
                <span class="page-num-bg rounded-pill px-3 font-weight-bold"> 2/4 </span>
            </div>
            <br>
        </div>
        <div id="pag3" style="height: 1500px;"> <!-- PAGINA 3-->
            <div class="container container-bg rounded-pill py-3 my-3 text-white">
                <div class="row">
                    <div class="col-7">
                        <img src="<?php echo $rowcompany['logo_dir']?>" height="50px" class="rounded-circle ml-3">
                    </div> 
                    <div class="col text-right mr-4 my-auto" style="font-family: 'Archivo', sans-serif; font-size: larger;">
                        C H A R T E R &nbsp;&nbsp;&nbsp;Q U O T E
                    </div>   
                </div>
            </div>
            <br>
            <p class="font-weight-bold">
                Quote # : <?php echo $rowinvoice['quote']?> <br>
                Date: <?php echo $rowinvoice['date']?> <br>
            </p>
            <br><br>

            <div class="container text-center title-color" style="font-family: 'Archivo', sans-serif; font-size: larger;">
                MANIFIESTO DE PASAJEROS
            </div>
            <br>
            <div class="row">
                <div class="col-auto border-text container-bg ml-auto m-1 px-5 py-3 text-color text-center">Nombre y Apellido</div>
                <div class="col-auto border-text container-bg m-1 px-4 py-3 text-color text-center">Nationalized</div>
                <div class="col-auto border-text container-bg m-1 px-4 py-3 text-color text-center">#Pasaporte</div>
                <div class="col-auto border-text container-bg m-1 px-4 py-3 text-color text-center">Expiration</div>
                <div class="col-auto border-text container-bg mr-auto m-1 px-4 py-3 text-color text-center">Fecha de nacimiento</div>
            </div>

            <div class="row">
                <div class="col-auto ml-auto m-1 px-5 py-2 border-text text-bg">&emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp;&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto mr-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;</div>
            </div>

            <div class="row">
                <div class="col-auto ml-auto m-1 px-5 py-2 border-text text-bg">&emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp;&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto mr-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;</div>
            </div>

            <div class="row">
                <div class="col-auto ml-auto m-1 px-5 py-2 border-text text-bg">&emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp;&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto mr-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;</div>
            </div>

            <div class="row">
                <div class="col-auto ml-auto m-1 px-5 py-2 border-text text-bg">&emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp;&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto mr-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;</div>
            </div>

            <div class="row">
                <div class="col-auto ml-auto m-1 px-5 py-2 border-text text-bg">&emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp;&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto mr-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;</div>
            </div>

            <div class="row">
                <div class="col-auto ml-auto m-1 px-5 py-2 border-text text-bg">&emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp;&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto mr-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;</div>
            </div>

            <div class="row">
                <div class="col-auto ml-auto m-1 px-5 py-2 border-text text-bg">&emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp;&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp; &emsp;</div>
                <div class="col-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;</div>
                <div class="col-auto mr-auto m-1 px-4 py-2 border-text text-bg">&emsp; &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;</div>
            </div>

            <br><br>
            <p style="font-family: 'Jost', sans-serif;">
                Es importante enviar copia de la documentación a <?php echo $rowcompany['email']?>
            </p>
            <br><br><br><br><br><br>
            <div class="container text-center title-color" style="font-family: 'Archivo', sans-serif; font-size: medium;;">
                REQUISITOS ESPECIALES DE PASAJEROS
            </div>
            <br>
            <div class="m-5">
                <div class="row">
                    <div class="col-2 req-table rounded-top-left py-1">Catering</div>
                    <div class="col req-table rounded-top-right  py-1"></div>
                </div>
                <div class="row">
                    <div class="col-2 req-table  py-1">Transportacion</div>
                    <div class="col req-table  py-1"></div>
                </div>
                <div class="row">
                    <div class="col-2 req-table  py-1">Hotel</div>
                    <div class="col req-table  py-1"></div>
                </div>
                <div class="row">
                    <div class="col-2 req-table rounded-bottom-left  py-1">Otros</div>
                    <div class="col req-table rounded-bottom-right  py-1"></div>
                </div>
            </div>
            <br><br><br><br><br>
            <hr style="border: 1px solid;">
            <div class="d-flex flex-row-reverse">
                <span class="page-num-bg rounded-pill px-3 font-weight-bold"> 3/4 </span>
            </div>

            <br><br>   
        </div>
        <div id="pag4" style="height: 1500px;"><!-- PAGINA 4-->
            <div class="container container-bg rounded-pill py-3 my-3 text-white">
                <div class="row">
                    <div class="col-7">
                        <img src="<?php echo $rowcompany['logo_dir']?>" height="50px" class="rounded-circle ml-3">
                    </div> 
                    <div class="col text-right mr-4 my-auto" style="font-family: 'Archivo', sans-serif; font-size: larger;">
                        C H A R T E R &nbsp;&nbsp;&nbsp;Q U O T E
                    </div>   
                </div>
            </div>
            <br>
            <p class="font-weight-bold">
                Quote # : <?php echo $rowinvoice['quote']?> <br>
                Date: <?php echo $rowinvoice['date']?> <br>
            </p>
            <div class="row">
                <div class="col my-1 mx-4 py-3 container-bg border-text text-color font-weight-bold text-center">
                    Autorización para pagos vía tarjeta de crédito
                </div>
            </div>
            <div class="row">
                <div class="col-3 ml-4 my-1 py-2 title-color text-center border-text text-bg" style="font-family: 'Jost', sans-serif;">
                    TC Tipo (AMEX, VI, MC)
                </div>
                <div class="col mr-4 mx-1 my-1 py-2 border-text text-bg"></div>
            </div>
            <div class="row">
                <div class="col-3 ml-4 my-1 py-2 title-color text-center border-text text-bg" style="font-family: 'Jost', sans-serif;">
                    Numero de tarjeta
                </div>
                <div class="col mr-4 mx-1 my-1 py-2 border-text text-bg"></div>
            </div>
            <div class="row">
                <div class="col-3 ml-4 my-1 py-2 title-color text-center border-text text-bg" style="font-family: 'Jost', sans-serif;">
                    Fecha de Expiación
                </div>
                <div class="col mr-4 mx-1 my-1 py-2 border-text text-bg"></div>
            </div>
            <div class="row">
                <div class="col-3 ml-4 my-1 py-2 title-color text-center border-text text-bg" style="font-family: 'Jost', sans-serif;">
                    CSC (Card Security Code)
                </div>
                <div class="col mr-4 mx-1 my-1 py-2 border-text text-bg"></div>
            </div>
            <div class="row">
                <div class="col-3 ml-4 my-1 py-2 title-color text-center border-text text-bg" style="font-family: 'Jost', sans-serif;">
                    Nombre del titular
                </div>
                <div class="col mr-4 mx-1 my-1 py-2 border-text text-bg"></div>
            </div>
            <div class="row">
                <div class="col-3 ml-4 my-1 py-2 title-color text-center border-text text-bg" style="font-family: 'Jost', sans-serif;">
                    Dirección registrada
                </div>
                <div class="col mr-4 mx-1 my-1 py-2 border-text text-bg"></div>
            </div>
            <br><br>
            <p style="font-size: smaller; font-family: 'Roboto', sans-serif;;">
                El emisor de la tarjeta identificado en este acuerdo está autorizado a pagar a <?php echo $rowcompany['name']?>. una tarifa de tarjeta de crédito del 4% adicional a la cotización en nombre de la empresa del titular de la tarjeta. El emisor de esta tarjeta identificado en este acuerdo también está autorizado a pagar a <?php echo $rowcompany['name']?>. la cotización y el pago de la tarifa de la tarjeta adeudada, cualquier tarifa interna pendiente y créditos. El titular de la tarjeta que suscribe se compromete a pagar en su totalidad dicho pago al emisor de la tarjeta sujeto y de conformidad con el acuerdo que rige el uso de dicha tarjeta.
            </p>
            <br>
            <p class="font-weight-bold" style="font-size: large;">Información de Transferencia</p>
            <p style="font-size: smaller; font-family: 'Roboto', sans-serif;;">
                Compañia - <?php echo $rowcompany['name']?>. <br>
                Cuenta Bancaria - <?php echo $rowcompany['account']?> <br>
                ABA Routing - <?php echo $rowcompany['aba']?> <br>
                SWIFT - <?php echo $rowcompany['swift']?> <br>
                Nombre de Banco - <?php echo $rowcompany['bank_name']?> <br>
                Dirección de Banco - <?php echo $rowcompany['bank_address']?> <br>
                <br>
                Le adjunto la contización y nuestra información bancaria. Podemos cobrar tarjetas de crédito a un 4% adicional. Quedo a su disposición por cualquier consulta.
                <br><br>
                Atentamente
                <br>
                Departamento de Ventas - <?php echo $rowcompany['email']?>
            </p>
            <br>
            <p class="font-weight-bold" style="font-size: small;"> Firma:_____________________</p>
            <p class="font-weight-bold" style="font-size: small;"> Fecha:_____________________</p>
            <br><br><br><br><br><br><br><br><br><br><br><br>
            <hr style="border: 1px solid;">
            <div class="d-flex flex-row-reverse">
                <span class="page-num-bg rounded-pill px-3 font-weight-bold"> 4/4 </span>
            </div>
            <br><br>
        </div>
    </div>
</body>
<script>
    window.jsPDF = window.jspdf.jsPDF;
    document.getElementById("pdf").onload = function() {generatePDF()};

    function generatePDF() {
        const pdf = new jsPDF();
        const pag1 = document.querySelector("#pag1");
        var imgPag1;
        const pag2 = document.querySelector("#pag2");
        var imgPag2;
        const pag3 = document.querySelector("#pag3");
        var imgPag3;
        const pag4 = document.querySelector("#pag4");
        var imgPag4;

        html2canvas(pag1).then(canvas => {
            imgPag1 = canvas.toDataURL('image/png');
            pdf.addImage(imgPag1, 'PNG', 10, 10,190,290);

            html2canvas(pag2).then(canvas => {
                pdf.addPage();
                console.log("pag2");
                imgPag2 = canvas.toDataURL('image/png');
                pdf.addImage(imgPag2, 'PNG', 10, 10,190,290);

                html2canvas(pag3).then(canvas => {
                    console.log("pag3");
                    imgPag3 = canvas.toDataURL('image/png');
                    pdf.addPage();
                    pdf.addImage(imgPag3, 'PNG', 10, 10,190,290);

                    html2canvas(pag4).then(canvas => {
                        console.log("pag4");
                        imgPag4 = canvas.toDataURL('image/png');
                        pdf.addPage();
                        pdf.addImage(imgPag4, 'PNG', 10, 10,190,290);
                    }).then(function(){
                        pdf.save("charter_quote.pdf");
                        //setTimeout(() => {console.log("SAVE");}, 1000);
                        location.href = "hellolist.php";
                    });
                });
            });
        });
     }
</script>
</html>
