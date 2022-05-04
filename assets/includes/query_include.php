<?php

    $search_user_employee="SELECT * from impiegato where Username=? AND Password=?";
    $search_user_client="SELECT * from cliente where Username=? AND Password=?";
    $search_nc_all="SELECT nci.Numero as numero, nci.Stato as stato, nci.Priorita as priorita, nci.Origine as origine, nci.Descrizione as descrizione, nci.Decisioni as decisioni, nci.Azioni_correttive as az_corr, 'input' as tipo, rili.Impiegato
                    FROM nc_input as nci join rilevamento_input as rili on Numero = NC
                        join risoluzione_input as risi on Numero = NC
                        join verifica_input as veri on Numero = NC
                        
                    UNION
                    
                    SELECT nco.Numero as numero, nco.Stato as stato, nco.Priorita as priorita, nco.Origine as origine, nco.Descrizione as descrizione, nco.Decisioni as decisioni, nco.Azioni_correttive as az_corr, 'input' as tipo,
                    FROM nc_output as nco join rilevamento_output as rilo on Numero = NC
                        join risoluzione_output as riso on Numero = NC
                        join verifica_output as vero on Numero = NC
                    
                    UNION
                    
                    SELECT nci.Numero as numero, nci.Stato as stato, nci.Priorita as priorita, nci.Origine as origine, nci.Descrizione as descrizione, nci.Decisioni as decisioni, nci.Azioni_correttive as az_corr, 'input' as tipo,
                    FROM nc_interna as ncin join rilevamento_interno rilin on Numero = NC
                        join risoluzione_interna risin on Numero = NC
                        join verifica_interna verin on Numero = NC";
    $search_user_qc_officer="SELECT * from impiegato where Username=? AND Password=? AND Tipo = 'Addetto al controllo qualita'";

?>