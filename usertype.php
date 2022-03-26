<?php
include "Functins.php";
$fileName = "usertype.txt";


// CREATE
function addUsertype($usertype)
{
    global $fileName;
    $id = getLastId($fileName, "~") + 1;
    $record = $id . "~" . $usertype;
	//echo $record;
    if (searchUser($fileName, $usertype) == false) {
        StoreRecord($fileName, $record);
        return true;
    } else {
        return false;
        echo "trur";
    }

}
//$Email="sb";$Password=23;$FullName="hfytham";$DOB=124122002;
//addUser(   $Email,$Password,$FullName,$DOB);
//echo "hello there!";
// Read

function getUserById($Id)
{
    global $fileName;
    $Record = getRowById($fileName, "~", $Id);

    $ArrayResult = explode("~", $Record);
    $Result['id'] = $ArrayResult[0];
    $Result['usertype'] = $ArrayResult[1];
    
    return $Result;
}

// Update
function UpdateUser($id, $usertype)
{
    global $fileName;
    $record = $id . "~" . $usertype  . "\r\n";
    $r = getRowById($fileName, "~", $id);
  
    UpdateRecord($fileName, $record, $r);

}


// Delete
function DeleteUser($id)
{
    global $fileName;
    $r = getRowById($fileName, "~", $id);
    //echo $r;
    //exit();
    DeleteRecord($fileName, $r);
}




