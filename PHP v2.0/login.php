<?php session_start(); 
	include('header.php');
?>
	<div class="loginWrap">
		<img class="loginSeprote" src="src/seprote.png" alt="Seprote"/>
		<div class="loginIutImg">
			<img class="loginIut" src="src/iut.png" alt="IUT Calais Boulogne"/>
			<img class="loginIutCB" src="src/iutCB.png" alt="IUT Calais Boulogne"/>
		</div>

		<form method="POST" action="login.php" id="loginForm">
			<label>E-mail</label>
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
					?>
				

		<?php
			
				if(isset($_POST['login']) || isset($_POST['mdp'])) 
				{
					?>
					<div class="ui-widget">
						<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
							<p>
								<span class="ui-icon ui-icon-alert" 
									style="margin-right: .3em;"></span>
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
					<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
						<p>
							<span class="ui-icon ui-icon-alert" 
								style="margin-right: .3em;"></span>
							<strong>ERREUR: </strong> Login ou mot de passe incorrect !
						</p>
					</div>
				</div>
			<?php
			} 
			else{ // Connexion réussie !
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
