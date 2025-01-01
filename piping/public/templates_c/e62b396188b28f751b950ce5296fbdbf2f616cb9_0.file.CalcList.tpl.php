<?php
/* Smarty version 4.3.4, created on 2025-01-01 18:11:41
  from 'C:\xampp\htdocs\piping\app\views\CalcList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6775774dc25d21_20339257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e62b396188b28f751b950ce5296fbdbf2f616cb9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\piping\\app\\views\\CalcList.tpl',
      1 => 1735751493,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6775774dc25d21_20339257 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17619023186775774dc10522_88994965', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block 'content'} */
class Block_17619023186775774dc10522_88994965 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17619023186775774dc10522_88994965',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
    <?php if (\core\RoleUtils::inRole("projectManager")) {?>
    <?php } else { ?>
        <a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcNew">Nowe obliczenia</a>
    <?php }?>
</div>


<h4>Witaj <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</h4>
<h4>Twoje uprawnienia w systemie to <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</h4>

<h3>Lista wyników obliczeń</h3>

<table id="calc" class="pure-table pure-table-bordered">
<thead>
    <tr>
        <th>Autor</th>
        <th>Płyn</th>
                <th>Gatunek stali</th>
        <th>Średnica</th>
        <th>Grubość ścianki</th>
        <th>Wytrzymałość złącza</th>
        <th>Naddatek na korozje</th>
        <th>Pocienienie ścianki</th>
        <th>Tolerancja ścianki</th>
        <th>Naprężęnia projektowe</th>
        <th>Najmniejsza grubość</th>
        <th>Opcje</th>
    </tr>
</thead>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['calculation']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['c']->value["login"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["fluid"];?>
 (<?php echo $_smarty_tpl->tpl_vars['c']->value["cisObliczeniowe"];?>
 bar, <?php echo $_smarty_tpl->tpl_vars['c']->value["tempObliczeniowa"];?>
 °C)</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["gatunek"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["real"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["wallThickness"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["wytrzymaloscZlacza"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["korozja"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["pocienienie"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["tolerancjaScianki"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["naprezeniaProjektowe"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["najmniejszaGrubosc"];?>
</td><td><?php if (\core\RoleUtils::inRole("projectManager")) {?>Brak opcji<?php } else { ?><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcEdit/<?php echo $_smarty_tpl->tpl_vars['c']->value['idcalulations'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcDelete/<?php echo $_smarty_tpl->tpl_vars['c']->value['idcalulations'];?>
">Usuń</a><?php }?></td></tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php
}
}
/* {/block 'content'} */
}
