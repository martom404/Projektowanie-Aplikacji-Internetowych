<!DOCTYPE HTML> 
<html xmlns = "http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
    <head>
        <meta charset = "utf-8" />
        <title>Kalkulator kredytowy</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css">
    </head>
    <body>
        <div style ="width: 90%; margin: 2em auto;">
            <a href="<?php print(_APP_ROOT); ?>/app/calc.php" class="pure-button pure-button-active">Kalkulator</a>
            <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
        </div>
        
        <div style="width:90%; margin: 2em auto;">
            
        <form action="<?php print(_APP_URL); ?>/app/calc_credit.php" method="post" class ="pure-form pure-form-stacked">
            <legend>Kalkulator kredytowy</legend>
            <fieldset>
                <label for="id_x">Kwota kredytu: </label>
                <input id="id_x" type="text" name="x" value="<?php out($x); ?>" />
                <label for="id_y">Długość kredytu w latach: </label>
                <input id="id_y" type="text" name="y" value="<?php out($y); ?>" />
                <label for="id_z">Oprocentowanie: </label>
                <input id="id_z" type="text" name="z" value="<?php out($z); ?>" /> 
            </fieldset>
            <input type="submit" value="Oblicz" class = "pure-button pure-button-primary"/>
        </form>

        <?php
        if (isset($messages) && count ($messages) > 0) {
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
        </div>
    </body>
</html>