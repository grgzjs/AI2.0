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
        $subtotal = $_POST['subtotal'];
        $addons = $_POST['addons'];
        $tax = $_POST['tax'];
        $amount = $_POST['amount'];

        $fdate1 = $_POST['fdate1'];
        $forigen1 = $_POST['forigen1'];
        $fdestino1 = $_POST['fdestino1'];
        $fpax1 = $_POST['fpax1'];
        $km1 = $_POST['km_vuelo1'];

        $fdate2 = $_POST['fdate2'];
        $forigen2 = $_POST['forigen2'];
        $fdestino2 = $_POST['fdestino2'];
        $fpax2 = $_POST['fpax2'];
        $km2 = $_POST['km_vuelo2'];

        $fdate3 = $_POST['fdate3'];
        $forigen3 = $_POST['forigen3'];
        $fdestino3 = $_POST['fdestino3'];
        $fpax3 = $_POST['fpax3'];
        $km3 = $_POST['km_vuelo3'];

        $fdate4 = $_POST['fdate4'];
        $forigen4 = $_POST['forigen4'];
        $fdestino4 = $_POST['fdestino4'];
        $fpax4 = $_POST['fpax4'];
        $km4 = $_POST['km_vuelo4'];

        $fdate5 = $_POST['fdate5'];
        $forigen5 = $_POST['forigen5'];
        $fdestino5 = $_POST['fdestino5'];
        $fpax5 = $_POST['fpax5'];
        $km5 = $_POST['km_vuelo5'];

        $subtotal = $subtotal == "" ? 0 : $subtotal;
        $addons = $addons == "" ? 0 : $addons;
        $tax = $tax == "" ? 0 : $tax;
        $amount = $amount == "" ? 0 : $amount;

        $sql = "insert into invoices (date,buyer_id,aircraft,subtotal,addons,tax,amount,status) Values ('$date',$idbuyer,'$aircraft',$subtotal,$addons,$tax,$amount,1)";
        $update = mysqli_query($con, $sql);
        $query = "select * from invoices order by date desc";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $quote = $row['quote'];

        $sql = "insert into invoice_detail (fecha,origen,destino,pax,km_vuelo,id_invoice) Values ('$fdate1','$forigen1','$fdestino1','$fpax1','$km1','$quote')";
        $update = mysqli_query($con, $sql);
        if (!empty($fdate2)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,km_vuelo,id_invoice) Values ('$fdate2','$forigen2','$fdestino2','$fpax2','$km2','$quote')";
            $update = mysqli_query($con, $sql);
        }
        if (!empty($fdate3)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,km_vuelo,id_invoice) Values ('$fdate3','$forigen3','$fdestino3','$fpax3','$km3','$quote')";
            $update = mysqli_query($con, $sql);
        }
        if (!empty($fdate4)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,km_vuelo,id_invoice) Values ('$fdate4','$forigen4','$fdestino4','$fpax4','$km4','$quote')";
            $update = mysqli_query($con, $sql);
        }
        if (!empty($fdate5)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,km_vuelo,id_invoice) Values ('$fdate5','$forigen5','$fdestino5','$fpax5','$km5','$quote')";
            $update = mysqli_query($con, $sql);
        }
    }else{
        $quote = $_GET['id'];
    }
    $invoice = mysqli_query($con, 'select * from invoices where quote=' . $quote);
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
    $detail_tramo = mysqli_query($con, 'select * from invoice_detail where id_invoice=' . $quote);
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
        <div id="pag1">
            <div class="container container-bg rounded-pill py-3 my-3 text-white">
                <div class="row">
                    <div class="col-7">
                        <img src="<?php echo $rowcompany['logo_dir']?>" height="50px" class="rounded pl-3">
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
                    <div class="col">Kms</div>
                </div>
            </div>
            <?php while ($rowdetail_tramo = mysqli_fetch_assoc($detail_tramo)){?>
                <div class="row font-weight-bold mx-auto text-secondary">
                    <div class="col-3"><?php echo $rowdetail_tramo['fecha']?></div>
                    <div class="col"><?php echo $rowdetail_tramo['origen']?></div>
                    <div class="col"><?php echo $rowdetail_tramo['destino']?></div>
                    <div class="col"><?php echo $rowdetail_tramo['Pax']?></div>
                    <div class="col"><?php echo $rowdetail_tramo['km_vuelo']?></div>
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
                    <div class="col-2">Tax:</div>
                    <div class="col">$<?php echo $rowinvoice['tax'] ?></div>
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
                <span class="page-num-bg rounded-pill px-3 font-weight-bold text-black"> 1/4 </span>
            </div>
            <br><br> 
        </div>
        <div id="pag2"><!-- PAGINA 2-->
            <div class="container container-bg rounded-pill py-3 my-3 text-white">
                <div class="row">
                    <div class="col-7">
                        <img src="<?php echo $rowcompany['logo_dir']?>" height="50px" class="rounded pl-3">
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
                DEFINICIONES Partes – Las dos partes que están entrando en este acuerdo son "Arrendador" y "Arrendataria". Arrendador - El individuo o entidad solicitando el servicio de charter.Arrendataria – La compañía que provee el servicio, conocido como "<?php echo $rowcompany['name']?>"
                <br><br>
                GENERALIDADES. Esta cotización es para aviones específicos; Si fuera necesario cambiar de avión, el costo puede variar en consecuencia. El Arrendador será́ informado de cualquier cambio antes del vuelo y la cantidad de costo adicional, si hubiere alguna. La cotización se basa en la disponibilidad de aviones y tripulación y tiene una validez de 7 días. Tras la aceptación de los términos y condiciones que figuran en este documento, este documento se convierte en un contrato legal y vinculante entre las dos partes. 
                <br><br>
                PRECIOS, PAGOS, CANCELACION Y VENTANA DE PRESENTACION: Todos los precios indicados en este documento son exactos en la fecha citada, están sujetas a cambios sin previo aviso y son válidos por 7 días. El pago completo es obligado antes de la salida.Se requiere aviso de cancelación por lo menos 24 horas para evitar un cargo por cancelación.Por cancelación dentro de 12 horas del vuelo se cobrará el equivalente a una hora de vuelo. 
                Un no show o cancelación con menos de 12 hrs de anticipación al vuelo se cargará el importe total. Se devengará un interés a una tasa del 2% al mes, después de 30 días de falta de pago.El arrendador es responsable de los honorarios de abogado en el cobro de facturas vencidas.Ventana de presentación: La compañía Arrendataria esperará hasta 60 minutos posteriores a la hora de salida programada originalmente a todos los pasajeros. Si no han llegado todos los pasajeros dentro de los sesenta minutos, <?php echo $rowcompany['name']?> tiene el derecho a salir con los pasajeros los presentes. Si los pasajeros han llegado a los sesenta minutos posteriores a la hora de salida programada, <?php echo $rowcompany['name']?> puede cancelar el vuelo y aplicar la pena por cancelación. Si el cliente llega más de 60 minutos después de la hora de salida programada originalmente, <?php echo $rowcompany['name']?> se reserva el derecho de cobrar 12 minutos por cada hora o porción del mismo que <?php echo $rowcompany['name']?> haya esperado al pasajero retrasado.Desplazamiento de la salida: La ventana de presentación puede ampliarse mediante la compra del aplazamiento de ventana de 30 minutos por cada hora. Si la compañía Arrendataria está retrasada 30 a 60 minutos después de la hora de salida programada originalmente, el arrendador será compensado con 12 minutos para los vuelos futuros. 
                Si la compañía Arrendataria se retrasa más de 60 minutos, el arrendador será compensado con 30 minutos por hora tarde hasta el tiempo total del vuelo. Todas las compensaciones se harán en horas, no hay ningún reembolso en efectivo o transferencia. 
                <br><br>
                DOCUMENTACIÓN. Identificaciones con fotografía de todos los pasajeros son necesarias antes del vuelo. Adicionalmente los documentos oficiales de viaje (pasaportes, visas, etc.) son responsabilidad de cada pasajero. 
                <br><br>
                CAMBIOS DE ITINERARIO E INFORMACION DE LOS CAMBIOS. Los cambios de Itinerario son permitidos, pero sujeto a la disponibilidad de aviones y tripulación y también sujetos a ajuste de precio. La notificación de cambios o cancelaciones debe ser por escrito y transmitido por correo electrónico a <?php echo $rowcompany['email']?> dentro del plazo de cancelación indicado anteriormente. 
                <br><br>
                RESPONSABILIDAD. <?php echo $rowcompany['name']?> no será responsable por cualquier lesión, daño, pérdida, gasto, daños indirectos, especiales o consecuentes u otra irregularidad causada por el defecto de cualquier vehículo o transporte, o la negligencia de cualquier compañía o persona dedicada a transportar al pasajero o llevar a cabo los preparativos para su viaje o por accidente, retraso, horario de vuelos, cambio, cancelación, enfermedad, clima, huelgas, guerra, cuarentena o cualquier causa similar.Nuestra responsabilidad estará limitada a la cantidad pagada a nosotros, y cualquier reclamación será adjudicada en y regida por las leyes de los Estados en los que tenemos nuestro centro de negocios principal. En caso de que el usuario o pasajeros sujetos del servicio, mediante amenazas, violencia, intimidación o cualquier medio ilícito intente cambiar el destino de la aeronave o hiciera desviar su ruta, se hará acreedor a las sanciones correspondientes que prevé el Código Penal vigente para el Distrito Federal. 
                <br><br>
                TERMINACIÓN PARCIAL DE LOS VUELOS. La arrendadora no es responsable por los gastos incurridos para el reemplazo de aeronaves en caso de falla mecánica, (en este caso los cargos solo aplicaran a las porciones del vuelo completado). Si un vuelo no llega a su destino debido al mal tiempo, los cargos se aplican a cualquier destino alcanzado y al vuelo de regreso del avión y la tripulación (con o sin pasajeros) a la base. En el caso de falla mecánica, la compañía arrendataria podrá proporcionar a su opción un transporte sustituto, que se percibirá como un suplemento al arrendatario. En tales casos los cargos a la arrendadora aplican sólo en las partes de vuelo completado. 
                <br><br>
                OPERACIONAL. Aviones propiedad o arrendados por <?php echo $rowcompany['name']?> son operados bajo el AOC: ANAC – 269 . Aviones contratados son operados bajo sus respectivos permisos y certificados, en cuyo caso el arrendatario se mantendrá indemne e indemnizará a la compañía arrendadora contra cualquier y todas las pérdidas. 
                Cargos adicionales pueden incluir comisariatos, teléfono satelital, de-iceing, transporte terrestre y cambios de Itinerario. Las tarifas o cobros por aterrizaje y facilidades son estimados y pueden variar. 
                <br><br><br><br>
                Yo, ____________________________ acepto los términos y condiciones arriba descritas como la parte arrendadora. 
                <br><br>Firma: 
                <br><br>Fecha:
            </p>
            <br><br><br><br>
            <hr style="border: 1px solid;">
            <div class="d-flex flex-row-reverse">
                <span class="page-num-bg rounded-pill px-3 font-weight-bold text-black"> 2/4 </span>
            </div>

            <br><br> 
        </div>
        <div id="pag3"> <!-- PAGINA 3-->
            <div class="container container-bg rounded-pill py-3 my-3 text-white">
                <div class="row">
                    <div class="col-7">
                        <img src="<?php echo $rowcompany['logo_dir']?>" height="50px" class="rounded pl-3">
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
            <br><br><br><br><br><br>
            <hr style="border: 1px solid;">
            <div class="d-flex flex-row-reverse">
                <span class="page-num-bg rounded-pill px-3 font-weight-bold text-black"> 3/4 </span>
            </div>

            <br><br><br>   
        </div>
        <div id="pag4"><!-- PAGINA 4-->
            <div class="container container-bg rounded-pill py-3 my-3 text-white">
                <div class="row">
                    <div class="col-7">
                        <img src="<?php echo $rowcompany['logo_dir']?>" height="50px" class="rounded pl-3">
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
                El emisor de la tarjeta identificado en este acuerdo está autorizado a pagar a <?php echo $rowcompany['name']?>. una tarifa de tarjeta de crédito del 4% adicional a la cotización en nombre de la empresa del titular de la tarjeta. El emisor de esta tarjeta identificado en este acuerdo también está autorizado a pagar 2 <?php echo $rowcompany['name']?>. la cotización y el pago de la tarifa de la tarjeta adeudada, cualquier tarifa interna pendiente y créditos. El titular de la tarjeta que suscribe se compromete a pagar en su totalidad dicho pago al emisor de la tarjeta sujeto y de conformidad con el acuerdo que rige el uso de dicha tarjeta.
            </p>
            <br>
            <p class="font-weight-bold" style="font-size: large;">Información de Transferencia</p>
            <p style="font-size: smaller; font-family: 'Roboto', sans-serif;;">
                Company - <?php echo $rowcompany['name']?>. <br>
                Account - <?php echo $rowcompany['account']?> <br>
                ABA Routing - <?php echo $rowcompany['aba']?> <br>
                Swift - <?php echo $rowcompany['swift']?> <br>
                Bank Name - <?php echo $rowcompany['bank_name']?> <br>
                Bank Address - <?php echo $rowcompany['bank_address']?> <br>
                <br>
                Le adjunto la contización y nuestra información bancaria. Podemos cobrar tarjetas de crédito a un 4% adicional. Quedo a su disposición por cualquier consulta.
                <br><br>
                Atentamente
                <br>
                Departamento de Ventas - <?php echo $rowcompany['email']?>
            </p>
            <br>
            <p class="font-weight-bold" style="font-size: small;"> Cardholder Signature:_____________________</p>
            <p class="font-weight-bold" style="font-size: small;"> Date:_____________________</p>
            <br><br><br><br><br>
            <hr style="border: 1px solid;">
            <div class="d-flex flex-row-reverse">
                <span class="page-num-bg rounded-pill px-3 font-weight-bold text-black"> 4/4 </span>
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
