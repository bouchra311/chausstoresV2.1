<?php


require_once "connect2.php";



$AfficherFormulaire=1;

if(isset($_POST['pseudo'],$_POST['mdp'])){
    if(empty($_POST['pseudo'])){
    } elseif(!preg_match("#^[a-z0-9]+$#",$_POST['pseudo'])){
        echo "Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
    } elseif(strlen($_POST['pseudo'])>25){
        echo "Le pseudo est trop long, il dépasse 25 caractères.";
    } elseif(empty($_POST['mdp'])){
        echo "Le champ Mot de passe est vide.";
    } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM users WHERE pseudo='".$_POST['pseudo']."'"))==1){
        echo "Ce pseudo est déjà utilisé.";
    } else {


        if(!mysqli_query($mysqli,"INSERT INTO users SET pseudo='".$_POST['pseudo']."', mdp='".md5($_POST['mdp'])."'")){
            echo "Une erreur s'est produite: ".mysqli_error($mysqli);
        } else {
            echo "Vous êtes inscrit avec succès!";
            
            $AfficherFormulaire=0;
        }
    }
}
if($AfficherFormulaire==1){
    ?>


    <form method="post" action="forminscription.php">

        Nom:<input type="text" name="nom">
<br>
        Prénom:<input type="text" name="prenom">
<br>
        Email:<input type="text" name="email">
<br>
        Pays:<input type="text" name="pays">
<br>
        Ville:<input type="text" name="ville">
<br>
        Code Postal:<input type="text" name="code_postal">
<br>
        Pseudo (a-z0-9) : <input type="text" name="pseudo">
<br>
        Mot de passe : <input type="password" name="mdp">


        <input type="submit" value="S'inscrire">
    </form>
    <?php
}
?>
