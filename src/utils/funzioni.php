<?php

//FUNZIONI  DI UTILITA' GENERALE

//stabilisco un percorso per i uploads
$cartellaImg = 'dipintiNegozio';


//crea una funzione per le operazioni CRUD sul DB
function query($sql){
global $connessione;
return mysqli_query($connessione , $sql);
}

//funzione per la gestione degli errori di connessione
function conferma($risultato){
    global $connessione;
    if(!$risultato){
        die('Richiesta fallita' . mysqli_error($connessione));
        }
}

//funzione per ciclare l'array e ricavare dati dal DB
function fetch_array($risultato){
    return mysqli_fetch_array($risultato);
}

//funzione per la gestione dei messaggi
function creaAvviso($msg){
if(!empty($msg)){
  $_SESSION['messaggio'] = $msg;
}else{
  $msg = " ";
}
}

//funzione per  mostrare un messaggio all'interno di una pagina
function mostraAvviso(){
if(isset($_SESSION['messaggio'])){
echo $_SESSION['messaggio'];
unset ($_SESSION['messaggio']);
}
}

//funzione per ricavare e mostare il risultato dell'ultima sessione avviata
function idUltimo(){
global $connessione;
  return mysqli_insert_id($connessione);
}


//funzione per gestire il percorso della cartella delle immagini
function mostraImg($imgProdotto){
  global $cartellaImg;
 return $cartellaImg . 'DS' . $imgProdotto;
}


//FUNZIONI DEL FRONTEND

//crea una funzione per mostrare i prodotti nelll'home del negozio
function mostraProdotti(){
$ricercaProdotti = query('SELECT * FROM prodotti WHERE e_comprato = false LIMIT 50');

conferma($ricercaProdotti);

while ($row = fetch_array($ricercaProdotti)){
    //echo $row['nome_prodotto'];

    $prodotti = <<<STRINGA_PDT

    <div class="card">
        <img src="../assets/{$row['dipinto']}" alt="Denim Jeans" style="width:100%">
        <p><button><a href="prodotto.php?id={$row['id_prodotto']}">Dettagli</a></button></p><br>
        <h1><a >{$row['nome_prodotto']}</a></h1><br>
        <p class="price">{$row['prezzo']}€</p><br>
        <p></p><br>
      </div>
STRINGA_PDT;
echo $prodotti;
}
}

//crea una funzione per mostrare i prodotti nelll'home della galleria
function mostraProdottiGalleria(){
$ricercaGalleria = query('SELECT * FROM galleria LIMIT 50');

conferma($ricercaGalleria);

while ($row = fetch_array($ricercaGalleria)){
    //echo $row['nome_prodotto'];

    $Galleria = <<<STRINGA_PDT



    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="../assets/{$row['immagine']}" style="width:100%">
      <div class="text">{$row['nome_img']}</div>
    </div>


STRINGA_PDT;
echo $Galleria;
}
}

//FUNZIONI DEL BACKEND

//crea una funzione per mostrare tutti i prodotti in una tabella
function prodottiAdmin(){
$mostraPdt = query("SELECT * FROM prodotti");
conferma($mostraPdt);

while($row = fetch_array($mostraPdt)){


$pdt_in_admin = <<< STRINGA

<tr>
<td>{$row['id_prodotto']}</td>
<td>{$row['nome_prodotto']}</td>
 <td><img src="../../assets/dipintiNegozio/{$row['dipinto']}" alt="" style="width:25%"></td>
<td>€{$row['prezzo']}</td>
<td><a class="btn btn-primary" href="index.php?aggiorna-pdt&id={$row['id_prodotto']}" role="button">Modifica</a>
<td><a class="btn btn-danger" href="../../src/admin/cancella-pdt.php?id={$row['id_prodotto']}" role="button">Cancella</a> </td>
</tr>

STRINGA;
echo  $pdt_in_admin;
}
}

  //crea una funzione per aggiungere nuovi prodotti tramite un form
