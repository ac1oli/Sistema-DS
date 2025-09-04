<?php
require_once("../../../../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"] ?? NULL;
    $categoria = 'chip'; // fixa a categoria

    if (!$id && !isset($_POST["editar"]) && !isset($_POST["excluir"])) {
    $marca = $_POST["marca"] ?? NULL;
    $modelo = $_POST["modelo"] ?? NULL;
    $imei_equip = $_POST["imei_equip"] ?? NULL;
    $linha = $_POST["linha"] ?? NULL;
    $obs = $_POST["obs"] ?? NULL;
    $data_entrada = $_POST["data_entrada"] !== "" ? $_POST["data_entrada"] : NULL;

    if (!$id) {
        $sql = "INSERT INTO equipamento 
            (categoria, marca, modelo, imei_equip, linha, obs, data_entrada) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conexao, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssss", $categoria, $marca, $modelo, $imei_equip, $linha, $obs, $data_entrada);

            if (mysqli_stmt_execute($stmt)) {
                header('Location: index.php');
                exit;
            } else {
                echo "Erro ao inserir: " . mysqli_error($conexao);
            }
            mysqli_stmt_close($stmt);
        }
    }
}

if (isset($_POST["dar_saida"]) && $id) {
    $sql_select = "SELECT * FROM equipamento WHERE id_equip = ?";
    if ($stmt_select = mysqli_prepare($conexao, $sql_select)) {
        mysqli_stmt_bind_param($stmt_select, "i", $id);
        mysqli_stmt_execute($stmt_select);
        $result = mysqli_stmt_get_result($stmt_select);
        $dados_antigos = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt_select);

        if (!$dados_antigos) {
            die("Erro: Registro não encontrado!");
        }
        
        $obs = $_POST["obs"] ?? NULL;
        $data_saida = $_POST["data_saida"] !== "" ? $_POST["data_saida"] : NULL;
        $motivo_saida = $_POST["motivo_saida"] ?? NULL;

        $sql_update = "UPDATE equipamento 
        SET status = 'inativo', obs = ?, data_saida = ?, motivo_saida = ? 
        WHERE id_equip = ? AND categoria = ?";

    if ($stmt_update = mysqli_prepare($conexao, $sql_update)) {
        mysqli_stmt_bind_param($stmt_update, "sssis", $obs, $data_saida, $motivo_saida, $id, $categoria);
            if (mysqli_stmt_execute($stmt_update)) {
                header('Location: saidaProduto.php');
                exit;
            } else {
                echo "Erro ao dar_saida: " . mysqli_error($conexao);
            }
            mysqli_stmt_close($stmt_update);
        }
    }
}

// voltar_estoque
if (isset($_POST["voltar_estoque"]) && $id) {
    $sql_select = "SELECT * FROM equipamento WHERE id_equip = ?";
    if ($stmt_select = mysqli_prepare($conexao, $sql_select)) {
        mysqli_stmt_bind_param($stmt_select, "i", $id);
        mysqli_stmt_execute($stmt_select);
        $result = mysqli_stmt_get_result($stmt_select);
        $dados_antigos = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt_select);

        if (!$dados_antigos) {
            die("Erro: Registro não encontrado!");
        }
        
        $obs = $_POST["obs"] ?? NULL;
        $data_saida = $_POST["data_saida"] !== "" ? $_POST["data_saida"] : NULL;
        $motivo_saida = $_POST["motivo_saida"] ?? NULL;

        $sql_update = "UPDATE equipamento 
        SET status = 'ativo', obs = ?, data_saida = ?, motivo_saida = ? 
        WHERE id_equip = ? AND categoria = ?";

    if ($stmt_update = mysqli_prepare($conexao, $sql_update)) {
        mysqli_stmt_bind_param($stmt_update, "sssis", $obs, $data_saida, $motivo_saida, $id, $categoria);
            if (mysqli_stmt_execute($stmt_update)) {
                header('Location: index.php');
                exit;
            } else {
                echo "Erro ao voltar_estoque: " . mysqli_error($conexao);
            }
            mysqli_stmt_close($stmt_update);
        }
    }
}
    
    mysqli_close($conexao);
}
?>
