<?php
/* Smarty version 4.3.4, created on 2024-12-08 21:20:52
  from 'C:\xampp\htdocs\piping\app\views\Calc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6755ffa4322605_00030235',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '882554dad29c188c98d553a4787d669df140c9eb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\piping\\app\\views\\Calc.tpl',
      1 => 1733689250,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6755ffa4322605_00030235 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20680054536755ffa4313771_24137654', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block 'content'} */
class Block_20680054536755ffa4313771_24137654 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_20680054536755ffa4313771_24137654',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<head>
	<meta charset="utf-8"/>
	<title>Hello World | Amelia framework</title>
</head>



<body>

    My value: <?php echo $_smarty_tpl->tpl_vars['value']->value;?>


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



</body>

<?php
}
}
/* {/block 'content'} */
}