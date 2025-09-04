<?php
require_once __DIR__ . '/../config/db.php';

    if (isset($_POST["submit"])) {
        $nomeCompleto = $_POST["nome_Completo"];
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $senhaRepetida = $_POST["repitir_senha"];
        
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $errors = array();
        
        if (empty($nomeCompleto) OR empty($usuario) OR empty($senha) OR empty($senhaRepetida)) {
            array_push($errors,"Algum campo ainda precisa ser preenchido");
        }
        if (strlen($senha)<8) {
            array_push($errors,"Minimo de 8 caracteres na senha não atingidors");
        }
        if ($senha!==$senhaRepetida) {
            array_push($errors,"As senhas não são iguais");
        }
        
        $sql = "SELECT * FROM login WHERE usuario = '$usuario'";
        $result = mysqli_query($conexao, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount>0) {
            array_push($errors,"usuario já existe ");
        }
        if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        }else{
            $sql = "INSERT INTO login (nomeCompleto,usuario,senha) VALUES (?,?,?)";
            $stmt = mysqli_stmt_init($conexao);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$nomeCompleto, $usuario, $senhaHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Você se Registrou com sucesso.</div>";
                header("Location: ../index.php");
            }else{
                die("Falha ao se registrar");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Registre-se</title>
</head>
<body>
    <div class="container">
        <h1><img src="img/DI SANTINNI.png" alt="Logo Di Santinni"></h1>

        <form action="register.php" method="post">
            <div class="formRegister">
                <input type="text" class="form-control" name="nome_Completo" placeholder="Nome Completo">
            </div>
            <div class="formRegister">
                <input type="text" class="form-control" name="usuario" placeholder="Usuario">
            </div>
            <div class="formRegister">
                <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
            </div>
            <div class="formRegister">
                <input type="password" class="form-control" name="repitir_senha" placeholder="Repita sua senha">
            </div>
            <div class="formRegister">
                <input type="submit" class="btn btn-secondary" value="Registras-se" name="submit">

                <p><a href="index.php">Já tenho cadastro</a></p>
            </div>
        </form>
    </div>
</body>
</html>