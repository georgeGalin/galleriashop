<?php

    $minLettere = 5;
    $maxlettere = 12;

    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $indirizzo = $_POST["indirizzo"];
    $citta = $_POST["citta"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password =$_POST["password"];
    $ruolo = $_POST['ruolo'];
/*
    $hashpsw = "$2y$10$"; //cifratura
    $saltPsw = "utilizzounalungastringa23"; //chiamata la salatura/la cifratura
    $pswSicura = $hashPsw.$saltPsw;
    $password = crypt($password, $pswSicura);
    $reppassword = crypt($rippassword, $pswSicura);
*/
    //minimo e massimo carattere
    if(strlen($username)<$minLettere){
      echo "L'username non può essere composta da meno di 5 lettere";
    }
    if(strlen($username)>$maxLettere){
      echo "L'username non può essere composta da più di 12 lettere";
    }

    include ('../utils/connessione.php');
    //$connessione = new mysqli("remotemysql.com:3306", "zzK3rRC2ox", "4LBRby89z5", "zzK3rRC2ox");
    $sql = "SELECT username FROM Utenti WHERE username='$username'";
    $result = mysqli_query($connessione,$sql);
    if (mysqli_num_rows($result) == true) {
      header("refresh:5,url=index.php");
      exit("Username già registrato, sarai re-indirizzato fra 5 secondi");
    }


    $sql = "INSERT INTO Utenti (nome, cognome, indirizzo, citta, email, username, password)
            VALUES ('$nome', '$cognome', '$indirizzo', '$citta', '$email', '$username', '$password')";



    if (mysqli_query($connessione, $sql)) {
        echo "I nuovi dati sono stati inseriti con successo";

        ob_start();
        header('Location: ../../home/index.php');
        ob_end_flush();
        exit();
    } else {
        echo "Errore: " . $sql . "<br>" . mysqli_error($connessione);
    }


     mysqli_close($connessione);

  /*  mysqli_close($connessione);*/


    ?>
