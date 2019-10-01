<?php
//require_once "connect.php";
require_once "connect2.php";
//require_once "bdd.php";

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1>Ajouter une marque</h1>
  <form method="post">
    <input type="text" name="ajout" placeholder=""<?php if(isset($_POST['ajout'])){
    $nom = htmlspecialchars($_POST['ajout']);
    $sql = "INSERT INTO brand (name) VALUE('$nom')";
    mysqli_query($conn,$sql);
}?>/>
    <input type="submit" name="ok" value="ok">


  </form>


<p>Voir les marques:</p>


 <?php
 $reqbrand="SELECT * FROM brand ORDER BY id DESC";
 $brandenvoi= mysqli_query($conn, $reqbrand);

 while($brand= mysqli_fetch_array($brandenvoi)){
$idbrand= $brand['id'];
 echo "<div id='brand'>".$brand['name']."<form method='post'>
<input type='text' name='form' placeholder='newname'>
<input type='submit' name='modif ".$idbrand."' value='modifier'>
<input type='submit' name='supp".$idbrand."' value='supprimer'>
</form></div>";

if(isset($_POST["supp".$idbrand])){
header("location:suppbrand.php?id=".$idbrand);

};

if(isset($_POST["modif".$idbrand])) {
  $postbrand = htmlspecialchars($_POST['form']);
  $modifbrand = "UPDATE color SET name = '$postbrand'
  WHERE id = '$idbrand'";
  mysqli_query($conn, $modifbrand);
  header("location:brand.php");
}




 }

 ?>














</body>
</html>
