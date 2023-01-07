<?php

//require '../Model/Usuario.php';

class UsuarioDAO{

    private $mysql;

    public function __construct(mysqli $mysql){
        $this->mysql = $mysql;
    }

    public function inserir(String $nome, String $email, $senha, $tipo_usuario): void {
        $insereUsuario = $this->mysql->prepare('INSERT INTO usuarios (nome, email, senha, id_tipo_usuario) VALUES (?, ?, ?, ?)');
       $insereUsuario->bind_param('ssss', $nome, $email, $senha, $tipo_usuario);
       $insereUsuario->execute();
    }

    public function Login(String $email, String $senha){
        $usuario = $this->mysql->query("SELECT * from usuarioS WHERE email = '$email' and senha = '$senha'");
        
         $result= mysqli_num_rows($usuario);   
         // Caso o usuário tenha digitado um login válido o número de linhas será 1..
        if($result){
            // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
            $dados = mysqli_fetch_array($usuario);
            return $dados;
        }
}

public function remover(String $id): void{
    $removerUsuario = $this->mysql->prepare('DELETE FROM usuarios WHERE id = ?');
    $removerUsuario->bind_param('s', $id);
    $removerUsuario->execute();
}
}
?>