<?php 
include("includes/conn.php");
$edit_id=$_GET['edit_pro'];
 
 $get_edit="select * from products where p_id='$edit_id'";

 $run_edit=mysqli_query($conn,$get_edit);

 $row_edit=mysqli_fetch_array($run_edit);

 $p_title=$row_edit['p_title'];
 $p_category_id=$row_edit['p_category_id'];
 $p_brand_id=$row_edit['p_brand_id'];
  $p_img1=$row_edit['p_img1'];

 $p_img2=$row_edit['p_img2'];
 $p_img3=$row_edit['p_img3'];
 $p_price=$row_edit['p_price'];
 $p_desc=$row_edit['p_desc'];
 $p_keyword=$row_edit['p_keyword'];

//getting categories from category id
 $get_cat="select * from categories where c_id='$p_category_id'";
 $run_cat=mysqli_query($conn,$get_cat);
 $row_cat=mysqli_fetch_array($run_cat);
 $cat_name=$row_cat['c_title'];


 //getting brand from brands id
 $get_b="select * from brands where b_id='$p_brand_id'";
 $run_brand=mysqli_query($conn,$get_b);
 $row_b=mysqli_fetch_array($run_brand);
 $b_name=$row_b['b_title'];

 ?>
		<div class="container" id="abc">
				<h1 class="page-header">Edit Product:</h1>
				
				<br />
				<div class="row" >
				<div class="col-md-6">
				
				<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group" >
				<label for="p_title">Edit Title:</label>
					<input type="text" class="form-control" name="p_title"  id="p_title" value="<?php  echo $p_title; ?>">
					</div>
					<div class="form-group">
						<label for="p_category">Edit Product Category:</label>
					<select name="p_category" class="form-control" id="p_category">

					<option value="<?php echo $p_category_id;?>"><?php echo $cat_name;?></option>
					<?php
        $get_categories="select * from categories";
        $run_categories=mysqli_query($conn,$get_categories);

        while($row_categories=mysqli_fetch_array($run_categories)){

          $categories_id=$row_categories['c_id'];
          $categories_title=$row_categories['c_title'];

 	 			echo "<option value='$categories_id'>$categories_title</option>";
      }

        ?>
						
						


					</select>
					</div>
					<div class="form-group">
						<label for="p_brand">Edit Product Brand:</label>
					<select name="p_brand" class="form-control" id="p_brand" >
					<option value="<?php echo $p_brand_id; ?>"><?php echo $b_name; ?></option>
					<?php

        $get_brand="select * from brands";
        $run_brand=mysqli_query($conn,$get_brand);

        while($row_brand=mysqli_fetch_array($run_brand)){

          $brand_id=$row_brand['b_id'];
          $brand_title=$row_brand['b_title'];

 	 			echo "<option value='$brand_id'>$brand_title</option>";
      }

        ?>
					</select>
					</div>
				
					<div class="form-group">
						<label for="p_price">Edit Product Price:</label>
					<input type="text" class="form-control" name="p_price"  id="p_price" value="<?php echo $p_price; ?>">
					</div>
					<div class="form-group">
						<label for="p_desc">Edit Product Description:</label>
					<textarea class="form-control" name="p_desc"  id="p_desc" ><?php echo $p_desc; ?></textarea > 
					</div>
					<div class="form-group">
						<label for="p_keywords">Edit Product Keywords:</label>
					<input type="text" class="form-control" name="p_keywords"  id="p_keywords" value="<?php echo $p_keyword; ?>">
					</div>
					<div class="form-group">
                        
                        <button type="submit" name="Update_p" autofocus class="btn btn-success">Update</button>
                        </div>


					 </form>

					 	<!--Update Img1 -->

					 	<form action="" method="post" enctype="multipart/form-data">
				
		<div class="form-group">
			<label for="p_img1">Update Image1:</label>
					<input type="file" class="form-control"  name="p_img1"  id="p_img1">
					<img src="product_images/<?php echo $p_img1; ?>"  height="70" width="70" />

		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-danger" name="img_ch1" value="update_img" >Update</button>
		</div>

			</form>


				 	<form action="" method="post" enctype="multipart/form-data">
				
		<div class="form-group">
			<label for="p_img1">Update Image2:</label>
					<input type="file" class="form-control"  name="p_img2"  id="p_img2">
					<img src="product_images/<?php echo $p_img2; ?>" alt="No Img" height="70" width="70" />

		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-danger" name="img_ch2" value="update_img" >Update</button>
		</div>

			</form>


				 	<form action="" method="post" enctype="multipart/form-data">
				
		<div class="form-group">
			<label for="p_img1">Update Image3:</label>
					<input type="file" class="form-control"  name="p_img3"  id="p_img3">
					<img src="product_images/<?php echo $p_img3; ?>" alt="No Img" height="70" width="70" />

		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-danger" name="img_ch3" value="update_img" >Update</button>
		</div>

			</form>

					 </div>

				
			</div>
			</div>
			 
   

