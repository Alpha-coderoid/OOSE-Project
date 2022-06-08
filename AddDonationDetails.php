<html>
    <a href="DonationDetailsListAll.php"><h1 style="color:black ;text-decoration:none;  ">Go to All Donations</h1></a>
</html>
<?php
include "Functions.php";
$obj=new donationDetails();
//$obj->donationId=$_REQUEST["DonationID"];

$flag1=0;
$flag2=0;
$flag3=0;
$flag4=0;
$flag5=0;
$flag6=0;
$flag7=0;
$flag8=0;
$flag9=0;
$flag10=0;
$flag11=0;

/*
if( $_REQUEST["DonorId"]<0)
{
    $flag2=1;
    header("location:FormUpdateDonationDetails.php");


}

if(is_numeric($_REQUEST["PaymentMethod"]))
{
  header("location:FormUpdateDonationDetails.php");
  $flag3=1;

}

if( $_REQUEST["PaymentMethod"]<0)
{
    $flag4=1;
    header("location:FormUpdateDonationDetails.php");


}

if(is_numeric($_REQUEST["typeofdonation"]))
{
  header("location:FormUpdateDonationDetails.php");
  $flag5=1;

}

if( $_REQUEST["typeofdonation"]<0)
{
    $flag6=1;
    header("location:FormUpdateDonationDetails.php");


}

if(is_numeric($_REQUEST["typeofdonation"]))
{
  header("location:FormUpdateDonationDetails.php");
  $flag7=1;

}

if( $_REQUEST["typeofdonation"]<0)
{
    $flag8=1;
    header("location:FormUpdateDonationDetails.php");


}
if(is_numeric($_REQUEST["amountofdonation"]))
{
  header("location:FormUpdateDonationDetails.php");
  $flag9=1;

}

if( $_REQUEST["amountofdonation"]<0)
{
    $flag10=1;
    header("location:FormUpdateDonationDetails.php");
}

*/
if( $flag1==0 && $flag2==0 && $flag3==0 && $flag4==0 && $flag5==0 && $flag6==0 && $flag7==0 && $flag8==0 && $flag9==0 && $flag10==0 && $flag11==0)
{
  $obj->userId=$_REQUEST["DonorID"];
  $obj->paymentMethod=$_REQUEST["PaymentMethod"];
  $obj->typeOfdonation=$_REQUEST["typeofdonation"];
  $obj->amountOfdonation=$_REQUEST["amountofdonation"];
  $obj->delivered="in progress";
  $obj->dateOfDeliveredDAY="not delivered yet";
 // $obj->delivered=$_REQUEST["statusofdonation"];
 // $obj->dateOfDeliveredDAY=$_REQUEST["dateofdelivereddonation"];
  $obj->Time=$_REQUEST["time"];
  $obj->StoreDonationDetails($obj->fileManagerObj);
include "StrategyPayment.php";
if($_REQUEST["PaymentMethod"]==1){
  
  $obj->Strategy=new paybyvisa();
  $obj->executeStrategy($obj->userId,$obj->amountOfdonation);
}
if($_REQUEST["PaymentMethod"]==2){
  $obj->Strategy=new paybycash();
  $obj->executeStrategy($obj->userId,$obj->amountOfdonation);
}
}

/*include("ObserverPController.php");
  $browserRef =new browser($obj);
  $browserRef->alert();*/
include "observerConfirmation.php";
$browserRef =new browser($obj);
$mailRef =new email($obj);
$obj->attach($browserRef);
$obj->attach($mailRef);
$obj->notifyAllObservers();


 
  




//header("location:DonationDetailsListAll.php");

?>