

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">


  </head>
  <body>
    <!--Faccio il menu con un height fisso e infinito-->
  <div class="sinistra">

          <div class="dropdown">
          <button class="dropbtn">menu</button>
              <div class="dropdown-content">
                  <a href="index.php">Home</a>
                  <a href="biografia.php">Biografia</a>
                  <a href="contatta.php">Contatta</a>
                  <a href="negozio.php">Negozio</a>
              </div>
          </div>
          <div class="fixedfirma">
  <img src="firma-mamma.png" alt="biografia.php">
  </div>
  </div>



  </body>
</html>
<?php

if(isset($_SESSION["username"])){
    echo "<p class='benvenuto'>Benvenuto</p>";
    echo "<a href='logout.php' class='logout'>LOGOUT</a>";
    echo ($_SESSION["username"]);
    return("index.php");

}else{
    include("login.php");
    include("registrati.php");
  }

?>
