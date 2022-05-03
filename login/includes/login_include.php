<?php
    require "../../assets/setup/connessionedb.php";
    include "../../assets/includes/security_functions.php";
    include "../../assets/includes/query_include.php";

    if(empty($_POST['user']) || empty($_POST['pw'])){
        //echo "Qualcosa fallito";
        $_SESSION['error']='I campi non possono essere vuoti';
        header("Location: ../");
        exit();
    }

    if(_cleaninjections($_POST['user']) && _cleaninjections($_POST['pw'])){
        //echo "Controllo fallito";
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

    if($res){
        $row=$res->fetch_assoc();
        session_start();
        $_SESSION['logged']=true;
        $_SESSION['user']=$user;
        header("Location: ../../management");
    }
    else{
        //echo $conn->error;
        //echo "Login fallito";
        header("Location: ../");
    }
?>