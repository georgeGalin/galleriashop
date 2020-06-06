
<?php include ("src/utils/connessione.php"); ?>
    <!--Faccio il menu con un height fisso e infinito-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  <div class="sinistra">

          <div class="dropdown">
          <button class="dropbtn">menu</button>
              <div class="dropdown-content">
                  <a href="../home/index.php">Home</a>
                  <a href="../biografia/biografia.php">Biografia</a>
                  <a href="../contatta/contatta.php">Contatta</a>
                  <a href="../shop/index.php">Negozio</a>
              </div>
          </div>
          <div class="fixedfirma">
  <img src="../assets/firma-mamma.png">
  </div>
  </div>
<a href="../src/checkout.php"><img src="../../assets/carrello.svg" class="imgcarrello" ></a>

<?php if(isset($_SESSION['ruolo']) && $_SESSION['ruolo']== '1') : ?>
<a href='../src/admin/index.php'><img src='../../assets/admin.svg' class='imgadmin' ></a>;
<?php endif; ?>

<?php

if(isset($_SESSION['username'])){
    echo "<p class='benvenuto'>Benvenuto</p>";
    echo "<a href='../../src/login/logout.php' class='logout'>LOGOUT</a>";
    return("../../home/index.php");

}else{
    include("src/login/login.php");
    include("src/singup/registrati.php");
  }

?>
