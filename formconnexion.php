<?php

  session_start();

  $user = '';
  $mdp = '';

  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    if($username&&$pass){
      if($user==$username && $mdp == $pass){
        $_SESSION['username'] = $_POST['username'];
        header('Location: gestion.php');
      } else {
        echo 'Mauvais identifiant';

      }
    }
  }

 ?>



<h2>Pour Acceder à votre espace administrateur veuillez taper votre identifiant et votre mot de passe</h2>

<form method="POST">
  <input type="text" name="username" placeholder="Pseudo">
  <input type="password" name="pass" placeholder="Mot de passe...">
  <input type="submit" name="submit" value="Connexion">
</form>


<h2>Pour creer un compte<a href="forminscription.php"> Cliquez ICI<a></h2>
