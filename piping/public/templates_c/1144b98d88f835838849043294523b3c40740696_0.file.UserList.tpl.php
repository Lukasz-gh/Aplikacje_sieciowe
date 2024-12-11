<?php
/* Smarty version 4.3.4, created on 2024-12-08 21:47:33
  from 'C:\xampp\htdocs\piping\app\views\UserList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_675605e5f38853_94359050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1144b98d88f835838849043294523b3c40740696' => 
    array (
      0 => 'C:\\xampp\\htdocs\\piping\\app\\views\\UserList.tpl',
      1 => 1733689436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_675605e5f38853_94359050 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_832359641675605e5f2b9a0_75999824', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block 'content'} */
class Block_832359641675605e5f2b9a0_75999824 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_832359641675605e5f2b9a0_75999824',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="bottom-margin">
    <a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userNew">Nowy użytkownik</a>
    </div>	

    <h3>Lista userów</h3>

    <table id="tab_people" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Login</th>
            <th>Hasło</th>
            <th>Rola</th>
        </tr>
    </thead>


    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
        <tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["login"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["password"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["roles"];?>
</td></tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>




<?php
}
}
/* {/block 'content'} */
}
