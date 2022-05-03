<p align="center">
  <img src="assets/images/logo.png" width="350" align="center"/>
</p><br>

Sistema di qualcosa PHP di facile integrazione e sicurezza elevata con login, registrazione, profili utente, modifica profilo, verifica dell'account via e-mail, sistema di reimpostazione della password, disconnessione automatica in caso di inattività, variabile di stato e di errore globali, controlli di autenticazione.
# Tabella dei contenuti
- [Introduzione](#introduzione)
- [Requisiti](#requisiti)
- [Documentazione](#documentazione)
- [Installazione](#installazione)
- [Popolazione Database](#popolazione-database)
- [Struttura File Progetto](#struttura-file-progetto)
- [Istruzioni](#istruzioni)
- [Componenti](#componenti)
  - [Linguaggi di Programmazione](#linguaggi-di-programmazione)
  - [Ambiente di Sviluppo](#ambiente-di-sviluppo)
  - [Risorse Esterne](#risorse-esterneplugins)
- [Sicurezza](#sicurezza)
- [SQL Injection Protection](#sql-injection-protection)
- [Login](#login)
- [Automatic Logout on Inactivity](#automatic-logout-on-inactivity)
- [License](#license)

## Introduzione
### Qual'era lo scopo che era stato richiesto?
Lo scopo di questa esperienza scolastica é la realizzazione di una web application che sia conforme con quanto ci é stato insegnato, che rispetti le convenzioni che ci impone la normativa ISO 9001.
### Dove é stata la parte più complicata?
La parte più complicata é stata nel capire il processo di produzione delle carte di credito in quanto tali informazioni non vengono divulgate facilmente.   
### Da che cosa abbiamo preso spunto? 
Abbiamo preso spunto da quanto ci é stato insegnato a scuola nella materia di GPOI , TPSIT e INFORMATICA.
### Cosa ci ha lasciato questa esperienza?
Ci ha permesso di capire come progettare un software informatico non solo nell'aspetto di produzione ma anche lo sviluppo della adeguata documentazione e analisi dei requisiti e rischi.
### Di cosa si occupa la nostra Web Application?
Si occupa della gestione e della risoluzione delle non conformità.
### Cosa si intende per risoluzione di una non conformità?
La presa in carico di un problema e quindi la decisione di azioni correttive.
## Requisiti
### Documentazione
 - [Storyboard](https://www.figma.com/file/yWIW5gWp5eheBposYQcpyd/storyboard?node-id=0%3A1)
 - [Schema ER](https://github.com/pcto5ID/Comma/blob/main/assets/documentation/schema_E-R_NC_ristrutturato.png)
 - [Gantt](https://github.com/pcto5ID/Comma/blob/main/assets/documentation/GANTT_PCTO.pdf)
 - [WBS](https://github.com/pcto5ID/Comma/blob/main/assets/documentation/WBS.png)
 - [CPM](https://github.com/pcto5ID/Comma/blob/main/assets/documentation/Diagramma_dipendenze.png)
 - [Template](https://github.com/msaad1999/PHP-Login-System)
### Installazione
1. Importa il file 'assets/setup/db.sql' nel DBMS (PhpMyAdmin). Il file dump crea il database, quindi nessun tipo di azione é richiesta. Se si vuole aggiornare il nome del database, cambialo nel file dump dove il database é dichiarato.
2. Modifica il file `assets / setup / env.php` e configura le informazioni dell'applicazione, la connessione al database e il server SMTP. Il valore della porta di solito non è necessario nelle connessioni al database, quindi modifica solo se sai cosa stai facendo. Il server di posta elettronica (e l'account di posta elettronica collegato) verrà utilizzato per inviare email di conferma, validazione e notifica.
```php
// env.php

if (!defined('APP_NAME'))                       define('APP_NAME', 'Comma Application');
if (!defined('APP_ORGANIZATION'))               define('APP_ORGANIZATION', 'Comma');
if (!defined('APP_OWNER'))                      define('APP_OWNER', '');
if (!defined('APP_DESCRIPTION'))                define('APP_DESCRIPTION', 'Embeddable PHP Login System');

if (!defined('ALLOWED_INACTIVITY_TIME'))        define('ALLOWED_INACTIVITY_TIME', time()+1*60);

if (!defined('DB_DATABASE'))                    define('DB_DATABASE', 'pcto');
if (!defined('DB_HOST'))                        define('DB_HOST','127.0.0.1');
if (!defined('DB_USERNAME'))                    define('DB_USERNAME','root');
if (!defined('DB_PASSWORD'))                    define('DB_PASSWORD' ,'123456');
if (!defined('DB_PORT'))                        define('DB_PORT' ,'');
```
### Popolazione Database
Il database contiene già accounts di prova per testare e correggere eventuali bug. Usalo o vai alla pagina di registrazione e inizia a creare nuovi account.
Puoi usare anche siti come Mockaroo o faker-js per generare grandi quantità di dati da inserire nel database.
### Struttura File Progetto
Il progetto è stato creato con la struttura standard dei file di sviluppo PHP, per mantenere la flessibilità. Aggiungi semplicemente altre funzionalità / pagine nello stesso modo in cui sono state create le cartelle di pagina di esempio nella cartella principale.

In ciascuna cartella di pagina, il file `index.php` è la pagina principale, la cartella `includes` contiene la funzionalità backend e il file `custom.css` consente disegni personalizzati su un file css globale senza interferire con altre pagine.
| Path / File | Purpose  |
| -- | -- | 
| `[accessible URLs/Pages]`     | Tutti i folder nella directory root, tranne quello chiamato `assets`. |
| `assets/css`                  | Cartelle per i file CSS personalizzati globali o specifici per il layout. |
| `assets/images`               | Le immagini utilizzate nell'interfaccia utente dell'applicazione o nel file README di git. |
| `assets/includes`             | Funzioni o classi. |
| `assets/setup`                | File di configurazione e di setup del progetto. |
| `assets/vendor`               | Cartella per tutti i plugin / risorse. |
| `assets/documentation`               | Cartella per tutta la documentazione inerente al progetto |

### Istruzioni
Le nuove pagine possono essere aggiunte rapidamente creando più cartelle nella directory principale, con il file frontend `index.php`,le funzionalità backend nella sottocartella `includes` e lo stile personalizzato nel file `custom.css`.

Nuovi gruppi di funzioni o classi possono essere creati in nuovi file nella cartella `assets/includes/` e devono essere inclusi nelle pagine rilevanti. 

Se le funzionalità aggiunte sono in gran parte universali, possono essere richiesti nel file `assets/layouts/header.php` (questo li include per tutti i file frontend, ma i file backend dovranno ancora essere collegati singolarmente). Allo stesso modo, altri file di CSS globali possono essere salvati nella cartella `assets/css` e inclusi nel file di layout header.php.

Ulteriori plugin o risorse offline possono essere collocati nella cartella`assets/vendor/` e collegati nel file di layout header o footer, a seconda del tipo di file da collegare.

Il sistema è già stato realizzato con la struttura di file di applicazione PHP di default al fine di evitare la maggior parte dei conflitti.
## Componenti
### Linguaggi di Programmazione
- PHP
- MySQLi API
- HTML5
- CSS3
### Ambiente di Sviluppo
- Apache
- Ubuntu
### Risorse Esterne/Plugins
- Bootstrap-4.3.1
## Sicurezza
### SQL Injection Protection
da finire
### Login
da finire
### Automatic Logout on Inactivity
da finire
### Future improvements
- Se abbiamo tempo aggiungiamo la funzionalità aggiuntiva di sicurezza per proteggere dagli attacchi di tipo cross-side (CSRF protection)
