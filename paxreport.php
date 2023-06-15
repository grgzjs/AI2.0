<?php
include("conexion.php");
require_once('TCPDF/tcpdf.php');
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

$quote = $_GET['id'];
$sql = 'select * from invoices where quote=' . $quote;
$invoice = mysqli_query($con, $sql);
$rowinvoice = mysqli_fetch_assoc($invoice);
$sqlbuyer = 'select * from contact where id=' . $rowinvoice['buyer_id'];
$buyer = mysqli_query($con, $sqlbuyer);
$rowbuyer = mysqli_fetch_assoc($buyer);
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$sqldetail = 'select * from invoice_detail where id_invoice=' . $quote;
$detail = mysqli_query($con, $sqldetail);

$tramoids = [];
while ($rowdetail = mysqli_fetch_assoc($detail)) {
    array_push($tramoids, $rowdetail['id']);
}

// pilot list query
$sqlpilotlist = "select * from contact c, opstramo o where o.contact_id=c.id and o.funcion <>'null' and (";
for ($i = 0; $i < count($tramoids); $i++) {
    $sqlpilotlist .= "o.tramo_id=" . $tramoids[$i];
    if ($i < count($tramoids) - 1) {
        $sqlpilotlist .= " or ";
    }
}
$sqlpilotlist .= ")";

// pax list query
$sqlpaxlist = "select * from contact c, opstramo o where o.contact_id=c.id and o.funcion ='null' and (";
for ($i = 0; $i < count($tramoids); $i++) {
    $sqlpaxlist .= "o.tramo_id=" . $tramoids[$i];
    if ($i < count($tramoids) - 1) {
        $sqlpaxlist .= " or ";
    }
}
$sqlpaxlist .= ")";

$sqldetail = "select * from opstramo_detail where ";
for ($i = 0; $i < count($tramoids); $i++) {
    $sqldetail .= "o.tramo_id=" . $tramoids[$i];
    if ($i < count($tramoids) - 1) {
        $sqldetail .= " or ";
    }
}

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

<table class="pdf-table"> 
    <tr class="pdf-table-row">
        <td class="pdf-table-cell">Name</td>
        <td class="pdf-table-cell">Last Name</td>
        <td class="pdf-table-cell">Date of Birth</td>
        <td class="pdf-table-cell">Country of Origin</td>
        <td class="pdf-table-cell">License</td>
        <td class="pdf-table-cell">DNI Pass</td>
        <td class="pdf-table-cell">Role</td>
    </tr>';
// TODO: do this inside the html
$rowspilot = mysqli_query($con, $sqlpilotlist);
while ($rowp = mysqli_fetch_assoc($rowspilot)) {
    $html = $html . '
    <tr>
        <td class="pdf-table-cell">' . $rowp['first_name'] . '</td>
        <td class="pdf-table-cell">' . $rowp['last_name'] . '</td>
        <td class="pdf-table-cell">' . $rowp['f_nacimiento'] . '</td>
        <td class="pdf-table-cell">' . $rowp['pais'] . '</td>
        <td class="pdf-table-cell">' . $rowp['licencia'] . '</td>
        <td class="pdf-table-cell">' . $rowp['dnipass'] . '</td>
        <td class="pdf-table-cell">' . $rowp['funcion'] . '</td>
    </tr>';
    // loop pilots, get info and add to html
}
$html = $html . '
</table>';

$html = $html . '
<style>
    .pdf-table {
        display: grid;
        grid-template-columns: repeat(6, auto);
        grid-template-rows: 5rem;
        justify-content: stretch;
        justify-items: center;
    }

    .pdf-table-row {
        background-color:grey;
    }

    .pdf-table-cell {
        
    }
</style>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();

$pdf->SetFont('helvetica', 'b', 10);

$html2 = '
<div style="text-align:center;">
    <img src="src/youlogo1.png" alt="Logo">
</div>

<table class="pdf-table"> 
    <tr class="pdf-table-row">
        <td class="pdf-table-cell">Name</td>
        <td class="pdf-table-cell">Last Name</td>
        <td class="pdf-table-cell">Date of Birth</td>
        <td class="pdf-table-cell">Country of Origin</td>
        <td class="pdf-table-cell">DNI Pass</td>
    </tr>';
// TODO: do this inside the html
$rowspax = mysqli_query($con, $sqlpaxlist);
while ($rowp = mysqli_fetch_assoc($rowspax)) {
    $html2 = $html2 . '
    <tr>
        <td class="pdf-table-cell">' . $rowp['first_name'] . '</td>
        <td class="pdf-table-cell">' . $rowp['last_name'] . '</td>
        <td class="pdf-table-cell">' . $rowp['f_nacimiento'] . '</td>
        <td class="pdf-table-cell">' . $rowp['pais'] . '</td>
        <td class="pdf-table-cell">' . $rowp['dnipass'] . '</td>
    </tr>';
}
$html2 = $html2 . '
</table>';

$pdf->writeHTML($html2, true, false, true, false, '');

$pdf->AddPage();

$pdf->SetFont('helvetica', 'b', 10);

$html3 = '
<div style="text-align:center;">
    <img src="src/youlogo1.png" alt="Logo">
</div>

<table class="pdf-table"> 
    <tr class="pdf-table-row">
        <td class="pdf-table-cell">FBO</td>
        <td class="pdf-table-cell">Fuel</td>
        <td class="pdf-table-cell">Catering</td>
        <td class="pdf-table-cell">Notes</td>
    </tr>';
// TODO: do this inside the html
$rowsdetail = mysqli_query($con, $sqldetail);
while ($rowp = mysqli_fetch_assoc($rowsdetail)) {
    $html3 = $html3 . '
    <tr>
        <td class="pdf-table-cell">' . $rowp['fbo'] . '</td>
        <td class="pdf-table-cell">' . $rowp['fuel'] . '</td>
        <td class="pdf-table-cell">' . $rowp['catering'] . '</td>
        <td class="pdf-table-cell">' . $rowp['notas'] . '</td>
    </tr>';
}
$html3 = $html3 . '
</table>';

$pdf->writeHTML($html3, true, false, true, false, '');

$filename = 'Quote' . $quote . '.pdf';
ob_end_clean();
$pdf->Output($filename, 'D');
header('Location: opsmain.php');