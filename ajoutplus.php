<?php
$pdo = new PDO("mysql:host=localhost;dbname=immobilier", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Titres disponibles dans la table medias
$titres = $pdo->query("SELECT DISTINCT titre FROM medias")->fetchAll(PDO::FETCH_COLUMN);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter plusieurs médias</title>
    <link rel="stylesheet" href="assets/css/uploader.css">
</head>
<body>
    <h2>Ajouter plusieurs images ou vidéos</h2>

    <form action="traitement_ajoutplus.php" method="POST" enctype="multipart/form-data">

        <label for="titre_existant">Ou sélectionner un titre existant :</label>
        <select name="titre_existant">
            <option value="">-- Choisir un titre --</option>
            <?php foreach ($titres as $titre): ?>
                <option value="<?= htmlspecialchars($titre) ?>"><?= htmlspecialchars($titre) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="type_media">Type de média :</label>
        <select name="type_media" required>
            <option value="image">Image</option>
            <option value="video">Vidéo</option>
        </select><br><br>

        <label for="isprincipale">Image principale ?</label>
        <select name="isprincipale">
            <option value="0">Non</option>
            <option value="1">Oui</option>
        </select><br><br>

        <label for="fichiers">Fichiers (images ou vidéos) :</label>
        <input type="file" name="fichiers[]" multiple required><br><br>

        <input type="submit" value="Ajouter les médias">
    </form>
</body>
</html>
