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
    <title>Adicionar RB</title>
</head>
<body class="adicionar">

    <h4><a href="index.php">Voltar</a></h4>

    <form action="salvar.php" method="POST">

        <label for="nomeColaborador">QUEM ESTÁ ADICIONANDO O PRODUTO</label>
        <input type="text" placeholder="<?php echo htmlspecialchars($_SESSION['nomeCompleto']); ?>" disabled>
        <input type="hidden" name="nomeColaborador" value="<?php echo htmlspecialchars($_SESSION['nomeCompleto']); ?>">

        <label for="marca">MARCA</label>
        <input type="text" name="marca" id="marca" placeholder="Marca" required>

        <label for="modelo">MODELO</label>
        <input type="text" name="modelo" id="modelo" placeholder="Modelo" required>

        <label for="serial">SERIAL</label>
        <input type="text" name="serial" id="serial" placeholder="Serial" required>

        <label for="ssid">ssid</label>
        <input type="text" name="ssid" id="ssid" placeholder="ssid" required>

        <label for="senha">SENHA</label>
        <input type="text" name="senha" id="senha" placeholder="senha" required>

        <label for="imei_equip">IMEI DO EQUIPAMENTO</label>
        <input type="text" name="imei_equip" id="imei_equip" placeholder="imei_equip" required>

        <label for="imei_chip">IMEI DO CHIP</label>
        <input type="text" name="imei_chip" id="imei_chip" placeholder="imei_chip" required>

        <label for="login_adm">LOGIN ADM</label>
        <input type="text" name="login_adm" id="login_adm" placeholder="login_adm" required>

        <label for="senha_adm">SENHA DO ADM</label>
        <input type="text" name="senha_adm" id="senha_adm" placeholder="senha_adm" required>

        <label for="numero_linha">NUMERO DA LINHA</label>
        <input type="text" name="numero_linha" id="numero_linha" placeholder="numero_linha" required>

        <label for="obs">OBSERVAÇÃO</label>
        <input type="text" name="obs" id="obs" placeholder="Observação" required>

        <label for="data_entrada">DATA DE ENTRADA</label>
        <input type="date" name="data_entrada" id="data_entrada" required>

    
        <input type="hidden" name="categoria" value="vivobox">

        <button id="adicionar" type="submit" onclick="return confirm('Tem certeza que deseja adicionar esse produto? Apos adicionado, não vai poder ser alterado!');">
            Adicionar Produto
        </button>
    </form>

</body>
</html>
