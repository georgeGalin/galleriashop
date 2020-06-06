<?php
if(session_status()==PHP_SESSION_NONE){
  session_start();
}

$connessione = mysqli_connect("remotemysql.com:3306", "zzK3rRC2ox", "4LBRby89z5", "zzK3rRC2ox");
/*
if(!$connessione){
  echo "non sei connesso";
}else{
  echo "sei connesso";
}
*/

require_once('funzioni.php');


?>
