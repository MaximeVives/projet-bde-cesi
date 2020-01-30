<?php session_start();?>
<!doctype html>
<html lang="fr">
<head>
	<title>boutique</title>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.js"></script>-->
	<?php
	include('html/header.php');
	?>
</head>
<body>
	<?php
		$pageName = "Boutique";
	
		if(Auth::check()){
			$id = Auth::user()->id;
			
			include('html/top-accueil-page.php');
			include('html/nav-bar.php');
			include('html/code-couleur.php');

			$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root');
			/*dd($bdd);*/
			$reponse = $bdd->prepare("CALL ListeProduitsDESC();");
			$reponse->execute();
			$i=0;
			while($test = $reponse->fetch()){
				$url[$i]=$test['URL_photo'];
				$i = $i+1;
			}
		?>

		<main>
			<section id="caroussel">	
				<div id="slider">
					<figure>
						<img src="image/product/<?php echo($url[0])?>">
						<img src="image/product/<?php echo($url[1])?>">
						<img src="image/product/<?php echo($url[2])?>">
					</figure>
				</div>
			</section>

			<section class="tri">
				<!--A DEVELOPPER-->
			</section>
			<section class="produits">
			<?php
				$reponse = $bdd->prepare("CALL ListeProduits();");
				$reponse->execute();
				while($donnees = $reponse->fetch()){

					echo '<div class="card">
				<div class="top-section">
					<img id="image-container" src="image/product/'.$donnees['URL_photo'].'" alt="main-img">
					<div class="price">€ '.$donnees['Prix_Produit'].'</div>
				</div>
				<div class="product-info">
					<div class="name">'.$donnees['Nom_Produit'].'</div>
					<div class="description">'.$donnees['Description_Produit'].'</div>
					<div id="id_user" style="display:none">'.$id.'</div>
					<a href="" id="'.$donnees['ID_Produit'].'" class="btn-cart">Ajouter au Panier</a>
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
			$(".product-info").children("a").click(function(e){
				e.preventDefault();
				$idObj = $(this).attr("id");
				$idUser = $(this).siblings("#id_user").text();
				$idAction = 0; /*0 = Ajouter au panier | 1 = suppresion | 2 = Valider commande*/
				$.ajax({
					url: '/send-data',
					type: 'GET',
					data: { id_objet: $idObj, id_user: $idUser, id_action: $idAction },

					dataType : 'html',
					success : function(code_html, statut){
					   alert('Produit ajouté au panier');
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
		$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root');
			/*dd($bdd);*/
			$reponse = $bdd->prepare("CALL ListeProduitsDESC();");
			$reponse->execute();
			$i=0;
			while($test = $reponse->fetch()){
				$url[$i]=$test['URL_photo'];
				$i = $i+1;
			}
		?>
	<main>
			<section id="caroussel">	
				<div id="slider">
					<figure>
						<img src="image/product/<?php echo($url[0])?>">
						<img src="image/product/<?php echo($url[1])?>">
						<img src="image/product/<?php echo($url[2])?>">
					</figure>
				</div>
			</section>

			<section class="tri">
				<!--A DEVELOPPER-->
			</section>
			<section class="produits">
		
			<?php 
				$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root');
				/*dd($bdd);*/
				$reponse = $bdd->prepare("CALL ListeProduits();");
				$reponse->execute();

				while($donnees = $reponse->fetch()){
						echo '<div class="card">
				<div class="top-section">
					<img id="image-container" src="image/product/'.$donnees['URL_photo'].'" alt="main-img">
					<div class="price">€ '.$donnees['Prix_Produit'].'</div>
				</div>
				<div class="product-info">
					<div class="name">'.$donnees['Nom_Produit'].'</div>
					<div class="description">'.$donnees['Description_Produit'].'</div>
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
