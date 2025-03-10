<!DOCTYPE HTML> 
<html xmlns = "http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset = "utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL); ?>/app/calc_credit.php" method="post">
	<label for="id_x">Kwota kredytu: </label>
	<input id="id_x" type="text" name="x" value="<?php if(isset($x)) print($x); ?>" /> <br />
	<label for="id_y">Długość kredytu w latach: </label>
	<input id="id_y" type="text" name="y" value="<?php if(isset($y)) print($y); ?>" /> <br />
	<label for="id_z">Oprocentowanie: </label>
	<input id="id_z" type="text" name="z" value="<?php if(isset($z)) print($z); ?>" /> <br />
	<input type="submit" value="Oblicz" />
</form>

<?php
if (isset($messages)) {
	echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width: 200px;">';
	foreach ($messages as $msg) {
		echo '<li>'.$msg.'</li>';
	}
	echo '</ol>';
}
?>

<?php if (isset($result)) { ?>
<div style ="margin: 20px; padding: 20px; border-radius: 5px; background-color: #05f; width: 200px;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</body>
</html>