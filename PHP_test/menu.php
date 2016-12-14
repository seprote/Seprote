<div id="menuBar">
		<ul>
			<li><a class="itemName" href="index.php">Acceuil</a></li>
			<?php if($_SESSION['role'] < 3){ ?>
				<li><a class="itemName" href="#">Gestion d'heures</a></li>
				<li><a class="itemName" href="#">Modification du PPN</a></li>
				<li><a class="itemName" href="gestion_compte.php">Gestion de professeur</a></li>
			<?php } ?>
			<li><a class="itemName" href="logout.php">Déconnexion</a></li>
		</ul>
</div>
