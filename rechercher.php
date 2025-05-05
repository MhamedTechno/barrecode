<?php
require_once 'db.php';

if (isset($_GET['code'])) {
    
    $code = $conn->real_escape_string($_GET['code']);
    $sql = "SELECT * FROM produits WHERE code_barre = '$code'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $produit = $result->fetch_assoc();
        echo "<strong> Produit trouvé :</strong><br>";
        echo "Nom : " . $produit['nom'] . "<br>";
        echo "Prix : " . number_format($produit['prix'], 2) . " DH";
    } else {
        echo "Aucun produit trouvé avec ce code-barres.";
    }
}
?>
