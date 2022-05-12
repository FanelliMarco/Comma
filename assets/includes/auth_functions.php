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

    function check_licenziato() {

        $licenziato = db_get_impiegato_licenziato($_SESSION['matricola']);

        if($licenziato[0]["deleted_at"] != null) {

            header("Location: ../logout");
            exit();

        }
        
    }

?>