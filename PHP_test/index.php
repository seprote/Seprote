<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Seprote IUT Calais Boulogne</title>
	
	<link href='https://fonts.googleapis.com/css?family=Product+Sans:400,400i,700,700i' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style.css" type="text/css">
	
	<!-- loading google chart library -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>

	<script src="script.js"></script>
</head>
<body>
	<?php
		if(!empty($_SESSION['id'])){ // On est connecter
	?>
	<div id="header">
		<div class="wrap">
		<img class="seprote" src="src/seprote.png" alt="Seprote"/>
		</div>
		<img class="iutCB" src="src/iutCB.png" alt="IUT Calais Boulogne"/>
	</div>
	
	<div id="menuBar">
		<ul>
			<li><a class="itemName" href="#">Acceuil</a></li>
			<?php if($_SESSION['role'] < 3){ ?>
				<li><a class="itemName" href="#">Gestion d'heures</a></li>
				<li><a class="itemName" href="#">Modification du PPN</a></li>
				<li><a class="itemName" href="gestion_compte.php">Gestion de professeur</a></li>
			<?php } ?>
			<li><a class="itemName" href="logout.php">Déconnexion</a></li>
		</ul>
	</div>
	
	<div id="main">
		<div class="mainWrap">
			<h1 class="bonjour">Bonjour, <?= htmlspecialchars($_SESSION['nom']). " " . htmlspecialchars($_SESSION['prenom']) ?>.</h1>
			
			<div id="content">
				<div id="left">
					<div class="center">
						<div id="chart"></div>
						<div class="selection">
							<button class="tabBtn">Tableau</button>
							<button class="pieBtn">Circulaire</button>
							<button class="barBtn">Barres</button>
						</div>
					</div>
				</div>
				
				<div id="right">
					<div class="calendar">
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
	
	else header('Location: login.php');
	?>
	<footer>
		<a class="aPropos" href="" onclick="alert('projet par:\nEl Yazid Benbella\nClouet Anthony\nLenglet Anthony\nDoyer Nicolas')">A propos</a>
		<span class="separator">|</span>
		<span>©Seprote 2016</span>
	</footer>
</body>
</html>
