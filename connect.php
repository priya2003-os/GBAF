<?php

$db_options = array(

    //gestion des caractères accentués
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",


);


$bdd = new PDO('mysql:host=localhost:8889;dbname=GBAF', 'root', 'root');

if(isset($_POST['formconnect']))
      {
        $usernameconnect=($_POST['usernameconnect']);
        $mdpconnect=($_POST['mdpconnect']);

        $sql = "SELECT id,nom,prenom FROM espace_membres WHERE username = :username AND password = :password";

    $query = $bdd->prepare($sql);
    $query->bindValue(":username", $_POST['usernameconnect'], PDO::PARAM_STR);
    $query->bindValue(":password", $_POST['mdpconnect'], PDO::PARAM_STR);
    $query->execute();

    $user = $query->fetch();
      }

if(!$user)
  {
     exit('Mauvais identifiant ou mot de passe!');
  }  
else
  {
    session_start();
    $fullname = $user['nom']." ".$user['prenom'];
    $_SESSION['id']=$user['id'];
    $_SESSION['fullname']=$fullname;
    $_SESSION['prenom']=$user['prenom'];



    $_SESSION['usernameconnect']=$_POST['usernameconnect'];
            header("LOCATION:acteur.php");
            exit();
  }
        
?>
<!DOCTYPE html>
<html lang="fr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet">

    <title>GBAFconnexion</title>
  </head>
  <body>
    <img id="logo" src="image/gbaf.png"> 
    <h1>Le Groupement Banque Assurance Français</h1>
      <br/><br/>

<h3>Connexion</h3>
          <br/><br/>
          <form method="POST" action="">
            <input type="text" name='usernameconnect' placeholder="Nom d'utilisateur">
             <input type="password" name='mdpconnect' placeholder="Mot de passe">
              <input type="submit" name='formconnect' value="se connecter">
          </form>
  </body>
</html>
