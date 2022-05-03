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
            if(_cleaninjections($_POST['user']) && _cleaninjections($_POST['pw'])){
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
                $res_e=$stmt->get_result();

                //Controlla se l'impiegato è presente nel database, se non è presente controlla che potrebbe essere un cliente
                if(!$res){
                    $stmt=$conn->prepare($search_user_client);
                    $stmt->bind_param("ss", $user, $pw);
                    $stmt->execute();
                    $res_c=$stmt->get_result();

                    //Controlla il caso in cui ci sia un cliente che deve accedere
                    if(!$res_C){
                        $_SESSION['error']='Utente o password errati';
                        header("Location: ../");
                        exit();
                    }
                    else{
                        $row=$res->fetch_assoc();
                        session_start();
                        $_SESSION['logged']=true;
                        $_SESSION['user']=$user;
                        header("Location: ../../management");
                        exit();
                    }
                }
                else{
                    $row=$res->fetch_assoc();
                    session_start();
                    $_SESSION['logged']=true;
                    $_SESSION['user']=$user;
                    header("Location: ../../management");
                    exit();
                }
            }
        }
    }
?>