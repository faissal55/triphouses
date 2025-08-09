<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Espace Annonceur - Immobilier</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #fff0f0;
      color: #333;
    }

    header {
      background-color: #ff4d4d;
      color: white;
      padding: 20px;
      text-align: center;
    }

    section {
      padding: 40px 20px;
      max-width: 1000px;
      margin: auto;
    }

    h2 {
      color: #ff4d4d;
      margin-bottom: 20px;
    }

    ul {
      margin-bottom: 30px;
      line-height: 1.8em;
    }

    .contact-box {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      text-align: center;
    }

    .contact-box p {
      font-size: 1.2em;
      margin: 10px 0;
    }

    .phone {
      font-size: 1.6em;
      color: #ff4d4d;
      font-weight: bold;
    }

    footer {
      background-color: #ff4d4d;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

<header>
  <h1>Espace Annonceur</h1>
  <p>Publiez vos biens facilement avec nous</p>
</header>

<section>
  <h2>Pourquoi publier avec nous ?</h2>
  <ul>
    <li>Visibilité maximale de vos biens immobiliers</li>
    <li>Plateforme moderne et rapide</li>
    <li>Support personnalisé et local</li>
    <li>Mise en avant des annonces premium</li>
  </ul>

  <div class="contact-box">
    <h2>Déposer une annonce</h2>
    <p>Pour déposer une annonce, contactez-nous au numéro :</p>
    <p class="phone">+226 70 00 00 00</p>
    <p>Disponible 7j/7 de 8h à 20h</p>
  </div>
</section>

<footer>
  &copy; <?= date('Y') ?> Agence Immobilière | Tous droits réservés
</footer>

</body>
</html>
