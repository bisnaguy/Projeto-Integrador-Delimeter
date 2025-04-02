<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delímiter - Priorize sua Alimentação</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
// Inicia a sessão, se ainda não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <div class="logo">
        <a href="home.html"><img src="images/logo.png" alt="Logo Delímiter"></a>
    </div>
    <nav>
        <ul>
            <li><a href="about.html">Sobre Nós</a></li>
            <li><a href="#">Sustentabilidade</a></li>
            <li><a href="#">Últimas Notícias</a></li>
            <?php
            // Verifica se o usuário está logado
            if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name']) &&
                isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
                echo '<li><a href="logout.php">Logout</a></li>';
            } else {
                echo '<li><a href="form_create_user_comum.php">Cadastrar-se</a></li>';
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>