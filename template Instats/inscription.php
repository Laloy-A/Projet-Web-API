<?php include("connexion_bdd.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="template_bootstrap/img/logo_insta.png" />
  <title>Instats - Inscription</title>

  <!-- Bootstrap core CSS -->
  <link href="template_bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="template_bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="template_bootstrap/css/grayscale.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <img
          src="template_bootstrap/img/logo_insta.png"
          height="25px" 
          width="25px" 
        />  Instats</a>
      <!--<a class="btn btn-primary js-scroll-trigger">Connexion</a>-->
    </div>
  </nav>

  <!-- Projects Section -->
  <section id="projects" class="projects-section bg-light">
    <div class="container">
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
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy; Instats 2019
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="template_bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="template_bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="template_bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="template_bootstrap/js/grayscale.js"></script>

</body>

</html>