<!doctype html>
<html lang="fr">
<head>
	<title>Panier</title>
	<?php
	include('html/header.php');
	?>
	<link rel="stylesheet" href="css/panier.css">
</head>
<body>
	<?php
		$pageName = "Panier";
		$id = Auth::user()->id;
		include('html/top-accueil-page.php');
		include('html/nav-bar.php');
		include('html/code-couleur.php');

		$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root');
		/*dd($bdd);*/
		$reponse = $bdd->prepare("CALL ListePanier(:P_user);");
		$reponse->execute(array(":P_user" => $id));
		
		
	?>
	<main>
		
			<?php
			$total=0;
			if(empty($donnees = $reponse->fetch())){
				echo "Vous n'avez rien dans le panier";
			}
			
			else{
				?>
		<section class="produits">
			<?php
				do {
					echo '<div class="card">
							<div class="top-section">
								<img id="image-container" src="image/product/'.$donnees['URL_photo'].'" alt="main-img">
								<div class="price">€ '.$donnees['Prix_Produit'].'</div>
							</div>
							<div class="product-info">
								<div class="name">'.$donnees['Nom_Produit'].'</div>
								<div class="description"></div>
								<div class="id_user" style="display:none">'.$id.'</div>
								<a href="" id="'.$donnees['ID_Produit'].'" class="btn-cart">Supprimer du panier</a>
							</div>
						</div>';
					$total = $total + $donnees['Prix_Produit'];
				} while($donnees = $reponse->fetch());
				?>
		</section>
		<?php echo('<div id="sub-total"><p>Le Sous-Total est de : <span id="value">'.$total.'</span><span>€</span></p></div>');
				
			
			$reponse->closeCursor();
			?>
		<form action="GET">
			<a id="validate" href="#" onClick="return false">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				VALIDER LA COMMANDE</a>
		</form>
		<?php } ?>
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
					$idUser = $(this).siblings(".id_user").text();
					$idAction = 1; /*1 = suppresion | 2 = Valider commande*/
					$.ajax({
						url: '/send-data',
						type: 'GET',
						data: { id_objet: $idObj, id_user: $idUser, id_action: $idAction },

						dataType : 'html',
						success : function(code_html, statut){
						   alert('Produit Supprimé du panier');
							location.reload();
					   },

					   error : function(resultat, statut, erreur){
							console.log(statut);
							console.log(erreur);

					   },

					   complete : function(resultat, statut){

					   }

					});

				});
			
			$("#validate").click(function(e){
					e.preventDefault();
					$idAction = 2; /*1 = suppresion | 2 = Valider commande*/
				
					/*$link = $(".product-info").children("a");
					$idObj = $($link).attr("id");
					$idUser = $($link).siblings("#id_user").text();*/
				
				
					$idUser = [];
					
					$('.id_user').each(function (){
						$idUser.push($(this).html());
						console.log($idUser);
					});
				
					$idObj = [];
					$('.id_user').each(function (){
						
						$idObj.push($(this).siblings("a").attr("id"));
						console.log($idObj)
					});
				
					$somme = $("#value").text();

					$idUser = $idUser.toString();
					$idObj = $idObj.toString();
					// console.log($idObj);
					// $.ajax({
					// 	url: '/send-data',
					// 	type: 'GET',
					// 	data: { id_objet: $idObj, id_user: $idUser, id_action: $idAction, somme: $somme },

					// 	dataType : 'html',
					// 	success : function(code_html, statut){
					// 	   alert('La commande a été validée');
					// 		location.reload();
					//    },

					//    error : function(resultat, statut, erreur){
					// 		console.log(statut);
					// 		console.log(erreur);

					//    },

					//    complete : function(resultat, statut){

					//    }

					// });

				});
			});
	
	</script>
	
	
</body>
</html>
