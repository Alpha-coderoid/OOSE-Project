<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body>
    <h1>List All Activities</h1>
    <table border="1">
      <tr>
        <td>Product id</td>
        <td>Product</td>
      </tr>



    <?php

    include_once "drawtable.php";

    drawtable("donations_product.txt");
    ?>
   </table>
  </body>
</html>
