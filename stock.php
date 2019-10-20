<?php
//require_once "connect.php";
require_once "connect2.php";
session_start();
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier Le stock</title>
  </head>
  <body>

    <h1>Ajouter un stock</h1>
  <form method="post">
    <input type="text" name="ajout" placeholder=""<?php if(isset($_POST['ajout'])){
    $nombre = htmlspecialchars($_POST['ajout']);
    $sql = "INSERT INTO stock (stock) VALUE('$nombre')";
    mysqli_query($conn,$sql);
}?>/>
    <input type="submit" name="ok" value="ok">


  </form>


<p>Voir le stock:</p>

<?php

  $reqstock="SELECT id, name, price, gender, product_id, stock
FROM product INNER JOIN stock ON product.id = stock.product_id";
  $stockenvoi= mysqli_query($conn,$reqstock);

  while($stock= mysqli_fetch_assoc($stockenvoi)){
    $idstock= $stock['stock'];

  echo("<div id='stock'>".$stock['stock']."<form method='post'>
   <input type='text' name='form' placeholder='newname'>
   <input type='submit' name='modif".$idstock."' value='modifier'>
   <input type='submit' name='supp".$idstock."' value='supprimer'>
 </form></div>");


    if(isset($_POST["supp".$idstock])){
    header("location:suppstock.php?id=".$idstock);

  };

    if(isset($_POST["modif".$idstock])) {
      $poststock = htmlspecialchars($_POST['form']);
      $modifstock = "UPDATE stock SET stock = '$poststock'
      WHERE id = '$idstock'";
      mysqli_query($conn, $modifstock);
      header("location:stock.php");
    }

}

?>

</body>

</html>
