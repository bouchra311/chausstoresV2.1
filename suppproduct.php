
<?php
session_start();
require_once "connect2.php";

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>supprimmer un produit</title>
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
header("location: gestion.php");

};

if (isset($_POST["oui"])) {
  $idp= intval($_GET['id']);
  $reqpr="DELETE FROM product WHERE id = '$idp'";
  mysqli_query($conn,$reqpr);
header("location: gestion.php");
}

?>
