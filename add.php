<?php
Session_start();
?>

<?php
//$Preis = intval($_REQUEST["Preis"]);   // Lesen der Parameter
$Artikelid = intval($_REQUEST["ArtikelID"]);

// Schreiben in die DB
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minishop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// prepared statement

$benutzername = $_SESSION["Benutzer"];

$sql = "SELECT *  FROM Produkte";
$result = $conn->query($sql);  

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $Preis = $row["Preis"];
}
}

$sql2 ="UPDATE  warenkorb set anzahl = anzahl + 1 where ArtikelID = ?  and BenutzerID = (select benutzerid from benutzer where benutzername = '$benutzername')";

$stmt = $conn->prepare($sql2);
$stmt->bind_param("i", $Artikelid);
$stmt->execute();
$stmt->close();


$sql ="UPDATE  warenkorb set preis = preis + $Preis where ArtikelID = ? and BenutzerID = (select benutzerid from benutzer where benutzername = '$benutzername')";


$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $Artikelid);
$stmt->execute();
$stmt->close();



$conn->close();

// Seite Warenkorb.php anzeigen
header("Location: Warenkorb.php");
?>

