<?php
//session_start();

$bdd = new PDO('mysql:host=localhost:8889;dbname=GBAF', 'root', 'root');
     



?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Inscription</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h3>Inscription</h3>
    <br/><br/>
      <form method="POST" action="">
        <table>
          <tr>
            <td>
              <label for="nom">Nom :</label>
            </td>
            <td>
              <input type="text" name="nom" id="nom" value=""/>
            </td>
          </tr>
          <tr>  
            <td>    
              <label for="prenom">Prénom :</label>
            </td>
            <td>
              <input type="text" name="prenom" id="prénom" value=""/>
            </td>
          </tr>
          <tr>  
            <td>
    
              <label for="username">Nom d'utilisateur :</label>
            </td>
            <td>
              <input type="text" name="username" placeholder="Pseudo" id="pseudo" value=""/>
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
        <input type="submit" name="forminscription" value="Je m'inscris"/>

  </body>
</html>
