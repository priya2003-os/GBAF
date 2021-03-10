<?php

$bdd = new PDO('mysql:host=localhost:8889;dbname=GBAF', 'root', 'root');

    


if(isset($_POST['forminscription']))
{
	$nom=htmlspecialchars($_POST['nom']);
	$prenom=htmlspecialchars($_POST['prenom']);
	$username=htmlspecialchars($_POST['username']);
	$mdp=($_POST['mdp']);
	$mdp2=($_POST['mdp2']);
	$reponsequestionsecrete=htmlspecialchars($_POST['reponsequestionsecrete']);

	$req=$bdd->prepare('SELECT username,password FROM ESPACE_MEMBRES WHERE username= :username');
	$req->execute(array('username'=>$username,));
	$usernameexist=$req->fetch();
}	




if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['reponsequestionsecrete']))	
{

}
else
{
	$erreur1="Tous les champs doivent être complétés!";
}

if($usernameexist=0)
{

}
else
{
	$erreur2="Ce nom d'utilisateur existe déjà!";
}

if($_POST['mdp']==$_POST['mdp2'])
{

}
else
{
	$erreur3="Vos mots de passe ne sont pas identiques!";
}

if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['reponsequestionsecrete']) AND ($mdp==$mdp2) AND ($usernameexist==0))
{
	$insertmbr=$bdd->prepare("INSERT INTO ESPACE_MEMBRES(Nom, Prenom, username, password, reponsequestion) VALUES(?,?,?,?,?)");
	$insertmbr->execute(array($nom, $prenom, $username, $mdp, $reponsequestionsecrete));
	$messageconfirmationcpt="Votre compte à été crée avec succès! <a href=\"connect.php\">Vous pouvez maintenant vous connecter!</a>";

header("LOCATION:connect.php");
exit();	
}



?>



<html>
	<head>
		<title>essaieinscr</title>
	</head>
	<body>
		<h3>INSCRIPTON</h3>
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

				<input type="submit" name="forminscription" value="Je m'inscris"/>
				
			</form>
			<?php

				if(isset($erreur1, $erreur2, $erreur3))
				{
					echo $erreur1, $erreur2, $erreur3;
				}
				if (isset($messageconfirmationcpt)) 
				{
					echo $messageconfirmationcpt;
				}
			?>
	</body>
</html>