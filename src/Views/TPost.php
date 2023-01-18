<?php

require '../../config.php';
require 'ModeloHeader.php';
require '../DAO/PostDAO.php';
require '../DAO/ComentarioDAO.php';

$obj_post = new PostDAO($mysql);
$post = $obj_post->encontrarPorId($_GET['id']);

/*$obj_comentario = new ComentarioDAO($mysql);
$comentarios = $obj_comentario->exibeTodos($_GET['id']);*/
?>

<!DOCTYPE html>
<html lang="pt-br">

     <body>

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