<?php
/* Smarty version 4.3.4, created on 2024-12-26 21:17:43
  from 'C:\xampp\htdocs\piping\app\views\userNew.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_676db9e7874cb3_71678539',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbdb41177dac98ed24fde7b8dbe18b32cf7cfc00' => 
    array (
      0 => 'C:\\xampp\\htdocs\\piping\\app\\views\\userNew.tpl',
      1 => 1735244261,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_676db9e7874cb3_71678539 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1616377063676db9e785ef72_92239139', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block 'content'} */
class Block_1616377063676db9e785ef72_92239139 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1616377063676db9e785ef72_92239139',
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
                <label for="role">Rola DB</label>
                <select id="role" type="text" placeholder="rola" name="role" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->role;?>
">
                    <option value=""></option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
$_smarty_tpl->tpl_vars['role']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['role']->value['roles'] != 'guest') {?>
                                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value['idroles'];?>
" ><?php echo $_smarty_tpl->tpl_vars['role']->value['roles'];?>
</option>
                                                    <?php }?>

                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['form']->value->role;
$_prefixVariable1 = ob_get_clean();
if ($_smarty_tpl->tpl_vars['roles']->value['roles'] == $_prefixVariable1) {?>
                            
                            <?php $_smarty_tpl->_assignInScope('selected', 'selected');?>
                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        
                        


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
