<?php
    require_once "../../assets/setup/connessionedb.php";
    require "../../assets/includes/security_functions.php";
    require "../../assets/includes/data_functions.php";

    session_start();

    if(isset($_POST['sub'])){
        if(empty($_POST['processo']) || empty($_POST['descrizione'] || empty($_POST['codice_semicodice']))){
            get_error('I campi non possono essere vuoti');
        }
        else{
            if(_cleaninjections($_POST['processo'] || _cleaninjections($_POST['descrizione']) || _cleaninjections($_POST['descr_fase']))){
                get_error('I campi contengono caratteri o parole non ammesse');
            }
            else{ 
                //inserimento query con descrizione
                $processo=$_POST['processo'];
                $descrizione=$_POST['descrizione'];
                $codice=$_POST['codice_semicodice'];
                $report=db_inserisci_nc_interna($processo, $codice, $descrizione, $_SESSION['matricola']);
                $_SESSION['error']='';
                header("Location: ../../dashboard");
                exit();
            }
        }
    }
?>