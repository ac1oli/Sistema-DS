<?php
session_start();
require_once("../../../../config/db.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/produtoEstoque.css">
    <title>Saida - Notebook</title>
</head>
<body>

    <nav>
        <h1>Notebook Que sairam do estoque</h1>
    </nav>

    <h3>
        <p><a href="../index.php">Voltar</a></p>
        <p><a href="index.php">Produtos no estoque</a></p>
    </h3>

    <?php
        // Buscar apenas os equipamentos da categoria 'notebook'
        if(!empty($_GET['pesquisa'])){

            $pesq = $_GET['pesquisa'];
            $sql = "SELECT * FROM equipamento WHERE categoria = 'notebook' AND status = 'inativo' AND
            (marca LIKE '%$pesq%' or modelo LIKE'%$pesq%' or serial LIKE '%$pesq%' or data_entrada LIKE'%$pesq%' or patrimonio LIKE '%$pesq%')";

            $sql_count = "SELECT COUNT(*) AS total_notebook FROM equipamento WHERE categoria = 'notebook' AND status = 'inativo' AND
            (marca LIKE '%$pesq%' or modelo LIKE'%$pesq%' or serial LIKE '%$pesq%' or data_entrada LIKE'%$pesq%' or patrimonio LIKE '%$pesq%')";

            $result_count = mysqli_query($conexao, $sql_count);

            if ($result_count) {
                $row_count = mysqli_fetch_assoc($result_count);
                $total_notebook = $row_count['total_notebook'];
                echo "<h3> Total de Notebook:  $total_notebook </h3>";
            }

        }else{
            $sql = "SELECT * FROM equipamento WHERE categoria = 'notebook' AND status = 'inativo'";

            $sql_count = "SELECT COUNT(*) AS total_notebook FROM equipamento WHERE categoria = 'notebook' AND status = 'inativo'";
            $result_count = mysqli_query($conexao, $sql_count);

            if ($result_count) {
                $row_count = mysqli_fetch_assoc($result_count);
                $total_notebook = $row_count['total_notebook'];
                echo "<h3> Total de Notebook:  $total_notebook </h3>";
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
            <th>Sistema Operacional</th>
            <th>Processador</th>
            <th>Memoria</th>
            <th>Armazenamento</th>
            <th>Observação</th>
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
                <td><?= htmlspecialchars($row['sistema_operacional']) ?></td>
                <td><?= htmlspecialchars($row['processador']) ?></td>
                <td><?= htmlspecialchars($row['memoria']) ?></td>
                <td><?= htmlspecialchars($row['armazenamento']) ?></td>
                <td><?= htmlspecialchars($row['obs']) ?></td>

                <td>
                    <?= $row['data_entrada'] ? date("d/m/Y", strtotime($row['data_entrada'])) : "Em estoque" ?>
                </td>
                <td>
                    <?= $row['data_saida'] ? date("d/m/Y", strtotime($row['data_saida'])) : "Em estoque" ?>
                </td>
                <td><?= htmlspecialchars($row['motivo_saida']) ?></td>

                <td>
                    <a href="voltarEstoque.php?id=<?= urlencode($row['id_equip']) ?>">Voltar para Estoque</a> 
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
