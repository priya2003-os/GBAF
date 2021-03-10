 <?php
session_start();

$bdd = new PDO('mysql:host=localhost:8889;dbname=GBAF', 'root', 'root');


	if(isset($_POST['forminscription']))
	{
		$nom=htmlspecialchars($_POST['nom']);
		$prenom=htmlspecialchars($_POST['prenom']);
		$username=htmlspecialchars($_POST['username']);
		$mdp=sha1($_POST['mdp']);
		$mdp2=sha1($_POST['mdp2']);
		$reponsequestionsecrete=htmlspecialchars($_POST['reponsequestionsecrete']);	

		if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['reponsequestionsecrete'])) 
		{
			

		}
		else
		{
			$erreur="Tous les champs doivent être complétés!";
		}

		if ($mdp==$mdp2) 
		{
			
		}
		else
		{
			$erreur="Vos mots de passe ne correspondent pas!";
		}

		$insertmbr=$bdd->prepare("INSERT INTO ESPACE_MEMBRES(Nom, Prenom, username, password, reponsequestion) VALUES(?,?,?,?,?)");
		$insertmbr->execute(array($nom, $prenom, $username, $mdp, $reponsequestionsecrete));
		$messageconfirmationcpt="Votre compte à été crée avec succès! <a href=\"connexion.php\">Me connecter</a>";

		$requsername=$bdd->prepare("SELECT * FROM ESPACE_MEMBRES WHERE username=?");
		$requsername->execute(array($username));
		$usernameexist=$requsername->rowcount();

			if($requsername==0)
			{

			}
			else
			{
				$erreur="Ce nom d'utilisateur existe déjà";
			}


		
	}
?>

<html>
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
							<input type="text" name="nom" id="nom" value="<?php if(isset($nom)) { echo '$nom'; }?>" />
						</td>
					</tr>
					<tr>	
						<td>		
							<label for="prenom">Prénom :</label>
						</td>
						<td>
							<input type="text" name="prenom" id="prénom" value="<?php if(isset($prénom)) { echo $prénom; }?>" />
						</td>
					</tr>
					<tr>	
						<td>
							<label for="username">Nom d'utilisateur :</label>
						</td>
						<td>
							<input type="text" name="username" placeholder="Pseudo" id="pseudo" value="<?php if(isset($username)) { echo $username; }?>" />
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
				if(isset($erreur))
				{
					echo $erreur;
				}
				if (isset($messageconfirmationcpt)) 
				{
					echo $messageconfirmationcpt;
				}
			?>	

	</body>
</html>
