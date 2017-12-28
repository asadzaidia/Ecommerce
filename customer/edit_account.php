<?php 
@session_start();

include("includes/conn.php");
if(isset($_GET['edit_account'])){
	$customer_email=$_SESSION['cust_email'];
	$get_customer="select * from customer where cust_email LIKE '%$customer_email%'";

	$run_customer=mysqli_query($conn,$get_customer);
	$row=mysqli_fetch_array($run_customer);


	$id=$row['cust_id'];
	$cust_name=$row['cust_name'];
	$cust_email=$row['cust_email'];
	$cust_country=$row['cust_country'];
	$cust_city=$row['cust_city'];
	$cust_contact=$row['cust_contact'];
	$cust_address=$row['cust_address'];
	$cust_img=$row['cust_img'];


}


?>
<div class="container">
<div class="row">
<div class="col-md-5 col-md-offset-2">
	<form action="" method="post" enctype="multipart/form-data">
	

		<h2 class="page-header">Update Account</h2>

		<div class="form-group">
			<label for="cust_name">Edit Name:</label>
			<input  class="form-control" type="text" name="c_name" value="<?php echo $cust_name; ?>" id="cust_name">

		</div>

		

		<div class="form-group">
			<label for="cust_country">Edit Country:</label>
			<input  class="form-control" type="text" name="c_country" value="<?php echo $cust_country; ?>" id="cust_country">

		</div>

		<div class="form-group">
			<label for="cust_city">Edit City:</label>
			<input  class="form-control" type="text" name="c_city" value="<?php echo $cust_city; ?>" id="cust_city">

		</div>

		<div class="form-group">
			<label for="cust_contact">Edit Contact:</label>
			<input  class="form-control" type="text" name="c_contact" value="<?php echo $cust_contact; ?>" id="cust_contact">

		</div>
		<div class="form-group">
			<label for="cust_address">Edit Address:</label>
			<input  class="form-control" type="text" name="c_address" value="<?php echo $cust_address; ?>" id="cust_address">

		</div>




			<div class="form-group">
			<button type="submit" class="btn btn-danger" name="update_account" value="update_account">Update</button>

		</div>






	</form>
	</div>

	<div class="col-md-3 col-md-offset-1">
			
			<form action="" method="post" enctype="multipart/form-data">
				
		<div class="form-group">
			<label for="cust_img">Edit Image:</label>
			<input  class="form-control" type="file"  name="c_img" id="cust_img">
			<img src="customer_image/<?php  echo $cust_img; ?>" height="70px" width="70px">

		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-danger" name="img_ch" value="update_img" >Update Image</button>
		</div>

			</form>

	</div> 
	</div>
	</div>
	

	<?php

	$update_id=$id;
		if(isset($_POST['update_account'])){
			
			// echo $update_id;
			$c_name=$_POST['c_name'];
		
			// $c_email=$_POST['c_email'];
		
			$c_contact=$_POST['c_contact'];
			$c_address=$_POST['c_address'];
			$c_city=$_POST['c_city'];

		

$update_c="Update customer set cust_name='$c_name',cust_contact='$c_contact', cust_address='$c_address', cust_city='$c_city' where cust_id='$update_id'";
$run_c=mysqli_query($conn,$update_c);
if($run_c){
	echo "Your Account has been Updated";
	echo "<script>window.open('my_account.php','_self')</script>";
}


		}


		if(isset($_POST['img_ch'])){

			$c_img=$_FILES['c_img']['name'];			
			$c_img_temp=$_FILES['c_img']['tmp_name'];
				$update_c1="Update customer set cust_img='$c_img' where cust_id='$update_id'";
				$run_c1=mysqli_query($conn,$update_c1);
			move_uploaded_file($c_img_temp,"customer_image/$c_img");
			echo "<script>window.open('my_account.php','_self')</script>";


		}

	?>


























