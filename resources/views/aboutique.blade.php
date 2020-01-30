<!doctype html>
<?php
if(Auth::user()->id_statut==1){
		?>
		<html lang="fr">
		<head>
			<title>Administrateur - Boutique</title>
			<?php
			include('html/header.php');
			?>
		</head>
		<body>
			<?php
			$pageName = "Administrateur - Boutique";
			include('html/top-accueil-page.php');
			include('html/nav-bar.php');
			include('html/code-couleur.php');

			?>
			<form method="post" name="delete">
				 {{ csrf_field() }}
				<label>ID du produit</label><input type="text" name="ID_Produit_D">
				<input type="submit" value="Supprimer">
			</form>
			<?php
			$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
			$del = $bdd->prepare("CALL DelProduit(:P_ID_D)")or die('La requete n\'a pas aboutie');
			$del->bindParam(':P_ID_D', $_POST['ID_Produit_D']);
			$del ->execute();
			$del->closeCursor();

			?>
			<form method="post" name="add">
				 {{ csrf_field() }}
				<!-- <label>ID du produit</label><input type="text" name="ID_Produit"> -->
				<label>Nom du produit</label><input type="text" name="Nom_Produit">
				<label>Description du produit</label><input type="text" name="Desc_Produit">
				<label>Prix du produit</label><input type="text" name="Prix_Produit">
				<label>Catégorie du produit</label><input type="text" name="Categorie_Produit">
				<label>Quantité</label><input type="text" name="Quantite_Produit">
				<label>URL de la photo</label><input type="text" name="URL_Produit">
				<input type="submit" value="Ajouter">
			</form>
			<?php

			$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');

			$new = $bdd->prepare("CALL AjoutProduit(:P_nom, :P_Description, :P_Prix, :P_categorie, :P_quantite , :P_url)");
			$new->bindParam(':P_nom', $_POST['Nom_Produit']);
			$new->bindParam(':P_Description', $_POST['Desc_Produit']);
			$new->bindParam(':P_Prix', $_POST['Prix_Produit']);
			$new->bindParam(':P_categorie', $_POST['Categorie_Produit']);
			$new->bindParam(':P_quantite', $_POST['Quantite_Produit']);
			$new->bindParam(':P_url', $_POST['URL_Produit']);

			$new->execute();

			$new->closeCursor();
			 ?>

			 <form method="post" name="UpdateName">
 				 {{ csrf_field() }}
 				<label>ID du produit</label><input type="text" name="ID_Produit_U_N">
 				<label>Nom du produit</label><input type="text" name="Nom_Produit_U_N">
 				<input type="submit" value="Modifier le nom">
 			</form>
 			<?php
			$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');

 			$upN = $bdd->prepare("CALL UpdateNomProduit (:P_nom_U_N,:P_ID_U_N)");
			$upN->bindParam(':P_ID_U_N', $_POST['ID_Produit_U_N']);
 			$upN->bindParam(':P_nom_U_N', $_POST['Nom_Produit_U_N']);
 			$upN->execute()or die('erreur');
 			$upN->closeCursor();
 			 ?>

			 <form method="post" name="UpdateDescription">
 				 {{ csrf_field() }}
 				<label>ID du produit</label><input type="text" name="ID_Produit_U_D">
 				<label>Description du produit</label><input type="text" name="Description_Produit_U_D">
 				<input type="submit" value="Modifier la description">
 			</form>
 			<?php
			$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
 			$upD = $bdd->prepare("CALL UpdateDescProduit (:P_Desc_U_D,:P_ID_U_D)");
			$upD->bindParam(':P_ID_U_D', $_POST['ID_Produit_U_D']);
 			$upD->bindParam(':P_Desc_U_D', $_POST['Description_Produit_U_D']);
 			$upD->execute()or die('erreur');
 			$upD->closeCursor();
 			 ?>

			 <form method="post" name="UpdatePrix">
			 	{{ csrf_field() }}
			  <label>ID du produit</label><input type="text" name="ID_Produit_U_P">
			  <label>Prix du produit</label><input type="text" name="Prix_Produit_U_P">
			  <input type="submit" value="Modifier le prix">
			 </form>
			 <?php
			 $bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
			 $upP = $bdd->prepare("CALL UpdatePrixProduit (:P_Prix_U_P,:P_ID_U_P)");
			 $upP->bindParam(':P_ID_U_P', $_POST['ID_Produit_U_P']);
			 $upP->bindParam(':P_Prix_U_P', $_POST['Prix_Produit_U_P']);
			 $upP->execute()or die('erreur');
			 $upP->closeCursor();
			 ?>

			 <form method="post" name="UpdateCategorie">
			 	{{ csrf_field() }}
			  <label>ID du produit</label><input type="text" name="ID_Produit_U_C">
			  <label>Categorie du produit</label><input type="text" name="Categorie_Produit_U_C">
			  <input type="submit" value="Modifier la categorie">
			 </form>
			 <?php
			 $bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
			 $upC = $bdd->prepare("CALL UpdateCategorieProduit (:P_Categorie_U_C,:P_ID_U_C)");
			 $upC->bindParam(':P_ID_U_C', $_POST['ID_Produit_U_C']);
			 $upC->bindParam(':P_Categorie_U_C', $_POST['Categorie_Produit_U_C']);
			 $upC->execute()or die('erreur');
			 $upC->closeCursor();
			 ?>

			 <form method="post" name="UpdateQuantite">
			 	{{ csrf_field() }}
			  <label>ID du produit</label><input type="text" name="ID_Produit_U_Q">
			  <label>Quantite du produit</label><input type="text" name="Quantite_Produit_U_Q">
			  <input type="submit" value="Modifier la Quantite">
			 </form>
			 <?php
			 $bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
			 $upQ = $bdd->prepare("CALL UpdateQuantiteProduit (:P_Quantite_U_Q, :P_ID_U_Q)");
			 $upQ->bindParam(':P_ID_U_Q', $_POST['ID_Produit_U_Q']);
			 $upQ->bindParam(':P_Quantite_U_Q', $_POST['Quantite_Produit_U_Q']);
			 $upQ->execute()or die('erreur');
			 $upQ->closeCursor();
			 ?>

			 <form method="post" name="UpdateURL">
			 	{{ csrf_field() }}
			  <label>ID du produit</label><input type="text" name="ID_Produit_U_U">
			  <label>URL du produit</label><input type="text" name="URL_Produit_U_U">
			  <input type="submit" value="Modifier l'URL">
			 </form>
			 <?php
			 $bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
			 $upU = $bdd->prepare("CALL UpdateUrlProduit(:P_URL_U_U, :P_ID_U_U)");
			 $upU->bindParam(':P_ID_U_U', $_POST['ID_Produit_U_U']);
			 $upU->bindParam(':P_URL_U_U', $_POST['URL_Produit_U_U']);
			 $upU->execute()or die('erreur');
			 $upU->closeCursor();
			 ?>
			<main></main>
			<?php
			include('html/footer.php');
			?>
		</body>
		</html>
<?php
	}
else{
	header('Location: /');
  	exit();
}
?>
