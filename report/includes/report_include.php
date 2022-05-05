<?php
    require '../../assets/includes/data_functions.php';
    
    session_start();

    if(isset($_POST['sub'])){
        require_once "../../assets/setup/connessionedb.php";
        require "../../assets/includes/security_functions.php";
        require "../../assets/includes/query_include.php";
        
        if(empty($_POST['processo']) || empty($_POST['descrizione'])){
            $_SESSION['error']='I campi non possono essere vuoti';
            header("Location: ../");
            exit();
        }
        else{
            if($_POST['fase']==='Altro'){
                if(empty($_POST['descr_fase'])){
                    $_SESSION['error']='I campi non possono essere vuoti';
                    header("Location: ../");
                    exit();
                }
                else{
                    if(_cleaninjections($_POST['processo'] || _cleaninjections($_POST['descrizione']) || _cleaninjections($_POST['descr_fase']))){
                        $_SESSION['error']='I campi contengono caratteri o parole non ammesse';
                        header("Location: ../");
                        exit();
                    }
                    else{
                        //inserimento query con descrizione e altro
                    }
                }
            }
            if(_cleaninjections($_POST['processo']) || _cleaninjections($_POST['descrizione'])){
                $_SESSION['error']='I campi contengono caratteri o parole non ammesse';
                header("Location: ../");
                exit();
            }
            else{
                //inserimento query con descrizione
            }
        }
    }
?>