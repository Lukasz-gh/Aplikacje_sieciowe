<?php
/* Smarty version 4.3.4, created on 2025-01-02 21:50:39
  from 'C:\xampp\htdocs\piping\app\views\UserList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6776fc1faddca7_15274306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1144b98d88f835838849043294523b3c40740696' => 
    array (
      0 => 'C:\\xampp\\htdocs\\piping\\app\\views\\UserList.tpl',
      1 => 1735850694,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6776fc1faddca7_15274306 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17698416086776fc1facb254_67795899', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block 'content'} */
class Block_17698416086776fc1facb254_67795899 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17698416086776fc1facb254_67795899',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="bottom-margin">
    <a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userNew">Nowy użytkownik</a>
    </div>	


    <div class="bottom-margin">
    <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userList">
        <legend>Wyszukiwanie użytkownika</legend>
        <fieldset>
            <input type="text" placeholder="wpisz login" name="loginSearch" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->loginSearch;?>
" /><br />
            <button type="submit" class="pure-button pure-button-primary">Szukaj</button>
        </fieldset>
    </form>
    </div>	

    <h3>Lista użytkowników systemu</h3>

    <table id="tab_people" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Login</th>
            <th>Hasło</th>
            <th>Rola</th>
            <th>Aktywny</th>
            <th>Opcje</th>
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
</td><td><?php if ($_smarty_tpl->tpl_vars['p']->value["active"] == 2) {?> Tak <?php } else { ?> Nie <?php }?></td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idusers'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['idusers'];?>
">Usuń</a></td></tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php
}
}
/* {/block 'content'} */
}
