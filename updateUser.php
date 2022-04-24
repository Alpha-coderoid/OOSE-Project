<?php
include "Userfnc.php";
$id=$_REQUEST["id"];
$Result=getUserById($id);
$Email= $Result['Email'];
$pass=Decrypt($Result['Password'],2);
?>
<form action="UpdateUser2.php" method="post">
	<table>
	
	<tr><td>Email</td><td><input disabled type="text" name="Dummy" value="<?php echo $Email ?>" /></td></tr>
	<tr><td>pass</td><td><input type="password" name="Password" value="<?php echo $pass ?>" /></td></tr>
	
	<tr><td>FullName</td><td><input type="text" name="FullName" value="<?php echo $Result['FullName']?>" /></td></tr>
	<tr><td>DOB</td><td><input type="text" name="DOB" value="<?php echo $Result['DOB']?>" /></td></tr>
	<tr>
		<td><input type="submit" /></td><td><input type="reset" /></td>
		
			</tr>
	<input type="hidden" name="id" value="<?php echo $Result['id'] ?>">
	<input type="hidden" name="Email" value="<?php echo $Email ?>" />
	</table>
	
</form>