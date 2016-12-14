<?php 	

session_start(); 
require_once "BDD.php";

/************ TRAITEMENT FORMULAIRE ************/

	if(isset($_POST['type_form'])){
	
	

		if($_POST['type_form'] == 1){ // Traitement du formulaire d'ajout de compte
	
			/********* VERIFICATION DES DONNEES *********/
			if($_POST['id_role'] != 1 && $_POST['id_role'] != 2 && $_POST['id_role'] != 3){

					$ERROR = "Id du rôle incorrect !";
				
			}	

			else if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){

					$ERROR = "Adresse mail incorrecte !";
			}

			
			else if(strlen($_POST['mdp']) < 6){

					$ERROR = "Mot de passe trop court !";
			}
				
			/********** REQUETE A EFFECTUER **************/	
			
			else{
				$req_ajout = $bdd->prepare("INSERT INTO utilisateur(nom,prenom,mail,id_role,mdp) VALUES(:nom,:prenom,:mail,:id_role,:mdp)");
				$req_ajout->execute(array(
					'nom' => $_POST['nom'], 
					'prenom' => $_POST['prenom'], 
					'mail' => $_POST['mail'],
					'id_role' => $_POST['id_role'],
					'mdp' => sha1($_POST['mdp'])
				));
				header('Location: gestion_compte.php');

				if(!$req_ajout){

				}
				
			}
		}	

		if($_POST['type_form'] == 1){

		}

	}

	include('header.php');

		if(!empty($_SESSION['id'])){ // On est connecté
	?>
	<div id="header">
		<div class="wrap">
		<img class="seprote" src="src/seprote.png" alt="Seprote"/>
		</div>
		<img class="iutCB" src="src/iutCB.png" alt="IUT Calais Boulogne"/>
	</div>
	
	<?php include('menu.php'); ?>
	
	<div id="main">
		<div class="mainWrap">
			<div id="content">
				<?php 
					
					$req_compte = $bdd->query("SELECT id_u,nom,prenom,mail,id_role FROM utilisateur"); 
				?>
				<div class="accInput">
					<form action="#" method="POST">
						<input name="nom" placeholder="nom" type="text">
						<input name="prenom" placeholder="prenom" type="text">
						<input name="mail" placeholder="mail" type="text">
						<select name="id_role" type="text">
							<option value="1">administrateur</option>
							<option value="2">gestionaire</option>
							<option value="3">professeur</option>
						</select>
						<input type="password" name="mdp" placeholder="mot de passe">
						<button class="submitBtn" value="Créer" type="submit">Ajouter</button>
						<input type='hidden' name='type_form' value='1'></td>
					</form>
				</div>
					
				<table id="ListeComptes" class="tablesorter">
					<thead>
					<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Adresse mail</th>
						<th>Rôle</th>
						<th>Editer</th>
						<th>Supprimer</th>
					</tr>				
					</thead>
					
					<tbody>
				<?php

					/***************** AFFICHAGE DES COMPTES *********************/

					while($donnees = $req_compte->fetch()){

						 echo "<tr class='odd'><td>";
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
						</tbody>
					</table>
					
					
					<!-- *********** FORMULAIRE AJOUT UTILISATEUR ****************-->
					
					<!-- <form action='#' method='POST'>
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
								<td><input type='password' name='mdp' id="mdp"></td>
								<td><input type='submit' value='Créer' id="ajout">
								<input type='hidden' name='type_form' value='1'></td>
							</tr>
						</table>
					</form>	-->
					
					<?php if($ERROR) { ?>
			
					<div class="ui-widget">
						<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
							<p>
								<span class="ui-icon ui-icon-alert" 
									style="margin-right: .3em;"></span>
								<strong>ERREUR: </strong> <?php echo $ERROR ?>
							</p>
						</div>
					</div>

					<?php } ?>
					
			</div>
		</div>
	</div>
	
	<script>
		$("#ListeComptes").tablesorter();
	</script>
	<?php
	}
	
	else header('Location: login.php');

	include('footer.php');
	?>
