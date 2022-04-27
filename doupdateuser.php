<?php
include "user.php";

UpdateUser($_REQUEST["id"],$_REQUEST["fullname"],$_REQUEST["email"],sha1( $_REQUEST["password"]),$_REQUEST["DOB"],$_REQUEST["type"]);

 echo "User Data Updated Successfully";

?>