<?php 	

session_start(); 
require_once "BDD.php";

include('header.php');
?>
		<div id="header">
			<div class="wrap">
			<img class="seprote" src="src/seprote.png" alt="Seprote"/>
			</div>
			<img class="iutCB" src="src/iutCB.png" alt="IUT Calais Boulogne"/>
		</div>
<?php include('menu.php');?>

		<div id="main">
			<div class="mainWrap">
				<div id="content">
					<h2> Gestion des programmes </h2>
					<input type="button" id="test" value="Modifier un programme existant">
					<input type="button" id="test2" value="Créer un nouveau programme">
					<div id="modify_prog">
						
					</div>
					<div id="create_prog">
						<form>		
							<h3>Création d'un nouveau programme</h3>
							<label for="nom">Nom du programme:</label>
							<input type="text" name="nom">
							<br>
							<label for="ppn">PPN:</label>
							<input type="checkbox" name="ppn"><br>
							<label for="formation">Formation concernée:</label>
							<select name="formation">
							</select> ou
							<a id="create_for" style="cursor:pointer;">créer une nouvelle formation</a>
							<br>
							<label for="annee">Année concernée</label>
							<select name="annee">
							</select>

						</form>
					</div>
				</div>
			</div>
		</div>

		<script>
			$( document ).ready(function() {

				$("#modify_prog").hide();
				$("#create_prog").hide();

				$( "#test" ).click(function() {
					$( "#modify_prog" ).show( "slow", function() {
			
					});
					$("#create_prog").hide();
				});

				$( "#test2" ).click(function() {
					$( "#create_prog" ).show( "slow", function() {
					   	
					});
					$("#modify_prog").hide();
				});

				$( "#create_for" ).click(function() {
					bite=$( "#dialog-form" ).dialog({
					      autoOpen: false,
					      height: 400,
					      width: 350,
					      modal: true,
					     
					      close: function() {
						form[ 0 ].reset();
						allFields.removeClass( "ui-state-error" );
					     }
					});
			            bite.dialog("open");
				});
			});
		</script>


<?php include('footer.php'); ?>

