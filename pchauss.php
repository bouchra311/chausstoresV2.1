<?php
//require_once "connect.php";
require_once "connect2.php";

 ?>





<!DOCTYPE html>
<html lang="fr" dir="ltr">

  <head>

    <meta charset="utf-8">

    <title>Interface d'Administration Chaustore</title>
  </head>

  <body>


<?php

?>
<!--voir la couleur -->

<p>Voir les couleurs:</p>



<?php
$reqcolor="SELECT * FROM color ORDER BY id DESC";
$colorenvoi= mysqli_query($conn, $reqcolor);
while($color= mysqli_fetch_array($colorenvoi)){
  echo("<div>".$color[1]."</div>");
}

?>

<!--<input type="submit" name="id" value="Recuperer id">-->


<!--<?php

if (isset($_POST['id'])) {
  $name= $_POST['couleur'];
  $reqid="SELECT id FROM color WHERE name= '$name'";

  $idenvoi=mysqli_query($conn, $reqid);
  $id= mysqli_fetch_assoc($idenvoi);
  echo $id["id"];
}


 ?>-->

<!--voir la marque -->

<p>Voir les marques:</p>


 <?php
 $reqbrand="SELECT * FROM brand ORDER BY id DESC";
 $brandenvoi= mysqli_query($conn, $reqbrand);
 while($brand= mysqli_fetch_array($brandenvoi)){
 echo("<div>".$brand[1]."</div>");
 }

 ?>

 <!--voir les catégories -->
 <p>Voir les catégories:</p>

  <?php
  $reqcategory="SELECT * FROM category ORDER BY id DESC";
  $categoryenvoi= mysqli_query($conn, $reqcategory);
  while($category= mysqli_fetch_array($categoryenvoi)){
  echo("<div>".$category[1]."</div>");
  }

  ?>







<!--voir les produits-->

<p>Voir les produits:</p>





  <?php
  $reqproduct="SELECT * FROM product ORDER BY id DESC";
  $productenvoi= mysqli_query($conn, $reqproduct);
  while($product= mysqli_fetch_array($productenvoi)){
  echo("<div>".$product[1]."</div>");
  }

  ?>







<!--voir la pointure-->

<p>Voir les pointures:</p>




  <?php
  $reqsize="SELECT * FROM size ORDER BY id DESC";
  $sizeenvoi= mysqli_query($conn, $reqsize);
  while($size= mysqli_fetch_array($sizeenvoi)){
  echo("<div>".$size[1]."</div>");
  }

  ?>
  </select>









<!--
  <input type="submit" name="id" value="Recuperer id">
  </form>

  <form method="post">
  <select name="stock">
  <?php/*
  $reqstock="SELECT * FROM stock";
  $stockenvoi= mysqli_query($conn, $reqstock);
  while($stock= mysqli_fetch_assoc($stockenvoi)){
  echo "<option>".$stock["name"]."</option>";
  }

  ?>
  </select>

  <input type="submit" name="id" value="Recuperer id">
  </form>

-->
  </body>
</html>
