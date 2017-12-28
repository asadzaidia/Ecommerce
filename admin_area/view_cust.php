

<div class="container" >
	<h1 class="page-header">Customers:</h1>
	<div class="col-md-9">
		  <div class="table-responsive">          
  <table class="table table-hover">
    <thead>
      <tr class="warning">
        <th id="a">Customer ID</th>
        <th id="a">Name</th>
        <th id="a">Email</th>
        <th id="a">Country</th>
    
        <th id="a">Contact</th>
        <th id="a">Image</th>
        <th id="a">Delete</th>
      </tr>
    </thead>
<?php
	include("includes/conn.php");
	$get_pro="Select * from customer";
	$run_pro=mysqli_query($conn,$get_pro);
	while($row=mysqli_fetch_array($run_pro)){
		$cust_id=$row['cust_id'];
		$cust_name=$row['cust_name'];
		$cust_email=$row['cust_email'];
		$cust_country=$row['cust_country'];
		$cust_contact=$row['cust_contact'];
		$img=$row['cust_img'];


    echo "<tbody>
     <tr>
        <td> $cust_id</td>
        <td>$cust_name</td>
        <td>$cust_email</td>
        <td>$cust_country</td>
        <td>$cust_contact</td>
        <td><img src='../customer/customer_image/$img'  width='60' height='60'></td>
       <td><a href='index.php?del_customer=$cust_id' class='btn btn-danger'>Delete</a></td>
      </tr>
    </tbody>";

    }
    ?>
  </table>
  </div>

	</div>
</div>

