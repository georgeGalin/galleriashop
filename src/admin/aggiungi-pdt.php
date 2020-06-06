<?php aggiungiPdt(); ?>
<?php include ("src/utils/connessione.php"); ?>

    <div class="container">
    <div>
    <h3 class="page-header">Aggiungi un dipinto nel Negozio</h3>
    </div>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col-md-8">
    <div class="form-group">
    <label for="nome_prodotto">Nome </label>
        <input type="text" name="nome_prodotto" class="form-control">
    </div>

    </div><!--fine col-8-->

    <div class="col-md-4">

    <div class="form-group">
        <label for="prezzo">Prezzo</label>
        <input type="number"  name="prezzo" class="form-control"  step=".01" min="0">
    </div>


    <div class="form-group">
        <label for="dipinto">Dipinto</label>
        <input type="file" name="dipinto">
    </div>

    <div class="form-group">
     <input type="submit" name="aggiungi" class="btn btn-success btn-lg" value="Aggiungi">
    </div>

    </div><!--fine col-4-->
    </div>
  </form>
