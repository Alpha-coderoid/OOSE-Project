<?php
include "Functions.php";
$fileName = "UsersFile.txt";


//addUser("hassan","fff","123","x");

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
       // echo "true";
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
//UpdateUser("1","hassan","fff","123","y");

// Update
function UpdateUser($id, $name,$email,$password,$DOB,$type)
{
    global $fileName;
    $record = $id . "~" .$email ."~" .$password."~" . $name."~" . $DOB."~" . $type. "\r\n";
    $r = getRowById($fileName, "~", $id);
    UpdateRecord($fileName, $record, $r);

}


// Delete
//DeleteUser("5");
function DeleteUser($id)
{
    global $fileName;
    $r = getRowById($fileName, "~", $id);
    //echo $r;
    //exit();
    DeleteRecord($fileName, $r);
    return true;
}




