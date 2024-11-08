<?php
/* Smarty version 4.5.4, created on 2024-11-02 18:12:15
  from 'C:\xampp\htdocs\php_03_zadanie\app\calc_view.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_67265d6f33ee03_46130764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8736b80854707ac75e5576038060baf998018e10' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_03_zadanie\\app\\calc_view.html',
      1 => 1730567528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67265d6f33ee03_46130764 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_78101311467265d6f33d6a5_27881147', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_211291819367265d6f33e3f9_97446842', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'footer'} */
class Block_78101311467265d6f33d6a5_27881147 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_78101311467265d6f33d6a5_27881147',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_211291819367265d6f33e3f9_97446842 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_211291819367265d6f33e3f9_97446842',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Prosty kalkulator kredytowy</h2>

	<!-- <div style="width:90%; margin: 1em auto;">
		Jesteś zalogowany jako: <?php echo '<?php'; ?>
 if (isset($role)) print($role); <?php echo '?>'; ?>

	</div>

	<div style="width:90%; margin: 1em auto;">
		<a href="<?php echo '<?php'; ?>
 print(_APP_ROOT); <?php echo '?>'; ?>
/app/security/logout.php">Wyloguj</a>
	</div> -->

	<form class="pure-form pure-form-stacked" action="<?php echo '<?php'; ?>
 print(_APP_URL); <?php echo '?>'; ?>
/app/calc.php" method="post">
		<legend>Kalkulator kredytowy</legend>
		<table width="400" cellpadding="5" cellspacing="5">
			<tr>
                <td><label for="id_money">Kwota kredytu: </label></td>
                <td><input id="id_money" type="text" name="money" value="<?php echo '<?php'; ?>
 if (isset($form['money'])) print($form['money']); <?php echo '?>'; ?>
" /></td>
                <td>PLN</td>
            </tr>
			<tr>
                <td><label for="id_years">Okres kredytowania: </label></td>
                <td><input id="id_years" type="text" name="years" value="<?php echo '<?php'; ?>
 if (isset($form['years'])) print($form['years']); <?php echo '?>'; ?>
" /></td>
                <td>Lata</td>
            </tr>
			<tr>
                <td><label for="id_percent">Roczne oprocentowanie: </label></td>
                <td><input id="id_percent" type="text" name="percent" value="<?php echo '<?php'; ?>
 if (isset($form['percent'])) print($form['percent']); <?php echo '?>'; ?>
" /></td>
                <td>Procent</td>
            </tr>
		</table>
		<input type="submit" value="Oblicz" />
	</form>	

	<?php echo '<?php'; ?>

	if (isset($messages)) {
		if (count ( $messages ) > 0) {
			echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
			foreach ( $messages as $key => $msg ) {
				echo '<li>'.$msg.'</li>';
			}
			echo '</ol>';
		}
	}
	<?php echo '?>'; ?>


	<?php echo '<?php'; ?>
 if (isset($result)){ <?php echo '?>'; ?>

	<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
	<?php echo '<?php'; ?>
 echo 'Miesięczna rata: '.round($result,2). ' PLN'; <?php echo '?>'; ?>

	</div>
	<?php echo '<?php'; ?>
 } <?php echo '?>'; ?>


<?php
}
}
/* {/block 'content'} */
}
