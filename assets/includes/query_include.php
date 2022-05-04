<?php

    // LOGIN
    $search_user_employee = "SELECT * FROM impiegato WHERE Username=? AND Password=?"; // dati di un impiegato che si vuole autenticare
    $search_user_client = "SELECT * FROM cliente WHERE Username=? AND Password=?"; // dati di un cliente che si vuole autenticare
    
    // DASHBOARD
    $search_nc_all = "SELECT * FROM vi_riepilogo WHERE gestore=? or segnalatore=? or risolutore=? or verificatore=?"; // non conformità relative ad un utente
    
    // SEGNALAZIONE
    $search_processi_nome = "SELECT Nome FROM processi"; // nomi di tutti i processi
    $search_fornitori_nome = "SELECT Nome FROM fornitore"; // nomi di tutti i fornitori

    $insert_nc_input = "INSERT INTO nc_input (Descrizione, Stato, Priorita, Origine) VALUES (?, 'rilevata', 'bassa', ?/* fornitore */)"; // nuova non confromità in input
    $search_nc_input_number = "SELECT max(Numero) as n FROM nc_input"; // numero dell'ultima nc_input inserita
    $insert_rilevamento_input = "INSERT INTO rilevamento_input (NC, Impiegato, Materia_prima, Data) VALUES (?/* output della $search_nc_input_number */, ?, ?, now())"; // nuovo rilevamento in input

    $insert_nc_output = "INSERT INTO nc_output (Descrizione, Stato, Priorita, Origine) VALUES (?, 'rilevata', 'bassa', ?/* processo */)"; // nuova non confromità in output
    $search_nc_output_number = "SELECT max(Numero) as n FROM nc_output"; // numero dell'ultima nc_output inserita
    $insert_rilevamento_input = "INSERT INTO rilevamento_output (NC, Impiegato, prodotto, Data) VALUES (?/* output della $search_nc_output_number */, ?, ?, now())"; // nuovo rilevamento in output

    $insert_nc_interna = "INSERT INTO nc_interna (Descrizione, Stato, Priorita, Origine) VALUES (?, 'rilevata', 'bassa', ?/* processo */)"; // nuova non conformità interna
    $search_nc_interna_number = "SELECT max(Numero) as n FROM nc_interna"; // numero dell'ultima nc_interna inserita
    $insert_rilevamento_inetrna = "INSERT INTO rilevamento_interno (NC, Impiegato, semilavorato, Data) VALUES (?/* output della $search_nc_interna_number */, ?, ?, now())"; // nuovo rilevamento interno
    
    // MODIFICA
    // usare $search_nc_all
    $update_nc_all = "UPDATE vi_riepilogo SET stato=?, priorita=?, risolutore=?, verificatore=?, decisioni=?, azz_corr=? WHERE numero=? AND tipo=?";

    // REGISTRAZIONE
    $insert_user_employee = "INSERT INTO impiegato (Matricola, Nome, Cognome, Username, Password, Tipo, Processo, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, now(), now())";

    // MODIFICA IMPIEGATI
    $search_user_employee_all = "SELECT Nome, Cognome, Username, Password, Tipo, Processo FROM impiegato WHERE Matricola=?";
    $update_user_employee = "UPDATE impiegato SET Nome=?, Cognome=?, Username=?, Password=?, Tipo=?, Processo=?, updated_at=now() WHERE Matricola=?";

?>