<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=immobilier", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $titre = $_POST['titre'] ?? '';
    if (empty($titre)) throw new Exception("Titre non fourni.");

    if (!empty($_FILES['fichiers_images']['name'][0])) {
        foreach ($_FILES['fichiers_images']['tmp_name'] as $i => $tmpName) {
            $nomFichier = basename($_FILES['fichiers_images']['name'][$i]);
            $chemin = "uploads/images/" . $nomFichier;

            if (move_uploaded_file($tmpName, $chemin)) {
                $stmt = $pdo->prepare("INSERT INTO medias (titre, fichier, type_media, isprincipale) VALUES (?, ?, 'image', 'non')");
                $stmt->execute([$titre, $nomFichier]);
            }
        }
    }

    if (!empty($_FILES['fichiers_videos']['name'][0])) {
        foreach ($_FILES['fichiers_videos']['tmp_name'] as $i => $tmpName) {
            $nomFichier = basename($_FILES['fichiers_videos']['name'][$i]);
            $chemin = "uploads/videos/" . $nomFichier;

            if (move_uploaded_file($tmpName, $chemin)) {
                $stmt = $pdo->prepare("INSERT INTO medias (titre, fichier, type_media, isprincipale) VALUES (?, ?, 'video', 'non')");
                $stmt->execute([$titre, $nomFichier]);
            }
        }
    }

    header("Location: details.php?titre=" . urlencode($titre));
    exit;

} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
