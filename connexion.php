
<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=connexion', 'root', '');
if(isset($_POST['envoyer'])){
	if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){
		$pseudo=htmlspecialchars($_POST['pseudo']);
		$password=sha1($_POST['password']);
		$erreur="";
		$recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE login= ? AND passe= ?');
		$recupUser->execute(array($pseudo, $password));

		if($recupUser->rowCount() > 0){
			$_SESSION['login'] = $pseudo;
			$_SESSION['passe'] = $password;
			$_SESSION['id'] = $recupUser->fetch()['id'];
			header('Location: pagedpsp.php'); 
		}else{
			$erreur= "votre mot de passe ou Nom utilisateur  incorrect.."; 
		}

	}else{
		$erreur=" veuillez completer tous les champs...";
	}
}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/connexion.css">
	<title>connexion</title>
</head>
<body>
	 <form method="post" action="#" >
	 	<section>
	 	<h1>Connexion</h1>
	 	<p class="erreur">
	 	<?php 
  			
  			if(isset($erreur)){
  				echo $erreur ; 
  			}
	 	 ?></p>
	 	<label>Nom Utilisateur</label>
	 	<input type="text" name="pseudo" placeholder="Nom utilisateur" required>
	 	<label>Mot de passe</label>
	 	<input type="password" name="password" placeholder="Mot de passe"  required>
	 	<input type="submit" name="envoyer" value="ENVOYER" >
	 	<p>voulez vous vous connectez?''<a href="compteUser.php"> Creer Compte</a> </p>
	 	</section>
	 </form>
</body>
</html>