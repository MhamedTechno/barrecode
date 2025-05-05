<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Test Scanner Code-Barres</title>
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
  <style>
    #reader {
      width: 100%;
      max-width: 400px;
      margin: auto;
      padding: 10px;
      background: #000;
    }
    input {
      margin: 10px auto;
      display: block;
      width: 80%;
      padding: 8px;
      font-size: 16px;
    }
    #startBtn {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #28a745;
      color: white;
      font-size: 18px;
      cursor: pointer;
      border: none;
      border-radius: 5px;
    }
    #startBtn:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>

  <h3 style="text-align:center">Scanner un Code-Barres</h3>
  <input type="text" id="result" placeholder="Résultat du scan..." readonly>
  <button id="startBtn">Démarrer le scanner</button>
  <div id="reader" style="display:none;"></div>

  <script>
    const html5QrCode = new Html5Qrcode("reader");

    // Fonction pour démarrer le scanner
    function startScanner() {
      document.getElementById("reader").style.display = "block"; // Afficher la caméra
      document.getElementById("startBtn").style.display = "none"; // Cacher le bouton

      html5QrCode.start(
        { facingMode: "environment" }, // Utilise la caméra arrière
        { fps: 10, qrbox: 250 }, // Configuration
        (decodedText, decodedResult) => {
          document.getElementById("result").value = decodedText; // Afficher le code scanné
          html5QrCode.stop(); // Arrêter le scanner après un scan
        },
        (errorMessage) => {
          // Log d'erreur sans arrêter le scan
        }
      ).catch((err) => {
        console.error("Erreur du scanner", err);
      });
    }

    // Écouteur pour démarrer le scanner au clic du bouton
    document.getElementById("startBtn").addEventListener("click", startScanner);
  </script>

</body>
</html>
