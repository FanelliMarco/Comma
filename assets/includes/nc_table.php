<?php

require_once '../assets/setup/connessionedb.php';

//BACKEND controllare connessione database valida (controllare anche sessione credo)
//far funzionare i require e cancellare il codice sostitutivo
function fill_NC_table()
{
    /*try {  NON TOCCATE grazie
        if (isset($_POST['search_button']) && !empty($_POST['search_field'])) {
            //filtro sulla ricerca applicato
            $sql = '
            ';
        } else {
            //filtro non applicato
            $sql = '
                SELECT nci.Numero, ri.Data, nci.Stato, nci.Priorita, nci.Origine
                FROM nc_interna as nci JOIN rilevamento_interno as ri
                on nci.Numero = ri.NC
            ';
        }
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['Numero'] . "</td>";
                echo "<td>" . $row['Data'] . "</td>";
                echo "<td>" . $row['Stato'] . "</td>";
                echo "<td>" . $row['Priorita'] . "</td>";
                echo "<td>" . $row['Origine'] . "</td>";
                echo "</tr>";
            }
            die;
        }
    } catch (mysqli_sql_exception $e) {
        throw '<span class="text-light"> . $e .</span>';
    }*/


    if(isset($_POST['search_button'])){
        if(!empty($_POST['search_field'])){
            if(_cleaninjections($_POST['search_field'])){
                $_SESSION['error']='Parole non ammesse';
                header("Location: ../");
                exit();
            }
            else{
                //crare ricerca per le nc
                $search=htmlspecialchars($_POST['search_field']);
                
                $pos=strpos($search, '=');
                if(!$pos){
                    $_SESSION['error']='Input non valido';
                    header("Location: ../");
                    exit();
                }
                $search_t=substr($search, 0, $pos);
                switch($search_t){
                    case 'data':
                        //cose da fare
                        break;
                    case 'stato':
                        //cose da fare
                        break;
                    case 'priorita':
                        //cose da fare
                        break;
                    case 'origine':
                        //cose da fare
                        break;
                    default:
                        $_SESSION['error']='Input non valido';
                        header("Location: ../");
                        exit();
                }
            }
        }   
        else{
            $_SESSION['error']='Inserire qualcosa da cercare';
            header("Location: ../");
            exit();
        }
    }
}
?>