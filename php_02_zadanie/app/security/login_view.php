<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	
<head>
	<meta charset="utf-8" />
	<title>Logowanie</title>
</head>

<body>

<form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post">

	<legend>Logowanie</legend>
	<table width="400" cellpadding="5" cellspacing="5">
		<tr>
            <td><label for="id_login">login: </label></td>
            <td><input id="id_login" type="text" name="login" /></td>
        </tr>
		<tr>
            <td><label for="id_pass">pass: </label></td>
            <td><input id="id_pass" type="password" name="pass" /></td>
        </tr>
	</table>
	<input type="submit" value="zaloguj"/>
</form>	

<?php
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

</body>
</html>