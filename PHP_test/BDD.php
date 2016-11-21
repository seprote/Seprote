<?php

	require 'identifiant.php';

	try{
		$bdd = new PDO('pgsql:host=10.10.28.106;dbname=seprote', $user, $pass); // Plusieurs choses à modifier !! 
	}
	catch (PDOExeption $e) {
    	die($e->getMessage());
	}

?>
