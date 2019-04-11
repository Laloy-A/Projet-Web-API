<?php
session_start();

include("identifiants.php");

if(isset($_POST['formconnexion'])) {
    $token = $_POST['token'];
    if(!empty($token)) {
        $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE token = ?");
        $requser->execute(array($token));
        $userexist = $requser->rowCount();
        if($userexist == 1) {
	        
        	$userinfo = $requser->fetch();

	        $_SESSION['id_util'] = $userinfo['id_util'];
            $_SESSION['user_id'] = $userinfo['user_id'];
            $_SESSION['token'] = $userinfo['token'];
            $_SESSION['success'] = 1;

         	header("Location: index.php");
        } else {
        	$erreur = "Mauvais token !";
      	}
    } else {
    	$erreur = "Tous les champs doivent être complétés !";
    }
}
?>
