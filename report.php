<?php
include("conexion.php");
require_once('tcpdf/tcpdf.php');

class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        $image_file = 'src/youlogo1.png';
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$date = date("Y-m-d h:i:s");
$buyer = $_POST['buyer'];
$posbuyer = strrpos($buyer, "**");
$idbuyer = substr($buyer, 0, $posbuyer);
$adbuyer = substr($buyer, $posbuyer + 2);
$sqlbuyer = 'select * from contact where id = ' . $idbuyer;
$buyers = mysqli_query($con, $sqlbuyer);
$rowbuyer = mysqli_fetch_assoc($buyers);
$buyer = $rowbuyer['first_name'] . ' ' . $rowbuyer['last_name'];
$address = $_POST['address'];
$aircraft = $_POST['aircraft'];
$pos = strpos($aircraft, "*");
$preciokm = substr($aircraft, 0, $pos);
$aircraft = substr($aircraft, $pos + 1);

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

$subtotal = $_POST['subtotal'];
$addons = $_POST['addons'];
$tax = $_POST['tax'];
$amount = $_POST['amount'];
$idpdf = $_POST['idpdf'];

if ($idpdf) {
    $query = 'select * from invoices where quote = ' . $idpdf;
    $aux = $idpdf;
    //h1 esta hecho para view y reveer el pdf
    $fdate1 = $_POST['fdateh1'];
    $forigen1 = $_POST['forigenh1'];
    $fdestino1 = $_POST['fdestinoh1'];
    $fpax1 = $_POST['fpaxh1'];
    $km1 = $_POST['km_vueloh1'];

    $fdate2 = $_POST['fdateh2'];
    $forigen2 = $_POST['forigenh2'];
    $fdestino2 = $_POST['fdestinoh2'];
    $fpax2 = $_POST['fpaxh2'];
    $km2 = $_POST['km_vueloh2'];

    $fdate3 = $_POST['fdateh3'];
    $forigen3 = $_POST['forigenh3'];
    $fdestino3 = $_POST['fdestinoh3'];
    $fpax3 = $_POST['fpaxh3'];
    $km3 = $_POST['km_vueloh3'];

    $fdate4 = $_POST['fdateh4'];
    $forigen4 = $_POST['forigenh4'];
    $fdestino4 = $_POST['fdestinoh4'];
    $fpax4 = $_POST['fpaxh4'];
    $km4 = $_POST['km_vueloh4'];

    $fdate5 = $_POST['fdateh5'];
    $forigen5 = $_POST['forigenh5'];
    $fdestino5 = $_POST['fdestinoh5'];
    $fpax5 = $_POST['fpaxh5'];
    $km5 = $_POST['km_vueloh5'];
} else {

    $sql = "insert into invoices (date,buyer_id,aircraft,subtotal,addons,tax,amount,status) Values ('$date','$idbuyer','$aircraft','$subtotal','$addons','$tax','$amount',1)";
    $update = mysqli_query($con, $sql)
        or die(mysqli_error());

    $query = "select * from invoices order by date desc";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_array($result)) {

        $aux = $row['quote'];
        $sql = "insert into invoice_detail (fecha,origen,destino,pax,km_vuelo,id_invoice) Values ('$fdate1','$forigen1','$fdestino1','$fpax1','$km1','$aux')";
        $update = mysqli_query($con, $sql)
            or die(mysqli_error());


        if (!empty($fdate2)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,km_vuelo,id_invoice) Values ('$fdate2','$forigen2','$fdestino2','$fpax2','$km2','$aux')";
            $update = mysqli_query($con, $sql)
                or die(mysqli_error());
        }


        if (!empty($fdate3)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,km_vuelo,id_invoice) Values ('$fdate3','$forigen3','$fdestino3','$fpax3','$km3','$aux')";
            $update = mysqli_query($con, $sql)
                or die(mysqli_error());
        }

        if (!empty($fdate4)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,km_vuelo,id_invoice) Values ('$fdate4','$forigen4','$fdestino4','$fpax4','$km4','$aux')";
            $update = mysqli_query($con, $sql)
                or die(mysqli_error());
        }

        if (!empty($fdate5)) {
            $sql = "insert into invoice_detail (fecha,origen,destino,pax,km_vuelo,id_invoice) Values ('$fdate5','$forigen5','$fdestino5','$fpax5','$km5','$aux')";
            $update = mysqli_query($con, $sql)
                or die(mysqli_error());
        }
    }
}


