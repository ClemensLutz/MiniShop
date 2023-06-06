<?php
Session_start();
?>
<?php
$ArtikelID = intval($_REQUEST["ArtikelID"]);
$benutzername = $_SESSION["Benutzer"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minishop";

//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM Benutzer where Benutzername = '$benutzername'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) { 
        $BenutzerNR = $row["benutzerId"]; 
    } 
}



// bei String einfaches Hochkomma
$sql = "INSERT INTO warenkorb (ArtikelID, ArtikelName, preis, Dateipfad) 
(select ArtikelID, ArtikelName, preis, Dateipfad from produkte where ArtikelID = $ArtikelID ) ON DUPLICATE KEY UPDATE anzahl=anzahl+1 ";

$result = $conn->query($sql);

$sql2 = "Update warenkorb set BenutzerID = (select benutzerId from benutzer where benutzername = '$benutzername') where BenutzerID = 0";
$result = $conn->query($sql2);

$conn->close();
header("Location: Produkte.php")


?>