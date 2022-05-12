<?php

    require_once "../../assets/setup/connessionedb.php";
    require '../../assets/includes/data_functions.php';
    require '../../assets/includes/security_functions.php';

    if(isset($_POST['invio'])){
        if(_cleaninjections($_POST['nome']) || _cleaninjections($_POST['cognome']) || _cleaninjections($_POST['username']) || _cleaninjections($_POST['password']) || _cleaninjections($_POST['tipo']) || _cleaninjections($_POST['processo']) || _cleaninjections($_POST['matricola'])){
            get_error('Caratteri inseriti non consentiti');
        }
        else{
            $result = db_modifica_impiegato($_POST["nome"], $_POST["cognome"], $_POST["username"], hash('sha256', $_POST['password']), $_POST["tipo"], $_POST["processo"], $_POST["matricola"]);

            if(isset($result)){
                $_SESSION["error"]['update'] = $result;
            }
            else{
                $_SESSION["error"]['update'] = '';
            }

            header("Location: ../../management");
        }
    }
?>