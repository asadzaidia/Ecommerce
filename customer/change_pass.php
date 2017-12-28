<?php
@session_start();
  include("includes/conn.php");
 
  ?>


<div class="container">
	<div class="col-md-4 col-md-offset-3">
		
<form action="" method="post">
<h3>Change Password</h3>
		<div id="cp" style="color:red;font-family: Impact;font-size:15px;"></div>
		<div class="form-group">
			<label for="old_pass">Enter Old Password:</label>
			<input type="text" class="form-control" name="old_pass" id="old_pass">


		</div>
		<div class="form-group">
			<label for="new_pass">Enter New Password:</label>
			<input type="text" class="form-control" name="new_pass" id="new_pass">


		</div>
			<div class="form-group">
			<label for="new_passs">Retype New Password:</label>
			<input type="text" class="form-control" name="new_pass2" id="new_passs">


		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-warning" name="change_pass" value="change_pass"
			>Change Password</button>


		</div>


</form>

	</div>

</div>
<?php
		$c=$_SESSION['cust_email'];
		if(isset($_POST['change_pass'])){
			$old_pass=$_POST['old_pass'];
			$new_pass=$_POST['new_pass'];
			$new_pass2=$_POST['new_pass2'];
		

		$get_real_pass="select * from customer where cust_email LIKE '%$c%'";
		$run_get_real_pass=mysqli_query($conn,$get_real_pass);

		while($run=mysqli_fetch_array($run_get_real_pass)){

			$pass=$run['cust_pass'];
			
		}
		if($old_pass!==$pass){
			echo "<script>document.getElementById('cp').innerHTML='Password Not Matched';</script>";
		}
		else if($new_pass!=$new_pass2){
				echo "<script>document.getElementById('cp').innerHTML='New Passsword Not Matched';</script>";
		}
		else{

			$Update_p="Update customer set cust_pass='$new_pass' where cust_email LIKE '%$c%'";
			$run_p=mysqli_query($conn,$Update_p);
			echo"<script>window.open('my_account.php','_self')</script>";
		}
	}

?>