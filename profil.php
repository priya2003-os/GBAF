<?php
session_start();
$_SESSION['fullname'];

$bdd = new PDO('mysql:host=localhost:8889;dbname=GBAF', 'root', 'root');

if(isset($_POST['updateprofil']))

  $nom=htmlspecialchars($_POST['nom']);
  $prenom=htmlspecialchars($_POST['prenom']);
  $username=htmlspecialchars($_POST['username']);
  $mdp=($_POST['mdp']);
  $mdp2=($_POST['mdp2']);
  $reponsequestionsecrete=htmlspecialchars($_POST['reponsequestionsecrete']);
{
  if 
    (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['reponsequestionsecrete']))

  $req=$bdd->prepare('SELECT username,password FROM ESPACE_MEMBRES WHERE username= :username');
  $req->execute(array('username'=>$username,));
  $usernameexist=$req->fetch();

  {
    if($usernameexist=0)
    {
      if($_POST['mdp']==$_POST['mdp2'])

      {
        $updatembr=$bdd->prepare("UPDATE ESPACE_MEMBRES 
          SET Nom=?, 
          Prenom=?,
          username=?,
          password=?,
          reponsequestion=? WHERE id=?");
        $updatembr->execute(array($nom, $prenom, $username, $mdp, $reponsequestionsecrete, $_SESSION['id']));
      }
    }
  }

}



?>

<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet">

    <title>GBAFprofiluser</title>
  </head>
  <body>
  	<h3>Profil de : <?php echo $_SESSION['fullname']?></h3>
  	<br/><br/>
    <h3>Paramètre du compte</h3>
    <br/><br/><br/>
    <form method="POST" action="">
        <table>
          <tr>
            <td>
              <label for="nom">Nom :</label>
            </td>
            <td>
              <input type="text" name="nom" id="nom" value="<?php if(isset($nom)) { echo $nom; }?>"/>
            </td>
          </tr>
          <tr>  
            <td>    
              <label for="prenom">Prénom :</label>
            </td>
            <td>
              <input type="text" name="prenom" id="prenom" value="<?php if(isset($prenom)) { echo $prenom; }?>"/>
            </td>
          </tr>
          <tr>  
            <td>
              <label>Nom d'utilisateur :</label>
            </td>
            <td>
              <input type="text" name="username" placeholder="Pseudo" value="<?php if(isset($username)) { echo $username; }?>"/>
            </td>
          </tr>
          <tr>  
            <td>
              <label for="mdp">Mot de passe :</label>
            </td>
            <td>
              <input type="password" name="mdp" placeholder="Saisissez un mot de passe" id="mdp"/>
            </td>
          </tr>
          <tr>  
            <td>
              <label for="mdp2">Confirmation de votre mot de passe :</label>
            </td>
            <td>
              <input type="password" name="mdp2" placeholder="Saisissez à nouveau votre mot de passe" id="mdp2"/>
            </td>
          </tr>
          <tr>  
            <td>
              <label for="questionsecrete">Question secrète :</label>
            </td>
            <td>
              Quel est votre film préféré? :
            </td>
          </tr>
          <tr>  
            <td>
              <label for="reponsequestionsecrete">Réponse à la question secrète :</label>
            </td>
            <td>
              <input type="text" name="reponsequestionsecrete" placeholder="Saisissez votre réponse" id="reponsequestionsecrete"/>
            </td>
          </tr>
        </table>
        <br/><br/>

        <input type="submit" name="updateprofil" value="Mettre à jour"/>
        
      </form>
		
		<a href="deconnexion.php">Se déconnecter</a>
  </body>
</html>


