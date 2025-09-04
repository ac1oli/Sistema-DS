<?php
require_once("../../../../config/db.php");
require_once("../../../../config/protecao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"] ?? NULL;
    $categoria = 'transformador'; // fixa a categoria
    $local = 'CD-Viana';

    // INSERIR
    if (!$id && !isset($_POST["editar"]) && !isset($_POST["excluir"])) {
        $marca = $_POST["marca"] ?? NULL;
        $modelo = $_POST["modelo"] ?? NULL;
        $serial = $_POST["serial"] ?? NULL;
        $obs = $_POST["obs"] ?? NULL;
        $data_entrada = $_POST["data_entrada"] !== "" ? $_POST["data_entrada"] : NULL;

         #Para salvar o primeiro e ultimo nome da pessoa que colocar o produto no banco de dados
        $nomeCompleto = $_SESSION['nomeCompleto'] ?? '';
        $partes = explode(' ', trim($nomeCompleto));
        $primeiro = $partes[0] ?? '';
        $ultimo = $partes[count($partes) - 1] ?? '';
        $nomeColaborador = $primeiro . ' ' . $ultimo;


        $sql = "INSERT INTO equipamento 
            (categoria, local, marca, modelo, serial, obs, data_entrada, colaborador) 
            VALUES (?, ?, ?, ?, ?, ?, ?,?)";

        if ($stmt = mysqli_prepare($conexao, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssssss", $categoria, $local, $marca, $modelo, $serial, $obs, $data_entrada, $nomeColaborador);
            if (mysqli_stmt_execute($stmt)) {
                header('Location: index.php');
                exit;
            } else {
                echo "Erro ao inserir: " . mysqli_error($conexao);
            }
            mysqli_stmt_close($stmt);
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

    // EXCLUIR
    if (isset($_POST["excluir"]) && $id) {
        $sql_check = "SELECT * FROM equipamento WHERE id_equip = ? AND categoria = ?";
        if ($stmt_check = mysqli_prepare($conexao, $sql_check)) {
            mysqli_stmt_bind_param($stmt_check, "is", $id, $categoria);
            mysqli_stmt_execute($stmt_check);
            $result_check = mysqli_stmt_get_result($stmt_check);
            if (mysqli_num_rows($result_check) == 0) {
                die("Erro: Registro não encontrado!");
            }
            mysqli_stmt_close($stmt_check);
        }

        $sql_delete = "DELETE FROM equipamento WHERE id_equip = ? AND categoria = ?";
        if ($stmt_delete = mysqli_prepare($conexao, $sql_delete)) {
            mysqli_stmt_bind_param($stmt_delete, "is", $id, $categoria);
            if (mysqli_stmt_execute($stmt_delete)) {
                header('Location: index.php');
                exit;
            } else {
                echo "Erro ao excluir: " . mysqli_error($conexao);
            }
            mysqli_stmt_close($stmt_delete);
        }
    }

    mysqli_close($conexao);
}
?>
