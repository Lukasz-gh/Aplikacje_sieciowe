<?php
/* Smarty version 4.5.4, created on 2024-11-19 16:47:50
  from 'C:\xampp\htdocs\php_05_kontroler\templates\main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_673cb326735309_23587986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6315c332eca2fbbd16de1195d1d58ca9a1871abb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_05_kontroler\\templates\\main.html',
      1 => 1731435077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673cb326735309_23587986 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? 'Opis domyślny' ?? null : $tmp);?>
">
	<title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/main.css">	

</head>

<body>
	<nav id="nav" >
			<ul class="container">
				<li><a href="#app_header"><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</a></li>
				<li><a href="#app_footer">Stopka</a></li>
			</ul>
	</nav>

	<article id="app_header" class="wrapper style1">
		<div class="container">
			<header>
				<h2><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</h2>
				<p><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_header']->value ?? null)===null||$tmp==='' ? "Witaj użytkowniku, niecz policzę Twoją ratę!" ?? null : $tmp);?>
</p>
				<p><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>
 </p>
			</header>
		</div>
	</article>

	<div class="content">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_591306938673cb3267332a1_67479655', 'content');
?>

	</div>

	<article id="app_footer" class="wrapper style4">
		<div class="footer">
			<p>
				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1155910935673cb326734429_13480313', 'footer');
?>

			</p>

			<ul id="copyright">
				<li>&copy; Untitled</li><li>Widok oparty na stylu z <a href="https://html5up.net/" target="_blank">Html5up</a>.</li>
			</ul>
		</div>

	</article>
</body>
</html><?php }
/* {block 'content'} */
class Block_591306938673cb3267332a1_67479655 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_591306938673cb3267332a1_67479655',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_1155910935673cb326734429_13480313 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1155910935673cb326734429_13480313',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Przykładowa tresć stopki wpisana do szablonu ekranie kalkulatora<?php
}
}
/* {/block 'footer'} */
}
