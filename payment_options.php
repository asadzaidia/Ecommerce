
<?php
include("includes/conn.php");
function getIppp(){
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
$ip=getIppp();
$get_customer="select * from customer where cust_ip='$ip'";

$run_customer=mysqli_query($conn,$get_customer);

$customer=mysqli_fetch_array($run_customer);
$customer_id=$customer['cust_id'];
?>

<div>
		
<a href="#">Pay Online</a><br /> <br / >
<a href="order.php?customer_id=<?php echo $customer_id; ?>">Pay Offline</a>

</div>