<?php
session_start();
require_once "connect2.php";

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Supprimmer un stock</title>
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
  $ids= intval($_GET['id']);
  $reqcl="DELETE FROM stock WHERE stock = '$ids'";
  mysqli_query($conn,$reqcl);
header("location: gestion.php");
}

?>
