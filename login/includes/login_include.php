<?php
    include "../../assets/setup/connessionedb.php";
    include "../../assets/includes/security_functions.php";
    include "../../assets/includes/query_include.php";

    if(isset($_POST['sub']) && !empty($_POST['user']) && !empty($_POST['pw'])){
        if(controllaCaratteriAmmessi($_POST['user']) && controllaParoleVietate($_POST['user']) && controllaParoleVietate($_POST['pw']) && controllaCaratteriAmmessi($_POST['pw'])){
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
        }
        else{
            //echo "Controllo fallito";
            header("Location: ../");
        }
    }
    else{
        //echo "Qualcosa fallito";
        header("Location: ../");
    }
?>