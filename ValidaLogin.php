<?php

require 'config.php';
require 'src/DAO/UsuarioDAO.php';

    $usuarioD = new UsuarioDAO(($mysql));

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    var_dump($email, $senha);
    if (empty($email) || empty($senha)) {
      echo "<script>alert('Os campos devem ser preenchidos para efetuar o login!'); location = 'src/Views/Tlogin.php';</script>";

      }else if ($usuarioD->Login($email, $senha)) {
        $valores = $usuarioD->Login($email, $senha);
       
                session_start();
            $_SESSION['id'] = $valores['id'];// 
         $_SESSION['email'] = $valores['email'];//
          $_SESSION['senha'] = $valores['senha'];//
          $_SESSION['permissao'] = $valores['id_tipo_usuario'];
      header('Location: index.php');
      die();
 
      }else {
      echo "<script>alert('Email ou Senha  incorretos!'); location = 'Tlogin.php';</script>";
      }
   
?>



