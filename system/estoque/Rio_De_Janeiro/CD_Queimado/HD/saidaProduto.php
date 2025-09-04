<?php
session_start();
require_once("../../../../../config/db.php");
require_once("../../../../../config/protecao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../css/produtoEstoque.css">
    <title>Saida - HD</title>
</head>
<body>

    <nav>
        <h1>HD Que sairam do estoque</h1>
    </nav>

    <h3>
        <p><a href="../index.php">Voltar</a></p>
        <p><a href="index.php">Produtos no estoque</a></p>
    </h3>

    <?php

         // Buscar apenas os equipamentos da categoria 'hd'
        if(!empty($_GET['pesquisa'])){

            $pesq = $_GET['pesquisa'];
            $sql = "SELECT * FROM equipamento WHERE categoria = 'HD' AND status = 'inativo' AND local = 'RJ-CD-Queimado' AND
            (marca LIKE '%$pesq%' or modelo LIKE'%$pesq%' or serial LIKE '%$pesq%' or data_entrada LIKE'%$pesq%' or patrimonio LIKE '%$pesq%' or so LIKe '%$pesq%')";

            $sql_count = "SELECT COUNT(*) AS total_hd FROM equipamento WHERE categoria = 'HD' AND status = 'inativo' AND local = 'RJ-CD-Queimado' AND
            (marca LIKE '%$pesq%' or modelo LIKE'%$pesq%' or serial LIKE '%$pesq%' or data_entrada LIKE'%$pesq%' or patrimonio LIKE '%$pesq%')";

            $result_count = mysqli_query($conexao, $sql_count);

            if ($result_count) {
                $row_count = mysqli_fetch_assoc($result_count);
                $total_hd = $row_count['total_hd'];
                echo "<h3> Total de HD:  $total_hd </h3>";
            }

        }else{
            $sql = "SELECT * FROM equipamento WHERE categoria = 'HD' AND status = 'inativo' AND local = 'RJ-CD-Queimado'";

            $sql_count = "SELECT COUNT(*) AS total_hd FROM equipamento WHERE categoria = 'HD' AND status = 'inativo' AND local = 'RJ-CD-Queimado'";
            $result_count = mysqli_query($conexao, $sql_count);

            if ($result_count) {
                $row_count = mysqli_fetch_assoc($result_count);
                $total_hd = $row_count['total_hd'];
                echo "<h3> Total de HD:  $total_hd </h3>";
            }
        }

        $result = mysqli_query($conexao, $sql);

        if (!$result) {
            die("Erro ao buscar dados: " . mysqli_error($conexao));
        }
    ?>

    <table border="1px solid black">
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Serial</th>
            <th>Armazenamento</th>
            <th>SO</th>
            <th>OBS</th>
            <th>Data de Entrada</th>
            <th>Data de Saida</th>
            <th>Motivo Saida</th>
            <th>Opções</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= htmlspecialchars($row['marca']) ?></td>
                <td><?= htmlspecialchars($row['modelo']) ?></td>
                <td><?= htmlspecialchars($row['serial']) ?></td>
                <td><?= htmlspecialchars($row['armazenamento']) ?></td>
                <td><?= htmlspecialchars($row['sistema_operacional']) ?></td>
                <td><?= htmlspecialchars($row['obs']) ?></td>

                <td>
                    <?= $row['data_entrada'] ? date("d/m/Y", strtotime($row['data_entrada'])) : "Em estoque" ?>
                </td>

                <td>
                    <?= $row['data_saida'] ? date("d/m/Y", strtotime($row['data_saida'])) : "Em estoque" ?>
                </td>

                <td><?= htmlspecialchars($row['motivo_saida']) ?></td>

                <td>
                    <a href="voltarEstoque.php?id=<?= urlencode($row['id_equip']) ?>">Voltar para estoque</a> 
                </td>
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
        window.location = 'saidaProduto.php?pesquisa=' + pesquisa.value;
    }

</script>

</html>
