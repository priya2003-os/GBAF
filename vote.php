<?php
session_start ();

$bdd = new PDO('mysql:host=localhost:8889;dbname=GBAF', 'root', 'root');
if(isset($_POST['likes'])) {
   		$ins = $bdd->prepare('UPDATE acteur_partenaire SET like_count=1 WHERE id');
            $ins->execute(array($get));
}else{
    	$ins = $bdd->prepare('INSERT INTO acteur_partenaire (dislike_count) VALUES (?)');
            $ins->execute(array());
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>hhhh</title>
</head>
<body>
	<form method="POST">
		<tr>
			<td>
				<label><img class="thumbs_up" src="imagelike/icons8-thumbs-up-64.png"></label>
			</td>
			<td>
				<input type="text" value="$_SESSION['usernameconnect']">
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
				<input type="submit" name="dislikes" value="Je n'aime pas">
			</td>
		</tr>
	</form>
</body>
</html>


	