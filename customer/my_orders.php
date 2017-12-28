<?php
@session_start();
  include("includes/conn.php");
  

   //getting customer id
   $c=$_SESSION['cust_email'];
  $get_c="select * from customer where cust_email LIKE '%$c%'";

  $run_c=mysqli_query($db,$get_c);
  $row_c=mysqli_fetch_array($run_c);
  $customer_id=$row_c['cust_id'];

?>


<div class="panel panel-default">
  
  <div class="panel-heading">My Orders:</div>

  <!-- Table -->
  <table class="table table-condensed">
   <tr>
   		<th>Order Num</th>
   		<th>Due Amount</th>
   		<th>Invoice Num</th>
   		<th>Total Products</th>
   		<th>Order Date</th>
   		<th>Paid/Unpaid</th>
   		<th>Status</th>
   </tr>
   <?php

   		$get_orders="select * from orders where o_customer_id='$customer_id'";
   		$run_orders=mysqli_query($conn,$get_orders);
   		$i=0;
   		while($row_orders=mysqli_fetch_array($run_orders)){
   			$order_id=$row_orders['ord_id'];
   			$due_amount=$row_orders['due_amount'];
   			$invoice_no=$row_orders['invoice_no'];
   			$total_products=$row_orders['total_products'];
   			$order_date=$row_orders['order_date'];
   			$order_status=$row_orders['order_status'];
   			if($order_status=='pending'){
   				$order_status='Unpaid';
   			}
   			else{
   				$order_status='Paid';
   			}
   			$i++;

   			echo " 
   			<tr>
   			<td>$i</td>
   			<td>$due_amount</td>
   			<td>$invoice_no</td>
   			<td>$total_products</td>
   			<td>$order_date</td>
   			<td>$order_status</td>
   			<td><a href='confirm.php?order_id=$order_id' target='_blank'>Confirm if Paid</a></td>
   			</tr>

   			";


   		}

   ?>
  </table>
</div>