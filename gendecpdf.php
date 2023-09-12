<?php
include("conexion.php");
include("tcpdf/tcpdf.php");

$quote_id = $_GET["quote"];
$leg_id = $_GET["leg"];
$next_leg_id = $_GET["next_leg"];

$sql_invoice = "select aircraft from invoices where quote=$quote_id";
$invoice = mysqli_query($con, $sql_invoice);
$row_invoice = mysqli_fetch_assoc($invoice);

$matricula = $row_invoice["aircraft"];

$sql_invoice_detail = "select fecha, origen, destino, Pax from invoice_detail where id_invoice=$quote_id and Id=$leg_id";
$invoice_detail = mysqli_query($con, $sql_invoice_detail);
$row_invoice_detail = mysqli_fetch_assoc($invoice_detail);

$fecha = substr($row_invoice_detail["fecha"], 0, 10);
$origen = $row_invoice_detail["origen"];
$destino = $row_invoice_detail["destino"];
$pax_embarked = $row_invoice_detail["Pax"];
$pax_disembarked = 0;

if ($next_leg_id != "none") {
    $sql_next_invoice_detail = "select fecha, origen, destino, Pax from invoice_detail where id_invoice=$quote_id and Id=$next_leg_id";
    $next_invoice_detail = mysqli_query($con, $sql_next_invoice_detail);
    $row_next_invoice_detail = mysqli_fetch_assoc($next_invoice_detail);
    $pax_disembarked = $pax_embarked - $row_next_invoice_detail["Pax"];
}

//ERROR HTTP 500 -->
//$sql_aircraft = "select operador from Aircraft where matricula=$matricula";
//$aircraft = mysqli_query($con, $sql_aircraft);
//$row_aircraft = mysqli_fetch_assoc($aircraft);
//$operador = $row_aircraft["operador"];
//<--ERROR HTTP 500
$operador = "operador";

$sql_contact = "select c.first_name, c.last_name, o.funcion from opstramo o, Contact c where o.tramo_id=$leg_id and o.contact_id=c.id and o.funcion!='null'";
$contact = mysqli_query($con, $sql_contact);

$employee_pax = array();
while($row_contact = mysqli_fetch_assoc($contact)) {
    array_push($employee_pax, [$row_contact["funcion"], $row_contact["first_name"] . " " . $row_contact["last_name"]]);
}

$pdf = new TCPDF('P', 'mm', 'A4');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

$pdf->SetFont("helvetica", "B", 14);
$pdf->Cell(0, 5, "APPENDIX 1. GENERAL DECLARATION", 0, 1, "C");
$pdf->Ln();

$pdf->SetFont("helvetica", "", 8);
$html = "
<br>
<h3>GENERAL DECLARATION</h3>
<h5>(Outward/Inward)</h5>
<p>Operator . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . $operador . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
<p>Marks of Nationality and Registration . . . . . . . $matricula . . . . . . . . . . . . Flight No. . . . . . $quote_id . . . . . . Date . . . . . . . . $fecha . . . . . . . .</p>
<p>Departure from. . . . . . . . . . . . . . . . $origen . . . . . . . . . . . . . . . . . . . . . . . . Arrival at . . . . . . . . . . . . . . . . . . . $destino . . . . . . . . . . . . . . . . . . . .</p>
<br>
";
$pdf->writeHTMLCell(0, 0, "", "", $html, 1, 1, false, true, "C");
// $pdf->Cell(0, 1, "", 1, 1, "C");
$pdf->Ln(2);

$html = "
<br>
<h3>FLIGHT ROUTING</h3>
<h5>(“Place” Column always to list origin, every en-route stop and destination)</h5>
<br>
";
$pdf->writeHTMLCell(0, 0, "", "", $html, 1, 1, false, true, "C");

// 20 => 38
// 40 => 76
// 40 => 76
$pdf->Cell(38, 20, "PLACE", 1, 0, "C");
$pdf->Cell(76, 20, "NAMES OF CREW*", 1, 0, "C");
$pdf->Cell(76, 20, "NUMBER OF PASSENGERS ON THIS STAGE**", 1, 1, "C");

for ($i=0; $i < 7; $i++) { 
    $pdf->Cell(38, 5, $employee_pax[$i][0], 1, 0, "C");
    $pdf->Cell(76, 5, $employee_pax[$i][1], 1, 1, "C");
}

$pdf->SetFont("helvetica", "", 7);
$html = "
<p><i>Departure Place:</i></p>
<ul>
    <li>Embarking: $pax_embarked</li>
    <li>Through on same flight: </li>
</ul>

<p><i>Arrival Place:</i></p>
<ul>
    <li>Disembarking: $pax_disembarked</li>
    <li>Through on same flight: </li>
</ul>
";
$pdf->writeHTMLCell(76, 35, 124, 109.8, $html, 1, 1, false, false, "L");

// $pdf->Cell(0, 1, "", 1, 1, "C");
// $pdf->Ln(2);

$pdf->SetFont("helvetica", "", 7);
$html = "
<br>
<p><i>Declaration of Health:</i></p>
<p style='text-align:justify;'>
Name and seat number or function of persons on board with illnesses other than
airsickness or the effects of accidents, who may be suffering from a communicable
disease (a fever — temperature 38°C/100°F or greater — associated with one or more
of the following signs or symptoms, e.g. appearing obviously unwell; persistent
coughing; impaired breathing; persistent diarrhoea; persistent vomiting; skin rash;
bruising or bleeding without previous injury; or confusion of recent onset, increases the
likelihood that the person is suffering a communicable disease) as well as such cases of
illness disembarked during a previous stop . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
Details of each disinsecting or sanitary treatment (place, date, time, method)
during the flight. If no disinsecting has been carried out during the flight, give details
of most recent disinsecting . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
</p>
<p style='margin: 10px;'>Signed, if required, with time and date __________________________________________</p>
<p style='text-align: left'>Crew member concerned</p>
<br>
";
$pdf->writeHTMLCell(122, 45, "", "", $html, 1, 0, false, false, "L");
$pdf->Cell(68, 4, "For official use only", 1, 1, "C");
$pdf->writeHTMLCell(68, 61, 132, 148.8, "", 1, 1);

$pdf->SetFont("helvetica", "", 7);
$html = "
<style>
.left-align {
    text-align: left;
}
</style>
<br>
<p style='text-align:justify;'>
I declare that all statements and particulars contained in this General Declaration, and in any supplementary forms required to be
presented with this General Declaration, are complete, exact and true to the best of my knowledge and that all through passengers will
continue/have continued on the flight.
</p>
<p class='left-align'>SIGNATURE __________________________________________</p>
<p>Authorized Agent or Pilot-in-comand</p>
<br>
";
$pdf->writeHTMLCell(0, 0, "", "", $html, 1, 1);

$html = "
<br>
<p>* To be completed when required by the State.</p>
<p>** Not to be completed when passenger manifests are presented and to be completed only when required by the State.</p>
";
$pdf->writeHTMLCell(0, 0, "", "", $html, 0, 1, false, true, "L");

// $pdf->Output("GENDEC.pdf", "I");

$pdf->Output("GENDEC.pdf", "D");
echo "<h1>HOLA!</h1>";
?>