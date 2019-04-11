<?php include("form_inscription_bdd.php"); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Inscription</title>
	</head>

	<body>
		<div class="main">
			<div class="name">
				<h1>Inscription</h1>
			</div>
		
			<div>
		    	<ul>
					<li>Pour avoir votre <a href="https://codeofaninja.com/tools/find-instagram-user-id">User_id</a>.</li>
					<li>Pour avoir votre <a href="https://instagram.pixelunion.net/">Token</a>.</li>
					<li>Pour que cela fonctionne, il faut tout d'abord être connecté à Instagram.</li>
					<li><a href="index.php">Retour</a></li>
    			</ul>
			</div>	
				
			<form method="POST" action="" class="form">	
				<table>	
					<tr>
						<th colspan="2">Formulaire d'inscription</th>
					</tr>
					<tr>
						<td align="right">
							User_id :
						</td>
						<td>
							<input type="text" placeholder="Votre user_id" id="user_id" name="user_id"/>
						</td>
					</tr>
					<tr>
						<td align="right">
							Token :
						</td>
						<td>
							<input type="text" placeholder="Votre token" id="token" name="token"/>
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
							<input type="submit" name="forminscription" value="Valider mon inscription" />
						</td>
					</tr>

				</table>
			</form>	
			
		</div>
	</body>
</html>
