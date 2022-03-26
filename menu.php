<?php
include "Functins.php";
$fileName = "menu.txt";


// CREATE
//addUser("addme");
function addUser( $function_name)
{
    global $fileName;
    $id = getLastId($fileName, "~") + 1;
    $record = $id . "~" .$function_name ;
	//echo $record;
    if (searchUser($fileName,$function_name ) == false) {
        StoreRecord($fileName, $record);
        return true;
    } else {
        return false;
    }

}


// Read
//getUserById(2);
function getUserById($Id)
{
    global $fileName;
    $Record = getRowById($fileName, "~", $Id);

    $ArrayResult = explode("~", $Record);
    $Result['id'] = $ArrayResult[0];
    echo  $ArrayResult[0];
    $Result['name'] = $ArrayResult[1];
    echo  $ArrayResult[1];
    return $Result;
}

//getAllUsers();
function getAllUsers()
{
    global $fileName;
    $R = ListAll($fileName);
    return $R;
}

//getAllUsersByKeyWord("");
function getAllUsersByKeyWord($KeyWord)
{
    global $fileName;
    $R = SearhKeyword($fileName, $KeyWord);
    echo $R;
    return $R;
}



// Update
//UpdateUser(1,"addyou");
function UpdateUser($id, $function_name)
{
    global $fileName;
    $record = $id . "~" . $function_name. "\r\n";
    $r = getRowById($fileName, "~", $id);
    //echo $record ."NEW <br>";
    //echo $r ."NEW <br>";
    UpdateRecord($fileName, $record, $r);

}


// Delete
//DeleteUser(1);
function DeleteUser($id)
{
    global $fileName;
    $r = getRowById($fileName, "~", $id);
    //echo $r;
    //exit();
    DeleteRecord($fileName, $r);
}