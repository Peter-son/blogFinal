<?php

class ComentarioDAO{
    private $mysql;

    public function __construct(mysqli $mysql){
        $this->mysql = $mysql;
    }

    public function inserir(String $usuario, String $post, String $comentario): void {
        $insereUsuario = $this->mysql->prepare('INSERT INTO comentarios (id_usuario, id_post, comentario) VALUES (?, ?, ?)');
       $insereUsuario->bind_param('sss', $usuario, $post, $comentario);
       $insereUsuario->execute();
    }

    public function exibeTodos(String $id): array{
        $selecionaComentario = $this->mysql->prepare('SELECT id_usuario, comentario FROM comentarios where id_post IN (select id from post where id = ?)');
        $selecionaComentario->bind_param('s', $id);
        $selecionaComentario->execute();
        $comentarios = $selecionaComentario->get_result()->fetch_assoc();
        return $comentarios;

    }


}

?>