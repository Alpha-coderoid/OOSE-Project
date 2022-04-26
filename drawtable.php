<?php


function drawtable($fileName,$fileName2)
{
  $f= $_REQUEST["id"];
  $myfile = fopen($fileName, "r+") or die("Unable to open file!");
  $myfile2 = fopen($fileName2, "r+") or die("Unable to open file!");



    while (!feof($myfile))
    {
        $line = fgets($myfile);
          $line2 = fgets($myfile2);
        echo "<tr>";

        $ArrayLine1 = explode("~", $line);
        $ArrayLine2 = explode("~", $line2);
        if($ArrayLine1[2]==$f)
        {
          for($i=0;$i<count($ArrayLine1); $i++)
          {
              echo "<td>";
              echo $ArrayLine1[$i];
          }
          for($i=0;$i<count($ArrayLine2); $i++)
          {
            if($i==2||$i==4||$i==6||$i==7)
            {
              echo "<td>";
              echo $ArrayLine2[$i];
            }

          }


          echo "</tr>";
       }



    }
    fclose($myfile);
    fclose($myfile2);
}
?>
