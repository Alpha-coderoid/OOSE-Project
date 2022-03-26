<?php
include "Functins.php";
$fileName = "orderdetails.txt";
$delivered="not";
/*addUser(55,234,1,45,500,$delivered,15,3,2202,18,15);
// CREATE
function addUser($orderID, $custid, $paymentMethod, $typeOfdonation,$amountOfdonation,$delivered,$dateOfDeliveredDAY,$dateOfDeliveredMON,$dateOfDeliveredYEAR,$Time,$howManyDays)
{
    global $fileName;
    $id = getLastId($fileName, ",") + 1;
    $record = $orderID . "," . $custid . "," . $paymentMethod . "," . $typeOfdonation . "," . $amountOfdonation. ",".$delivered.",". $dateOfDeliveredDAY.",".$dateOfDeliveredMON.",".$dateOfDeliveredYEAR.",".$Time.",".$howManyDays;
	echo $record;
    if (searchUser($fileName, $orderID) == false) {
        StoreRecord($fileName, $record);
        return true;
   } else {
        return false;
    }

}*/


// Read
//$orderID=5847;
//getUserById(5847);
function getUserById($orderID)
{
    global $fileName;
    $Record = getRowById($fileName, ",", $orderID);
    $ArrayResult = explode(",", $Record);
    $Result['orderID'] = $ArrayResult[0];
    //echo $ArrayResult[0];    ;
    $Result['custid'] = $ArrayResult[1];
    //echo  $ArrayResult[1];
    $Result['paymentMethod'] = $ArrayResult[2];
    //echo  $ArrayResult[2];
    $Result['typeOfdonation'] = $ArrayResult[3];
    //echo  $ArrayResult[3];
    $Result['amountOfdonation'] = $ArrayResult[4];
   // echo $ArrayResult[4];
    $Result['delivered'] = $ArrayResult[5];
    //echo $ArrayResult[5];
    $Result['$dateOfDeliveredDAY'] = $ArrayResult[6];
    //echo $ArrayResult[6];
    $Result['$dateOfDeliveredMON'] = $ArrayResult[7];
    echo $ArrayResult[7];
    $Result['$dateOfDeliveredYEAR'] = $ArrayResult[8];
    echo $ArrayResult[8];
    $Result['Time'] = $ArrayResult[9];
    echo $ArrayResult[9];
    $Result['howManyDays'] = $ArrayResult[10];
    echo $ArrayResult[10];
    return $Result;

    
}

//getAllUsers();
function getAllUsers()
{
    global $fileName;
   
    $R = ListAll($fileName);
   
    
    return $R;

}

getAllUsersByKeyWord("not");

function getAllUsersByKeyWord($KeyWord)
{
    global $fileName;
    $R = SearhKeyword($fileName, $KeyWord);
    echo $R;
  
   return $R;
}



// Update
$delivered="delivered";
//UpdateUser(55, 234, 1, 45, 500,$delivered, 15, 3, 2202, 18,15);
function UpdateUser($orderID, $custid, $paymentMethod, $typeOfdonation,$amountOfdonation,$delivered,$dateOfDeliveredDAY,$dateOfDeliveredMON,$dateOfDeliveredYEAR,$Time,$howManyDays)
{
    global $fileName;
    $record =$orderID . "," . $custid . "," . $paymentMethod . "," . $typeOfdonation . "," . $amountOfdonation. ",".$delivered.",". $dateOfDeliveredDAY.",".$dateOfDeliveredMON.",".$dateOfDeliveredYEAR.",".$Time.",".$howManyDays. "\r\n";
    $r = getRowById($fileName, ",", $orderID);
    //echo $record ."NEW <br>";
    //echo $r ."NEW <br>";
    UpdateRecord($fileName, $record, $r);

}


// Delete
//DeleteUser(55);
/*function DeleteUser($orderID)
{
    global $fileName;
    $r = getRowById($fileName, "~", $orderID);
    echo $r;
    //exit();
    DeleteRecord($fileName, $r);
}*/




