<?php
/* Smarty version 4.3.4, created on 2024-12-23 12:24:28
  from 'C:\xampp\htdocs\piping\app\views\CalcList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6769486ccac5b4_01490573',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e62b396188b28f751b950ce5296fbdbf2f616cb9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\piping\\app\\views\\CalcList.tpl',
      1 => 1734953020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6769486ccac5b4_01490573 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1762254676769486cc98979_58183878', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block 'content'} */
class Block_1762254676769486cc98979_58183878 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1762254676769486cc98979_58183878',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
    <a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcNew">Nowe obliczenia</a>
</div>	


<h4>Witaj <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</h4>
<h4>Twoja rola w systemie to <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</h4>

<h3>Lista wyników obliczeń</h3>

<table id="calc" class="pure-table pure-table-bordered">
<thead>
    <tr>
        <th>Autor</th>
        <th>Ciśnienie obliczeniowe</th>
        <th>Temperatura obliczeniowa</th>
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
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["cisnienieObliczeniowe"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["tempObliczeniowa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["gatunek"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["real"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["wallThickness"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["wytrzymaloscZlacza"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["korozja"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["pocienienie"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["tolerancjaScianki"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["naprezeniaProjektowe"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["najmniejszaGrubosc"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcEdit/<?php echo $_smarty_tpl->tpl_vars['c']->value['idcalulations'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcDelete/<?php echo $_smarty_tpl->tpl_vars['c']->value['idcalulations'];?>
">Usuń</a></td></tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php
}
}
/* {/block 'content'} */
}
