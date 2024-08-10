<html>
<head>
    
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Materiais </title>

    <link href='https://css.gg/search.css' rel='stylesheet'>
</head>

<body>
    <div id="page-dadosmaterial" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>

        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main>
            <div class="grid-12">

                <div class="titulo">
                    <h1> Materiais </h1>
                </div>

                <div class="grid-12">
                    <form method="POST" name="cadastrarmaterial" action="../../../../server/src/dadosprecadastrados/cadastrarMaterial.php">
                        <h3> Cadastrar novo material </h3>

                        <div class="field">
                            <label> Nome: </label>
                            <input type="text" name="nome" />
                        </div>

                        <div class="field">
                            <label> Fornecedor: </label>
                            <input type="text" name="fornecedor" />
                        </div>

                        <div class="items">
                            <div class="item">
                                <div class="field">
                                    <label> Unidade: </label>
                                    <input type="text" name="unidade" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="field">
                                    <label> Preço: </label>
                                    <input type="text" name="preco" />
                                </div>
                            </div>
                        </div>

                        <div class="grid-12">
                            <button type="submit" class="btnVerde"> Cadastrar </button>
                        </div>
                    </form>
                </div>

                <div class="titulo">
                    <h1> Materiais cadastrados </h1>
                </div>

                <?php include('../../../../server/src/dadosprecadastrados/listarMaterial.php'); ?>
            </div>
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../main.js"></script>
</body>
</html>