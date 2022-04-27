<?php
include "donation_order.php";


if (Updateorder($_REQUEST["oid"],$_REQUEST["pid"],$_REQUEST["date"],$_REQUEST["donorid"]))
{
	echo "Order Data Modified Successfuly";
	
}
else
{
	echo "failed to Modify order";
}
?>