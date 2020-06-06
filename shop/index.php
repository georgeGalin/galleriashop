<?php
if(session_status()==PHP_SESSION_NONE){
  session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
        <?php include ("src/shared/sidebar.php"); ?>
</head>
<body>
  <div class="fixedneg">
    <?php mostraProdotti(); ?>
  </div>
</body>
</html>
