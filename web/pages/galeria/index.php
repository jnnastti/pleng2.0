<html>
<head>
    <?php include('../../assets/cmp/head/HeadPrincipal.php'); ?>
    <title> Pleng | Galeria </title>
</head>
<body>
    
    <div id="page-home" class="container">
    
    <?php include('../../assets/cmp/menulateral/index.php'); ?>
        
        <header>
            <img src="../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main class="home">

            <div class="grid-12">
                <div class="titulo">
                    <h1> Imagens do projeto </h1>
                </div>

                <?php 
                    include('../../../server/src/galeria/listaImagem.php');
                ?>

                <div>
                    <a href="./cadastrar/index.php">
                        <button type="button" class="adicionar">
                            <img src="../../assets/imgs/iconadd.svg">
                        </button>
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>