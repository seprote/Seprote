<?php

	require_once "BDD.php";
	

	$req  = $bdd->prepare("SELECT * FROM volume_horaire WHERE id_utilisateur = :id AND id_module = :mod");
	$req->execute(array('id' => $_POST['prof'],
	'mod' => $_POST['mod']
	));
	$res = $req->fetch();
	echo $res['cm'].";".$res['td'].";".$res['tp'];
?> 
