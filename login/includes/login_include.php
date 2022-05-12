<?php
    require_once "../../assets/setup/connessionedb.php";
    require "../../assets/includes/security_functions.php";
    require "../../assets/includes/query_include.php";
    require '../../assets/includes/data_functions.php';
    
    session_start();

    if(isset($_POST['sub'])){
        
        //Controla se i campi sono vuoti
        if(empty($_POST['user']) || empty($_POST['pw'])){
            get_error('I campi non possono essere vuoti');
        }
        else{
            //Controlla se i campi contengono caratteri/parole considerati non validi
            if(_cleaninjections($_POST['user']) || _cleaninjections($_POST['pw'])){
                get_error('I campi contengono caratteri o parole non ammesse');
            }
            else{
                $user=htmlspecialchars($_POST['user']);
                $pw=hash("sha256", htmlspecialchars($_POST['pw']));
                
                //Variabile contente il possibile impiegato
                $result = db_get_impiegato($user, $pw);

                if(!$result) { 
                    get_error('Utente o password errati');
                } else {
                    
                    if(isset($result[0]['deleted_at']))
                        get_error("Utente licenziato");

                    
                    if($result[0]['Tipo']==='Admin' || $result[0]['Tipo']=='Boss del database')
                        $_SESSION['admin']=true;
                    $_SESSION['logged'] = true;
                    $_SESSION['user'] = $user;
                    $_SESSION['matricola'] = $result[0]['Matricola'];
                    $_SESSION['error']='';
                    db_update_user_last_login($result[0]['Matricola']);
                    header("Location: ../../dashboard");
                    exit();
                }
            }
        }
    }
?>