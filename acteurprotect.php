<?php
session_start();
$user_id = $_SESSION['id'];

$bdd = new PDO('mysql:host=localhost:8889;dbname=GBAF', 'root', 'root');
$up = 0;
$down = 0;

$sql_like = "SELECT COUNT(*) FROM lidiske where id_acteur=1 AND up=1";
$res = $bdd->query($sql_like);
if (isset($res)) {
    $up = $res->fetchColumn();
}

$sql_dislike = "SELECT COUNT(*) FROM lidiske where id_acteur=1 AND down=1";
$down = 0;
$res = $bdd->query($sql_dislike);
if ($res) {
    $down = $res->fetchColumn();
}

if(isset($_POST['likes'])) {

      $user_id=($_POST['user_id']);
      $acteur_id=($_POST['acteur_id']);
      $insertlike = $bdd->prepare('INSERT INTO lidiske (id_espacemembres,id_acteur,up) VALUES(?,?,?)');
      $insertlike->execute(array($user_id, $acteur_id,1));
      
}

if(isset($_POST['dislikes'])) {

      $user_id=($_POST['user_id']);
      $acteur_id=($_POST['acteur_id']);
      // $acteur_id=$_GET['id']; 
      $insertdislike = $bdd->prepare('INSERT INTO lidiske (id_espacemembres,id_acteur,down) VALUES(?,?,?)');
      $insertdislike->execute(array($user_id, $acteur_id,1));
}

$sql_vote= "SELECT up, down FROM lidiske where id_acteur=1 AND id_espacemembres=:id_espacemembres";

$query = $bdd->prepare($sql_vote);
$query->bindValue(":id_espacemembres", $user_id);
$query->execute();

$vote = $query->fetch();

if(isset($vote))
{
  if($vote['up']=0){
    $is_like="false";
  }
  else{
    $is_like="true";
  }

  if($vote['down']=0){
    $is_dislike="false";
  }
  else{
    $is_dislike="true";
  }

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

    <title>GBAFprotectpeople</title>
  </head>
  <body>
  	<h3>Protectpeople</h3>
  	<br/><br/>
    <p> <img src="image/protectpeople.png"></p>
    <p>Protectpeople finance la solidarité nationale.
Nous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.

Chez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.
Proectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.
Nous garantissons un accès aux soins et une retraite.
Chaque année, nous collectons et répartissons 300 milliards d’euros.
Notre mission est double :
● sociale : nous garantissons la fiabilité des données sociales ;
● économique : nous apportons une contribution aux activités économiques.

</p>
    
	 <div id="affichage_like">
    <form method="POST">
      <tr>
        <td>
          <label><img class="thumbs_up" src="imagelike/icons8-thumbs-up-64.png"></label>
        </td>
        <td >
          <input type="hidden" name="acteur_id" value="<?= $_GET['id'] ?>">
          <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
          <input type="submit" name="likes" value="j'aime">
        </td>
      </tr>
      <tr>
        <td>
          <label><img class="thumbs_down" src="imagelike/icons8-thumbs-down-64.png"></label>
        </td>
        <td>
          <input type="hidden" name="acteur_id" value="<?= $_GET['id'] ?>">
          <input type="text" name="user_id" value="<?= $_SESSION['id'] ?>">
          <input type="submit" name="dislikes" value="Je n'aime pas">
        </td>
      </tr>
    </form>
   </div> 

    <p><?php echo 'like: ' .$up; ?></p>
    <p><?php echo 'dislike: ' .$down; ?></p>





    <h4>Commentaire</h4>

    <form method="POST">
      <textarea name="com" placeholder="Votre commentaire"></textarea><br/>
      <input type="submit" name="poster_commentaire" value="Nouveau commentaire" class="com">
    </form>

  <?php
      
      if(isset($erreur))
      {
        echo $erreur;
      }

      if(isset($_POST['likes']) OR isset($_POST['dislikes']))
      {
  ?>
        <script type="text/javascript">
        document.getElementById("affichage_like").style.display="none";
        </script>
        <p>Vous avez voté!</p>
  <?php      
      }
  ?>
  <a href="deconnexion.php">Se déconnecter</a>





    
    
  </body>
</html>
