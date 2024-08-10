<html>
<head>
    <?php include('../../assets/cmp/head/HeadPrincipal.php'); ?>
    <title> Pleng | Medições </title>

</head>

<body>
    <div id="page-medicoes" class="container">

    <?php include('../../assets/cmp/menulateral/index.php'); ?>
    
        <header>
            <img src="../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <div class="grid-12">
            <main>
                <div class="titulo">
                    <h1> medições </h1>
                </div>

                <form class="grid-5">
                    <h2> Levantamento inicial </h2>
                    <img src="../../assets/imgs/iconmed1.svg" />
                    <div>
                        <a href="../levantamentoinicial"><button type="button" class="btnVerde"> Criar </button></a>
                    </div>
                </form>
                <form class="grid-5">
                    <h2> Diário de obra </h2>
                    <img src="../../assets/imgs/iconmed2.svg" />
                    <div>
                        <a href="../diariodeobra/lista"><button type="button" class="grid-6 btnBranco"> Editar </button></a>
                        <a href="../diariodeobra/cadastrar"><button type="button" class="grid-6 btnVerde"> Criar </button></a>
                    </div>
                </form>
                <div class="titulo">
                    <h1> Últimos levantamentos </h1>
                </div>

                <table>
                    <?php include('../../../server/src/medicoes/listaUltimasEtapas.php'); ?>
                </table>
            </main>
        </div>
    </div>
</body>
</html>