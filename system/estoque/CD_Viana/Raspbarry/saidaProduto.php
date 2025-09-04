<?php
session_start();
require_once("../../../../config/db.php");
require_once("../../../../config/protecao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Saida - Raspberry</title>
</head>
<body>

    <nav>
        <h1>Raspberry Que sairam do estoque</h1>
    </nav>

    <h3>
        <p><a href="../index.php">Voltar</a></p>
        <p><a href="index.php">Produtos no estoque</a></p>
    </h3>

    <?php
        // Buscar apenas os equipamentos da categoria 'Raspberry'
        if(!empty($_GET['pesquisa'])){

            $pesq = $_GET['pesquisa'];
            $sql = "SELECT * FROM equipamento WHERE categoria = 'Raspberry' AND status = 'ativo' AND local = 'CD-Viana' AND
            (marca LIKE '%$pesq%' or modelo LIKE'%$pesq%' or serial LIKE '%$pesq%' or data_entrada LIKE'%$pesq%' or patrimonio LIKE '%$pesq%')";

            $sql_count = "SELECT COUNT(*) AS total_Raspberry FROM equipamento WHERE categoria = 'Raspberry' AND status = 'ativo' AND local = 'CD_Viana' AND
            (marca LIKE '%$pesq%' or modelo LIKE'%$pesq%' or serial LIKE '%$pesq%' or data_entrada LIKE'%$pesq%' or patrimonio LIKE '%$pesq%')";

            $result_count = mysqli_query($conexao, $sql_count);

            if ($result_count) {
                $row_count = mysqli_fetch_assoc($result_count);
                $total_Raspberry = $row_count['total_Raspberry'];
                echo "<h3> Total de Raspberry:  $total_Raspberry </h3>";
            }

        }else{
            $sql = "SELECT * FROM equipamento WHERE categoria = 'Raspberry' AND status = 'ativo' AND local = 'CD_Viana'";

            $sql_count = "SELECT COUNT(*) AS total_Raspberry FROM equipamento WHERE categoria = 'Raspberry' AND status = 'ativo' AND local = 'CD_Viana'";
            $result_count = mysqli_query($conexao, $sql_count);

            if ($result_count) {
                $row_count = mysqli_fetch_assoc($result_count);
                $total_Raspberry = $row_count['total_Raspberry'];
                echo "<h3> Total de Raspberry:  $total_Raspberry </h3>";
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
            <th>Patrimonio</th>
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
                <td><?= htmlspecialchars($row['patrimonio']) ?></td>
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
