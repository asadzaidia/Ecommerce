<?php
include("includes/conn.php");

$edit_cid=$_GET['edit_cat'];

$edit_query="select * from categories where c_id='$edit_cid'";
$run_q=mysqli_query($conn,$edit_query);
$row=mysqli_fetch_array($run_q);
$c_title=$row['c_title'];


?>

<div class="container" id="abc">
				<h1 class="page-header">Edit Category:</h1>
				
				<br /> 
				<div class="row">
				<div class="col-md-6 col-md-offset-2">

				<form method="post" action="">
					<div class="form-group">
						<label for="c_title">Edit Category Name:</label>
						<input type="text" class="form-control" id="c_title" name="c_title" value="<?php echo $c_title;?>">

					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success" name="edit_cn" value="edit_cn" >Update</button>
					</div>

				</form>
				</div>
				</div>
				</div>

				<?php

					$update_id=$edit_cid;
// 				function test_input($data) {

//  						$data = trim($data);
//   						$data = stripslashes($data);
//  						 $data = htmlspecialchars($data);
//  						 return $data;
// }						
				if(isset($_POST['edit_cn'])){
				
					$c_tit=test_input($_POST['c_title']);
					$update_query="update categories set c_title='$c_tit' where c_id='$update_id'";
					$update_run=mysqli_query($conn,$update_query);
					if($update_run){
						echo "<script>window.open('index.php?view_cat','_self')</script>";
					}

				}


				?>





