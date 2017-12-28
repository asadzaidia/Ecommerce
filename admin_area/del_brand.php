<?php 
	include("includes/conn.php");
	$del_brand=$_GET['del_brand'];
?>

<div class="container" id="abc">
	<h1 class="page-header">Delete Brand:</h1>
				
				<br />
		<div class="col-md-9 col-md-offset-3">
				
		<h2 style="color:red; font-weight: bold;">Are you Sure ?</h2>
		<form action="" method="post">
			
			<div class="form-group">
				<button type="submit" class ="btn btn-danger" name="yes" value="yes">Yes</button>
				<button type="submit" class ="btn btn-info" name="no" value="np">No</button>
			</div>

		</form>
		</div>

	</div>


<?php

	if(isset($_POST['yes'])){

	$delete_q="delete from brands where b_id='$del_brand'";
	$delete_run=mysqli_query($conn,$delete_q);
	if($delete_run){
		echo "<script>window.open('index.php?view_brand','_self')</script>";
	}
}

if(isset($_POST['no'])){
echo "<script>window.open('index.php?view_brand','_self')</script>";

}



 ?>