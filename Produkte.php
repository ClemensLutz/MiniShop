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
          #schuhHEAD{ 
            /*scroll-behavior: smooth;*/
            position:absolute;
            top:45px;
            left:150px;

          }
          #handHEAD{ 
            /* scroll-behavior: smooth; */
            position:absolute;
            top:45px;
            left:430px;

          }
          #ballHEAD{ 
            /* scroll-behavior: smooth; */
            position:absolute;
            top:45px;
            left:320px;

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



p:visited { text-decoration: none; }


p:hover {  background-color:lightgrey; }


p:active { text-decoration: none; }

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
    /*margin: 0%;*/
    text-align:center;
    
}


body{
    background-color:rgb(108,117,125);
}

#schuhe{
  margin-top:20px;
  position:absolute;
  top:120px;
}

#fussball{
  margin-top:20px;
  position:absolute;
  top:320px;
}

#balltab{
    width: 50%;
    border-collapse: collapse;
    width: 100%;
    position:absolute;
    top: 200px;
}

</style>

</head>


<!--  -->


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
                      <a class="nav-link me-5 ms-3" id="schuhHEAD" href="#schuhSC" onclick="show_artikel(1)"><h4>Fussballschuh</h4></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link me-5 ms-3" id="ballHEAD" href="#ballSC" onclick="show_artikel(2)"><h4>Fussball</h4></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link me-5 ms-3"  id="handHEAD" href="#handSC" onclick="show_artikel(3)"><h4>Handschuh</h4></a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link me-5 ms-3" href="./Warenkorb.php"><h3>Warenkorb</h3></a>
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


<!-- // Clientteil:    asynchron -->
 <script>
           function show_artikel(id) {
                
                // objekt mit Parameterwerten als Attrribute aufbauen
                let obj = { 
                    "id": id
                };
                // und in einen String umwandeln
                let params = JSON.stringify(obj);
                
                
                // Hier gehts los
                let x = new XMLHttpRequest();
                x.onload = function() {
                        let arr  = JSON.parse(this.responseText);
                         document.getElementById("artikeldiv").innerHTML =
                              formatResultAsHtmlDefinitionList(arr);
                            // alert(JSON.stringify(arr));
                };
               
                // Wer am Server liest die Daten
                x.open("POST","./kategorie.php", false);
                // Definiert das Format der Parameter beim Senden
                x.setRequestHeader("Content-type",
                                   "application/x-www-form-urlencoded");
                x.send("params="+params);
            }
            
            // Nun  als HTLM Definitionlist formatieren
            function formatResultAsHtmlDefinitionList(arr) {
                let s = "<tr>";  
                for (let i = 0; i< arr.length; i++) {
                    let obj = arr[i];
                    s += "<td >"+obj.ArtikelID+" "+"</td>";
                    s += "<td>"+obj.ArtikelName+" "+"</td>";
                    s += "<td>"+obj.Beschreibung+" "+"</td>";
                    s += "<td>"+obj.Preis+" "+"</td>";
                    s += "<td>"+obj.Dateipfad+" "+"</td>";
                    s+="<br>"
                }
                return s + "</tr>";
            }
          
        </script>
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minishop";

$conn = new mysqli($servername, $username, $password, $dbname);


if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}



