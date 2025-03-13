<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Kalkulator</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/calc_credit.php" class="pure-button">Kalkulator kredytowy</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
	<legend>Kalkulator</legend>
	<fieldset>
		<label for="id_x">Liczba 1: </label>
		<input id="id_x" type="text" name="x" value="<?php out($x) ?>" />
		<label for="id_op">Operacja: </label>
		<select name="op">	
			<option value="plus" <?php if($operation == 'plus') print('selected');?>>+</option>
			<option value="minus" <?php if($operation == 'minus') print('selected');?>>-</option>
			<option value="times"<?php if($operation == 'times') print('selected');?>>*</option>
			<option value="div"<?php if($operation== 'div') print('selected');?>>/</option>
		</select>
		<label for="id_y">Liczba 2: </label>
		<input id="id_y" type="text" name="y" value="<?php out($y) ?>" />
	</fieldset>	
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</div>

</body>
</html>