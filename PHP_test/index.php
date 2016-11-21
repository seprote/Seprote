<?php

	session_start();


	if(!empty($_SESSION['id'])){ // On est connecter
		echo "connecter !";
	}
	else header('Location: error404.php');
?>
