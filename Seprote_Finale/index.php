<?php
	session_start();
	
	include('header.php');
	
	if(!empty($_SESSION['id'])){ // On est connecter
	   include('menu.php'); 
?>
	
<div id="main">
    <div class="mainWrap">
        <h1 class="bonjour">Bonjour, <?= htmlspecialchars($_SESSION['nom']). " " . htmlspecialchars($_SESSION['prenom']) ?>.</h1>

        <div id="content">
            <div id="left">
                <div class="center">
                    <div id="chart"></div>
                    <div class="selection">
                        <button class="tabBtn">Tableau</button>
                        <button class="pieBtn">Circulaire</button>
                        <button class="barBtn">Barres</button>
                    </div>
                </div>
            </div>

            <div id="right">
                <div id="calendar">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="googlechart.js"></script>

<?php
    } else { header('Location: login.php'); }


	include('footer.php');
?>
