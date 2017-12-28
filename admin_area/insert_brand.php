
	<div class="container">
			<h1 class="page-header">Insert Brand:</h1>
			<br />
		<div class="col-md-6 col-md-offset-2">
				
				<form method="post" action="">
					<div class="form-group">
						<label for="b_title">Brand Name:</label>
						<input type="text" class="form-control" id="b_title" name="b_title">

					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success" name="insert" value="insert" >Insert</button>
					</div>

				</form>
		</div>

	</div>

	<?php
	include("includes/conn.php");
// 	function test_input($data) {

//  						$data = trim($data);
//   						$data = stripslashes($data);
//  						 $data = htmlspecialchars($data);
//  						 return $data;
// }

	if(isset($_POST['insert'])){

		$b_title=test_input($_POST['b_title']);
		$query="insert into brands(b_id,b_title) values('','$b_title')";
		$run_qu=mysqli_query($conn,$query);
		if($run_qu){
			echo "<script>window.open('index.php?view_brand','_self')</script>";
		}
	}						

	?>