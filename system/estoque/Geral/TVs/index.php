<?php
session_start();
require_once("../../../../config/db.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>ESTOQUE - TVs</title>
</head>
<body>

    <nav>
        <h1>ESTOQUE - TVs</h1>
    </nav>

    <h3>
        <a href="../index.php">Voltar</a>
        <a href="adicionar.php">Adicionar TV</a>
        <a href="saidaProduto.php">Saida - Estoque</a>
    </h3>

    <?php

        $sql_count = "SELECT COUNT(*) AS total_tvs FROM equipamento WHERE categoria = 'tvs' AND status = 'ativo'";
        $result_count = mysqli_query($conexao, $sql_count);

        if ($result_count) {
            $row_count = mysqli_fetch_assoc($result_count);
            $total_tvs = $row_count['total_tvs'];
            echo "<h3> Total de TVs: $total_tvs </h3>";
        }

        // Buscar apenas os equipamentos da categoria 'tvs'
        $sql = "SELECT * FROM equipamento WHERE categoria = 'tvs' AND status = 'ativo'";
        $result = mysqli_query($conexao, $sql);

        if (!$result) {
            die("Erro ao buscar dados: " . mysqli_error($conexao));
        }
    ?>

    <table border="1px solid black">
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Polegadas</th>
            <th>Serial</th>
            <th>Patrimonio</th>
            <th>Observação</th>
            <th>Data de Entrada</th>
            <th>Opções</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= htmlspecialchars($row['marca']) ?></td>
                <td><?= htmlspecialchars($row['modelo']) ?></td>
                <td><?= htmlspecialchars($row['polegadas']) ?></td>
                <td><?= htmlspecialchars($row['serial']) ?></td>
                <td><?= htmlspecialchars($row['patrimonio']) ?></td>
                <td><?= htmlspecialchars($row['obs']) ?></td>

                <td>
                    <?= $row['data_entrada'] ? date("d/m/Y", strtotime($row['data_entrada'])) : "Em estoque" ?>
                </td>
                <td>
                    <a href="dar_baixa.php?id=<?= urlencode($row['id_equip']) ?>">Dar Saida</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php mysqli_close($conexao); ?>

</body>
</html>
