<?php
if(session_status()==PHP_SESSION_NONE){
  session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
  <script src="convalidacontatta.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/style.css">
        <?php include ("src/shared/sidebar.php");?>
</head>
<body>
</div>
<!--<div class="fixedcomm">-->
</div>

<div class="fixedcomm">
<div class="containercomm">
  <h3>Contatta L'Artista</h3><br><br>
  <form action="contattaci.php"name="formmail" method="post">

    <label for="fnome">Nome</label>
    <input type="text" id="fnome" name="fnome" placeholder="il tuo nome">

    <label for="femail">E-mail</label>
    <input type="text" id="femail" name="femail" placeholder="la tua mail">

    <label for="fmessaggio">Messaggio</label>
    <textarea id="fmessaggio" name="fmessaggio" placeholder="Scrivi il messaggio.." style="height:200px"></textarea>

    <div><?php include ('contattaci.php'); echo $errore.$msg; ?></div>

    <input type="submit" name"submit" id="submit" value="invia">
  </form>

</div>
</div>
</body>
</html>
