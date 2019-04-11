<?php
session_start();

// Connexion à la base de données
include("identifiants.php");

?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Super Test</title>
	</head>

	
	<body>

		<div class="main">
			<div class="name">
				<h1>Super Test</h1>
			</div>


		    <?php if(isset($_SESSION['id_util'])){	?>
		    	<p>Vous êtes connecté !!!</p>
		    	<a href="deconnexion.php">Deconnexion</a>

		    <?php 

		    	include("mise_a_jour_bdd.php");


		    	// On récupère tout le contenu de la table 
				$reponse = $bdd->prepare("SELECT * FROM media WHERE id_util = ?");
				$reponse->execute(array($_SESSION['id_util'])); 
				?>
				<div>Liste des images de l'utilisateur :</div>
				<div>
				<?php
				while ($donnees = $reponse->fetch()){
					if($donnees['type'] == "image"){
						?>
						<img src="<?php echo $donnees['lien']; ?>" width="200" height="200">
						<?php
					}
				}
				?>
				</div>
				<div>Liste des videos de l'utilisateur :</div>
				<div>
				<?php

				$reponse->execute(array($_SESSION['id_util'])); 
				while ($donnees = $reponse->fetch()){
					if($donnees['type'] == "video"){
						?>
						<iframe width="392" height="220" src="<?php echo $donnees['lien']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						<?php
					}
				}
				?>
				</div>
				<?php
				$reponse->closeCursor(); // Termine le traitement de la requête
		    ?>

		    <?php } else {	?>
		    	<p>Vous n'êtes pas connecté ...</p>
		    	<a href="form_inscription.php">Inscription</a>
		    	<a href="connexion.php">Connexion</a>
		    <?php } ?>



		</div>

	</body>
</html>





