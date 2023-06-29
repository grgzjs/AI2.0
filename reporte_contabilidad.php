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

// income list query
$sqlinclist = "select * from ingresos_generales";

// expenses list query
$sqlexplist = "select * from gastos_generales";

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
        <th style="width:17%;">Fecha</th>
        <th style="width:15%;">Concepto</th>
        <th style="width:10%;">Tipo de Gasto</th>
        <th style="width:13%;">Moneda de Cambio</th>
        <th style="width:13%;">Monto</th>
    </tr>';

$rowsincome = mysqli_query($con, $sqlinclist);
while ($rowp = mysqli_fetch_assoc($rowsincome)) {
    $html = $html .'<tr>
        <td class="cell-detail">
            <span class="date">'.$rowp["date"].'</span>
        </td>
        <td class="cell-detail">
            <span>'. $rowp["concepto"] .'</span>
        </td>
        <td class="cell-detail">
            <span>'. echo $rowp["tipoingreso"] .'</span>
        </td>
        <td class="cell-detail">
            <span>'. $rowp["moneda_cambio"] .'</span>
        </td>
        <td class="cell-detail">
            <span>$'. echo $rowp["monto"] .'</span>
        </td>
    </tr>'
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
        <th style="width:17%;">Fecha</th>
        <th style="width:15%;">Concepto</th>
        <th style="width:10%;">Tipo de Gasto</th>
        <th style="width:13%;">Moneda de Cambio</th>
        <th style="width:13%;">Monto</th>
    </tr>';

$rowsexp = mysqli_query($con, $sqlexplist);
while ($rowp = mysqli_fetch_assoc($rowsexp)) {
    $html2 = $html2 .'<tr>
        <td class="cell-detail">
            <span class="date">'.$rowp["date"].'</span>
        </td>
        <td class="cell-detail">
            <span>'. $rowp["concepto"] .'</span>
        </td>
        <td class="cell-detail">
            <span>'. echo $rowp["tipogasto"] .'</span>
        </td>
        <td class="cell-detail">
            <span>'. $rowp["moneda_cambio"] .'</span>
        </td>
        <td class="cell-detail">
            <span>$'. echo $rowp["monto"] .'</span>
        </td>
    </tr>'
}
// also get from opstramo_gastos
$html2 = $html2 . '
</table>';

$pdf->writeHTML($html2, true, false, true, false, '');

// $pdf->AddPage();

// $pdf->SetFont('helvetica', 'b', 10);

// $html3 = '
// <style>
//     table {
//         border: 2px solid black;
//         border-collapse: collapse;
//         width: 100%;
//     }

//     th {
//         border: 2px solid black;
//         background-color: dark-gray;
//         color: white;
//         height: 70px;
//         text-align: center;
//         vertical-align: center;
//     }

//     td {
//         border: 2px solid black;
//         height: 35px;
//         text-align: center;
//         vertical-align: center;
//     }
// </style>';

// $html3 = $html3 . '
// <div style="text-align:center;">
//     <img src="src/youlogo1.png" alt="Logo">
// </div>

// <table> 
//     <tr>
//         <th>FBO</th>
//         <th>Fuel</th>
//         <th>Catering</th>
//         <th>Notes</th>';
// foreach ($tramoids as $tramo) {
//     $html3 = $html3 . '<th>Tramo#' . $tramo . '</th>';
// }
// $html3 = $html3 . '
//     </tr>';
// $rowsdetail = mysqli_query($con, $sqldetail);
// while ($rowp = mysqli_fetch_assoc($rowsdetail)) {

//     // if (in_array($rowp['dnipass'], $pilot_dni_list)) {
//     //     continue;
//     // }
//     // array_push($pilot_dni_list, $rowp['dnipass']);

//     // $sqlcontact = "select tramo_id from opstramo_detail";
//     // $detailleg = mysqli_query($con, $sqlcontact);
//     // $pax_dni_list = array();
//     // while ($rowdetail = mysqli_fetch_assoc($detailleg)) {
//     //     array_push($pax_dni_list, $rowdetail['tramo_id']);
//     // }

//     $html3 = $html3 . '
//     <tr>
//         <td>' . $rowp['fbo'] . '</td>
//         <td>' . $rowp['fuel'] . '</td>
//         <td>' . $rowp['catering'] . '</td>
//         <td>' . $rowp['notas'] . '</td>';
//     foreach ($tramoids as $tramo) {
//         if ($rowp['tramo_id'] < $tramo) {
//             $html3 = $html3 . '
//                 <td>  </td>';
//         } else if ($rowp['tramo_id'] == $tramo) {
//             $html3 = $html3 . '
//                 <td> X </td>';
//         } else {
//             $html3 = $html3 . '
//                 <td>  </td>';
//         }
//     }
//     $html3 = $html3 . '
//     </tr>';
// }
// $html3 = $html3 . '
// </table>';

// $pdf->writeHTML($html3, true, false, true, false, '');

$filename = 'Costos.pdf';
ob_end_clean();
$pdf->Output($filename, 'D');
header('Location: contabilidadgastos.php');
