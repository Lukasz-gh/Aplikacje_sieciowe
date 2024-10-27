<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8" />
	<title>Kalkulator kredytowy</title>
</head>

<body>

	<div style="width:90%; margin: 1em auto;">
		Jesteś zalogowany jako: <?php if (isset($role)) print($role); ?>
	</div>

	<div style="width:90%; margin: 1em auto;">
		<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php">Wyloguj</a>
	</div>

	<form action="<?php print(_APP_URL); ?>/app/calc.php" method="post">
		<legend>Kalkulator kredytowy</legend>
		<table width="400" cellpadding="5" cellspacing="5">
			<tr>
                <td><label for="id_money">Kwota kredytu: </label></td>
                <td><input id="id_money" type="text" name="money" value="<?php if (isset($money)) print($money); ?>" /></td>
                <td>PLN</td>
            </tr>
			<tr>
                <td><label for="id_years">Okres kredytowania: </label></td>
                <td><input id="id_years" type="text" name="years" value="<?php if (isset($years)) print($years); ?>" /></td>
                <td>Lata</td>
            </tr>
			<tr>
                <td><label for="id_percent">Roczne oprocentowanie: </label></td>
                <td><input id="id_percent" type="text" name="percent" value="<?php if (isset($percent)) print($percent); ?>" /></td>
                <td>Procent</td>
            </tr>
		</table>
		<input type="submit" value="Oblicz" />
	</form>	

	<?php
	if (isset($messages)) {
		if (count ( $messages ) > 0) {
			echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
			foreach ( $messages as $key => $msg ) {
				echo '<li>'.$msg.'</li>';
			}
			echo '</ol>';
		}
	}
	?>

	<?php if (isset($result)){ ?>
	<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
	<?php echo 'Miesięczna rata: '.round($result,2). ' PLN'; ?>
	</div>
	<?php } ?>

</body>

</html>