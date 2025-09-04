<?php
require_once("../../../../config/db.php");
require_once("../../../../config/protecao.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql_select = "SELECT * FROM equipamento WHERE id_equip = ? AND categoria = 'Chip de Celular'";
    $stmt_select = mysqli_prepare($conexao, $sql_select);
    mysqli_stmt_bind_param($stmt_select, "i", $id);
    mysqli_stmt_execute($stmt_select);
    $result = mysqli_stmt_get_result($stmt_select);
    $dados_antigos = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt_select);

    if (!$dados_antigos) {
        die("Erro: Registro não encontrado!");
    }
} else {
    die("Erro: ID não encontrado na URL!");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/produtoEstoque.css">
    <title>Chip</title>
</head>
<body>

    <h2 style="text-align: center;">Voltar o Chip para o estoque</h2>
    <h4><a href="saidaProduto.php">Voltar</a></h4>

    <form action="salvar.php" method="post">
        <input type="hidden" name="id" value="<?= $dados_antigos['id_equip'] ?>">

        Observação: <input type="text" name="obs" value="<?= $dados_antigos['obs'] ?>"><br>
        Data Saída: <input type="date" name="data_saida" value="<?= $dados_antigos['data_saida'] ?>"><br>
        Motivo Saída: <input type="text" name="motivo_saida" value="<?= $dados_antigos['motivo_saida'] ?>"><br>

        <button id="voltar_estoque" type="submit" name="voltar_estoque">Voltar para o estoque</button>
    </form>
</body>
</html>
