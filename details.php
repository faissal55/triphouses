<?php
$pdo = new PDO("mysql:host=localhost;dbname=immobilier", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$titre = $_GET['titre'] ?? '';

if (empty($titre)) {
    die("Erreur : titre non fourni dans l'URL.");
}

$stmt = $pdo->prepare("SELECT * FROM plus_media WHERE titre = :titre");
$stmt->execute(['titre' => $titre]);
$medias = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du bien : <?= htmlspecialchars($titre) ?></title>
    <link rel="stylesheet" href="assets/css/details.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
            margin: 0; 
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        .media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(300px,1fr));
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto 40px;
        }
        .media-item {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
        .media-item:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgb(0 0 0 / 0.15);
        }
        img, video {
            max-width: 100%;
            max-height: 250px;
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
        }
        .no-media {
            text-align: center;
            font-size: 1.2rem;
            color: #7f8c8d;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 40px;
            font-weight: 600;
            color: #2980b9;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }
        .back-link:hover {
            color: #1c5980;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Médias pour le bien : <?= htmlspecialchars($titre) ?></h2>

    <?php if (count($medias) === 0): ?>
        <p class="no-media">Aucun média trouvé pour ce titre.</p>
    <?php else: ?>
        <div class="media-grid">
            <?php foreach ($medias as $media): ?>
                <div class="media-item">
                    <?php if ($media['type_media'] === 'image'): ?>
                        <img src="uploads/images/<?= htmlspecialchars($media['fichier']) ?>" alt="Image du bien">
                    <?php elseif ($media['type_media'] === 'video'): ?>
                        <video controls>
                            <source src="uploads/videos/<?= htmlspecialchars($media['fichier']) ?>" type="video/mp4">
                            Votre navigateur ne supporte pas la vidéo.
                        </video>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <a href="indexx.php" class="back-link">&larr; Retour à l'accueil</a>
</body>
</html>
