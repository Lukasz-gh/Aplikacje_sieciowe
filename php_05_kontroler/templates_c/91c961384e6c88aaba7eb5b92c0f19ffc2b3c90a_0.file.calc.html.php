<?php
/* Smarty version 4.5.4, created on 2024-11-18 21:15:36
  from 'C:\xampp\htdocs\php_05ab_kontroler\app\calc\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_673ba068c6eba5_77107712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91c961384e6c88aaba7eb5b92c0f19ffc2b3c90a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_05ab_kontroler\\app\\calc\\calc.html',
      1 => 1731960934,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673ba068c6eba5_77107712 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_761270481673ba068c4cc12_55784725', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1154627191673ba068c4e342_87235831', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'footer'} */
class Block_761270481673ba068c4cc12_55784725 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_761270481673ba068c4cc12_55784725',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1154627191673ba068c4e342_87235831 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1154627191673ba068c4e342_87235831',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<article id="contact" class="wrapper style4">
	<div class="container medium">
		<header>
			<h3>Witaj użytkowniku</h3>
		</header>
	</div>	
</article>

<article id="portfolio" class="wrapper style3">
	<div class="container medium">
		<header>
			<h3>Prosty kalkulator kredytowy</h3>
		</header>
		<div class="row">
			<div class="col-12">
				<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
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

	<div>
		<?php if ($_smarty_tpl->tpl_vars['messages']->value->isError()) {?>
				<h4>Wystąpiły błędy: </h4>
				<ol>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value->getErrors(), 'msg');
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
	
		<?php if ($_smarty_tpl->tpl_vars['messages']->value->isInfo()) {?>
				<h4>Informacje: </h4>
				<ol>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
				<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</ol>
		<?php }?>
	
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