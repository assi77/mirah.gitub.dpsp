<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=connexion', 'root', '');
if(isset($_POST['CompteUser'])){
	$erreur="";
	$pseudo=htmlspecialchars($_POST['pseudo']);

if (empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])) {
	// code...
	$erreur='le non d utilisateur nest pas valide';
}else{
	$User = $bdd->prepare('SELECT id FROM utilisateur WHERE login= ?');
		$User->execute(array($pseudo));
		$req=$User->fetch();
		if($req){
			$erreur='utilisateur deja inscrit';
		}
}

if (empty($_POST['password']) || $_POST['password']!= $_POST['conf_psswd']) {
	// code...
	$erreur='le mot de passe doit etre conforme';

 }
 if(empty($_POST['password']) and empty($_POST['password']) and empty($_POST['conf_psswd'])){
 	$erreur= " veuillez completer tous les champs...";
 }if(empty($erreur)){
 	$pseudo=htmlspecialchars($_POST['pseudo']);
		$password=sha1($_POST['password']);
		$pass_conf=sha1($_POST['conf_psswd']);
		$insertUser= $bdd->prepare('INSERT INTO utilisateur(login, passe) VALUES(?, ?)') ;
		 $insertUser->execute(array($pseudo, $password));
		 
		 header('Location:pagedpsp.php');
 }

}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/connexion.css">
	<title>creer utilisateur</title>
</head>
<body>
	 <form method="post" action="#" >
	 	<section>
	 	<h1>Creer Compte utilisateur</h1>
	 	<?php 

	 	if(isset($erreur)){

	 		echo "<p class='erreur'>$erreur</p>";
	 	}

	 	 ?>
	 	<label>Nom Utilisateur</label>
	 	<input type="text" name="pseudo" placeholder="Nom utilisateur">
	 	<label>Mot de passe</label>
	 	<input type="password" name="password" placeholder="Mot de passe">
	 	<label> Confirmer le Mot de passe</label>
	 	<input type="password" name="conf_psswd" placeholder=" Reppetez Mot de passe">
	 	
	 	<input type="submit" name="CompteUser" value="ENVOYER" >
	 	<p>voulez vous vous connectez?<a href="Connexion.php"> Se Connecter</a> </p>
	 	</section>
	 </form>
</body>
</html>