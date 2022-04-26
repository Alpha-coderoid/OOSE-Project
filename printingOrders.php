<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body>
    <h1>List Donations of donor</h1>
    <table border="2">
      <tr>
        <td><b>donation_order id</b></td>
        <td><b>Donation_product id</b></td>
          <td><b>Donor id</b></td>
          <td><b>date of order</b> </td>

            <td><b>Payment Method id</b></td>
            <td><b>amount donated</b></td>
            <td><b>date of delivery</b></td>
            <td><b>Time of order</b></td>




      </tr>



    <?php

    include_once "drawtable.php";

    drawtable("donations_order.txt","order_details.txt");
    ?>
   </table>
  </body>
</html>
