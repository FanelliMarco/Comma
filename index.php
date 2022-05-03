<?php

    if (isset($_SESSION['logged'])) {

        header("Location: dashboard");
        exit();
    }
    else {

        header("Location: login");
        exit();
    }

?>