
<?php

$db=mysqli_connect("localhost","root","","myshop");


function getProducts(){
	global $db;

	if(!isset($_GET['category_id'])){
   
   	if(!isset($_GET['brand_id'])){
          $get_products="select * from products order by rand() LIMIT 0,6";

          $run_products=mysqli_query($db,$get_products);

          while($row_products=mysqli_fetch_array($run_products)){

            $pro_id=$row_products['p_id'];
            $p_title=$row_products['p_title'];
            $p_category_id=$row_products['p_category_id'];
            $p_brand_id=$row_products['p_brand_id'];
            $p_desc=$row_products['p_desc'];
            $p_price=$row_products['p_price'];
            $p_img1=$row_products['p_img1'];

            echo "

          
  <div class='col-md-4'>

    <div class='thumbnail'>
    <h1 style='font-weight:bold;font-size:17px;color:green;'>$p_title</h1>
      <img src='admin_area/product_images/$p_img1' alt='$p_title' /> <span class='label label-danger'>Rs:$p_price</span>
      <div class='caption'>
        <h3 style='font-weight:bold; font-size:15px;'>$p_desc</h3>
         <a href='details.php?product_id=$pro_id' class='btn btn-primary' role='button'><span style='font-weight:bold; font-family:Verdana'>Details</span></a> 
         <a href='index.php?add_cart=$pro_id' class='btn btn-success' role='button'><span style='font-weight:bold; font-family:Verdana'>Add to Cart</span></a> 
      </div>
    </div>
  </div>
       ";
          }
      }
  }


      
          


}

function getCategory_id_Products(){
	global $db;


	if(isset($_GET['category_id'])){
   
   	$category_id=$_GET['category_id'];

          $get_category_products="select * from products where p_category_id ='$category_id'";

          $run_products=mysqli_query($db,$get_category_products);
          $count=mysqli_num_rows($run_products);
          if($count==0){
          	echo "<div style='font-weight:bold;font-size:24px; color:red;'class='well well-lg'>No Products in this Category!</div> ";
          }

          while($row_products=mysqli_fetch_array($run_products)){

            $pro_id=$row_products['p_id'];
            $p_title=$row_products['p_title'];
            $p_category_id=$row_products['p_category_id'];
            $p_brand_id=$row_products['p_brand_id'];
            $p_desc=$row_products['p_desc'];
            $p_price=$row_products['p_price'];
            $p_img1=$row_products['p_img1'];

            echo "

          
  <div class='col-md-4'>

    <div class='thumbnail'>
    <h1 style='font-weight:bold;font-size:17px;color:green;'>$p_title</h1>
      <img src='admin_area/product_images/$p_img1' alt='$p_title' /> <span class='label label-danger'>Rs:$p_price</span>
      <div class='caption'>
        <h3 style='font-weight:bold; font-size:15px;'>$p_desc</h3>
         <a href='details.php?product_id=$pro_id' class='btn btn-primary' role='button'><span style='font-weight:bold; font-family:Verdana'>Details</span></a> 
         <a href='index.php?add_cart=$pro_id' class='btn btn-success' role='button'><span style='font-weight:bold; font-family:Verdana'>Add to Cart</span></a> 
      </div>
    </div>
  </div>
       ";
   
          }
      
  }


      
          


}
function getbrand_id_Products(){
	global $db;


	if(isset($_GET['brand_id'])){
   
   	$brand_id=$_GET['brand_id'];

          $get_brand_products="select * from products where p_brand_id ='$brand_id'";

          $run_products=mysqli_query($db,$get_brand_products);
          $count=mysqli_num_rows($run_products);
          if($count==0){
          	echo "<div style='font-weight:bold;font-size:24px; color:red;'class='well well-lg'>No Products in this Brands!</div> ";
          }

          while($row_products=mysqli_fetch_array($run_products)){

            $pro_id=$row_products['p_id'];
            $p_title=$row_products['p_title'];
            $p_category_id=$row_products['p_category_id'];
            $p_brand_id=$row_products['p_brand_id'];
            $p_desc=$row_products['p_desc'];
            $p_price=$row_products['p_price'];
            $p_img1=$row_products['p_img1'];

            echo "

         
  <div class='col-md-4'>

    <div class='thumbnail'>
    <h1 style='font-weight:bold;font-size:17px;color:green;'>$p_title</h1>
      <img src='admin_area/product_images/$p_img1' alt='$p_title' /> <span class='label label-danger'>Rs:$p_price</span>
      <div class='caption'>
        <h3 style='font-weight:bold; font-size:15px;'>$p_desc</h3>
         <a href='details.php?product_id=$pro_id' class='btn btn-primary' role='button'><span style='font-weight:bold; font-family:Verdana'>Details</span></a> 
         <a href='index.php?add_cart=$pro_id' class='btn btn-success' role='button'><span style='font-weight:bold; font-family:Verdana'>Add to Cart</span></a> 
      </div>
    </div>
  </div>
  
       ";
          }
      
  }


      
          


}


