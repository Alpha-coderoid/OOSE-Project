<?php
include "UserFnc.php";
$pass=sha1($_REQUEST["Password"]);

if (addUser($_POST["Email"],$pass,$_REQUEST["fullname"],$_REQUEST["DoB"],$_REQUEST["Type"]))
{
	echo "Success";
	header("Location: Login.php?Msg=Record Added Sucessfully");
}
else
{
	echo "Duplicate email";
}
?>