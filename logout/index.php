<?php 

    session_start();

    // Decidere se mettere il cookie remeber me o no

    /* Per distruggere cookie di sessione */
    if(isset($_COOKIE[session_name()])){

        setcookie(session_name(), '', time()-7000000, '/');
    }

    session_unset();
    session_destroy();

    header ("Location: ../login/index.php");
    exit();

?>