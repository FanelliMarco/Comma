<?php
    require_once "../../assets/setup/connessionedb.php";
    require "../../assets/includes/security_functions.php";
    require "../../assets/includes/data_functions.php";

    session_start();

    if(isset($_POST['sub'])){
        if(empty($_POST['matricola']) || empty($_POST['nome'] || empty($_POST['cognome']) || empty($_POST['tipo']))){
            get_error('I campi non possono essere vuoti');
        }
        else{
            if(_cleaninjections($_POST['matricola'] || _cleaninjections($_POST['nome']) || _cleaninjections($_POST['cognome']) || _cleaninjections($_POST['tipo']))){
                get_error('I campi contengono caratteri o parole non ammesse');
            }
            else{ 
                $matricola=$_POST['matricola'];
                $nome=$_POST['nome'];
                $cognome=$_POST['cognome'];
                $tipo=$_POST['tipo'];
                if($tipo=='Addetto al controllo qualita' || $tipo=='Admin'){
                    $processo=NULL;
                }
                else{
                    $processo=$_POST['processo'];
                }
                $username= strtolower($nome)."_".strtolower($cognome);
                $password=hash('sha256', htmlspecialchars($username."P"));
                db_inserisci_impiegato($matricola, $nome, $cognome, $username, $password, $tipo, $processo);
                $_SESSION['error']='';
                header("Location: ../../management");
                exit();
            }
        }
    }
?>