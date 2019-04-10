<!DOCTYPE html>

<html lang="fr">

<body>
	<div style="width:510px;color:#000;border:1px solid #F2F2F2;">
		<iframe height="85" frameborder="0" width="510" scrolling="no" src="http://www.prevision-meteo.ch/services/html/mans/horizontal ?bg=ff0000&txtcol=F2F2F2&tmpmin=fff000&tmpmax=378ADF " allowtransparency="true"></iframe>
		<a style="text-decoration:none;font-size:0.75em;" title="Détail des prévisions pour le Mans" href="https://www.prevision-meteo.ch/meteo/localite/mans"><img src="https://www.prevision-meteo.ch/uploads/widget/mans_0.png" width="650" height="250" />
	</div>
	
	<h1><?php $json = file_get_contents("http://www.prevision-meteo.ch/services/json/Mans") ?></h1>
	<h1><?phpvar_dump(json_decode($json)); ?></h1>
	
	
</body>
</html>