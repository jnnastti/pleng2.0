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
                <h1> Adicionar imagem ao projeto </h1>
            </div>

            <form enctype="multipart/form-data" method="POST" name="cadImagem" action="../../../../server/src/galeria/adicionarImagem.php">
                <h3> Adicione uma nova foto para a galeria de seu projeto </h3>
                
                <div class="items">
                    <div class="item">
                        <div class="field">
                            <label> Data: </label>
                            <input type="date"  class="grid-8" name="dataImg"/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="field">
                            <label> Imagem: </label>
                            <input type="file" name="foto" />
                        </div>
                    </div>
                </div> 

                <div class="field">
                    <label> Descrição: </label>
                    <textarea name="descricao"></textarea>
                </div>

                <div class="grid-12">
                    <a href="../index.php"><button type="button" class="btnBranco btnCancelar"> Cancelar </button></a>
                    <button type="submit" class="btnVerde btnSalvar"> Salvar </button>
                </div>

            </form>
        </main>
    </div>

    <script src="./main.js"></script>
</body>
</html>