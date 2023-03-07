
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MIRAH_DPSP</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
	<input type="checkbox" id="nav-toggle">
	<div class="sidebar">
		
		<div class="sidebar-brand">
			<h2><img src="image/dpsp.jpg" width="77px" height="70px"><span>MIRAH</span></h2>
		</div>
		<div class="sidebar-menu">

			<ul>
				<li>
					<a href="" class="active"><span class="las la-igloo"></span>
						<span>dashboard</span> </a>
				</li>
				<li>
					<a href="pagedpsp.php" class="a"><span class="la la-users"></span>
						<span>Acceuil</span> </a>
				</li><li>
					<a href="uploder1.php"  class="a"><span class="las la-clipboard-list"></span>
						<span>uploader</span> </a>
				</li><li>
					<a href="listeArchive.php" class="a"><span class="las la-clipboard-list"></span>
						<span>liste Archive</span> </a>
				</li><li>
					<a href="dpspinfo.php" class="a"><span class="las la-receipt"></span>
						<span>Information</span> </a>
				</li><li>
					<a href="" class="a"><span class="las la-user-circle"></span>
						<span>accunts</span> </a>
				</li> 

			</ul>

		 </div>
		
	</div> 

		<div class="main-content">
			<header >
				<h1 id="h1">
					<label for="nav-toggle">
						<span class="las la-bars"></span>
						DPSP
					</label>
				</h1>
					<input type="search" name="" placeholder="search here" hidden>
			<div class="user-wrapper">
				<img src="image/user.png" alt="user" width="50px" height="50px" class="user">
				<div>
					<h4><?php 
					session_start();
					if(!$_SESSION['passe']){
						header('Location: connexion.php');
					}
					echo $_SESSION['login'];

 				?></h4>
					<small><a href="deconnexion.php">se deconnecte </a></small>

				</div>
			</div>

			</header>
			<main>
				
				<div class="cards">
					<div class="card-single">
						<div>
							<a href="">
								<h1><?php require 'utilisateur.php';  ?></h1>
							</a>
							<span>utilisateurs</span>
						</div>
						<div>
							<span class="las la-users"></span>
						</div>
						
					</div>
					<div class="card-single">
						<div>
							<a href="">
								<h1><?php require 'fichier.php';  ?></h1>
							</a>
							<span>fichiers</span>
						</div>
						<div>
							<span class="las la-clipboard-list"></span>
						</div>
						
					</div>
					<div class="card-single">
						<div>
							<h1>124</h1>
							<span>matrice</span>
						</div>
						<div>
							<span class="las la-shopping-bag"></span>
						</div>
						
					</div>
					 <div class="card-single">
						<div>
							<h1>$54</h1>
							<span>incones</span>
						</div>
						<div>
							<span class="lab la-google-wallet"></span>
						</div>
						
					</div>
			</div>
 </main>