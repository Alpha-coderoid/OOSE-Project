<?php
include "Functions.php";
$fileName = "donations_order.txt";





function createorder( $order_id ,$product_id,  $order_day, $order_month, $order_year , $donor_id)
{
    global $fileName;
    $record = $order_id. "~" .  $product_id. "~" .date("$order_day/$order_month /$order_year")."~".  $donor_id ;
   
 
     StoreRecord($fileName, $record);
 return true;
}
//createorder(1,2,5,8,2002,4);
//createorder(2,7,9,3,2002,4);
// Read
//getorderbyID("1");

function getorderbyID($donation_order_id)
{
    global $fileName;
    $Record = getRowById($fileName, "~", $donation_order_id);

       $ArrayResult = explode("~", $Record);
    echo  $Result['order_id'] = $ArrayResult[0]."~";
    echo  $Result['product_id'] = $ArrayResult[1]."~ ";
    echo  $Result['date'] = $ArrayResult[2]." ~";
    echo $Result['donor_id'] = $ArrayResult[3];
   
    
    return $Result;
    
}


function getAllorders()
{
    //can be used to list all orders
    global $fileName;
    $R = ListAll($fileName);
    return $R;
}

function getAllUsersByKeyWord($KeyWord)
{
    //Can be used to list all orders made by a certain donor
    //keyword here would be the donor's id;
    global $fileName;
    $R = SearhKeyword($fileName, $KeyWord);
    //echo $R[0] ."Ayman";
    return $R;
}



// Update
//Updateorder(2,2,date("2/5/2022"),3);
function Updateorder($order_id ,$product_id, $order_date, $donor_id)
{
    global $fileName;
    $record =$order_id. "~" .  $product_id. "~" .$order_date . "~" .  $donor_id ;
    $r = getRowById($fileName, "~", $order_id);
    //echo $record ."NEW <br>";
    //echo $r ."NEW <br>";
    UpdateRecord($fileName, $record, $r);
    return true;
}


// Delete

function DeleteUser($order_id)
{
    global $fileName;
    $r = getRowById($fileName, "~", $order_id);
    //echo $r;
    //exit();
    DeleteRecord($fileName, $r);
}



