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
    $sqldetail .= "tramo_id=" . $tramoids[$i];
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
<style>
    table {
        border: 2px solid black;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        border: 2px solid black;
        background-color: dark-gray;
        color: white;
        height: 70px;
        text-align: center;
        vertical-align: center;
    }

    td {
        border: 2px solid black;
        height: 35px;
        text-align: center;
        vertical-align: center;
    }
</style>';

$html = $html . '
<div style="text-align:center;">
    <img src="src/youlogo1.png" alt="Logo">
</div>

<table> 
    <tr>
        <th>Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Country of Origin</th>
        <th>License</th>
        <th>DNI Pass</th>
        <th>Role</th>';
        foreach ($tramoids as $tramo) {
            $html = $html . '<th>Tramo#'.$tramo.'</th>';
        }
    $html = $html . '
    </tr>';

$pilot_dni_list = array();
$rowspilot = mysqli_query($con, $sqlpilotlist);
while ($rowp = mysqli_fetch_assoc($rowspilot)) {
    
    //prevents duplicate db entries
    if (in_array($rowp['dnipass'], $pilot_dni_list)) {
        continue;
    }
    array_push($pilot_dni_list, $rowp['dnipass']);

    // allows to have checkboxes checked if the pilot is on that leg
    $sqlcontact = "select tramo_id from opstramo where contact_id=" . $rowp['contact_id'];
    $detailleg = mysqli_query($con, $sqlcontact);
    $pilot_tramos = array();
    while ($rowdetail = mysqli_fetch_assoc($detailleg)) {
        array_push($pilot_tramos, $rowdetail['tramo_id']);
    }

    $html = $html . '
    <tr>
        <td>' . $rowp['first_name'] . '</td>
        <td>' . $rowp['last_name'] . '</td>
        <td>' . $rowp['f_nacimiento'] . '</td>
        <td>' . $rowp['pais'] . '</td>
        <td>' . $rowp['licencia'] . '</td>
        <td>' . $rowp['dnipass'] . '</td>
        <td>' . $rowp['funcion'] . '</td>';
        foreach ($tramoids as $tramo) {
            if (in_array($tramo, $pilot_tramos)) {
                $html = $html . '
        <td> X </td>';
            } else {
                $html = $html . '
        <td>  </td>';
            }
        }
    $html = $html . '
    </tr>';
    // loop pilots, get info and add to html
}
$html = $html . '
</table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();

$pdf->SetFont('helvetica', 'b', 10);

$html2 = '
<style>
    table {
        border: 2px solid black;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        border: 2px solid black;
        background-color: dark-gray;
        color: white;
        height: 70px;
        text-align: center;
        vertical-align: center;
    }

    td {
        border: 2px solid black;
        height: 35px;
        text-align: center;
        vertical-align: center;
    }
</style>';

$html2 = $html2 . '
<div style="text-align:center;">
    <img src="src/youlogo1.png" alt="Logo">
</div>

<table> 
    <tr>
        <th>Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Country of Origin</th>
        <th>DNI Pass</th>';
        foreach ($tramoids as $tramo) {
            $html2 = $html2 . '<th>Tramo#'.$tramo.'</th>';
        }
        $html2 = $html2 . '
    </tr>';

$pax_dni_list = array();
$rowspax = mysqli_query($con, $sqlpaxlist);
while ($rowp = mysqli_fetch_assoc($rowspax)) {
    if (in_array($rowp['dnipass'], $pilot_dni_list)) {
        continue;
    }
    array_push($pilot_dni_list, $rowp['dnipass']);

    $sqlcontact = "select tramo_id from opstramo where contact_id=" . $rowp['contact_id'];
    $detailleg = mysqli_query($con, $sqlcontact);
    $pax_dni_list = array();
    while ($rowdetail = mysqli_fetch_assoc($detailleg)) {
        array_push($pax_dni_list, $rowdetail['tramo_id']);
    }

    $html2 = $html2 . '
    <tr>
        <td>' . $rowp['first_name'] . '</td>
        <td>' . $rowp['last_name'] . '</td>
        <td>' . $rowp['f_nacimiento'] . '</td>
        <td>' . $rowp['pais'] . '</td>
        <td>' . $rowp['dnipass'] . '</td>';
        foreach ($tramoids as $tramo) {
            if (in_array($tramo, $pax_dni_list)) {
                $html2 = $html2 . '
        <td> X </td>';
            } else {
                $html2 = $html2 . '
        <td>  </td>';
            }
        }
    $html2 = $html2 . '
    </tr>';
}
$html2 = $html2 . '
</table>';

$pdf->writeHTML($html2, true, false, true, false, '');

$pdf->AddPage();

$pdf->SetFont('helvetica', 'b', 10);

$html3 = '
<style>
    table {
        border: 2px solid black;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        border: 2px solid black;
        background-color: dark-gray;
        color: white;
        height: 70px;
        text-align: center;
        vertical-align: center;
    }

    td {
        border: 2px solid black;
        height: 35px;
        text-align: center;
        vertical-align: center;
    }
</style>';

$html3 = $html3 . '
<div style="text-align:center;">
    <img src="src/youlogo1.png" alt="Logo">
</div>

<table> 
    <tr>
        <th>FBO</th>
        <th>Fuel</th>
        <th>Catering</th>
        <th>Notes</th>';
        foreach ($tramoids as $tramo) {
            $html3 = $html3 . '<th>Tramo#'.$tramo.'</th>';
        }
    $html3 = $html3 . '
    </tr>';
$rowsdetail = mysqli_query($con, $sqldetail);
while ($rowp = mysqli_fetch_assoc($rowsdetail)) {

    // if (in_array($rowp['dnipass'], $pilot_dni_list)) {
    //     continue;
    // }
    // array_push($pilot_dni_list, $rowp['dnipass']);

    // $sqlcontact = "select tramo_id from opstramo_detail";
    // $detailleg = mysqli_query($con, $sqlcontact);
    // $pax_dni_list = array();
    // while ($rowdetail = mysqli_fetch_assoc($detailleg)) {
    //     array_push($pax_dni_list, $rowdetail['tramo_id']);
    // }

    $html3 = $html3 . '
    <tr>
        <td>' . $rowp['fbo'] . '</td>
        <td>' . $rowp['fuel'] . '</td>
        <td>' . $rowp['catering'] . '</td>
        <td>' . $rowp['notas'] . '</td>';
        foreach ($tramoids as $tramo) {
            if ($rowp['tramo_id'] < $tramo) {
                $html3 = $html3 . '
                <td>  </td>';
            }
            else if ($rowp['tramo_id'] == $tramo) {
                $html3 = $html3 . '
                <td> X </td>';
            }
            else {
                $html3 = $html3 . '
                <td>  </td>';
            }
        }
    $html3 = $html3 .'
    </tr>';
}
$html3 = $html3 . '
</table>';

$pdf->writeHTML($html3, true, false, true, false, '');

$filename = 'Quote' . $quote . '.pdf';
ob_end_clean();
$pdf->Output($filename, 'D');
header('Location: opsmain.php');