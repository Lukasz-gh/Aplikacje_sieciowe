<?php
/* Smarty version 4.3.4, created on 2024-12-22 20:36:53
  from 'C:\xampp\htdocs\piping\app\views\CatalogueList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67686a55923456_02474482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13e9c016aaff60abd65b1fc22639d1b8d38095e2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\piping\\app\\views\\CatalogueList.tpl',
      1 => 1734896049,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67686a55923456_02474482 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_56812160967686a55916433_97154087', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block 'content'} */
class Block_56812160967686a55916433_97154087 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_56812160967686a55916433_97154087',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <h3>Gatunki stali</h3>

    <table id="tab_steel" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Gatunek</th>
            <th>Granica Plastyczności</th>
            <th>Granica Wytrzymałości</th>
        </tr>
    </thead>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['steel']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
        <tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["gatunek"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["granicaPlastycznosci"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["granicaWytrzymalosci"];?>
</td></tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php
}
}
/* {/block 'content'} */
}
