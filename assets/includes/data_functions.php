<?php

    require '../../assets/setup/connessionedb.php';
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
/*
	// restituisce tutti i dati delle non conformità relative ad un utente
	function db_get_riepilogo($user) {

		$conn = dbConnect();
		$ris = $conn->query("SELECT * FROM VI_RIEPILOGO WHERE gestore='$user' or segnalatore='$user' or risolutore='$user' or verificatore='$user'");
		$riepilogo_nc = db_result_to_array($ris);
		return $riepilogo_nc;

	}

	// restituisce i nomi di tutti i processi
	function db_get_processi() {

		$conn = dbConnect();
		$ris = $conn->query("SELECT Nome FROM processi")
    	$processi = db_result_to_array($ris);
		return $processi;

	}

	// restituisce i nomi di tutti i fornitori
	function db_get_fornitori() {

		$conn = dbConnect();
		$ris = $conn->query("SELECT Nome FROM fornitore");
   		$fornitori = array_result($ris);
		return $fornitori;

	}

	// inserisce una nuova non confromità in input
	function db_inserisci_nc_input($fornitore, $materia_prima, $descrizione, $user) {

		$conn = dbConnect();

		try {
			
			$conn->begin_transaction();

			if(!$conn->query("INSERT INTO nc_input (Descrizione, Stato, Priorita, Origine) VALUES ('$descrizione', 'rilevata', 'bassa', '$fornitore')"))
				throw new Exception("errore inserimento nella tabella nc_input");

			$ris = $conn->query("SELECT max(Numero) as n FROM nc_input");
			if(!$ris)
				throw new Exception("Errore selezione nella tabella nc_input");
			$row = $ris->fetch_assoc();
			$n = $row["n"];

			if(!$conn->query("INSERT INTO rilevamento_input (NC, Impiegato, Materia_prima, Data) VALUES ($n, '$user', '$materia_prima', now())"))
				throw new Exception("Errore inserimento nella tablella rilevamento_input");
			
			$conn->commit();

		} catch (Exception $ex) {

			$conn->rollback();
			return $ex;

		}
	}

	// inserisce una nuova non confromità in output
	function db_inserisci_nc_output($processo, $prodotto, $descrizione, $user) {

		$conn = dbConnect();

		try {
			
			$conn->begin_transaction();

			if(!$conn->query("INSERT INTO nc_output (Descrizione, Stato, Priorita, Origine) VALUES ('$descrizione', 'rilevata', 'bassa', '$processo')"))
				throw new Exception("errore inserimento nella tabella nc_output");

			$ris = $conn->query("SELECT max(Numero) as n FROM nc_output");
			if(!$ris)
				throw new Exception("Errore selezione nella tabella nc_output");
			$row = $ris->fetch_assoc();
			$n = $row["n"];

			if(!$conn->query("INSERT INTO rilevamento_output (NC, Impiegato, prodotto, Data) VALUES ($n, '$user', '$prodotto', now())"))
				throw new Exception("Errore inserimento nella tablella rilevamento_output");
			
			$conn->commit();

		} catch (Exception $ex) {

			$conn->rollback();
			return $ex;

		}
	}

	// inserisce una nuova non confromità interna
	function db_inserisci_nc_interna($processo, $semilavorato, $descrizione, $user) {

		$conn = dbConnect();

		try {
			
			$conn->begin_transaction();

			if(!$conn->query("INSERT INTO nc_interna (Descrizione, Stato, Priorita, Origine) VALUES ('$descrizione', 'rilevata', 'bassa', '$processo')"))
				throw new Exception("errore inserimento nella tabella nc_interna");

			$ris = $conn->query("SELECT max(Numero) as n FROM nc_interna");
			if(!$ris)
				throw new Exception("Errore selezione nella tabella nc_interna");
			$row = $ris->fetch_assoc();
			$n = $row["n"];

			if(!$conn->query("INSERT INTO rilevamento_interno (NC, Impiegato, semilavorato, Data) VALUES ($n, '$user', '$semilavorato', now())"))
				throw new Exception("Errore inserimento nella tablella rilevamento_interno");
			
			$conn->commit();

		} catch (Exception $ex) {

			$conn->rollback();
			return $ex;

		}
	}

	// inserisce un nuovo impiegato
	function db_inserisci_impiegato($user, $email, $password, $password2, $nome, $cognome, $tipo) {

		$conn = dbConnect();

		try {
			
			$conn->begin_transaction();

			if(!$conn->query("INSERT INTO impiegato (matricola, )"))
			
			$conn->commit();

		} catch (Exception $ex) {

			$conn->rollback();
			return $ex;

		}
	}

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
/*

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
    }*/
?>