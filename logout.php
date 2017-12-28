<?php
session_start();
include("includes/conn.php");
  include("functions/functions.php");
  $ip=getIp();
	$empty_cart="delete from cart where ip_add='$ip'";
	$run_empty=mysqli_query($conn,$empty_cart);
session_destroy();
echo "<script>window.open('index.php','_self')</script>";



?>