<?php
/* Smarty version 4.3.4, created on 2024-12-15 19:50:30
  from 'C:\xampp\htdocs\piping\app\views\UserNew.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_675f24f6b602f8_50919166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ebefe0f938d179ffd8409f6a8d183a5335e7bc8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\piping\\app\\views\\UserNew.tpl',
      1 => 1733691454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_675f24f6b602f8_50919166 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2130584579675f24f6b59ba1_23244274', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block 'content'} */
class Block_2130584579675f24f6b59ba1_23244274 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2130584579675f24f6b59ba1_23244274',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <h3>Nowy użytkownik</h3>

    <div class="bottom-margin">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userSave" method="post" class="pure-form pure-form-aligned">
        <fieldset>
            <legend>Dane nowego użytkownika</legend>

            <div class="pure-control-group">
                <label for="login">Login</label>
                <input id="login" type="text" placeholder="login" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
">
            </div>

            <div class="pure-control-group">
                <label for="password">Hasło</label>
                <input id="password" type="text" placeholder="hasło" name="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->password;?>
">
            </div>

            <div class="pure-control-group">
                <label for="role">Rola</label>
                <select id="role" type="text" placeholder="rola" name="role" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->role;?>
">
                    <option value="2">Administrator</option>
                    <option value="3">Kierownik Projektu</option>
                    <option value="5">Inżynier</option>
                    <option value="4">Ekspert</option>
                </select> 
            </div>

            <div class="pure-controls">
                <input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
                <a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userList">Powrót</a>
            </div>

        </fieldset>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
    </form>	
    </div>



<?php
}
}
/* {/block 'content'} */
}
