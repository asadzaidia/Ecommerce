


<div class="container">
	<h1 class="page-header">Brands:</h1>
	<br />

	<div class="col-md-9">
		
		 <div class="table-responsive">          
  <table class="table table-hover">
    <thead>
      <tr class="warning">
        <th id="a">Brand ID</th>
        <th id="a">Brand Title</th>
        <th id="a">Edit</th>
        <th id="a">Delete</th>
      </tr>
    </thead>
<?php
	include("includes/conn.php");
	$get_b="Select * from brands";
	$run_b=mysqli_query($conn,$get_b);
	while($row=mysqli_fetch_array($run_b)){
		$b_id=$row['b_id'];
		$b_title=$row['b_title'];
		
    echo "<tbody>
     <tr>
        <td>  $b_id</td>
        <td>$b_title</td>
       
        <td><a href='index.php?edit_brand= $b_id' class='btn btn-info'>Edit</a></td>
        <td><a href='index.php?del_brand= $b_id' class='btn btn-danger'>Delete</a></td>
      </tr>
    </tbody>";

    }
    ?>
  </table>
  </div>

	</div>
</div>