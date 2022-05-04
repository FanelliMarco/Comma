<?php
    session_start();
    if(isset($_POST['sub'])){
        require_once "../../assets/setup/connessionedb.php";
        require "../../assets/includes/security_functions.php";
        require "../../assets/includes/query_include.php";

        //Controla se i campi sono vuoti
        if(empty($_POST['user']) || empty($_POST['pw'])){
            $_SESSION['error']='I campi non possono essere vuoti';
            header("Location: ../");
            exit();
        }
        else{
            //Controlla se i campi contengono caratteri/parole considerati non validi
            if(_cleaninjections($_POST['user']) || _cleaninjections($_POST['pw'])){
                $_SESSION['error']='I campi contengono caratteri o parole non ammesse';
                header("Location: ../");
                exit();
            }
            else{
                $user=htmlspecialchars($_POST['user']);
                $pw=hash("sha256", htmlspecialchars($_POST['pw']));

                $stmt=$conn->prepare($search_user_employee);
                $stmt->bind_param("ss", $user, $pw);

                $stmt->execute();
                
                //Variabile contente il possibile impiegato
                $result=$stmt->get_result();

                if(!$result){ 
                    $_SESSION['error']='Utente o password errati';
                    header("Location: ../");
                    exit();
                }

                $row=$result->fetch_assoc();
                $_SESSION['logged']=true;
                $_SESSION['user']=$user;
                $_SESSION['matricola']=$row['Matricola'];
                header("Location: ../../dashboard");
                exit();
            }
        }
    }
?>