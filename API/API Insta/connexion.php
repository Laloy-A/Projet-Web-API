<?php include("connexion_bdd.php"); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Connexion</title>
	</head>

	
	<body>

		<div class="main">
			<div class="name">
				<h1>Connexion</h1>
			</div>


		    <div>
		    	<ul>
					<li>Pour avoir votre <a href="https://instagram.pixelunion.net/" class="text_menu">Token</a>.</li>
					<li>Pour que cela fonctionne, il faut tout d'abord être connecté à Instagram.</li>
					<li><a href="index.php">Retour</a></li>
    			</ul>
			</div>

			<form method="POST" action="">
				<table>	
					<tr>
						<th colspan="2">Se connecter</th>
					</tr>
					<tr>
						<td align="right">
							Token :
						</td>
						<td>
							<input type="text" placeholder="Votre token" id="token" name="token" />
						</td>
					</tr>
					<tr>
						<td>
							<?php
							if(isset($erreur)) {
							   echo '<font color="blue">'.$erreur."</font>";
							}
							?>
						</td>
						<td>
							<input type="submit" name="formconnexion" value="Se connecter" />
						</td>
					</tr>
				</table>
			</form>


		</div>

	</body>
</html>





