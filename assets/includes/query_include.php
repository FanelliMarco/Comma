 <?php

    // LOGIN
    if(!defined("search_user_employee")) define("search_user_employee", "SELECT * FROM impiegato WHERE Username=? AND Password=?"); // dati di un impiegato che si vuole autenticare
    if(!defined("search_user_client")) define("search_user_client", "SELECT * FROM cliente WHERE Username=? AND Password=?"); // dati di un cliente che si vuole autenticare
    
    // DASHBOARD
    if(!defined("search_nc_all")) define("search_nc_all", "SELECT * FROM vi_riepilogo WHERE gestore=? or segnalatore=? or risolutore=? or verificatore=?"); // non conformità relative ad un utente
    if(!defined("view_nc_all")) define("view_nc_all", "SELECT * FROM vi_riepilogo"); // visione totale delle non conformita per l'admin
    if(!defined("search_nc_data")) define("search_nc_data", "SELECT * FROM vi_riepilogo WHERE gestore=? and data=?"); //non conformita relativa ad un utente e data
    if(!defined("search_nc_stato")) define("search_nc_stato", "SELECT * FROM vi_riepilogo WHERE gestore=? and stato=?"); //non conformita relativa ad un utente e stato
    if(!defined("search_nc_priorita")) define("search_nc_priorita", "SELECT * FROM vi_riepilogo WHERE gestore=? and priorita=?"); //non conformita relativa ad un utente e priorita
    if(!defined("search_nc_origine")) define("search_nc_origine", "SELECT * FROM vi_riepilogo WHERE gestore=? and origine=?"); //non conformita relativa ad un utente e origine
    
    // SEGNALAZIONE
    if(!defined("search_processi_nome")) define("search_processi_nome", "SELECT Nome FROM processi"); // nomi di tutti i processi
    if(!defined("search_fornitori_nome")) define("search_fornitori_nome", "SELECT Nome FROM fornitore"); // nomi di tutti i fornitori

    if(!defined("insert_nc_input")) define("insert_nc_input", "INSERT INTO nc_input (Descrizione, Stato, Priorita, Origine) VALUES (?, 'rilevata', 'bassa', ?/* fornitore */)"); // nuova non confromità in input
    if(!defined("search_nc_input_number")) define("search_nc_input_number", "SELECT max(Numero) as n FROM nc_input"); // numero dell'ultima nc_input inserita
    if(!defined("insert_rilevamento_input")) define("insert_rilevamento_input", "INSERT INTO rilevamento_input (NC, Impiegato, Materia_prima, Data) VALUES (?/* output della search_nc_input_number */, ?, ?, now())"); // nuovo rilevamento in input

    if(!defined("insert_nc_output")) define("insert_nc_output", "INSERT INTO nc_output (Descrizione, Stato, Priorita, Origine) VALUES (?, 'rilevata', 'bassa', ?/* processo */)"); // nuova non confromità in output
    if(!defined("search_nc_output_number")) define("search_nc_output_number", "SELECT max(Numero) as n FROM nc_output"); // numero dell'ultima nc_output inserita
    if(!defined("insert_rilevamento_output")) define("insert_rilevamento_output", "INSERT INTO rilevamento_output (NC, Impiegato, prodotto, Data) VALUES (?/* output della search_nc_output_number */, ?, ?, now())"); // nuovo rilevamento in output

    if(!defined("insert_nc_interna")) define("insert_nc_interna", "INSERT INTO nc_interna (Descrizione, Stato, Priorita, Addetto_gestione, Origine) VALUES (?, 'rilevata', 'basso', ?, ?/* processo */)"); // nuova non conformità interna
    if(!defined("search_nc_interna_number")) define("search_nc_interna_number", "SELECT max(Numero) as n FROM nc_interna"); // numero dell'ultima nc_interna inserita
    if(!defined("insert_rilevamento_interno")) define("insert_rilevamento_interno", "INSERT INTO rilevamento_interno (NC, Impiegato, semilavorato, Data) VALUES (?/* output della search_nc_interna_number */, ?, ?, now())"); // nuovo rilevamento interno
    
    // MODIFICA
    // usare $search_nc_all
    if(!defined("search_nc_spec")) define("search_nc_spec", "SELECT * FROM vi_riepilogo WHERE numero=? AND tipo=?");

    if(!defined("update_nc_input")) define("update_nc_input", "UPDATE nc_input SET Stato=?, Priorita=?, Decisioni=?, Azioni_correttive=? WHERE Numero=?");
    if(!defined("update_risoluzione_input")) define("update_risoluzione_input", "UPDATE risoluzione_input SET Fornitore=? WHERE NC=?");
    if(!defined("update_verifica_input")) define("update_verifica_input", "UPDATE verifica_input SET Impiegato=? WHERE NC=?");

    if(!defined("update_nc_output")) define("update_nc_output", "UPDATE nc_output SET Stato=?, Priorita=?, Decisioni=?, Azioni_correttive=? WHERE Numero=?");
    if(!defined("update_risoluzione_output")) define("update_risoluzione_output", "UPDATE risoluzione_output SET Impiegato=? WHERE NC=?");
    if(!defined("update_verifica_output")) define("update_verifica_output", "UPDATE verifica_output SET Impiegato=? WHERE NC=?");

    if(!defined("update_nc_interna")) define("update_nc_interna", "UPDATE nc_interna SET Stato=?, Priorita=?, Decisioni=?, Azioni_correttive=? WHERE Numero=?");
    if(!defined("update_risoluzione_interna")) define("update_risoluzione_interna", "UPDATE risoluzione_interna SET Impiegato=? WHERE NC=?");
    if(!defined("update_verifica_interna")) define("update_verifica_interna", "UPDATE verifica_interna SET Impiegato=? WHERE NC=?");

    // REGISTRAZIONE
    if(!defined("insert_user_employee")) define("insert_user_employee", "INSERT INTO impiegato (Matricola, Nome, Cognome, Username, Password, Tipo, Processo, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, now(), now())"); // registrazione nuovo impiegato

    // GESTIONE IMPIEGATI
    if(!defined("search_users_employees")) define("search_users_employees", "SELECT * FROM impiegato");
    if(!defined("search_user_employee_all")) define("search_user_employee_all", "SELECT * FROM impiegato WHERE Matricola=?"); // dati deell'impiegato prima dell'aggiornamento
    if(!defined("update_user_employee")) define("update_user_employee", "UPDATE impiegato SET Nome=?, Cognome=?, Username=?, Tipo=?, Processo=?, updated_at=now() WHERE Matricola=?"); // aggiornamento dati dell'impiegato
    if(!defined("update_user_last_login")) define("update_user_last_login", "UPDATE impiegato SET last_login_at=now() WHERE Matricola=?");

    //MANAGEMENT
    if(!defined("search_users_matricola")) define("search_users_matricola", "SELECT * FROM impiegato WHERE Matricola LIKE ?");
    if(!defined("search_users_nome")) define("search_users_nome", "SELECT * FROM impiegato WHERE Nome LIKE ?");
    if(!defined("search_users_cognome")) define("search_users_cognome", "SELECT * FROM impiegato WHERE Cognome LIKE ?");
    if(!defined("search_users_tipo")) define("search_users_tipo", "SELECT * FROM impiegato WHERE Tipo=?");
    if(!defined("search_users_processo")) define("search_users_processo", "SELECT * FROM impiegato WHERE Processo LIKE ?");
    
    if(!defined("update_user_employee_licenzia")) define("update_user_employee_licenzia", "UPDATE impiegato SET deleted_at=now() WHERE Matricola=?");
    if(!defined("search_user_employee_licenziato")) define("search_user_employee_licenziato", "SELECT deleted_at FROM impiegato WHERE Matricola=?");
    
    /*
    // ORDINAMENTI NC DASHBOARD
    if(!defined("order_nc_number")) define("order_nc_number", "SELECT * FROM vi_riepilogo WHERE gestore=? ORDER BY numero"); //ordinamento per Numero
    if(!defined("order_nc_date")) define("order_nc_date", "SELECT * FROM vi_riepilogo WHERE gestore=? ORDER BY data"); //ordinamento per data
    if(!defined("order_nc_state")) define("order_nc_state", "SELECT * FROM vi_riepilogo WHERE gestore=? ORDER BY stato"); //ordinamento per stato
    if(!defined("order_nc_priority")) define("order_nc_priority", "SELECT * FROM vi_riepilogo WHERE ORDER BY priorita"); //ordinamento per priorita
    if(!defined("order_nc_origin")) define("order_nc_origin", "SELECT * FROM vi_riepilogo WHERE gestore=? ORDER BY origine"); //ordinamento per origine
    */
?>