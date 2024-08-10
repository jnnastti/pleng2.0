<?php

    require('../../../../server/config/conexaosubpastas.php');
    require('../../../../server/config/redireciona.php');

    include('../../../../server/src/Material.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }

    $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

    $material = new Material($db);

    $itemMaterial = $material->listarMaterial();
    $info = (isset($_GET['id'])) ? $material->selecionarMaterial($_GET['id']) : '';

    switch($action) {
        
        case 'deletar': {
            $material->deletarMaterial($_POST['id']);

            redireciona('./index.php');
            break;

        }

        case 'cadastrar': {
            $materialDados = (object) array (
                'nome' => $_POST['nome'],
                'unidade' => $_POST['unidade']
            );

            $material->cadastrarMaterial($materialDados);
            redireciona('./index.php');

            break;
        }

        case 'editar': {
            $materialDados = (object) array (
                'nome' => $_POST['nome'],
                'unidade' => $_POST['unidade'],
                'idmat' => $_POST['id']
            );

            $material->editarMaterial($materialDados);
            redireciona('./index.php');

            break;
        }

        case 'filtrar': {
            $itemMaterial = $material->listarMaterialComFiltro("%".strtoupper($_POST['filtro'])."%");
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

        <title> PLENG | Materiais </title>
    </head>

    <body>
        
        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>

        <main class="container">
            <h1> Edite um material ou cadastre um novo </h1>

            <section class="pesquisa grid-12">
                <div class="grid-3">
                    <a href="#cadastrarModal"><button> Cadastrar material </button></a>
                </div>
                <div class="grid-6">
                <form method="POST" action="./index.php?action=filtrar">
                    <input type="text" name="filtro" placeholder="Nome do material" />
                    <button type="submit"> <i class="gg-search"></i> </button>
                </form>
                </div>
            </section>

            <section class="grid-12">

                <?php while($mat = $itemMaterial->fetchArray()) : ?>

                    <div class="mat grid-12">
                        <label> <?= $mat['nome']; ?> </label>

                        <a href="?id=<?= $mat['idmat'];?>#editarModal">
                            <button type="button" class="btnEditar"> Editar </button>
                        </a>
                        <a href="?idmat=<?= $mat['idmat'];?>#deletarModal">
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