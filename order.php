<?php

@session_start();
  include("includes/conn.php");
  include("functions/functions.php");

  //Getting customer Id

  if(isset($_GET['customer_id'])){

  	$customer_id=$_GET['customer_id'];
    $c_all="select * from customer where cust_id='$customer_id'";
    $run_all=mysqli_query($conn,$c_all);
    $row_all=mysqli_fetch_array($run_all);
    $c_namee=$row_all['cust_name'];
    $c_emaill=$row_all['cust_email'];
  }
  $quantity=0;
  $ip=getIp();

  //Getting Products price $ number of items
  $price=1000; //filhal fix hai ye us k bad dekhen gn
  $status='pending';
  $invoice_no=mt_rand();//random number generator
  // $qty=10;
  //quantity
  $quan_query="select * from cart where ip_add='$ip'";
  $quan_run=mysqli_query($conn,$quan_query);
   while($row_products=mysqli_fetch_array($quan_run)){
	$quan=$row_products['qty'];
	$quantity+=$quan;
   }
     // echo $quantity;

   if($quantity==0){
   	echo "<p style='color:red;font-weight:bold;font-size:30px;float:center;'>Please Select Items</p>
   	<br />
   	 <a href='index.php'><button   class='btn btn-info'  style='font-weight: bold;'' /><i class='fa fa-shopping-bag' aria-hidden='true'></i>Continue Shopping</button></a>";

	}

	else{


		$query_order="insert into orders(o_customer_id,due_amount,invoice_no,total_products,order_date,order_status) values('$customer_id','$price','$invoice_no','$quantity',NOW(),'$status')";
		$run_order=mysqli_query($conn,$query_order);

			echo "Ordered Successfully";

			echo "<script>window.open('customer/my_account.php','_self');</script>";
			
			$empty_cart="delete from cart where ip_add='$ip'";
			$run_empty=mysqli_query($conn,$empty_cart);

			$insert_pending="insert into pending_order(customer_po_id,invoice_po_id,qty,order_status) values('$customer_id','$invoice_no','$quantity','$status')";
			$run_insert=mysqli_query($conn,$insert_pending);
      $from="asadzaidi625@gmail.com";
      $to=$c_emaill;
    $subject="Order Details from MyShop";
    $message="
    <html>
    <h3>Dear $c_namee</h3>
    <p>You order from Myshop.com are:</p>
    <table>

    <tr>
    <th>Invoice Number</th>
    <th>Due_amount</th>
    <th>Total Products</th>
    <th>order_date</th>
    </tr>
    <tr>
    <td>$invoice_no</td>
    <td>$price</td>
    <td>$quantity</td>
    <td>NOW()</td>

    </tr>

    </table>

    </html>
    ";
    email($to,$subject,$message,$from);
		
		
	}
 



?>