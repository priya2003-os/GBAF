<?php
session_start();

$bdd = new PDO('mysql:host=localhost:8889;dbname=GBAF', 'root', 'root');

$requete = $bdd->query('SELECT COUNT(id) FROM lidiske where id_acteur=1 AND up=1');
$up = $requete->fetch();

if(isset($_POST['likes'])) {

      $user_id=($_POST['user_id']);
      $acteur_id=($_POST['acteur_id']);
      // $acteur_id=$_GET['id']; 
      $insertlike = $bdd->prepare('INSERT INTO lidiske (id_espacemembres,id_acteur,up) VALUES(?,?,?)');
      $insertlike->execute(array($user_id, $acteur_id,1));
}






if(isset($_POST['poster_commentaire']))
{
  if(!empty($_POST['com']))
  {

  }
  else
  {
  $erreur="Votre commentaire est vide";
  }
}

?>
 











<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet">

    <title>GBAFcde</title>
  </head>
  <body>
  	<h3>CDE</h3>
  	<br/><br/>
    <p> <img src="image/CDE.png"></p>
    <p>La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. 
    Son président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.
    </p>

    <form method="POST">
      <tr>
        <td>
          <label><img class="thumbs_up" src="imagelike/icons8-thumbs-up-64.png"></label>
        </td>
        <td>
          <input type="hidden" name="acteur_id" value="<?= $_GET['id'] ?>">
          <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
          <input type="submit" name="likes" value="j'aime">
        </td>
      </tr>
    </form>
    <form method="POST">
      <tr>
        <td>
          <label><img class="thumbs_down" src="imagelike/icons8-thumbs-down-64.png"></label>
        </td>
        <td>
          <input type="hidden" name="acteur_id" value="<?= $_GET['id'] ?>">
          <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
          <input type="submit" name="dislikes" value="Je n'aime pas">
        </td>
      </tr>
    </form>




    <h4>Commentaire</h4>

    <form method="POST">
      <textarea name="com" placeholder="Votre commentaire"></textarea><br/>
      <input type="submit" name="poster_commentaire" value="Nouveau commentaire" class="com">

  <?php
      
      if(isset($erreur))
      {
        echo $erreur;
      }

  ?>





    
		<a href="deconnexion.php">Se déconnecter</a>
  </body>
</html>
