<?php
@session_start();
  include("includes/conn.php");
  include("functions/functions.php");
 
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://use.fontawesome.com/2068589c33.js"></script>
  
  

<?php echo "<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'> "?>

<?php echo '<link rel="stylesheet" href="styles/style.css" media="all" />'; ?>
	<title>E Commerce</title>
	</head>

	<body>

	<div>

		<!--Navbar-->
		<nav  class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbarr" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="color:red; font-weight: bold;">MyShop</a>
    </div>

    <div class="collapse navbar-collapse" id="Navbarr"  >
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li><a  href="all_products.php"><span class="fa fa-shopping-bag" aria-hidden="true"></span>All Products</a></li>
                <li><a  href="customer/my_account.php"><span class="fa fa-smile-o" aria-hidden="true"></span>My Accounts</a></li>
                <li><a  href="cart.php"><span class="fa fa-shopping-cart" aria-hidden="true"></span>Shopping Cart</a></li>
               
              

      </ul>

      <form method="get" action="results.php" enctype="multipart/form-data" class="navbar-form navbar-right">
        <div class="form-group" >
          <input type="text" name="user_query" class="form-control" placeholder="Search Product" />
        </div>
        <button type="submit" name="search" value="Search" class="btn btn-info">Search</button>
      </form>
     
          <?php
        if(!isset($_SESSION['cust_email'])){
       echo " <a href='checkout.php' class='btn btn-success  navbar-btn navbar-right'>LOGIN <span><i class='fa fa-sign-in' aria-hidden='true'></i></span></a>  ";

        }
        else{
           echo " <a href='logout.php' class='btn btn-danger  navbar-btn navbar-right'>LOGOUT <span><i class='fa fa-sign-out' aria-hidden='true'></i></span></a>  ";


        }
        ?>

    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--Navbar-->
<!--Upper Cart Rep-->
<div class="row" style="margin-top:52px;"> 
<?php cart();?>
      <div class="col-md-12">
      <div style="background: black; color:white;text-align:center;">
        <p style="color:#00cc9f; font-weight: bold; font-size:24px;" >Shopping Cart:   -Item: <span style="color:red;"><?php item_cart(); ?> </span> </p><!-- <span style="font-weight:bold;font-size:24px;float:right;margin-top:-10px;"> -->

      <a data-toggle="tooltip" data-placement="left" title="Go to Cart" href="cart.php">  <span class="fa fa-shopping-cart fa-2x" aria-hidden="true"> </span></a>
      
     
        <?php

          if(isset($_SESSION['cust_email'])){

            $email=$_SESSION['cust_email'];

            $query="select * from customer where cust_email LIKE '%$email%'";
            $r_q=mysqli_query($conn,$query);

            while($row_products=mysqli_fetch_array($r_q)){

              $img=$row_products['cust_img'];
              if($img !== ''){

            echo "<a data-toggle='tooltip' data-placement='left' title='My Account' href='customer/my_account.php'><p><img src='customer/customer_image/$img' class='img-circle'  width='50' height='50'></a>";
          }

            
      echo " <span style='margin-left:12px; font-weight: bold;font-size:20px;font-family: cursive;'>Welcome: " .$name=$row_products['cust_name']. "</span></p>";

            }

          

          }

        ?>


      

    
      </div>
      </div>
      </div>
     
		<!--sidebar and content area -->
		<div class="row">
		<!--Sidebar-->
		<div class="col-md-12 col-md-2" id="sidebar" style="height: 1200px;">
			<ul class="nav nav-pills nav-stacked">
 	 			<h1 style="padding-left: 20px; font-weight: bold;font-size: 24px; background-color: white;">Categories</h1>
        <?php
        
      getCategory();


        ?>

  		</ul>

			<ul class="nav nav-pills nav-stacked">
 	 			<h1 style="padding-left: 20px; font-weight: bold;font-size: 24px; background-color: white;">Brands</h1>
 	 			
        <?php
        getBrands();
          ?>
  	
			</ul>
    </div>
		<!--sidebar -->

		<!--Content-->
		<div  class="col-md-12 col-md-10" id="content" style="margin-top: 52px; ">
      <br /> <br />
     
         
          <?php

            getProducts();
           getCategory_id_Products();
           
            getbrand_id_Products();

         ?>  
    
      </div>
     



		</div>
		<!--Content-->
		
	<!-- 	</div> -->
		<!--sidebar and content area -->
		<!--footer-->
		<footer class="row-footer" style="margin-top:1200px;">
        <div class="container">
            <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h5 style="font-weight: bold;color:black;">-Our Adress</h5>
                <address>
                 
                <span class="glyphicon glyphicon-pencil"></span>:Main Bahdurabad, Karachi<br>
                <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>:+923152574917<br>
                 <span class="glyphicon glyphicon-envelope"></span><a href="#">Shop@gmail.com</a>
                </address>
                
                </div>
                
                <div class="col-xs-12 col-sm-6">
                <h3 style="font-weight: bold;color:black;">Follow Us!</h3>
                    <address>
                    <a href="https://www.facebook.com/"><i class="fa fa-facebook-official fa-4x" aria-hidden="true"></i></a>
                        
                     <a href="https://www.twitter.com/"><i class="fa fa-twitter fa-4x" aria-hidden="true"></i></a>
                        
                    <a href="https://www.linkedin.com/"><i class="fa fa-linkedin-square fa-4x" aria-hidden="true"></i></a>
                        
                    <a href="https://plus.google.com/"><i class="fa fa-google-plus-square fa-4x" aria-hidden="true"></i></a>
                    
                    </address>
                    
                
                </div>
                
                <div class="row">
                    <div class="col-xs-12">
                        <br>
                    <p align="center" style="font-weight: bold;color:black; margin-bottom: ">© Copyright 2017 OnlineShopping</p>
                    </div>
                </div>
                        
                
            </div>
            
            </div>
        
        </footer>
        </div>
        
		<!--footer-->
<!--  -->
	</body>
</html>