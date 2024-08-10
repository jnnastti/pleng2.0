<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Etapas </title>

</head>

<body>
    <div id="page-listaetapas" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>
    
        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main>
            <div class="titulo">
                <h1> Etapas cadastradas </h1>
            </div>

            <div class="grid-12">
                <div class="grid-10 mensagem">
                    <p>
                        Aqui você pode verificar e editar todas as etapas cadastradas no 
                        levantamento inicial do projeto. Para cadastrar uma nova etapa 
                        você precisa ir em "Medições", depois em "Levantamento inicial"
                         e preencher o formulário indicado.
                    </p>
                </div>
            </div>

            <?php include('../../../../server/src/etapas/listarEtapas.php'); ?>
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="./main.js"></script>
</body>
</html>