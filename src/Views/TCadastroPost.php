<?php
require '../../config.php';
require 'ModeloHeader.php';
require '../DAO/PostDAO.php';
require '../../redireciona.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $PostD = new PostDAO($mysql);
   $PostD->inserir($id_usuarioAuten, $_POST['conteudo'], $_POST['visibilidade'], $_POST['titulo']);//, $_POST['imagem']);
  
  redireciona('/blogfinal/index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<body>
<div id="container">
     <div class="row">
                    <div class="col s12 m4 offset-m4">
                        
                        <br>
                        <h5 class="black-text">Cadastro de Publicações</h5>
        <form action="TCadastroPost.php" method="post">

        <div class="input-field col s12">
          <input id="titulo" type="text" class="validate" name="titulo">
          <label for="titulo">Titulo</label>
      </div>
      <br>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="conteudo" class="materialize-textarea" name="conteudo"></textarea>
          <label for="conteudo">Conteudo</label>
        </div>
      </div>
      <br>
      <div class="file-field input-field">
      <div class="btn">
        <span>Selecione uma imagem de capa</span>
        <input type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Clique no botão para definir a imagem" >
      </div>
    </div>
    <br>
<label for="visibilidade"">Selecione o tipo de visibilidade:</label>
  <select name="visibilidade" id="visibilidade" class="black-text">
  <option value="1" >Público</option>
    <option value="2" >Privado</option>
    <option value="3" >Protegido por senha</option>
    </select>
<button class="btn-large waves-effect waves-darken-2" style="width:100%">Cadastrar</button>
</form>
</div>
</body>
</html>