// create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator('Gustoso Marketing');
$pdf->SetAuthor('JSosa');
$pdf->SetTitle('YAC Soft');
$pdf->SetSubject('Your Subject');
$pdf->SetKeywords('Keywords');

//$pdf->SetHeaderData('src/youlogo.gif', 130,'Charter Quote', 'descripcion');

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
<div style="text-align:center;">
    <img src="src/youlogo1.png" alt="Logo">
</div>
    <table> 
        <tr>
            <td>Quote # : ' . $aux . '</td>
        </tr>
        <tr>
            <td>Date: ' . $date . '</td>
        </tr>
        <tr>
            <td>Buyer: ' . $buyer . '</td>
        </tr>
        <tr>
            <td>Address: ' . $address . '</td>
        </tr>
    </table>
<p>Aircraft: ' . $aircraft . '</p><br><br>
<div style="text-align:center;">
    <img src="src/citationv.png" alt="Logo">
</div>
<br>
<table>
    <tr>
        <th>Flight Date</th>
        <th>Origin</th>
        <th>Destination</th>
        <th>Passengers</th>
        <th>Kms</th>
    </tr>
    <tr>
        <td>' . $fdate1 . '</td>
        <td>' . $forigen1 . '</td>
        <td>' . $fdestino1 . '</td>
        <td>' . $fpax1 . '</td>
        <td>' . $km1 . '</td>
    </tr>
    <tr>
    <td>' . $fdate2 . '</td>
    <td>' . $forigen2 . '</td>
    <td>' . $fdestino2 . '</td>
    <td>' . $fpax2 . '</td>
    <td>' . $km2 . '</td>
</tr>
<tr>
<td>' . $fdate3 . '</td>
<td>' . $forigen3 . '</td>
<td>' . $fdestino3 . '</td>
<td>' . $fpax3 . '</td>
<td>' . $km3 . '</td>
</tr>
<tr>
<td>' . $fdate4 . '</td>
<td>' . $forigen4 . '</td>
<td>' . $fdestino4 . '</td>
<td>' . $fpax4 . '</td>
<td>' . $km4 . '</td>
</tr>
<tr>
<td>' . $fdate5 . '</td>
<td>' . $forigen5 . '</td>
<td>' . $fdestino5 . '</td>
<td>' . $fpax5 . '</td>
<td>' . $km5 . '</td>
</tr>
</table>
<br><br><br><br><br>
<table style="width:30%"> 
    <tr><td>Subtotal:</td><td> $' . $subtotal . '</td></tr>
    <tr><td>Addons:</td><td> $' . $addons . '</td></tr>
    <tr><td>Tax:</td><td> $' . $tax . '</td></tr>
    <tr><td>Amount:</td><td> $' . $amount . '</td></tr>
</table>
<br><br><br><br>
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
<div style="text-align:center;">
<img src="src/youlogo1.png" alt="Logo">
</div>
    <table> 
    <tr>
    <td>Quote # : ' . $aux . '</td>
    </tr>
    <tr>
    <td>Date: ' . $date . '</td>
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
<div style="text-align:center;">
<img src="src/youlogo1.png" alt="Logo">
</div>
    <table> 
    <tr>
    <td>Quote # : ' . $aux . '</td>
    </tr>
    <tr>
    <td>Date: ' . $date . '</td>
    </tr>
    </table>
    <br><br><br><br>
    <img src = "src/pagina3.png">';


$pdf->writeHTML($html4, true, false, true, false, '');

$pdf->AddPage();

$pdf->SetFont('helvetica', 'b', 10);

$html5 = '
<div style="text-align:center;">
<img src="src/youlogo1.png" alt="Logo">
</div>
    <table> 
    <tr>
    <td>Quote # : ' . $aux . '</td>
    </tr>
    <tr>
    <td>Date: ' . $date . '</td>
    </tr>
    </table>
    <br>
    <img src = "src/pagina4.png">';


$pdf->writeHTML($html5, true, false, true, false, '');


// output the PDF file to the browser
$filename = 'Quote' . $aux . '.pdf';
//$pdf->Output($filename, 'D');
$pdf->Output($filename, 'D');
header('Location: hellolist.php');
