<?php
include "user.php";

if (DeleteUser($_REQUEST["id"]))
{
	echo "User Removed Successfuly";
	
}
else
{
	echo "User doesn't exist!";
}
?>