<html>
    <head>
        <?php include('../../assets/cmp/head/HeadPrincipal.php'); ?>
        <title> Pleng | Dashboard </title>
    </head>

    <body>

        <div id="page-dashboard" class="container">
        
        <?php include('../../assets/cmp/menulateral/index.php'); ?>
            
            <header>
                <img src="../../assets/imgs/logo.svg" alt="logo pleng" />
            </header>

            <main class="dash">

                <div class="grid-12 infos">
                    <h1 class="titulo"> Dahsboards </h1>

                    <h3> Percentual geral dos últimos projetos</h3>
                    <img alt="Percentual" src="../../../server/src/dashboard/PercentualGeral.php" />

                    <h3> Demais informações sobre o projeto atual </h3>
                    <div class="grid-4 etapas">
                        <h3> Etapa atual em andamento </h3>
                        <?php include('../../../server/src/dashboard/etapasAndamento.php');?>
                    </div>

                    <div class="grid-6">
                        <h3> Gastos por etapas </h3>

                        <img src="../../../server/src/dashboard/gastosPorEtapa.php" />
                    </div>

                </div>

                <div class="grid-12 infos materiais">
                    <h3> Consumo de materiais </h3>

                    <img src="../../../server/src/dashboard/materialConsumido.php" />
                    <img src="../../../server/src/dashboard/materialTotal.php" />
                </div>
            </main>
        </div>
    </body>
</html>
