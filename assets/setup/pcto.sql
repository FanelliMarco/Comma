-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 02, 2022 alle 22:10
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 7.4.29

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

create schema pcto;
use pcto;

-- --------------------------------------------------------

--
-- Struttura della tabella `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `auth_type` varchar(255) NOT NULL,
  `selector` text NOT NULL,
  `token` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`username`, `email`, `password`, `nome`, `indirizzo`, `telefono`, `created_at`, `updated_at`, `deleted_at`, `last_login_at`) VALUES
('bpm', 'bpm@gmail.com', 'B685D42CE77340828731371174CD0ACB27B545922CC0879D68A0728C7B731D26', 'BPM', 'Via Roma', 2147483647, NULL, '2022-05-02 19:02:31', NULL, NULL),
('fineco', 'fineco@gmail.com', '6AA9E68229A313AB3159AC013FF047F4C0D3025A7ECB8DC2684D57E135CC0902', 'Fineco', 'Via Prato', 2147483647, NULL, '2022-05-02 19:02:31', NULL, NULL),
('generali', 'generali@gmail.com', '0FC0A4C5A84C8FF37367F425FF833B0A2B1A0DE7C0507B02D42D8C3A184F6884', 'Generali', 'Via Monte', 2147483647, NULL, '2022-05-02 19:02:31', NULL, NULL),
('intesa_san_paolo', 'intesasanpaolo@gmail.com', '7130EE8446EA733B45F3AB778519F94848C64594170A3F7BB680C00939CBF6DC', 'Intesa San Paolo', 'Via Facciolati', 2147483647, NULL, '2022-05-02 19:02:31', NULL, NULL),
('mediolanum', 'mediolanum@gmail.com', '116AB34633F55FA29772F206F789F963B06FAAEB942EF1BC638599519A6DDE68', 'Mediolanum', 'Via Keil', 2147483647, NULL, '2022-05-02 19:02:31', NULL, NULL),
('revolut', 'revolut@gmail.com', '58F4182F405C683D31E2F8B2DD145363C1919B16E961873C70FC695B1CAE0D6F', 'Revolut', 'Via Vittorio Veneto', 2147483647, NULL, '2022-05-02 19:02:31', NULL, NULL),
('sella', 'sella@gmail.com', '643266AE8F3F8B60986C29E49C7525F40509A63DD23065ED7D3BFCE35EE46F71', 'Sella', 'Via Del Martirio', 2147483647, NULL, '2022-05-02 19:02:31', NULL, NULL),
('unicredit', 'unicredit@gmail.com', 'unicreditP', 'Unicredit', 'Via Gemola', 2147483647, NULL, '2022-05-02 19:02:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `fornitore`
--

CREATE TABLE `fornitore` (
  `Nome` varchar(20) NOT NULL,
  `Indirizzo` varchar(40) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `fornitore`
--

INSERT INTO `fornitore` (`Nome`, `Indirizzo`, `Telefono`) VALUES
('fornitore1', 'ind forn 1', '29210383010'),
('fornitore2', 'ind forn 2', '20383194389'),
('fornitore3', 'ind forn 3', '38203752074');

-- --------------------------------------------------------

--
-- Struttura della tabella `impiegato`
--

CREATE TABLE `impiegato` (
  `Matricola` char(16) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Cognome` varchar(50) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Tipo` varchar(50) DEFAULT NULL,
  `Processo` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `impiegato`
--

INSERT INTO `impiegato` (`Matricola`, `Nome`, `Cognome`, `Username`, `Password`, `Tipo`, `Processo`, `created_at`, `updated_at`, `deleted_at`, `last_login_at`) VALUES
('0000001', 'Giuseppe', 'Manni', 'giuseppe_manni', 'EFF0E93D9B1B8DE86F48B88C261A222BCE4F65B6E3ED19A12124913F34B38951', 'Operaio', 'controllo qualita input', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000002', 'Pietro', 'Di Angelo', 'pietro_angelo', '193CA2DCA9B38D230B00E3E6F90C080D19E15EA564C3D0A2F64C8918CDF822ED', 'Operaio', 'controllo qualita input', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000003', 'Laura', 'Romani', 'laura_romani', 'CFD715DB9F65CA8CE14184BC20A5F51BED592C5D5DC951032FFF65C220983D3E', 'Operaio', 'irrigidimento plastica', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000004', 'Rodrigo', 'Costa', 'rodrigo_costa', 'F69F8FC89B7548FF0203C39470AD61CAEF36232BB11A924DE1385FC17E5B625F', 'Operaio', 'irrigidimento plastica', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000005', 'Luigi', 'De Cicco', 'luigi_ciccio', '2543CDA7BFA2FC4C1297E91DA053A15316128B88BDCDFF9747E3C78530B1D919', 'Operaio', 'irrigidimento plastica', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000006', 'Francesco', 'Padovan', 'francesco_padovan', 'BAE1474BE5ED291846D58B3638A8370532B5A4E7D2CA81E751D7119EF4F18E59', 'Operaio', 'stampaggio grafica', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000007', 'Angelo', 'Piazza', 'angelo_piazza', '712E983D1F9103D34238A6347BC34CCBC49A2E4CD5EFC614C83B356987755651', 'Operaio', 'stampaggio grafica', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000008', 'Maria', 'Baglio', 'maria_baglio', 'A581A7E95280E9BFB137D969D8C47C2FC7B854747A842C2BA3EC2C6B0E78D20E', 'Operaio', 'posizionamento degli elaborati', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000009', 'Anna', 'Cremonesi', 'anna_cremonesi', '1DAA07252B565FED430AB696519472494AA53F5C8127DFCC42BE17D81F1403E1', 'Operaio', 'inserimento contactless', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000010', 'Giuseppina', 'Toscani', 'giuseppina_toscani', '6D9D8FE9A441F78FD8EB2E285586FAAF54C8E11A8174BA0C53A3C0E1A62F2AC1', 'Operaio', 'laminazione', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000011', 'Angela', 'Longo', 'angela_longo', 'C91FC5AB927FA766B951967F37A00D13A7C461C224DFEA9B8328FF20F411AF82', 'Operaio', 'separazione carte', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000012', 'Concetta', ' Esposito', 'concetta_esposito', '7C51A9804E2DAAD41D5DE074D859441CC36048D4071D93023A7DCDF3FF786529', 'Operaio', 'separazione carte', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000013', 'Giorgio', 'Carraro', 'giorgio_carraro', '25E32A62A67556E6B381364D020C9344DD8AABA12A1D12A3C2D047C6512F1713', 'Operaio', 'applicazione ologramma anticontraffazione', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000014', 'Paolo', 'Fox', 'paolo_fox', '0D06887126CABE32A794727C847A169E5D9962D816AA919401947D7E48704CEC', 'Operaio', 'inserimento chip', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000015', 'Fabio', 'Martinelli', 'fabio_martinelli', '1DACD9F335D148B5CCE7AAB4F2AA8CADE7661C50E2253062B3BEF191A0782264', 'Operaio', 'inserimento chip', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000016', 'Francesca', 'Giordano', 'francesca_giordano', 'E6152480CFEEF866BB84503ED33E828F9D674D1F49A1DBA796D7B440CB5BADED', 'Operaio', 'inserimento banda magnetica', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000017', 'Matteo', 'Lombardi', 'matteo_lombardi', '551607A1B81F7E6F964B01E57BA5BB0F1E5DB2E374CB63F9DAED2805407A58A3', 'Operaio', 'inserimento banda magnetica', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000018', 'Carlo', 'Barbieri', 'carlo_barbieri', 'A6D09E4F725406CB9D6010E83B39B708AB099853BABB751C0B0840F8ACF3AA2B', 'Operaio', 'stampa codice carta', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000019', 'Cinzia', 'Moretti', 'cinzia_moretti', 'F8FBC7E94524BE8CC9A6F1707749CBCB59E4826F1455612504183755910E9A0E', 'Operaio', 'logistica', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000020', 'Leonardo', 'Rinaldi', 'leonardo_rinaldi', 'D620D07C8743FDABC5995F1ED749BE21EA59E9B41FAE985631BB5F190AB0B67B', 'Operaio', 'logistica', NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000021', 'Basilio', 'Celentano', 'basilio_celentano', '96C9811127209B5DD23C5B1EC7EC69E23074C478BCE3FC99945C1575BF0A94F0', 'Addetto al controllo qualita', NULL, NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000022', 'Fabiola', 'Denari', 'fabiola_denari', '0CB7E0D4D7A397614554381E0516BA74FD5F870A7056C5DD4E518CC6052F1E7A', 'Addetto al controllo qualita', NULL, NULL, '2022-05-02 19:02:31', NULL, NULL),
('0000023', 'Igor', 'Rampa', 'igor_rampa', '9755FEFC878A2990AD5123634FD9656E90557875350269EE095643E67BBFD481', 'Addetto al controllo qualita', NULL, NULL, '2022-05-02 19:02:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `materie_prime`
--

CREATE TABLE `materie_prime` (
  `Codice` varchar(10) NOT NULL,
  `Lotto` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `materie_prime`
--

INSERT INTO `materie_prime` (`Codice`, `Lotto`) VALUES
('0000000001', '0000000001'),
('0000000002', '0000000001'),
('0000000003', '0000000001'),
('0000000004', '0000000002'),
('0000000005', '0000000002'),
('0000000006', '0000000002'),
('0000000007', '0000000002'),
('0000000008', '0000000003'),
('0000000009', '0000000003'),
('0000000010', '0000000004'),
('0000000011', '0000000004'),
('0000000012', '0000000004'),
('0000000013', '0000000004'),
('0000000014', '0000000005'),
('0000000015', '0000000005');

-- --------------------------------------------------------

--
-- Struttura della tabella `nc_input`
--

CREATE TABLE `nc_input` (
  `Numero` int(11) NOT NULL,
  `Descrizione` varchar(255) DEFAULT NULL,
  `Azioni_correttive` varchar(20) DEFAULT NULL,
  `Decisioni` varchar(255) DEFAULT NULL,
  `Stato` varchar(20) DEFAULT NULL,
  `Priorita` varchar(20) DEFAULT NULL,
  `Addetto_gestione` char(16) NOT NULL,
  `Origine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `nc_interna`
