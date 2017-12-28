<?php
include("includes/conn.php");

$edit_brand=$_GET['edit_brand'];

$edit_query="select * from brands where b_id='$edit_brand'";
$run_q=mysqli_query($conn,$edit_query);
$row=mysqli_fetch_array($run_q);
$b_title=$row['b_title'];


?>

<div class="container" id="abc">
				<h1 class="page-header">Edit Brand:</h1>
				
				<br /> 
				<div class="row">
				<div class="col-md-6 col-md-offset-2">

				<form method="post" action="">
					<div class="form-group">
						<label for="b_title">Edit Brand Name:</label>
						<input type="text" class="form-control" id="b_title" name="b_title"  value="<?php echo $b_title;?>">

					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success" name="edit_bn" value="edit_bn" >Update</button>
					</div>

				</form>
				</div>
				</div>
				</div>

				<?php

					$update_id=$edit_brand;
// 				function test_input($data) {

//  						$data = trim($data);
//   						$data = stripslashes($data);
//  						 $data = htmlspecialchars($data);
//  						 return $data;
// }						
				if(isset($_POST['edit_bn'])){
				
					$b_tit=test_input($_POST['b_title']);
					$update_query="update brands set b_title='$b_tit' where b_id='$update_id'";
					$update_run=mysqli_query($conn,$update_query);
					if($update_run){
						echo "<script>window.open('index.php?view_brand','_self')</script>";
					}

				}


				?>





