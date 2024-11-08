<?php
/* Smarty version 4.5.4, created on 2024-11-06 18:55:18
  from 'C:\xampp\htdocs\php_03_zadanie\app\security\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_672bad860452c2_15355864',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5202d962738d45f1347d29332ef262ed5c2c78e5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_03_zadanie\\app\\security\\login.html',
      1 => 1730915679,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672bad860452c2_15355864 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1639576373672bad86032eb2_34731977', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1895989906672bad86033dc7_67990326', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../../templates/main.html");
}
/* {block 'footer'} */
class Block_1639576373672bad86032eb2_34731977 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1639576373672bad86032eb2_34731977',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Przykładowa tresć stopki wpisana do szablonu ekranu logowania<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1895989906672bad86033dc7_67990326 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1895989906672bad86033dc7_67990326',
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
				<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/security/login.php" method="post">
					<legend>Logowanie</legend>
						<label for="id_login">Login</label>
						<input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['login'];?>
" placeholder="Login" />

						<label for="id_pass">Hasło</label>
						<input id="id_pass" type="password" name="pass" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['pass'];?>
" placeholder="Hasło" />

						<button type="submit">Zaloguj</button>
				</form>
			</div>
		</div>
	</div>

	<div>
		<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
			<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?> 
				<h4>Wystąpiły błędy: </h4>
				<ol>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
				<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</ol>
			<?php }?>
		<?php }?>
	</div>

</article>

<?php
}
}
/* {/block 'content'} */
}
