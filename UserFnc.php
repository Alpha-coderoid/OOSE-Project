<?php
include "Functions.php";
$fileName = "user.txt";


// CREATE
function addUser($name,$email,$password,$type)
{
    global $fileName;
    $id = getLastId($fileName, "~") + 1;
    $record = $id . "~" . $name ."~" .$email."~" . $password."~" . $type;
	//echo $record;
    if (searchUser($fileName, $id) == false) {
        StoreRecord($fileName, $record);
        return true;
    } else {
        return false;
        echo "true";
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
function UpdateUser($id, $name,$email,$password,$type)
{
    global $fileName;
    $record = $id . "~" .$name ."~" .$email."~" . $password."~" . $type. "\r\n";
    $r = getRowById($fileName, "~", $id);
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




