<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Seprote | Login</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.css">

	<link href='https://fonts.googleapis.com/css?family=Product+Sans:400,400i,700,700i' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="login.css" type="text/css"></link>
</head>

<body>
	<div class="wrap">
		<img class="seprote" src="src/seprote.png" alt="Seprote"/>
		<div class="iutImg">
			<img class="iut" src="src/iut.png" alt="IUT Calais Boulogne"/>
			<img class="iutCB" src="src/iutCB.png" alt="IUT Calais Boulogne"/>
		</div>
		
			<form method="POST" action="login.php" id="loginForm">
				<label>Nom d'utilisateur</label>
				<input type="text" name="login"/>
				<br/><br/>
				<label>Mot de passe</label>
				<input type="password" name="mdp"/>
				<br/><br/><br/>
				<button type="input">Connexion</button>
			</form>
	<?php

	require_once "BDD.php";
	
	if(!isset($_SESSION['id']) || !isset($_SESSION['nom']) || !isset($_SESSION['prenom']) || !isset($_SESSION['role'])){
		if(empty($_POST['login']) || empty($_POST['mdp'])){
				if(isset($_POST['login']) || isset($_POST['mdp'])) 
				{
					?>
					<div class="ui-widget">
						<div class="ui-state-error ui-corner-all"> 
							<p>
								<span class="ui-icon ui-icon-alert" 
									style="margin-right: .3em;">⚠</span>
								<strong>ERREUR: </strong> L'un des 2 champs est vide !
							</p>
						</div>
					</div>
					<?php
				}
			}
		else{
			$req = $bdd->prepare('SELECT id_u, mail, mdp, nom, prenom, id_role FROM utilisateur WHERE mail = :mail AND mdp = :mdp');
			$req->execute(array(
			'mail' => $_POST['login'], 
			'mdp' => sha1($_POST['mdp'])
			));

			$resultat = $req->fetch();

			if(!$resultat){ 
			?>
				<div class="ui-widget">
					<div class="ui-state-error ui-corner-all"> 
						<p>
							<span class="ui-icon ui-icon-alert" 
								style="margin-right: .3em;">⚠</span>
							<strong>ERREUR: </strong> Login ou mot de passe incorrect !
						</p>
					</div>
				</div>
			<?php
			} 
			else{ // Connexion réussi !
				session_start();

				$_SESSION['id'] = $resultat['id_u']; 
				$_SESSION['nom'] = $resultat['nom'];
				$_SESSION['prenom'] = $resultat['prenom'];
				$_SESSION['role'] = $resultat['id_role'];

				header('Location: index.php');
			}
		}
	}
	else header("Location: index.php");

?>
	</div>
	
	<footer>
		<a class="aPropos" href="" onclick="alert('projet par:\nEl Yazid Benbella\nClouet Anthony\nLenglet Anthony\nDoyer Nicolas')">A propos</a>
		<span class="separator">|</span>
		<span>©Seprote 2016</span>
	</footer>
</body>
</html>
