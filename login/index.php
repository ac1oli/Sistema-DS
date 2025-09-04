<?php
require_once __DIR__ . '../../config/db.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    
    if (strlen($_POST['username']) == 0) {
        echo "<div class='alert alert-danger'>Campo de usuário vazio, por favor preencha!.</div>";
    } else if (strlen($_POST['password']) == 0) {
        echo "<div class='alert alert-danger'>Campo de senha vazio, por favor preencha!</div>";
    } else {
        $username = $conexao->real_escape_string($_POST['username']);
        $password = $_POST['password'];

        $sql_code = "SELECT * FROM login WHERE usuario = '$username'";
        $sql_query = $conexao->query($sql_code) or die("Erro SQL: " . $conexao->error);

        if ($sql_query->num_rows === 1) {
            $user = $sql_query->fetch_assoc();

            if (password_verify($password, $user['senha'])) {
                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $user['idlogin'];
                $_SESSION['nomeCompleto'] = $user['nomeCompleto'];
                $_SESSION['username'] = $user['usuario'];

                header("Location: ../system/HomePage/index.php");
                exit;
            } else {
                echo "<div class='alert alert-danger'>Senha incorreta.</div>";;
            }
        } else {
            echo "<div class='alert alert-danger'>Usuario não encontrado.</div>";;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <h1><img src="img/DI SANTINNI.png" alt="Logo Di Santinni"></h1>

        <form action="" method="POST">
            <div class="formLogin">
                <input type="text" class="form-control" name="username" placeholder="Digite seu Usuario">
            </div>

            <div class="formLogin">
                
                <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua Senha">
        
            </div>

            <div class="formLogin">
                <p>
                    <button type="submit" class="btn btn-secondary"> Entrar </button>
                </p>

                <p><a href="register.php">Cadastrar-se</a></p>
            </div>
            
        </form>
    </div>
</body>
</html>