<?php

include_once 'Autenticacao.php';

$autenticacao = new Autenticacao();

if (!$autenticacao->isLoggedIn()) {
    header(" Location: login.php");
    exit;
}

require 'header.php';  ?>

<h1>Bem-vindo, <?php echo $autenticacao->getUserName(); ?>!</h1>
<p><a href="form_update_user_comum.php">Editar Dados do Usuário</a></p>
<p><a href="form_read_user_comum.php">Visualizar Dados do Usuário</a></p>
<p><a href="excluir_user_comum.php?id=<?php echo $_SESSION['user_id'] ?>">Excluir Dados do Usuário</a></p>

<?php require 'footer.php';  ?>

