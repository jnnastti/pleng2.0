<?php

    require('../../../server/config/conexao.php');
    require('../../../server/config/redireciona.php');

    include('../../../server/src/Galeria.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }
    if(!isset($_SESSION['projeto'])) {
        redireciona('../projetos/index.php');

        return;
    }

    $galeria = new Galeria($db);

    $listaLogo = $galeria->selecionarFotosLogo($_SESSION['projeto']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if($_POST['origem'] == 'ano') {
            $ano = (!empty($_POST['ano'] )) ? $_POST['ano']  : '0';
            redireciona('../../../server/relatorios/' .$_POST['nomerel']. '.php?foto=' . $_POST['foto'] . '&data=' . $ano);
        } else if($_POST['origem'] == 'mes') {
            redireciona('../../../server/relatorios/' .$_POST['nomerel']. '.php?foto=' . $_POST['foto'] . '&data=' . $_POST['mes']);
        }

        if($_POST['nomerel'] == 'OrcamentoMes' || $_POST['nomerel'] == 'OrcamentoAno') {
            redireciona('./index.php?nomerel=' . $_POST['nomerel'] . '&foto=' . $_POST['foto'] . '#' . $_POST['nomerel']. 'Modal');
        } else {
            redireciona('../../../server/relatorios/' .$_POST['nomerel']. '.php?foto=' . $_POST['foto']);
        }
        
    }
?>

<html>
    <head>

        <?php 
            include('../../assets/cmp/principal/head.php');
        ?>

        <link href="../../assets/styles/formulario.css" rel="stylesheet" />
        <link href="../../assets/styles/stylePopup.css" rel="stylesheet" />

        <title> PLENG | Relatórios </title>
    </head>
    
    <body>
        <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <h1> Emitir relatórios do projeto </h1>

            <section class="grid-12">
                <a href="?nomerel=MaterialEtapa#logoModal" class="grid-3">
                    <div> <i class="fa gg-file"></i> <span> Materiais por etapa </span> </div>
                </a>
                <a href="?nomerel=MaterialProjeto#logoModal" class="grid-3">
                    <div> <i class="fa gg-file"></i> <span> Materiais do projeto </span> </div>
                </a>
                <a href="?nomerel=ResumoDiarios#logoModal" class="grid-3">
                    <div> <i class="fa gg-file"></i> <span> Resumo de diários </span> </div>
                </a>
                <a href="?nomerel=OrcamentoMes#logoModal" class="grid-3">
                    <div> <i class="fa gg-file"></i> <span> Orçamento por mês </span> </div>
                </a>
                <a href="?nomerel=OrcamentoAno#logoModal" class="grid-3">
                    <div> <i class="fa gg-file"></i> <span> Orçamento por ano </span> </div>
                </a>
                <a href="" class="grid-3">
                    <div> <i class="fa gg-file"></i> <span> Manual de usuário </span> </div>
                </a>
            </section>

            <!-- popup de logo -->
            <div id="logoModal" class="modalDialog">
                <div>
                    <a href="#" title="Close" class="close">
                        <div class="close-container">
                            <div class="leftright"></div>
                            <div class="rightleft"></div>
                        </div>
                    </a>
                    <h2>Selecione o logo do seu relatório</h2>
                    <p>Selecione o melhor logo da sua empresa para que ele esteja presente na emissão do seu relatório.</p>

                    <form method="POST" action="./index.php">
                        <fieldset class="btn">
                            <input type="hidden" name="nomerel" value="<?= $_GET['nomerel'] ?>" />

                            <div>

                                <?php
                                    while($logo = $listaLogo->fetchArray()):
                                ?>

                                <label class="rad-label">
                                    <input type="radio" class="rad-input" name="foto" value="<?= $logo['idgaleria']?>">
                                    <div class="rad-design"></div>
                                    <div class="rad-text"><?= $logo['nome']; ?></div>
                                </label>

                                <?php
                                    endwhile;
                                ?>

                            </div>

                            <div class="items">
                                <div class="item">
                                    <a href="#"><button type="button" class="btnSecundario"> Cancelar </button></a>
                                </div>
                                <div class="item">
                                    <button type="submit" class="btnPrincipal"> Emitir </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>

            <!-- modal ano -->
            <div id="OrcamentoAnoModal" class="modalDialog">
                <div>
                    <a href="#" title="Close" class="close">
                        <div class="close-container">
                            <div class="leftright"></div>
                            <div class="rightleft"></div>
                        </div>
                    </a>
                    <h2>Selecione o ano do orçamento</h2>
                    <p>Selecione o  ano para verificar o orçamento do seu projeto ou deixe em branco para emitir todos.</p>

                    <form method="POST" action="./index.php">
                        <fieldset class="btn">
                            <input type="hidden" name="nomerel" value="<?= $_GET['nomerel'] ?>" />
                            <input type="hidden" name="foto" value="<?= $_GET['foto'] ?>" />
                            <input type="hidden" name="origem" value="ano" />

                            <div>
                                <input type="number" name="ano" />
                            </div>

                            <div class="items">
                                <div class="item">
                                    <a href="#"><button type="button" class="btnSecundario"> Cancelar </button></a>
                                </div>
                                <div class="item">
                                    <button type="submit" class="btnPrincipal"> Emitir </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>

            <!-- modal ano -->
            <div id="OrcamentoMesModal" class="modalDialog">
                <div>
                    <a href="#" title="Close" class="close">
                        <div class="close-container">
                            <div class="leftright"></div>
                            <div class="rightleft"></div>
                        </div>
                    </a>
                    <h2>Selecione o mês do orçamento</h2>
                    <p>Selecione o mês para verificar o orçamento do seu projeto.</p>

                    <form method="POST" action="./index.php">
                        <fieldset class="btn">
                            <input type="hidden" name="nomerel" value="<?= $_GET['nomerel'] ?>" />
                            <input type="hidden" name="foto" value="<?= $_GET['foto'] ?>" />
                            <input type="hidden" name="origem" value="mes" />

                            <div>
                                <input type="month" name="mes" />
                            </div>

                            <div class="items">
                                <div class="item">
                                    <a href="#"><button type="button" class="btnSecundario"> Cancelar </button></a>
                                </div>
                                <div class="item">
                                    <button type="submit" class="btnPrincipal"> Emitir </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>