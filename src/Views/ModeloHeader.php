<?php 

require '../../Autentica.php';

?>

<head>
    <title>Publicações</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"/>
    <link type="text/css" rel="stylesheet" href="../css/perfumaria.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script type="text/javascript" src="../js/web.js"></script>
</head>

<header>
  <nav class=" teal darken-2">
       <div class="nav-wrapper">
         <a href="index.php" class="brand-logo">Blog da Mentoria</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php if(!isset($id_usuarioAuten) && !isset($emailAuten)){ ?>
                     <li><a href="src/Views/Tlogin.php">Entrar</a></li>
                     
                     <?php }else{ ?>
                     <li>
                     <a  href="#!" data-activates="dropdown-Log" id="btn-dropdown-Log">
                      <span><?php echo $emailAuten ?></span>
                     <i class="material-icons right">arrow_drop_down</i>
                     </a>
                     <ul id='dropdown-Log' class='dropdown-content'>
                     <?php if($_SESSION["permissao"] == "1"){ ?>
                     <li><a href="#!">Gerenciar Usuários</a></li>
                     <?php }else{ ?>
                       <li><a href="TListagemPosts.php">Gerenciar Publicações</a></li>
                       <?php } ?>
                     <li><a href="SaindoLogin.php">Sair</a></li>
                     </ul>
                     </li>
                     <?php  } ?>
                    </ul>        
       </div>
     </nav>
</header>
