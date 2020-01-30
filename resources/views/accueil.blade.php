<?php session_start();?>
<!doctype html>
<html lang="fr">
<head>
	<title>Accueil</title>
	<?php
	include('html/header.php');
	?>
</head>
<body>
	<?php
	
	$pageName = "Accueil";
	include('html/top-accueil-page.php');
	include('html/nav-bar.php');
	include('html/code-couleur.php');
	
	$centre = array("", "Aix-en-provence", "Alger", "Angoulême", "Arras", "Bordeaux", "Brest", "Caen", "Dijon", "Dunkerque", "Grenoble", "La Rochelle", "Le Mans", "Lilles", "Lyon", "Montpellier", "Nancy",
				   "Nantes", "Nice", "Orléans", "Paris Nanterre", "Pau", "Reims", "Rouen", "Saint-Nazaire", "Strasbourg", "Toulouse");
	if (Auth::check()) {
		$campus = Auth::user()->id_centre;
		$campus_user = $centre[$campus];
		$data = file_get_contents('https://api.meteo-concept.com/api/location/cities?token=67d7fdc95751745d4a9a7f5f99cf25b77634c00fe9c7a3b02092f9dc770c2862&search='.$campus_user);

			if ($data !== false) {
				$decoded = json_decode($data);
				$insee = $decoded->cities[0]->insee; /*Récupération de la ville du campus*/
				$data = file_get_contents('https://api.meteo-concept.com/api/forecast/daily/0?token=67d7fdc95751745d4a9a7f5f99cf25b77634c00fe9c7a3b02092f9dc770c2862&insee='.$insee);
				$decoded = json_decode($data);
				$forecast = $decoded->forecast;
				$t_min = $forecast->tmin;
				$t_max = $forecast->tmax;
				$t_moy = ($t_min + $t_max)/2;
				$time = $forecast-> datetime;
				$date = date("H")+1;
	?>
	
	
	<main>		
		<div class="weather">
				<h2><?php 
				if($t_moy > 10){
					echo('<i class="fas fa-sun"></i> '.$campus_user);
					
				}
				else{
					echo('<i class="far fa-snowflake"></i> '.$campus_user);
				}
					
					
					?></h2>
				
				<p>Température Minimal à <?php echo($date."h") ?> : <?php echo($t_min) ?>°C</p>
				<p>Température Maximal à <?php echo($date."h") ?> : <?php echo($t_max) ?>°C</p>				
		</div>
		<?php
			}
		}
	?>
	<main>
		
		<h2 class="activite">A la Une des Activités :</h2>
		<section class="produits">
		<?php 
			$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root');
			/*dd($bdd);*/
			$reponse = $bdd->prepare("CALL ActiviteMois();");
			$reponse->execute();
			
			while($donnees = $reponse->fetch()){
				echo '<div class="card">
					<div class="top-section">
						<img id="image-container" src="image/activite/'.$donnees['URL_Photo'].'" alt="main-img">
						<div class="price">€ '.$donnees['Prix_activite'].'</div>
					</div>
					<div class="product-info">
						<div class="name">'.$donnees['Nom_Activite'].'</div>
						<div class="description">'.$donnees['Description_Activite'].'</div>
						<a class="btn-cart" href="#">Participer à l\'événement</a>
					</div>
				</div>';
			}
	?>
		</section>
		
	</main>
	<?php
	include('html/footer.php');
	?>
	<script type="text/javascript" src="https://cookiegenerator.eu/cookie.js?position=bottom&amp;
	skin=cookielaw1&amp;
	box_radius=0&amp;
	animation=shake&amp;
	delay=4&amp;
	bg_color=000000&amp;
	msg=Nous%20utilisons%20les%20cookies%20sur%20notre%20site%2C%20acceptez-vous%20leur%20utilisation%20%3F&amp;
	accept_text=J%27accepte&amp;
	accept_radius=10&amp;
	link_color=ffffff&amp;
	accept_background=0000ff"></script>
</body>
</html>
