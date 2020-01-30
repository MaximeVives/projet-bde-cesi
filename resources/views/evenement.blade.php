<!doctype html>
<html lang="fr">
<head>
	<title>Evénements</title>
	<?php
	include('html/header.php');
	?>
</head>
<body>
	<?php
	$pageName = "Evénements";
	/*$id = Auth::user()->id;*/
	if(Auth::check()){
		$id = Auth::user()->id;
	
	
	
		include('html/top-accueil-page.php');
		include('html/nav-bar.php');
		include('html/code-couleur.php');

		?>
		<main>
			<section class="produits">
				<?php 
					$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root');
					/*dd($bdd);*/
					$reponse = $bdd->prepare("CALL ListeActivite();");
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
							<div id="id_user" style="display:none">'.$id.'</div>
							<a href="" id="'.$donnees['ID_Activite'].'" class="btn-cart">Participer à l\'événement</a>
							<button><i class="fas fa-ban"></i> Signaler</button>
						</div>
					</div>';
					};


					$reponse->closeCursor();
				?>

			</section>
		</main>
		<?php
		include('html/footer.php');
		?>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
		<script langage="javascript">

			$(document).ready(function(){
				/*AJOUT EVENEMENT*/
				$(".product-info").children("a").click(function(e){
					e.preventDefault();
					$idEvent = $(this).attr("id");
					$idUser = $(this).siblings("#id_user").text();
					$idAction = 3; /*0 = Ajouter au panier | 1 = suppresion | 2 = Valider commande 3 = Ajout Event | 4 = Report*/
					$.ajax({
						url: '/send-data',
						type: 'GET',
						data: { id_event: $idEvent, id_user: $idUser, id_action: $idAction },

						dataType : 'html',
						success : function(code_html, statut){
						   alert('Votre participation à l\'activité a bien été retenu.');
					   },

					   error : function(resultat, statut, erreur){
							console.log("statut");
							console.log("erreur");

					   },

					   complete : function(resultat, statut){

					   }

					});

				});

				/*SIGNALER*/
				$(".product-info").children("button").click(function(e){
					e.preventDefault();
					$idEvent = $(this).siblings("a").attr("id");
					$idUser = $(this).siblings("#id_user").text();
					$idAction = 4; /*0 = Ajouter au panier | 1 = suppresion | 2 = Valider commande | 3 = Ajout Event | 4 = Report*/
					$.ajax({
						url: '/send-data',
						type: 'GET',
						data: { id_event: $idEvent, id_user: $idUser, id_action: $idAction },

						dataType : 'html',
						success : function(code_html, statut){
						   alert('Votre Signalement a bien été envoyé');
					   },

					   error : function(resultat, statut, erreur){
							console.log("statut");
							console.log("erreur");

					   },

					   complete : function(resultat, statut){

					   }

					});

				});

			});


		</script>
		<?php
	}
	else{
		include('html/top-accueil-page.php');
		include('html/nav-bar.php');
		include('html/code-couleur.php');
		?>
		<section class="produits">
			<?php 
				$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root');
				/*dd($bdd);*/
				$reponse = $bdd->prepare("CALL ListeActivite();");
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
					</div>
				</div>';
				};


				$reponse->closeCursor();
			?>
	
		</section>
	</main>
	<?php
	include('html/footer.php');
	
	}
	?>
	
</body>
</html>
