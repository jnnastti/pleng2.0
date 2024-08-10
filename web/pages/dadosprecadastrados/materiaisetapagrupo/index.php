<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Edite a quantidade de material </title>

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
                    <h1> Cadastre um novo material </h1>
                </div>

                <form method='POST' action='../../../../server/src/dadosprecadastrados/cadastrarMaterialEtapaGrupo.php'>
                    <div class='items'>
                        <div class='item'>
                            <select name="material">
                            <?php
                                include('../../../../server/src/dadosprecadastrados/listarMaterialEtapaGrupo.php');
                            ?>
                            </select>
                        </div>
                        <div class='item'>
                            <div class='field'>
                                <input type='text' id='qtde' name='qtde'>
                                <input type='hidden' name='idqtde'>
                            </div>
                        </div>
                    <div class='item'>    
                        <button type='submit' class='btnVerde'> v </button>
                    </div>
                </form>
            </div>

            <div class="titulo">
                    <h1> Edite os materiais </h1>
                </div>
            <?php include('../../../../server/src/dadosprecadastrados/listarMaterialEtapaGrupoCad.php');?>

        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../main.js"></script>
</body>
</html>