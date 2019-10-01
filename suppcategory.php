
<?php
require_once "connect.php";

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>supprimer une catégorie</title>
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
header("location: category.php");
};

if (isset($_POST["oui"])) {
  $idcat= intval($_GET['id']);
  $reqcat="DELETE FROM category WHERE id = '$idcat'";
  mysqli_query($conn,$reqcat);
header("location: category.php");
}
?>
