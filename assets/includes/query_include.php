<?php

    // LOGIN
    if(!defined("search_user_employee")) define("search_user_employee", "SELECT * FROM impiegato WHERE Username=? AND Password=?"); // dati di un impiegato che si vuole autenticare
    if(!defined("search_user_client")) define("search_user_client", "SELECT * FROM cliente WHERE Username=? AND Password=?"); // dati di un cliente che si vuole autenticare
    
    // DASHBOARD
    if(!defined("search_nc_all")) define("search_nc_all", "SELECT * FROM vi_riepilogo WHERE gestore=? or segnalatore=? or risolutore=? or verificatore=?"); // non conformità relative ad un utente
    
    // SEGNALAZIONE
    if(!defined("search_processi_nome")) define("search_processi_nome", "SELECT Nome FROM processi"); // nomi di tutti i processi
    if(!defined("search_fornitori_nome")) define("search_fornitori_nome", "SELECT Nome FROM fornitore"); // nomi di tutti i fornitori

    if(!defined("insert_nc_input")) define("insert_nc_input", "INSERT INTO nc_input (Descrizione, Stato, Priorita, Origine) VALUES (?, 'rilevata', 'bassa', ?/* fornitore */)"); // nuova non confromità in input
    if(!defined("search_nc_input_number")) define("search_nc_input_number", "SELECT max(Numero) as n FROM nc_input"); // numero dell'ultima nc_input inserita
    if(!defined("insert_rilevamento_input")) define("insert_rilevamento_input", "INSERT INTO rilevamento_input (NC, Impiegato, Materia_prima, Data) VALUES (?/* output della search_nc_input_number */, ?, ?, now())"); // nuovo rilevamento in input

    if(!defined("insert_nc_output")) define("insert_nc_output", "INSERT INTO nc_output (Descrizione, Stato, Priorita, Origine) VALUES (?, 'rilevata', 'bassa', ?/* processo */)"); // nuova non confromità in output
    if(!defined("search_nc_output_number")) define("search_nc_output_number", "SELECT max(Numero) as n FROM nc_output"); // numero dell'ultima nc_output inserita
    if(!defined("insert_rilevamento_input")) define("insert_rilevamento_input", "INSERT INTO rilevamento_output (NC, Impiegato, prodotto, Data) VALUES (?/* output della search_nc_output_number */, ?, ?, now())"); // nuovo rilevamento in output

    if(!defined("insert_nc_interna")) define("insert_nc_interna", "INSERT INTO nc_interna (Descrizione, Stato, Priorita, Origine) VALUES (?, 'rilevata', 'bassa', ?/* processo */)"); // nuova non conformità interna
    if(!defined("search_nc_interna_number")) define("search_nc_interna_number", "SELECT max(Numero) as n FROM nc_interna"); // numero dell'ultima nc_interna inserita
    if(!defined("insert_rilevamento_inetrno")) define("insert_rilevamento_inetrno", "INSERT INTO rilevamento_interno (NC, Impiegato, semilavorato, Data) VALUES (?/* output della search_nc_interna_number */, ?, ?, now())"); // nuovo rilevamento interno
    
    // MODIFICA
    // usare $search_nc_all
    if(!defined("update_nc_all")) define("update_nc_all", "UPDATE vi_riepilogo SET stato=?, priorita=?, risolutore=?, verificatore=?, decisioni=?, azz_corr=? WHERE numero=? AND tipo=?"); // aggiornamento delle tablelle attraverso la vista

    // REGISTRAZIONE
    if(!defined("insert_user_employee")) define("insert_user_employee", "INSERT INTO impiegato (Matricola, Nome, Cognome, Username, Password, Tipo, Processo, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, now(), now())"); // registrazione nuovo impiegato

    // GESTIONE IMPIEGATI
    if(!defined("search_users_employees")) define("search_users_employees", "SELECT * FROM impiegato");
    if(!defined("search_user_employee_all")) define("search_user_employee_all", "SELECT Nome, Cognome, Username, Password, Tipo, Processo FROM impiegato WHERE Matricola=?"); // dati deell'impiegato prima dell'aggiornamento
    if(!defined("update_user_employee")) define("update_user_employee", "UPDATE impiegato SET Nome=?, Cognome=?, Username=?, Password=?, Tipo=?, Processo=?, updated_at=now() WHERE Matricola=?"); // aggiornamento dati dell'impiegato

?>