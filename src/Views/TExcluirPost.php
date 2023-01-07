<?php
require '../../config.php';
require '../DAO/PostDAO.php';
require '../../redireciona.php';
require '../../Autentica.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $PostD = new PostDAO(($mysql));
$PostD->remover($_POST['id']);

redireciona('/blogfinal/index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="UTF-8">
    <title>Excluir Artigo</title>
</head>

<body>
    <div id="container">
    <center> 
        <h1>Você realmente deseja excluir o post?</h1>
        <form method="post" action="TExcluirPost.php">
            <p>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
               <button class="botao">Sim</button>
                 </p>
        </form>
        <button class="botao" onclick="window.location.href='TListagemPosts.php';">Não</button>
            </center>
    </div>
</body>

</html>