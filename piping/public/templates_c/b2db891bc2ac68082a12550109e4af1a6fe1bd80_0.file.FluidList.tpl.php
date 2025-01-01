<?php
/* Smarty version 4.3.4, created on 2025-01-01 17:13:52
  from 'C:\xampp\htdocs\piping\app\views\FluidList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_677569c0074b85_42518772',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2db891bc2ac68082a12550109e4af1a6fe1bd80' => 
    array (
      0 => 'C:\\xampp\\htdocs\\piping\\app\\views\\FluidList.tpl',
      1 => 1735748030,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_677569c0074b85_42518772 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1002122618677569c005cc21_31032383', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block 'content'} */
class Block_1002122618677569c005cc21_31032383 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1002122618677569c005cc21_31032383',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="bottom-margin">
        <?php if (\core\RoleUtils::inRole("projectManager")) {?>
        <?php } else { ?>
        <a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
fluidNew">Nowy płyn</a>
        <?php }?>
    </div>	

    <h3>Lista płynów w projekcie</h3>

    <table id="tab_fluids" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Płyn</th>
            <th>Temperatura operacyjna</th>
            <th>Ciśnienie operacyjne</th>
            <th>Temperatura obliczeniowa</th>
            <th>Ciśnienie obliczeniowe</th>
            <th>Opcje</th>
        </tr>
    </thead>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fluids']->value, 'f');
$_smarty_tpl->tpl_vars['f']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->do_else = false;
?>
        <tr><td><?php echo $_smarty_tpl->tpl_vars['f']->value["fluid"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['f']->value["tempOperacyjna"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['f']->value["cisOperacyjne"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['f']->value["tempObliczeniowa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['f']->value["cisObliczeniowe"];?>
</td><td><?php if (\core\RoleUtils::inRole("projectManager")) {?>Brak opcji<?php } else { ?><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
fluidEdit/<?php echo $_smarty_tpl->tpl_vars['f']->value['idfluids'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
fluidDelete/<?php echo $_smarty_tpl->tpl_vars['f']->value['idfluids'];?>
">Usuń</a><?php }?></td></tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php
}
}
/* {/block 'content'} */
}
