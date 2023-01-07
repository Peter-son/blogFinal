<?php
require '../../config.php';
require '../DAO/UsuarioDAO.php';
require '../../redireciona.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $usuarioD = new UsuarioDAO(($mysql));
  var_dump($_POST['nome'], $_POST['email'], $_POST['senha']);
 $usuarioD->inserir($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['tipoUsuario']);
  
  redireciona('/blogfinal/index.php');
}
?>

<!DOCTYPE html>
<html>
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
           </div>
     </nav>
             <div class="container">
                <div class="row">
                    <div class="col s12 m4 offset-m4">
                        <br>
                        <h5 class="black-text">Cadastro de Usuário</h5>
        <form action="TCadastroUsuarios.php" method="post">
                <h6 class="black-text">Digite o seu nome:</h6>
    <div class="form-field">  
        <div class="input-field col s12 ">
      <input id="nom" type="text" name="nome">
      <label  for="nom">Ex: Joao</label>
  </div>
</div>
  <br>
  <h6 class="black-text">Digite o seu email:</h6>
    <div class="form-field">  
        <div class="input-field col s12 ">
      <input id="ema" type="text" name="email" class="validate">
      <label  for="ema">Ex: Joao@email.com</label>
  </div>
</div>
  <div class="form-field">
    <h6 class="black-text">Digite sua senha:</h6>
    <div class="input-field col s12">
    <input id="password" type="password" name="senha" class="validate"/>
    <label for="password">Senha</label>
    </div>
</div>

<label for="tipoUsuario"">Selecione o tipo de usuário:</label>
  <select name="tipoUsuario" id="tipoUsuario" class="black-text">
  <option value="1" >Adminstrador</option>
    <option value="2" >Autor</option>
    <option value="3" >Editor</option>
    <option value="4" >Assinante</option>
  </select>
<button class="btn-large waves-effect waves-darken-2" style="width:100%">Cadastrar</button>
   <a href="Tlogin.php" class="black-text">Já têm cadastro! Entrar</a> 
   </form>
</div>
</div>
</div>
</nav>
</body>
</html>
