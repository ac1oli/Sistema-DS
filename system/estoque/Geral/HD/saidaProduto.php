<?php
session_start();
require_once("../../../../config/db.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../../css/produtoEstoque.css">
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
        $status = $_GET['status'] ?? 'inativo';

        $sql_count = "SELECT COUNT(*) AS total_hd FROM equipamento WHERE categoria = 'hd' AND status = ?";
        $stmt_count = mysqli_prepare($conexao, $sql_count);
        mysqli_stmt_bind_param($stmt_count, "s", $status);
        mysqli_stmt_execute($stmt_count);
        $result_count = mysqli_stmt_get_result($stmt_count);

        if ($result_count) {
            $row_count = mysqli_fetch_assoc($result_count);
            $total_hd = $row_count['total_hd'];
            echo "<h3>Total de HD: $total_hd</h3>";
        }
        mysqli_stmt_close($stmt_count);

        $sql = "SELECT * FROM equipamento WHERE status = ? AND categoria = 'hd' AND status = 'inativo'";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "s", $status);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

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
