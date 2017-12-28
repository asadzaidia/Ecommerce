


<div class="container">
	<h1 class="page-header">Categories:</h1>
	<br />

	<div class="col-md-9">
		
		 <div class="table-responsive">          
  <table class="table table-hover">
    <thead>
      <tr class="warning">
        <th id="a">Category ID</th>
        <th id="a">Category Title</th>
        <th id="a">Edit</th>
        <th id="a">Delete</th>
      </tr>
    </thead>
<?php
	include("includes/conn.php");
	$get_cat="Select * from categories";
	$run_cat=mysqli_query($conn,$get_cat);
	while($row=mysqli_fetch_array($run_cat)){
		$c_id=$row['c_id'];
		$c_title=$row['c_title'];
		
    echo "<tbody>
     <tr>
        <td>  $c_id</td>
        <td>$c_title</td>
       
        <td><a href='index.php?edit_cat= $c_id' class='btn btn-info'>Edit</a></td>
        <td><a href='index.php?del_cat= $c_id' class='btn btn-danger'>Delete</a></td>
      </tr>
    </tbody>";

    }
    ?>
  </table>
  </div>

	</div>
</div>