<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$x,&$y,&$operation){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$operation = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;	
}

function validate(&$x,&$y,&$operation,&$messages){
	
	if ( ! (isset($x) && isset($y) && isset($operation))) {
		return false;
	}

	if ( $x == "") {
		$messages [] = 'Nie podano liczby 1';
	}
	if ( $y == "") {
		$messages [] = 'Nie podano liczby 2';
	}

	if (count ( $messages ) != 0) return false;
	
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$x,&$y,&$operation,&$messages,&$result){
	global $role;
	
	$x = intval($x);
	$y = intval($y);
	
	switch ($operation) {
		case 'minus' :
			if ($role == 'admin'){
				$result = $x - $y;
			} else {
				$messages [] = 'Tylko administrator może odejmować !';
			}
			break;
		case 'times' :
			$result = $x * $y;
			break;
		case 'div' :
			if ($role == 'admin'){
				$result = $x / $y;
			} else {
				$messages [] = 'Tylko administrator może dzielić !';
			}
			break;
		default :
			$result = $x + $y;
			break;
	}
}

$x = null;
$y = null;
$operation = null;
$result = null;
$messages = array();

getParams($x,$y,$operation);
if ( validate($x,$y,$operation,$messages) ) { 
	process($x,$y,$operation,$messages,$result);
}

include 'calc_view.php';