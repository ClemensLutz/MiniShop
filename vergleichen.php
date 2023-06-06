<?php
Session_start();

$benutzername = $_REQUEST["benutzernameA"];
$passwort = $_REQUEST["passwortA"];

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
$sql = "select benutzername, Passwort from benutzer where benutzername = '$benutzername' and passwort ='$passwort'";
$result = $conn->query($sql);

$sql2 = "select benutzerid from benutzer where benutzername = '$benutzername' and passwort = '$passwort'";
$result2 = $conn->query($sql2);

if ($result2->num_rows>0){
    $_SESSION["BenutzerID"]= $result2;
    
}

if ($result->num_rows>0){
    $_SESSION["Benutzer"]= $benutzername;
    header("Location: Minishop.php");
    exit();
} else {
    $_SESSION["Login_Error"]= "Login Daten falsch!";
    header("Location: Anmelden.php"); 
    exit();
}


?>