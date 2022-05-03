<?php

function fill_NC_table()
{
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
        throw '<span class="text-light"> . $e .</span>';
}

class NC_table
?>