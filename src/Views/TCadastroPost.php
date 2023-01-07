<?php
require '../../config.php';
require '../DAO/PostDAO.php';
require '../../redireciona.php';
require '../../Autentica.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $PostD = new PostDAO($mysql);
   $PostD->inserir($id_usuarioAuten, $_POST['conteudo'], $_POST['visibilidade'], $_POST['titulo']);//, $_POST['imagem']);
  
  redireciona('/blogfinal/index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head><title>Cadastro</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"/>
    <link type="text/css" rel="stylesheet" href="../css/perfumaria.css"/>
    <meta charset="utf-8"/> 
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
</nav>
</body>
</html>
