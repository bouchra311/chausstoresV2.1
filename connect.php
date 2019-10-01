<?php



$conn = mysqli_connect();
//se connecter à son compte mysql ("localhost","utilisateur_sql","mot de passe")



mysqli_select_db($conn,'simplon_chaustore'); //selectionner une database

mysqli_set_charset($conn,'utf8'); //pour sélection de tous les caractères y compris ceux avec accents

if (!$conn) {
  echo "pas de connection";

}
