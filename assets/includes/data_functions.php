<?php

    require 'query_include.php';
    

    // trasforma il risultato di una query in array (record numerati e campi individuati dal nome)
	function db_result_to_array($mysqli_result) {

        if(!$mysqli_result)
            return false;
        
		$i = 0;

		$result = array();

		while($row = $mysqli_result->fetch_assoc()) {

			$result[$i] = $row;
			$i++;

		}

		return $result;

	}

    // restituisce user e password dell'utente richiesto se esiste
    function db_get_impiegato($user, $pw) {

        global $conn;
        $stmt = $conn->prepare(search_user_employee);
        $stmt->bind_param("ss", $user, $pw);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;

    }

	// restituisce tutti i dati delle non conformità relative ad un utente
	function db_get_riepilogo($user) {

		global $conn;
		$stmt = $conn->prepare(search_nc_all);
        $stmt->bind_param("ssss", $user, $user, $user, $user);
        $stmt->execute();
        $result = $stmt->get_result();
		$result = db_result_to_array($result);
		return $result;

	}

    // restituisce tutti i dati delle non conformità per l'admin
	function db_get_riepilogo_admin() {

		global $conn;
		$stmt = $conn->prepare(view_nc_all);
        $stmt->execute();
        $result = $stmt->get_result();
		$result = db_result_to_array($result);
		return $result;

	}

    // restituisce tutti i dati della nc richiesta
	function db_get_nc($numero, $tipo) {

		global $conn;
		$stmt = $conn->prepare(search_nc_spec);
        $stmt->bind_param("is", $numero, $tipo);
        $stmt->execute();
        $result = $stmt->get_result();
		$result = db_result_to_array($result);
		return $result;

	}

	// restituisce i nomi di tutti i processi
	function db_get_processi() {

        global $conn;
		$stmt = $conn->prepare(search_processi_nome);
        $stmt->execute();
        $result = $stmt->get_result();
		$result = db_result_to_array($result);
		return $result;

	}

	// restituisce i nomi di tutti i fornitori
	function db_get_fornitori() {

		global $conn;
		$stmt = $conn->prepare(search_fornitori_nome);
        $stmt->execute();
        $result = $stmt->get_result();
		$result = db_result_to_array($result);
		return $result;

	}

    // restituisce tutte le non conformita di una certa data e di un certo utente
    function db_get_data($data, $matr){
        global $conn;
        $stmt = $conn->prepare(search_nc_data);
        $stmt->bind_param("ss", $matr, $data);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
    }

    // restituisce tutte le non conformita di un certo stato e di un certo utente
    function db_get_stato($stato, $matr){
        global $conn;
        $stmt = $conn->prepare(search_nc_stato);
        $stmt->bind_param("ss", $matr, $stato);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
    }

    // restituisce tutte le non conformita di una certa priorita e di un certo utente
    function db_get_priorita($priorita, $matr){
        global $conn;
        $stmt = $conn->prepare(search_nc_priorita);
        $stmt->bind_param("ss", $matr, $priorita);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
    }

    // restituisce tutte le non conformita di una certa origine e di un certo utente
    function db_get_origine($origine, $matr){
        global $conn;
        $stmt = $conn->prepare(search_nc_origine);
        $stmt->bind_param("ss", $matr, $origine);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
    }

    function db_get_matricola($text){
        global $conn;
        $stmt = $conn->prepare(search_users_matricola);
        $stmt->bind_param("s", $text);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
    }

    function db_get_nome($text){
        global $conn;
        $stmt = $conn->prepare(search_users_nome);
        $stmt->bind_param("s", $text);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
    }

    function db_get_cognome($text){
        global $conn;
        $stmt = $conn->prepare(search_users_cognome);
        $stmt->bind_param("s", $text);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
    }

    function db_get_tipo($text){
        global $conn;
        $stmt = $conn->prepare(search_users_tipo);
        $stmt->bind_param("s", $text);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
    }

    function db_get_processo($text){
        global $conn;
        $stmt = $conn->prepare(search_users_processo);
        $stmt->bind_param("s", $text);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
    }

    function db_update_user_last_login($matr){
        global $conn;
        $stmt = $conn->prepare(update_user_last_login);
        $stmt->bind_param("s", $matr);
        $stmt->execute();
    }

	// inserisce una nuova non confromità in input
	function db_inserisci_nc_input($fornitore, $materia_prima, $descrizione, $user) {

		global $conn;
		$stmt1 = $conn->prepare(insert_nc_input);
        $stmt2 = $conn->prepare(search_nc_input_number);
        $stmt3 = $conn->prepare(insert_rilevamento_input);

		try {
			
			$conn->begin_transaction();

            $stmt1->bind_param("ss", $descrizione, $fornitore);

            if(!$stmt1->execute());
                throw new Exception("errore inserimento nella tabella nc_input");

            if(!$stmt2->execute())
                throw new Exception("Errore selezione nella tabella nc_input");

            $res = $stmt2->get_result();

			$res = db_result_to_array($res);
			$n = $res[0]["n"];

            $stmt3->bind_param("ss", $n, $user, $materia_prima);

            if(!$stmt3->execute());
                throw new Exception("Errore inserimento nella tablella rilevamento_input");
			
			$conn->commit();

		} catch (Exception $ex) {

			$conn->rollback();
			return $ex;

		}
	}

	// inserisce una nuova non confromità in output
	function db_inserisci_nc_output($processo, $prodotto, $descrizione, $user) {

        global $conn;
		$stmt1 = $conn->prepare(insert_nc_output);
        $stmt2 = $conn->prepare(search_nc_output_number);
        $stmt3 = $conn->prepare(insert_rilevamento_output);

		try {
			
			$conn->begin_transaction();

            $stmt1->bind_param("ss", $descrizione, $processo);

            if(!$stmt1->execute());
                throw new Exception("errore inserimento nella tabella nc_output");

            if(!$stmt2->execute())
                throw new Exception("Errore selezione nella tabella nc_output");
            
            $res = $stmt2->get_result();

			$res = db_result_to_array($res);
			$n = $res[0]["n"];

            $stmt3->bind_param("ss", $n, $user, $mprodotto);

            if(!$stmt3->execute());
                throw new Exception("Errore inserimento nella tablella rilevamento_output");
			
			$conn->commit();

		} catch (Exception $ex) {

			$conn->rollback();
			return $ex;

		}

	}

	// inserisce una nuova non confromità interna
	function db_inserisci_nc_interna($processo, $semilavorato, $descrizione, $user) {

        $matr='0000021';

        global $conn;
		$stmt1 = $conn->prepare(insert_nc_interna);
        $stmt2 = $conn->prepare(search_nc_interna_number);
        $stmt3 = $conn->prepare(insert_rilevamento_interno);

		try {
			
			$conn->begin_transaction();

            $stmt1->bind_param("sss", $descrizione, $matr, $processo);

            if(!$stmt1->execute())
                throw new Exception("errore inserimento nella tabella nc_interna");

            if(!$stmt2->execute())
                throw new Exception("Errore selezione nella tabella nc_interna");

            $res = $stmt2->get_result();

			$res = db_result_to_array($res);
			$n = $res[0]["n"];

            $stmt3->bind_param("sss", $n, $user, $semilavorato);

            if(!$stmt3->execute())
                throw new Exception("Errore inserimento nella tablella rilevamento_interno");
			
			$conn->commit();

		} catch (Exception $ex) {

			$conn->rollback();
			return $ex;

		}

	}

    // modifica una nc
    function db_modifica_nc($stato, $priorita, $risolutore, $verificatore, $decisioni, $az_corr, $numero, $tipo) {

        global $conn;

        if($tipo == "input") {

            $stmt1 = $conn->prepare(update_nc_input);
            $stmt2 = $conn->prepare(update_risoluzione_input);
            $stmt3 = $conn->prepare(update_verifica_input);

        } else if ($tipo == "output") {

            $stmt1 = $conn->prepare(update_nc_output);
            $stmt2 = $conn->prepare(update_risoluzione_output);
            $stmt3 = $conn->prepare(update_verifica_output);

        } else if($tipo == "interna") {

            $stmt1 = $conn->prepare(update_nc_interna);
            $stmt2 = $conn->prepare(update_risoluzione_interna);
            $stmt3 = $conn->prepare(update_verifica_interna);

        }
        
        $_SESSION['error']['update']=$stmt1->error;
        $_SESSION['error']['update']=$stmt2->error;
        $_SESSION['error']['update']=$stmt3->error;

        $conn->begin_transaction();

        try {

            $result = db_get_nc($numero, $tipo);

            if(!isset($stato))              $stato = $result[0]["stato"];
            if(!isset($priorita))           $priorita = $result[0]["priorita"];
            if(!isset($risolutore))         $risolutore = $result[0]["risolutore"];
            if(!isset($verificatore))       $verificatore = $result[0]["verificatore"];
            if(!isset($decisioni))          $decisioni = $result[0]["decisioni"];
            if(!isset($az_corr))            $az_corr = $result[0]["az_corr"];

            $stmt1->bind_param("sssss", $stato, $priorita, $decisoni, $az_corr, $numero);
            $stmt2->bind_param("ss", $risolutore, $numero);
            $stmt3->bind_param("ss", $verificatore, $numero);

            if(!$stmt1->execute())
                throw new Exception("Errore aggiornamento nella tablella nc_qualcosa");

            if(!$stmt2->execute())
                throw new Exception("Errore aggiornamento nella tablella risoluzione_qualcosa");

            if(!$stmt3->execute())
                throw new Exception("Errore aggiornamento nella tablella verifica_qualcosa");
            
            $conn->commit();


        } catch(Exception $ex) {

            $conn->rollback();
            return $ex;

        }

    }

	// inserisce un nuovo impiegato
	function db_inserisci_impiegato($matricola, $nome, $cognome, $user, $password, $tipo, $processo) {

        global $conn;
		$stmt = $conn->prepare(insert_user_employee);

		try {
			
			$conn->begin_transaction();

            $stmt->bind_param("sssssss", $matricola, $nome, $cognome, $user, $password, $tipo, $processo);

            if(!$stmt->execute())
                throw new Exception("Errore inserimento nella tabella impiegato");
			
			$conn->commit();

		} catch (Exception $ex) {

			$conn->rollback();
			return $ex;

		}
	}

    // restituisce i dati di tutti gli impiegati
    function db_get_impiegati() {

        global $conn;
		$stmt = $conn->prepare(search_users_employees);
        $stmt->execute();
        $result = $stmt->get_result();
		$result = db_result_to_array($result);
		return $result;

    }

    // restituisce i dati di un impiegato
    function db_get_impiegato_spec($matr) {

        global $conn;
		$stmt = $conn->prepare(search_user_employee_all);
        $stmt->bind_param('s', $matr);
        $stmt->execute();
        $result = $stmt->get_result();
		$result = db_result_to_array($result);
		return $result;

    }

    // modifica un impiegato
    function db_modifica_impiegato($nome, $cognome, $user, $pw, $tipo, $processo, $matricola) {

        global $conn;
        $stmt1 = $conn->prepare(search_user_employee_all);
        $stmt2 = $conn->prepare(update_user_employee);

        try {

            $conn->begin_transaction();

            $stmt1->bind_param("s", $matricola);

            if(!$stmt1->execute())
                throw new Exception("Errore selezione tabella impiegato");

            $result = $stmt1->get_result();
            
            $result = db_result_to_array($result);

            if(!isset($nome))       $nome = $result[0]["Nome"];
            if(!isset($cognome))    $cognome = $result[0]["Cognome"];
            if(!isset($user))       $user = $result[0]["Username"];
            if(!isset($pw))         $pw = $result[0]["Password"];
            if(!isset($tipo))       $tipo = $result[0]["Tipo"];
            //if(!isset($processo))   $processo = $result[0]["Processo"];

            $stmt2->bind_param("ssssss", $nome, $cognome, $user, $tipo, $processo, $matricola);

            if(!$stmt2->execute())
                throw new Exception("Errore aggiornamento tabella impiegato");

            $conn->commit();

        } catch(Exception $ex) {

            $conn->rollback();
            return $ex;

        }
    }

    function db_licenzia_impiegato($matricola) {

        global $conn;
        $stmt = $conn->prepare(update_user_employee_licenzia);
        $stmt->bind_param("s", $matricola);
        $ok = $stmt->execute();
        if(!$ok) return "Errore licenziamento impiegato";

    }

    function db_get_impiegato_licenziato($matricola) {

        global $conn;
        $stmt = $conn->prepare(search_user_employee_licenziato);
        $stmt->bind_param("s", $matricola);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;

    }

    /*
    //ordina la dashboard secondo il numero
    function db_order_number($utente, $numero){
        
        global $conn;
		$stmt = $conn->prepare(order_nc_number);
        $stmt->bind_param("ss" , $utente, $numero);
        $stmt->execute();
        $result = $stmt->get_result();
		$result = db_result_to_array($result);
		return $result; 

    }*/

    //crea la dashboard con tutti gli impiegati per l'admin
    function fill_user_table(){
        $result=db_get_impiegati();
        create_table_user($result);
	}

    function fill_user_table_search($search_field)
    {
        //crare ricerca per le nc
        $search=htmlspecialchars($search_field);
        
        $pos=strpos($search, '=');
        if(!$pos){
            $_SESSION['error']='Input non valido';
        }
        $search_t=substr($search, 0, $pos);
        $search_temp=substr($search, $pos+1, strlen($search));
        $search_temp=str_replace("'", "", $search_temp);
        switch($search_t){
            case 'matricola':
                //cose da fare
                $result=db_get_matricola($search_temp."%");
                break;
            case 'nome':
                //cose da fare
                $result=db_get_nome($search_temp."%");
                break;
            case 'cognome':
                //cose da fare
                $result=db_get_cognome($search_temp."%");
                break;
            case 'tipo':
                //cose da fare
                $result=db_get_tipo($search_temp);
                break;
            case 'processo':
                //cose da fare
                $result=db_get_processo($search_temp."%");
                break;
            default:
                $_SESSION['error']='Input non valido';
                $result = db_get_impiegati();
        }
        create_table_user($result);
    }

    function create_table_user($result){
        if($result){
			foreach($result as $record){
				echo "<tr>";
				echo "<td>" . $record['Matricola'] . "</td>";
				echo "<td>" . $record['Nome'] . "</td>";
				echo "<td>" . $record['Cognome'] . "</td>";
				echo "<td>" . $record['Tipo'] . "</td>";
				echo "<td>" . $record['Processo'] . "</td>";
                echo "<td><a href='../details_user/index.php?id=".$record['Matricola']."'>Dettagli</a></td>";
				echo "</tr>";
			}
		}
    }

    //fa una ricerca di tutte le nc gestite/segnalate e altro da un determinato impiegato
	function fill_NC_table($matr){
        if($_SESSION['user']=='admin'){
            $result=db_get_riepilogo_admin();
        }
        else{
            $result = db_get_riepilogo($matr);
        }
        create_table($result);
	}

    //BACKEND controllare connessione database valida (controllare anche sessione credo)
    //far funzionare i require e cancellare il codice sostitutivo
    function fill_NC_table_search($search_field, $matr)
    {
        //crare ricerca per le nc
        $search=htmlspecialchars($search_field);
        
        $pos=strpos($search, '=');
        if(!$pos){
            $_SESSION['error']='Input non valido';
        }
        $search_t=substr($search, 0, $pos);
        $search_temp=substr($search, $pos+1, strlen($search));
        $search_temp=str_replace("'", "", $search_temp);
        switch($search_t){
            case 'data':
                //cose da fare
                $result=db_get_data($search_temp, $matr);
                break;
            case 'stato':
                //cose da fare
                $result=db_get_stato($search_temp, $matr);
                break;
            case 'priorita':
                //cose da fare
                $result=db_get_priorita($search_temp, $matr);
                break;
            case 'origine':
                //cose da fare
                $result=db_get_origine($search_temp, $matr);
                break;
            default:
                $_SESSION['error']='Input non valido';
                $result = db_get_riepilogo($matr);
        }
        create_table($result);
    }

    function create_table($result){
        if($result){
			foreach($result as $record){
				echo "<tr>";
				echo "<td>" . $record['numero'] . "</td>";
				echo "<td>" . $record['data'] . "</td>";
				echo "<td>" . $record['stato'] . "</td>";
				echo "<td>" . $record['priorita'] . "</td>";
				echo "<td>" . $record['origine'] . "</td>";
                echo "<td><a href='../details/index.php?id=".$record['numero']."'>Dettagli</a></td>";
				echo "</tr>";
			}
		}
    }

    //funzione che crea gli errori
    function get_error($error){
        $_SESSION['error']=$error;
        header("Location: ../");
        exit();
    }
    
?>