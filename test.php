<!DOCTYPE html>

<html lang="fr">

<body>
	<div style="width:510px;color:#000;border:1px solid #F2F2F2;">
		<iframe height="85" frameborder="0" width="510" scrolling="no" src="http://www.prevision-meteo.ch/services/html/mans/horizontal ?bg=ff0000&txtcol=F2F2F2&tmpmin=fff000&tmpmax=378ADF " allowtransparency="true"></iframe>
		<a style="text-decoration:none;font-size:0.75em;" title="Détail des prévisions pour le Mans" href="<a href="https://www.prevision-meteo.ch/meteo/localite/mans"><img src="https://www.prevision-meteo.ch/uploads/widget/mans_0.png" width="650" height="250" /></a>Prévisions complètes pour le Mans</a>
	</div>
	
	<h1><?php echo $json = file_get_contents("http://www.prevision-meteo.ch/services/Mans") ?></h1>
	<h1><?phpvar_dump(json_decode($json)); ?></h1>
	
	
	<img src="<?php echo $json->current_condition->icon; ?>" width="45" height="45" />
	<div id="widget_1">
	
	<h1><?php echo $json->city_info->name ?></h1> 
	
	<ul>
	
		<li><span><?php echo $json->fcst_day_0->day_short; ?></span><img src="<?php echo $json->fcst_day_0->icon; ?>" width="45" height="45" /></li>
		<li><span><?php echo $json->fcst_day_1->day_short; ?></span><img src="<?php echo $json->fcst_day_0->icon; ?>" width="45" height="45" /></li>
		<li><span><?php echo $json->fcst_day_2->day_short; ?></span><img src="<?php echo $json->fcst_day_2->icon; ?>" width="45" height="45" /></li>
	
	</ul> </div>

</body>

</html>