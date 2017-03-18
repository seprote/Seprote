<?php
session_start();
require_once('BDD.php');

$content = "<option value=''></option>";

if(isset($_POST['nom_for']) && isset($_POST['id_a'])){

			$req = $bdd->prepare("INSERT INTO formation(nom_f) VALUES(:nom_for)");
			$req->execute(array("nom_for" => $_POST['nom_for']));


			$id_for = $bdd->lastInsertId();
			$req = $bdd->prepare("INSERT INTO for_annee VALUES(:id_for,:id_annee)");
			$req->execute(array("id_for" => $id_for, "id_annee" => $_POST['id_a']));

}

	echo("<option value='". $id_for ."'>". $_POST["nom_for"]."</option>");
?>