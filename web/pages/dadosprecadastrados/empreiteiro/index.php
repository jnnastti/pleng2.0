<?php

    require('../../../../server/config/conexaosubpastas.php');
    require('../../../../server/config/redireciona.php');

    include('../../../../server/src/Empreiteiro.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }

    $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

    $empreiteiro = new Empreiteiro($db);

    $itemEmpreiteiro = $empreiteiro->listarEmpreiteiro();
    $info = (isset($_GET['id'])) ? $empreiteiro->selecionarEmpreiteiro($_GET['id']) : '';

    switch($action) {
        
        case 'deletar': {
            $empreiteiro->deletarEmpreiteiro($_POST['id']);

            redireciona('./index.php');
            break;
        }

        case 'cadastrar': {
            $empreiteiro->cadastrarEmpreiteiro($_POST['nome']);
            redireciona('./index.php');

            break;
        }

        case 'editar': {
            $empreiteiro->editarEmpreiteiro($_POST['nome'], $_POST['id']);
            redireciona('./index.php');

            break;
        }

        case 'filtrar': {
            $itemEmpreiteiro = $empreiteiro->listarEmpreiteiroComFiltro("%".strtoupper($_POST['filtro'])."%");
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

        <title> PLENG | Empreiteiros </title>
    </head>

    <body>
        
        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>

        <main class="container">
            <h1> Edite um empreiteiro ou cadastre um novo </h1>

            <section class="pesquisa grid-12">
                <div class="grid-3">
                    <a href="#cadastrarModal">
                        <button> Cadastrar empreiteiro </button>
                    </a>
                </div>
                <div class="grid-6">
                    <form method="POST" action="./index.php?action=filtrar">
                        <input type="text" name="filtro" placeholder="Nome do empreiteiro" />
                        <button type="submit"> <i class="gg-search"></i> </button>
                    </form>
                </div>
            </section>

            <section class="grid-12">

                <?php while($emp = $itemEmpreiteiro->fetchArray()) : ?>

                    <div class="emp grid-12">
                        <label> <?= $emp['nome']; ?> </label>

                        <a href="?id=<?= $emp['idempreiteiro'];?>#editarModal">
                            <button type="button" class="btnEditar"> Editar </button>
                        </a>
                        <a href="?idemp=<?= $emp['idempreiteiro'];?>#deletarModal">
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