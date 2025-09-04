<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/produtoEstoque.css">
    <title>Adicionar RB</title>
</head>
<body class="adicionar">

    <h2 style="text-align: center;">Adicionar - Router Board</h2>
    <h4><a href="indexrb.php">Voltar</a></h4>

    <form action="salvar.php" method="POST">

        <label for="marca">MARCA</label>
        <input type="text" name="marca" id="marca" placeholder="Marca" >

        <label for="modelo">MODELO</label>
        <input type="text" name="modelo" id="modelo" placeholder="Modelo" >

        <label for="serial">SERIAL</label>
        <input type="text" name="serial" id="serial" placeholder="Serial" >

        <label for="patrimonio">PATRIMONIO</label>
        <input type="text" name="patrimonio" id="patrimonio" placeholder="Patrimonio" >

        <label for="mac">MAC</label>
        <input type="text" name="mac" id="mac" placeholder="MAC" >

        <label for="obs">OBSERVAÇÃO</label>
        <input type="text" name="obs" id="obs" placeholder="Observação">

        <label for="data_entrada">DATA DE ENTRADA</label>
        <input type="date" name="data_entrada" id="data_entrada" required>

        <input type="hidden" name="categoria" value="rb">

         <button id="adicionar" type="submit" onclick="return confirm('Tem certeza que deseja adicionar esse produto? Apos adicionado, não vai poder ser alterado!');">
            Adicionar Produto
        </button>
    </form>

</body>
</html>
