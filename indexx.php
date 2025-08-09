<?php
$pdo = new PDO("mysql:host=localhost;dbname=immobilier", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Charger uniquement les propriétés pour la page "propriete"
$query = $pdo->prepare("SELECT * FROM medias WHERE page_destination = 'Accueil'");
$query->execute();
$Accueil = $query->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Villa Agency - Real Estate HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/search.css">
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
                  <li><a href="proprietehtml.php" >proprietee</a></li>
                  <li><a href="property-details.php">details de proprietee</a></li>
                  <li><a href="contact.php">Contact</a></li>
                  <li><a href="planifier.html"><i class="fa fa-calendar"></i> planifier une visite</a></li>
              </ul>
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

  <div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
        
         <h2> TROUVEZ VOTRE FUTUR LOGEMENT ICI</h2>

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
        </div>
      </div>
      <div class="item item-2">
  <div class="header-text">
    <h2>Faites vite !<br>Obtenez la meilleure villa en ville</h2>
  </div>
</div>
<div class="item item-3">
  <div class="header-text">
    <h2>Agissez maintenant !<br>Obtenez le penthouse le plus haut de gamme</h2>
  </div>
</div>
    </div>
  </div>

  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img src="assets/images/featured.jpg" alt="">
            <a href="property-details.html"><img src="assets/images/featured-icon.png" alt="" style="max-width: 60px; padding: 0px;"></a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Featured</h6>
            <h2> Meilleur appartement de séjour pour vous </h2>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
      
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
            <strong></strong> Trouvez les meilleures villas de séjour, des appartements meublés, des résidences, des salles événementielles et en locations pour vos vacances, séjours et voyages sur notre plateforme. <a href="https://www.google.com/search?q=best+free+css+templates" target="_blank"></a> </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
              
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4>250 m2<br><span>Total Flat Space</span></h4>
              </li>
          
              <li>
                <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Payment<br><span>Banque </span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Safety<br><span>24/7 Under Control</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Video View</h6>
            <h2>Get Closer View & Different Feeling</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="video-frame">
            <img src="assets/images/video-frame.jpg" alt="">
            <a href="https://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="120" data-speed="1000"></h2>
                   <p class="count-text ">biens imobiliers disponibles</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="2" data-speed="1000"></h2>
                  <p class="count-text ">Years Experience</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="5" data-speed="1000"></h2>
                  <p class="count-text "> prix remportes en2025</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Best Deal</h6>
            <h2>Find Your Best Deal Right Now!</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                   
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>185 m2</span></li>
                          <li>Floor number <span>3th</span></li>
                          <li>Number of rooms <span>4</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-01.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About Property</h4>
                      <p>Un appartement est disponible au 3ᵉ étage de la résidence 4 Horizon à Bobo-Dioulasso, à proximité du lycée Ouezzin Coulibaly. Pour toute information, contactez notre agence. </p>
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a visit</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>250 m2</span></li>
                          <li>Floor number <span>26th</span></li>
                          <li>Number of rooms <span>5</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-02.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Detail Info About Villa</h4>
                      <p><br><br></p>
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a visit</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>320 m2</span></li>
                          <li>Floor number <span>34th</span></li>
                          <li>Number of rooms <span>6</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-03.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About Penthouse</h4>
                      <p></p>
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a visit</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Properties</h6>
            <h2>We Provide The Best Property You Like</h2>
          </div>
        </div>
      </div>
      <div class="row">
  <?php foreach ($Accueil as $media): ?>
    <div class="col-lg-4 col-md-6">
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
          <a href="planifier.html">Planifier une visite</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>


  <div class="contact section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Contact Us</h6>
            <h2> Contact our agency</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
  <div class="container">
    <div class="row justify-content-center">
      
      <div class="col-lg-8 mb-4">
        <!-- Carte Google Maps centrée -->
        <div id="map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63510.839014086464!2d-1.572527649351727!3d12.371427345666474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2ebf3b6f22aeb7%3A0x47a26479f48a7f16!2sOuagadougou!5e0!3m2!1sfr!2sbf!4v1718590800000!5m2!1sfr!2sbf"
            width="100%"
            height="400"
            style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Carte du Burkina Faso"
          ></iframe>
        </div>
      </div>

      <div class="col-md-6 mb-3">
  <div class="contact-box text-center">
    <img src="assets/images/phone-icon.png" alt="Téléphone" style="max-width: 52px;">
    <h6 style="margin-top: 10px;">
      +226 77 74 74<br>
      <span>Numéro de téléphone</span>
    </h6>
  </div>
</div>

          <!-- Email -->
          <div class="col-md-6 mb-3">
  <div class="contact-box text-center">
    <img src="assets/images/email-icon.png" alt="Email" style="max-width: 52px;">
    <h6 style="margin-top: 10px;">
      dz245d@gmail.com<br>
      <span>Email professionnel</span>
    </h6>
  </div>
</div>
        </div>
      </div>

    </div>
  </div>
</div>
<style>
  .contact-box {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 15px rgba(245, 15, 15, 0.1);
  padding: 20px;
  transition: transform 0.3s ease;
}

.contact-box:hover {
  transform: translateY(-5px);
}

</style>

 
<footer>
  <div class="footer-logos">
    <div class="logo-item">
      <img src="assets/images/cimassologo.png" alt="Logo Cimasso">
    </div>
    <div class="logo-item">
      <img src="assets/images/sapeclogo.jpeg" alt="Logo Sapec">
    </div>
    <div class="logo-item">
      <img src="assets/images/bravia.jpg" alt="Logo bravia">
    </div>
    <div class="logo-item">
      <img src="assets/images/sonatur.jpg" alt="Logo sonatur">
    </div>
    <div class="logo-item">
      <img src="assets/images/mounsarl.jpg" alt="Logo mounsarl">
    </div>
    <div class="logo-item">
      <img src="assets/images/interieurmaisonlogo.png" alt="Logo Intérieur Maison">
    </div>
  </div>

  <div class="footer-copy" style="color: black !important;">
  <p>&copy; 2025 <strong>TRIHOUSE.COM</strong> – Tous droits réservés</p>
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