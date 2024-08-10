<html>
    <head>

        <?php 
            include('../../assets/cmp/principal/head.php');
        ?>

        <title> PLENG | Relatórios </title>
    </head>
    
    <body>
        <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <h1> Emitir relatórios do projeto </h1>

            <section class="grid-12">
                <a href="../../../server/relatorios/MaterialEtapa.php" class="grid-3">
                    <div> <i class="fa gg-file"></i> <span> Materiais por etapa </span> </div>
                </a>
                <a href="../../../server/relatorios/MaterialProjeto.php" class="grid-3">
                    <div> <i class="fa gg-file"></i> <span> Materiais do projeto </span> </div>
                </a>
                <a href="../../../server/relatorios/ResumoDiarios.php" class="grid-3">
                    <div> <i class="fa gg-file"></i> <span> Resumo de diários </span> </div>
                </a>
                <a href="" class="grid-3">
                    <div> <i class="fa gg-file"></i> <span> Manual de usuário </span> </div>
                </a>
            </section>
        </main>
    </body>
</html>