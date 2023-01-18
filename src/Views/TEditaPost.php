<?php
require '../../config.php';
require 'ModeloHeader.php';
require '../DAO/PostDAO.php';
require '../../redireciona.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $PostD = new PostDAO(($mysql));
  //var_dump($_POST['nome'], $_POST['email'], $_POST['senha']);
 $PostD->editar($_POST['id'], $_POST['conteudo'], $_POST['visibilidade'], $_POST['titulo']);//, $_POST['imagem']);
  
  redireciona('/blogfinal/index.php');
}
$PostD = new PostDAO(($mysql));
$post = $PostD->encontrarPorId($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<body>
     <div id="container">
     <div class="row">
                    <div class="col s12 m4 offset-m4">
                        
                        <br>
                        <h5 class="black-text">Edita Publicação</h5>
        <form action="TEditaPost.php" method="post">

        <div class="input-field col s12">
          <input id="titulo" type="text" class="validate" name="titulo" value="<?php echo $post['post_titulo']; ?>">
          <label for="titulo">Titulo</label>
      </div>
      <br>

      <div class="row">
        <div class="input-field col s12">
          <textarea id="conteudo" class="materialize-textarea" name="conteudo"><?php echo $post['post_conteudo']; ?></textarea>
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
        <input class="file-path validate" type="text" placeholder="Clique no botão">
      </div>
    </div>
    <br>

<label for="visibilidade"">Selecione o tipo de visibilidade:</label>
  <select name="visibilidade" id="visibilidade" class="black-text">
  <option value="1" >Público</option>
  <option value="2" >Privado</option>
  <option value="3" >Protegido por senha</option>
    
    </select>

    <p>
                <input type="hidden" name="id" value="<?php echo $post['id']; ?>" />
            </p>
<button class="btn-large waves-effect waves-darken-2" style="width:100%">Editar</button>
    </form>
</div>
</body>
</html>
