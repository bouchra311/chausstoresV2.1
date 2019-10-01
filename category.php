<?php
//require_once "connect.php";
require_once "connect.php";
//require_once "bdd.php";

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


        <h1>Ajouter une categorie</h1>
      <form method="post">
        <input type="text" name="ajout" placeholder=""<?php if(isset($_POST['ajout'])){
        $nom = htmlspecialchars($_POST['ajout']);
        $sql = "INSERT INTO category (name) VALUE('$nom')";
        mysqli_query($conn,$sql);
    }?>/>
        <input type="submit" name="ok" value="ok">


      </form>

    <p>Voir les catégories:</p>

     <?php
     $reqcategory="SELECT * FROM category ORDER BY id DESC";
     $categoryenvoi= mysqli_query($conn, $reqcategory);

     while($category= mysqli_fetch_array($categoryenvoi)){
       $idcategory= $category['id'];
       echo ("<div id='category'>".$category['name']."<form method='post'>
              <input type='text' name='form' placeholder='newname'>
              <input type='submit' name='modif".$idcategory."' value='modifier'>
              <input type='submit' name='supp".$idcategory."' value='supprimer'>
             </form></div>");


      if(isset($_POST["supp".$idcategory])){
      header("location:suppcategory.php?id=".$idcategory);
     }

     if(isset($_POST["modif".$idcategory])) {
       $postcategory = htmlspecialchars($_POST['form']);
       $modifcategory = "UPDATE category SET name = '$postcategory'
       WHERE id = '$idcategory'";
       mysqli_query($conn, $modifcategory);
       header("location:category.php");
     }
}

?>

  </body>

</html>
