<?php
require_once "connect.php";

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="">
      <p>Êtes-vous sûr de supprimer?</p>
      <form method="post">
      <input type="submit" name="oui" value="oui">
      <input type="submit" name="non" value="non">
    </form>
    </div>

  </body>
  </html>

  <?php
  if(isset($_POST["non"])){
  header("location: brand.php");
  };

  if (isset($_POST["oui"])) {
    $idb= intval($_GET['id']);
    $reqbr="DELETE FROM brand WHERE id = '$idb'";
    mysqli_query($conn,$reqcl);
  header("location: brand.php");
  }

  ?>
