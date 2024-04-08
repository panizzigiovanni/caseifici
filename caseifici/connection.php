<?php  

    $host="localhost";
    $username="root";
    $pass="";
    $nomeDB="caseifici2";

    $conn = new mysqli($host, $username, $pass, $nomeDB);
    if ($conn->connect_error) {
            die('Errore di connessione (' . $conn->connect_errno . ') '
            . $conn->connect_error);
    } else {
            //echo 'Connesso. ' . $conn->host_info . "\n";
    }

?>