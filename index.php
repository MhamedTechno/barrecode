<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Test Scanner Code-Barres</title>
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</head>
<body>
  <h3 style="text-align:center">Scanner un Code-Barres</h3>
  <input type="text" id="result" placeholder="Résultat du scan..." readonly>
  <button id="startBtn">Démarrer le scanner</button>
  <div id="reader" style="display:none;"></div>

  <script>
    const html5QrCode = new Html5Qrcode("reader");
    function startScanner() {
      document.getElementById("reader").style.display = "block";
      document.getElementById("startBtn").style.display = "none";

      html5QrCode.start(
        { facingMode: "environment" },
        { fps: 10, qrbox: 250 }, 
        (decodedText, decodedResult) => {
          document.getElementById("result").value = decodedText; 
          html5QrCode.stop();
        },
        (errorMessage) => {
        }
      ).catch((err) => {
        console.error("Erreur du scanner", err);
      });
    }
    document.getElementById("startBtn").addEventListener("click", startScanner);
  </script>

</body>
</html>
