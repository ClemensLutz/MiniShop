<?php
Session_start();
?>

<?php
$Artikelid = intval($_REQUEST["ArtikelID"]);   // Lesen der Parameter
$anzahl = intval($_REQUEST["anzahl"]);

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

$sql = "SELECT *  FROM Produkte";
$result = $conn->query($sql);  

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $Preis = $row["Preis"];
}
}

$benutzername = $_SESSION["Benutzer"];

if($anzahl > 1){
$anzahlNeu = $anzahl -1;
$sql2 ="UPDATE  warenkorb set anzahl = $anzahlNeu where ArtikelID = ? and BenutzerID = (select benutzerid from benutzer where benutzername = '$benutzername')";
$stmt = $conn->prepare($sql2);
$stmt->bind_param("i", $Artikelid);
$stmt->execute();
$stmt->close();

$sql ="UPDATE  warenkorb set preis = preis - $Preis where ArtikelID = ? and BenutzerID = (select benutzerid from benutzer where benutzername = '$benutzername')";


$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $Artikelid);
$stmt->execute();
$stmt->close();

}else{

$sql = "delete from warenkorb where ArtikelID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $Artikelid);
$stmt->execute();
$stmt->close();

}



$conn->close();

// Seite datenholen.php anzeigen
header("Location: Warenkorb.php");
?>