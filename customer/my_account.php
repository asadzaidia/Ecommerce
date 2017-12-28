<?php
@session_start();
  include("includes/conn.php");
  include("../functions/functions.php");

        if(!isset($_SESSION['cust_email'])){
       echo "<script>window.open('../checkout.php','_self')</script>";

        }
        

 
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
	<title>E Commerce</title>
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
        <li ><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li><a  href="../all_products.php"><span class="fa fa-shopping-bag" aria-hidden="true"></span>All Products</a></li>
                <li class="active"><a  href="my_account.php"><span class="fa fa-smile-o" aria-hidden="true"></span>My Accounts</a></li>
                <li><a  href="../cart.php"><span class="fa fa-shopping-cart" aria-hidden="true"></span>Shopping Cart</a></li>
             
              

      </ul>
 
          <?php
        if(!isset($_SESSION['cust_email'])){
       echo " <a href='../checkout.php' class='btn btn-success  navbar-btn navbar-right'>LOGIN <span><i class='fa fa-sign-in' aria-hidden='true'></i></span></a>  ";

        }
        else{
           echo " <a href='../logout.php' class='btn btn-danger  navbar-btn navbar-right'>LOGOUT <span><i class='fa fa-sign-out' aria-hidden='true'></i></span></a>  ";


        }
        ?>

    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="row" style="margin-top:52px;"> 
    <div class="container" style="border-bottom:1px solid deepskyblue;">
      <div class="col-md-12">
      
     
      <div>

                <div class='dropdown' style='float:right;'>
  <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
    
    <span class='glyphicon glyphicon-triangle-bottom' aria-hidden='true'></span>
  </button>
  <ul class="dropdown-menu" id="#dropdownMenu1" aria-labelledby='dropdownMenu1'>
    <li><a href='my_account.php?my_orders'>My Orders</a></li>
    <li><a href='my_account.php?edit_account'>Edit My Account</a></li>
    <li><a href='my_account.php?change_pass'>Change Password</a></li>
    
    <li role='separator' class='divider'></li>
    <li><a href='../logout.php''>Logout</a></li>
  </ul>
</div>
      
        <?php
          if(isset($_SESSION['cust_email'])){

            $email=$_SESSION['cust_email'];

            $query="select * from customer where cust_email LIKE '%$email%'";
            $r_q=mysqli_query($conn,$query);
            

            while($row_products=mysqli_fetch_array($r_q)){

              $img=$row_products['cust_img'];
              $name=$row_products['cust_name'];
              if($img !== ''){


             echo "
            <p style='float:right'>

            <img src='customer_image/$img' class='img-circle'  width='75' height='75'></p>";
          }
          else{
            echo "<p style='float:right'>$name</p>";
          }


          

          }
        }

        ?>
      
      </div>
        </div>
         </div>
      </div>
      <div class="row">
      <div class="col-md-4">
      <h1 class="page-header" style="color:red;font-family: cursive;">Manage your Account:</h1>
        </div>
      </div>

      <!--Getting Defaults-->
      <div >
      <?php
      getDefaultCustomer();

      if(isset($_GET['my_orders'])){

        include("my_orders.php");
      }
      if(isset($_GET['edit_account'])){

        include("edit_account.php");
      }

         if(isset($_GET['change_pass'])){

        include("change_pass.php");
      }
      ?>
      </div>






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
        

</body>
</html>