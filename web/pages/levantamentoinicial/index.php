<?php

    require('../../../server/config/conexao.php');
    require('../../../server/config/redireciona.php');

    include('../../../server/src/LevantamentoInicial.php');
    include('../../../server/src/Etapa.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }
    if(!isset($_SESSION['projeto'])) {
        redireciona('../projetos/index.php');

        return;
    }

    $levantamentos = new LevantamentoInicial($db);
    
    $levantamentoAndamento = $levantamentos->listarLevantamentoInicialAndamento($_SESSION['projeto']);
    $levantamentoFinalizado = $levantamentos->listarLevantamentoInicialFinalizado($_SESSION['projeto']);
    $levantamentoNaoIniciado = $levantamentos->listarLevantamentoInicialNaoIniciado($_SESSION['projeto']);

    $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

    $info = (isset($_GET['id'])) ? $levantamentos->selecionarLevantamentoInicial($_GET['id']) : '';

    switch($action) {
        
        case 'deletar': {
            $levantamentos->deletarLevantamentoInicial($_GET['id']);

            redireciona('./index.php');
            break;
        }


        case 'editar': {
            $etapaDados = (object) array (
                'idlevantamento' => $_POST['id'],
                'situacao' => $_POST['situacao'],
                'descricao' => $_POST['descricao'],
                'tamanhototal' => $_POST['tamanhoTotal']
            );
    
            $levantamentos->editarLevantamentoInicial($etapaDados);
    
            redireciona('./index.php');

            break;
        }

        case 'filtrar': {
            if($_POST['etapa'] !== "") {
                $levantamentoAndamento = $levantamentos->listarLevantamentoInicialAndamentoFiltrado($_SESSION['projeto'], $_POST['etapa']);
                $levantamentoFinalizado = $levantamentos->listarLevantamentoInicialFinalizadoFiltrado($_SESSION['projeto'], $_POST['etapa']);
                $levantamentoNaoIniciado = $levantamentos->listarLevantamentoInicialNaoIniciadoFiltrado($_SESSION['projeto'], $_POST['etapa']);
                $action = '';
            }

            break;
        }
    }

    $etapas = new Etapa($db);

    $etapa = $etapas->listarEtapa();
?>

<html>
    <head>

        <link href="../../assets/styles/stylePopup.css" rel="stylesheet" />
        <link href="../../assets/styles/formulario.css" rel="stylesheet" />

        <?php 
            include('../../assets/cmp/principal/head.php');
        ?>

        <link href='https://css.gg/check-r.css' rel='stylesheet'>
        <link href='https://css.gg/sand-clock.css' rel='stylesheet'>
        <link href='https://css.gg/user-list.css' rel='stylesheet'>

        <title> PLENG | Levantamento inicial </title>
    </head>

    <body>
        
         <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <section class="grid-8">
                <h1> Levantamento inicial do projeto </h1>
                <p>
                    Aqui você pode verificar e editar todas as etapas cadastradas 
                    no levantamento inicial do projeto. Você pode altera-lo a qualquer 
                    momento e registrar uma nova etapa durante seu desenvolvimento 
                    caso seja necessário.
                </p>
            </section>

            <section class="pesquisa grid-12">
                <div class="grid-3">
                    <a href="../configurar/levantamentoinicial/index.php"><button> Nova etapa </button></a>
                </div>
                <div class="grid-6">
                    <form method="POST" action="./index.php?action=filtrar">
                    <select name="etapa">
                        <option value=""> Etapa </option>
                        <?php while($etp = $etapa->fetchArray()) : ?>
                            <option value="<?= $etp['idetapa']?>"> <?= $etp['nome']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <button type="submit"> <i class="gg-search"></i> </button>
                    </form>
                </div>
            </section>

            <section class="grid-12 cont">
                <h3> Etapas em andamento </h3>
                <div class="etapas">

                    <?php while($liAndamento = $levantamentoAndamento->fetchArray()) : ?>
                        <a class="grid-3" href="?id=<?= $liAndamento['idlevantamento']; ?>#editarModal">
                            <div> 
                                <i class="fa gg-user-list"></i> 
                                <span> <?= $liAndamento['nome']; ?> </span> 
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
                <h3> Etapas não iniciadas </h3>
                <div class="etapas">
                    <?php while($liNaoIniciado = $levantamentoNaoIniciado->fetchArray()) : ?>
                        <a class="grid-3" href="?id=<?= $liNaoIniciado['idlevantamento']; ?>#editarModal">
                            <div> 
                                <i class="fa gg-sand-clock"></i> 
                                <span> <?= $liNaoIniciado['nome']; ?> </span> 
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
                <h3> Etapas finalizadas </h3>
                <div class="etapas">
                    <?php while($liFinalizado = $levantamentoFinalizado->fetchArray()) : ?>
                        <a class="grid-3" href="?id=<?= $liFinalizado['idlevantamento']; ?>#editarModal">
                            <div> 
                                <i class="fa gg-check-r"></i> 
                                <span> <?= $liFinalizado['nome']; ?> </span> 
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            </section>

            <!-- popup de editar -->
            <div id="editarModal" class="modalDialog">
                <div>
                    <a href="#" title="Close" class="close">
                        <div class="close-container">
                            <div class="leftright"></div>
                            <div class="rightleft"></div>
                        </div>
                    </a>
                    <h2>Etapa</h2>

                    <form method="POST" action="./index.php?action=editar">
                        <input type="hidden" name="id" value="<?= $_GET['id']; ?>" />

                        <fieldset>
                            <label> Descrição </label>
                            <textarea name="descricao"> <?= $info['descricao']; ?> </textarea>
                        </fieldset>
                        
                        <div class="items">
                            <div class="item">
                                <fieldset>
                                    <label> Tamanho atual </label>
                                    <select name="situacao">
                                        <option <?= ($info['situacao']) == 'A' ? 'selected' : ""; ?> value="A"> Andamento </option>
                                        <option <?= ($info['situacao']) == 'N' ? 'selected' : ""; ?> value="N"> Não iniciada </option>
                                        <option <?= ($info['situacao']) == 'F' ? 'selected' : ""; ?> value="F"> Finalizada </option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="item">
                                <fieldset>
                                    <label> Tamanho total </label>
                                    <input type="text" name="tamanhoTotal" value="<?= $info['tamanho_total']; ?>" />
                                <fieldset>    
                            </div>
                        </div>

                        <div class="items">
                            <div class="item">
                                <a href="?action=deletar&id=<?= $_GET['id']; ?>"><button type="button" class="btnExcluir"> Excluir </button></a>
                            </div>
                            <div class="item">
                                <button type="submit" class="btnPrincipal"> Editar </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </body>
</html>