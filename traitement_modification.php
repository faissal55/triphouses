<?php
// Connexion à la base de données
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

// Vérification des données envoyées
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $type_propriete = $_POST['type_propriete'];
    $prix = $_POST['prix'];
    $nombre_chambres = $_POST['nombre_chambres'];
    $surface = $_POST['surface'];
    $nombre_etages = $_POST['nombre_etages'];
    $nombre_parkings = $_POST['nombre_parkings'];
    $description = $_POST['description'];
    $type_media = $_POST['type_media'];
    $fichier = $_POST['fichier'];
    $page_destination = $_POST['page_destination'];
    $localite = $_POST['localite'];
    // Requête de mise à jour
    $sql = "UPDATE medias SET 
                titre = :titre,
                type_propriete = :type_propriete,
                prix = :prix,
                nombre_chambres = :nombre_chambres,
                surface = :surface,
                nombre_etages = :nombre_etages,
                nombre_parkings = :nombre_parkings,
                description = :description,
                type_media = :type_media,
                fichier = :fichier,
                page_destination = :page_destination,
                localite = :localite
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':type_propriete', $type_propriete);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':nombre_chambres', $nombre_chambres);
    $stmt->bindParam(':surface', $surface);
    $stmt->bindParam(':nombre_etages', $nombre_etages);
    $stmt->bindParam(':nombre_parkings', $nombre_parkings);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':type_media', $type_media);
    $stmt->bindParam(':fichier', $fichier);
    $stmt->bindParam(':page_destination', $page_destination);
    $stmt->bindParam(':localite', $localite);

    try {
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Média modifié avec succès.";
        } else {
            echo "Aucune modification effectuée (vérifiez l'ID).";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la modification : " . $e->getMessage();
    }
} else {
    echo "Données non reçues.";
}
?>
