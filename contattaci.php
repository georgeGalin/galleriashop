<?php

if(isset($_POST[‘invia’])){

if($_POST[‘nome’] == “” || $_POST[‘username’] == “” || $_POST[email] == “” || $_POST[‘messaggio’] == “”){
echo ('Completa correttamente i campi');
}
else{

$nome = htmlspecialchars($_POST[‘nome’]);
$username = htmlspecialchars($_POST[‘username’]);
$email = htmlspecialchars($_POST[‘email’]);
$messaggio = htmlspecialchars($_POST[‘messaggio’]);



$to = 'gege.gilea@gmail.com';
$subject = 'Messaggio da $username';
$email = “”;
$header = “”;
$message = '$messaggio';

$sendmail = mail($to, $subject, $message, $header);
header('Refresh: 0; URL= contattato.php');

}
}

?>

<?php

echo 'Grazie per averci contattato!<br><br> Sarai reindirizzato fra 2 secondi.';
header('Refresh: 2; URL= contattaci.php');

?>
