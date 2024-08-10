<?php

    require('../../../server/config/conexao.php');
    require('../../../server/config/redireciona.php');

    include('../../../server/src/Projeto.php');

    include('../../../server/src/LevantamentoInicial.php');
    include('../../../server/src/DiarioDeObra.php');
    include('../../../server/src/EtapaDiario.php');
    include('../../../server/src/PrevisaoTempo.php');
    include('../../../server/src/MaterialEtapaDiario.php');
    
    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }

    $projetos = new Projeto($db);
    
    $itemProjeto = $projetos->listarProjetos($_SESSION['usuario']);

    $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

    if($action == 'filtrar') {
        $itemProjeto = $projetos->listarProjetosFiltrado($_SESSION['usuario'], "%".strtoupper($_POST['filtro'])."%");
        $action = '';
    } else if($action == 'duplicar') {
        $lev = new LevantamentoInicial($db);
        $diarioObra = new DiarioDeObra($db);

        $projDuplicado = $projetos->duplicarProjeto($_GET['id'], $_SESSION['usuario']);

        $lev->duplicarLevantamento($_GET['id'], $projDuplicado);

        $diarioObra->duplicarDiarioDeObra($_GET['id'], $projDuplicado);

        //redireciona('../menu/index.php?id=' . $projDuplicado);
    }
?>

<html>
    <head>

        <?php 
            include('../../assets/cmp/principal/head.php');
        ?>

        <title> PLENG | Seus projetos </title>
    </head>
    <body onload="limparRota()">

        <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <h1> Selecione seu projeto ou inicie um novo </h1>

            <section class="pesquisa grid-12">
                <div class="grid-3">
                    <a href="./formulario/index.php">
                        <button> Cadastrar projeto </button>
                    </a>
                </div>
                <div class="grid-6">
                    <form method="POST" action="./index.php?action=filtrar">
                        <input type="text" name="filtro" placeholder="Nome do seu projeto" />
                        <button type="submit"> <i class="gg-search"></i> </button>
                    </form>
                </div>
            </section>

            <section class="projetos grid-12">
            
                <?php while($proj = $itemProjeto->fetchArray()) : ?>

                    <div class="grid-3">
                        <h3> <?= $proj['nome']; ?> </h3>
                        <p><b> Local: </b> <?= $proj['endereco']; ?> </p>
                        <a href="../menu/index.php?id=<?= $proj['idprojeto']?>">
                            <button type="button"> Selecionar </button>
                        </a>
                        <a href="./index.php?action=duplicar&id=<?= $proj['idprojeto']?>">
                            <button class="duplicar" type="button"> Duplicar </button>
                        </a>
                    </div>

                <?php endwhile; ?>
            </section>
        </main>
    </body>

    <script src="main.js"></script>
</html>