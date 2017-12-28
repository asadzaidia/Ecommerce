<?php

$db=mysqli_connect("localhost","root","","myshop");
/*ip address get krta hai */
function getUserIP()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'Unknown IP Address';

    return $ipaddress;
}

/* add in cart */

function cart()
{
if(isset($_GET['add_cart']))
{
	global $db;
	$ip_add=getUserIP();
	$p_id=$_GET['add_cart'];
	$check_pro="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
	$run_check=mysqli_query($db,$check_pro);
	if(mysqli_num_rows($run_check)>0)
    {
    	echo "";
    }
    else
    {
    	$q="insert into cart (p_id,ip_add) values ('$p_id','$ip_add')";
    	$run_q=mysqli_query($db,$q);
    	echo "<script>window.open('index.php','self')</script>";
    }
}

}


/*count items */
function items()
{

if(isset($_GET['add_cart']))
{
	global $db;
	$ip_add=getUserIP();
	$get_items="select * from cart where ip_add='$ip_add'";
	$run_item=mysqli_query($db,$get_items);
	$count_item=mysqli_num_rows($run_item);
}
else
{
	global $db;
	$ip_add=getUserIP();
	$get_items="select * from cart where ip_add='$ip_add'";
	$run_item=mysqli_query($db,$get_items);
	$count_item=mysqli_num_rows($run_item);
}
echo $count_item;
}

/* price */

function totalprice()
{
   $ip_add=getUserIP();
   global $db;
   $total=0;
   $sel_price="select * from cart where ip_add='$ip_add'";
   $run_price=mysqli_query($db,$sel_price);
   while ($record=mysqli_fetch_array($run_price)) 
   {
   	 $pro_id=$record['p_id'];
   	 $pro_price="select * from product where product_id='$pro_id'";
   	 $run_pro_price=mysqli_query($db,$pro_price);
     while ($p_price=mysqli_fetch_array($run_pro_price)) 
     {
       $product_price=array($p_price['product_price']);
       $values=array_sum($product_price);
       $total+=$values;
     }
     
   }

  echo "$".$total;
}

/*product display */
// function getpro()
// {               global $db;
// 	            if(!isset($_GET['cat']))
// 	            {
// 	            if(!isset($_GET['brand']))
// 	            {	
// 	             $get_product="select * from product order by rand() LIMIT 0,6";
// 				 $run_product=mysqli_query($db,$get_product);
// 				 while($row_product=mysqli_fetch_array($run_product))
// 				 {
// 					$pro_id=$row_product['product_id'];
// 					$pro_title=$row_product['product_title'];
// 			        $pro_cat=$row_product['cat_id'];
// 					$pro_brand=$row_product['brand_id'];
// 					$pro_desc=$row_product['product_desc'];
// 					$pro_price=$row_product['product_price'];
// 					$pro_image=$row_product['product_img1'];
					 
// 					echo "
//                     <div id='single_product' style='  border: 2px solid gray; width:230; margin-left: 20px;
// 	margin-right: 5px;'>
// 					<h3 style='text-align:center;'>$pro_title</h3>
// 					<img src='admin_area/product_image/$pro_image' height='180' width='180'><br>
// 					<p><b>Price: $pro_price</b></p><br>
// 					<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
// 					<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
// 					</div>
// 					<br>
// 					";
						
// 				 }
// 				}
// 			    }
// }

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



/*jis ki brand pr click kro gay wohi display hon gay bs */ 

function getbrands(){
	            global $db;
	            $get_cats="Select * from brands";
				$run_cats=mysqli_query($db,$get_cats);
         	while($row_cats=mysqli_fetch_array($run_cats))
			{
				$brand_id=$row_cats['b_id'];
				$brand_title=$row_cats['b_title'];
				echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
			} 
}

