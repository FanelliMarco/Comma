<?php
    require "../../assets/includes/data_functions.php";
    require "../../assets/includes/security_functions.php";

    session_start();

    

    if(isset($_POST['search_button'])){
        if(!(empty($_POST['search_field']))){
            if(_cleaninjections($_POST['search_field'])){
                $_SESSION['error']='Parole non ammesse';
                header("Location: ../");
                exit();
            }
            else{
                /*
                $search_field=$_POST['search_field'];
                $htmlContents=file_get_contents($_SERVER['PHP_SELF']);
                $htmlContents=str_replace('{{TEXT_TO_REPLACE}}', fill_NC_table_search($search_field, $_SESSION['matricola']), $htmlContents);
                echo $htmlContents;
                */
                $_SESSION['error']='';
            }
        }
        else{
            $_SESSION['error']='Inserire qualcosa da cercare';
            header("Location: ../");
            exit();
        }
    }

    //filter

    if (isset($_POST['order'])){
        
    }
?>