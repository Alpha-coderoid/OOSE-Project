<?php
include "Functions.php";
$fileName="UsersFile.txt";
function DeleteUser($id)
{
	global $fileName;
	$r=getRowById($fileName,"~",$id);
	
	DeleteRecord($fileName,$r);
}
function UpdateUser($id,$Email,$Password,$FullName,$DOB)
{
	global $fileName;
	$record=$id."~".$Email."~".$Password."~".$FullName."~".$DOB."\r\n";
	$r=getRowById($fileName,"~",$id);
	
	UpdateRecord($fileName,$record,$r);
	
}
function getUserById($Id)
{
	global $fileName;
	$Record=getRowById($fileName,"~",$Id);
	$ArrayResult=explode("~",$Record);
	$Result['id']=$ArrayResult[0];
	$Result['Email']=$ArrayResult[1];
	$Result['Password']=$ArrayResult[2];
	$Result['FullName']=$ArrayResult[3];
	$Result['DOB']=$ArrayResult[4];
	return $Result;
}
function getAllUsers()
{
	global $fileName;
	$R=ListAll($fileName);
	return $R;
}

function getAllUsersByKeyWord($KeyWord)
{
	global $fileName;
	$R=SearhKeyword($fileName,$KeyWord);
	echo $R[0] ."Ayman";
	return $R;
}
function Login ($Email,$Password)
{
	global $fileName;
	if (searchUser($fileName,$Email."~".$Password))
	{
		//echo "true";
		return true;
	}
	else{
		//echo "false";
		return false;
	}

}
addUser("xx","123","MMp","5/17","2");
function addUser($Email,$Password,$FullName,$DOB,$type)
{
global $fileName;
$id=getLastId($fileName,"~")+1;
$record=$id."~".$Email."~".sha1($Password)."~".$FullName."~".$DOB."~".$type;
//echo $record;
if (searchUser($fileName,$Email)==FALSE)
{
StoreRecord( $fileName,$record);	
return true;
}
else
{
	return FALSE;
}


}

?>