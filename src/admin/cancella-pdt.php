<?php include ("src/utils/connessione.php"); ?>

<?php
if(isset($_GET['id'])){

    $cancellaPdt = query("DELETE FROM prodotti WHERE id_prodotto = $_GET[id] ");
conferma($cancellaPdt);

creaAvviso('Hai cancellato correttamente un prodotto');
header('Location: index.php?prodotti-admin');
}else{
header('Location: index.php?prodotti-admin');

}
