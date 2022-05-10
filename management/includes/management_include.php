<?php

    require "../assets/includes/query_include.php";

    //session_start();

    $matr = $_SESSION['matricola'];

    
    if(isset($_POST['search_button'])){
        if(!(empty($_POST['search_field']))){
            if(_cleaninjections($_POST['search_field'])){
                $_SESSION['error']='Parole non ammesse';
                fill_user_table();
            }
            else{
                $_SESSION['error']='';
                fill_user_table_search($_POST['search_field']);
            }
        }
        else{
            $_SESSION['error']='Inserire qualcosa da cercare';
            fill_user_table();
        }
    }
    else{
        $_SESSION['error']='';
        fill_user_table();
    }
    
?>