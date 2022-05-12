<?php
    function _cleaninjections($test) {
        $ammessi='abcdefghijklmnopqrstuvwxyz';
        $ammessi.='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $ammessi.="0123456789@._='- ";

        $charOk=true;
        for($pos=0; $pos<strlen($test)&&$charOk; $pos++){
            $char=substr($test, $pos, 1);
            if(strpos($ammessi, $char)===false) $charOk=false;
        }

        $vietate=array("select", "insert", "update", "delete", "drop", "alter", "--", "");

        $wordOk=true;
        for($i=0;$i<count($vietate);$i++){
            if(strpos($vietate[$i], $test)!==false) $wordOk=false;
        }

        return !($charOk && $wordOk);
    }
?>