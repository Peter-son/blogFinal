<?php

if (!isset($_SESSION))session_start();
if (!isset( $_SESSION["email"]) || !isset( $_SESSION["senha"])) {

}else{
   $id_usuarioAuten = $_SESSION['id'];
   $emailAuten = $_SESSION['email'];
   $permissaoAuten = $_SESSION['permissao'];
   //var_dump($id_usuarioAuten, $emailAuten, $permissaoAuten);
}


?>