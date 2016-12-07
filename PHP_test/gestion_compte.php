<?php 	

session_start(); 
require_once "BDD.php";

/************ TRAITEMENT FORMULAIRE ************/

	if(isset($_POST['type_form'])){


		if($_POST['type_form'] == 1){ // Traitement du formulaire d'ajout de compte
	
			$req_ajout = $bdd->prepare("INSERT INTO utilisateur(nom,prenom,mail,id_role,mdp) VALUES(:nom,:prenom,:mail,:id_role,:mdp)");
			$req_ajout->execute(array(
				'nom' => $_POST['nom'], 
				'prenom' => $_POST['prenom'], 
				'mail' => $_POST['mail'],
				'id_role' => $_POST['id_role'],
				'mdp' => sha1($_POST['mdp'])
			));
			header('Location: gestion_compte.php');

		}

		if($_POST['type_form'] == 1){

		}

	}
?>

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
			<div id="content">
				<?php 
					
					$req_compte = $bdd->query("SELECT id_u,nom,prenom,mail,id_role FROM utilisateur"); 
				?>
					
				<table>
					<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Adresse mail</th>
						<th>Rôle</th>
						<th>Editer</th>
						<th>Supprimer</th>
					</tr>				

				<?php

					/***************** AFFICHAGE DES COMPTES *********************/

					while($donnees = $req_compte->fetch()){

						 echo "<tr><td>";
						 echo htmlspecialchars($donnees['nom']);
						 echo '</td>';
						 echo '<td>';
						 echo htmlspecialchars($donnees['prenom']); 
						 echo '</td>';
					         echo '<td>';
						 echo htmlspecialchars($donnees['mail']); 
						 echo '</td>';
						 echo '<td>';
						 echo htmlspecialchars($donnees['id_role']); 
						 echo '</td>';
						 echo '<td>';
						 echo "<input type='button' value='Editer'>";
						 echo "<input type='hidden' name='id_u' value=".htmlspecialchars($donnees['id_u']).">"; 
						 echo '</td>';
						 echo '<td>';
						 echo "<input type='checkbox'>"; 
						 echo '</td>';
						 echo '</tr>';
						
					}	

					?>
					</table>


					<!-- *********** FORMULAIRE AJOUT UTILISATEUR ****************-->
	
					<form action='#' method='POST'>
						<table>
							<tr>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Adresse mail</th>
								<th>Rôle</th>
								<th>Mot de passe</th>
							</tr>
							<tr>
								<td><input type='text' name='nom' id="nom"></td>
								<td><input type='text' name='prenom' id="prenom"></td>
								<td><input type='text' name='mail' id="mail"></td>
								<td><select name='id_role'>
										<option value="1">Administrateur</option>
										<option value="2">Gestionnaire</option>
										<option value="3">Utilisateur</option>
									</select>								
								</td>
								<td><input type='text' name='mdp' id="mdp"></td>
								<td><input type='submit' value='Créer' id="ajout">
								<input type='hidden' name='type_form' value='1'></td>
							</tr>
						</table>
					</form>	
			
					
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
