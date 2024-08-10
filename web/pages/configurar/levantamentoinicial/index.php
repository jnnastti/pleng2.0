<?php

    require('../../../../server/config/conexaosubpastas.php');
    require('../../../../server/config/redireciona.php');

    include('../../../../server/src/LevantamentoInicial.php');
    include('../../../../server/src/Etapa.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../../login/login.php');

        return;
    }
    if(!isset($_SESSION['projeto'])) {
        redireciona('../../projetos/index.php');

        return;
    }

    $levantamentos = new LevantamentoInicial($db);

    $etapas = new Etapa($db);

    $etapa = $etapas->listarEtapa();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $etapaDados = (object) array (
            'idetapa' => $_POST['etapa'],
            'idprojeto' => $_SESSION['projeto'],
            'situacao' => $_POST['situacao'],
            'descricao' => $_POST['descricao'],
            'tamanho_atual' => $_POST['tamanho_atual'],
            'tamanho_total' => $_POST['tamanho_total'],
            'data_ini' => $_POST['data_ini'],
            'data_fim' => $_POST['data_fim']
        );

        $levantamentos->cadastrarLevantamentoInicial($etapaDados);

        redireciona('./index.php');
    }
?>

<html>
    <head>

        <?php 
            include('../../../assets/cmp/subpastas/head.php');
        ?>

        <link href="../../../assets/styles/formulario.css" rel="stylesheet" />

        <title> PLENG | Nova etapa </title>
    </head>

    <body>
        
        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>

        <main class="container">
            <h1> Levantamento inicial </h1>
            <section class="grid-5">
                <form method="POST" action="./index.php">
                    <fieldset>
                        <label> Etapa: </label>
                        <select name="etapa">
                            <?php while($etp = $etapa->fetchArray()) : ?>
                                <option value="<?= $etp['idetapa']?>"> <?= $etp['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </fieldset>

                    <fieldset>
                        <label> Situação: </label>
                        <select name="situacao">
                            <option value="A"> Andamento </option>
                            <option value="N"> Não iniciada </option>
                            <option value="F"> Finalizada </option>
                        </select>
                    </fieldset>

                    <fieldset>
                        <label> Descrição: </label>
                        <textarea name="descricao"></textarea>
                    </fieldset>

                    <div class="items">
                        <div class="item">
                            <fieldset>
                                <label> Tamanho atual: </label>
                                <input type="text" name="tamanho_atual" />
                            </fieldset>
                        </div>
                        <div class="item">
                            <fieldset>
                                <label> Tamanho total: </label>
                                <input type="text" name="tamanho_total" />
                            </fieldset>
                        </div>
                    </div>

                    <div class="items">
                        <div class="item">
                            <fieldset>
                                <label> Data inicial: </label>
                                <input type="date" name="data_ini" />
                            </fieldset>
                        </div>
                        <div class="item">
                            <fieldset>
                                <label> Data final: </label>
                                <input type="date" name="data_fim" />
                            </fieldset>
                        </div>
                    </div>
                    
                    <button type="submit"> Salvar </button>    
                </form>
            </section>

            <section class="grid-5">
                <h2> Cadastre as etapas do seu projeto </h2>

                <p> 
                    As etapas são importantes para que o acompanhamento 
                    do projeto seja feito de maneira mais simples e sucinta. <br/><br/>
                    Todas as etapas precisam ser cadastradas para o fechamento 
                    do projeto e emissão de relatórios mais completos.
                </p>

                <h2> Sobre o PLENG </h2>

                <p>
                    O PLENG encontra-se atualmente na versão 4.0.3, tendo como 
                    novidade as atualizações em sua usabilidade e em seu layout. <br/><br/>
                    Agora tornou-se ainda mais fácil acessar as funções do sistema e 
                    acompanhar o desenvolvimento de seus projetos.
                </p>

                <h4> Dê seu feedback e colabore com as futuras versões do PLENG!</h4>
            </section>
        </main>
    </body>
</html>