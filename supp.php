<?php
require_once "connect.php";

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>supprimmer une couleur</title>
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
header("location: color.php");

};

if (isset($_POST["oui"])) {
  $idc= intval($_GET['id']);
  $reqcl="DELETE FROM color WHERE id = '$idc'";
  mysqli_query($conn,$reqcl);
header("location: color.php");
}

?>
