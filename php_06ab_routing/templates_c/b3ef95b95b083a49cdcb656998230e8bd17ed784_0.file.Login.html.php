<?php
/* Smarty version 4.5.4, created on 2024-11-23 20:28:12
  from 'C:\xampp\htdocs\php_06_ochrona\app\views\Login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_67422cccc58c59_84912543',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3ef95b95b083a49cdcb656998230e8bd17ed784' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_06_ochrona\\app\\views\\Login.html',
      1 => 1732390086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.html' => 1,
  ),
),false)) {
function content_67422cccc58c59_84912543 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_165936252967422cccc4cdf0_89193288', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_164140299567422cccc4db00_90228292', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'footer'} */
class Block_165936252967422cccc4cdf0_89193288 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_165936252967422cccc4cdf0_89193288',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Przykładowa tresć stopki wpisana do szablonu ekranu logowania<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_164140299567422cccc4db00_90228292 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_164140299567422cccc4db00_90228292',
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
