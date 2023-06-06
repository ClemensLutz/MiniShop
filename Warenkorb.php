<?php
Session_start();
?>
<!DOCTYPE html>
<html>

<head>
<title>MiniShop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
          h2{ 
            position:absolute;
            top:40px;
            right:50px;

          }

          h3{ 
            position:absolute;
            top:45px;
            right:250px;

          }

body{
    background-color:rgb(108,117,125);
}

h1{
    position: absolute;
    left:550px;
    top:300px;
}

p{
    
    color: black;
    text-align: center;
    background-color:grey;
    
    font-size: 30px;
    font-family: 'Source Sans Pro', sans-serif;
    
    border: 1px solid ;
    border-radius: 5px;
    text-decoration: none;
    
}


table{
    
    width: 50%;
    border-collapse: collapse;
    width: 100%;
}

 td{
    height: 80px;
    text-align:center;
}

 th{
    
    border: 2px solid black;
    background-color: rgb(103, 103, 102);
    margin: 10%;
    text-align:center;
}
</style>

    

</head>
<body>
<div class="bg-secondary">
<div class="header bg-secondary">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid ">
              <a class="navbar-brand" href="./MiniShop.php"> <img style="width:110px;" src="../images/shopheader.jpg"> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
            <div class="collapse navbar-collapse " id="collapsibleNavbar">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link me-5 ms-3" href="./Produkte.php"><h3>Produkte</h3></a>
                    </li>
                    <li class="nav-item ">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                      <?php echo "<h2>" . $_SESSION["Benutzer"] . "</h2>"; ?></a> 
                    <ul class="dropdown-menu dropdown-menu-end me-2 bg-secondary border border-dark border-2"> 
                      <li><a class="dropdown-item p-3 text-center  " href="logout.php"> <strong> Logout - Abmelden </strong> </a></li>
                    </ul> 
                  </li>    
                </ul>
            </div>
            </div>
            </nav>
          </div> 

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minishop";

$conn = new mysqli($servername, $username, $password, $dbname);


if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$benutzername = $_SESSION["Benutzer"];
$benutzerid = $_SESSION["BenutzerID"];

$sql = "SELECT *  FROM Warenkorb where BenutzerID = (select benutzerid from benutzer where benutzername = '$benutzername')";
$result = $conn->query($sql);  


if ($result->num_rows > 0) {
    echo "<table border='2'cellpadding='10'>";
    echo "<tr>";
    echo "<th>ID</th> <th>Name</th> <th>Anzahl</th> <th>Gesamtpreis</th>  ";
    echo "</tr>";


    while($row = $result->fetch_assoc()) {
      $Bild = $row["Dateipfad"];
      // output data of each row"
      $ArtikelID = $row["ArtikelID"];
      $anzahl = $row["anzahl"];
      $Preis = $row["Preis"];
      echo "<tr>";
      echo "<td>"  . $row["ArtikelID"] . "</td >  "; 
      echo "<td>" . $ArtikelName = $row["ArtikelName"] .  "</td>"; 
      echo "<td>" . $row["anzahl"] . "</td>";
      echo "<td>" . $row["Preis"] . "</td>";      
      echo "<td>" . "<img src ='$Bild' height='120' width='150'>" . "</td>";
      
      $link = 'delete.php?anzahl=' . $anzahl . '&ArtikelID=' . $ArtikelID;
      $link2 = 'add.php?Preis=' . $Preis . '&ArtikelID=' . $ArtikelID;
      echo "<td> <a href='$link'>  <p>-</p></a></td>";
      echo "<td> <a href='$link2'>  <p>+</p></a></td>";
      
      
      
      echo "</tr>";

    

  }
    echo "</table>";
  } else {
    echo "<h1>" . "Der Warenkorb ist leer!" . "</h1>";
  }

  $conn->close();


?>

</div>
</body>
</html>