<?php
include("conexion.php");
include("tcpdf/tcpdf.php");

$quote = $_GET['id'];
$sql = 'select * from invoices where quote=' . $quote;
$invoice = mysqli_query($con, $sql);
$rowinvoice = mysqli_fetch_assoc($invoice);
$sqlbuyer = 'select * from Contact where id=' . $rowinvoice['buyer_id'];
$buyer = mysqli_query($con, $sqlbuyer);
$rowbuyer = mysqli_fetch_assoc($buyer);
$sqldetail_tramo = 'select * from invoice_detail where id_invoice=' . $quote;
$detail_tramo = mysqli_query($con, $sqldetail_tramo);

$tramoids = array();
while ($rowdetail_tramo = mysqli_fetch_assoc($detail_tramo)) {
    array_push($tramoids, $rowdetail_tramo['Id']);
}
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator('Gustoso Marketing');
$pdf->SetAuthor('JSosa');
$pdf->SetTitle('YAC Soft');
$pdf->SetSubject('Your Subject');
$pdf->SetKeywords('Keywords');

//$pdf->SetHeaderData('src/youlogo.gif', 130,'Charter Quote', 'descripcion');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage();

// set font
$pdf->SetFont('helvetica', 'b', 10);

// write some text

$html = '
<br><br><br>
<div style="text-align:center;">
    <img src="assets/img/pdf/header.jpg" alt="Logo" style="width: 2250px; height: 200px">
</div>
<br><br>
<table> 
    <tr>
        <td>Quote # : ' . $quote . '</td>
    </tr>
    <tr>
        <td>Date: ' . $rowinvoice['date'] . ' </td>
    </tr>
    <tr>
        <td>Buyer: ' . $rowbuyer['first_name'] . '</td>
    </tr>
    <tr>
        <td>Address: ' . $rowbuyer['address'] . '</td>
    </tr>
</table>
<p>Aircraft: ' . $rowinvoice['aircraft'] . '</p><br><br>
<div style="text-align:center;">
    <img src="src/CitationV.png" alt="Logo" style="border-radius: 10%">
</div>
<br>

<!--
<th style="-webkit-column-count: 3; -moz-column-count: 3; column-count: 3;"><img src="assets/img/pdf/info.jpg" alt=""></th>
-->
<table>
    <tr>
        <th style="text-align:center; background-color: #3b1942; border: 1.2em solid #3b1942; color: #ccff99; border-radius: 50px 0px 0px 50px;">Fecha Vuelo</th>
        <th style="text-align:center; background-color: #3b1942; border: 1.2em solid #3b1942; color: #ccff99;">Origen</th>
        <th style="text-align:center; background-color: #3b1942; border: 1.2em solid #3b1942; color: #ccff99;">Destino</th>
        <th style="text-align:center; background-color: #3b1942; border: 1.2em solid #3b1942; color: #ccff99;">Pasajeros</th>
        <th style="text-align:center; background-color: #3b1942; border: 1.2em solid #3b1942; color: #ccff99; border-radius: 0px 50px 50px 0px;">Kms</th>
    </tr>
    <tr>
        <td><br></td>
        <td><br></td>
        <td><br></td>
        <td><br></td>
        <td><br></td>
    </tr>
';
$sqldetail = 'select * from invoice_detail where id_invoice=' . $quote;
$detail = mysqli_query($con, $sqldetail);
while ($rowdetail = mysqli_fetch_assoc($detail)) {
    $html = $html . '
    <tr>
        <td style="color: #878787; text-align:center;">' . $rowdetail['fecha'] . '</td>
        <td style="color: #878787; text-align:center;">' . $rowdetail['origen'] . '</td>
        <td style="color: #878787; text-align:center;">' . $rowdetail['destino'] . '</td>
        <td style="color: #878787; text-align:center;">' . $rowdetail['Pax'] . '</td>
        <td style="color: #878787; text-align:center;">' . $rowdetail['km_vuelo'] . '</td>
    </tr>';
}
$html = $html . '</table>
<br><br><br>
<img src="assets/img/pdf/hr.jpg" alt="hr not found :/" style="width: 1800px; height: 7px;"><br>
<table style="width:30%"> 
    <tr>
        <td style="color: #878787">Subtotal:</td>
        <td style="color: #878787">$' . number_format($rowinvoice['subtotal'], 2) . '</td>
    </tr>
    <tr>
        <td style="color: #878787">Addons:</td>
        <td style="color: #878787">$' . number_format($rowinvoice['addons'], 2) . '</td>
    </tr>
    <tr>
        <td style="color: #878787">Tax:</td>
        <td style="color: #878787">$' . number_format($rowinvoice['tax'], 2) . '</td>
    </tr>
    <tr>
        <td style="color: #878787">Amount:</td>
        <td style="color: #878787">$' . number_format($rowinvoice['amount'], 2) . '</td>
    </tr>
