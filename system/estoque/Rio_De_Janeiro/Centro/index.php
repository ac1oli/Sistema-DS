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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../../css/paginaPrincipals.css">
    <title>Estoque PE</title>
</head>
<body >

    <header>

      <div id="logo">
            <img src="../../img/Logo.jpeg" id="img_logo" alt="DI Santinni">
        </div>

    </header>

<div id="navCont">
    <nav id="menu_lateral">

        <div id="conteudo_menu">

        <ul id="itens_menu">
            <li class="item_menu" >
                <a href="../../../HomePage/index.php">
                    <i class="fa-solid fa-house"></i> 
                    <span class="descricao_item">
                        Home
                    </span>
                </a>
            </li>
            <li class="item_menu ativo">
                <a href="../../index.php">

                    <i class="fa-solid fa-boxes-stacked"></i>

                    <span class="descricao_item">
                        Estoque
                    </span>
                </a>
            </li>

            <li class="item_menu">
                <a href="../../../../login/logout.php">

                    <i class="fa-solid fa-arrow-right-from-bracket" style="color: red;"></i>

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
            <a href="RB/indexrb.php"> 
                <h3>Router Board</h3>

            <?php     
                $sql_count = "SELECT COUNT(*) AS total_rb FROM equipamento WHERE categoria = 'Router Board' AND status = 'ativo' AND local = 'RJ-Centro' ";
                $result_count = mysqli_query($conexao, $sql_count);

                if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_rb = $row_count['total_rb'];
                    echo "Quantidade: $total_rb";
                }
            ?>

            </a>
        </div>
        <div class="card"> 
           <a href="VivoBox/index.php"> 
                <h3>VivoBox</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_vivobox FROM equipamento WHERE categoria = 'vivobox' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_vivobox = $row_count['total_vivobox'];
                        echo "Quantidade: $total_vivobox";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
            <a href="Celular/index.php"> 
                <h3>Celular</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_celular FROM equipamento WHERE categoria = 'celular' AND status = 'ativo' AND local = 'RJ-Centro' ";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_celular = $row_count['total_celular'];
                        echo "Quantidade: $total_celular";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
            <a href="ChipCelular/index.php"> 
                <h3>Chips Celular</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_chip FROM equipamento WHERE categoria = 'chip' AND status = 'ativo' AND local = 'RJ-Centro' ";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_chip = $row_count['total_chip'];
                        echo "Quantidade: $total_chip";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
        <a href="Notebook/index.php"> 
                <h3>Notebook</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_notebook FROM equipamento WHERE categoria = 'notebook' AND status = 'ativo' AND local = 'RJ-Centro' ";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_notebook = $row_count['total_notebook'];
                        echo "Quantidade: $total_notebook";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
            <a href="Gabinete/index.php"> 
                <h3>Gabinete</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_desktop FROM equipamento WHERE categoria = 'desktop' AND status = 'ativo' AND local = 'RJ-Centro' ";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_desktop = $row_count['total_desktop'];
                        echo "Quantidade: $total_desktop";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
            <a href="Fontes/index.php"> 
                <h3>Fontes</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_fontes FROM equipamento WHERE categoria  LIKE '%Fonte%' AND status = 'ativo' AND local = 'RJ-Centro' ";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_fontes = $row_count['total_fontes'];
                        echo "Quantidade: $total_fontes";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
        <a href="TVs/index.php"> 
                <h3>TVs</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_tvs FROM equipamento WHERE categoria = 'tvs' AND status = 'ativo' AND local = 'RJ-Centro' ";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_tvs = $row_count['total_tvs'];
                        echo "Quantidade: $total_tvs";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
        <a href="Monitor/index.php"> 
                <h3>Monitor</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_monitor FROM equipamento WHERE categoria = 'monitor' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_monitor = $row_count['total_monitor'];
                        echo "Quantidade: $total_monitor";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
        <a href="MonitorTouch/index.php"> 
                <h3>Monitor Touch</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_monitortouch FROM equipamento WHERE categoria = 'Monitor Touch' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_monitortouch = $row_count['total_monitortouch'];
                        echo "Quantidade: $total_monitortouch";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
        <a href="SSD/index.php"> 
                <h3>SSD</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_ssd FROM equipamento WHERE categoria = 'ssd' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_ssd = $row_count['total_ssd'];
                        echo "Quantidade: $total_ssd";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
        <a href="Teclado/index.php"> 
                <h3>Teclado</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_teclado FROM equipamento WHERE categoria = 'teclado' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_teclado = $row_count['total_teclado'];
                        echo "Quantidade: $total_teclado";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
        <a href="Mouse/index.php"> 
                <h3>Mouse</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_mouse FROM equipamento WHERE categoria = 'mouse' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_mouse = $row_count['total_mouse'];
                        echo "Quantidade: $total_mouse";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
        <a href="UniFi/index.php"> 
                <h3>UniFi</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_unifi FROM equipamento WHERE categoria = 'unifi' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_unifi = $row_count['total_unifi'];
                        echo "Quantidade: $total_unifi";
                    }
                ?>

            </a>
        </div>

        <div class="card"> 
        <a href="Raspbarry/index.php"> 
                <h3>RaspBerry</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_raspbarry FROM equipamento WHERE categoria = 'Raspberry' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_raspbarry = $row_count['total_raspbarry'];
                        echo "Quantidade: $total_raspbarry";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
        <a href="Bateria/index.php"> 
                <h3>Bateria</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_bateria FROM equipamento WHERE categoria = 'bateria' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_bateria = $row_count['total_bateria'];
                        echo "Quantidade: $total_bateria";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
        <a href="Nobreak/index.php"> 
                <h3>Nobreak</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_nobreak FROM equipamento WHERE categoria = 'nobreak' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_nobreak = $row_count['total_nobreak'];
                        echo "Quantidade: $total_nobreak";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
        <a href="ColetorBluetooth/index.php"> 
                <h3>Coletor Bluetooth</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_coletorB FROM equipamento WHERE categoria = 'Coletor Bluetooth' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_coletorB = $row_count['total_coletorB'];
                        echo "Quantidade: $total_coletorB";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
        <a href="ColetorTouch/index.php"> 
                <h3>Coletor Touch</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_coletorT FROM equipamento WHERE categoria = 'Coletor Touch' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_coletorT = $row_count['total_coletorT'];
                        echo "Quantidade: $total_coletorT";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
            <a href="Leitor_BARCOD/index.php"> 
                <h3> Leitor BARCOD </h3>

                <?php 
                    $sql_count = "SELECT COUNT(*) AS total_leitor FROM equipamento WHERE categoria = 'leitor de barra' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_leitor = $row_count['total_leitor'];
                    echo "Quantidade:  $total_leitor";
                    }
                ?>
            </a>
        </div>
        <div class="card"> 
        <a href="Impressora/index.php"> 
                <h3> Impressora </h3>

                <?php 
                    $sql_count = "SELECT COUNT(*) AS total_impressora FROM equipamento WHERE categoria = 'impressora' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_impressora = $row_count['total_impressora'];
                    echo "Quantidade:  $total_impressora";
                    }
                ?>
            </a>
        </div>
        <div class="card"> 
        <a href="ImpressoraTermica/index.php"> 
                <h3> Impre. Termica</h3>

                <?php 
                    $sql_count = "SELECT COUNT(*) AS total_impressoraT FROM equipamento WHERE categoria = 'Impressora Térmica' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_impressoraT = $row_count['total_impressoraT'];
                    echo "Quantidade:  $total_impressoraT";
                    }
                ?>
            </a>
        </div>
        <div class="card"> 
            <a href="Etiquetadora/index.php">
                <h3> Etiquetadora</h3>

                <?php 
                    $sql_count = "SELECT COUNT(*) AS total_etiquetadora FROM equipamento WHERE categoria = 'etiquetadora' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_etiquetadora = $row_count['total_etiquetadora'];
                    echo "Quantidade:  $total_etiquetadora";
                    }
                ?>
            </a>
        </div>
        <div class="card"> 
            <a href="Switch/index.php"> 
                <h3> Switch </h3>

                <?php 
                    $sql_count = "SELECT COUNT(*) AS total_switch FROM equipamento WHERE categoria = 'Switch' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_switch = $row_count['total_switch'];
                    echo "Quantidade:  $total_switch";
                    }
                ?>
            </a>
        </div>
        <div class="card"> 
            <a href="RelogioDePonto/index.php"> 
                <h3> Relogio de Ponto </h3>

                <?php 
                    $sql_count = "SELECT COUNT(*) AS total_relogioP FROM equipamento WHERE categoria = 'Relogio De Ponto' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_relogioP = $row_count['total_relogioP'];
                    echo "Quantidade:  $total_relogioP";
                    }
                ?>
            </a>
        </div>
        <div class="card"> 
            <a href="WebCam/index.php"> 
                <h3>WebCam</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_webcam FROM equipamento WHERE categoria = 'webcam' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_webcam = $row_count['total_webcam'];
                        echo "Quantidade: $total_webcam";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
            <a href="Amplificador/index.php"> 
                <h3>Amplificador</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_amplificador FROM equipamento WHERE categoria = 'amplificador' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_amplificador = $row_count['total_amplificador'];
                        echo "Quantidade: $total_amplificador";
                    }
                ?>

            </a>
        </div>
        <div class="card"> 
            <a href="Transformador/index.php"> 
                <h3>Transformador</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_transformador FROM equipamento WHERE categoria = 'transformador' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_transformador = $row_count['total_transformador'];
                        echo "Quantidade: $total_transformador";
                    }
                ?>

            </a>
        </div>

        <div class="card"> 
        <a href="HD/index.php"> 
                <h3>HD</h3>

                <?php     
                    $sql_count = "SELECT COUNT(*) AS total_hd FROM equipamento WHERE categoria = 'hd' AND status = 'ativo' AND local = 'RJ-Centro'";
                    $result_count = mysqli_query($conexao, $sql_count);

                    if ($result_count) {
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_hd = $row_count['total_hd'];
                        echo "Quantidade: $total_hd";
                    }
                ?>

            </a>
        </div>

        <div class="cardInvisivel"> 
            <a href="#" class="invisivel">
                <h3>teste2</h3>
            </a>
        </div>
    </main>
</div>


    <script src="../../javascript/script.js"></script>
</body>
</html>