<?php

	$update_id=$edit_id;
// 		function test_input($data) {

//  	 $data = trim($data);
//   	$data = stripslashes($data);
//  	 $data = htmlspecialchars($data);
//   return $data;
// }
	if(isset($_POST['Update_p'])){

		$p_title=test_input($_POST['p_title']);
		$p_category=test_input($_POST['p_category']);
		$p_brand=test_input($_POST['p_brand']);
		$p_price=test_input($_POST['p_price']);
		$p_desc=test_input($_POST['p_desc']);
		$status='on';
		$p_keywords=test_input($_POST['p_keywords']);
		

		//text data variables

		//image name
		
		$p_img2 = $_FILES['p_img2']['name'];
		$p_img3 = $_FILES['p_img3']['name'];

		//Image temp names
	
	$temp_img2 = $_FILES['p_img2']['tmp_name'];
	$temp_img3 = $_FILES['p_img3']['tmp_name'];

	//uploading images to its folder
	move_uploaded_file($temp_img1,"product_images/$p_img1");
	move_uploaded_file($temp_img2,"product_images/$p_img2");
	move_uploaded_file($temp_img3,"product_images/$p_img3");

	$update_query="update products set p_title='$p_title',p_category_id='$p_category',p_brand_id='$p_brand',p_price='$p_price',p_desc='$p_desc',p_keyword='$p_keywords',p_date=NOW() where p_id='$update_id'";

	$run_update=mysqli_query($conn,$update_query);
	if($run_update){
		echo "<script>window.open('index.php?view_product','_self')</script>";
	}

	


	}
	if(isset($_POST['img_ch1'])){

		$p_img1 = $_FILES['p_img1']['name'];
		$temp_img1 = $_FILES['p_img1']['tmp_name'];
		$update_i1="Update products set p_img1='$p_img1' where p_id='$update_id'";
				$run_i1=mysqli_query($conn,$update_i1);
			move_uploaded_file($temp_img1,"product_images/$p_img1");
			echo "<script>window.open('index.php?view_product','_self')</script>";
	}

	if(isset($_POST['img_ch2'])){

		$p_img2 = $_FILES['p_img2']['name'];
		$temp_img2 = $_FILES['p_img2']['tmp_name'];
		$update_i2="Update products set p_img2='$p_img2' where p_id='$update_id'";
				$run_i2=mysqli_query($conn,$update_i2);
			move_uploaded_file($temp_img2,"product_images/$p_img2");
			echo "<script>window.open('index.php?view_product','_self')</script>";
	}

	if(isset($_POST['img_ch3'])){

		$p_img3 = $_FILES['p_img3']['name'];
		$temp_img3 = $_FILES['p_img3']['tmp_name'];
		$update_i3="Update products set p_img3='$p_img3' where p_id='$update_id'";
				$run_i3=mysqli_query($conn,$update_i3);
			move_uploaded_file($temp_img3,"product_images/$p_img3");
			echo "<script>window.open('index.php?view_product','_self')</script>";
	}



?>