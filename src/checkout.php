<?php include ("src/shared/sidebar.php"); ?>
<?php require_once('carrello.php'); ?>

<?php //echo $_SESSION['prodotto_1']; ?>
<!-- Page Content -->
<div class="container">
<!-- /.row -->
<h1 class="text-center my-5">Il tuo ordine</h1>
<h5 class="bg-warning text-center text-white"><?php mostraAvviso();  ?></h5>
<div class="row">
<div class="col-sm-12 col-md-10 col-lg-10 m-auto">

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="liliana@business.example.com">
  <INPUT TYPE="hidden" name="charset" value="utf-8">
  <INPUT TYPE="hidden" NAME="currency_code" value="EUR">
    <input type="hidden" name="upload" value="1">




    <table class="table table-striped">
        <thead>
         <tr>
           <th>Prodotto</th>
           <th>Prezzo</th>
           <th>Quantità</th>
           <th>Importo</th>
           <th>MODIFICA</th>
          </tr>
        </thead>
        <tbody>

        <?php carrello(); ?>
          <!-- <tr>
                <td>provaProdotto</td>
                <td>$23</td>
                <td>3</td>
                <td>2</td>
                <td><a class="btn btn-success" href="#" role="button">Aggiungi</a></td>
                <td><a class="btn btn-warning" href="carrello.php?remove=1" role="button">Rimuovi</a></td>
                <td><a class="btn btn-danger" href="carrello.php?delete=1" role="button">Cancella</a> </td>
            </tr>  -->
        </tbody>
    </table>

    <input type="image" name="upload"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
      </form>


</form>
</div>
</div>

<div class="row mt-5">
<div class="col-5 ">
<h2>Riepilogo ordine</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Articoli:</th>
<td><span class="amount"><?php echo isset ($_SESSION['quantita_art']) ?  $_SESSION['quantita_art']  : $_SESSION['quantita_art'] = '0'; ?></span></td>
</tr>
<tr class="shipping">
<th>Spedizione</th>
<td>Gratuita</td>
</tr>

<tr class="order-total">
<th>Totale ordine</th>
<td><strong><span class="amount">€<?php echo isset ($_SESSION['totale']) ?  $_SESSION['totale']  : $_SESSION['totale'] = '0'; ?></span></strong> </td>
</tr>

</tbody>

</table>
</div>
</div>
 </div>


<!-- </body>
</html> -->
