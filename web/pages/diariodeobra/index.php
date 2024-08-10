<?php

    require('../../../server/config/conexao.php');
    require('../../../server/config/redireciona.php');

    include('../../../server/src/DiarioDeObra.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }

    if(!isset($_SESSION['projeto'])) {
        redireciona('../projetos/index.php');

        return;
    }

    $diarios = new DiarioDeObra($db);

    $itemDiario = $diarios->listarDiario($_SESSION['projeto']);

    $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

    if($action == 'filtrar') {

        $itemDiario = $diarios->listarDiarioFiltrado($_SESSION['projeto'], $_POST['nomeDiario'], $_POST['dataDiario']);

        $action = '';
    } else if($action == 'deletar') {
        $diarios->excluirDiario($_POST['id']);
        
        redireciona('./index.php');
    }

?>

<html>
    <head>
        <?php 
            include('../../assets/cmp/principal/head.php');
        ?>

        <link href="../../assets/styles/formulario.css" rel="stylesheet" />
        <link href="../../assets/styles/stylePopup.css" rel="stylesheet" />

        <title> PLENG | Diário de obra </title>
    </head>

    <body>
        <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <h1> Selecione um diário de obra ou inicie um novo </h1>

            <section class="pesquisa grid-12">
                <div class="grid-3">
                    <a href="./formulario/index.php"><button> Cadastrar diário </button></a>
                </div>
                <div class="grid-6">
                    <form method="POST" action="./index.php?action=filtrar">
                        <input type="text" placeholder="Nome do diário" name="nomeDiario" />
                        <input type="date" name="dataDiario" />
                        <button> <i class="gg-search"></i> </button>
                    </form>
                </div>
            </section>

            <section class="grid-12">

                <?php while($diario = $itemDiario->fetchArray()) : ?>
                <div class="diario grid-12">
                    <label> <?= $diario['nome']; ?> </label>
                    <input type="date" value="<?= $diario['datadiario']; ?>" />

                    <a href="./formulario/index.php?id=<?= $diario['iddiario'];?>">
                        <button type="button" class="btnVerMais"> Ver mais </button>
                    </a>
                    <a href="../../../server/relatorios/DiarioDetalhado.php?id=<?=$diario['iddiario']?>">
                        <button type="button" class="btnImprimir" title="Imprimir relatório"> 
                            <i class="fa gg-file"></i> 
                        </button>
                    </a>
                    <a href="?id=<?= $diario['iddiario']?>#deletarModal">
                        <button type="button" class="btnExcluir" title="Excluir"> x </button>
                    </a>
                </div>
                <?php endwhile; ?>
            </section>

            
            <!-- popup de deletar -->
            <div id="deletarModal" class="modalDialog">
                <div>
                    <a href="#" title="Close" class="close">
                        <div class="close-container">
                            <div class="leftright"></div>
                            <div class="rightleft"></div>
                        </div>
                    </a>
                    <h2>Deseja excluir esse diário?</h2>
                    <p>Uma vez deletado, todos os dados relacionados ao mesmo serão apagados e não poderão mais ser recuperados.</p>

                    <form method="POST" action="./index.php?action=deletar">
                        <fieldset class="btn">
                            <input type="hidden" name="id" value="<?= $_GET['id']; ?>" />
                            <div class="items">
                                <div class="item">
                                    <a href="#"><button type="button" class="btnSecundario"> Cancelar </button></a>
                                </div>
                                <div class="item">
                                    <button type="submit" class="btnPrincipal"> Deletar </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>

        </main>
    </body>
</html>