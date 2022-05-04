<?php
function fill_NC_table()
{
    //BACKEND controllare connessione database valida (controllare anche sessione credo)
    //far funzionare i require e cancellare il codice sostitutivo

    /*require '../Comma/assets/setup/connessionedb.php';*/

    if (!defined('DB_DATABASE'))                    define('DB_DATABASE', 'pcto');
    if (!defined('DB_HOST'))                        define('DB_HOST', 'localhost');
    if (!defined('DB_USERNAME'))                    define('DB_USERNAME', 'root');
    if (!defined('DB_PASSWORD'))                    define('DB_PASSWORD', '');
    if (!defined('DB_PORT'))                        define('DB_PORT', '');

    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    try {
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
        throw $e;
    }
}
