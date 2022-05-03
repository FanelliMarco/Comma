<?php
    require "../../assets/setup/connessionedb.php";
    include "../../assets/includes/security_functions.php";
    include "../../assets/includes/query_include.php";

    //Controla se i campi sono vuoti
    if(empty($_POST['user']) || empty($_POST['pw'])){
        $_SESSION['error']='I campi non possono essere vuoti';
        header("Location: ../");
        exit();
    }

    //Controlla se i campi contengono caratteri/parole considerati non validi
    if(_cleaninjections($_POST['user']) && _cleaninjections($_POST['pw'])){
        $_SESSION['error']='I campi contengono caratteri o parole non ammesse';
        header("Location: ../");
        exit();
    }

    $user=htmlspecialchars($_POST['user']);
    $pw=hash("sha256", htmlspecialchars($_POST['pw']));

    $stmt=$conn->prepare($search_user_employee);
    $stmt->bind_param("ss", $user, $pw);

    $stmt->execute();
    
    $res=$stmt->get_result();

    //Controlla se l'utente è presente nel database
    if(!$res){
        $_SESSION['error']='Utente o password errati';
        header("Location: ../");
        exit();
    }
    
    $row=$res->fetch_assoc();
    session_start();
    $_SESSION['logged']=true;
    $_SESSION['user']=$user;
    header("Location: ../../management");
    exit();
?>