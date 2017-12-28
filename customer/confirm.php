<?php
session_start();
include("includes/conn.php");
if(isset($_GET['order_id'])){

	$orders_id=$_GET['order_id'];
	echo $orders_id;

}


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php echo'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">'; ?>

<?php echo "<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'> "?>

<!-- Latest compiled and minified JavaScript -->


<script src="https://use.fontawesome.com/2068589c33.js"></script>
<?php echo '<link rel="stylesheet" href="../styles/style.css" media="all" />'; ?>
	<title>Confirm</title>
	</head>

	<body>

	<div class="col-md-5 col-md-offset-3">
		
	<form method="post" action="confirm.php?update_id=<?php echo $orders_id; ?>" enctype="multipart/form-data">

	<h1 class="page-header">Please Confirm Your order!</h1>
	<div class="form-group">
	<label for="amount">Amount sent:</label>
	<input type="text" class="form-control" name="amount" id="amount" required>

	</div>
	<div class="form-group">
	<label for="pm">Select Payment Method:</label>
		<select class="form-control" name="payment_method" id="pm" required>
			<option>Bank Transfer</option>
			<option>Easypaisa/Ubl Omni</option>
			<option>Paypal</option>
			<option>Western Union</option>
		</select>
	</div>

	<div class="form-group">
	<label for="tr">Transaction Id/Reference Id</label>
	<input type="text" class="form-control" name="tr" id="tr" required>

	</div>

		<div class="form-group">
	<label for="code">Code</label>
	<input type="text" class="form-control" name="code" id="code" required>

	</div>
	<div class="form-group">
	<label for="payment_d">Payment Date:</label>
	<input type="text" class="form-control" name="payment_d" id="payment_d" required>

	</div>

	<div class="form-group">
	<label for="invoice">Invoice:</label>
	<input type="text" class="form-control" name="invoice" id="invoice" required>

	</div>
		
		<div class="form-group">
	<button type="submit"  class="btn btn-info" name="confirm" value="Confirm_Payment">Confirm Payment</button>

	</div>
		
			</form>
	</div>




	  <?php 
  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
     
     <script 
     src='https://code.jquery.com/jquery-2.2.2.min.js' 
     integrity='sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=' 
     crossorigin='anonymous'></script>

<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script> ";  ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>

<?php


	if(isset($_POST['confirm'])){
		$update_id=$_GET['update_id'];

		$invoice=$_POST['invoice'];
		$amount=$_POST['amount'];
		$payment_method=$_POST['payment_method'];
		$tr=$_POST['tr'];
		$payment_d=$_POST['payment_d'];
		$code=$_POST['code'];

		$insert_p="insert into payments(invoice_no,amount,payment_mode,ref,code,p_date) values('$invoice','$amount','$payment_method','$tr','$code','$payment_d')";
		$run_p=mysqli_query($conn,$insert_p);
		if($run_p){
			echo "<h2 style='text-align:center;color:green;font-weight:20px;'>Payment received, your order will be completed within 24 hours</h2>";
		}

		$update_order="Update orders set order_status='Complete' where ord_id='$update_id'";
		$run_order=mysqli_query($conn,$update_order);

	}
?>
