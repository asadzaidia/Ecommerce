

<div class="container" >
	<h1 class="page-header">Products:</h1>
	<div class="col-md-9">
		  <div class="table-responsive">          
  <table class="table table-hover">
    <thead>
      <tr class="warning">
        <th id="a">Product ID</th>
        <th id="a">Title</th>
        <th id="a">Image</th>
        <th id="a">Price</th>
    
        <th id="a">Edit</th>
        <th id="a">Delete</th>
      </tr>
    </thead>
<?php
	include("includes/conn.php");
	$get_pro="Select * from products";
	$run_pro=mysqli_query($conn,$get_pro);
	while($row=mysqli_fetch_array($run_pro)){
		$p_id=$row['p_id'];
		$p_title=$row['p_title'];
		$p_img1=$row['p_img1'];
		$p_price=$row['p_price'];


    echo "<tbody>
     <tr>
        <td>  $p_id</td>
        <td>$p_title</td>
        <td><img src='product_images/$p_img1'  width='60' height='60'></td>
        <td> Rs: $p_price </td>
       
        <td><a href='index.php?edit_pro= $p_id' class='btn btn-info'>Edit</a></td>
        <td><a href='index.php?del_pro= $p_id' class='btn btn-danger'>Delete</a></td>
      </tr>
    </tbody>";

    }
    ?>
  </table>
  </div>

	</div>
</div>

