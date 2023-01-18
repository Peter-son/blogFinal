<?php

class PostDAO{

    private $mysql;

    public function __construct(mysqli $mysql){
        $this->mysql = $mysql;
    }

    public function inserir(String $autor, String $conteudo, $visibilidade, $titulo): void {
        $inserePost = $this->mysql->prepare('INSERT INTO post (id_author, post_conteudo, id_visibilidade, post_titulo, post_modificacao) VALUES (?, ?, ?, ?, "0000-00-00 00:00:00")');
       $inserePost->bind_param('ssss', $autor, $conteudo, $visibilidade, $titulo);
       $inserePost->execute();
    }


    public function exibeTodos(): array{
        $resultado = $this->mysql->query('SELECT id, id_author, post_conteudo, id_visibilidade, post_titulo, imagem, url_post FROM post');
        $posts = $resultado->fetch_all(MYSQLI_ASSOC);
        return $posts;
    }

    public function encontrarPorId(String $id): array{
        $selecionaPost = $this->mysql->prepare("SELECT id, id_author, post_conteudo, id_visibilidade, post_titulo, url_post FROM post where id = ?");
        $selecionaPost->bind_param('s', $id);
        $selecionaPost->execute();
        $post = $selecionaPost->get_result()->fetch_assoc();
        return $post;
      }

      public function editar(String $id, String $conteudo, $visibilidade, $titulo): void{
        $editarPost = $this->mysql->prepare('UPDATE post SET post_conteudo = ?, id_visibilidade = ?, post_titulo = ? WHERE id = ?');
        $editarPost->bind_param('ssss', $conteudo, $visibilidade,  $titulo, $id);
        $editarPost->execute();
       }

      public function remover(String $id): void{
        $removerPost = $this->mysql->prepare('DELETE FROM post WHERE id = ?');
        $removerPost->bind_param('s', $id);
        $removerPost->execute();
    }
}

?>