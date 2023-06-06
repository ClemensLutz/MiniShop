<?php
$benutzername = $_REQUEST["benutzername"];
$passwort = $_REQUEST["passwort"];
$email = $_REQUEST["email"];

$benutzernameSession = $_SESSION["benutzername"];
$passwortSession = $_SESSION["passwort"];
$emailSession = $_SESSION["email"];

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

// bei String einfaches Hochkomma
$sql = "INSERT INTO benutzer(benutzername, passwort, email) VALUES ('$benutzername','$passwort', '$email')";
$result = $conn->query($sql);

$conn->close();
header("Location: minishop.php")


?>