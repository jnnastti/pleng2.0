<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Editar projeto </title>

</head>

<body>
    <div id="page-editarprojeto" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>
    
        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main>
            <div class="titulo">
                <h1> Editar dados do projeto </h1>
            </div>

            <form method="POST" name="editarProjeto" action="../../../../server/src/projetos/editarProjeto.php">
                <h3> Verifique e edite as informações disponiveis do seu projeto </h3>
                <div class="field">
                    <label> Nome: </label>
                    <input type="text" name="nome" value="<?php echo $_SESSION['nomeProjAtivo']; ?>" />
                </div>
                
                <div class="field">
                    <label> Endereço: </label>
                    <input type="text" name="endereco" value="<?php echo $_SESSION['endProjAtivo']; ?>" />
                </div>
                <div class="field">
                    <label> Empreiteiro: </label>
                    <select name="empreiteiro" id="emp">
                            <?php include('../../../../server/src/listas/listaEmpreiteiro.php'); ?>
                        </select>
                </div>
                <div class="field">
                    <label> Descrição: </label>
                    <textarea name="descricao"><?php echo $_SESSION['descProjAtivo']; ?></textarea>
                </div>

                <div class="items">
                    <div class="item">
                        <div class="field">
                            <label> Data de iniciação: </label>
                            <input type="date" onchange="calculaDias();" id="dataIni" class="grid-8" name="data_inicio" value="<?php echo $_SESSION['dataProjAtivo']; ?>"/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="field">
                            <label> Quantidade de dias: </label>
                            <input type="text" id="qtdeDias" class="grid-8" name="qtde_dias" value="<?php echo $_SESSION['diasProjAtivo']; ?>" readonly />
                        </div>
                    </div>
                </div> 

                <div class="grid-12">
                    <a href="index.php"><button type="button" class="btnBranco btnCancelar"> Cancelar </button></a>
                    <button type="submit" class="btnVerde btnSalvar"> Salvar </button>
                </div>

            </form>
        </main>
    </div>

    <script src="./main.js"></script>
</body>
</html>