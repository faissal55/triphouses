<?php
$conn = new PDO("mysql:host=localhost;dbname=immobilier", "root", "");
$medias = $conn->query("SELECT * FROM medias WHERE page_destination = 'propriete'");
foreach ($medias as $media) {
    if ($media['type_media'] == 'image') {
        echo "<img src='uploads/images/{$media['fichier']}' width='300'><br>";
    } else {
        echo "<video src='uploads/videos/{$media['fichier']}' controls width='300'></video><br>";
    }
    echo "<p>{$media['titre']} - {$media['type_propriete']} - {$media['prix']} €</p><hr>";
}
?>

<?php
$host = 'localhost';
$db = 'immobilier';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Médias pour la page "propriété" uniquement
    $stmt = $conn->prepare("SELECT * FROM medias WHERE page_destination = 'propriete' ORDER BY id DESC");
    $stmt->execute();
    $medias = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Propriétés à vendre</title>
</head>
<body>

<h2>Liste des propriétés</h2>

<?php foreach ($medias as $media): ?>
    <div class="media">
        <h3><?= htmlspecialchars($media['titre']) ?></h3>
        <p>Type : <?= htmlspecialchars($media['type_propriete']) ?></p>
        <p>Prix : <?= $media['prix'] ?> Cfa</p>
        <p>Surface : <?= $media['surface'] ?> m²</p>
        <p>Chambres : <?= $media['nombre_chambres'] ?></p>
        <p>Étages : <?= $media['nombre_etages'] ?> | Parkings : <?= $media['nombre_parkings'] ?></p>
        <p>Description : <?= nl2br(htmlspecialchars($media['description'])) ?></p>

        <?php if ($media['type_media'] == 'image'): ?>
            <img src="uploads/images/<?= htmlspecialchars($media['fichier']) ?>" width="300">
        <?php else: ?>
            <video width="300" controls>
                <source src="uploads/videos/<?= htmlspecialchars($media['fichier']) ?>">
            </video>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

</body>
</html>
