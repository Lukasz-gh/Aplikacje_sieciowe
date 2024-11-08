<?php
/* Smarty version 4.5.4, created on 2024-11-06 18:53:18
  from 'C:\xampp\htdocs\php_03_zadanie\app\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_672bad0e29c586_87078632',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a070da4402e46ecbb7f069b974406bd3d8d6012' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_03_zadanie\\app\\calc.html',
      1 => 1730915489,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672bad0e29c586_87078632 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_927900634672bad0e2873f7_03885999', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_780197031672bad0e287e35_55362062', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'footer'} */
class Block_927900634672bad0e2873f7_03885999 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_927900634672bad0e2873f7_03885999',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_780197031672bad0e287e35_55362062 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_780197031672bad0e287e35_55362062',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



<article id="contact" class="wrapper style4">
	<div class="container medium">
		<header>
			<h3>Jesteś zalogowany jako: <?php echo $_smarty_tpl->tpl_vars['role']->value;?>
</h3>
		</header>
		<div class="row">
			<div class="col-12">
				<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/security/logout.php" method="post">
					<button type="submit" class="pure-button pure-button-primary">Wyloguj</button>
				</form>	
			</div>
		</div>
	</div>	
</article>

<article id="portfolio" class="wrapper style3">
	<div class="container medium">
		<header>
			<h3>Prosty kalkulator kredytowy</h3>
		</header>
		<div class="row">
			<div class="col-12">
				<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
					<legend><h3>Wprowadź dane do obliczeń miesięcznej raty kredytu</h2></legend>
			
					<label for="id_money">Kwota kredytu</label>
					<input id="id_money" type="text" placeholder="PLN" name="money" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['money'];?>
">
			
					<label for="id_years">Okres kredytowania</label>
					<input id="id_years" type="text" placeholder="Liczba lat" name="years" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['years'];?>
">
			
					<label for="id_percent">Roczne oprocentowanie</label>
					<input id="id_percent" type="text" placeholder="Procent" name="percent" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['percent'];?>
">
			
					<button type="submit">Oblicz</button>
				</form>	
			
			</div>
		</div>
	</div>

	<div>

		<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
			<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?> 
				<h4>Wystąpiły błędy: </h4>
				<ol class="err">
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
	
		<?php if ((isset($_smarty_tpl->tpl_vars['infos']->value))) {?>
			<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?> 
				<h4>Informacje: </h4>
				<ol class="err">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'msg');
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
	
		<?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
			<h4>Miesięczna rata: </h4>
			<p class="err";>
				<?php echo $_smarty_tpl->tpl_vars['result']->value;?>
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