function aggiungiPdt(){
if(isset($_POST['aggiungi'])){

  $nomePdt = $_POST['nome_prodotto'];
  $prezzo = $_POST['prezzo'];
  $immaginePdt = $_FILES['dipinto']['name'];
  $immagineTemp = $_FILES['dipinto']['tmp_name'];

  move_uploaded_file($immagineTemp , 'assets/dipintiNegozio/' . $immaginePdt);

  $nuovoPdt = query("INSERT INTO prodotti(nome_prodotto , prezzo , dipinto) VALUES('{$nomePdt}' , '{$prezzo}' , 'dipintiNegozio/{$immaginePdt}')");
  conferma($nuovoPdt);
  creaAvviso('hai aggiunto correttamente un quadro');
  //header('Location:index.php?prodotti-admin');

}
}

//crea una funzione per modificare prodotti esistenti richiamandoli in un form
function aggiornaProdotto(){
if(isset($_POST['aggiorna'])){

  $nomePdt = $_POST['nome_pdt'];
  $prezzo = $_POST['prezzo'];
  $immaginePdt = $_FILES['dipinto']['name'];
  $immagineTemp = $_FILES['dipinto']['tmp_name'];

  if(empty($immaginePdt)){

    $cercaImg = query("SELECT dipinto FROM prodotti WHERE  id_prodotto = {$_GET['id']} ");
    conferma($cercaImg);

    while($img = fetch_array($cercaImg)){
$immaginePdt = $img['dipinto'];
    }
  }

  move_uploaded_file($immagineTemp , 'IMG_UPLOADS' . 'DS' . $immaginePdt);

$update = query("UPDATE prodotti SET nome_prodotto = '{$nomePdt}' , prezzo =  '{$prezzo}' , dipinto =  '{$immaginePdt}' WHERE  id_prodotto = {$_GET['id']}");

conferma($update);

creaAvviso('hai modificato correttamente un prodotto');
//header('Location:index.php?prodotti-admin');

}
}

//crea una funzione per mostrare e cancellare gli ordini nel lato amministrativo
function ordini(){
  $ordiniMostra = query("SELECT * FROM ordini");
  conferma($ordiniMostra);

  while($row = fetch_array($ordiniMostra)){

    $ordineId = $row['id_ordine'];
    $importoOrdine = $row['importo_ordine'];
    $numeroOrdine = $row['num_ordine'];
    $statusOrdine = $row['status_ordine'];

    $ordine_admin = <<<STRINGA
    <tr>
    <td>{$ordineId}</td>
    <td>{$importoOrdine}</td>
    <td>{$numeroOrdine}</td>
    <td>{$statusOrdine}</td>
    <td><a class="btn btn-danger" href="../../src/admin/cancella-ordini.php?id={$row['id_ordine']}" role="button">Cancella</a> </td>
</tr>

STRINGA;

  echo $ordine_admin;
  }
  }

//crea una funzione per mostrare e cancellare i rapporti nel lato amministrativo
  function rapporti(){
    $rapportiMostra = query("SELECT * FROM rapporti");
    conferma($rapportiMostra);

    while($row = fetch_array($rapportiMostra)){

      $rapportoId = $row['id_rapporto'];
      $idProdotto = $row['id_prodotto_fk'];
      $idOrdine = $row['id_ordine_fk'];
      $nomeProdotto = $row['nome_prodotto'];
      $prezzoOrdine = $row['prezzo'];
      $quantita = $row['quantita_pdt'];

      $rapporti_admin = <<<STRINGA
      <tr>
      <td>{$rapportoId}</td>
      <td>{$idProdotto} </td>
      <td>{$idOrdine}</td>
      <td>{$nomeProdotto}</td>
      <td>{$prezzoOrdine}</td>
      <td>{$quantita}</td>
      <td><a class="btn btn-danger" href="../../src/admin/cancella-rapporti.php?id={$row['id_rapporto']}" role="button">Cancella</a> </td>
  </tr>

STRINGA;

    echo $rapporti_admin;
    }
    }
