-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 12, 2022 alle 23:04
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcto`
--

-- --------------------------------------------------------

--
-- Struttura per vista `vi_riepilogo`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vi_riepilogo`  AS SELECT `nci`.`Numero` AS `numero`, `nci`.`Stato` AS `stato`, `nci`.`Priorita` AS `priorita`, `nci`.`Origine` AS `origine`, `nci`.`Descrizione` AS `descrizione`, `nci`.`Decisioni` AS `decisioni`, `nci`.`Azioni_correttive` AS `az_corr`, `nci`.`Addetto_gestione` AS `gestore`, 'input' AS `tipo`, `rili`.`Data` AS `data`, `rili`.`Materia_prima` AS `oggetto`, `rili`.`Impiegato` AS `segnalatore`, `risi`.`Fornitore` AS `risolutore`, `risi`.`Data_inizio` AS `data_inizio_risoluzione`, `risi`.`Data_fine` AS `data_fine_risoluzione`, `veri`.`Impiegato` AS `verificatore`, `veri`.`Data_inizio` AS `data_inizio_verifica`, `veri`.`Data_fine` AS `data_fine_verifica` FROM (((`nc_input` `nci` left join `rilevamento_input` `rili` on(`nci`.`Numero` = `rili`.`NC`)) left join `risoluzione_input` `risi` on(`nci`.`Numero` = `risi`.`NC`)) left join `verifica_input` `veri` on(`nci`.`Numero` = `veri`.`NC`)) ;

--
-- VIEW `vi_riepilogo`
-- Dati: Nessuno
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
