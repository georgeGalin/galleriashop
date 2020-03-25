<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>
<!--faccio il menu con un height fisso e infinito-->
<div class="sinistra">
   
        <div class="dropdown">
        <button class="dropbtn">menu</button>
            <div class="dropdown-content">
                <a href="index.html">Home</a>
                <a href="biografia.html">Biografia</a>
                <a href="contatta.html">Contatta</a>
                <a href="negozio.html">Negozio</a>
            </div>
        </div>
        <div class="fixedfirma">
<img src="firma-mamma.png" alt="biografia.htm">
</div>
<a href="biografia.html" class="carrello"><img src="carrello.svg"></a>



<!--faccio il login-->
                    
                
                        <div class="fixed">
                        <button onclick="document.getElementById('id01').style.display='block'" class="butlog1" style="width:center;left: 30px;">Login</button>
                    </div>
                        <div id="id01" class="modal">
                        
                        <form class="modal-content animate" action="login.php" method="POST">
                            <div class="imgcontainer">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                            </div>

                            <div class="container"><br>
                            <label for="username"><b>Username</b></label>
                            <input type="text" placeholder="inserisci username" name="username" required>

                            <label for="password"><b>Password</b></label>
                            <input type="password" placeholder="Inserisci Password" name="password" required>
                                
                            <button type="submit" class="butlog">Login</button>
                            <label>
                                <input type="checkbox" checked="checked" name="remember"> Ricordami
                            </label>
                            </div>

                            <div class="container" style="background-color:#f1f1f1;">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'"class="cancelbtn">Cancel</button>
                            <span class="psw"><a href="#">Password dimenticata?</a></span>
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





<!--registrazione-->
<div class="fixed2">
<button onclick="document.getElementById('id02').style.display='block'"class="butreg">Registrati</button>
</div>
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="registrazione.php" method="POST">
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
      <input type="password" placeholder="Ripeti Password" name="reppassword" required><br><br>

      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Ricordami
    
      </label><br>
                      

      

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
</div>        




<div style="text-align:center"></div>
  <div class="fixedimg">
  <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="dipinti/La Madonna(copia d'arte).jpg" style="width:100%">
  <div class="text">La Madonna</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="dipinti/La ribellione degli elementi.jpg" style="width:100%">
  <div class="text">La ribellione degli elementi</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="dipinti/L'uomo e il mondo.jpg" style="width:100%">
  <div class="text">L'uomo e il mondo</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="dipinti/Bisticcio.jpg" style="width:100%">
  <div class="text">Bisticcio</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</body>
</html>