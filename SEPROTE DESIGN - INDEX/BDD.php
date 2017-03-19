<?php

	require 'identifiant.php';

	try{
		$bdd = new PDO('pgsql:host=localhost;dbname=seprote', $user, $pass); // Plusieurs choses à modifier !! 
	}
	catch (PDOExeption $e) {
    		die($e->getMessage());
	}

?>
