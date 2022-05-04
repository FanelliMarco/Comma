<?php

    $search_user_employee="select * from impiegato where Username=? AND Password=?";
    $search_user_qc_officer="select * from impiegato where Username=? AND Password=? AND Tipo = 'Addetto al controllo qualita'";

?>