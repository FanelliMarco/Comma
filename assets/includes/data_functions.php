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
        $stmt->bind_param("ss", $data, $matr);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
    }

    // restituisce tutte le non conformita di un certo stato e di un certo utente
    function db_get_stato($stato, $matr){
        global $conn;
        $stmt = $conn->prepare(search_nc_stato);
        $stmt->bind_param("ss", $stato, $matr);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
    }

    // restituisce tutte le non conformita di una certa priorita e di un certo utente
    function db_get_priorita($priorita, $matr){
        global $conn;
        $stmt = $conn->prepare(search_nc_priorita);
        $stmt->bind_param("ss", $priorita, $matr);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
    }

    // restituisce tutte le non conformita di una certa origine e di un certo utente
    function db_get_origine($origine, $matr){
        global $conn;
        $stmt = $conn->prepare(search_nc_origine);
        $stmt->bind_param("ss", $origine, $matr);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = db_result_to_array($result);
        return $result;
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
            $stmt1->execute();

            if(!$stmt1->get_result());
                throw new Exception("errore inserimento nella tabella nc_input");

            $stmt2->execute();
            $res = $stmt2->get_result();

            if(!$res)
                throw new Exception("Errore selezione nella tabella nc_input");

			$res = db_result_to_array($res);
			$n = $res[0]["n"];

            $stmt3->bind_param("ss", $n, $user, $materia_prima);
            $stmt3->execute();

            if(!$stmt1->get_result());
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
            $stmt1->execute();

            if(!$stmt1->get_result());
                throw new Exception("errore inserimento nella tabella nc_output");

            $stmt2->execute();
            $res = $stmt2->get_result();

            if(!$res)
                throw new Exception("Errore selezione nella tabella nc_output");

			$res = db_result_to_array($res);
			$n = $res[0]["n"];

            $stmt3->bind_param("ss", $n, $user, $mprodotto);
            $stmt3->execute();

            if(!$stmt1->get_result());
                throw new Exception("Errore inserimento nella tablella rilevamento_output");
			
			$conn->commit();

		} catch (Exception $ex) {

			$conn->rollback();
			return $ex;

		}

	}

	// inserisce una nuova non confromità interna
	function db_inserisci_nc_interna($processo, $semilavorato, $descrizione, $user) {

        global $conn;
		$stmt1 = $conn->prepare(insert_nc_interna);
        $stmt2 = $conn->prepare(search_nc_interna_number);
        $stmt3 = $conn->prepare(insert_rilevamento_interno);

		try {
			
			$conn->begin_transaction();

            $stmt1->bind_param("ss", $descrizione, $processo);
            $stmt1->execute();

            if(!$stmt1->get_result());
                throw new Exception("errore inserimento nella tabella nc_interna");

            $stmt2->execute();
            $res = $stmt2->get_result();

            if(!$res)
                throw new Exception("Errore selezione nella tabella nc_interna");

			$res = db_result_to_array($res);
			$n = $res[0]["n"];

            $stmt3->bind_param("ss", $n, $user, $semilavorato);
            $stmt3->execute();

            if(!$stmt1->get_result());
                throw new Exception("Errore inserimento nella tablella rilevamento_interno");
			
			$conn->commit();

		} catch (Exception $ex) {

			$conn->rollback();
			return $ex;

		}

	}

    // mofifica una nc
    function db_modifica_nc($stato, $priorita, $risolutore, $verificatore, $decisioni, $az_corr, $numero, $tipo) {

        global $conn;
        $stmt = $conn->prepare(update_nc_all);

        $conn->begin_transaction();

        try {

            $stmt->bind_param("ssssssss", $stato, $priorita, $risolutore, $verificatore, $decisoni, $az_corr, $numero, $tipo);
            $stmt->execute();

            if(!$stmt->get_result())
                throw new Exception("Errore aggiornamento nella vista vi_riepilogo");
            
            $conn->commit();

        } catch(Exception $ex) {

            $conn->rollback();
            return $ex;

        }

    }

	// inserisce un nuovo impiegato
	function db_inserisci_impiegato($nome, $cognome, $user, $pw, $tipo, $proceso) {

        global $conn;
		$stmt = $conn->prepare(insert_user_employee);

		try {
			
			$conn->begin_transaction();

            $stmt->bind_param("ssssss", $nome, $cognome, $user, $pw, $tipo, $processo);
			$stmt->execute();

            if(!$stmt->get_result())
                throw new Exception("Errore inserimento nella tabella impiegato");
			
			$conn->commit();

		} catch (Exception $ex) {

			$conn->rollback();
			return $ex;

		}
	}

    // restituisce i dati tutti gli impiegati
    function db_get_impiegati() {

        global $conn;
		$stmt = $conn->prepare(search_users_employees);
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
            $stmt1->execute();
            $result = $stmt1->get_result();

            if(!$result)
                throw new Exception("Errore selezione tabella impiegato");
            
            $result = db_result_to_array($result);

            if(!isset($nome))       $nome = $result[0]["Nome"];
            if(!isset($cognome))    $cognome = $result[0]["Cognome"];
            if(!isset($user))       $user = $result[0]["Username"];
            if(!isset($pw))         $pw = $result[0]["Password"];
            if(!isset($tipo))       $tipo = $result[0]["Tipo"];
            if(!isset($processo))   $processo = $result[0]["Processo"];

            $stmt2->bind_param("sssssss", $nome, $cognome, $user, $pw, $tipo, $processo);
            $stmt2->execute();

            if(!$stmt2->get_result())
                throw new Exception("Errore aggiornamento tabella impiegato");

            $conn->commit();

        } catch(Exception $ex) {

            $conn->rollback();
            return $ex;

        }
    }

	function fill_NC_table($matr){
        $result = db_get_riepilogo($matr);
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
            header("Location: ../");
            exit();
        }
        $search_t=substr($search, 0, $pos);
        switch($search_t){
            case 'data':
                //cose da fare
                $result=db_get_data($search, $matr);
                break;
            case 'stato':
                //cose da fare
                $result=db_get_stato($search, $matr);
                break;
            case 'priorita':
                //cose da fare
                $result=db_get_priorita($search, $matr);
                break;
            case 'origine':
                //cose da fare
                $result=db_get_origine($search, $matr);
                break;
            default:
                $_SESSION['error']='Input non valido';
                header("Location: ../");
                exit();
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
				echo "</tr>";
			}
		}
        //header('Location: ../');
        //exit();
    }

    //funzione che crea gli errori
    function error($error){
        $_SESSION['error']=$error;
        header("Location: ../");
        exit();
    }
?>