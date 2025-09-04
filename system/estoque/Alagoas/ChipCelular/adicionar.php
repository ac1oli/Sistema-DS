<?php
session_start();
require_once("../../../../config/db.php");
require_once("../../../../config/protecao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/produtoEstoque.css">
    <title>Adicionar Chip de Celular</title>
</head>
<body class="adicionar">

    <h4><a href="index.php">Voltar</a></h4>

    <form action="salvar.php" method="POST">

        <label for="nomeColaborador">QUEM ESTÁ ADICIONANDO O PRODUTO</label>
        <input type="text" placeholder="<?php echo htmlspecialchars($_SESSION['nomeCompleto']); ?>" disabled>
        <input type="hidden" name="nomeColaborador" value="<?php echo htmlspecialchars($_SESSION['nomeCompleto']); ?>">

        <label for="marca">MARCA</label>
        <input type="text" name="marca" id="marca" placeholder="Marca" >

        <label for="modelo">MODELO</label>
        <input type="text" name="modelo" id="modelo" placeholder="Modelo" >

        <label for="imei_equip">IMEI</label>
        <input type="text" name="imei_equip" id="imei_equip" placeholder="IMEI" >

        <label for="linha">Linha</label>
        <input type="text" name="linha" id="linha" placeholder="Linha" >

        <label for="obs">OBSERVAÇÃO</label>
        <input type="text" name="obs" id="obs" placeholder="Observação" >

        <label for="data_entrada">DATA DE ENTRADA</label>
        <input type="date" name="data_entrada" id="data_entrada" required>

        <!-- Importante: categoria 'Chip de Celular' -->
        <input type="hidden" name="categoria" value="Chip de Celular">

        <button id="adicionar" type="submit" onclick="return confirm('Tem certeza que deseja adicionar esse produto? Apos adicionado, não vai poder ser alterado!');">
            Adicionar Produto
        </button>
    </form>

</body>
</html>
