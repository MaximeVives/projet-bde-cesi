<!doctype html>
<?php 	if(Auth::user()->id_statut==1){
		?>
		<html lang="fr">
		<head>
			<title>Administrateur - Evenement</title>
			<?php
			include('html/header.php');
			?>
		</head>
		<body>
			<?php
			$pageName = "Administrateur - Evénement";
			include('html/top-accueil-page.php');
			include('html/nav-bar.php');
			include('html/code-couleur.php');

			?>
			<form method="post" name="delete">
				 {{ csrf_field() }}
				<label>ID de l'evenement</label><input type="text" name="ID_Evenement_D">
				<input type="submit" value="Supprimer">
			</form>
			<?php
			$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
			$del = $bdd->prepare("CALL DelActivite(:P_ID_D)")or die('La requete n\'a pas aboutie');
			$del->bindParam(':P_ID_D', $_POST['ID_Evenement_D']);
			$del ->execute();
			$del->closeCursor();
			?>

			<form method="post" name="add">
				 {{ csrf_field() }}
				<label>Nom de l'activite</label><input type="text" name="Nom_Activite">
				<label>Description de l'activite</label><input type="text" name="Desc_activite">
				<label>URL de l'activite</label><input type="text" name="URL_Activite">
				<label>Date de l'activite (aaaa-mm-jj)</label><input type="text" name="Date_Activite">
				<label>Prix de l'activite</label><input type="text" name="Prix_Activite">
				<label>Recurrence (0:ponctuel/1:Recurrent)</label><input type="text" name="Recurrence_Activite">

				<input type="submit" value="Ajouter">
			</form>
			<?php

			$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');

			$new = $bdd->prepare("CALL AjoutActivite(:P_Nom, :P_Description, :P_URL, :P_Date, :P_Prix, :P_Recurrence)");
			$new->bindParam(':P_Nom', $_POST['Nom_Activite']);
			$new->bindParam(':P_Description', $_POST['Desc_activite']);
			$new->bindParam(':P_URL', $_POST['URL_Activite']);
			$new->bindParam(':P_Date', $_POST['Date_Activite']);
			$new->bindParam(':P_Prix', $_POST['Prix_Activite']);
			$new->bindParam(':P_Recurrence', $_POST['Recurrence_Activite']);

			$new->execute();

			$new->closeCursor();
			 ?>

			 <form method="post" name="UpdateName">
 				 {{ csrf_field() }}
 				<label>ID de l'activite</label><input type="text" name="ID_Activite_U_N">
 				<label>Nom de l'activite</label><input type="text" name="Nom_Activite_U_N">
 				<input type="submit" value="Modifier le nom">
 			</form>
 			<?php
			$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
 			$upN = $bdd->prepare("CALL UpdateNomActivite (:P_ID_U_N, :P_Nom_U_N)");
			$upN->bindParam(':P_ID_U_N', $_POST['ID_Activite_U_N']);
 			$upN->bindParam(':P_Nom_U_N', $_POST['Nom_Activite_U_N']);
 			$upN->execute();
 			$upN->closeCursor();
 			 ?>

			 <form method="post" name="UpdateDescription">
				 {{ csrf_field() }}
				<label>ID de l'activite</label><input type="text" name="ID_Activite_U_D">
				<label>Description de l'activite</label><input type="text" name="Description_Activite_U_D">
				<input type="submit" value="Modifier la description">
			</form>
			<?php
			$bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
			$upD = $bdd->prepare("CALL UpdateDescActivite (:P_ID_U_D, :P_Desc_U_D)");
			$upD->bindParam(':P_ID_U_D', $_POST['ID_Activite_U_D']);
			$upD->bindParam(':P_Desc_U_D', $_POST['Description_Activite_U_D']);
			$upD->execute();
			$upD->closeCursor();
			 ?>

			 <form method="post" name="UpdateURL">
			  {{ csrf_field() }}
			  <label>ID de l'activite</label><input type="text" name="ID_Activite_U_U">
			  <label>URL du l'activite</label><input type="text" name="URL_Activite_U_U">
			  <input type="submit" value="Modifier l'URL">
			 </form>
			 <?php
			 $bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
			 $upU = $bdd->prepare("CALL UpdateUrlActivite(:P_ID_U_U, :P_URL_U_U)");
			 $upU->bindParam(':P_ID_U_U', $_POST['ID_Activite_U_U']);
			 $upU->bindParam(':P_URL_U_U', $_POST['URL_Activite_U_U']);
			 $upU->execute();
			 $upU->closeCursor();
			 ?>

			 <form method="post" name="UpdateDate">
			  {{ csrf_field() }}
			  <label>ID de l'activite</label><input type="text" name="ID_Activite_U_D">
			  <label>Date de l'activite (aaaa-mm-jj)</label><input type="text" name="Date_Activite_U_D">
			  <input type="submit" value="Modifier la date">
			 </form>
			 <?php
			 $bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
			 $upD = $bdd->prepare("CALL UpdateDateActivite (:P_ID_U_D, :P_Date_U_D)");
			 $upD->bindParam(':P_ID_U_D', $_POST['ID_Activite_U_D']);
			 $upD->bindParam(':P_Date_U_D', $_POST['Date_Activite_U_D']);
			 $upD->execute();
			 $upD->closeCursor();
			 ?>

			 <form method="post" name="UpdatePrix">
			  {{ csrf_field() }}
			  <label>ID de l'activite</label><input type="text" name="ID_Activite_U_P">
			  <label>Prix de l'activite</label><input type="text" name="Prix_Activite_U_P">
			  <input type="submit" value="Modifier le prix">
			 </form>
			 <?php
			 $bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
			 $upP = $bdd->prepare("CALL UpdatePrixActivite (:P_ID_U_P, :P_Prix_U_P)");
			 $upP->bindParam(':P_ID_U_P', $_POST['ID_Activite_U_P']);
			 $upP->bindParam(':P_Prix_U_P', $_POST['Prix_Activite_U_P']);
			 $upP->execute();
			 $upP->closeCursor();
			 ?>

			 <form method="post" name="ListeParticipants">
			  {{ csrf_field() }}
			  <label>ID de l'activite</label><input type="text" name="ID_Activite_L">
			  <input type="submit" value="Obtenir la liste">
			 </form>
			 <?php
			 $bdd = new PDO('mysql:host=localhost;dbname=bde-cesi;charset=utf8', 'root', 'root')or die('pb de connexion');
			 $list = $bdd->prepare("CALL Participants (:P_ID_L)");
			 $list->bindParam(':P_ID_L', $_POST['ID_Activite_L']);
			 $list->execute();


			while ($donnees = $list->fetch()) {
				echo '<li>'.$donnees['Nom_Activite'].": ".$donnees['name'];
			}
			 $list->closeCursor();

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
}?>
