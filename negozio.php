<?php
if(session_status()==PHP_SESSION_NONE){
  session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
        <?php

        /*    include("funzioni.php");*/
            include ("menu.php");

         ?>
</head>
<body>
<div class="fixedneg">
<h2 style="text-align:center">Product Card</h2>

<div class="card">
  <img src="dipintiN/bisticcio.png" alt="Denim Jeans" style="width:100%">
  <button>Acquista</button><br>
  <h1>Bisticcio</h1><br>
  <p class="price">€1000</p><br>
  <p></p><br>
  <p></p><br>
</div>

<div class="card">
    <img src="dipintiN/Alla ricerca del conoscere.png" alt="Denim Jeans" style="width:100%">
    <p><button>Acquista</button></p><br>
    <h1>Alla ricerca del conoscere</h1><br>
    <p class="price">€1000</p><br>
    <p></p><br>
  </div>

  <div class="card">
    <img src="dipintiN/Evoluzione.png" alt="Denim Jeans" style="width:100%">
    <p><button>Acquista</button></p><br>
    <h1>Evoluzione</h1><br>
    <p class="price">€1000</p><br>
    <p></p><br>
  </div>

  <div class="card">
    <img src="dipintiN/Germogli.png" alt="Denim Jeans" style="width:100%">
    <p><button>Acquista</button></p><br>
    <h1>Germogli</h1><br>
    <p class="price">€1000</p><br>
    <p></p><br>
  </div>

  <div class="card">
    <img src="dipintiN/I bari.png" alt="Denim Jeans" style="width:100%">
    <p><button>Acquista</button></p><br>
    <h1>I Bari</h1><br>
    <p class="price">€1000</p><br>
    <p></p><br>

  </div>

  <div class="card">
    <img src="dipintiN/L'uomo e il mondo.png" alt="Denim Jeans" style="width:100%">
    <p><button>Acquista</button></p><br>
    <h1>L'uomo e il mondo</h1><br>
    <p class="price">€1000</p><br>
    <p></p><br>

  </div>

  <div class="card">
    <img src="dipintiN/La Madonna.png" alt="Denim Jeans" style="width:100%">
    <p><button>Acquista</button></p><br>
    <h1>La madonna</h1><br>
    <p class="price">€1000</p><br>
    <p></p><br>

  </div>

  <div class="card">
    <img src="dipintiN/La ribellione degli elementi.png" alt="Denim Jeans" style="width:100%">
    <p><button>Acquista</button></p><br>
    <h1>La ribelione degli elementi</h1><br>
    <p class="price">€1000</p><br>
    <p></p><br>

  </div>


  <div class="card">
    <img src="dipintiN/maria e Maddalena.png" alt="Denim Jeans" style="width:100%">
    <p><button>Acquista</button></p><br>
    <h1>Maria e Maddalena</h1><br>
    <p class="price">€1000</p><br>
    <p></p><br>

  </div>

  </div>

</div>
</div>

</body>
</html>
