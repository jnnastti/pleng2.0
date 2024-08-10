<?php

    require('../../../../server/config/conexaosubpastas.php');
    require('../../../../server/config/redireciona.php');

    include('../../../../server/src/Etapa.php');
    include('../../../../server/src/Material.php');
    include('../../../../server/src/MaterialEtapa.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }

    $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

    $etapa = new Etapa($db);
    $material = new Material($db);
    $materialEtapa = new MaterialEtapa($db);

    $itemEtapa = $etapa->listarEtapa();
    $itemMaterial = $material->listarMaterial();

    $info = (isset($_GET['id'])) ? $etapa->selecionarEtapaEspecifica($_GET['id']) : '';

    $listaMaterialEtapa = (isset($_GET['id'])) ? $materialEtapa->selecionarMateriaisEtapa($_GET['id']) : '';

    switch($action) {
        
        case 'deletar': {
            $etapa->deletarEtapa($_POST['id']);

            redireciona('./index.php');
            break;
        }

        case 'cadastrar': {
            $materiais = explode("\\", $_POST['matValue']);

            $etapa->cadastrarEtapa($_POST['nome'], $materiais);

            redireciona('./index.php');

            break;
        }

        case 'editar': {
            $materiais = explode("\\", $_POST['matValueEdit']);

            $etapa->editarEtapa($_POST['nome'], $_POST['id'], $materiais);
            
            redireciona('./index.php');

            break;
        }

        case 'filtrar': {
            $itemEtapa = $etapa->listarEtapaComFiltro("%".strtoupper($_POST['filtro'])."%");
            $action = '';
        }
    }
?>

<html>
    <head>

        <?php 
            include('../../../assets/cmp/subpastas/head.php');
        ?>

        <link href="../../../assets/styles/formulario.css" rel="stylesheet" />
        <link href="../../../assets/styles/stylePopup.css" rel="stylesheet" />

        <title> PLENG | Etapas </title>

    <script src="./main.js"></script>

    </head>

    <body>
        
        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>
        
        <main class="container">
            <h1> Edite uma etapa ou cadastre uma nova </h1>

            <section class="pesquisa grid-12">
                <div class="grid-3">
                <a href="#cadastrarModal">
                        <button> Cadastrar etapa </button>
                    </a>
                </div>
                <div class="grid-6">
                    <form method="POST" action="./index.php?action=filtrar">
                        <input type="text" name="filtro" placeholder="Nome da etapa" />
                        <button type="submit"> <i class="gg-search"></i> </button>
                    </form>
                </div>
            </section>

            <section class="grid-12">

                <?php while($etp = $itemEtapa->fetchArray()) : ?>
                    <div class="etapa grid-12">
                        <label> <?= $etp['nome']; ?> </label>

                        <a href="?id=<?= $etp['idetapa'];?>#editarModal">
                            <button type="button" class="btnEditar"> Editar </button>
                        </a>
                        <a href="?idetapa=<?= $etp['idetapa'];?>#deletarModal">
                            <button type="button" class="btnExcluir" title="Excluir"> 
                                <img src="../../../assets/imgs/minus.svg"/> 
                            </button>
                        </a>
                    </div> 
                <?php endwhile; ?>
            </section>

            <?php require('./popups.php');?>

        </main>
    </body>
</html>