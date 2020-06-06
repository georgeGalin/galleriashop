<?php

$errore = "";
$msg = "";

if($_POST){

  if(!$_POST['femail']){
    $errore = "E' richiesta una mail";
  }
  if(!$_POST['fnome']){
    $errore = "E' richiesto un nome";
  }

  if(!$_POST['fmessaggio']){
    $errore = "E' richiesto un messaggio";
  }

  if($_POST['femail']&& filter_var($_POST['femail'],FILTER_VALIDATE_EMAIL)===false){
    $errore = "La mail non è valida!";
  }

  if($errore!=""){
    $errore = "Ci sono errore nel tuo modulo: ".$errore;
  }else{
    $miamail = "gege.gilea@gmail.com";
    $fnome = $_POST['fnome'];
    $fmessaggio = $_POST['fmessaggio'];
    $headers = "From: ".$_POST['femail'];

    if(mail($miamail,$fnome,$fmessaggio,$headers)){
      $msg = "Grazie per averci contattato";
    }else{
      $msg = "Errore nell'invio";
    }
  }
}
?>
