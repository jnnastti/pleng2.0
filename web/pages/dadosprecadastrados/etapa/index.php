<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Etapas </title>

    <link href='https://css.gg/search.css' rel='stylesheet'>
</head>

<body>
    <div id="page-dadosetapa" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>
    
        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>


        <main>
            <div class="grid-12">
                <div class="titulo">
                    <h1> Etapas </h1>
                </div>

                <div class="grid-12">
                    <form method="POST" name="cadastrarmaterial" action="../../../../server/src/dadosprecadastrados/cadastrarEtapa.php">
                        <h3> Cadastrar nova Etapa </h3>

                        <div class="field">
                            <label> Nome: </label>
                            <input type="text" name="nome" />
                        </div>

                        <div class="field">
                            <label> Duração: </label>
                            <input type="text" name="duracao" />
                        </div>

                        <div class="grid-12">
                            <button type="submit" class="btnVerde"> Cadastrar </button>
                        </div>
                    </form>
                </div>

                <div class="titulo">
                    <h1> Etapas cadastradas </h1>
                </div>

                <?php include('../../../../server/src/dadosprecadastrados/listarEtapa.php'); ?>
            
            </div>
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../main.js"></script>
</body>
</html>