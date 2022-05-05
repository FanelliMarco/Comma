<?php

    require_once "../../assets/setup/connessionedb.php";
    require '../../assets/includes/data_functions.php';

    $result = db_modifca_nc($_POST["stato"], $_POST["priorita"], $_POST["risolutore"], $_POST["verificatore"], $_POST["decisioni"], $_POST["az_corr"], $_POST["numero"], $_POST["tipo"]);

    if(isset($result))
        $_SESSION["error"] = $result;
    else
        $_SESSION["error"] = "";

    header("Location: ../");

?>
