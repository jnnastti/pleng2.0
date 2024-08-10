<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Histórico de diários </title>

    <link href='https://css.gg/search.css' rel='stylesheet'>
</head>

<body>
    <div id="page-listadiariodeobra" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>
    
        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main>
            <div class="titulo">
                <h1> Histórico de diários </h1>
            </div>

            <form method="POST" name="filtrodiario" action="">
                <div class="grid-12">
                    <h3> Filtrar </h3>
                    <div class="items">
                        <div class="item">
                            <div class="field">
                                <label> Etapa: </label>
                                <select>
                                    <option> Nome.. </option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="field">
                                <label> Data: </label>
                                <input type="date" name="data" />
                            </div>
                        </div>
                        <div class="item">
                            <button type="submit" class="btnVerde"> <i class="gg-search"></i> </button>
                        </div>
                    </div>
                </div>
                
            </form>

            <table>
                <?php include('../../../../server/src/diariodeobra/listarDiario.php'); ?>
            </table>

        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="./main.js"></script>
</body>
</html>