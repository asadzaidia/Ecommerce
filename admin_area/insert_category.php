
	<div class="container">
			<h1 class="page-header">Insert Category:</h1>
			<br />
		<div class="col-md-6 col-md-offset-2">
				
				<form method="post" action="">
					<div class="form-group">
						<label for="c_title">Category Name:</label>
						<input type="text" class="form-control" id="c_title" name="c_title">

					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success" name="insert" value="insert" >Insert</button>
					</div>

				</form>
		</div>

	</div>

	<?php
	include("includes/conn.php");


	if(isset($_POST['insert'])){

		$c_title=test_input($_POST['c_title']);
		$query="insert into categories(c_id,c_title) values('','$c_title')";
		$run_qu=mysqli_query($conn,$query);
		if($run_qu){
			echo "<script>window.open('index.php?view_cat','_self')</script>";
		}
	}						

	?>