function getBrands(){
	global $db;
	 $get_brand="select * from brands";
        $run_brand=mysqli_query($db,$get_brand);

        while($row_brand=mysqli_fetch_array($run_brand)){

          $brand_id=$row_brand['b_id'];
          $brand_title=$row_brand['b_title'];

            echo " <li role='presentation'><a href='index.php?brand_id=$brand_id'>$brand_title</a></li>";
          }

}

function getCategory(){
	global $db;
	$get_categories="select * from categories";
        $run_categories=mysqli_query($db,$get_categories);

        while($row_categories=mysqli_fetch_array($run_categories)){

          $categories_id=$row_categories['c_id'];
          $categories_title=$row_categories['c_title'];

 	 			echo "<li role='presentation'><a href='index.php?category_id=$categories_id'>$categories_title</a></li>";
}
}
function getIp(){
//function for getting ip add

	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		//check ip for share internet
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		//to check ip is pass from proxy
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
return $ip;
}


//creating function for cart

function cart(){
	global $db;
	if(isset($_GET['add_cart'])){

		$ip_add=getIp();
		$p_id=$_GET['add_cart'];

		$check_pro = "select * from cart where 	ip_add='$ip_add' AND cart_p_id ='$p_id'";
		$run_check=mysqli_query($db,$check_pro);
		if(mysqli_num_rows($run_check )>0){

			echo "";
		}
		else{
			$q="Insert into cart (cart_p_id,ip_add) values('$p_id','$ip_add')";
			$run_q=mysqli_query($db,$q);
			echo "<script>window.open('index.php','_self')</script>";
		}

	}
}

//getting the number of items from the cart
function item_cart(){
	global $db;
$ip_add=getIp();
	if(isset($_GET['add_cart'])){

		$get_items="select * from cart where ip_add='$ip_add'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);

	}else{
		$get_items="select * from cart where ip_add='$ip_add'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);

	}	
	echo $count_items;
}

//getting total price in the cart
function total_Cart_price(){
global $db;
$ip_add=getIp();
$total=0;
$sel_price="select * from cart where ip_add='$ip_add'";
$run_price=mysqli_query($db,$sel_price);
while($record=mysqli_fetch_array($run_price)){
$pro_id=$record['cart_p_id'];
$pro_price="select * from products where p_id='$pro_id'";
$run_pro_price=mysqli_query($db,$pro_price);
while($p_price=mysqli_fetch_array($run_pro_price)){

$product_price=array($p_price['p_price']);
$values=array_sum($product_price);
$total+=$values;
}

}
echo "Rs:".$total;

}

//getting the Default for  Customer
function getDefaultCustomer(){
  global $db;
  $c=$_SESSION['cust_email'];
  $get_c="select * from customer where cust_email LIKE '%$c%'";

  $run_c=mysqli_query($db,$get_c);
  $row_c=mysqli_fetch_array($run_c);

    $customer_id=$row_c['cust_id'];
    if(!isset($_GET['edit_account'])){
       if(!isset($_GET['my_orders'])){
         if(!isset($_GET['change_pass'])){
           if(!isset($_GET['delete_account'])){

            $get_orders="select * from orders where o_customer_id=' $customer_id' AND order_status='pending'";

          $run_orders=mysqli_query($db,$get_orders);

          $count_orders=mysqli_num_rows($run_orders);

          if($count_orders>0){
            echo "
            <div class='row'>
                <div class='col-md-12'>
                <h1 style='red'>Important!</h1>
                <h4 class='alert alert-danger'>You have <span class='badge'>$count_orders </span> Pending Orders</h4>
                <h3>Please see your orders details by clicking this <a href='my_account.php?my_orders'>Here</a></h3>
                 <h3>Or you can  <a href='pay_offline.php'>Pay offline</a></h3>
                </div>



            </div>



            ";
          }
          else{
              echo "
            <div class='row'>
                <div class='col-md-12'>
                <h1 style='red'>Important!</h1>
                <h4 class='alert alert-success'>You have No Pending Orders</h4>
                <h3>See your orders details by clicking this <a href='my_account.php?my_orders'>History</a></h3>
                 
                </div>



            </div>



            ";



          }

  
    }
}
}
}

}


?>
<script
   src="https://code.jquery.com/jquery-2.2.2.min.js" 
     integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" 
     crossorigin="anonymous"></script>
 <script 
     src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
     integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" 
     crossorigin="anonymous"></script>