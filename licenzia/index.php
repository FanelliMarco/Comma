<?php

    require "../assets/includes/auth_functions.php";
    require "../assets/includes/data_functions.php";
    require_once "../assets/setup/connessionedb.php";

    session_start();
    check_logged_in();
    check_licenziato();
    if(!isset($_SESSION["admin"])) {

        header("Location: ../");
        exit();

    }

    $matr = $_GET["matricola"];
    $result = db_licenzia_impiegato($matr);

    if(isset($result)) {

        $_SESSION["error"] = $result;

    }

    header("Location: ../management");

?>