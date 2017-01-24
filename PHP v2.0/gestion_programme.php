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

					<!--           FORMULAIRE CREATION DE PROGRAMME             -->

					<div id="create_prog"> 
						<form>		
							
							<!-- ETAPE NUMERO 1 -->

							<div id="1">
								<h3>Paramètres principaux</h3>
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
								</select> ou
								<a id="create_annee" style="cursor:pointer;">créer une nouvelle année </a>
								<br>
							</div>

							<!-- ETAPE NUMERO 2 -->

							<div id="2">
								<h3>Sélection des semestre</h3>
								<label for="sem1">Semestre 1: </label>
								<input type="text" name="sem1">
								<label for="sem1">Semestre 2: </label>
								<input type="text" name="sem2">
								<h3> SEMESTRE 1 </h3>
								<label for="nb_p1">Nombre de périodes</label>
								<select name="nb_p1">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
								</select>
								<h3> SEMESTRE 2 </h3>
								<label for="nb_p2">Nombre de périodes</label>
								<select name="nb_p2">
								 	<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
								</select>
							</div>
							<!-- ETAPE NUMERO 3 -->

							<div id="3">
								
								
							</div>



							<input type=button class="ui-button ui-widget ui-corner-all" id="precedent" value="Etape précédente">
							<input type=button class="ui-button ui-widget ui-corner-all" id="suivant" value="Etape suivante">
						</form>
                            
							<!--		BOITE DE DIALOGUE CREATION FORMATION		-->

                           <div id="dialog_for" title="Création nouvelle formation">  
                              <p class="validateTips">Tous les champs sont nécessaires.</p>
                              <form name="send_for" method="POST" action="traitement.php">
                                <fieldset>
                                  <label for="nom_for">Nom de la formation</label>
                                  <input type="nom_for" name="date_d" id="dat_deb"  class="text ui-widget-content ui-corner-all">
                                  <input type="hidden" name="type" value="create_for">
                                </fieldset>
                              </form>
                            </div>


                            <!--		BOITE DE DIALOGUE CREATION ANNEE		-->


                           
  							<div id="dialog_annee" title="Création nouvelle année">  
                              <p class="validateTips">Tous les champs sont nécessaires.</p>
                              <form name="send_annee" method="POST" action="traitement.php">
                                <fieldset>
                                  <label for="date_d">Date de début</label>
                                  <input type="text" name="date_d" id="dat_deb"  class="text ui-widget-content ui-corner-all">
                                  <label for="date_fin">Date de fin</label>
                                  <input type="text" name="date_fin" id="dat_deb"  class="text ui-widget-content ui-corner-all">
                                  <input type="hidden" name="type" value="create_annee">
                                </fieldset>
                              </form>
                            </div>
					</div>
				</div>
			</div>
		</div>

		<script>

		  /*********************** AVANT l'AFFICHAGE DE LA PAGE *************************/

			$(document).ready(function() {

				nb_p1=$("select[name='nb_p1']").val();
				nb_p2=$("select[name='nb_p2']").val();

				etape=1;
				$("#modify_prog").hide();
				$("#create_prog").hide();
                $("#dialog_for").hide();
                $("#dialog_annee").hide();
                $("#2").hide();


				$( "#test" ).click(function	() {
					$( "#modify_prog" ).show( "slow", function() {
			
					});
					$("#create_prog").hide();
				});

				$( "#test2" ).click(function() {
					$( "#create_prog" ).show( "slow", function() {
					   	
					});
					$("#modify_prog").hide();
				});

				$("#suivant").click(function(){
					if(etape < 3){
						$("#" + etape).hide();
						etape++;
						$("#" + etape).show();
					}
				});

				$("#precedent").click(function(){
					
					if(etape > 1){
						$("#" + etape).hide();
						etape--;
						$("#" + etape).show();
					}
				});

				$("select[name='nb_p1").change(function(){

					nb_p1=$("select[name='nb_p1']").val();

				});

				$("select[name='nb_p2").change(function(){

					nb_p1=$("select[name='nb_p2']").val();

				});

            });
            
            /*********************** FORMULAIRE CREATION FORMATION *************************/

              $("#create_for").click(function(){
                    $( "#dialog_for" ).dialog({

                  modal: true,
                  height: 400,
                  width: 350,

                  buttons: {

                    "Créer": function() {

                      $("form[name='send_for']").submit();
                      

                    },

                    "Annuler": function() {

                      $( this ).dialog( "close" );

                    }

                  }

                });
            });

             /*********************** FORMULAIRE CREATION ANNEE *************************/

              $("#create_annee").click(function(){
                    $( "#dialog_annee" ).dialog({

                  modal: true,
                  height: 400,
                  width: 350,

                  buttons: {

                    "Créer": function() {

                      $("form[name='send_annee']").submit();
                      

                    },

                    "Annuler": function() {

                      $( this ).dialog( "close" );

                    }

                  }

                });
            });



		</script>


<?php include('footer.php'); ?>

