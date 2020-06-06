<?php



$username = isset($_POST["username"]) ? $_POST["username"] : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';
if (!$username) {
  exit("Inserisci username");
}
if (!$password) {
  exit("la password non è corretta!");
}
include ('src/utils/connessione.php');
/*
$hashpsw = "$2y$10$"; //cifratura
$saltPsw = "utilizzounalungastringa23"; //chiamata la salatura/la cifratura
$pswSicura = $hashPsw.$saltPsw;
$hashpsw = crypt($password, $pswSicura);
*/
//include ('../utils/connessione.php');
//$connessione = neinclude ('../utils/connessione.php');w mysqli("remotemysql.com:3306", "zzK3rRC2ox", "4LBRby89z5", "zzK3rRC2ox");
$sql = "SELECT * FROM Utenti WHERE username = '$username' and password = '$password'";
$result = $connessione->query($sql);   //eseguo la query.
    if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["username"] = $username;
    $_SESSION["ruolo"] = $row["ruolo"];
    ob_start();
    header('Location: ../../home/index.php');
    ob_end_flush();
    exit();
  } else {
    session_destroy();
    echo("Username o password errati!");
    exit('<br><br><a href="../../home/index.php">Ritorna Indietro </a>');
  }
    $connessione->close();
?>
