<?php

require '../../config.php';
require '../DAO/PostDAO.php';
require '../DAO/ComentarioDAO.php';
require '../../Autentica.php';

$obj_post = new PostDAO($mysql);
$post = $obj_post->encontrarPorId($_GET['id']);

/*$obj_comentario = new ComentarioDAO($mysql);
$comentarios = $obj_comentario->exibeTodos($_GET['id']);*/
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Blog da Mentoria</title>
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

<body>

<nav class=" teal darken-2">
       <div class="nav-wrapper">
         <a href="index.php" class="brand-logo">Blog da Mentoria</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php if(!isset($id_usuarioAuten) && !isset($emailAuten)){ ?>
                     <li><a href="Tlogin.php">Entrar</a></li>
                     
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
                     <li><a href="src/Views/SaindoLogin.php">Sair</a></li>
                     </ul>
                     </li>
                     <?php  } ?>
                    </ul>        
       </div>
     </nav>

    <div id="container">
        <h1>
        <center><?php echo $post['post_titulo']; ?></center>
        </h1>
        <p>
        <?php echo nl2br($post['post_conteudo']); ?>
        </p>
        <div>
           <center> <a class="botao botao-block" href="../../index.php">Voltar</a></center>
        </div>
        <br>
        <form action="" method="post">
        <center><button class="btn-large waves-effect waves-darken-2" style="width:50%" name="botao">Comentar publicação</button></center>
        <?php
        if(isset($_POST["botao"])){

        if(!isset($id_usuarioAuten) && !isset($emailAuten) ){
            echo "<script>alert('Você deve entrar com uma conta primeiro!'); location = 'Tlogin.php';</script>";
    }else{ ?>
   <div class="row">
        <div class="input-field col s12">
          <textarea id="comentario" class="materialize-textarea" name="comentario"></textarea>
          <label for="comentario">Comente aqui</label>
        </div>
      </div>   

       <h4> <?php //echo $comentarios['id_usuario'];?> </h4>
        <p>
            <?php //echo nl2br($comentarios['comentario']); ?>
        </p>
        
     <?php   }  }  ?>
             </form>
            </div>

</body>

</html>