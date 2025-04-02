<?php

include_once 'Autenticacao.php';

$autenticacao = new Autenticacao();
$autenticacao->logout();

header("Location: index.php");
exit;
?>

