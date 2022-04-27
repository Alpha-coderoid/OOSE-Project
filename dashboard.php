<?php
include "UserFnc.php";
//include "Login.php";

$fileName="UsersFile.txt";
$fileName2="user type menu.txt";
$fileName3="menu.txt";
$pass=sha1($_REQUEST["Password"]);

//echo "hi";
if (Login($_POST["Email"],$pass ))
{
	//echo "Success";
	session_start();
	
	$_SESSION["Email"]=$_POST["Email"];
  $_SESSION["Password"]=$pass;
	//echo 	$_SESSION["Email"];
	

    if(Login($_POST["Email"],$pass)==true)
    {
     // session_start();
      $Password=sha1( $_REQUEST["Password"]);
      $line= searchUser($fileName,$_POST["Email"]."~".$Password);
      $ArrayResult=explode("~",$line);
	    $Result['id']=$ArrayResult[0]; //2
       // echo $ArrayResult[5];
        $id=intval( $ArrayResult[5]);
      $Separator="~";
     $w=  getRowById($fileName2,$Separator,$id);
     //echo $w; //line
     $i=1;
      $i2=2;
     
      $Array=explode("~",$w);
     $trv=0;
     while($trv!=count($Array)-2) //cond
     {
      $link_address="Login.php";
        // echo "i is "."$i "."$trv   ";
         $trv++;
            $ArrayResult=explode("~",$w);
          if(intval( $ArrayResult[$i]=="19")){
           $link_address="make donation.php";
          }
          if(intval( $Array[$i])== "21"){
      
            $link_address="updateuser.php";
           }
          if(intval( $ArrayResult[$i]=="20")){
          $link_address="removeuser.php";
           }
           if(intval( $ArrayResult[$i]=="22")){
            $link_address="updateorder.php";
             }
         // echo $ArrayResult[$i];
         // echo $ArrayResult[$i];
         $v=$ArrayResult[$i];
             //echo $i;
         //echo $v;
           $w2=  getRowById($fileName3,$Separator,$v);
           //echo $w2;
           $ArrayResult=explode("~",$w2);
           // $v2=$ArrayResult[1];
          // echo $ArrayResult;
          echo "<a href='".$link_address."'>$ArrayResult[1]</a>";
       //  echo  $ArrayResult[1];
            $i2+=2;
          $i++;
          echo "<br>";
     }
    // echo $i-1;
    //echo $Array[$i];
   // echo intval( $Array[$i]);
    if(intval( $Array[$i])== "19"){
    
      $link_address="make donation.php";
     }
     if(intval( $Array[$i])== "20"){
      
        $link_address="removeuser.php";
       }
       if(intval( $Array[$i])== "21"){
      
        $link_address="updateuser.php";
       }
    $tt=intval( $Array[$i]);
    //echo $tt;
   // $to=substr($$tt,0,-1);
   // $tt--;
     //echo $tt[2];  
    // echo strlen($Array[$i]);
    // echo strlen($tt);
     $w2=  getRowById($fileName3,$Separator,$tt);
    // echo $w2;
     $ArrayResult=explode("~",$w2);
     echo "<a href='".$link_address."'>$ArrayResult[1]</a>";
     // echo  $ArrayResult[1];
     
     /*       //echo $i2;
                $ArrayResult=explode("~",$w);
        $e=$w[$i2];
      //echo $e;
      $v=$ArrayResult[1];
      //echo $v;
     $Separator="~";
     $w2=  getRowById($fileName3,$Separator,$e);
     //echo $w2;
     $ArrayResult=explode("~",$w2);
            $v2=$ArrayResult[1];*/
    }// echo $v2;
}
else
{
	echo "False Login";
}
   // $g= getAllUsersByKeyWord($KeyWord);
   // echo $g;
    //$y=getRowById($fileName2,$Separator,$id);
    //echo $y;
    /*$y=searchUser($fileName2,$id);
    $ArrayResult2=explode("~",$y);
    $Result['fun']=$ArrayResult2[1];
    echo $ArrayResult2[1];*/
   // $j=SearhKeyword($fileName2,$id);
   // echo $j;
   // $ArrayResult2=explode("~",$j);
  //  echo $ArrayResult2[1];



?>