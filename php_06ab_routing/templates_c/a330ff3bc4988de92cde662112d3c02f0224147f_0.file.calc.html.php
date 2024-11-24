<?php
/* Smarty version 4.5.4, created on 2024-11-24 17:38:22
  from 'C:\xampp\htdocs\php_06ab_routing\app\views\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_6743567ecf6289_82627714',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a330ff3bc4988de92cde662112d3c02f0224147f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_06ab_routing\\app\\views\\calc.html',
      1 => 1732466297,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.html' => 1,
  ),
),false)) {
function content_6743567ecf6289_82627714 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7085959386743567ecdd266_22141322', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19812619506743567ecde646_47107755', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'footer'} */
class Block_7085959386743567ecdd266_22141322 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_7085959386743567ecdd266_22141322',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_19812619506743567ecde646_47107755 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19812619506743567ecde646_47107755',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<nav id="nav" >
	<ul class="container">
		<li><h3>Witaj <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</h3></li>
		<li><a href="#app_header"><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</a></li>
		<li><a href="#app_footer">Stopka</a></li>
		<li>
			<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" method="post">
				<button type="submit" class="pure-button pure-button-primary">Wyloguj</button>
			</form>	
		</li>
	</ul>
</nav>

<article id="portfolio" class="wrapper style3">
	<div class="container medium">
		<header>
			<h3>Prosty kalkulator kredytowy</h3>
		</header>
		<div class="row">
			<div class="col-12">
				<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute" method="post">
					<legend><h3>Wprowadź dane do obliczeń miesięcznej raty kredytu</h2></legend>
			
					<label for="id_money">Kwota kredytu</label>
					<input id="id_money" type="text" placeholder="PLN" name="money" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->money;?>
">
			
					<label for="id_years">Okres kredytowania</label>
					<input id="id_years" type="text" placeholder="Liczba lat" name="years" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->years;?>
">
			
					<label for="id_percent">Roczne oprocentowanie</label>
					<input id="id_percent" type="text" placeholder="Procent" name="percent" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->percent;?>
">
			
					<button type="submit">Oblicz</button>
				</form>	
			
			</div>
		</div>
	</div>

	<?php $_smarty_tpl->_subTemplateRender('file:messages.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div>
		<?php if ((isset($_smarty_tpl->tpl_vars['result']->value->result))) {?>
			<h4>Miesięczna rata: </h4>
			<p>
				<?php echo $_smarty_tpl->tpl_vars['result']->value->result;?>
 PLN
			</p>
		<?php }?>
	</div>


</article>

<?php
}
}
/* {/block 'content'} */
}
