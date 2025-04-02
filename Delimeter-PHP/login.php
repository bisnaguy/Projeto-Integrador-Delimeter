<?php

include_once 'Autenticacao.php';

$autenticacao = new Autenticacao();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($autenticacao->login($email, $password)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Email ou senha incorretos!";
    }
}
    require 'header.php';
    if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="login.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>

<?php require 'footer.php'; ?>