<?php

abstract class observer {
    public $subject;

	 function alert(){
       echo"did something! ";
       //implementation here not important!!
     }

}
class email extends observer{
    function __construct($subject)
    {
        $this->subject=$subject;
        $this->subject->attach($this);
    }
    function alert(){
     
   $tmp="";
        $myfile=fopen("UserDetails.txt","r+") or die("Can't open");
         while(!feof($myfile))
        {
             $line=fgets($myfile);
             $arrayline = explode("~",$line);
             if($arrayline[0]==$_REQUEST["DonorID"])
             {
                $tmp= $line ;
             }
        
        
     }
    $arrayline = explode("~",$tmp);
    // echo $arrayline[3];
    $myfile = fopen("mail to ".$arrayline[3].".txt", "w") or die("Unable to open file!");
    $txt = "Dear ".$arrayline[1]."\n"."\n"."Your donation was made successfuly"."\n"."Time: ".$_REQUEST["time"];
    fwrite($myfile, $txt);
    fclose($myfile);
  }
  }
  class browser extends observer{
    function __construct($subject)
    {
        $this->subject=$subject;
        $this->subject->attach($this);
    }
    function alert(){
        $myfile=fopen("notification.txt","r+") or die("Can't open");
      $lastId=0; 
       while(!feof($myfile))
      {
           $line=fgets($myfile);
           $arrayline = explode("~",$line);
           if($arrayline[0]!="")
           {
              $lastId=$arrayline[0];
           }
      }
      $lastId++;
      fclose($myfile);
  $myfile=fopen("notification.txt","a+") or die("Can't open");
  
       fwrite($myfile,"\r\n".$lastId."~"."Your donation was made successfuly Time: ".$_REQUEST["time"]);
       fclose($myfile);
        $txt = $_REQUEST["time"];
      //  echo $txt;
        echo "
            <script type=\"text/javascript\">
            alert(\"Your donation was made successfuly Time: $txt\");
            </script>
        ";
      
  }
  }
      

  ?>