<?php
include "Functions.php";
$fileName = "UsersFile.txt";


// CREATE
function addusertype($usertypeid, $functionId)
{
    global $fileName;
    //$id = getLastId($fileName, "~") + 1;
    $record = $usertypeid . "~" . $functionId ;
	//echo $record;
    if (searchUser($fileName, $usertypeid) == false) {
        StoreRecord($fileName, $record);
        return true;
    } else {
        return false;
       
    }

}


// Read
function getUserById($usertypeId)
{
    global $fileName;
    $Record = getRowById($fileName, "~", $usertypeId);

    $ArrayResult = explode("~", $Record);
    
    return $ArrayResult;
    
}



// Update
function UpdateUsertype($usertypeid, $functionId)
{
    global $fileName;
    $record = $usertypeid . "~" . $functionId . "\r\n";
    $r = getRowById($fileName, "~", $usertypeid);
    //echo $record ."NEW <br>";
    //echo $r ."NEW <br>";
    UpdateRecord($fileName, $record, $r);

}
function addfunctiontouser($usertypeid, $functionId)
{
    global $fileName;
 
    $r = getRowById($fileName, "~", $usertypeid);
    $record=$r . $functionId ."\r\n";
    //echo $record ."NEW <br>";
    //echo $r ."NEW <br>";
    UpdateRecord($fileName, $record, $r);

}

// Delete
function DeleteUser($usertypeid)
{
    global $fileName;
    $r = getRowById($fileName, "~", $usertypeid);
    //echo $r;
    //exit();
    DeleteRecord($fileName, $r);
}




