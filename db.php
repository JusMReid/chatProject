<?php
  $hostname = "localhost";
  $user = "root";
  $pass = "";
  $dbName = "chatapp";

  $conn = new mysqli($hostname, $user, $pass, $dbName);

  function formatDate($date){
    return date('g:i a', strtotime($date));
  }
 ?>
