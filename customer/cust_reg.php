<?php
session_start();
  include("includes/conn.php");
  include("../functions/functions.php");
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

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php echo "<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'> "?>


<script src="https://use.fontawesome.com/2068589c33.js"></script>
<?php echo '<link rel="stylesheet" href="../styles/style.css" media="all" />'; ?>
	<title>Register</title>
	</head>

	<body>

	<div>

		<!--Navbar-->
		<nav  class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="color:red; font-weight: bold;">MyShop</a>
    </div>

    <div id="Navbar" class="collapse navbar-collapse" >
      <ul class="nav navbar-nav">
        <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li><a  href="../all_products.php"><span class="fa fa-shopping-bag" aria-hidden="true"></span>All Products</a></li>
                <li><a  href="../my_accounts.php"><span class="fa fa-smile-o" aria-hidden="true"></span>My Accounts</a></li>
                <li><a  href="../cart.php"><span class="fa fa-shopping-cart" aria-hidden="true"></span>Shopping Cart</a></li>
                <li><a href="../contact.php"><span class="fa fa-phone-square" aria-hidden="true">Contact</a></li>
              

      </ul>

      <form method="get" action="results.php" enctype="multipart/form-data" class="navbar-form navbar-right">
        <div class="form-group" >
          <input type="text" name="user_query" class="form-control" placeholder="Search Product" />
        </div>
        <button type="submit" name="search" value="Search" class="btn btn-info">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--Navbar-->
<!--Upper Cart Rep-->
<div class="row" style="margin-top:52px;"> 
<?php cart();?>
      <div class="col-xs-12">
      <div style="background: black; color:white;text-align:center;">
        <p style="color:#00cc9f; font-weight: bold; font-size:24px;" >Shopping Cart:   -Item: <span style="color:red;"><?php item_cart(); ?> </span></p>
      <a data-toggle="tooltip" data-placement="left" title="Go to Cart" href="cart.php">  <span class="fa fa-shopping-cart fa-2x" aria-hidden="true"> </span></a>

      </div>
      </div>
      </div>
     
		<!--sidebar and content area -->
		<div class="container">
        <div class="page-header" style="color:Blue;font-family: cursive;font-weight: 100px;font-weight: bold;">Create An Accout:</div>
        
        <br /><br />
        <div class="row">
        <div class="col-md-4 col-md-offset-1">
        <div><p id="regis" style="font-weight: 30px;color:red;"></p></div>
          <form method="post" action="cust_reg.php" enctype="multipart/form-data">
          <div class="form-group" >
          <label for="cust_name">Customer Name:</label>
          <input type="text" class="form-control" name="cust_name" placeholder="" id="cust_name" required>
          </div>
          <div class="form-group" >
          <label for="cust_email">Customer Email:</label>
          <input type="email" class="form-control" name="cust_email" placeholder="" id="cust_email" required>
          </div>
          <div class="form-group" >
          <label for="cust_pass">Customer Password:</label>
          <input type="Password" class="form-control" name="cust_pass" placeholder="" id="cust_pass" required>
          </div>
           <div class="form-group" >
          <label for="cust_country">Customer Country:</label>
          <input type="text" class="form-control" name="cust_country" placeholder="" id="cust_country" required>
          </div>
           <div class="form-group">
          <label for="cust_city">Customer City:</label>
          <input type="text" class="form-control" name="cust_city" placeholder="" id="cust_city" required>
          </div>
          <div class="form-group">
          <label for="cust_phone">Customer Phone:</label>
          <input type="text" class="form-control" name="cust_phone" placeholder="" id="cust_phone" required>
          </div>
          <div class="form-group">
          <label for="cust_add">Customer Address:</label>
          <input type="text" class="form-control" name="cust_add" placeholder="" id="cust_add" required>
          </div>
          
          
          <div class="form-group">
            <label for="cust_img">Customer Image:</label>
          <input type="file" class="form-control" name="cust_img" placeholder="" id="cust_img" >
          </div>
          
          <div class="form-group">
                        
                        <button type="submit" name="register" autofocus class="btn btn-info btn-lg">Register
                        </div>


           </form>
           </div>

         
        
      </div>
      <?php
      function test_input($data) {

       $data = trim($data);
        $data = stripslashes($data);
      $data = htmlspecialchars($data);
        return $data;
      }
        if(isset($_POST['register'])){

          $cust_name=test_input($_POST['cust_name']);
          $cust_email=test_input($_POST['cust_email']);
          $cust_pass=test_input($_POST['cust_pass']);
          $cust_country=test_input($_POST['cust_country']);
          $cust_city=test_input($_POST['cust_city']);
          $cust_phone=test_input($_POST['cust_phone']);
          $cust_add=test_input($_POST['cust_add']);
          //image customer
          $cust_img=$_FILES['cust_img']['name'];

          //temp
          $cust_img_temp=$_FILES['cust_img']['tmp_name'];

               
          $cip=getIp();

          

              $check_query="select * from customer where cust_email LIKE'%$cust_email%'";
              $run_check=mysqli_query($conn,$check_query);
        $checking=mysqli_num_rows($run_check);

      if(!$checking==1){
          $insert="insert into  customer (cust_name,cust_email,cust_pass,cust_country,cust_city,cust_contact,cust_address,cust_img, cust_ip) values('$cust_name',' $cust_email','$cust_pass','$cust_country','$cust_city','$cust_phone',' $cust_add','$cust_img','$cip')";
     
          
          $run_cus=mysqli_query($conn,$insert);
      copy($cust_img_temp,"customer_image/$cust_img");

          $sel_cart="select * from cart where ip_add='$cip'";
          $run_cart=mysqli_query($conn,$sel_cart);
          $check_cart=mysqli_num_rows($run_cart);

          if($check_cart>0){
            $_SESSION['cust_email']=$cust_email;
            echo "Registered";
            echo "<script>window.open('../checkout.php','_self')</script>";
       
          }
          else{
             $_SESSION['cust_email']=$cust_email;
             echo "Registered";
            echo "<script>window.open('../index.php','_self')</script>";
          }


        }
      
      else{

        echo "<script>var error=document.getElementById('regis');
    error.innerHTML='Email Adress Already Taken!!';</script>";

      }
    }

      ?>
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
	
	</body>
</html>