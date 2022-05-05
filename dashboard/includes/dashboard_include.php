<?php
    require_once "../../assets/setup/connessionedb.php";
    require "../../assets/includes/security_functions.php";
    require "../../assets/includes/query_include.php";
    require '../../assets/includes/data_functions.php';

    session_start();

    

    if(isset($_POST['search_button'])){
        if(!(empty($_POST['search_field']))){
            if(_cleaninjections($_POST['search_field'])){
                get_error('Parole non ammesse');
            }
            else{
                $_SESSION['error']='';
                fill_NC_table_search($_POST['search_field'], $_SESSION['matricola']);
                header("Location: ../");
                exit();
            }
        }
        else{
            get_error('Inserire qualcosa da cercare');
        }
    }

    //filter

    if (isset($_POST['order'])){
        
    }
?>