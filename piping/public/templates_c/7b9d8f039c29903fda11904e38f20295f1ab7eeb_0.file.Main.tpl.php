<?php
/* Smarty version 4.3.4, created on 2024-12-08 21:40:11
  from 'C:\xampp\htdocs\piping\app\views\templates\Main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6756042b5a2025_31809424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b9d8f039c29903fda11904e38f20295f1ab7eeb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\piping\\app\\views\\templates\\Main.tpl',
      1 => 1733690286,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6756042b5a2025_31809424 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Aplikacja bazodanowa</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
		integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">
</head>



<body style="margin: 20px;">


<body>
	<nav id="nav" >
			<ul class="container">
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userList">Użytkownicy</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calc">Obliczenia</a></li>
				<li><a href="">Wyniki</a></li>
				<li><?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj</a>
				<?php } else { ?>	
					<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow">Zaloguj</a>
				<?php }?></li>
			</ul>
	</nav>

	<div class="content">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11474854096756042b595c71_97638734', 'content');
?>

	</div>

	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12851476576756042b596569_05496799', 'messages');
?>



</body>
</html><?php }
/* {block 'content'} */
class Block_11474854096756042b595c71_97638734 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11474854096756042b595c71_97638734',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'messages'} */
class Block_12851476576756042b596569_05496799 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'messages' => 
  array (
    0 => 'Block_12851476576756042b596569_05496799',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
	<div>
		<ul>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
	</div>
	<?php }?>
	
	<?php
}
}
/* {/block 'messages'} */
}
