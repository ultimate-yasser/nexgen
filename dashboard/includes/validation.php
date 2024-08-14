<?php
function checkDuplicate($col,$table,$val){
    global $connect;
    $checkDuplicateResult=$connect->query("SELECT $col FROM $table WHERE $col='$val'");
    return $checkDuplicateResult->rowCount();
}

function checkEditDuplicate($col,$table,$val,$code){
    global $connect;
    $checkDuplicateResult=$connect->query("SELECT $col FROM $table WHERE $col='$val' AND code !=$code");
    return $checkDuplicateResult->rowCount();
}



?>