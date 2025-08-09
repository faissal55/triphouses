<!DOCTYPE html>
<html>
<head><title>Supprimer un média</title></head>
<body>


<link rel="stylesheet" href="assets/css/suprimer.css">

<form method="POST" action="traitement_suppression.php">
    <label>
    <h2>Supprimer un média par titre</h2>    
    Titre :</label><br>
    <input type="text" name="titre" required><br><br>

    <label>Type de média :</label><br>
    <select name="type_media">
        <option value="image">Image</option>
        <option value="video">Vidéo</option>
    </select><br><br>

    <button type="submit" onclick="return confirm('Supprimer tous les médias ayant ce titre ?')">Supprimer</button>
</form>
</body>
</html>
