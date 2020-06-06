<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">

    </head>
    <body>

      <div class="fixed">
      <button onclick="document.getElementById('id01').style.display='block'" class="butlog1" style="width:center;left: 30px;">Login</button>
      </div>

      <div id="id01" class="modal">

      <form class="modal-content animate" action="../src/login/flogin.php" method="POST">
          <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          </div>

          <div class="container"><br>
          <label for="username"><b>Username</b></label>
          <input type="text" placeholder="inserisci username" name="username" required>

          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Inserisci Password" name="password" required>

          <button type="submit" class="butlog">Login</button>
          </div>

          <div class="container" style="background-color:#f1f1f1;">
          <button type="button" onclick="document.getElementById('id01').style.display='none'"class="cancelbtn">Cancel</button>
          </div>



      </form>
      </div>

      <script>
      // richiamo l'effetto
      var modal = document.getElementById('id01');
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
      </script>

    </body>
</html>
