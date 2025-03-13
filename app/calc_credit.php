<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$x, &$y, &$z){
    $x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
    $y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
    $z = isset($_REQUEST['z']) ? $_REQUEST['z'] : null;
}

function validate(&$x, &$y, &$z, &$messages){
    if (! (isset($x) && isset($y) && isset($z))) {
            return false;
    }

    if ($x == ""){
            $messages [] = 'Brak podanej kwoty kredytu.';
    }
    if ($y == ""){
            $messages [] = 'Brak podanych lat kredytu.';
    }
    if ($z == ""){
            $messages [] = 'Brak podanego oprocentowania kredytu.';
    }
    
    if (count ( $messages ) != 0) return false;

    if ( !is_numeric($x)){
            $messages [] = 'Kwota kredytu nie jest liczbą całkowitą!';
    }
    if ( !is_numeric($y)) {
            $messages [] = 'Błędna wartość dla okresu kredytu liczonego w latach!';
    }
    if ( !is_numeric($z)) {
            $messages [] = 'Błędna wartość dla oprocentowania kredytu!';
    }
    
    if (count ( $messages ) != 0) return false;
    else return true;
}

function process(&$x, &$y, &$z, &$messages, &$result){
    global $role;
    
    $x = intval($x);
    $y = floatval($y);
    $z = floatval($z);
    
    if($z > 1) {
        $z /= 100;
    }
    
    $months = $y * 12;
    $monthly_loan_instalment = $x / $months;
    $result = round($monthly_loan_instalment + ($monthly_loan_instalment * $z), 2);
    
}

$x = null;
$y = null;
$z = null;
$result = null;
$messages = array();

getParams($x, $y, $z);
if ( validate($x, $y, $z, $messages) ) {
    process($x, $y, $z, $messages, $result);
}

include 'calc_credit_view.php';
