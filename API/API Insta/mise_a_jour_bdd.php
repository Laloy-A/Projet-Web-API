<?php

	
	// fonction rajoutant +1 à la valeur de la clé passé en paramètre
	function array_valuePlusPlus(&$tableau, $tag){
	    foreach ($tableau as $key => $value) {
	    	if($key == $tag){
	    		$tableau[$key] = $value +1;
	    	}
	    }
	}


	// *****************************************************************************************
	// Mise à jour de la table "utilisateur" avec le nombre de follows, de followed_by et media.
	// *****************************************************************************************

	// GET/users/self
	$_SESSION['endpoint'] = "https://api.instagram.com/v1/users/".$_SESSION['user_id']."/?access_token=".$_SESSION['token'];

	try{
		$curl = curl_init($_SESSION['endpoint']);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$data = json_decode(curl_exec($curl));
	} catch(Exception $e){
		die($e->getMessage());
	}
	
	if($data->meta->code == 200){

		$nb_follows = $data->data->counts->follows;
		$nb_followed_by = $data->data->counts->followed_by;
		$nb_medias = $data->data->counts->media;
		
	} else {
		echo "<p>Impossible de récupérer les stats.</p>";
	}

	$updateutilisateur = $bdd->prepare("UPDATE utilisateur SET nb_follows = ?, nb_followed_by = ?, nb_medias = ? WHERE id_util = ?");
	$updateutilisateur->execute(array($nb_follows, $nb_followed_by, $nb_medias, $_SESSION['id_util'])); 



	// ***************************************************
	// Mise à jour de la table hashtag pour l'utilisateur.
	// ***************************************************

	// GET/users/self/media/recent
	$_SESSION['endpoint'] = "https://api.instagram.com/v1/users/".$_SESSION['user_id']."/media/recent/?access_token=".$_SESSION['token'];

	// On supprime tous les tuples concernant l'utilisateur
	$deletehashtag = $bdd->prepare("DELETE FROM hashtag WHERE id_util = ?");
	$deletehashtag->execute(array($_SESSION['id_util'])); 
	
	// On effectue les calculs
	try{
		$curl = curl_init($_SESSION['endpoint']);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$data = json_decode(curl_exec($curl));
	} catch(Exception $e){
		die($e->getMessage());
	}
	
	if($data->meta->code == 200){
		$tableautag = array();
		foreach ($data->data as $media) {
			// si les tags ne sont pas vide dans le media
			if (!empty($media->tags)){
				// pour chaque tag du media
				foreach ($media->tags as $tag) {
					// si le tag existe
					if(array_key_exists($tag, $tableautag)){
						// on rajoute +1 à la valeur de la clé (tag)
						array_valuePlusPlus($tableautag, $tag);
					}
					else{
						// le tag est rajouté dans le tableau et on lui attribut la valeur 1
						$tableautag[$tag] = 1;
					}
				}
			}
		}
	} else {
		echo "<p>Impossible de récupérer les stats.</p>";
	}

	// Puis on insère les nouveaux tuples
	foreach ($tableautag as $key => $value) {
		$inserthashtag = $bdd->prepare("INSERT INTO hashtag(id_util, nom_tag, nombre_tag) VALUES(?, ?, ?)");
        $inserthashtag->execute(array($_SESSION['id_util'], $key, $value)); 
	}



	// *******************************************************
	// Mise à jour de la table commentaire pour l'utilisateur.
	// *******************************************************

	// GET/users/self/media/recent
	$_SESSION['endpoint'] = "https://api.instagram.com/v1/users/".$_SESSION['user_id']."/media/recent/?access_token=".$_SESSION['token'];
	

	// On supprime tous les tuples concernant l'utilisateur
	$deletecommentaire = $bdd->prepare("DELETE FROM commentaire WHERE id_util = ?");
	$deletecommentaire->execute(array($_SESSION['id_util'])); 
	
	// On effectue les calculs
	try{
		$curl = curl_init($_SESSION['endpoint']);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$data = json_decode(curl_exec($curl));
	} catch(Exception $e){
		die($e->getMessage());
	}
	
	if($data->meta->code == 200){
		$tableaucomment = array();
		foreach ($data->data as $media) {
			$id_media = $media->id;		
			// GET/media/media-id/comments
			$_SESSION['endpoint2'] = "https://api.instagram.com/v1/media/$id_media/comments?access_token=".$_SESSION['token'];
			// On effectue les calculs
			try{
				$curl2 = curl_init($_SESSION['endpoint2']);
				curl_setopt($curl2, CURLOPT_CONNECTTIMEOUT, 3);
				curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl2, CURLOPT_SSL_VERIFYPEER, false);
				$data2 = json_decode(curl_exec($curl2));
			} catch(Exception $e2){
				die($e2->getMessage());
			}
			
			if($data2->meta->code == 200){
				if(!empty($data2->data )){
					foreach ($data2->data as $comment) {
						// si le commentaire existe
						$commentateur = $comment->from->username;
						if(array_key_exists($commentateur, $tableaucomment)){
							// on rajoute +1 à la valeur de la clé (commentaire)
							array_valuePlusPlus($tableaucomment, $commentateur);
						}
						else{
							// le commentaire est rajouté dans le tableau et on lui attribut la valeur 1
							$tableaucomment[$commentateur] = 1;
						}
					}
				}
			} else {
				echo "<p>Impossible de récupérer les commentaires.</p>";
			}
		}
	} else {
		echo "<p>Impossible de récupérer les id des medias.</p>";
	}

	// Puis on insère les nouveaux tuples
	foreach ($tableaucomment as $key => $value) {
		$insertcommentaire = $bdd->prepare("INSERT INTO commentaire(id_util, nom_commentateur, nombre_commentaire) VALUES(?, ?, ?)");
        $insertcommentaire->execute(array($_SESSION['id_util'], $key, $value)); 
	}



	// *******************************************************
	// Mise à jour de la table media pour l'utilisateur.
	// *******************************************************

	// GET/users/self/media/recent
	$_SESSION['endpoint'] = "https://api.instagram.com/v1/users/".$_SESSION['user_id']."/media/recent/?access_token=".$_SESSION['token'];
	

	// On supprime tous les tuples concernant l'utilisateur
	$deletemedia = $bdd->prepare("DELETE FROM media WHERE id_util = ?");
	$deletemedia->execute(array($_SESSION['id_util'])); 
	
	// On effectue les calculs
	try{
		$curl = curl_init($_SESSION['endpoint']);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$data = json_decode(curl_exec($curl));
	} catch(Exception $e){
		die($e->getMessage());
	}
	
	if($data->meta->code == 200){
		foreach ($data->data as $media) {
			$type = $media->type;
			if($type == "image"){
				$url = $media->images->standard_resolution->url;
			}
			else if($type == "video"){
				$url = $media->videos->standard_resolution->url;
			}
			if($media->location == "null"){
				$insertmedia = $bdd->prepare("INSERT INTO media(id_util, type, lien) VALUES(?, ?, ?)");
	        	$insertmedia->execute(array($_SESSION['id_util'], $type, $url, $latitude, $longitude)); 
			}
			else{
				$latitude = $media->location->latitude;
				$longitude = $media->location->longitude;

				// Puis on insère les nouveaux tuples
				$insertmedia = $bdd->prepare("INSERT INTO media(id_util, type, lien, latitude, longitude) VALUES(?, ?, ?, ?, ?)");
	        	$insertmedia->execute(array($_SESSION['id_util'], $type, $url, $latitude, $longitude)); 
			}
			
			
			
		}
	} else {
		echo "<p>Impossible de récupérer les medias.</p>";
	}


?>