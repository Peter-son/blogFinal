<?php

function redireciona(String $url): void{
header("Location: $url");
    die();
}
?>    