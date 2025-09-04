<?php
    session_start();
    require ('db.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Loja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .btn {
            margin-top: 20px;
            padding: 10px;
            border: none;
            background: #333;
            color: #fff;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn:hover {
            background: #555;
        }
        .voltar {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="index.php" class="voltar">← Voltar</a>
    <h2>Editar Loja</h2>

    <?php
    if(isset($_GET['idlojas'])){
        $idlojas = (int) $_GET['idlojas'];
        $sql = "SELECT * FROM lojas WHERE idlojas = $idlojas";
        $query = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($query) > 0) {
            $loja = mysqli_fetch_array($query);
    ?>
        <form action="salvar.php" method="POST">
            <input type="hidden" name="idlojas" value="<?= $loja['idlojas'] ?>">

            <label>Nome da Loja</label>
            <input type="text" name="loja" value="<?= $loja['loja'] ?>">

            <label>Estado</label>
            <input type="text" name="estado" value="<?= $loja['estado'] ?>">

            <label>Endereço</label>
            <input type="text" name="endereco" value="<?= $loja['endereco'] ?>">

            <label>Número</label>
            <input type="text" name="numero" value="<?= $loja['numero'] ?>">

            <label>CEP</label>
            <input type="text" name="cep" value="<?= $loja['cep'] ?>">

            <label>Cidade</label>
            <input type="text" name="cidade" value="<?= $loja['cidade'] ?>">

            <label>Bairro</label>
            <input type="text" name="bairro" value="<?= $loja['bairro'] ?>">

            <label>CNPJ</label>
            <input type="text" name="CNPJ" value="<?= $loja['CNPJ'] ?>">

            <label>IE</label>
            <input type="text" name="ie" value="<?= $loja['ie'] ?>">

            <label>Gerente</label>
            <input type="text" name="gerente" value="<?= $loja['gerente'] ?>">

            <label>Número Gerente</label>
            <input type="text" name="numero_gerente" value="<?= $loja['numero_gerente'] ?>">

            <label>Líder</label>
            <input type="text" name="lider" value="<?= $loja['lider'] ?>">

            <label>Número Líder</label>
            <input type="text" name="numero_lider" value="<?= $loja['numero_lider'] ?>">

            <label>Atendente Sênior</label>
            <input type="text" name="atendente_senior" value="<?= $loja['atendente_senior'] ?>">

            <label>Número Sênior</label>
            <input type="text" name="numero_senior" value="<?= $loja['numero_senior'] ?>">

            <label>E-mail</label>
            <input type="email" name="email" value="<?= $loja['email'] ?>">

            <label>Usuário</label>
            <input type="text" name="usuario" value="<?= $loja['usuario'] ?>">

            <label>Senha</label>
            <input type="text" name="senha" value="<?= $loja['senha'] ?>">

            <label>Número Celular</label>
            <input type="text" name="numero_celular" value="<?= $loja['numero_celular'] ?>">

            <button type="submit" name="atualizar-loja" class="btn">Salvar</button>
        </form>
    <?php
        } else {
            echo "<p>Loja não encontrada.</p>";
        }
    }
    ?>
</div>

</body>
</html>
