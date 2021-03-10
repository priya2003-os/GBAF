<?php
session_start();

$bdd = new PDO('mysql:host=localhost:8889;dbname=ESPACE_MEMBRES;charset=utf8', 'root', 'root');
      if(isset($_POST['formconnect']))
      {
        $usernameconnect=htmlspecialchars($_POST[usernameconnect]);
        $mdpconnect=sha1($_POST['mdpconnect']);
        if(!empty($usernameconnect) AND !empty($mdpconnect))
        {
          $requsername=$bdd- >prepare("SELECT * FROM membres WHERE nomdutilisateur=? AND motdepasse=? ");
          $requsername- >execute(array($usernameconnect, $mdpconnect));
          $usernameexist=$requsername- >rowCount();
          if($usernameexist==1)
          {
            $userinfo=$requser- >fetch();
            $_SESSION['id']=$userinfo['id'];
            $_SESSION['username']=$userinfo['username'];
            header("LOCATION: profil.php?id=".$_SESSION['id']);
          }
          else
          {
            $erreur="Nom d'utilisateur et/ou mot de passe incorrect";
          }  

        }
        else
        {
          $erreur="Tous les champs doivent être complétés";
        }
      }
        
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet">

    <title>GBAFconnexion</title>
  </head>
  <body>
    <img id="logo" src="GBAF2/image/gbaf.png"> 
    <h1>Le Groupement Banque Assurance Français</h1>
      <br/><br/>
 

<h3>Connexion</h3>
          <br/><br/>
          <form method="POST" action="">
            <input type="text" name="usernameconnect" placeholder="Nom d'utilisateur">
             <input type="password" name="mdpconnect" placeholder="Mot de passe">
              <input type="submit" name="formconnect" value="se connecter">
          </form>
  </body>
</html>
