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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/produtoEstoque.css">
    <title>Controle de Lojas</title>
</head>
<body>

    <nav>
        <h1>Controle de Lojas</h1>

        <div class="caixaPesquisa">
            <input type="search" class="caixaP" placeholder="Pesquisar" id="pesquisar">
            <button onclick="pesquisarPor()" class="lupa">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </nav>

    <h3>
        <a href="../index.php">Voltar</a>
        <a href="adicionar.php">Adicionar Loja</a>
    </h3>

    <?php

        // Buscar apenas os lojass da categoria 'amplificador'
        if(!empty($_GET['pesquisa'])){

            $pesq = $_GET['pesquisa'];
            $sql = "SELECT * FROM lojas WHERE
            (marca LIKE '%$pesq%' or modelo LIKE'%$pesq%' or serial LIKE '%$pesq%' or data_entrada LIKE'%$pesq%')";

            $sql_count = "SELECT COUNT(*) AS total_lojas FROM lojas WHERE
            (marca LIKE '%$pesq%' or modelo LIKE'%$pesq%' or serial LIKE '%$pesq%' or data_entrada LIKE'%$pesq%' or patrimonio LIKE '%$pesq%')";

            $result_count = mysqli_query($conexao, $sql_count);

            if ($result_count) {
                $row_count = mysqli_fetch_assoc($result_count);
                $total_lojas = $row_count['total_lojas'];
                echo "<h3> Total de Amplificador:  $total_lojas </h3>";
            }

        }else{
            $sql = "SELECT * FROM lojas";

            $sql_count = "SELECT COUNT(*) AS total_lojas FROM lojas";
            $result_count = mysqli_query($conexao, $sql_count);

            if ($result_count) {
                $row_count = mysqli_fetch_assoc($result_count);
                $total_lojas = $row_count['total_lojas'];
                echo "<h3> Total de Lojas:  $total_lojas </h3>";
            }
        }

        $result = mysqli_query($conexao, $sql);

        if (!$result) {
            die("Erro ao buscar dados: " . mysqli_error($conexao));
        }
    ?>

    <table border="1px solid black">
        <tr>
            <th>Lojas</th>
            <th>Estado</th>
            <th>Endereço (Clique para ver o local)</th>
            <th>Numero</th>
            <th>CEP</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>CNPJ</th>
            <th>IE</th>
            <th>Gerente</th>
            <th>Líder</th>
            <th>Atendente Senior</th>
            <th>E-mail</th>
            <th>usuario</th>
            <th>senha</th>
            <th>Numero celular</th>
            <th>Opções</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= htmlspecialchars($row['loja']) ?></td>
                <td><?= htmlspecialchars($row['estado']) ?></td>
                <td>
                    <a href="<?= htmlspecialchars($row['link'] ?? '') ?>" target="_blank">
                        <?= htmlspecialchars($row['endereco'] ?? '') ?>
                    </a>
                </td>
                <td><?= htmlspecialchars($row['numero']) ?></td>
                <td><?= htmlspecialchars($row['cep']) ?></td>
                <td><?= htmlspecialchars($row['cidade']) ?></td>
                <td><?= htmlspecialchars($row['bairro']) ?></td>
                <td><?= htmlspecialchars($row['CNPJ'] ?? '') ?></td>
                <td><?= htmlspecialchars($row['ie']) ?></td>

                <td>
                    <?= htmlspecialchars($row['gerente']) ?> <br> 
                    <?= htmlspecialchars($row['numero_gerente'] ?? '') ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['lider']) ?> <br>
                    <?= htmlspecialchars($row['numero_lider'] ?? '') ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['atendente_senior']) ?> <br>
                    <?= htmlspecialchars($row['numero_senior'] ?? '') ?>
                </td>

                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['usuario']) ?></td>
                <td><?= htmlspecialchars($row['senha']) ?></td>
                <td><?= htmlspecialchars($row['numero_celular']) ?></td>
                <td><a href="editar.php?idlojas=<?= $row['idlojas'] ?>">Editar</a></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php mysqli_close($conexao); ?>

</body>

<script>
    var pesquisa = document.getElementById('pesquisar');
    
    pesquisa.addEventListener("keydown", function(event){
        if (event.key === "Enter"){
            pesquisarPor();
        }
    });

    function pesquisarPor(){
        window.location = 'index.php?pesquisa=' + pesquisa.value;
    }

</script>

</html>
