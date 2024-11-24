<?php
/* Smarty version 4.5.4, created on 2024-11-20 20:07:17
  from 'C:\xampp\htdocs\php_05ab_kontroler_nowa_struktura_namespaces\app\views\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_673e33659e20e0_09159447',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3507e6d3ae8c3412351e73c8e8527a392005fac5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_05ab_kontroler_nowa_struktura_namespaces\\app\\views\\calc.html',
      1 => 1732032613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673e33659e20e0_09159447 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2010420438673e33659bb5a5_65087086', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1453500872673e33659be5d4_25525234', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'footer'} */
class Block_2010420438673e33659bb5a5_65087086 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_2010420438673e33659bb5a5_65087086',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1453500872673e33659be5d4_25525234 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1453500872673e33659be5d4_25525234',
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
