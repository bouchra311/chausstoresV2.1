<?php

require_once "connect2.php";
session_start();
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier La Couleur</title>
  </head>
  <body>

    <h1>Ajouter une couleur</h1>
  <form method="post">
    <input type="text" name="ajout" placeholder=""<?php if(isset($_POST['ajout'])){
    $nom = htmlspecialchars($_POST['ajout']);
    $sql = "INSERT INTO color (name) VALUE('$nom')";
    mysqli_query($conn,$sql);

}?>/>

<?php
if(!empty($_GET['success']) AND $_GET['success']==1){
?>
    <p>ÇA MARCHE !</p>
<?php
}
?>
    <input type="submit" name="ok" value="ok">


  </form>


<p>Voir les couleurs:</p>

<?php

  $recolor="SELECT * FROM color ORDER BY id";


  $colorenvoi= mysqli_query($conn,$recolor);

  while($color= mysqli_fetch_assoc($colorenvoi)){
    $idcolor= $color['name'];


    echo("<div id='color'>".$color['name']."<form method='post'>
   <input type='text' name='form' placeholder='newname'>
   <input type='submit' name='modif".$idcolor."' value='modifier'>
   <input type='submit' name='supp".$idcolor."' value='supprimer'>
   </form></div>");



    if(isset($_POST["supp".$idcolor])){
    header("location:suppcolor.php?id=".$idcolor);

  };

    if(isset($_POST["modif".$idcolor])) {
      $postcolor = htmlspecialchars($_POST['form']);
      $modifcolor = "UPDATE color SET name = '$postcolor'
      WHERE id = '$idcolor'";
      mysqli_query($conn, $modifcolor);
      header("location:color.php");
    }
}


?>

</body>

</html>
