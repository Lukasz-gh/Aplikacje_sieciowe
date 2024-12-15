<?php
/* Smarty version 4.3.4, created on 2024-12-15 21:18:40
  from 'C:\xampp\htdocs\piping\app\views\CalcNew.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_675f39a0dac1d5_96099464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf6a609a029af4453ad5c49ec9e975d38cac5b73' => 
    array (
      0 => 'C:\\xampp\\htdocs\\piping\\app\\views\\CalcNew.tpl',
      1 => 1734293899,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_675f39a0dac1d5_96099464 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1521533643675f39a0d9c3e1_73291692', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block 'content'} */
class Block_1521533643675f39a0d9c3e1_73291692 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1521533643675f39a0d9c3e1_73291692',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <h3>Wprowadź dane do obliczeń</h3>

    <div class="bottom-margin">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcSave" method="post" class="pure-form pure-form-aligned">
        <fieldset>
            <legend>Nowe obliczenia</legend>

            <div class="pure-control-group">
                <label for="cisObliczeniowe">Ciśnienie obliczeniowe</label>
                <input id="cisObliczeniowe" type="text" placeholder="cisObliczeniowe" name="cisObliczeniowe" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->cisObliczeniowe;?>
">
            </div>

            <div class="pure-control-group">
                <label for="tempObliczeniowa">Temperatura obliczeniowa</label>
                <input id="tempObliczeniowa" type="text" placeholder="tempObliczeniowa" name="tempObliczeniowa" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->tempObliczeniowa;?>
">
            </div>

            <div class="pure-control-group">
                <label for="idSteel">Gatunek stali</label>
                <select id="idSteel" type="text" placeholder="idSteel" name="idSteel" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->idSteel;?>
">
                    <option value="200">P195TR1</option>
                    <option value="201">P235TR1</option>
                    <option value="202">P265TR1</option>
                </select> 
            </div>

            <div class="pure-control-group">
                <label for="idDiamater">Średnica</label>
                <select id="idDiamater" type="text" placeholder="idDiamater" name="idDiamater" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->idDiamater;?>
">
                    <option value="300">26,9</option>
                    <option value="301">33,7</option>
                    <option value="302">42,4</option>
                </select> 
            </div>

            <div class="pure-control-group">
                <label for="idWallThickness">Grubość ścianki</label>
                <select id="idWallThickness" type="text" placeholder="idWallThickness" name="idWallThickness" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->idWallThickness;?>
">
                    <option value="400">3,6</option>
                    <option value="401">4</option>
                    <option value="402">4,5</option>
                </select> 
            </div>

            <div class="pure-control-group">
                <label for="korozja">Naddatek na korozje</label>
                <input id="korozja" type="text" placeholder="korozja" name="korozja" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->korozja;?>
">
            </div>

            <div class="pure-control-group">
                <label for="pocienienie">Pocienienie ścianki</label>
                <input id="pocienienie" type="text" placeholder="pocienienie" name="pocienienie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->pocienienie;?>
">
            </div>

            <div class="pure-control-group">
                <label for="wytrzymaloscZlacza">Wytrzymałość złącza</label>
                <input id="wytrzymaloscZlacza" type="text" placeholder="wytrzymaloscZlacza" name="wytrzymaloscZlacza" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->wytrzymaloscZlacza;?>
">
            </div>




            <div class="pure-controls">
                <input type="submit" class="pure-button pure-button-primary" value="Oblicz"/>
                <a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcList">Powrót</a>
            </div>

        </fieldset>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
    </form>	
    </div>





    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
        <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    <?php }?>

<?php
}
}
/* {/block 'content'} */
}
