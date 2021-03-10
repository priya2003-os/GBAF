
<?php
session_start ();
$_SESSION['fullname']
?>








<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet">

    <title>GBAFacteur</title>
  </head>
  <body>
    <?php echo $_SESSION['fullname'];?>
  	<h3>Partenaire</h3>
  	<br/><br/>

    <p>CDE<br/><br/><br/>
      <img src="image/CDE.png"></p>
    <p>La CDE (Chambre Des Entrepreneurs)<a href="acteurcde.php?id=1">Afficher la suite...</a><br/><br/><br/>

    <p>DSA France<br/><br/><br/>
      <img src="image/Dsa_france.png"></p>
    <p>Dsa France accélère la croissance du territoire<a href="acteurdsa.php">Afficher la suite...</a><br/><br/><br/>

    <p>Protectpeople<br/><br/><br/>
      <img src="image/protectpeople.png"></p>
    <p>Protectpeople finance la solidarité nationale<a href="acteurprotect.php">Afficher la suite...</a><br/><br/><br/>

    <p>Formation&co<br/><br/><br/>
      <img src="image/formation_co.png"></p>
    <p>Formation&co est une association française présente sur tout le territoire<a href="acteurformation.php">Afficher la suite...</a><br/><br/><br/>  

      



  </body>
</html>