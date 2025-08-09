<?php
$host = 'localhost';
$db = 'immobilier';
$user = 'root';
$pass = ''; // Change si nécessaire

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Active les erreurs PDO

    // Vérifie si le fichier a été envoyé
    if (isset($_FILES['fichier'])) {
        $nomFichier = $_FILES['fichier']['name'];
        $tmp = $_FILES['fichier']['tmp_name'];
        $dossier = ($_POST['type_media'] == 'image') ? 'uploads/images/' : 'uploads/videos/';
        move_uploaded_file($tmp, $dossier . $nomFichier);

        $stmt = $conn->prepare("INSERT INTO medias (
            titre, type_propriete, prix, nombre_chambres, surface, nombre_etages, nombre_parkings,
            description, type_media, fichier, page_destination, localite,acheter_louer
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

        $stmt->execute([
            $_POST['titre'],
            $_POST['type_propriete'],
            $_POST['prix'],
            $_POST['nombre_chambres'],
            $_POST['surface'],
            $_POST['nombre_etages'],
            $_POST['nombre_parkings'],
            $_POST['description'],
            $_POST['type_media'],
            $nomFichier,
            $_POST['page_destination'],
            $_POST['localite'],
            $_POST['acheter_louer'],
        ]);

        echo "✅ Média ajouté avec succès.";
    } else {
        echo "❌ Aucun fichier reçu.";
    }

} catch (PDOException $e) {
    echo "Erreur SQL : " . $e->getMessage();
}
?>

