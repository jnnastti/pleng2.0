<?php

    require('../../../../server/config/conexaosubpastas.php');
    require('../../../../server/config/redireciona.php');

    include('../../../../server/src/Projeto.php');
    include('../../../../server/src/Empreiteiro.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../../login/login.php');

        return;
    }

    if(!isset($_SESSION['projeto'])) {
        redireciona('../../projetos/index.php');

        return;
    }

    $projetos = new Projeto($db);
    $empreiteiros = new Empreiteiro($db);

    $itemEmpreiteiro = $empreiteiros->listarEmpreiteiro();

    $projeto = $projetos->selecionarProjeto($_SESSION['projeto']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

        if($action == "deletar") {
            $projetos->deletarProjeto($_POST['id']);

            unset($_SESSION['projeto']);
            
            redireciona('../../projetos/index.php');
        } else {
            $projetoDados = (object) array (
                'nome' => $_POST['nome'],
                'descricao' => $_POST['descricao'],
                'endereco' => $_POST['endereco'],
                'dataini' => $_POST['data_inicio'],
                'qtdedias' => $_POST['qtde_dias'],
                'idempreiteiro' => $_POST['empreiteiro'],
                'projeto' => $_SESSION['projeto']
            );
    
            // var_dump($projetoDados);
            $projetos->editarProjeto($projetoDados);
    
            $_SESSION['nomeProjeto'] = $projetoDados->nome;
            
            redireciona('../../menu/index.php');
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

        <title> PLENG | Editar infromações do projeto </title>
    </head>

    <body>

        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>

        <main class="container">
            <h1> Configurar projeto </h1>
            <section class="grid-9">
                <form class="layout" method="POST" action="./index.php">
                    <input name="nav" type="radio" class="nav home-radio" id="home" checked="checked" />
                    <div class="page home-page">
                        <div class="page-contents">
                            <h1>Nome e descrição</h1>

                            <fieldset>
                                <label> Nome: </label>
                                <input type="text" name="nome" value="<?= $projeto['nome']; ?>"/>
                            </fieldset>
        
                            <fieldset>
                                <label> Descrição: </label>
                                <textarea name="descricao"><?= $projeto['descricao']; ?></textarea>
                            </fieldset>

                        </div>
                    </div>
                    <label class="nav" for="home">
                        <span> Nome e descrição </span>
                    </label>

                    <input name="nav" type="radio" class="about-radio" id="about" />
                    <div class="page about-page">
                        <div class="page-contents">
                            <h1>Localização</h1>

                            <div class="items">
                                <div class="item">
                                    <fieldset>
                                        <label> Estado: </label>  
                                        <input readOnly type="text" value="<?= $projeto['estado']; ?>" />
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Cidade: </label>  
                                        <input readOnly type="text" value="<?= $projeto['cidade']; ?>" />
                                    </fieldset>
                                </div>
                            </div>
        
                            <fieldset>
                                <label> Endereço: </label>
                                <input type="text" name="endereco" value="<?= $projeto['endereco']?>"/>
                            </fieldset>
                        </div>
                    </div>
                    <label class="nav" for="about">
                        <span> Localização </span>
                    </label>

                    <input name="nav" type="radio" class="contact-radio" id="contact" />
                    <div class="page contact-page">
                        <div class="page-contents">
                            <h1>Empreiteiro e datas</h1>
                            <fieldset>
                                <label> Empreiteiro: </label>
                                <select name="empreiteiro">
                                <?php while($emp = $itemEmpreiteiro->fetchArray()) : ?>
                                <option 
                                    value="<?= $emp['idempreiteiro']; ?>
                                    <?php
                                        if($emp['idempreiteiro'] === $projeto['idempreiteiro']) {
                                            echo "selected";
                                        }
                                    ?>
                                ">
                                    <?= $emp['nome']; ?>
                                </option>
                            <?php endwhile; ?>
                                </select>
                            </fieldset>
        
                            <div class="items">
                                <div class="item">
                                    <fieldset>
                                        <label> Data de início: </label>
                                        <input value="<?= $projeto['dataini']; ?>" type="date" id="dataIni" class="grid-10" name="data_inicio" onchange="calculaDias();" />
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Quantidade de dias: </label>
                                        <input value="<?= $projeto['qtdedias']; ?>"type="text" id="qtdeDias" class="grid-12" name="qtde_dias" readonly />
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="nav" for="contact">
                        <span> Empreiteiro e datas </span>
                    </label>

                    <div class="buttons">
                        <button type="submit"> Salvar </button>
                        <a href="?id=<?= $projeto['idprojeto']?>#deletarModal"><button type="button" class="btnExcluir"> Excluir </button></a>
                    </div>
                </form>
            </section>
        </main>

        
        <!-- popup de deletar -->
        <div id="deletarModal" class="modalDialog">
            <div>
                <a href="#" title="Close" class="close">
                    <div class="close-container">
                        <div class="leftright"></div>
                        <div class="rightleft"></div>
                    </div>
                </a>
                <h2>Deseja excluir esse projeto?</h2>
                <p>Uma vez deletado, todos os dados relacionados ao mesmo serão apagados e não poderão mais ser recuperados.</p>

                <form method="POST" action="./index.php?action=deletar">
                    <fieldset class="btn">
                        <input type="hidden" name="id" value="<?= $projeto['idprojeto']; ?>" />
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

    </body>

    <script src="./main.js"></script>
</html>