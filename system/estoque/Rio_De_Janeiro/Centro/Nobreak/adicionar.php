<?php
require_once("../../../../../config/db.php");
require_once("../../../../../config/protecao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/produtoEstoque.css">
    <title>Adicionar Nobreak</title>
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

        <label for="serial">SERIAL</label>
        <input type="text" name="serial" id="serial" placeholder="Serial" >

        <label for="patrimonio">PATRIMONIO</label>
        <input type="text" name="patrimonio" id="patrimonio" placeholder="patrimonio" >

        <label for="obs">OBSERVAÇÃO</label>
        <input type="text" name="obs" id="obs" placeholder="Observação" >

        <label for="data_entrada">DATA DE ENTRADA</label>
        <input type="date" name="data_entrada" id="data_entrada" required>

        <!-- Importante: categoria 'Nobreak' -->
        <input type="hidden" name="categoria" value="nobreak">

        <button id="adicionar" type="submit" onclick="return confirm('Tem certeza que deseja adicionar esse produto? Apos adicionado, não vai poder ser alterado!');">
            Adicionar Produto
        </button>
    </form>

</body>
</html>