/* brand k product dipalay hon gay */
function getbrandpro()
{               global $db;

	            if(isset($_GET['brand']))
	            {
                
                $brand_id=$_GET['brand']; 
                $get_brand_pro="select * from product where brand_id='$brand_id'";
				$run_brand_pro=mysqli_query($db,$get_brand_pro);
				$count=mysqli_num_rows($run_brand_pro);
				if($count==0)
				{
					echo "<h2>No product found this category!</h2>";
				}
				 while($row_brand_pro=mysqli_fetch_array($run_brand_pro))
				 {
					$pro_id=$row_brand_pro['product_id'];
					$pro_title=$row_brand_pro['product_title'];
			        $pro_cat=$row_brand_pro['cat_id'];
					$pro_brand=$row_brand_pro['brand_id'];
					$pro_desc=$row_brand_pro['product_desc'];
					$pro_price=$row_brand_pro['product_price'];
					$pro_image=$row_brand_pro['product_img1'];
					 
					echo "
					<div id='single_product'>
					<h3>$pro_title</h3>
					<img src='admin_area/product_image/$pro_image' height='180' width='180'><br>
					<p><b>Price: $pro_price</b></p>
					<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
					<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
					</div>
					";
						
				 }
				}
			    
}

/* category walay display hon gay */
function getcat(){
	            global $db;
		        $get_cats="Select * from categories";
				$run_cats=mysqli_query($db,$get_cats);
         	while($row_cats=mysqli_fetch_array($run_cats))
			{
				$cat_id=$row_cats['c_id'];
				$cat_title=$row_cats['c_title'];
				echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
			} 
}

/* cat k product is se display hon gay */
function getcatpro()
{               global $db;

	            if(isset($_GET['cat']))
	            {
                
                $cat_id=$_GET['cat']; 
                $get_cat_pro="select * from product where cat_id='$cat_id'";
				$run_cat_pro=mysqli_query($db,$get_cat_pro);
				$count=mysqli_num_rows($run_cat_pro);
				if($count==0)
				{
					echo "<h2>No product found this category!</h2>";
				}
				 while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
				 {
					$pro_id=$row_cat_pro['product_id'];
					$pro_title=$row_cat_pro['product_title'];
			        $pro_cat=$row_cat_pro['cat_id'];
					$pro_brand=$row_cat_pro['brand_id'];
					$pro_desc=$row_cat_pro['product_desc'];
					$pro_price=$row_cat_pro['product_price'];
					$pro_image=$row_cat_pro['product_img1'];
					 
					echo "
					<div id='single_product'>
					<h3>$pro_title</h3>
					<img src='admin_area/product_image/$pro_image' height='180' width='180'><br>
					<p><b>Price: $pro_price</b></p>
					<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
					<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
					</div>
					";
						
				 }
				}
			    
}

/* if any product remove from go to cart then for updating the cart that functiion used*/
function update_cart()
{
	global $db;
	if(isset($_POST['update']))
	{
		foreach ($_POST['remove'] as $remove_id) 
		{
		   $delete_product="delete * from cart where p_id='$remove_id'";
		   $run_delete=mysqli_query($db,$delete_product);
		   if($run_delete)
		   {
		   	echo "<script>window.open('cart.php','self')</script>";
		   }
		}
	}
}

/*for countinue the shopping */

function cont()
{
if(isset($_POST['continue']))
    {
    echo "<script>window.open('index.php','_self')</script>";
    }	
}

function getdefault()
{
	global $db;
	$c=$_SESSION['customer_email'];
	$get_c="select * from customers where customer_email='$c'";
	$run_c=mysqli_query($db,$get_c);
	$row_c=mysqli_fetch_array($run_c);
	$customer_id=$row_c['customer_id'];
	if(!isset($_GET['my_orders']))
	{
	if(!isset($_GET['edit_account']))
	{
    if(!isset($_GET['change_pass']))
    {	
    if(!isset($_GET['delete_account']))
    {
    $get_orders="select * from customer_orders where customer_id='$customer_id' AND order_status='pending'"	;
    $run_order=mysqli_query($db,$get_orders);
    $count_orders=mysqli_num_rows($run_order);

    if($count_orders>0)
    {
     echo "
     <div style='padding:10px;'>
     <h1 style='color:red;'>Important!</h1>
     <h2> You have $count_orders pending orders</h2>
     <h3>plz see ur orders details by clicking this <a href='my_account.php?my_orders'>LINK</a><br> Or you can<a href='pay_offline.php'>Pay Offline</a></h3>

     </div>
     ";
    }
    else
    {
     echo "
     <div style='padding:10px;'>
     <h1 style='color:red;'>Important!</h1>
     <h2> You have NO pending orders</h2>
     <h3>plz see ur orders history by clicking this <a href='my_account.php?my_orders'>LINK</a></h3>

     </div>
     ";
    }
    }
    }
    }
    }
    }   

	

?>