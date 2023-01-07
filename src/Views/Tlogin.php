<!DOCTYPE html>
<html>
<head><title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"/>
    <link type="text/css" rel="stylesheet" href="../css/perfumaria.css"/>
    <meta charset="utf-8"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
</head> 
<body>
	  <nav class="barra-inicio">
     <nav class=" teal darken-2">
       <div class="nav-wrapper">
         <a href="#" class="brand-logo">Blog da Mentoria</a>
      </div>
      </nav>
                  <form action="http://localhost/blogfinal/ValidaLogin.php" method="post">
 <div class="container">
  <div class="row">
    <div class="col s12 m4 offset-m4">
        <br/>
        <h5 class="black-text">Login do Usuário</h5>
        <br/>
    <h6 class="black-text">Email:</h6>
    <div class="form-field">  
        <div class="input-field col s12 ">
            <input id="ema" type="email" name="email" class="validate" >
      <label  for="ema">Ex: joao@email.com</label>
  </div>
</div>
  <br/>
  <div class="form-field">
    <h6 class="black-text">Senha:</h6>
    <div class="input-field col s12">
        <input id="password" type="password" class="validate"  name="senha">
    <label for="password">Digite sua senha</label>
    </div>
</div>
    <input class="btn-large waves-effect waves-darken-2" style="width:100%" name="Logar" type="submit" value="Entrar"> 
    <br/>
    <a class="black-text" href="TCadastroUsuarios.php">Ainda não têm cadastro! Cadastre-se aqui</a>
</div>
</div>
</div>
</form>
</nav>
</body>
</html>
