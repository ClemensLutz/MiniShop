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
    </head>



    <body >
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
                      <a class="nav-link me-5 ms-3" href="./Registrieren.html"><h2>Sie haben noch keinen Account? -> Registrieren</h2></a>
                    </li>
                    
                </ul>
            </div>
            </div>
            </nav>
          </div> 




<div class="container-fluid">
<div class="row">


          <div class="col-sm-6 py-5 ps-5 pe-5 bg-secondary text-black text-center ">
            <br><br><br>
            <div class="col-sm-12 ps-5 pe-5 bg-secondary text-seconday text-center">
            <h2>

              <?php
              if(isset($_SESSION["Login_Error"])){
              echo "<p>" . $_SESSION["Login_Error"] . "</p>";
              unset($_SESSION["Login_Error"]);
              }
              ?>
              <br>
              <br>
            
            Melden Sie sich mit Ihren Daten an!</h2>
          </div>




            <br><br>
            <form  method="post" action="vergleichen.php" >
              Benutzername:  <br>   <input type="text" name="benutzernameA" class="border border-3 border-dark"><br>
              Passwort: <br>        <input type="password" name="passwortA" class="border border-3 border-dark"> <br>
                  <button class="m-2" type="submit" class="border border-2 border-dark">Anmelden</button>
          </form>
          
          </div>  
          
              <div class="col-sm-6 py-5 ps-5 pe-5 mt-5 bg-secondary text-black text-center "><img src="../images/shoptitelseite.jpg" height="400" width="450"></div>
            </div>
            </div>
        </div>
        </div>
</div>
    </body>
</html>