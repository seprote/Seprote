<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Seprote IUT Calais Boulogne</title>
	
	<link href='https://fonts.googleapis.com/css?family=Product+Sans:400,400i,700,700i' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style.css" type="text/css">
	
	<!-- loading google chart library -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>

	<script src="script.js"></script>
</head>
<body>
	<?php
		if(!empty($_SESSION['id'])){ // On est connecter
	?>
	<div id="header">
		<div class="wrap">
		<img class="seprote" src="src/seprote.png" alt="Seprote"/>
		</div>
		<img class="iutCB" src="src/iutCB.png" alt="IUT Calais Boulogne"/>
	</div>
	
	<div id="menuBar">
		<ul>
			<li><a class="itemName" href="#">Acceuil</a></li>
			<?php if($_SESSION['role'] < 3){ ?>
				<li><a class="itemName" href="#">Gestion d'heures</a></li>
				<li><a class="itemName" href="#">Modification du PPN</a></li>
				<li><a class="itemName" href="gestion_compte.php">Gestion de professeur</a></li>
			<?php } ?>
			<li><a class="itemName" href="logout.php">Déconnexion</a></li>
		</ul>
	</div>
	
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
					<div class="calendar">
						<table>
						<div class="Year"> 
						  <ul>
							<li class="prev">&#10094;</li>
							<li class="next">&#10095;</li>
							<li>
							  <span>Année 2016</span>
							</li>
						  </ul>
						</div>

						<ul class="Months">
						  <li>Janvier</li>
						  <li>Fevrier</li>
						  <li>Mars</li>
						  <li>Avril</li>
						  <li>Mai</li>
						  <li>Juin</li>
						  <li>Juillet</li>
						  <li>Août</li>
						  <li>Septembre</li>
						  <li>Octobre</li>
						  <li>Novembre</li>
						  <li>Decembre</li>
						</ul>

						<ul class="Week"> 
						  <li>1</li>
						  <li>2</li>
						  <li>3</li>
						  <li>4</li>
						  <li>5</li>
						  <li>6</li>
						  <li>7</li>
						  <li>8</li>
						  <li>9</li>
						  <li><span class="active">10</span></li>
						  <li>11</li>
						  <li>12</li>
						  <li>13</li>
						  <li>14</li>
						  <li>15</li>
						  <li>16</li>
						  <li>17</li>
						  <li>18</li>
						  <li>19</li>
						  <li>20</li>
						  <li>21</li>
						  <li>22</li>
						  <li>23</li>
						  <li>24</li>
						  <li>25</li>
						  <li>26</li>
						  <li>27</li>
						  <li>28</li>
						  <li>29</li>
						  <li>30</li>
						  <li>31</li>
						  <li>32</li>
						  <li>33</li>
						  <li>34</li>
						  <li>35</li>
						  <li>36</li>
						  <li>37</li>
						  <li>38</li>
						  <li>39</li>
						  <li>40</li>
						  <li>41</li>
						  <li>42</li>
						  <li>43</li>
						  <li>44</li>
						  <li>45</li>
						  <li>46</li>
						  <li>47</li>
						  <li>48</li>
						  <li>49</li>
						  <li>50</li>
						  <li>51</li>
						  <li>52</li>
						  <li>53</li>
						</ul>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
	
	else header('Location: login.php');
	?>
	<footer>
		<a class="aPropos" href="" onclick="alert('projet par:\nEl Yazid Benbella\nClouet Anthony\nLenglet Anthony\nDoyer Nicolas')">A propos</a>
		<span class="separator">|</span>
		<span>©Seprote 2016</span>
	</footer>
</body>
</html>
