

<div class="container" >
	<h1 class="page-header">Orders:</h1>
	<div class="col-md-9">
		  <div class="table-responsive">          
  <table class="table table-hover">
    <thead>
      <tr class="warning">
        <th id="a">Order No</th>
        <th id="a">Customer</th>
        <th id="a">Invoice No</th>
        <th id="a">Quantity</th>
    
        <th id="a">Order Status</th>
        <th id="a">Delete</th>
      </tr>
    </thead>
<?php
	include("includes/conn.php");
	$get_po="Select * from orders";
	$run_po=mysqli_query($conn,$get_po);
	while($row=mysqli_fetch_array($run_po)){
		$ord_id=$row['ord_id'];
		$o_customer_id=$row['o_customer_id'];
		$invoice_no=$row['invoice_no'];
		$qty=$row['total_products'];
		$order_status=$row['order_status'];
		


    echo "<tbody>
     <tr>
        <td>$ord_id</td>
        <td>$o_customer_id</td>
        <td>$invoice_no</td>
        <td>$qty</td>
        <td>$order_status</td>
       <td><a href='index.php?del_order=$ord_id' class='btn btn-danger'>Delete</a></td>
      </tr>
    </tbody>";

    }
    ?>
  </table>
  </div>

	</div>
</div>

