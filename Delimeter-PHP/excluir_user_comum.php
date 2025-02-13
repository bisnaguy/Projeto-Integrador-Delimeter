<?php

include_once 'repository/UserRepository.php';
include_once 'model/UserComum.php';
include_once 'model/Endereco.php';
include_once 'Autenticacao.php';

$autenticacao = new Autenticacao();

if (!$autenticacao->isLoggedIn()) {
    header(" Location: login.php");
    exit;
}

$repository = new UserRepository();
$repository->delete($_SESSION['user_id'] ? $_SESSION['user_id'] : $_POST['id']);

header('Location: logout.php');
exit();

?>
