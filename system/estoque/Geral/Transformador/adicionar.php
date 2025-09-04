<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/produtoEstoque.css">
    <title>Adicionar Transformador</title>
</head>
<body class="adicionar">

    <h4><a href="index.php">Voltar</a></h4>

    <form action="salvar.php" method="POST">
        <label for="tipo">TIPO</label>
        <input type="text" name="tipo" id="tipo" placeholder="Tipo">

        <label for="marca">MARCA</label>
        <input type="text" name="marca" id="marca" placeholder="Marca">

        <label for="modelo">MODELO</label>
        <input type="text" name="modelo" id="modelo" placeholder="Modelo">

        <label for="serial">SERIAL</label>
        <input type="text" name="serial" id="serial" placeholder="Serial">

        <label for="obs">OBSERVAÇÃO</label>
        <input type="text" name="obs" id="obs" placeholder="Observação">

        <label for="data_entrada">DATA DE ENTRADA</label>
        <input type="date" name="data_entrada" id="data_entrada" required>

        <label for="data_saida">DATA DE SAÍDA</label>
        <input type="date" name="data_saida" id="data_saida">

        <label for="motivo_saida">MOTIVO DA SAÍDA</label>
        <input type="text" name="motivo_saida" id="motivo_saida" placeholder="Motivo da Saída">

        <!-- Importante: categoria 'Transformador' -->
        <input type="hidden" name="categoria" value="transformador">

        <button id="adicionar" type="submit" onclick="return confirm('Tem certeza que deseja adicionar esse produto? Apos adicionado, não vai poder ser alterado!');">
            Adicionar Produto
        </button>
    </form>

</body>
</html>
