

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<title>Villa Agency - Real Estate HTML5 Template</title>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->
<link rel="stylesheet" href="assets/css/fontawesome.css">
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




<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=immobilier", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données GET
    $localite = $_GET['localite'] ?? '';
    $acheter_louer = $_GET['acheter_louer'] ?? '';
    $type_propriete = $_GET['type_propriete'] ?? '';
    $prix_min = $_GET['prix_min'] ?? '';
    $prix_max = $_GET['prix_max'] ?? '';
    $query = $_GET['query'] ?? '';

    // Construction dynamique de la requête SQL
    $sql = "SELECT * FROM medias WHERE 1=1";
    $params = [];

    if (!empty($localite)) {
        $sql .= " AND localite = :localite";
        $params[':localite'] = $localite;
    }

    if (!empty($acheter_louer)) {
        $sql .= " AND acheter_louer = :acheter_louer";
        $params[':acheter_louer'] = $acheter_louer;
    }

    if (!empty($type_propriete)) {
        $sql .= " AND type_propriete = :type_propriete";
        $params[':type_propriete'] = $type_propriete;
    }

    if (!empty($prix_min)) {
        $sql .= " AND prix >= :prix_min";
        $params[':prix_min'] = $prix_min;
    }

    if (!empty($prix_max)) {
        $sql .= " AND prix <= :prix_max";
        $params[':prix_max'] = $prix_max;
    }

    if (!empty($query)) {
        $sql .= " AND (titre LIKE :search OR description LIKE :search)";
        $params[':search'] = '%' . $query . '%';
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>


<!-- Résultats HTML -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Résultats de recherche</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Résultats de recherche</h2>
    <?php if (!empty($results)): ?>
    <div class="row">
      <?php foreach ($results as $media): ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="item border p-3 h-100">
          <a href="details.php?titre=<?= urlencode($media['titre'] ?? '') ?>">
          <img src="uploads/images/<?= htmlspecialchars($media['fichier'] ?? '') ?>" alt="">
        </a>
            <span class="category d-block mb-1"><?= htmlspecialchars($media['type_propriete'] ?? '-') ?></span>
            <h6><?= isset($media['prix']) ? number_format($media['prix'], 0, ',', ' ') . ' CFA' : 'Prix non disponible' ?></h6>
            <h4><a href="#"><?= htmlspecialchars($media['titre'] ?? 'Sans titre') ?></a></h4>
            <ul>
              <li>Chambres : <span><?= htmlspecialchars($media['nombre_chambres'] ?? '-') ?></span></li>
              <li>Salles de bains : <span><?= htmlspecialchars($media['nombre_salles_bains'] ?? '-') ?></span></li>
              <li>Surface : <span><?= isset($media['surface']) ? htmlspecialchars($media['surface']) . ' m²' : '-' ?></span></li>
              <li>Étage : <span><?= htmlspecialchars($media['nombre_etages'] ?? '-') ?></span></li>
              <li>Parking : <span><?= htmlspecialchars($media['nombre_parkings'] ?? '-') ?> places</span></li>
              <li>Localité : <span><?= htmlspecialchars($media['localite'] ?? '-') ?></span></li>
            </ul>
            <div class="main-button mt-3">
              <a href="planifier.html" class="btn btn-outline-primary">Planifier une visite</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p>Aucun résultat trouvé.</p>
  <?php endif; ?>
</div>
</body>
</html>
