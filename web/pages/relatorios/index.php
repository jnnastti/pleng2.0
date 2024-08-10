<html>
<head>
    <?php include('../../assets/cmp/head/HeadPrincipal.php'); ?>
    <title> Pleng | Emitir relatórios </title>
</head>
<body>
    
    <div id="page-relatorios" class="container">
    
    <?php include('../../assets/cmp/menulateral/index.php'); ?>
        
        <header>
            <img src="../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main class="home">

            <div class="grid-12">
                <div class="titulo">
                    <h1> Emitir relatórios </h1>
                </div>

                <div class="grid-4">
                    <div class="relatorio">
                        <h3> Relatório de materiais por etapa </h3>
                        <div class="grid-12 btn">  
                            <a href="../../../server/src/relatorios/materiaisEtapa.php" target="_blank">
                                <button type="submit" class="grid-12 btnVerde"> Emitir </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="grid-4">
                    <div class="relatorio">
                        <h3> Relatório de materiais do projeto </h3>
                        <div class="grid-12 btn">  
                            <a href="../../../server/src/relatorios/materiaisProjeto.php"  target="_blank">
                                <button type="submit" class="grid-12 btnVerde"> Emitir </button>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- <div class="grid-4">
                    <div class="relatorio">
                        <h3> Relatório de diário de obra </h3>
                        <div class="grid-12 btn">  
                            <a href=""  target="_blank">
                                <button type="submit" class="grid-12 btnVerde"> Emitir </button>
                            </a>
                        </div>
                    </div>
                </div> -->

                <div class="grid-4">
                    <div class="relatorio">
                        <h3> Relatório de diário de obra (resumo) </h3>
                        <div class="grid-12 btn">  
                            <a href="../../../server/src/relatorios/diarioDeObraResumo.php"  target="_blank">
                                <button type="submit" class="grid-12 btnVerde"> Emitir </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="grid-4">
                    <div class="relatorio">
                        <h3> Manual de usuário </h3>
                        <div class="grid-12 btn">  
                            <a href=""  target="_blank">
                                <button type="submit" class="grid-12 btnVerde"> Emitir </button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>
</html>