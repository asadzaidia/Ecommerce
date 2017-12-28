<?php
@session_start();
  include("includes/conn.php");
  include("functions/functions.php")
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
<?php echo '<link rel="stylesheet" href="styles/style.css" media="all" />'; ?>
	<title>Cart</title>
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
        <li ><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li><a  href="all_products.php"><span class="fa fa-shopping-bag" aria-hidden="true"></span>All Products</a></li>
                <li><a  href="customer/my_account.php"><span class="fa fa-smile-o" aria-hidden="true"></span>My Accounts</a></li>
                <li class="active"><a  href="cart.php"><span class="fa fa-shopping-cart" aria-hidden="true"></span>Shopping Cart</a></li>
               
              

      </ul>
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
      <div class="col-xs-12">
      <div style="background: #00cc9f; color:white;text-align:center;">
        <p style="color:black; font-weight: bold; font-size:24px;" >Shopping Cart:   -Item: <span style="color:red;"><?php item_cart(); ?>  </p>
      <a data-toggle="tooltip" data-placement="left" title="Go to Cart" href="cart.php">  <span class="fa fa-shopping-cart fa-3x" aria-hidden="true"> </span></a>

      </div>
      <?php

          if(isset($_SESSION['cust_email'])){

            $email=$_SESSION['cust_email'];

            $query="select * from customer where cust_email LIKE '%$email%'";
            $r_q=mysqli_query($conn,$query);

            while($row_products=mysqli_fetch_array($r_q)){

              $img=$row_products['cust_img'];
              if($img !== ''){

            echo "<a data-toggle='tooltip' data-placement='left' title='My Account' href='customer/my_account.php'><p style='float:right;margin-top:-20px;'><img src='customer/customer_image/$img' class='img-circle'  width='100' height='100'></p></a>";
          }

            }

          

          }

        ?>
      </div>
      </div>
    

		<!--sidebar and content area -->
    <div class="container">
		<div class="row">
		<!--Content-->
		<div  class="col-md-12 " id="content" style="margin-top:20px; ">

 <form action="cart.php" method="post" enctype="multipart/form-data">
        
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h1 style="color:blue;font-weight: bold;font-size: 24px;font-family: cursive;">Items List</h1></div>
  <!-- Table -->
  <table class="table">
    <tr>
      <td  style="color:#00cc9f;font-weight: bold;font-size: 17px;font-family: cursive;">Remove</td>
      <td  style="color:#00cc9f;font-weight: bold;font-size: 17px;font-family: cursive;">Product's</td>
      <td  style="color:#00cc9f;font-weight: bold;font-size: 17px;font-family: cursive;">Quantity</td>
      <td  style="color:#00cc9f;font-weight: bold;font-size: 17px;font-family: cursive;">Total Price</td>
    </tr>

    <?php

$ip_add=getIp();
$sel_price="select * from cart where ip_add='$ip_add'";
$run_price=mysqli_query($conn,$sel_price);
while($record=mysqli_fetch_array($run_price)){
$pro_id=$record['cart_p_id'];
$pro_q_price=$record['price'];

$pro_price="select * from products where p_id='$pro_id'";
$run_pro_price=mysqli_query($conn,$pro_price);
while($p_price=mysqli_fetch_array($run_pro_price)){

// $product_price=array($p_price['p_price']);
$pro_pri2=$p_price['p_price'];
$product_title=$p_price['p_title'];
$product_image=$p_price['p_img1'];
$p_price=$p_price['p_price'];

// $values=array_sum($product_price);
  echo"

    <tr>
    <td><div class='form-group'>
      <input type='checkbox' name='remove[]' value='$pro_id' >

    </div>
    </td>

    <td><div class='thumbnail'>
    <h1><span class='label label-danger'>Rs:$p_price</span></h1><br />
    <h1 style='font-weight:bold;font-size:15px;color:blue;'>$product_title</h1>
    <img src='admin_area/product_images/$product_image' alt='$product_title'>
    </div>
    </td>
    <td><input type='number' class='form-control' name='qty'  size='2'/>
    <br />
   <input type='checkbox' name='p_q_id' value='$pro_id'>
      <br/>Please Check the box when updating Quantity
    <button  type'submit' name='Update_qty' class='btn btn-danger'  style='font-weight: bold;' />Update</button></td>

    <td>  <h1 style='font-weight:bold; font-size:15px;'>RS: $pro_q_price</h1> </td>


  


    </tr>
    ";


  }
}

 
 if(isset($_POST['Update_qty'])){
  // foreach($_POST['remove'] as $remove_id)
  $ip_add=getIp();
  $qty=$_POST['qty'];

  $p_q_id=$_POST['p_q_id'];
  echo $qty;
  echo "<br />";
  echo $p_q_id;
  $insert_q="update cart set  qty='$qty' where ip_add='$ip_add' AND cart_p_id='$p_q_id'";
  $run_q=mysqli_query($conn,$insert_q);
  
  $total_2=$pro_pri2*(int)$qty;

  $insert_q2="update cart set  price='$total_2' where ip_add='$ip_add' AND cart_p_id='$p_q_id' ";
  $run_q2=mysqli_query($conn,$insert_q2);

  echo " <script>window.open('cart.php','_self')</script> " ;
}



 
?>


  </table>


</div>
  <button  type="submit" name="Update" class="btn btn-danger"  style="font-weight: bold;" /><i class="fa fa-refresh fa-spin" aria-hidden="true" required></i>Update Cart</button>
   <button  type="submit" name="continue" class="btn btn-info"  style="font-weight: bold;" /><i class="fa fa-shopping-bag" aria-hidden="true"></i>Continue Shopping</button>
  <br /> <br />
  <p style="font-weight: bold;font-size: 25px;float:right;">Total = <?php $total=0; echo $total?></p>
  <br />
  <br />
  <br />
  <a style="float:right;" class="btn btn-success" href="checkout.php">
  <i class="fa fa-credit-card-alt" aria-hidden="true"></i>Checkout</a>

      </form>
<?php 
function update_remove_item(){
  global $conn;
if(isset($_POST['Update'])){
  //foreach for multiple
  
  foreach($_POST['remove'] as $remove_id){

    $delete_products="delete from cart where cart_p_id='$remove_id'";
    $run_delete=mysqli_query($conn,$delete_products);
    if($run_delete){
      echo " <script>window.open('cart.php','_self')</script> " ;
    }
    else{
          echo "<script>window.open('cart.php','_self')</script>"; 
    }
  }
}

}
echo @$update_remove_item= update_remove_item();



if(isset($_POST['continue']))
{
  echo " <script>window.open('index.php','_self')</script> " ;
}

//@ use if isset is not set/active


?>
          
      
      </div>
     



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

	</body>
</html>