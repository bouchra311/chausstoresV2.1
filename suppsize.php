<?php
require_once "connect.php";

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>supprimmer une pointure</title>
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
header("location: size.php");

};

if (isset($_POST["oui"])) {
  $ids= intval($_GET['id']);
  $reqsz="DELETE FROM color WHERE id = '$ids'";
  mysqli_query($conn,$reqsz);
header("location: size.php");
}

?>
