<?php
include "Functins.php";
$fileName = "user.txt";


// CREATE
function addUser($Email, $Password, $FullName, $DOB)
{
    global $fileName;
    $id = getLastId($fileName, "~") + 1;
    $record = $id . "~" . $Email . "~" . $Password . "~" . $FullName . "~" . $DOB;
	//echo $record;
    if (searchUser($fileName, $Email) == false) {
        StoreRecord($fileName, $record);
        return true;
    } else {
        return false;
    }

}


// Read
getUserById(1);
function getUserById($Id)
{
    global $fileName;
    $Record = getRowById($fileName, "~", $Id);

    $ArrayResult = explode("~", $Record);
    $Result['id'] = $ArrayResult[0];
    $Result['name'] = $ArrayResult[1];
    $Result['email'] = $ArrayResult[2];
    $Result['password'] = $ArrayResult[3];
    $Result['type'] = $ArrayResult[4];
    //echo $Result['id'];
    //echo $Result['name'];
    return $Result;
}


getAllUsers();
function getAllUsers()
{
    global $fileName;
    $R = ListAll($fileName);
    echo $R[0];
    return $R;
}




// Update
function UpdateUser($id, $Email, $Password, $FullName, $DOB)
{
    global $fileName;
    $record = $id . "~" . $Email . "~" . $Password . "~" . $FullName . "~" . $DOB . "\r\n";
    $r = getRowById($fileName, "~", $id);
    //echo $record ."NEW <br>";
    //echo $r ."NEW <br>";
    UpdateRecord($fileName, $record, $r);

}


// Delete
Deleteuser(1);
function DeleteUser($id)
{
    global $fileName;
    $r = getRowById($fileName, "~", $id);
    //echo $r;
    //exit();
    DeleteRecord($fileName, $r);
}




