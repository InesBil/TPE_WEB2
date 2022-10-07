<?php
/* Smarty version 4.2.1, created on 2022-10-06 16:17:30
  from 'C:\xampp\htdocs\WEB2\TPE\templates\discographyView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633ee37ab4c907_14235485',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6788054ce26a1827f2721421408889828ae14d8b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB2\\TPE\\templates\\discographyView.tpl',
      1 => 1665065787,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_633ee37ab4c907_14235485 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<ul class="list-group">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['albums']->value, 'album');
$_smarty_tpl->tpl_vars['album']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['album']->value) {
$_smarty_tpl->tpl_vars['album']->do_else = false;
?>
  <li class='list-group-item d-flex justify-content-between align-items-center'>
  <span>   <?php echo $_smarty_tpl->tpl_vars['album']->value->id;?>
 - <img src="../images/<?php echo $_smarty_tpl->tpl_vars['album']->value->img;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['album']->value->album;?>
"> - <?php echo $_smarty_tpl->tpl_vars['album']->value->album;?>
 - <?php echo $_smarty_tpl->tpl_vars['album']->value->year;?>
 - <?php echo $_smarty_tpl->tpl_vars['album']->value->genre;?>
 - <?php echo $_smarty_tpl->tpl_vars['album']->value->length;?>
 </span>
  <a href='delete/<?php echo $_smarty_tpl->tpl_vars['album']->value->id;?>
' type='button' class='btn btn-danger ml-auto'>Borrar</a></li>
   <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
