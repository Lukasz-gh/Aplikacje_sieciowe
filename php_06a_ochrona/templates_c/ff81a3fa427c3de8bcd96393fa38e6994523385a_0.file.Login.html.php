<?php
/* Smarty version 4.5.4, created on 2024-11-24 17:06:27
  from 'C:\xampp\htdocs\php_06a_ochrona\app\views\Login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_67434f0368d0b3_12366105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff81a3fa427c3de8bcd96393fa38e6994523385a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_06a_ochrona\\app\\views\\Login.html',
      1 => 1732390086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.html' => 1,
  ),
),false)) {
function content_67434f0368d0b3_12366105 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_152155481267434f036854e5_22367952', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_119027422167434f03686056_46100987', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'footer'} */
class Block_152155481267434f036854e5_22367952 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_152155481267434f036854e5_22367952',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Przykładowa tresć stopki wpisana do szablonu ekranu logowania<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_119027422167434f03686056_46100987 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_119027422167434f03686056_46100987',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<article id="contact" class="wrapper style3">
	<div class="container medium">
		<header>
			<h2>Wprowadź swoje dane</h2>
		</header>
		<div class="row">
			<div class="col-12">
				<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post">
					<legend>Logowanie</legend>
						<label for="id_login">Login</label>
						<input id="id_login" type="text" placeholder="Login" name="login" />

						<label for="id_pass">Hasło</label>
						<input id="id_pass" type="password" placeholder="Hasło" name="password" />

						<button type="submit">Zaloguj</button>
				</form>
			</div>
		</div>
	</div>
 
    <?php $_smarty_tpl->_subTemplateRender('file:messages.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</article>

<?php
}
}
/* {/block 'content'} */
}
