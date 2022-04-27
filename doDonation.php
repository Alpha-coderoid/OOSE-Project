<?php
include "donation_order.php";
$order_id=$_REQUEST["x"];

if (createorder($order_id,$_REQUEST["y"],$_REQUEST["Day"],$_REQUEST["Month"],$_REQUEST["Year"],$_REQUEST["DonorID"]))
{
	echo "Order Added Successfuly";
	
}
else
{
	echo "failed to add order";
}
?>