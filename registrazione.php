<?php
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $indirizzo = $_POST["indirizzo"];
    $citta = $_POST["citta"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password =$_POST["password"];
    $reppassword =$_POST["reppassword"];
    if(!$nome){
      exit("Inserisci il tuo nome.");
    }
    if(!$cognome){
      exit("Inserisci il tuo cognome");
    }
    if(!$indirizzo){
      exit("Inserisci il tuo indirizzo");
    }
    if(!$citta){
      exit("Inserisci la tua città");
    }
      if(!$email){
        exit("Inserisci la tua città");
    }
    if(!$username){
      exit("Inserisci un username!");
    }
    if(!$password){
      exit("Inserisci una password!");
    }
    if(!$reppassword){
      exit("Reinserisci la password!");
    }
    $connessione = new mysqli("remotemysql.com:3306", "zzK3rRC2ox", "4LBRby89z5", "zzK3rRC2ox");
    $sql = "SELECT username FROM Utenti WHERE username='$username'";
    $result = mysqli_query($connessione,$sql);
    if (mysqli_num_rows($result) == true) {
      exit("Username già registrato");
    }


    $sql = "INSERT INTO Utenti (nome, cognome, indirizzo, citta, email, username, password, reppassword)
            VALUES ('$nome', '$cognome', '$indirizzo', '$citta', '$email', '$username', '$password', '$reppassword')";
    if (mysqli_query($connessione, $sql)) {
        echo "I nuovi dati sono stati inseriti con successo";
        
        ob_start();
        header('Location: index.php');  
        ob_end_flush();
        exit();
    } else {
        echo "Errore: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($connessione);
    ?>