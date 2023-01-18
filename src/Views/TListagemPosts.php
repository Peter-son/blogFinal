<?php

require '../../config.php';
require 'ModeloHeader.php';
require '../DAO/PostDAO.php';

$obj_post = new PostDAO($mysql);
$posts = $obj_post->exibeTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<body>

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
          </body>
</html>