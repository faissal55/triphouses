<?php
$pdo = new PDO("mysql:host=localhost;dbname=immobilier", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Charger uniquement les propriétés pour la page "propriete"
$query = $pdo->prepare("SELECT * FROM medias WHERE page_destination = 'propriete'");
$query->execute();
$proprietes = $query->fetchAll();
?>









<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Villa Agency - Property Listing by TemplateMo</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> info@company.com</li>
            <li><i class="fa fa-map"></i> Sunny Isles Beach, FL 33160</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

<div class="search-bar mt-5">
  <form action="search.php" method="get" class="mb-4">
    <div class="row g-3">
      <div class="col-md-2">
        <select name="localite" class="form-select">
          <option value="">-- Localité --</option>
          <option value="Bobo Dioulasso">Bobo Dioulasso</option>
          <option value="Ouagadougou">Ouagadougou</option>
        </select>
      </div>
      <div class="col-md-2">
        <select name="acheter_louer" class="form-select">
          <option value="">-- Acheter ou Louer --</option>
          <option value="ACHETER">Acheter</option>
          <option value="LOUER">Louer</option>
        </select>
      </div>
      <div class="col-md-2">
        <select name="type_propriete" class="form-select">
          <option value="">-- Type de propriété --</option>
          <option value="villa">Villa</option>
          <option value="appartement">Appartement</option>
          <option value="entrepot">Entrepôt</option>
          <option value="Terrain">Terrain</option>
          <option value="parcelle">Parcelle</option>
          <option value="autre">Autre</option>
        </select>
      </div>
      <div class="col-md-2">
        <input type="number" name="prix_min" class="form-control" placeholder="Prix min">
      </div>
      <div class="col-md-2">
        <input type="number" name="prix_max" class="form-control" placeholder="Prix max">
      </div>
      <div class="col-md-2">
      <button type="submit" class="btn btn-danger w-100">Rechercher</button>
      </div>
    </div>
  </form>



</div>



  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
              <nav class="main-nav">
                <!-- ***** Logo Start ***** -->
                <a href="indexx.php" class="logo">
                   <img src="assets/images/logo1.jpg" alt "logo" style="height: 75px ;vertical-align: middle ">
                </a>
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                    <li><a href="indexx.php" >Accueil</a></li>
                    <li><a href="proprietehtml.php">proprietee</a></li>
                    <li><a href="property-details.php" >details de proprietee</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="#"><i class="fa fa-calendar"></i> planifier une visite</a></li>
                </ul>
                <a class='menu-trigger'>
                    <span>Menu</span>
                </a>
                <!-- ***** Menu End ***** -->
            </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Accueil</a> / Propriétés</span>
<h3>Propriétés</h3>

        </div>
      </div>
    </div>
  </div>
 

      <div class="row">
         <?php foreach ($proprietes as $media): ?>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 adv">
        <div class="item">
        <a href="details.php?titre=<?= urlencode($media['titre'] ?? '') ?>">
          <img src="uploads/images/<?= htmlspecialchars($media['fichier'] ?? '') ?>" alt="">
        </a>
        <span class="category"><?= htmlspecialchars($media['type_propriete'] ?? 'Inconnu') ?></span>
        <h6><?= number_format($media['prix'] ?? 0, 0, ',', ' ') ?> CFA</h6>
        <h4>
          <a href="#"><?= htmlspecialchars($media['titre'] ?? 'Titre non défini') ?></a>
        </h4>
        <ul>
          <li>Chambres : <span><?= $media['nombre_chambres'] ?? '-' ?></span></li>
          <li>Salles de bains : <span><?= $media['nombre_salles_bains'] ?? '-' ?></span></li>
          <li>Surface : <span><?= $media['surface'] ?? '-' ?> m²</span></li>
          <li>Étage : <span><?= $media['nombre_etages'] ?? '-' ?></span></li>
          <li>Parking : <span><?= $media['nombre_parkings'] ?? '-' ?> places</span></li>
        </ul>
        <div class="main-button">
          <a href="#">Planifier une visite</a>
        </div>
      </div>
    </div>
        <?php endforeach; ?>
        </div>

        <footer>
  <div class="footer-logos">
    <div class="logo-item">
      <img src="assets/images/cimassologo.png" alt="Logo Cimasso">
    </div>
    <div class="logo-item">
      <img src="assets/images/sapeclogo.jpeg" alt="Logo Sapec">
    </div>
    <div class="logo-item">
      <img src="assets/images/agblog.jpeg" alt="Logo Agb">
    </div>
    <div class="logo-item">
      <img src="assets/images/interieurmaisonlogo.png" alt="Logo Intérieur Maison">
    </div>
  </div>

  <div class="footer-copy">
    <p>&copy; 2025 TRIHOUSE.COM - Tous droits réservés</p>
  </div>

  <style>
    footer {
      background-color:rgb(255, 163, 163); /* Blanc cassé élégant */
      color: #000; /* Texte noir */
      padding: 40px 0 20px;
      font-family: 'Segoe UI', Arial, sans-serif;
      border-top: 2px solidrgb(14, 13, 13);
    }
    .footer-logos {
      max-width: 1000px;
      margin: auto;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 40px;
      padding-bottom: 20px;
    }
    .logo-item img {
      width: 60px;
      transition: transform 0.3s ease, filter 0.3s ease;
      filter: grayscale(20%) brightness(95%);
    }
    .logo-item img:hover {
      transform: scale(1.08);
      filter: grayscale(0%) brightness(100%);
    }
    .footer-copy {
      background-color::rgba(129, 127, 124, 0.56);/* Blanc cassé élégant */

  text-align: center;
  font-size: 15px;
  font-weight: 500;
  color:rgba(221, 0, 0, 0.56);;  /* Texte en noir */
  letter-spacing: 0.7px;
}

    @media (max-width: 600px) {
      .footer-logos {
        gap: 25px;
      }
      .logo-item img {
        width: 50px;
      }
    }
  </style>
</footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>