<?php

	require_once "BDD.php";

	if(empty($_POST['login']) || empty($_POST['mdp'])){
				?>
				<form method="POST" action="login.php">
					Mail: <input type="text" name="login"><br><br>
					Mot de passe: <input type="text" name="mdp"><br><br>
					<input type="submit" value="Connexion">
				</form>
			<?php

		if(isset($_POST['login']) || isset($_POST['mdp'])) echo "L'un des champs (ou les 2) est vide !";
	}
	else{
		global $con;
		$req = $bdd->prepare('SELECT id_u, mail, mdp FROM utilisateur WHERE mail = :mail AND mdp = :mdp');
		$req->execute(array(
		'mail' => $_POST['login'], 
		'mdp' => sha1($_POST['mdp'])
		));

		$resultat = $req->fetch();

		if(!$resultat){ 
			header('Location: login.php'); // a modifier (Rendre dynamique)
		} 
		else{ // Connexion réussi !
			session_start();
			$_SESSION['id'] = $resultat['id_u']; 
			header('Location: index.php');
		}
	}

?>
