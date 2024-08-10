<?php

    require('../../../../server/config/conexaosubpastas.php');
    require('../../../../server/config/redireciona.php');

    include('../../../../server/src/Usuario.php');
    include('../../../../server/src/Projeto.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }

    $usuario = new Usuario($db);

    $infoUsu = $usuario->selecionarUsuario($_SESSION['usuario']);

    $projeto = new Projeto($db);

    $qtdeProjeto = $projeto->somaQtdeProjetos($_SESSION['usuario']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $usuarioDados = (object) array (
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'idusu' => $_SESSION['usuario']
        );

        $usuario->editarUsuario($usuarioDados);

        $_SESSION['nomeUsuario'] = $usuarioDados->nome;

        redireciona('../../menu/index.php');
    }
?>

<html>
    <head>

        <?php 
            include('../../../assets/cmp/subpastas/head.php');
        ?>

        <link href="../../../assets/styles/formulario.css" rel="stylesheet" />

        <title> PLENG | Seu perfil </title>
    </head>

    <body>
        
        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>

        <main class="container">
            <h1> Suas informações </h1>
            <section class="grid-5">
                <form method="POST" action="./index.php">
                    <fieldset>
                        <label> Nome: </label>
                        <input type="text" name="nome" value="<?= $infoUsu['nome']; ?>" />
                    </fieldset>

                    <fieldset>
                        <label> Email: </label>
                        <input type="email" name="email" value="<?= $infoUsu['email']; ?>"/>
                    </fieldset>

                    <fieldset>
                        <label> Senha: </label>
                        <input type="password" name="senha" value="<?= $infoUsu['senha']; ?>"/>
                    </fieldset>

                    <div class="items">
                        <div class="item">
                            <fieldset>
                                <label> Data do cadastro: </label>
                                <input type="date" name="datacadastro" readonly value="<?= $infoUsu['data_cadastro']; ?>" />
                            </fieldset>
                        </div>
                        <div class="item">
                            <fieldset>
                                <label> Total de projetos até o momento: </label>
                                <input type="text" name="qtde" readonly value="<?= $qtdeProjeto['qtde']; ?>" />
                            </fieldset>
                        </div>
                    </div>
                    
                    <button type="submit"> Salvar </button>    
                </form>
            </section>

            <section class="grid-5">
                <h2> Configure seu perfil e o seu sistema </h2>

                <p> 
                    Para poder lhe dar uma experiência ainda mais agradável, 
                    pedimos que mantenha seus dados sempre atualizados. <br/><br/>
                    Caso encontre alguma dificuldade ou esteja em dúvida sobre o 
                    nosso sistema, entre em contato com o suporte para que 
                    possamos resolver juntos imediatamente.
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