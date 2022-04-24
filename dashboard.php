<?php
include "UserFnc.php";
include "Login.php";

$fileName="UsersFile.txt";
$fileName2="user type menu.txt";
$fileName3="menu.txt";

//ListAll($fileName);
//$g=Login("ayman4@gmail.com",123);
//echo $g;
/*for($i=1;$i<6;$i++)
   { $Id=$i;
    $Record=getRowById($fileName,"~",$Id);
    $ArrayResult=explode("~",$Record);
	$Result['id']=$ArrayResult[0];
    echo $ArrayResult[0];
	$Result['Email']=$ArrayResult[1];
    echo $ArrayResult[1];
	$Result['Password']=$ArrayResult[2];
    echo $ArrayResult[2];
	$Result['FullName']=$ArrayResult[3];
    echo $ArrayResult[3];
	$Result['DOB']=$ArrayResult[4];
    echo $ArrayResult[4];
   }*/
   

echo "hi";
if(Login("mohamed@yahoo.com",357)==true)
{
    $Password=357;
   $line= searchUser($fileName,"mohamed@yahoo.com"."~".$Password);
   $ArrayResult=explode("~",$line);
	$Result['id']=$ArrayResult[0]; //2
    //echo $ArrayResult[0];
    $id=$ArrayResult[0];
    $Separator="~";
  $w=  getRowById($fileName2,$Separator,$id);
  //echo $w; //line
  $i=1;
  $i2=2;

  //echo $w[$i2];
  while($w[$i2+1]=="~") //cond
  {
  $ArrayResult=explode("~",$w);
  $e=$w[$i2];
  //echo $e;
  $v=$ArrayResult[$i];
  //echo $i;
  //echo $v;
  $w2=  getRowById($fileName3,$Separator,$v);
  //echo $w2;
  $ArrayResult=explode("~",$w2);
 // $v2=$ArrayResult[1];
   echo $ArrayResult[1];
    $i2+=2;
    $i++;

  }
  //echo $i2;
 $ArrayResult=explode("~",$w);
 $e=$w[$i2];
   //echo $e;
  $v=$ArrayResult[1];
  //echo $v;
  $Separator="~";
  $w2=  getRowById($fileName3,$Separator,$e);
  //echo $w2;
 $ArrayResult=explode("~",$w2);
 $v2=$ArrayResult[1];
    echo $v2;
   
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

}

?>