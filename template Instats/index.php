<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="template_bootstrap/img/logo_insta.png" />
  <title>Instats</title>

  <!-- Bootstrap core CSS -->
  <link href="template_bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="template_bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="template_bootstrap/css/grayscale.css" rel="stylesheet">

  <!-- Scripts pour la map -->
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script type="text/javascript" src="template_bootstrap/js/map.js"></script>

</head>

<body id="page-top" onload="initialiser_map()">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a href="inscription.php" class="btn btn-primary js-scroll-trigger">Inscription</a>
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <img
          src="template_bootstrap/img/logo_insta.png"
          height="25px" 
          width="25px" 
        />  Instats</a>
      <a href="connexion.php" class="btn btn-primary js-scroll-trigger">Connexion</a>
    </div>
  </nav>

  <!-- Projects Section -->
  <section id="projects" class="projects-section bg-light">
    <div class="container">
      
      <!--<div class="map">
        <img class="image" src="template_bootstrap/img/map.jpg"
          height="328px" 
          width="614px"
          alt="une photo">
      </div>-->
      <div id="carte" style="width:100%; height:500px">
        
      </div>

      <div class="meteo">
        <div style="width:510px;color:#000;border:1px solid #F2F2F2;">
          <a style="text-decoration:none;font-size:0.75em;" title="Détail des prévisions pour Le Mans"><img src="https://www.prevision-meteo.ch/uploads/widget/mans_0.png" width="650" height="250" />
        </div>
  
        <h1><?php $json = file_get_contents("http://www.prevision-meteo.ch/services/json/Mans") ?></h1>
        <h1><?phpvar_dump(json_decode($json)); ?></h1>
      </div>

      <div class="photos">
        <div class="project-text w-100 my-auto text-center text-lg-left">
          <h4 class="text-black">Vos photos</h4>
          <img class="image" src="template_bootstrap/img/bg-masthead.jpg"
            height="200px"
            width="200px"
            alt="une photo">
          <img class="image" src="template_bootstrap/img/bg-signup.jpg"
            height="200px"
            width="200px"
            alt="une photo">
          <img class="image" src="template_bootstrap/img/demo-image-01.jpg"
            height="200px"
            width="200px"
            alt="une photo">
          <img class="image" src="template_bootstrap/img/demo-image-02.jpg"
            height="200px"
            width="200px"
            alt="une photo">
        </div>
      </div>

      <div class="hashtags">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-black">Les hashtags les plus utilisés</h4>
                <p class="mb-0 text-black-50">#insta #instats</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
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
