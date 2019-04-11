<?php
session_start();
// Connexion à la base de données
include("identifiants.php");
if(isset($_POST['forminscription'])) {
   $user_id = htmlspecialchars($_POST['user_id']);
   $token = htmlspecialchars($_POST['token']);
   

   if( !empty($_POST['user_id']) AND !empty($_POST['token']) ) {
      
      $requser_id = $bdd->prepare("SELECT * FROM utilisateur WHERE user_id = ?");
      $requser_id->execute(array($user_id));
      $user_id_exist = $requser_id->rowCount();
      if($user_id_exist == 0) {
         $reqtoken = $bdd->prepare("SELECT * FROM utilisateur WHERE token = ?");
         $reqtoken->execute(array($token));
         $token_exist = $reqtoken->rowCount();
         if($token_exist == 0) {

            $insertutilisateur = $bdd->prepare("INSERT INTO utilisateur(user_id, token) VALUES(?, ?)");
            $insertutilisateur->execute(array($user_id, $token)); 
            $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE token = ?");
            $requser->execute(array($token));
            $userinfo = $requser->fetch();
            $_SESSION['id_util'] = $userinfo['id_util'];
            $_SESSION['user_id'] = $userinfo['user_id'];
            $_SESSION['token'] = $userinfo['token'];
            $_SESSION['success'] = 1;
            
            header("Location: index.php");

         } else {
            $erreur = "Token déjà utilisée !";
         }
      } else {
         $erreur = "User_id déjà utilisée !";
      }           
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>