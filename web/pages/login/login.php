<?php
    require('../../../server/config/conexao.php');
    require('../../../server/config/redireciona.php');

    include('../../../server/src/Usuario.php');

    unset($_SESSION['usuario']);

    $usuario = new Usuario($db);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = $usuario->acessarConta($_POST['email'], $_POST['senha']);

        if(is_array($user)) {
            $_SESSION['usuario'] = $user['idusuario'];
            $_SESSION['nomeUsuario'] = $user['nome'];

            redireciona('../projetos/index.php');
        }
    }
?>

<hmtl>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@600&family=Archivo:wght@200&display=swap" rel="stylesheet">
        <meta charset="utf-8"/>

        <link href="../../assets/styles/grid.css" rel="stylesheet" />
        <link href="../../assets/styles/formulario.css" rel="stylesheet" />
        <link href="../../assets/styles/padrao.css" rel="stylesheet" />
        <link href="../../assets/styles/headerHome.css" rel="stylesheet" />

        <link href="./style.css" rel="stylesheet" />

        <title> PLENG | Login </title>
    </head>

    <body>
        <header>
            <nav class="navMenu">
                <a href="../home/index.php"> Início </a>
                <a href="#"> Fórum </a>
                <a hrf="#"><img src="../../assets/imgs/logo.svg" /></a>
                <a href="#"> Contato </a>
                <a href="#"> Login </a>
            </nav>
        </header>

        <main class="container">
            <section class="msg grid-9">
                <h1> Acesse sua conta </h1>
                <p> Comece agora mesmo e acompanhe o crescimento e desempenho de seus projetos em apenas alguns cliques.</p>
            </section>

            <section class="grid-12">
                <div class="login grid-6">
                    <form method="POST" action="./login.php">
                        <fieldset>
                            <label> E-mail: </label>
                            <input name="email" type="email" placeholder="seu@email.com" autofocus />
                        </fieldset>
                        <fieldset>
                            <label> Senha: </label>
                            <input name="senha" type="password" placeholder="senha" />
                        </fieldset>

                        <button type="submit" class="btnPrincipal"> Acessar </button>
                    </form>
                </div>

                <div class="redes grid-4">
                    <a href="https://instagram.com/jnnastti"><div class="gradient-border">Instagram</div></a>
                    <a href="https://twitter.com/jnnastti"><div class="gradient-border">Twitter</div></a>
                    <a href="https://github.com/jnnastti"><div class="gradient-border">Github</div></a>
                    
                    <h1> Siga-nos nas redes sociais </h1>
                </div>
            </section>

            <section class="grid-8">
                <h2> Ou então... </h2>
                <p> Para fazer parte do PLENG e aproveitar o que ele dispõe, você precisa entrar 
                    em contato com nossa equipe e aguardar nosso retorno com demais informações sobre 
                    seu acesso. <br/><br/>
                    Caso esteja enfrentando dificuldades em acessar sua conta, mande-nos um aviso para 
                    que o erro seja corrigido imediatamente. Você também pode tirar determinadas dúvidas 
                    em nosso fórum ou enviar uma mensagem direta ao nosso suporte.
                </p>
            </section>
        </main>
    </body>
</hmtl>