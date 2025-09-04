<?php
require_once("../../../config/db.php");
require_once("../../../config/protecao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"] ?? NULL;

    // INSERIR
    if (!$id && !isset($_POST["atualizar-loja"])) {
        $loja = $_POST["loja"] ?? NULL;
        $estado = $_POST["estado"] ?? NULL;
        $endereco = $_POST["endereco"] ?? NULL;
        $numero = $_POST["numero"] ?? NULL;
        $cep = $_POST["cep"] ?? NULL;
        $cidade = $_POST["cidade"] ?? NULL;
        $bairro = $_POST["bairro"] ?? NULL;
        $cnpj = $_POST["cnpj"] ?? NULL;
        $ie = $_POST["ie"] ?? NULL;
        $gerente = $_POST["gerente"] ?? NULL;
        $lider = $_POST["lider"] ?? NULL;
        $atendente_senior = $_POST["atendente_senior"] ?? NULL;
        $email = $_POST["email"] ?? NULL;
        $usuario = $_POST["usuario"] ?? NULL;
        $senha = $_POST["senha"] ?? NULL;
        $numero_celular = $_POST["numero_celular"] ?? NULL;
        $link = $_POST["link"] ?? NULL;

        $sql = "INSERT INTO lojas
            (loja, estado, endereco, numero, cep, cidade, bairro, cnpj, ie, gerente, lider, atendente_senior, email, usuario, senha, numero_celular, link) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conexao, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssssssssssssss", $loja, $estado, $endereco, $numero, $cep, $cidade, $bairro, $cnpj, $ie, $gerente, $lider, $atendente_senior, $email, $usuario, $senha, $numero_celular, $link);
            if (mysqli_stmt_execute($stmt)) {
                header('Location: index.php');
                exit;
            } else {
                echo "Erro ao inserir: " . mysqli_error($conexao);
            }
            mysqli_stmt_close($stmt);
        }
    }

    if (isset($_POST['atualizar-loja'])) {
        $id = $_POST['idlojas'];
        $loja = $_POST['loja'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $CNPJ = $_POST['CNPJ'];
        $ie = $_POST['ie'];
        $gerente = $_POST['gerente'];
        $numero_gerente = $_POST['numero_gerente'];
        $lider = $_POST['lider'];
        $numero_lider = $_POST['numero_lider'];
        $atendente_senior = $_POST['atendente_senior'];
        $numero_senior = $_POST['numero_senior'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $numero_celular = $_POST['numero_celular'];
        

        $sql_update = "UPDATE lojas SET 
            loja='$loja', estado='$estado', endereco='$endereco', numero='$numero', 
            cep='$cep', cidade='$cidade', bairro='$bairro', CNPJ='$CNPJ', 
            ie='$ie', gerente='$gerente', numero_gerente='$numero_gerente', lider='$lider', numero_lider='$numero_lider', atendente_senior='$atendente_senior', numero_senior='$numero_senior', 
            email='$email', usuario='$usuario', senha='$senha', numero_celular='$numero_celular'
            WHERE idlojas=$id";

        mysqli_query($conexao, $sql_update);
        header("Location: index.php");
        exit;
    }
}
?>
