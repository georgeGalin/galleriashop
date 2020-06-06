<?php include ("./shared/sidebar.php"); ?>
<link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

<?php
//$_SESSION['prodotto_' . $_GET['add']] +=1;
//header('Location:../shop/index.php');

// prove con http://localhost:8000/src/msg_cliente.php?tx=7547&amt=300&cc=EUR&st=Completed

if(isset($_GET['add'])){

  $controllaQuantita = query("SELECT * FROM prodotti WHERE id_prodotto= {$_GET['add']}");
  conferma($controllaQuantita);

  while($row = fetch_array($controllaQuantita)){
    if($row['quantita_pdt'] != $_SESSION['prodotto_' . $_GET['add']] ){

      $_SESSION['prodotto_' . $_GET['add']] +=1;
      header('Location:checkout.php');

    }else{
      creaAvviso("Spiacenti, il quadro  " .  $row['nome_prodotto'] . " è unico");
      header('Location:checkout.php');
    }
  }
}

if(isset($_GET['remove'])){

  $_SESSION['prodotto_' . $_GET['remove']] -= 1;
  unset($_SESSION['totale']);
  unset($_SESSION['quantita_art']);
  header('Location:checkout.php');
}

if(isset($_GET['delete'])){

  $_SESSION['prodotto_' . $_GET['delete']] = 0;
  unset($_SESSION['totale']);
  unset($_SESSION['quantita_art']);
  header('Location:checkout.php');
}

function carrello(){
  $totaleOrdine = 0;
  $totArticoli = 0;

  //Variabili  PayPal
  $item_name = 1;
  $item_number = 1;
  $amount = 1;
  $quantity = 1;

  foreach($_SESSION as $name => $value){
    if($value > 0){
      if(substr($name , 0, 9) == 'prodotto_'){

        $lungStringa = strlen($name  )-9;//strlen restituisce la lunghezza (numero di caratteri) di una stringa

        $id = substr($name , 9 , $lungStringa);

        $prodotti = query("SELECT * FROM prodotti WHERE id_prodotto = {$id}");
        conferma($prodotti);

        while($row = fetch_array($prodotti)){
          $importo = $row['prezzo'] * $value;
          $totArticoli += $value;

          $prodottoCarrello = <<<STRINGA_CAR

          <tr>
          <td>{$row['nome_prodotto']}</td>
          <td>{$row['prezzo']}</td>
          <td>$value</td>
          <td>$importo</td>
          <td><a class="btn btn-warning" href="carrello.php?remove={$row['id_prodotto']}" role="button">Rimuovi</a></td>
          </tr>

          <input type="hidden" name="item_name_{$item_name}" value="{$row['nome_prodotto']}">
          <input type="hidden" name="item_number_{$item_number}" value="{$row['id_prodotto']}">
          <input type="hidden" name="amount_{$amount}" value="{$row['prezzo']}">
          <input type="hidden" name="quantity_{$quantity}" value="{$value}">

          STRINGA_CAR;

          echo $prodottoCarrello;
          $item_name++;
          $item_number++;
          $amount++;
          $quantity++;

        }
        $_SESSION['totale'] = $totaleOrdine += $importo;
        $_SESSION['quantita_art'] = $totArticoli ;
      }
    }
  }
}

/*function transazioni(){
  if(isset($_GET['tx'])){

    $prezzo = $_GET['amt'];
    $valuta = $_GET['cc'];
    $transazione = $_GET['tx'];
    $stato = $_GET['st'];
    $totaleOrdine = 0;
    $totArticoli = 0;

    foreach($_SESSION as $name => $value){
      if($value > 0){
        if(substr($name , 0, 9) == 'prodotto_'){

          $lungStringa = strlen($name )- 9;

          $id = substr($name , 9 , $lungStringa);

          $invioOrdine = query("INSERT INTO ordini (importo_ordine , num_ordine , status_ordine , cur_ordine) VALUES ('{$prezzo}' ,  '{$transazione}' , '{$stato}' , '{$valuta}' ) ");
          $lastId = idUltimo();
          conferma($invioOrdine);

          $prodotti = query("SELECT * FROM prodotti WHERE id_prodotto = {$id}");
          conferma($prodotti);

          while($row = fetch_array($prodotti)){
            $prezzo_pdt = $row['prezzo'];
            $nome_pdt = $row['nome_prodotto'];
            $importo = $row['prezzo'] * $value;
            $totArticoli += $value;

            $invioRapporto = query("INSERT INTO rapporti (id_prodotto , id_ordine , nome_prodotto , prezzo, quantita_pdt) VALUES ('{$id}' ,  '{$lastId}' , '{$nome_pdt}' , '{$prezzo_pdt}' ,   '{$value}') ");
            conferma($invioRapporto);
          }
          $totaleOrdine += $importo;
          echo $totArticoli ;
        }
      }
    }
    session_destroy();
  }else{
    header('Location:../shop/index.php');
  }
}

*/




 function transazioni(){

         if(isset($_GET['tx'])){

                 $prezzo = $_GET['amt'];
                 $valuta = $_GET['cc'];
                $transazione = $_GET['tx'];
                $stato = $_GET['st'];
                 $totArticoli = 0;
                 $totale = 0;

                 foreach($_SESSION as $name => $value){
                     if($value > 0){
                     if(substr($name , 0, 9) == 'prodotto_'){

                     $lungStringa = strlen($name )- 9;
                     $id = substr($name , 9 , $lungStringa);

                     $invioOrdine = query("INSERT INTO ordini (importo_ordine , num_ordine , status_ordine , cur_ordine) VALUES ('{$prezzo}'  , '{$transazione}' ,'{$stato}' , '{$valuta}' ) ");

                     $lastId =  idUltimo();
                     conferma($invioOrdine);

                     $prodotti = query("DELETE FROM prodotti WHERE id_prodotto = {$id}");
                     conferma($prodotti);

                     while($row = fetch_array($prodotti)){
                         $prezzo_pdt = $row['prezzo'];
                         $nome_pdt = $row['nome_prodotto'];
                         $importo = $row['prezzo'] * $value;
                         $totArticoli += $value;
                         echo "INSERT INTO rapporti (id_prodotto_fk, id_ordine_fk, nome_prodotto, prezzo, quantita_pdt) VALUES ('{$id}' , '{$lastId}' , '{$nome_pdt}'  , '{$prezzo_pdt}' , '{$value}') ";

                         $invioRapporto = query("INSERT INTO rapporti (id_prodotto, id_ordine, nome_prodotto, prezzo, quantita_pdt) VALUES ('{$id}' , '{$lastId}' , '{$nome_pdt}'  , '{$prezzo_pdt}' , '{$value}') ");
                         conferma($invioRapporto);
                     }




                 }
                 $totale += $importo;
             }
         }

         session_destroy();
     }else{
         header('Location:../home/index.php');
     }

                 }
