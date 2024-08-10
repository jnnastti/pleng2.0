<!-- https://codepen.io/Podgro/pen/eWWYrL -->
<?php

    require('../../../server/config/conexao.php');
    require('../../../server/config/redireciona.php');

    include('../../../server/src/Pasta.php');
    include('../../../server/src/Galeria.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }

    if(!isset($_SESSION['projeto'])) {
        redireciona('../projetos/index.php');

        return;
    }

    $Pastas = new Pasta($db);
    $Galeria = new Galeria($db);

    $itemPasta = $Pastas->listarPastas($_SESSION['projeto']);

    $itemGaleria = $Galeria->selecionarUltimasFotos($_SESSION['projeto']);

    $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

    switch($action) {

        case 'cadastrar': {
            $Pastas->cadastrarPasta($_POST['nome'], $_SESSION['projeto']);
            redireciona('./index.php');

            break;
        }

        case 'filtrar': {
            $itemPasta = $Pastas->listarPastasFiltrada($_SESSION['projeto'], "%".strtoupper($_POST['filtro'])."%");
            $action = '';

            break;
        }
    }

?>


<html>
    <head>

        <?php 
            include('../../assets/cmp/principal/head.php');
        ?>

        <link rel="stylesheet" href="https://cdn.es.gov.br/fonts/font-awesome/css/font-awesome.min.css">

        <link href="../../assets/styles/formulario.css" rel="stylesheet" />
        <link href="../../assets/styles/stylePopup.css" rel="stylesheet" />

        <title> PLENG | Galeria do projeto </title>
    </head>

    <body>

        <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <h1> Galeria </h1>

            <section class="pesquisa grid-12">
                <div class="grid-3">
                    <a href="#cadastrarModal">
                        <button> Cadastrar pasta </button>
                    </a>
                </div>
                <div class="grid-6">
                    <form method="POST" action="./index.php?action=filtrar">
                        <input type="text" name="filtro" placeholder="Nome da pasta" />
                        <button type="submit"> <i class="gg-search"></i> </button>
                    </form>
                </div>
            </section>

            <section class="grid-12">
                <section class="grid-8">
                    <?php while($pasta = $itemPasta->fetchArray()) : ?>
                        <div class="folder">
                            <a href="./pasta/index.php?id=<?= $pasta['idpasta']; ?>">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            </a>
                            <p><?= $pasta['nome']; ?></p>
                        </div>

                    <?php endwhile; ?>
                    
                </section>
                <section class="lista grid-4">
                    <div class="item"><h3> últimos arquivos adicionados </h3></div>

                    <?php while($item = $itemGaleria->fetchArray()) : ?>
                        <div class="item">
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            <p><?= $item['pasta']; ?>/<?= $item['nome']; ?><?= substr($item['foto'], strpos($item['foto'], '.')); ?></p>
                        </div>
                    <?php endwhile; ?>
                </section>
            </section>
            
        </main>

        <!-- popup de cadastrar -->
        <div id="cadastrarModal" class="modalDialog">
            <div>
                <a href="#" title="Close" class="close">
                    <div class="close-container">
                        <div class="leftright"></div>
                        <div class="rightleft"></div>
                    </div>
                </a>
                <h2>Pasta</h2>

                <form method="POST" action="./index.php?action=cadastrar">
                    <fieldset>
                        <input type="text" name="nome" placeholder="Nome da pasta" />
                    </fieldset>
                    
                    <div class="items">
                        <div class="item">
                            <a href="#"><button type="button" class="btnSecundario"> Cancelar </button></a>
                        </div>
                        <div class="item">
                            <button type="submit" class="btnPrincipal"> Cadastrar </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>