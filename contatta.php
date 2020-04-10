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
</div>
<!--<div class="fixedcomm">-->
</div>
<h3>Contatta L'Artista</h3>
<div class="fixedcomm">
<div class="containercomm">
  <form action="contattaci.php" method="post">
    <label for="fname">Nome</label>
    <input type="text" id="fname" name="name" placeholder="il tuo nome">

    <label for="lname">Cognome</label>
    <input type="text" id="lname" name="surname" placeholder="il tuo cognome">

      <label for="email">E-mail</label>
    <input type="text" id="email" name="email" placeholder="la tua mail">


    <label for="subject">Messaggio</label>
    <textarea id="subject" name="subject" placeholder="Scrivi qualcosa.." style="height:200px"></textarea>

    <input type="submit" value="Invia">
  </form>

</div>
</div>
</body>
</html>
