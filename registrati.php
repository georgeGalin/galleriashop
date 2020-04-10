<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">

  </head>
  <body>
    <!--registrazione-->
    <div class="fixed2">
    <button onclick="document.getElementById('id02').style.display='block'"class="butreg">Registrati</button>
    </div>
    <div id="id02" class="modal">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <form class="modal-content" action="freg.php" method="POST">
        <div class="container">
          <h1>Registrazione</h1><br><br>
          <p>Sono obbligatori tutti i campi.</p>
          <hr><br><br>

          <label for="nome"><b>Nome</b></label>
          <input type="text" placeholder="Inserisci" name="nome" required><br><br>

          <label for="cognome"><b>Cognome</b></label>
          <input type="text" placeholder="Inserisci cognome" name="cognome" required><br><br>

          <label for="indirizzo"><b>Indirizzo</b></label>
          <input type="text" placeholder="Inserisci indirizzo" name="indirizzo" required><br><br>

          <label for="citta"><b>Citta</b></label>
          <input type="text" placeholder="Inserisci citta" name="citta" required><br><br>

          <label for="email"><b>E-Mail</b></label>
          <input type="text" placeholder="Inserisci E-mail" name="email" required><br><br>

          <label for="username"><b>Username</b></label>
          <input type="text" placeholder="Inserisci username" name="username" required><br><br>

          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Inserire Password" name="password" required><br><br>

          <label for="reppassword"><b>Ripeti Password</b></label>
          <input type="password" placeholder="Ripeti Password" name="reppassword" required><br><br><br>
          <br><br><br>
          <div class="clearfix">
            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
            <button type="submit" class="butreg2">Registrati</button>
          </div>
        </div>
      </form>
      <script>
        // richiamo l'effetto
        var modal = document.getElementById('id02');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>

    </div>
  </body>
</html>
