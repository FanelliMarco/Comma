<?php
    function check_logged_in(){}
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