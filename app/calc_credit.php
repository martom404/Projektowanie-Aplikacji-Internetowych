<?php
require_once dirname(__FILE__).'/../config.php';

$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];
$z = $_REQUEST ['z'];

if (! (isset($x) && isset($y) && isset($z))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ($x == ''){
        $messages [] = 'Brak podanej wielkości kredytu.';
}
if ($y == ''){
	$messages [] = 'Brak podanych lat kredytu.';
}
if ($z == ''){
	$messages [] = 'Brak podanego oprocentowania kredytu.';
}

if (empty($messages)){
	
   if ( !is_numeric($x)){
		$messages [] = 'Kwota kredytu nie jest liczbą całkowitą!';
   }
   if ( !is_numeric($y)) {
		$messages [] = 'Błędna wartość!';
   }
   if ( !is_numeric($z)) {
		$messages [] = 'Błędna wartość!';
   }
	    
}

if(empty ($messages)) {
	$x = intval($x);
	$y = floatval($y);
	$z = floatval($z);
        
	if($z > 1) {
            $z /= 100;
        }
	$months = $y * 12;
	$monthly_loan_instalment = $x / $months;
	$result = $monthly_loan_instalment + ($monthly_loan_instalment * $z);

} 	

include 'calc_credit_view.php';
?>