--

CREATE TABLE `nc_interna` (
  `Numero` int(11) NOT NULL,
  `Descrizione` varchar(255) DEFAULT NULL,
  `Azioni_correttive` varchar(255) DEFAULT NULL,
  `Decisioni` varchar(255) DEFAULT NULL,
  `Stato` varchar(50) DEFAULT NULL,
  `Priorita` varchar(50) DEFAULT NULL,
  `Addetto_gestione` char(16) NOT NULL,
  `Origine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `nc_interna`
--

INSERT INTO `nc_interna` (`Numero`, `Descrizione`, `Azioni_correttive`, `Decisioni`, `Stato`, `Priorita`, `Addetto_gestione`, `Origine`) VALUES
(1, 'stampa non conforme', NULL, 'semilavorato scartato', 'rilevata', 'basso', '0000021', 'stampaggio grafica'),
(2, 'fogli disallineati', NULL, 'semilavorato scartato', 'in risoluzione', 'basso', '0000023', 'laminazione'),
(3, 'plastica non irrigidita abbastanza', 'ripetere il processo di irrigidimento', 'rilavorazione', 'Risolta', 'basso', '0000022', 'laminazione');

-- --------------------------------------------------------

--
-- Struttura della tabella `nc_output`
--

CREATE TABLE `nc_output` (
  `Numero` int(11) NOT NULL,
  `Descrizione` varchar(255) DEFAULT NULL,
  `Azioni_correttive` varchar(20) DEFAULT NULL,
  `Decisioni` varchar(255) DEFAULT NULL,
  `Stato` varchar(20) DEFAULT NULL,
  `Priorita` varchar(20) DEFAULT NULL,
  `Addetto_gestione` char(16) NOT NULL,
  `Origine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `processi`
--

CREATE TABLE `processi` (
  `Nome` varchar(50) NOT NULL,
  `Descrizione` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `processi`
--

INSERT INTO `processi` (`Nome`, `Descrizione`) VALUES
('applicazione ologramma anticontraffazione', 'nel retro della carta viene applicato l ologramma anticontraffazione'),
('controllo qualita input', 'l operaio controlla se le materie prime sono conformi alle norme con le quali sono state acquistate'),
('controllo stampa grafica', 'l operaio addetto al controllo controlla se la stampa è avvenuta con successo e se segue tutte le norme di conformita'),
('inserimento banda magnetica', 'nel retro della carta viene inserita la banda magnetica che serve per il riconoscimento della carta quando viene inserita nel POS o nell ATM'),
('inserimento chip', 'nella carta viene inserito il chip per collegarsi al circuito bancario'),
('inserimento contactless', 'tramite apposito macchinario viene inserito il chip per il pagamento contactless'),
('irrigidimento plastica', 'l operaio tramite apposito macchinario irrigidisce i fogli di PVC'),
('laminazione', 'tramite pressa industriale i componenti vengono pressati assieme'),
('logistica', 'le carte vengono imballate e spedite al cliente'),
('posizionamento degli elaborati', 'l operaio posiziona i vari strati uno sopra l altro allineati'),
('separazione carte', 'le carte vengono separate dal foglio di PVC'),
('stampa codice carta', 'nel fronte della carta vengono incisi i numeri che servono per l identificazione della carta'),
('stampaggio grafica', 'tramite una stampante industriale viene stampata la grafica che successivamente verra applicata alla carta di credito');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `Codice` varchar(10) NOT NULL,
  `Lotto` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`Codice`, `Lotto`) VALUES
('0000000026', '0000000001'),
('0000000027', '0000000001'),
('0000000028', '0000000001'),
('0000000029', '0000000001'),
('0000000030', '0000000001'),
('0000000031', '0000000002'),
('0000000032', '0000000002'),
('0000000033', '0000000002'),
('0000000034', '0000000003'),
('0000000035', '0000000003'),
('0000000036', '0000000003'),
('0000000037', '0000000003'),
('0000000038', '0000000003'),
('0000000039', '0000000003'),
('0000000040', '0000000004'),
('0000000041', '0000000004'),
('0000000042', '0000000004'),
('0000000043', '0000000004'),
('0000000044', '0000000005'),
('0000000045', '0000000005'),
('0000000046', '0000000005'),
('0000000047', '0000000005'),
('0000000048', '0000000005'),
('0000000049', '0000000006'),
('0000000050', '0000000006');

-- --------------------------------------------------------

--
-- Struttura della tabella `rilevamento_input`
--

CREATE TABLE `rilevamento_input` (
  `NC` int(11) NOT NULL,
  `Impiegato` varchar(20) NOT NULL,
  `Materia_prima` varchar(10) NOT NULL,
  `Data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `rilevamento_interno`
--

CREATE TABLE `rilevamento_interno` (
  `NC` int(11) NOT NULL,
  `Impiegato` char(16) NOT NULL,
  `Semilavorato` char(16) NOT NULL,
  `Data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `rilevamento_interno`
--

INSERT INTO `rilevamento_interno` (`NC`, `Impiegato`, `Semilavorato`, `Data`) VALUES
(1, '0000003', '0000000017', '2021-01-02'),
(2, '0000004', '0000000001', '2020-06-15'),
(3, '0000001', '0000000010', '2020-05-17'),
(3, '0000002', '0000000016', '2021-11-29');

-- --------------------------------------------------------

--
-- Struttura della tabella `rilevamento_output`
--

CREATE TABLE `rilevamento_output` (
  `NC` int(11) NOT NULL,
  `Cliente` varchar(40) NOT NULL,
  `Prodotto` varchar(10) NOT NULL,
  `Data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `risoluzione_input`
--

CREATE TABLE `risoluzione_input` (
  `NC` int(11) NOT NULL,
  `Fornitore` varchar(20) NOT NULL,
  `Data_inizio` date DEFAULT NULL,
  `Data_fine` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `risoluzione_interna`
--

CREATE TABLE `risoluzione_interna` (
  `NC` int(11) NOT NULL,
  `Impiegato` char(16) NOT NULL,
  `Data_inizio` date DEFAULT NULL,
  `Data_fine` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `risoluzione_output`
--

CREATE TABLE `risoluzione_output` (
  `NC` int(11) NOT NULL,
  `Impiegato` varchar(20) NOT NULL,
  `Data_inizio` date DEFAULT NULL,
  `Data_fine` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `semilavorato`
--

CREATE TABLE `semilavorato` (
  `Codice` char(16) NOT NULL,
  `Lotto` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `semilavorato`
--

INSERT INTO `semilavorato` (`Codice`, `Lotto`) VALUES
('0000000001', '0000000001'),
('0000000002', '0000000001'),
('0000000003', '0000000001'),
('0000000004', '0000000001'),
('0000000005', '0000000001'),
('0000000006', '0000000002'),
('0000000007', '0000000002'),
('0000000008', '0000000002'),
('0000000009', '0000000003'),
('0000000010', '0000000003'),
('0000000011', '0000000003'),
('0000000012', '0000000003'),
('0000000013', '0000000003'),
('0000000014', '0000000003'),
('0000000015', '0000000004'),
('0000000016', '0000000004'),
('0000000017', '0000000004'),
('0000000018', '0000000004'),
('0000000019', '0000000005'),
('0000000020', '0000000005'),
('0000000021', '0000000005'),
('0000000022', '0000000005'),
('0000000023', '0000000005'),
('0000000024', '0000000006'),
('0000000025', '0000000006');

-- --------------------------------------------------------

--
-- Struttura della tabella `verifica_input`
--

CREATE TABLE `verifica_input` (
  `NC` int(11) NOT NULL,
  `Impiegato` varchar(20) NOT NULL,
  `Data_inizio` date DEFAULT NULL,
  `Data_fine` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `verifica_interna`
--

CREATE TABLE `verifica_interna` (
  `NC` int(11) NOT NULL,
  `Impiegato` char(16) NOT NULL,
  `Data_inizio` date DEFAULT NULL,
  `Data_fine` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `verifica_output`
--

CREATE TABLE `verifica_output` (
  `NC` int(11) NOT NULL,
  `Impiegato` varchar(20) NOT NULL,
  `Data_inizio` date DEFAULT NULL,
  `Data_fine` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `fornitore`
--
ALTER TABLE `fornitore`
  ADD PRIMARY KEY (`Nome`);

--
-- Indici per le tabelle `impiegato`
--
ALTER TABLE `impiegato`
  ADD PRIMARY KEY (`Matricola`),
  ADD KEY `Processo` (`Processo`);

--
-- Indici per le tabelle `materie_prime`
--
ALTER TABLE `materie_prime`
  ADD PRIMARY KEY (`Codice`);

--
-- Indici per le tabelle `nc_input`
--
ALTER TABLE `nc_input`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Addetto_gestione` (`Addetto_gestione`),
  ADD KEY `Origine` (`Origine`);

--
-- Indici per le tabelle `nc_interna`
--
ALTER TABLE `nc_interna`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Addetto_gestione` (`Addetto_gestione`),
  ADD KEY `Origine` (`Origine`);

--
-- Indici per le tabelle `nc_output`
--
ALTER TABLE `nc_output`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Addetto_gestione` (`Addetto_gestione`),
  ADD KEY `Origine` (`Origine`);

--
-- Indici per le tabelle `processi`
--
ALTER TABLE `processi`
  ADD PRIMARY KEY (`Nome`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`Codice`);

--
-- Indici per le tabelle `rilevamento_input`
--
ALTER TABLE `rilevamento_input`
  ADD PRIMARY KEY (`NC`,`Impiegato`,`Materia_prima`),
  ADD KEY `Impiegato` (`Impiegato`),
  ADD KEY `Materia_prima` (`Materia_prima`);

--
-- Indici per le tabelle `rilevamento_interno`
--
ALTER TABLE `rilevamento_interno`
  ADD PRIMARY KEY (`NC`,`Impiegato`,`Semilavorato`),
  ADD KEY `Impiegato` (`Impiegato`),
  ADD KEY `Semilavorato` (`Semilavorato`);

--
-- Indici per le tabelle `rilevamento_output`
--
ALTER TABLE `rilevamento_output`
  ADD PRIMARY KEY (`NC`,`Cliente`,`Prodotto`),
  ADD KEY `Cliente` (`Cliente`),
  ADD KEY `Prodotto` (`Prodotto`);

--
-- Indici per le tabelle `risoluzione_input`
--
ALTER TABLE `risoluzione_input`
  ADD PRIMARY KEY (`NC`,`Fornitore`),
  ADD KEY `Fornitore` (`Fornitore`);

--
-- Indici per le tabelle `risoluzione_interna`
--
ALTER TABLE `risoluzione_interna`
  ADD PRIMARY KEY (`NC`,`Impiegato`),
  ADD KEY `Impiegato` (`Impiegato`);

--
-- Indici per le tabelle `risoluzione_output`
--
ALTER TABLE `risoluzione_output`
  ADD PRIMARY KEY (`NC`,`Impiegato`),
  ADD KEY `Impiegato` (`Impiegato`);

--
-- Indici per le tabelle `semilavorato`
--
ALTER TABLE `semilavorato`
  ADD PRIMARY KEY (`Codice`);

--
-- Indici per le tabelle `verifica_input`
--
ALTER TABLE `verifica_input`
  ADD PRIMARY KEY (`NC`,`Impiegato`),
  ADD KEY `Impiegato` (`Impiegato`);

--
-- Indici per le tabelle `verifica_interna`
--
ALTER TABLE `verifica_interna`
  ADD PRIMARY KEY (`NC`,`Impiegato`),
  ADD KEY `Impiegato` (`Impiegato`);

--
-- Indici per le tabelle `verifica_output`
--
ALTER TABLE `verifica_output`
  ADD PRIMARY KEY (`NC`,`Impiegato`),
  ADD KEY `Impiegato` (`Impiegato`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `nc_input`
--
ALTER TABLE `nc_input`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `nc_interna`
--
ALTER TABLE `nc_interna`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `impiegato`
--
ALTER TABLE `impiegato`
  ADD CONSTRAINT `impiegato_ibfk_1` FOREIGN KEY (`Processo`) REFERENCES `processi` (`Nome`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `nc_input`
--
ALTER TABLE `nc_input`
  ADD CONSTRAINT `nc_input_ibfk_1` FOREIGN KEY (`Addetto_gestione`) REFERENCES `impiegato` (`Matricola`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nc_input_ibfk_2` FOREIGN KEY (`Origine`) REFERENCES `fornitore` (`Nome`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `nc_interna`
--
ALTER TABLE `nc_interna`
  ADD CONSTRAINT `nc_interna_ibfk_1` FOREIGN KEY (`Addetto_gestione`) REFERENCES `impiegato` (`Matricola`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nc_interna_ibfk_2` FOREIGN KEY (`Origine`) REFERENCES `processi` (`Nome`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `nc_output`
--
ALTER TABLE `nc_output`
  ADD CONSTRAINT `nc_output_ibfk_1` FOREIGN KEY (`Addetto_gestione`) REFERENCES `impiegato` (`Matricola`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nc_output_ibfk_2` FOREIGN KEY (`Origine`) REFERENCES `processi` (`Nome`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `rilevamento_input`
--
ALTER TABLE `rilevamento_input`
  ADD CONSTRAINT `rilevamento_input_ibfk_1` FOREIGN KEY (`NC`) REFERENCES `nc_input` (`Numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rilevamento_input_ibfk_2` FOREIGN KEY (`Impiegato`) REFERENCES `impiegato` (`Matricola`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rilevamento_input_ibfk_3` FOREIGN KEY (`Materia_prima`) REFERENCES `materie_prime` (`Codice`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `rilevamento_interno`
--
ALTER TABLE `rilevamento_interno`
  ADD CONSTRAINT `rilevamento_interno_ibfk_1` FOREIGN KEY (`NC`) REFERENCES `nc_interna` (`Numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rilevamento_interno_ibfk_2` FOREIGN KEY (`Impiegato`) REFERENCES `impiegato` (`Matricola`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rilevamento_interno_ibfk_3` FOREIGN KEY (`Semilavorato`) REFERENCES `semilavorato` (`Codice`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `rilevamento_output`
--
ALTER TABLE `rilevamento_output`
  ADD CONSTRAINT `rilevamento_output_ibfk_1` FOREIGN KEY (`NC`) REFERENCES `nc_output` (`Numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rilevamento_output_ibfk_2` FOREIGN KEY (`Cliente`) REFERENCES `cliente` (`nome`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rilevamento_output_ibfk_3` FOREIGN KEY (`Prodotto`) REFERENCES `prodotto` (`Codice`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `risoluzione_input`
--
ALTER TABLE `risoluzione_input`
  ADD CONSTRAINT `risoluzione_input_ibfk_1` FOREIGN KEY (`NC`) REFERENCES `nc_input` (`Numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `risoluzione_input_ibfk_2` FOREIGN KEY (`Fornitore`) REFERENCES `fornitore` (`Nome`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `risoluzione_interna`
--
ALTER TABLE `risoluzione_interna`
  ADD CONSTRAINT `risoluzione_interna_ibfk_1` FOREIGN KEY (`NC`) REFERENCES `nc_interna` (`Numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `risoluzione_interna_ibfk_2` FOREIGN KEY (`Impiegato`) REFERENCES `impiegato` (`Matricola`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `risoluzione_output`
--
ALTER TABLE `risoluzione_output`
  ADD CONSTRAINT `risoluzione_output_ibfk_1` FOREIGN KEY (`NC`) REFERENCES `nc_output` (`Numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `risoluzione_output_ibfk_2` FOREIGN KEY (`Impiegato`) REFERENCES `impiegato` (`Matricola`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `verifica_input`
--
ALTER TABLE `verifica_input`
  ADD CONSTRAINT `verifica_input_ibfk_1` FOREIGN KEY (`NC`) REFERENCES `nc_input` (`Numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `verifica_input_ibfk_2` FOREIGN KEY (`Impiegato`) REFERENCES `fornitore` (`Nome`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `verifica_interna`
--
ALTER TABLE `verifica_interna`
  ADD CONSTRAINT `verifica_interna_ibfk_1` FOREIGN KEY (`NC`) REFERENCES `nc_interna` (`Numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `verifica_interna_ibfk_2` FOREIGN KEY (`Impiegato`) REFERENCES `impiegato` (`Matricola`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `verifica_output`
--
ALTER TABLE `verifica_output`
  ADD CONSTRAINT `verifica_output_ibfk_1` FOREIGN KEY (`NC`) REFERENCES `nc_output` (`Numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `verifica_output_ibfk_2` FOREIGN KEY (`Impiegato`) REFERENCES `impiegato` (`Matricola`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
