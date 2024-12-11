<?php
/* Smarty version 4.3.4, created on 2024-12-01 19:48:51
  from 'C:\xampp\htdocs\piping\app\views\Login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_674caf93b6dd61_98126519',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd716205f8cf9722aa482f5b1af79e3076734b82' => 
    array (
      0 => 'C:\\xampp\\htdocs\\piping\\app\\views\\Login.tpl',
      1 => 1733078904,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674caf93b6dd61_98126519 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1874151294674caf93b69639_46046158', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block 'content'} */
class Block_1874151294674caf93b69639_46046158 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1874151294674caf93b69639_46046158',
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
						<input id="id_pass" type="password" placeholder="Hasło" name="pass" />

						<button type="submit">Zaloguj</button>
				</form>
			</div>
		</div>
	</div>

</article>

<?php
}
}
/* {/block 'content'} */
}
