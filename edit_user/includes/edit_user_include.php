<?php

    require_once "../../assets/setup/connessionedb.php";
    require '../../assets/includes/data_functions.php';

    if(isset($_POST['invio'])){

        $result = db_modifica_impiegato($_POST["nome"], $_POST["cognome"], $_POST["username"], $_POST["tipo"], $_POST["processo"], $_POST["matricola"]);

        if(isset($result)){
            $_SESSION["error"]['update'] = $result;
        }
        else{
            $_SESSION["error"]['update'] = '';
        }

        header("Location: ../../management");

    }
?>