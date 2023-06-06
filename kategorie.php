<?php
// Parameter holen
$params = json_decode($_POST["params"], false);

// Verbindung herstellen
$connection = new mysqli("localhost", "root", "", "minishop");
if ($connection->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $connection->connect_error);
} 
// die Daten holen und JSON erzeugen:
$stmt = $connection->prepare(
        "SELECT ArtikelID, ArtikelName, Beschreibung, Preis,  Dateipfad " .  
        " FROM produkte WHERE kategorieid = ?");
$stmt->bind_param("d", $params->id);
$stmt->execute();
$resultset = $stmt->get_result();
$all = $resultset->fetch_all(MYSQLI_ASSOC);
echo json_encode($all);
?>