</table>
<img src="assets/img/pdf/hr.jpg" alt="hr not found :/" style="width: 1800px; height: 7px;"><br>
';

// <hr style="background-color: #ccff99; border: 3px solid #ccff99; border-radius: 7px 7px 7px 7px;">

$html = $html . '
<br><br><br><br><br>
<p>Le adjunto la cotización y nuestra información bancaria. Quedo a su disposición por cualquier consulta.</p>
<p>Atentamente</p>
<p>Departamento de Ventas - operaciones@youaircharter.com</p>
<style>
.gray-box {
    background-color: lightgray;
    padding: 10px;
    border: 1px solid gray;
}
</style>

';


$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();

$pdf->SetFont('helvetica', 'b', 10);

$html2 = '
<br><br><br>
<div style="text-align:center;">
    <img src="assets/img/pdf/header.jpg" alt="Logo" style="width: 2250px; height: 200px">
</div>
<br><br>
<table> 
    <tr>
        <td>Quote # : ' . $quote . '</td>
    </tr>
    <tr>
        <td>Date: ' . $rowinvoice['date'] . '</td>
    </tr>
</table>';

$pdf->writeHTML($html2, true, false, true, false, '');

$pdf->SetFont('dejavusans', '', 7);

$html3 = '
<br><br><p>DEFINICIONES Partes – Las dos partes que están entrando en este acuerdo son "Arrendador" y "Arrendataria". Arrendador - El individuo o entidad solicitando el servicio de charter.Arrendataria – La compañía que provee el servicio, conocido como "You Air SRL"
<br><br>GENERALIDADES. Esta cotización es para aviones específicos; Si fuera necesario cambiar de avión, el costo puede variar en consecuencia. El Arrendador será́ informado de cualquier cambio antes del vuelo y la cantidad de costo adicional, si hubiere alguna. La cotización se basa en la disponibilidad de aviones y tripulación y tiene una validez de 7 días. Tras la aceptación de los términos y condiciones que figuran en este documento, este documento se convierte en un contrato legal y vinculante entre las dos partes. 
<br><br>PRECIOS, PAGOS, CANCELACION Y VENTANA DE PRESENTACION: Todos los precios indicados en este documento son exactos en la fecha citada, están sujetas a cambios sin previo aviso y son válidos por 7 días. El pago completo es obligado antes de la salida.Se requiere aviso de cancelación por lo menos 24 horas para evitar un cargo por cancelación.Por cancelación dentro de 12 horas del vuelo se cobrará el equivalente a una hora de vuelo. 
Un no show o cancelación con menos de 12 hrs de anticipación al vuelo se cargará el importe total. Se devengará un interés a una tasa del 2% al mes, después de 30 días de falta de pago.El arrendador es responsable de los honorarios de abogado en el cobro de facturas vencidas.Ventana de presentación: La compañía Arrendataria esperará hasta 60 minutos posteriores a la hora de salida programada originalmente a todos los pasajeros. Si no han llegado todos los pasajeros dentro de los sesenta minutos, You Air SRL tiene el derecho a salir con los pasajeros los presentes. Si los pasajeros han llegado a los sesenta minutos posteriores a la hora de salida programada, You Air SRL puede cancelar el vuelo y aplicar la pena por cancelación. Si el cliente llega más de 60 minutos después de la hora de salida programada originalmente, You Air SRL se reserva el derecho de cobrar 12 minutos por cada hora o porción del mismo que You Air SRL haya esperado al pasajero retrasado.Desplazamiento de la salida: La ventana de presentación puede ampliarse mediante la compra del aplazamiento de ventana de 30 minutos por cada hora. Si la compañía Arrendataria está retrasada 30 a 60 minutos después de la hora de salida programada originalmente, el arrendador será compensado con 12 minutos para los vuelos futuros. 
Si la compañía Arrendataria se retrasa más de 60 minutos, el arrendador será compensado con 30 minutos por hora tarde hasta el tiempo total del vuelo. Todas las compensaciones se harán en horas, no hay ningún reembolso en efectivo o transferencia. 
<br><br>DOCUMENTACIÓN. Identificaciones con fotografía de todos los pasajeros son necesarias antes del vuelo. Adicionalmente los documentos oficiales de viaje (pasaportes, visas, etc.) son responsabilidad de cada pasajero. 
<br><br>CAMBIOS DE ITINERARIO E INFORMACION DE LOS CAMBIOS. Los cambios de Itinerario son permitidos, pero sujeto a la disponibilidad de aviones y tripulación y también sujetos a ajuste de precio. La notificación de cambios o cancelaciones debe ser por escrito y transmitido por correo electrónico a operaciones@youaircharter.com dentro del plazo de cancelación indicado anteriormente. 
<br><br>RESPONSABILIDAD. You Air SRL no será responsable por cualquier lesión, daño, pérdida, gasto, daños indirectos, especiales o consecuentes u otra irregularidad causada por el defecto de cualquier vehículo o transporte, o la negligencia de cualquier compañía o persona dedicada a transportar al pasajero o llevar a cabo los preparativos para su viaje o por accidente, retraso, horario de vuelos, cambio, cancelación, enfermedad, clima, huelgas, guerra, cuarentena o cualquier causa similar.Nuestra responsabilidad estará limitada a la cantidad pagada a nosotros, y cualquier reclamación será adjudicada en y regida por las leyes de los Estados en los que tenemos nuestro centro de negocios principal. En caso de que el usuario o pasajeros sujetos del servicio, mediante amenazas, violencia, intimidación o cualquier medio ilícito intente cambiar el destino de la aeronave o hiciera desviar su ruta, se hará acreedor a las sanciones correspondientes que prevé el Código Penal vigente para el Distrito Federal. 
<br><br>TERMINACIÓN PARCIAL DE LOS VUELOS. La arrendadora no es responsable por los gastos incurridos para el reemplazo de aeronaves en caso de falla mecánica, (en este caso los cargos solo aplicaran a las porciones del vuelo completado). Si un vuelo no llega a su destino debido al mal tiempo, los cargos se aplican a cualquier destino alcanzado y al vuelo de regreso del avión y la tripulación (con o sin pasajeros) a la base. En el caso de falla mecánica, la compañía arrendataria podrá proporcionar a su opción un transporte sustituto, que se percibirá como un suplemento al arrendatario. En tales casos los cargos a la arrendadora aplican sólo en las partes de vuelo completado. 
<br><br>OPERACIONAL. Aviones propiedad o arrendados por You Air SRL son operados bajo el AOC: ANAC – 269 . Aviones contratados son operados bajo sus respectivos permisos y certificados, en cuyo caso el arrendatario se mantendrá indemne e indemnizará a la compañía arrendadora contra cualquier y todas las pérdidas. 
Cargos adicionales pueden incluir comisariatos, teléfono satelital, de-iceing, transporte terrestre y cambios de Itinerario. Las tarifas o cobros por aterrizaje y facilidades son estimados y pueden variar. 
<br><br><br><br>Yo, ____________________________ acepto los términos y condiciones arriba descritas como la parte arrendadora. 
<br><br>Firma: 
<br><br>Fecha: 
</p>';

