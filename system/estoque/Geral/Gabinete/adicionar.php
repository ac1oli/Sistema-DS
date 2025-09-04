<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/produtoEstoque.css">
    <title>Adicionar Gabinete</title>
</head>
<body class="adicionar">

    <h4><a href="index.php">Voltar</a></h4>

    <form action="salvar.php" method="POST">

        <label for="marca">MARCA</label>
        <input type="text" name="marca" id="marca" placeholder="Marca" required>

        <label for="modelo">MODELO</label>
        <input type="text" name="modelo" id="modelo" placeholder="Modelo" required>

        <label for="serial">SERIAL</label>
        <input type="text" name="serial" id="serial" placeholder="Serial" required>

        <label for="patrimonio">PATRIMONIO</label>
        <input type="text" name="patrimonio" id="patrimonio" placeholder="Patrimonio">

        <label for="sistema_operacional">SISTEMA OPERACIONAL</label>
        <input type="text" name="sistema_operacional" id="sistema_operacional" placeholder="Sistema Operacional" required>

        <label for="processador">PROCESSADOR</label>
        <input type="text" name="processador" id="processador" placeholder="Processador" required>

        <label for="memoria">MEMORIA</label>
        <input type="text" name="memoria" id="memoria" placeholder="Memoria" required>

        <label for="armazenamento">ARMAZENAMENTO</label>
        <input type="text" name="armazenamento" id="armazenamento" placeholder="Armazenamento" required>

        <label for="obs">OBSERVAÇÃO</label>
        <input type="text" name="obs" id="obs" placeholder="Observação">

        <label for="data_entrada">DATA DE ENTRADA</label>
        <input type="date" name="data_entrada" id="data_entrada" required>


        <!-- Importante: categoria 'Desktop' -->
        <input type="hidden" name="categoria" value="desktop">

        <button id="adicionar" type="submit" onclick="return confirm('Tem certeza que deseja adicionar esse produto? Apos adicionado, não vai poder ser alterado!');">
            Adicionar Produto
        </button>
    </form>

</body>
</html>
