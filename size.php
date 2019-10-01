<?php
//require_once "connect.php";
require_once "connect.php";

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier la pointure</title>
  </head>
  <body>

    <h1>Ajouter une pointure</h1>
  <form method="post">
    <input type="text" name="ajout" placeholder=""<?php if(isset($_POST['ajout'])){
    $nom = htmlspecialchars($_POST['ajout']);
    $sql = "INSERT INTO color (name) VALUE('$nom')";
    mysqli_query($conn,$sql);
}?>/>
    <input type="submit" name="ok" value="ok">


  </form>


    <p>Voir les pointures:</p>

      <?php

      $reqsize="SELECT * FROM size ORDER BY id DESC";
      $sizeenvoi= mysqli_query($conn,$reqsize);

      while($size= mysqli_fetch_array($sizeenvoi)){
        $idsize=$size['id'];
        echo("<div id='size'>".$size['name']."<form method='post'>
               <input type='text' name='form' placeholder='newname'>
               <input type='submit' name='modif".$idsize."' value='modifier'>
               <input type='submit' name='supp".$idsize."' value='supprimer'>
              </form></div>");


      if(isset($_POST["supp".$idsize])){
      header("location:suppsize.php?id=".$idsize);

    };

      if(isset($_POST["modif".$idsize])) {
      $postsize = htmlspecialchars($_POST['form']);
      $modifsize = "UPDATE color SET name = '$postsize'
      WHERE id = '$idsize'";
      mysqli_query($conn, $modifsize);
      header("location:size.php");
        }

      }

      ?>
  </body>
</html>
