<?php

@session_start();
include("includes/conn.php");
// include("C:\\xampp/htdocs/MyShop/functions/functions.php");

?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php echo "<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'> "?>



<script src="https://use.fontawesome.com/2068589c33.js"></script>
<?php echo '<link rel="stylesheet" href="./styles/style.css" media="all" />'; ?>
	<title>Login</title>
	</head>

	<body>


<div class="container">
<div class="row" >
<div class="col-md-4 col-md-offset-4" >

	<form action="checkout.php" method="post">
	<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Login</h3>
  </div>
  <div class="panel-body">
  	<div><p id="login_fail" style="color:red;font-weight: bold;"></p></div>
  						<fieldset>
 					 <div class="form-group">
			    		    <input class="form-control" placeholder="yourmail@example.com" name="c_email" type="email" required>
			    		</div>
			    			<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="c_pass" type="password" required>
			    		<a href="checkout.php?forgot_pass">	<h5>or forgot password</h5></a>
			    		</div>
			    		<button type="submit" name="c_submit" value="submit" class="btn btn-success">Login</button>
			    		</fieldset>


  

  </div>
  <div class="panel-footer">
  		<a href="customer/cust_reg.php"><h5>Or Register Here</h5></a>

  </div>
</div>
		

	</form> 
	</div>
	
	</div>
	<div class="row">
		
		<div class="col-md-4 col-md-offset-4" >
			<?php
if(isset($_GET['forgot_pass'])){
			    			echo "
	<h2 class='page-header '>Enter Your Email</h2><br />
	<div id='fail' style='color:red;'></id>
			    			<form action='' method='post'>
			    			<div class='form-group'>
			    			
	<input type='email' name='email' class='form-control' placeholder='@Your Email' required/>
	</div>
		<br />
		<div class='form-group'>
	<button type='submit' name='forgot_pass' value='forgot_pass' class='btn btn-warning'>Send Me Password</button>
	</div>
	</form>
	";

	if(isset($_POST['forgot_pass'])){
	 $value=$_POST['email'];
	 $sel="select * from customer where cust_email LIKE '%$value%'";
	 $run_qq=mysqli_query($conn,$sel);
	$check_cc=mysqli_num_rows($run_qq);


	$row_qq=mysqli_fetch_array($check_cc);
	 $c_nameee=$row_qq['cust_name'];
	 $c_passss=$row_pass['cust_pass'];
	 if($check_cc==0){
	 		echo "<script>document.getElementById('fail').innerHTML='Email Address not exists';</script>";
	 		exit();
	 }
	 else{

	 	$from="asadzaidi625@gmail.com";
	 	$to=$value;
	 	$subject="Password From MyShop";
	 	$message="
	 	<html>
	 	<h3>Dear $c_nameee</h3>
	 	<p>You requested a password from Myshop.com</p>
	 	<b>Your Password is<span style='color:red;'>$c_passss</span></b>

	 	</html>
	 	";

	 	mail($to,$subject,$message,$from);

	 	echo "Password has been send to you!!";
	 	sleep(15);
	 	echo 
			"<script>window.open('checkout.php','_self')</script>";


	 }

	}
			 }

			    		?>
		</div>
	</div>

	</div>
	<?php
	function test_input($data) {

 			 $data = trim($data);
  			$data = stripslashes($data);
 	 		$data = htmlspecialchars($data);
  			return $data;
			}

			function getIpp(){
//function for getting ip add

	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		//check ip for share internet
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		//to check ip is pass from proxy
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
return $ip;
}

		if(isset($_POST['c_submit'])){
		 $useremail = test_input($_POST['c_email']);

		 $userpass = test_input($_POST['c_pass']);
		

		$sel_cust="SELECT * FROM customer where cust_email LIKE '%$useremail%' AND cust_pass='$userpass'";

		$run_q=mysqli_query($conn,$sel_cust);

		echo $check_customer=mysqli_num_rows($run_q);
		$getIpp=getIpp();
		$sel_cart="select * from cart where ip_add='$getIpp'";
		$run_cart=mysqli_query($conn,$sel_cart);
		echo $check_cart=mysqli_num_rows($run_cart);

		if($check_customer==0){ 
echo "<script> 
		var error=document.getElementById('login_fail');
		error.innerHTML='Wrong Email or Password';
		</script>" ;

		exit();

		}

		if($check_customer==1 AND $check_cart==0){

		$_SESSION['cust_email']=$useremail;
			echo 
			"<script>window.open('customer/my_account.php','_self')</script>";
		}
		else{

		$_SESSION['cust_email']=$useremail;
			echo 
			"<script>window.open('payment_options.php','_self')</script>";
		}

		
		

		}
		

	?>


</body>
</html>