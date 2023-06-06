
<?php
Session_start();

  
if(!isset($_SESSION["Benutzer"])){
    header("Location: Anmelden.php"); 
    exit();
}
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
          h3{ 
            position:absolute;
            top:45px;
            right:50px;

          }


          
          </style>
    </head>
    <body>


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
                      <a class="nav-link me-5 ms-3" href="./Warenkorb.php"><h2>Warenkorb</h2></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./Produkte.php"><h2>Produkte</h2></a>
                    </li>
                    <li class="nav-item ">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                      <?php echo "<h3>" . $_SESSION["Benutzer"] . "</h3>"; ?></a> 
                    <ul class="dropdown-menu dropdown-menu-end me-2 bg-secondary border border-dark border-2"> 
                      <li><a class="dropdown-item p-3 text-center  " href="logout.php"> <strong> Logout - Abmelden </strong> </a></li>
                    </ul> 
                  </li>    
                </ul>
            </div>
            </div>
            </nav>
          </div>  
    

<div class="container-fluid bg-secondary">
<div class="row ">

          <div class="col-sm-6 py-5 ps-5 pe-5 bg-secondary text-black text-center ">
            <br> <br> <br>
          <img class ="rounded-5" src="../images/sportequipment_titelseite.jpg">
          
          </div>  
          
              <div class="col-sm-6 py-5 ps-5 pe-5 mt-5 bg-secondary text-black text-center;"><img src="../images/shoptitelseite.jpg" height="400" width="450" class="float-end me-5"></div>
            </div>
            </div>
        </div>

    </body>


</html>