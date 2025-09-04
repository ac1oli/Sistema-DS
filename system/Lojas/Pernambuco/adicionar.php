<?php
session_start();
require_once("../../../config/db.php");
require_once("../../../config/protecao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/produtoEstoque.css">
    <title>Adicionar Amplificador</title>
</head>
<body class="adicionar">

    <h4>
        <a href="index.php">Voltar</a>
    </h4>

    <form action="salvar.php" method="POST">

        <label for="loja">LOJA</label>
        <input type="text" name="loja" id="loja" placeholder="loja">

        <label for="estado">ESTADO</label>
        <input type="text" name="estado" id="estado" placeholder="estado">

        <label for="endereco">ENDEREÇO</label>
        <input type="text" name="endereco" id="endereco" placeholder="endereco">

        <label for="numero">NUMERO</label>
        <input type="text" name="numero" id="numero" placeholder="Número">

        <label for="cep">CEP</label>
        <input type="text" name="cep" id="cep" placeholder="cep">

        <label for="cidade">CIDADE</label>
        <input type="text" name="cidade" id="cidade" placeholder="cidade">

        <label for="bairro">BAIRRO</label>
        <input type="text" name="bairro" id="bairro" placeholder="bairro">

        <label for="cnpj">CNPJ</label>
        <input type="text" name="cnpj" id="cnpj" placeholder="cnpj">

        <label for="ie">IE</label>
        <input type="text" name="ie" id="ie" placeholder="ie">

        <label for="gerente">GERENTE</label>
        <input type="text" name="gerente" id="gerente" placeholder="gerente">

        <label for="gerente">NÚMERO GERENTE</label>
        <input type="text" name="numero_gerente" id="numero_gerente" placeholder="Numero do Gerente">

        <label for="lider">LIDER</label>
        <input type="text" name="lider" id="lider" placeholder="lider">

        <label for="gerente">NÚMERO LIDER</label>
        <input type="text" name="numero_lider" id="numero_lider" placeholder="Número do Líder">

        <label for="atendente_senior">ATENDENTE SENIOR</label>
        <input type="text" name="atendente_senior" id="atendente_senior" placeholder="Atendente Senior">

        <label for="gerente">NÚMERO DO SENIOR</label>
        <input type="text" name="numero_senior" id="numero_senior" placeholder="Número do Senior">

        <label for="email">E-MAIL</label>
        <input type="text" name="email" id="email" placeholder="email">

        <label for="usuario">USUARIO</label>
        <input type="text" name="usuario" id="usuario" placeholder="usuario">

        <label for="senha">SENHA</label>
        <input type="text" name="senha" id="senha" placeholder="senha">

        <label for="numero_celular">NUMERO CELULAR</label>
        <input type="text" name="numero_celular" id="numero_celular" placeholder="Numero Celular">

        <label for="link">Link - URL (DA LOJA)</label>
        <input type="text" name="link" id="link" placeholder="Link - URL">

        <button id="adicionar" type="submit" onclick="return confirm('Tem certeza que deseja adicionar esse produto? Apos adicionado, não vai poder ser alterado!');">
            Adicionar Produto
        </button>
    </form>

</body>
</html>
