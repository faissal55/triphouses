<?php
$host = 'localhost';
$dbname = 'immobilier';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if (isset($_GET['titre'])) {
    $titre = $_GET['titre'];

    $stmt = $pdo->prepare("SELECT * FROM medias WHERE titre = :titre LIMIT 1");
    $stmt->execute(['titre' => $titre]);
    $media = $stmt->fetch();

    if ($media) {
        ?>
        <link rel="stylesheet" href="assets/css/modifiermedia.css">
        <h2>Modifier le média : <?= htmlspecialchars($media['titre']) ?></h2>
        <form method="POST" action="traitement_modification.php">
            <input type="hidden" name="id" value="<?= $media['id'] ?>">

            <label>Titre :</label><br>
            <input type="text" name="titre" value="<?= htmlspecialchars($media['titre']) ?>" required><br><br>

            <label>Type de propriété :</label><br>
            <select name="type_propriete" required>
                <?php
                foreach (['villa', 'appartement', 'entrepot', 'Terrain', 'parcelle','Autre'] as $type) {
                    $selected = $media['type_propriete'] === $type ? 'selected' : '';
                    echo "<option value=\"$type\" $selected>$type</option>";
                }
                ?>
            </select><br><br>

            <label>Prix :</label><br>
            <input type="number" step="0.01" name="prix" value="<?= $media['prix'] ?>" required><br><br>

            <label>Nombre de chambres :</label><br>
            <input type="number" name="nombre_chambres" value="<?= $media['nombre_chambres'] ?>"><br><br>

            <label>Surface :</label><br>
            <input type="number" name="surface" value="<?= $media['surface'] ?>"><br><br>

            <label>Nombre d'étages :</label><br>
            <input type="number" name="nombre_etages" value="<?= $media['nombre_etages'] ?>"><br><br>

            <label>Nombre de parkings :</label><br>
            <input type="number" name="nombre_parkings" value="<?= $media['nombre_parkings'] ?>"><br><br>

            <label>Description :</label><br>
            <textarea name="description"><?= htmlspecialchars($media['description']) ?></textarea><br><br>

            <label>Type de média :</label><br>
            <select name="type_media">
                <option value="image" <?= $media['type_media'] === 'image' ? 'selected' : '' ?>>Image</option>
                <option value="video" <?= $media['type_media'] === 'video' ? 'selected' : '' ?>>Vidéo</option>
            </select><br><br>

            <label>Fichier :</label><br>
            <input type="text" name="fichier" value="<?= htmlspecialchars($media['fichier']) ?>"><br><br>

            <label>Page destination :</label><br>
            <select name="page_destination">
                <option value="Accueil" <?= $media['page_destination'] === 'Accueil' ? 'selected' : '' ?>>Accueil</option>
                <option value="propriete" <?= $media['page_destination'] === 'propriete' ? 'selected' : '' ?>>Propriété</option>
            </select><br><br>
            <label>la ville ou se situer la proprietee :</label><br>
            <select name="localite">
                <option value="Bobo Dioulasso" <?= $media['localite'] === 'Bobo Dioulasso' ? 'selected' : '' ?>>Bobo Dioulasso</option>
                <option value="Ouagadougou" <?= $media['localite'] === 'Ouagadougou' ? 'selected' : '' ?>>Ouagadougou</option>
            </select><br><br>

            <button type="submit">Modifier</button>
        </form>
        <?php
    } else {
        echo "<p>Aucun média trouvé avec ce titre.</p>";
    }
} else {
    echo "<p>Aucun titre fourni.</p>";
}
?>
