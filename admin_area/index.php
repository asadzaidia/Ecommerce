<?php
@session_start();
if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('admin_login.php','_self');</script>";
}
else{

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

<?php echo "<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'> "?>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://use.fontawesome.com/2068589c33.js"></script>
<?php echo '<link rel="stylesheet" href="styles/admin_style.css" media="all" />'; ?>
	<title>Admin Area</title>
	</head>
		
	<body>
	<div class="row" >
		<div class="col-xs-12">
			<div class="page-header" style="text-align: center;" ><h1>Admin Area</h1>
			<span style="float: right; font-weight: 40px;margin-top:-20px;"><a href="admin_logout.php" style="text-decoration:none;"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></span>

			</div>

		</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-md-3">
				<ul class="nav nav-pills nav-stacked">

				<li role="presentation"><a href="index.php?insert_product">Insert Products</a></li>
				<li role="presentation"><a href="index.php?view_product">View All Products</a></li>
				<li role="presentation"><a href="index.php?insert_cat">Insert New Category</a></li>
				<li role="presentation"><a href="index.php?view_cat">View All Categoies</a></li>
				<li role="presentation"><a href="index.php?insert_brand">Insert New Brands</a></li>
				<li role="presentation"><a href="index.php?view_brand">View All Brands</a></li>
				<li role="presentation"><a href="index.php?view_cust">View Customer</a></li>
				<li role="presentation"><a href="index.php?view_orders">View Orders</a></li>



  
					</ul>

			</div>

			<div class="col-md-12 col-md-9" >

				<?php
				if(!isset($_GET['insert_product']) AND !isset($_GET['view_product']) AND !isset($_GET['insert_cat']) AND !isset($_GET['view_cat']) AND !isset($_GET['insert_brand']) AND !isset($_GET['view_brand']) AND !isset($_GET['view_cust']) AND !isset($_GET['view_orders']) AND !isset($_GET['edit_pro']) AND !isset($_GET['del_pro']) AND !isset($_GET['del_cat']) AND !isset($_GET['insert_brand']) AND !isset($_GET['edit_cat']) AND !isset($_GET['insert_cat']) AND !isset($_GET['edit_brand']) AND !isset($_GET['del_brand']) AND !isset($_GET['del_customer']) AND !isset($_GET['del_order'])){

					echo " <h2 style='text-align:center;color:red;font-family:Impact'>Welcome Admin</h2> <br /><img src='../ProjectImages/admin.jpg' height='370' width='600' style='display:block;
        margin-left: auto;
        margin-right: auto;' />";
				} 

					include("includes/conn.php");


						function test_input($data) {

 						$data = trim($data);
  						$data = stripslashes($data);
 						 $data = htmlspecialchars($data);
 						 return $data;
}

					if(isset($_GET['insert_product'])){

						include("insert_product.php");

					}
					if(isset($_GET['view_product'])){
						include("view_products.php");
					}
					if(isset($_GET['edit_pro'])){

	 include("edit_pro.php");
	}

				if(isset($_GET['del_pro'])){

	 include("deleteproducts.php");
	}

				if(isset($_GET['view_cat'])){

	 include("view_categories.php");
	}

			if(isset($_GET['edit_cat'])){

	 include("edit_category.php");
	}


			if(isset($_GET['insert_cat'])){

	 include("insert_category.php");
	}

	
	if(isset($_GET['del_cat'])){
		include("del_category.php");
	}

	if(isset($_GET['insert_brand'])){
		include("insert_brand.php");
	}


	if(isset($_GET['view_brand'])){
		include("view_brand.php");
	}

	if(isset($_GET['edit_brand'])){
		include("edit_brand.php");
	}

	if(isset($_GET['del_brand'])){
		include("del_brand.php");
	}
	if(isset($_GET['view_cust'])){
		include("view_cust.php");
	}

	if(isset($_GET['del_customer'])){
		include("del_customer.php");
	}
	if(isset($_GET['view_orders'])){
		include("view_orders.php");
	}
	if(isset($_GET['del_order'])){
		include("del_order.php");
	}



				?>


			</div>

		</div>

		<div class="row">
				
				<div class="col-md-12">
					
					<footer class="row-footer" style="margin-top:600px;">
       			 <div class="container">
                
                    <p align="center" style="font-weight: bold;color:black; margin-bottom: ">© Copyright 2017 OnlineShopping</p>
                    <p align="center" style="font-weight: bold;color:black;">-By Asad Zaidi</p>
                    </div>
                    </footer>
                </div>
                        
                

            
      
        
        
				</div>

		
















</body>
</html>
<?php

}
?>