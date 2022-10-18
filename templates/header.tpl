<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./app/views/css/style.css">
    <title>Arctic Monkeys Discography</title>
    
  </head>
  <body>
    <header>
      <img src="images/Arctic-Monkeys-2.jpg">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarColor01">     
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">          
          <li class="nav-item">
            <a class="nav-link" href="showDiscography">Albums</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="showRecords">Discográfica</a>
          </li>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
               <ul class="navbar-nav">
                 <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Categoria
                   </a>
                   <ul class="dropdown-menu dropdown-menu-dark">
                   {foreach from=$records item=$record}
                    <li><a class="dropdown-item" href="filter/{$record->fk_records_id}">{$record->records}</a></li>
                   {/foreach}
                   </ul>
                 </li>
               </ul>
             </div>
           </div>
        </ul>
          {if !isset($smarty.session.USER_ID)}
          <a href="login"><button class="btn btn-outline-light" type="button" style="margin: 0 1rem;">Login</button></a>
          {else} 
            <span><p style="color:#777777" class="user-select-none">User: {$smarty.session.USER_EMAIL}</p></span>
          <a href="logout"><button class="btn btn-outline-light" type="button" style="margin: 0 1rem;">Logout</button></a>
          {/if}  
      </div>
    </div>
  </nav>
    </header>
   
    <main class="container">