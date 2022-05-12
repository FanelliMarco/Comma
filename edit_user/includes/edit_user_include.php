<?php

    require_once "../../assets/setup/connessionedb.php";
    require '../../assets/includes/data_functions.php';
    require '../../assets/includes/security_functions.php';

    if(isset($_POST['invio'])){
        if(_cleaninjections($_POST['nome']) || _cleaninjections($_POST['cognome']) || _cleaninjections($_POST['username']) || _cleaninjections($_POST['password']) || _cleaninjections($_POST['tipo']) || _cleaninjections($_POST['matricola'])){
            $_SESSION['error']='Caratteri non consentiti';
            header("Location: ../index.php?matricola=".$_POST['matricola']."");
        }
        else{
            if($_POST['tipo']=='Addetto al controllo qualita' || $_POST['tipo']=='Admin'){
                $processo=NULL;
            }
            else{
                $processo=$_POST['processo'];
            }

            $pw=$_POST['password'];
            if(!(empty($pw))){
                $pw=hash('sha256', $pw);
            }
            else{
                $pw=NULL;
            }

            $result = db_modifica_impiegato($_POST["nome"], $_POST["cognome"], $_POST["username"], $pw, $_POST["tipo"], $processo, $_POST["matricola"]);

            if(isset($result)){
                $_SESSION["error"]['update'] = $result;
                header("Location: ../index.php?matricola=".$_POST['matricola']."");
            }
            else{
                $_SESSION['error']='';
                $_SESSION["error"]['update'] = '';
            }

            header("Location: ../../management");
            exit();
        }
    }
?>