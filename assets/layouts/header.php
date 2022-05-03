<?php
    session_start();
    require "../assets/setup/env.php";
    require_once "../assets/setup/connessionedb.php";
    require "../assets/includes/auth_functions.php";
    require '../assets/includes/security_functions.php';
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo APP_NAME ?></title>

    <title><?php echo TITLE . ' | ' . APP_NAME; ?></title>
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">

    <link rel="stylesheet" href="../assets/vendor/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome-5.12.0/css/all.min.css">
 
    <!-- Custom styles -->
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="custom.css" >
</head>
<body>

    <!-- require navbar -->

<?php
    require "../assets/layouts/navbar.php";
?>