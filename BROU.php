<footer>
  <div class="footer-logos">
    <div class="logo-item">
      <img src="assets/images/cimassologo.png" alt="Logo Cimasso">
    </div>
    <div class="logo-item">
      <img src="assets/images/sapeclogo.jpeg" alt="Logo Sapec">
    </div>
    <div class="logo-item">
      <img src="assets/images/agblog.jpeg" alt="Logo Agb">
    </div>
    <div class="logo-item">
      <img src="assets/images/interieurmaisonlogo.png" alt="Logo Intérieur Maison">
    </div>
  </div>

  <div class="footer-copy">
    <p>&copy; 2025 TRIHOUSE.COM - Tous droits réservés</p>
  </div>

  <style>
    footer {
      background-color: #222;
      color: white;
      padding: 40px 0;
      font-family: Arial, sans-serif;
    }
    .footer-logos {
      max-width: 1200px;
      margin: auto;
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
    }
    .logo-item img {
      width: 100px;
      filter: drop-shadow(0 0 5px #fff);
      transition: transform 0.3s ease;
      cursor: pointer;
    }
    .logo-item img:hover {
      transform: scale(1.1);
    }
    .footer-copy {
      text-align: center;
      margin-top: 30px;
      font-size: 14px;
      color: #aaa;
    }

    /* Responsive : logos un peu plus petits sur mobile */
    @media (max-width: 600px) {
      .footer-logos {
        justify-content: center;
        gap: 15px;
      }
      .logo-item img {
        width: 80px;
      }
    }
  </style>
</footer>
