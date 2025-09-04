<?php
require_once("../../../../config/db.php");
require_once("../../../../config/protecao.php");
include "../../../../config/funcoes_validacao.php"; // Inclui o arquivo de funções de validação e sanitização

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitiza e valida o ID, se presente
    $id = validate_int($_POST["id"] ?? NULL);
    $categoria = 'amplificador'; // fixa a categoria
    $local = 'AL'; // fixa localidade

    // INSERIR
    if (!$id && !isset($_POST["editar"]) && !isset($_POST["excluir"])) {
        // Sanitiza e valida as entradas do formulário
        $marca = sanitize_html_input($_POST["marca"] ?? NULL);
        $modelo = sanitize_html_input($_POST["modelo"] ?? NULL);
        $serial = sanitize_html_input($_POST["serial"] ?? NULL);
        $obs = sanitize_html_input($_POST["obs"] ?? NULL);
        $data_entrada = sanitize_html_input($_POST["data_entrada"] ?? NULL);

        // Validação básica (exemplo)
        if (empty($marca) || empty($modelo) || empty($serial) || empty($data_entrada)) {
            // Em um sistema real, você redirecionaria para uma página de erro ou exibiria uma mensagem amigável
            die("Erro: Campos obrigatórios (Marca, Modelo, Serial, Data de Entrada) não podem estar vazios.");
        }

        #Para salvar o primeiro e ultimo nome da pessoa que colocar o produto no banco de dados
        $nomeCompleto = $_SESSION["nomeCompleto"] ?? "";
        $partes = explode(" ", trim($nomeCompleto));
        $primeiro = $partes[0] ?? "";
        $ultimo = $partes[count($partes) - 1] ?? "";
        $nomeColaborador = sanitize_html_input($primeiro . " " . $ultimo);

        $sql = "INSERT INTO equipamento 
            (categoria, local, marca, modelo, serial, obs, data_entrada, colaborador) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conexao, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssssss", $categoria, $local, $marca, $modelo, $serial, $obs, $data_entrada, $nomeColaborador);
            if (mysqli_stmt_execute($stmt)) {
                header("Location: index.php");
                exit;
            } else {
                error_log("Erro ao inserir: " . mysqli_error($conexao));
                die("Ocorreu um erro ao inserir o produto. Por favor, tente novamente mais tarde.");
            }
            mysqli_stmt_close($stmt);
        } else {
            error_log("Erro ao preparar statement de inserção: " . mysqli_error($conexao));
            die("Ocorreu um erro interno. Por favor, tente novamente mais tarde.");
        }
    }

    // DAR SAÍDA
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
            
            $obs = sanitize_html_input($_POST["obs"] ?? NULL);
            $data_saida = sanitize_html_input($_POST["data_saida"] ?? NULL);
            $motivo_saida = sanitize_html_input($_POST["motivo_saida"] ?? NULL);
    
            $sql_update = "UPDATE equipamento 
            SET status = 'inativo', obs = ?, data_saida = ?, motivo_saida = ? 
            WHERE id_equip = ? AND categoria = ?";
    
            if ($stmt_update = mysqli_prepare($conexao, $sql_update)) {
                mysqli_stmt_bind_param($stmt_update, "sssis", $obs, $data_saida, $motivo_saida, $id, $categoria);
                if (mysqli_stmt_execute($stmt_update)) {
                    header("Location: saidaProduto.php");
                    exit;
                } else {
                    error_log("Erro ao dar_saida: " . mysqli_error($conexao));
                    die("Ocorreu um erro ao dar saída no produto. Por favor, tente novamente mais tarde.");
                }
                mysqli_stmt_close($stmt_update);
            } else {
                error_log("Erro ao preparar statement de saída: " . mysqli_error($conexao));
                die("Ocorreu um erro interno. Por favor, tente novamente mais tarde.");
            }
        }
    }
    
    // VOLTAR AO ESTOQUE
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
            
            $obs = sanitize_html_input($_POST["obs"] ?? NULL);
            $data_saida = sanitize_html_input($_POST["data_saida"] ?? NULL); // Pode ser nulo ao voltar
            $motivo_saida = sanitize_html_input($_POST["motivo_saida"] ?? NULL); // Pode ser nulo ao voltar
    
            $sql_update = "UPDATE equipamento 
            SET status = 'ativo', obs = ?, data_saida = ?, motivo_saida = ? 
            WHERE id_equip = ? AND categoria = ?";
    
            if ($stmt_update = mysqli_prepare($conexao, $sql_update)) {
                mysqli_stmt_bind_param($stmt_update, "sssis", $obs, $data_saida, $motivo_saida, $id, $categoria);
                if (mysqli_stmt_execute($stmt_update)) {
                    header("Location: index.php");
                    exit;
                } else {
                    error_log("Erro ao voltar_estoque: " . mysqli_error($conexao));
                    die("Ocorreu um erro ao retornar o produto ao estoque. Por favor, tente novamente mais tarde.");
                }
                mysqli_stmt_close($stmt_update);
            } else {
                error_log("Erro ao preparar statement de retorno: " . mysqli_error($conexao));
                die("Ocorreu um erro interno. Por favor, tente novamente mais tarde.");
            }
        }
    }

    mysqli_close($conexao);
}
?>

