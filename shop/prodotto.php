<?php include ("src/shared/sidebar.php"); ?>

<?php
$pdtSingolo = query("SELECT * FROM prodotti WHERE id_prodotto = {$_GET['id']}");
conferma($pdtSingolo);
while($row = fetch_array($pdtSingolo)):
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>
<div class="fixedneg">
 <div class="card">
     <img src="../assets/<?php echo $row['dipinto']; ?>">
     <a href="../src/carrello.php?add=<?php echo $row['id_prodotto']; ?>"><button type="button">Acquista</button></a>
     <h1><a href="#"><?php echo $row['nome_prodotto']; ?></a></h1><br>
     <p class="price"><?php echo $row['prezzo'];?>€</p><br>
     <p></p><br>
   </div>

  </div>
<?php endwhile ?>
</div>
</div>

</body>
</html>
