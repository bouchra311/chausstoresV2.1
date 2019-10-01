<?php
//require_once "connect.php";
require_once "connect2.php";


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <p>Voir les produits:</p>





      <?php
      $reqproduct="SELECT * FROM product ORDER BY id DESC";
      $productenvoi= mysqli_query($conn, $reqproduct);
      while($product= mysqli_fetch_array($productenvoi)){

      echo "<div id='product'>".$product['name']."<form method='post'>
             <input type='text' name='forml' placeholder='newname'>
             <input type='submit' name='formul' value='modifier'>
             <input type='submit' name='formulaire' value='supprimer'>
            </form></div>";
      }

      ?>
  </body>
</html>
