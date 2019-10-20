<?php
session_start();
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

    <form method="post">
      <input type="text" name="ajout" placeholder=""<?php if(isset($_POST['ajout'])){
      $nom = htmlspecialchars($_POST['ajout']);
      $sql = "INSERT INTO product (name) VALUE('$nom')";
      mysqli_query($conn,$sql);
  }?>/>
      <input type="submit" name="ok" value="ok">


    </form>


  <p>Voir les produits:</p>


     <?php
      $reqproduct="SELECT * FROM product ORDER BY id DESC";
      $productenvoi= mysqli_query($conn, $reqproduct);

      while($product= mysqli_fetch_array($productenvoi)){
        $idproduct= $product['id'];
      echo("<div id='product'>".$product['name']."<form method='post'>
           <input type='text' name='form' placeholder='newname'>
           <input type='submit' name='modif".$idproduct."' value='modifier'>
             <input type='submit' name='supp".$idproduct."' value='supprimer'>
            </form></div>");

            if(isset($_POST["supp".$idproduct])){
              header("location:suppproduct.php?id=".$idproduct);

            };

            if(isset($_POST["modif".$idproduct])) {

              $postproduct = htmlspecialchars($_POST['form']);
              $modifproduct ="UPDATE product SET name = '$postproduct'Where id = '$idproduct'";
              mysqli_query($conn, $modifproduct);
              header("location:product.php");

            }
      }

      ?>
  </body>
</html>
