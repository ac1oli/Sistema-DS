<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
include "../../config/protecao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/paginaPrincipals.css">
    <title>DS-Estoque</title>
</head>
<body>

    <header>

      <div id="logo">
            <img src="img/Logo.jpeg" id="img_logo" alt="DI Santinni">
        </div>

        <div id="contagem">
            <?php     
                $sql_count = "SELECT COUNT(*) AS total_itens FROM equipamento WHERE status = 'ativo' ";
                $result_count = mysqli_query($conexao, $sql_count);

                if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_itens = $row_count['total_itens'];
                    echo "<span style='color: white; font-size: 25px'>Produtos Totais: $total_itens";
                }
            ?>
        </div>
    </header>

<div id="navCont">
    <nav id="menu_lateral">

        <div id="conteudo_menu">


        <ul id="itens_menu">
            <li class="item_menu" >
                <a href="../HomePage/index.php">
                    <i class="fa-solid fa-house"></i> 
                    <span class="descricao_item">
                        Home
                    </span>
                </a>
            </li>
            <li class="item_menu ativo">
                <a href="../estoque/index.php">

                    <i class="fa-solid fa-boxes-stacked"></i>

                    <span class="descricao_item">
                        Estoque
                    </span>
                </a>
            </li>

            <li class="item_menu">
                <a href="../../login/logout.php">

                    <i class="fa-solid fa-arrow-right-from-bracket" style="color: red"></i>

                    <span class="descricao_item" style="color: red;">
                        Logout
                    </span>
                </a>
            </li>

        </ul>

        <button id="espandir">
            <i id="iconi_espandir" class="fa-solid fa-chevron-right"></i>
        </button>

        </div>

    </nav>

    <main>

        <div class="card"> 
            <a href="Geral/index.php"> 
                <strong style="font-size: 18px;">Geral</strong>
                
                <?php     
                $sql_count = "SELECT COUNT(*) AS total_itens FROM equipamento WHERE status = 'ativo'";
                $result_count = mysqli_query($conexao, $sql_count);

                if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_itens = $row_count['total_itens'];
                    echo "Quantidade: $total_itens";
                }
            ?>

            </a>
        </div>

        <div class="card"> 
            <a href="Pernambuco/index.php"> 
                <strong style="font-size: 18px;">Pernambuco</strong>
                
                <?php     
                $sql_count = "SELECT COUNT(*) AS total_itens FROM equipamento WHERE status = 'ativo' AND local = 'PE' ";
                $result_count = mysqli_query($conexao, $sql_count);

                if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_itens = $row_count['total_itens'];
                    echo "Quantidade: $total_itens";
                }
            ?>

            </a>
        </div>

        <div class="card"> 
            <a href="Rio_De_Janeiro/index.php"> 
                <strong style="font-size: 18px;">Rio De Janeiro</strong> 

                <?php     
                $sql_count = "SELECT COUNT(*) AS total_itens FROM equipamento WHERE status = 'ativo' AND local LIKE '%RJ%' ";
                $result_count = mysqli_query($conexao, $sql_count);

                if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_itens = $row_count['total_itens'];
                    echo "Quantidade: $total_itens";
                }
            ?>
            </a>
        </div>

        <div class="card"> 
            <a href="CD_Viana/index.php"> 
                <strong style="font-size: 18px;">CD Viana</strong> 

                <?php     
                $sql_count = "SELECT COUNT(*) AS total_itens FROM equipamento WHERE status = 'ativo' AND local = 'CD-Viana' ";
                $result_count = mysqli_query($conexao, $sql_count);

                if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_itens = $row_count['total_itens'];
                    echo "Quantidade: $total_itens";
                }
            ?>
            </a>
        </div>

        <div class="card"> 
            <a href="Alagoas/index.php"> 
                <strong style="font-size: 18px;">Alagoas</strong> 

                <?php     
                $sql_count = "SELECT COUNT(*) AS total_itens FROM equipamento WHERE status = 'ativo' AND local = 'AL' ";
                $result_count = mysqli_query($conexao, $sql_count);

                if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_itens = $row_count['total_itens'];
                    echo "Quantidade: $total_itens";
                }
            ?>
            </a>
        </div>

        <div class="card"> 
            <a href="Paraiba/index.php"> 
                <strong style="font-size: 18px;">Paraiba</strong> 

                <?php     
                $sql_count = "SELECT COUNT(*) AS total_itens FROM equipamento WHERE status = 'ativo' AND local = 'PB' ";
                $result_count = mysqli_query($conexao, $sql_count);

                if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_itens = $row_count['total_itens'];
                    echo "Quantidade: $total_itens";
                }
            ?>
            </a>
        </div>

        
    </main>

</div>

    <script src="javascript/script.js"></script>    
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