$pdf->writeHTML($html3, true, false, true, false, '');

$pdf->setPageMark();

$pdf->SetFont('helvetica', 'b', 10);


// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

$pdf->AddPage();

$pdf->SetFont('helvetica', 'b', 10);

$html4 = '
<br><br><br>
<div style="text-align:center;">
    <img src="assets/img/pdf/header.jpg" alt="Logo" style="width: 2250px; height: 200px">
</div>
<br><br>
<table> 
    <tr>
        <td>Quote # : ' . $quote . '</td>
    </tr>
    <tr>
        <td>Date: ' . $rowinvoice['date'] . '</td>
    </tr>
</table>
<br><br>
<br><br><br><br>
';

$html4 = $html4 . '
<table>
    <tr>
        <th style="text-align:center; background-color: #3b1942; border: 1.2em solid #3b1942; color: #ccff99; border-radius: 50px 0px 0px 50px;">Nombre y Apellido</th>
        <th style="text-align:center; background-color: #3b1942; border: 1.2em solid #3b1942; color: #ccff99;">Nationalized</th>
        <th style="text-align:center; background-color: #3b1942; border: 1.2em solid #3b1942; color: #ccff99;">#Pasaporte</th>
        <th style="text-align:center; background-color: #3b1942; border: 1.2em solid #3b1942; color: #ccff99;">Expiration</th>
        <th style="text-align:center; background-color: #3b1942; border: 1.2em solid #3b1942; color: #ccff99; border-radius: 0px 50px 50px 0px;">Fecha de Nacimiento</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
