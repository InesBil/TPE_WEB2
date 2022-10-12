<?php
/* Smarty version 4.2.1, created on 2022-10-13 00:59:34
  from 'C:\xampp\htdocs\WEB2\TPE\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634746d61a3ad8_16268317',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bfc0c123a9cec2f41557084bd691d0a21d9a7f86' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB2\\TPE\\templates\\header.tpl',
      1 => 1665614614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_634746d61a3ad8_16268317 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
  <head>
    <base href="<?php echo BASE_URL;?>
">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Arctic Monkeys Discography</title>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" Style="margin-bottom: 2rem;">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarColor01">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="showDiscography">Albums</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="showStudio">Discografía</a>
          </li>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
               <ul class="navbar-nav">
                 <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Categoria
                   </a>
                   <ul class="dropdown-menu dropdown-menu-dark">
                   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['studios']->value, 'studio');
$_smarty_tpl->tpl_vars['studio']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['studio']->value) {
$_smarty_tpl->tpl_vars['studio']->do_else = false;
?>
                    <li><a class="dropdown-item" href="filter/<?php echo $_smarty_tpl->tpl_vars['studio']->value->fk_records_id;?>
"><?php echo $_smarty_tpl->tpl_vars['studio']->value->records;?>
</a></li>
                   <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                   </ul>
                 </li>
               </ul>
             </div>
           </div>
        </ul>
          <?php if (!(isset($_SESSION['USER_ID']))) {?>
          <a href="login"><button class="btn btn-outline-light" type="button" style="margin: 0 1rem;">Login</button></a>
          <?php } else { ?> 
          <a href="logout"><button class="btn btn-outline-light" type="button" style="margin: 0 1rem;">Logout</button></a>
          <span><p style="color:#777777" class="user-select-none">User: <?php echo $_SESSION['USER_EMAIL'];?>
</p></span>
         <?php }?>  
      </div>
    </div>
  </nav>
    </header>
    <!-- inicio main container -->
    <main class="container"><?php }
}
