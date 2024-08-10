<!-- https://codepen.io/Podgro/pen/eWWYrL -->
<?php

    require('../../../server/config/conexao.php');
    require('../../../server/config/redireciona.php');

    include('../../../server/src/LevantamentoInicial.php');
    include('../../../server/src/Orcamento.php');
    include('../../../server/src/MaterialEtapa.php');
    include('../../../server/src/Galeria.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }

    if(!isset($_SESSION['projeto'])) {
        redireciona('../projetos/index.php');

        return;
    }

    $levantamentos = new LevantamentoInicial($db);

    $orcamentos = new Orcamento($db);

    $materialEtapa = new MaterialEtapa($db);

    $galeria = new Galeria($db);

    $etapas = $levantamentos->listarLevantamento($_SESSION['projeto']);

    $listaLogo = $galeria->selecionarFotosLogo($_SESSION['projeto']);

    $listaMaterialEtapa = (isset($_GET['id'])) ? $materialEtapa->selecionarMateriaisEtapa($_GET['id']) : '';

    $info = (isset($_GET['idmat'])) ? $orcamentos->selecionarOrcamento($_GET['idmat']) : '';
    
    $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

    switch($action) {
        
        case 'cadastrar': {
            $orcamentoDados = (object) array (
                "idlevantamento" => $_POST['idlevantamento'],
                "idmaterial" => $_POST['material'],
                "qtde_comprada" => $_POST['qtde_comprada'],
                "qtde_faltante" => $_POST['qtde_faltante'],
                "fornecedor" => $_POST['fornecedor'],
                "data_compra" => $_POST['data_compra'],
                "valor_compra" => $_POST['valor_compra']
            );

            $orcamentos->cadastrarOrcamento($orcamentoDados);

            redireciona('./index.php');
            break;
        }

        case 'editar': {
            $orcamentoDados = (object) array (
                "idorcamento" => $_POST['idorcamento'],
                "fornecedor" => $_POST['fornecedor'],
                "qtde_comprada" => $_POST['qtde_comprada'],
                "qtde_faltante" => $_POST['qtde_faltante'],
                "valor_compra" => $_POST['valor_compra'],
                "data_compra" => $_POST['data_compra']
            );

            $orcamentos->editarOrcamento($orcamentoDados);

            redireciona('./index.php');
            break;
        }

        case 'deletar': {
            $orcamentos->deletarOrcamento($_POST['id']);

            redireciona('./index.php');
            break;

        }

        case 'filtrar': {
            if($_POST['etapa'] !== "") {
                $etapas = $levantamentos->listarLevantamentoFiltrado($_SESSION['projeto'], $_POST['etapa']);
                $action = '';
            }
            break;
        }

        case 'relatorio': {
            redireciona('../../../server/relatorios/' .$_POST['nomerel']. '.php?foto=' . $_POST['foto'] . '&id=' . $_POST['id']);
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
        <link href="../../assets/styles/stylePopup.css" rel="stylesheet" />
        <link href="../../assets/styles/formulario.css" rel="stylesheet" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <title> PLENG | Orçamento do projeto </title>
    </head>

    <body>

        <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <h1> Orçamento </h1>

            <section class="pesquisa grid-12">
                <form class="grid-6" method="POST" action="./index.php?action=filtrar">
                    <select name="etapa">
                        <option value=""> Etapa </option>
                        <?php while($etp = $etapas->fetchArray()) : ?>
                            <option value="<?= $etp['idetapa']?>"> <?= $etp['nome']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <button type="submit"> <i class="gg-search"></i> </button>
                </form>
            </section>
            
            <section class="grid-12">
            
                <?php while($etp = $etapas->fetchArray()) : ?>
                    <div  class="item grid-12" onclick="onMostrarMateriais(<?= $etp['idlevantamento']?>)">
                    <div class="orc">
                        <label> <?= $etp['nome']?> </label>
    
                        <div>
                            <a href="?nomerel=OrcamentoDetalhado&id=<?= $etp['idlevantamento']; ?>#logoModal">
                                <button type="button" title="Imprimir orçamento"> 
                                    <i class="gg-file"></i> 
                                </button>
                            </a>
                            <a href="?id=<?= $etp['idlevantamento']; ?>#cadastrarModal">
                                <button  type="button" title="Adicionar novo material">
                                    <i class="gg-add-r"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    
                    <div id="collapse<?= $etp['idlevantamento'] ?>" class="collapse">
                        <div class="mat">
                            <label> <b> nome material </b> </label>

                            <div class="meio">
                                <label> <b> comp. </b> </label>
                                <label> <b> falt. </b> </label>
                                <label> <b> data compra </b> </label>
                                <label> <b> valor </b> </label>
                            </div>

                            <div>
                            </div>

                            <?php 
                                $materiais = $orcamentos->listarOrcamento($etp['idlevantamento']);

                                while($mat = $materiais->fetchArray()):
                            ?>
                                <label> <?= $mat['nome']; ?> </label>

                                <div class="meio">
                                    <label> <?= $mat['qtde_comprada']; ?> </label>
                                    <label> <?= $mat['qtde_faltante']; ?> </label>
                                    <label> <?= date('d/m/Y', strtotime($mat['data_compra'])); ?> </label>
                                    <label> R$ <?= number_format($mat['valor_compra'], 2, ',', '.') ?> </label>
                                </div>

                                <div>
                                    <a href="?idmat=<?= $mat['idorcamento']; ?>#editarModal"><button> e </button></a>
                                    <a href="?idmat=<?= $mat['idorcamento']; ?>#deletarModal"><button class="btnSecundario"> x </button></a>
                                </div>
                            <?php endwhile; ?>
                        </div>


                    </div>
                </div>
                <?php endwhile; ?>
            </section>

            <?php include('./popups.php'); ?>
        </main>
    </body>

    <script src="./main.js"></script>
</html>