/*
$sql = "SELECT ArtikelID, ArtikelName, beschreibung, Preis, KategorieName, Dateipfad  FROM Produkte where Kategoriename = 'Fussballschuhe'";
$result = $conn->query($sql);  


if ($result->num_rows > 0) {
    echo "<table class='balltab' border='2' cellpadding='15'>";
    echo "<tr>";
    echo "<br><br>";
    echo "<h1 class ='schuhe' id='schuhSC'>Fußballschuhe</h1>";
    echo "<th>ID</th> <th>Name</th> <th>Beschreibung</th> <th>Preis</th> <th>Kategorie</th> ";
    echo "</tr>";
    
    while($row = $result->fetch_assoc()) {
      $Bild = $row["Dateipfad"];
      // output data of each row"
      echo "<tr>"; 
      
      echo "<td>" . $row["ArtikelID"] . "</td > <br>"; 
      echo "<td>" . $ArtikelName = $row["ArtikelName"] .  "</td>"; 
      echo "<td>" . $row["beschreibung"] . "</td>";
      echo "<td>" . $row["Preis"] . "</td>";
      echo "<td>" . $row["KategorieName"] . "</td>";
      echo "<td>" . "<img src ='$Bild' height='100' width='170'>"."</td>";
      echo "<td > <a  href='InsertWarenkorb.php?ArtikelID=" . $row["ArtikelID"] ."'><p>Hinzufügen</p></a></td>";
      
      echo "</tr>";

        
      


  }
    echo "</table>";
  } else {
    echo "0 results";
  }

  $conn->close();


?> 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minishop";

$conn = new mysqli($servername, $username, $password, $dbname);


if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT ArtikelID, ArtikelName, beschreibung, Preis, KategorieName, Dateipfad  FROM Produkte where Kategoriename = 'Fussball'";
$result = $conn->query($sql);  


if ($result->num_rows > 0) {
    echo "<table border='2' cellpadding='10'>";
    echo "<tr>";
    echo "<br><br>";
    echo "<h1 class = 'fussball' id='ballSC'>Fußbälle</h1>";
    echo "<th>ID</th> <th>Name</th> <th>Beschreibung</th> <th>Preis</th> <th>Kategorie</th> ";
    echo "</tr>";
    
    while($row = $result->fetch_assoc()) {
      $Bild = $row["Dateipfad"];
      // output data of each row"
      echo "<tr>"; 
      
      echo "<td>" . $row["ArtikelID"] . "</td > <br>"; 
      echo "<td>" . $ArtikelName = $row["ArtikelName"] .  "</td>"; 
      echo "<td>" . $row["beschreibung"] . "</td>";
      echo "<td>" . $row["Preis"] . "</td>";
      echo "<td>" . $row["KategorieName"] . "</td>";
      echo "<td>" . "<img src ='$Bild' height='120' width='120'>"."</td>";
      echo "<td > <a  href='InsertWarenkorb.php?ArtikelID=" . $row["ArtikelID"] ."'><p>Hinzufügen</p></a></td>";
      
      echo "</tr>";

        
      


  }
    echo "</table>";
  } else {
    echo "0 results";
  }

  $conn->close();


?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minishop";

$conn = new mysqli($servername, $username, $password, $dbname);


if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT ArtikelID, ArtikelName, beschreibung, Preis, KategorieName, Dateipfad  FROM Produkte where Kategoriename = 'Handschuh'";
$result = $conn->query($sql);  


if ($result->num_rows > 0) {
    echo "<table class='balltab' border='2' cellpadding='10'>";
    echo "<tr>";
    echo "<br><br>";
    echo "<h1 class ='handschuh' id='handSC'>Handschuhe</h1>";
    echo "<th>ID</th> <th>Name</th> <th>Beschreibung</th> <th>Preis</th> <th>Kategorie</th> ";
    echo "</tr>";
    
    while($row = $result->fetch_assoc()) {
      $Bild = $row["Dateipfad"];
      // output data of each row"
      echo "<tr>"; 
      
      echo "<td>" . $row["ArtikelID"] . "</td > <br>"; 
      echo "<td>" . $ArtikelName = $row["ArtikelName"] .  "</td>"; 
      echo "<td>" . $row["beschreibung"] . "</td>";
      echo "<td>" . $row["Preis"] . "</td>";
      echo "<td>" . $row["KategorieName"] . "</td>";
      echo "<td>" . "<img src ='$Bild' height='130' width='100'>"."</td>";
      echo "<td > <a  href='InsertWarenkorb.php?ArtikelID=" . $row["ArtikelID"] ."'><p>Hinzufügen</p></a></td>";
      
      echo "</tr>";

        
      


  }
    echo "</table>";
  } else {
    echo "0 results";
  }

  $conn->close();

*/
?>

<div id="artikeldiv">
</div>

    
<!-- <button type="submit" onclick="show_artikel(1)">button<button> -->

</div>
</body>

</html>