<?php

require '../../config.php';
require '../DAO/PostDAO.php';
require '../../Autentica.php';

$obj_post = new PostDAO($mysql);
$posts = $obj_post->exibeTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Blog da Mentoria</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"/>
    <link type="text/css" rel="stylesheet" href="../css/perfumaria.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script type="text/javascript" src="../js/web.js"></script>
</head>

<body>
<nav class="barra-inicio">
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

    <div id="container">
    <center> <button class="btn-large waves-effect waves-darken-2" style="width:50%" name="Cadastrar publicação" onclick="window.location.href='TCadastroPost.php';">Cadastrar nova publicação</button></center>
    <table class="striped" >
        <thead>
          <tr >
              <th>Titulo</th>
              <th>Conteudo</th>
              <th>Imagem</th>
              <th>URL</th>
          </tr>
        </thead>
        <br>
        <center> <a class="botao botao-block" href="../../index.php">Voltar</a> </center>
    <?php foreach($posts as $post) : ?>
           <?php 
                 echo "<tr>";
                // echo "<td>" .$post['id']. "</td>";
                 echo "<td>" . $post['post_titulo']. "</td>";
                 echo "<td>" . $post['post_conteudo'] . "</td>";
                 echo "<td>" . $post['imagem'] . "</td>";
                 echo "<td>" . $post['url_post'] . "</td>";
                 echo "<td>" . "<a class='botao' href=TEditaPost.php?id=".  $post['id'] . ">Alterar</a>" . "</td>";
                 echo "<td>" .  "<a class='botao' href=TExcluirPost.php?id=" . $post['id']  . ">Excluir</a>" . "</td>";
                 echo "</tr>";
           ?>
              <?php endforeach; ?>

           </div>
           </nav>
</body>
</html>