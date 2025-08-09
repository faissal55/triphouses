<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'immobilier';
$user = 'root';
$pass = ''; // Remplacez par votre mot de passe si nécessaire

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // Définir le mode d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier que les données sont envoyées
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titre'], $_POST['type_media'])) {
    $titre = $_POST['titre'];
    $type_media = $_POST['type_media'];

    // Préparer la requête de suppression
    $sql = "DELETE FROM medias WHERE titre = :titre AND type_media = :type_media";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':type_media', $type_media);

    try {
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Média(s) supprimé(s) avec succès.";
        } else {
            echo "Aucun média trouvé avec ce titre et ce type.";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
    }
} else {
    echo "Formulaire incomplet.";
}
?>