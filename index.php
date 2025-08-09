<?php
$conn = new PDO("mysql:host=localhost;dbname=immobilier", "root", "");
$medias = $conn->query("SELECT * FROM medias WHERE page_destination = 'index'");
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

    // Médias pour la page d’accueil uniquement
    $stmt = $conn->prepare("SELECT * FROM medias WHERE page_destination = 'index' ORDER BY id DESC");
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
    <title>Accueil - Immobilier</title>
</head>
<body>

<h2>Accueil - Annonces en vedette</h2>

<?php foreach ($medias as $media): ?>
    <div class="media">
        <h3><?= htmlspecialchars($media['titre']) ?></h3>
        <p><?= htmlspecialchars($media['type_propriete']) ?> - <?= $media['prix'] ?> €</p>

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