';

$sqlpaxlist = "select c.first_name, c.last_name, c.pais, c.dnipass, c.f_nacimiento from Contact c, opstramo o where o.contact_id=c.id and o.funcion ='null' and (";
for ($i = 0; $i < count($tramoids); $i++) {
    $sqlpaxlist .= "o.tramo_id=" . $tramoids[$i];
    if ($i < count($tramoids) - 1) {
        $sqlpaxlist .= " or ";
    }
}
$sqlpaxlist .= ") group by o.contact_id";
// echo "<script>console.log('$sqlpaxlist')</script>";
$rowspax = mysqli_query($con, $sqlpaxlist);
while ($rowpax = mysqli_fetch_assoc($rowspax)) {
    $html4 = $html4 . '
    <tr>
        <td style="color: #878787; text-align:center;">' . $rowpax['first_name'] . ' ' . $rowpax['last_name'] . '</td>
        <td style="color: #878787; text-align:center;">' . $rowpax['pais'] . '</td>
        <td style="color: #878787; text-align:center;">' . $rowpax['dnipass'] . '</td>
        <td style="color: #878787; text-align:center;">' . ' ' . '</td>
        <td style="color: #878787; text-align:center;">' . $rowpax['f_nacimiento'] . '</td>
    </tr>';
}
$html4 = $html4 . '</table>';

$pdf->writeHTML($html4, true, false, true, false, '');

$pdf->AddPage();

$pdf->SetFont('helvetica', 'b', 10);

$html3 = '
<br><br><br>
<div style="text-align:center;">
    <img src="assets/img/pdf/header.jpg" alt="Logo" style="width: 2250px; height: 200px">
</div>
<table> 
    <tr>
        <td>Quote # : ' . $quote . '</td>
    </tr>
    <tr>
        <td>Date: ' . $rowinvoice['date'] . ' </td>
    </tr>
</table>
<br>
<img src="assets/img/pdf/quote_last_page.png" alt="Logo" style="width: 2250px; height: 1100px">
<p>
El emisor de la tajeta identificado en este acuerdo esta autorizado a pagar a You Air SRL. una tarifa de tarjeta de credito del 4% adicional a la cotizacion en nombre de la empresa
del titular de la tarjeta. El emisor de esta tarjeta identificado en este acuerdo tambien esta autorizado a pagar a You Air SRL. la cotizacion y el pago de la tarifa de la
tarjeta adeudada, cualquier tarifa interna pendiente y creditos. El titular de la tarjeta que suscribe se compromete a pagar su totalidad dicho pago al emisor de la tarjeta
sujeto y de conformidad con el acuerdo que rige el uso de dicha tarjeta.
</p>
<br>
<h2>Información de Transferencia</h2>
<br>
<p>
Company - You Air SRL. <br>
Account - XXXXXX <br>
ABA Routing - XXXXXX <br>
Swift - XXXXXX <br>
Bank Name - XXXXXX <br>
Bank Address - XXXXXX
</p>
<br>
<p>Le adjunto la cotizacion y nuestra informacion bancaria. Podemos cobrar tarjetas de credito a un 4% adicional. Quedo a su dispocicion por cualquier consulta.</p>
<p>Atentamente</p>
<p>Departamento de Ventas - operaciones@youaircharter.com</p>
<br><br>
<strong>Cardholder Signature:___________________</strong><br><br>
<strong>Date:___________________</strong><br>';


$pdf->writeHTML($html3, true, false, true, false, '');

// output the PDF file to the browser
$filename = 'Quote' . $quote . '.pdf';
// $pdf->Output($filename, 'I');
$pdf->Output($filename, 'D');
