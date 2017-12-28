<?php
  include("includes/conn.php");
?>


			<div class="container" >
				<h1 class="page-header">Add Products:</h1>
				
				<br /> 
				<div class="row">
				<div class="col-md-6">
				
				<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group" >
				<label for="p_title">Product Title:</label>
					<input type="text" class="form-control" name="p_title" placeholder="" id="p_title" required>
					</div>
					<div class="form-group">
						<label for="p_category">Select Product Category:</label>
					<select name="p_category" class="form-control" id="p_category" required>
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
						<label for="p_brand">Select Product Brand:</label>
					<select name="p_brand" class="form-control" id="p_brand" required>
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
						<label for="p_img1">Product Image1:</label>
					<input type="file" class="form-control" name="p_img1" placeholder="" id="p_img1" required>
					</div>
					<div class="form-group">
						<label for="p_img2">Product Image2:</label>
					<input type="file" class="form-control" name="p_img2" placeholder="" id="p_img2">
					</div>
					<div class="form-group">
						<label for="p_img3">Product Image3:</label>
					<input type="file" class="form-control" name="p_img3" placeholder="" id="p_img3">
					</div>
					<div class="form-group">
						<label for="p_price">Product Price:</label>
					<input type="text" class="form-control" name="p_price" placeholder="" id="p_price" required>
					</div>
					<div class="form-group">
						<label for="p_desc">Product Description:</label>
					<textarea class="form-control" name="p_desc" placeholder="" id="p_desc" required></textarea> 
					</div>
					<div class="form-group">
						<label for="p_keywords">Product Keywords:</label>
					<input type="text" class="form-control" name="p_keywords" placeholder="" id="p_keywords" required>
					</div>
					<div class="form-group">
                        
                        <button type="submit" name="submit" autofocus class="btn btn-info">Submit</button>
                        </div>


					 </form>
					 </div>

				
			</div>
			</div>
			<script 
   

<?php


	if(isset($_POST['submit'])){

		$p_title=test_input($_POST['p_title']);
		$p_category=test_input($_POST['p_category']);
		$p_brand=test_input($_POST['p_brand']);
		$p_price=test_input($_POST['p_price']);
		$p_desc=test_input($_POST['p_desc']);
		$status='on';
		$p_keywords=test_input($_POST['p_keywords']);
		

		//text data variables

		//image name
		$p_img1 = $_FILES['p_img1']['name'];
		$p_img2 = $_FILES['p_img2']['name'];
		$p_img3 = $_FILES['p_img3']['name'];

		//Image temp names
	$temp_img1 = $_FILES['p_img1']['tmp_name'];
	$temp_img2 = $_FILES['p_img2']['tmp_name'];
	$temp_img3 = $_FILES['p_img3']['tmp_name'];

	//uploading images to its folder
	move_uploaded_file($temp_img1,"product_images/$p_img1");
	move_uploaded_file($temp_img2,"product_images/$p_img2");
	move_uploaded_file($temp_img3,"product_images/$p_img3");

	$insert_queryyy="insert into products (p_category_id,	p_brand_id,p_date,p_title,p_img1,p_img2,p_img3,p_price,p_desc,p_status,p_keyword) values ('$p_category','$p_brand',NOW(),'$p_title','$p_img1','$p_img2','$p_img3','$p_price','$p_desc','$status','$p_keywords')";

	$run_queryyy=mysqli_query($conn,$insert_queryyy);
	if($run_queryyy){
		echo "<script>window.open('index.php?view_product','_self')</script>";
	}
	else{
		echo "Not inserted";
	}

	


	}

?>