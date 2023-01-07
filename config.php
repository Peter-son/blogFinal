<?php
$mysql = new mysqli('localhost', 'root', '', 'blogdesafiofinal');
$mysql->set_charset('utf8');

if($mysql == False){
    echo "Erro na conexão";
}
?>