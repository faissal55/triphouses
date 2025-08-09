<?php
$pdo = new PDO("mysql:host=localhost;dbname=immobilier", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Correction ici :
$titre_saisi = $_POST['titre_saisi'] ?? '';
$titre_existant = $_POST['titre_existant'] ?? '';
$titre = !empty($titre_saisi) ? $titre_saisi : $titre_existant;

$type_media = $_POST['type_media'] ?? '';
$isprincipale = isset($_POST['isprincipale']) ? (int)$_POST['isprincipale'] : 0;

if (empty($titre) || empty($type_media) || empty($_FILES['fichiers']['name'][0])) {
    die("Veuillez remplir tous les champs nécessaires.");
}

// (le reste du code reste inchangé)


// Définir le bon dossier
$uploadDir = ($type_media === 'image') ? 'uploads/images/' : 'uploads/videos/';

foreach ($_FILES['fichiers']['tmp_name'] as $index => $tmpName) {
    $originalName = basename($_FILES['fichiers']['name'][$index]);
    $fichierPath = $uploadDir . uniqid() . '_' . $originalName;

    // Déplacer le fichier uploadé
    if (move_uploaded_file($tmpName, $fichierPath)) {
        // Préparer le chemin relatif à stocker en base
        $fichierEnregistre = basename($fichierPath);

        // Insertion dans la table plus_media
        $stmt = $pdo->prepare("INSERT INTO plus_media (titre, type_media, fichier, isprincipale) 
                               VALUES (:titre, :type_media, :fichier, :isprincipale)");
        $stmt->execute([
            'titre' => $titre,
            'type_media' => $type_media,
            'fichier' => $fichierEnregistre,
            'isprincipale' => $isprincipale
        ]);
    } else {
        echo "Échec de l'upload du fichier : " . htmlspecialchars($originalName) . "<br>";
    }
}

echo "Médias ajoutés avec succès. <a href='ajoutplus.php'>Ajouter encore</a> | <a href='details.php?titre=" . urlencode($titre) . "'>Voir détails</a>";
?>
