<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/uploader.css">
    <meta charset="UTF-8">
    <title>Ajouter un média</title>
</head>
<body>

<h2>Formulaire d'ajout de média immobilier</h2>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label>Titre :</label><input type="text" name="titre"><br>
    <label>Type de propriété :</label>
    <select name="type_propriete">
        <option value="villa">Villa</option>
        <option value="appartement">Appartement</option>
        <option value="entrepot">Entrepôt</option>
        <option value="Terrain">Terrain</option>
        <option value="parcelle">parcelle</option>
        <option value="autre">Autre</option>

    </select><br>
    <label>Prix :</label><input type="number" name="prix"><br>
    <label>Nombre de chambres :</label><input type="number" name="nombre_chambres"><br>
    <label>Surface (m²) :</label><input type="number" name="surface"><br>
    <label>Nombre d'étages :</label><input type="number" name="nombre_etages"><br>
    <label>Nombre de parkings :</label><input type="number" name="nombre_parkings"><br>
    <label>Description :</label><textarea name="description"></textarea><br>
    <label>Type de média :</label>
    <select name="type_media">
        <option value="image">Image</option>
        <option value="video">Vidéo</option>
    </select><br>
    <label>Fichier :</label><input type="file" name="fichier"><br>
    <label>Afficher sur la page :</label>
    <select name="page_destination">
        <option value="Accueil">Accueil</option>
        <option value="propriete">Propriétés</option>
    </select><br>
    <label>la ville ou se situer la proprietee :</label>
    <select name="localite">
        <option value="Bobo Dioulasso">Bobo Dioulasso</option>
        <option value="Ouagadougou">Ouagadougou</option>
    </select><br>
    <label>ACHETER ou LOUER :</label>
    <select name="acheter_louer">
        <option value="ACHETER">ACHETER</option>
        <option value="LOUER">LOUER</option>
    </select><br>
    <input type="submit" value="Envoyer">
</form>

</body>
</html>
<?php
$host = 'localhost';
$db = 'immobilier';
$user = 'root';
$pass = ''; // Change si nécessaire

$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

// Vérifie si le fichier a été envoyé
if (isset($_FILES['fichier'])) {
    $nomFichier = $_FILES['fichier']['name'];
    $tmp = $_FILES['fichier']['tmp_name'];
    $dossier = ($_POST['type_media'] == 'image') ? 'uploads/images/' : 'uploads/videos/';
    move_uploaded_file($tmp, $dossier . $nomFichier);

    $stmt = $conn->prepare("INSERT INTO medias (
        titre, type_propriete, prix, nombre_chambres, surface, nombre_etages, nombre_parkings,
        description, type_media,fichier, page_destination,localite,
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");

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

    echo "Média ajouté avec succès.";
}
?>