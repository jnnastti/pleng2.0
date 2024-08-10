<?php

    require('../../../server/config/conexao.php');
    require('../../../server/config/redireciona.php');

    include('../../../server/src/Projeto.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }
    if(!isset($_GET['id']) && !isset($_SESSION['projeto'])) {
        redireciona('../projetos/index.php');

        return;
    }

    if(isset($_GET['id'])) {
        $_SESSION['projeto'] = $_GET['id'];
    }
   
    $projetos = new Projeto($db);
    
    $projeto = $projetos->selecionarProjeto($_SESSION['projeto']);

    $_SESSION['nomeProjeto'] = $projeto['nome'];
?>

<html>
    <head>

        <?php 
            include('../../assets/cmp/principal/head.php');
        ?>

        <title> PLENG | Planejando um futuro melhor ao seu lado </title>
    </head>

    <body onload="limparRota()">

        <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <h1> Projeto: <?= $projeto['nome']; ?> </h1>

            <section class="grid-12">
                <a class="grid-3" href="../configurar/projeto/index.php">
                    <div class="grid-12"> <i class="fa gg-toolbox"></i> <span> Configurar </span> </div>
                </a>
                <a class="grid-3" href="">
                    <div class="grid-12"> <i class="fa gg-trello"></i> <span> Dashboards </span> </div>
                </a>
                <a class="grid-3" href="../relatorio/index.php">
                    <div class="grid-12"> <i class="fa gg-file"></i> <span> Relatórios </span> </div>
                </a>
                <a class="grid-3" href="../orcamento/index.php">
                    <div class="grid-12"> <i class="fa gg-calculator"></i> <span> Orçamento </span> </div>
                </a>
                <a class="grid-3" href="../levantamentoinicial/index.php">
                    <div class="grid-12"> <i class="fa gg-album"></i> <span> Levantamento inicial </span> </div>
                </a>
                <a class="grid-3" href="../diariodeobra/index.php">
                    <div class="grid-12"> <i class="fa gg-list"></i> <span> Diário de obras </span> </div>
                </a>
                <a class="grid-3" href="">
                    <div class="grid-12"> <i class="fa gg-calendar-today"></i> <span> Cronograma </span> </div>
                </a>
                <a class="grid-3" href="../galeria/index.php">
                    <div class="grid-12"> <i class="fa gg-image"></i> <span> Galeria </span> </div>
                </a>
                <a class="grid-3" href="../dadosprecadastrados/index.php">
                    <div class="grid-12"> <i class="fa gg-terminal"></i> <span> Dados pré-cadastrados </span> </div>
                </a>
            </section>
        </main>
    </body>

    <script src="main.js"></script>

</html>