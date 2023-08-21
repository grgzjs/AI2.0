<?php
// Save invoice to database
include 'config.php';
$invoice_number = mysqli_real_escape_string($con, $_POST['invoice_number']);
$date = mysqli_real_escape_string($con, $_POST['date']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$amount = mysqli_real_escape_string($con, $_POST['amount']);
$result = mysqli_query($con, "INSERT INTO invoices (invoice_number, date, description, amount) VALUES ('$invoice_number', '$date', '$description', '$amount')") or die(mysqli_error());
?>

<!DOCTYPE html>
<html>

<head>
	<title>Invoice Created</title>
</head>

<body>
	<h1>Invoice Created</h1>
	<p>Invoice Number: <?php echo $invoice_number; ?></p>
	<p>Date: <?php echo $date; ?></p>
	<p>Description: <?php echo $description; ?></p>
	<p>Amount: <?php echo $amount; ?></p>
	<p><a href="index.php">Back to Invoicing Tool</a></p>
</body>

</html>