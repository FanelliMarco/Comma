<?php
    function check_logged_in(){
        if(!isset($_SESSION['logged'])){
            header("Location: ../");
        }
    }
    function check_logged_out(){
        if (!isset($_SESSION['logged'])){
        
            return true;
        }
        else {

            header("Location: ../dashboard");
            exit();
        }
    }

?>