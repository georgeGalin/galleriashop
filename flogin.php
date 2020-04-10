<?php
if(session_status()==PHP_SESSION_NONE){
  session_start();
}


$username = isset($_POST["username"]) ? $_POST["username"] : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';
if (!$username) {
  exit("Inserisci username");
}
if (!$password) {
  exit("la password non è corretta!");
}
$connessione = new mysqli("remotemysql.com:3306", "zzK3rRC2ox", "4LBRby89z5", "zzK3rRC2ox");
$sql = "SELECT * FROM Utenti where username=$username and password=$password";
$result = mysqli_query($connessione, $sql);

if ($result || mysqli_num_rows($result) == 0) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION["username"] = $username;
  ob_start();
  header('Location: index.php');
  ob_end_flush();
  exit();
} else {
  session_destroy();
  exit("Utente non trovato!");
}

?>
