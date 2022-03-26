<?php
include "Functions.php";
$fileName = "donations_product.txt";


// CREATE

addUser("item");
function addUser( $product_name)
{
    global $fileName;
    $id = getLastId($fileName, "~") + 1;
    $record = $id . "~" .$product_name ;
	//echo $record;
    if (searchUser($fileName,$product_name ) == false) {
        StoreRecord($fileName, $record);
        return true;
    } else {
        return false;
    }

}




// Read
get_donation_Id(1);
function get_donation_Id($donation_product_id)
{
    //can be used to get a specific donation
    global $fileName;
    //will return line and store it in record
    $Record = getRowById($fileName, "~", $donation_product_id);
  
    $ArrayResult = explode("~", $Record);
    $Result['doantion_product_id'] = $ArrayResult[0];
    $Result['donation_product'] = $ArrayResult[1];
    echo $ArrayResult[0];
     echo $ArrayResult[1];
    return $Result;
  
}


function getAlldonations()
{
    //this function can be used to list all donation types
    global $fileName;
    $R = ListAll($fileName);
    return $R;
    //echo $R;
}

//getAllUsersByKeyWord("it");

function getAllUsersByKeyWord($KeyWord)
{
    //can be used to search for an id of a certain donation_product;
    global $fileName;
    $R = SearhKeyword($fileName, $KeyWord);
   
    //echo $R[0] ."Ayman";
    return $R;
   
}



// Update
//Updateorder(2,"things");

function Updateorder($donation_product_id ,$donation_product)
{
    global $fileName;
    $record =$donation_product_id. "~" .  $donation_product ;
    $r = getRowById($fileName, "~", $donation_product_id);
    UpdateRecord($fileName, $record, $r);

}


// Delete

function DeleteUser($donation_product_id)
{
    global $fileName;
    $r = getRowById($fileName, "~", $donation_product_id);
    //echo $r;
    //exit();
    DeleteRecord($fileName, $r);
}







