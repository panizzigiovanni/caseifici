<?php 
    include "connection.php"; 
    session_start(); 

    if(!isset($_SESSION['codiceCaseificio'])){
        header("Location: index.php");
        exit();
    }

    function getCurrentDay() {
        $currentDate = new DateTime();
        return $currentDate->format('Y-m-d');
    }

    if($_SESSION['radice']=="U"){
        ///UPDATE

    }else if($_SESSION['radice']=="I"){
        ///INSERT

    }
   



?>