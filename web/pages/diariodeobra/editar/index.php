<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Editar diário </title>

    <link href="../../../assets/styles/climaButton.css" rel="stylesheet" />
</head>

<body>
    <div id="page-editardiariodeobra" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>
    
        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main>
            <div class="titulo">
                <h1> Editar diário </h1>
            </div>

            <form method="POST" name="editardiariodeobra" action="../../../../server/src/diariodeobra/editarDiario.php">
                <h3> Verifique as informações do diário de obra e altere caso necessário </h3>

                <div class="items">
                    <div class="item">
                        <div class="field">
                            <label> Data: </label>
                            <input type="date" value="<?php echo $_SESSION['dataDiarioAtivo']; ?>" name="data_diario" />
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="field">
                            <label> Nome: </label>
                            <input type="text" name="nome" value="<?php echo $_SESSION['nomeDiarioAtivo'];?>" />
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label> Observacao: </label>
                    <textarea name="obs"><?php echo $_SESSION['obsDiarioAtivo']; ?></textarea>
                </div>

                <div class="fieldtempo">
                    <label class="grid-3"> Segunda de manhã: </label>
                    
                    <label>
                        <input type="radio" name="climasegundamanha" value="nublado" 
                            <?php
                                if($_SESSION['segmDiarioAtivo'] === 'nublado') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasegundamanha" value="chuva" 
                        <?php
                                if($_SESSION['segmDiarioAtivo'] === 'chuva') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasegundamanha" value="sol" 
                        <?php
                                if($_SESSION['segmDiarioAtivo'] === 'sol') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasegundamanha" value="vento" 
                        <?php
                                if($_SESSION['segmDiarioAtivo'] === 'vento') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <div class="fieldtempo">
                    <label class="grid-3"> Segunda de tarde: </label>
                    
                    <label>
                        <input type="radio" name="climasegundatarde" value="nublado" 
                            <?php
                                if($_SESSION['segtDiarioAtivo'] === 'nublado') {
                                    echo "checked";
                                } 
                            ?>  />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasegundatarde" value="chuva" 
                        <?php
                                if($_SESSION['segtDiarioAtivo'] === 'chuva') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasegundatarde" value="sol" 
                        <?php
                                if($_SESSION['segtDiarioAtivo'] === 'sol') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasegundatarde" value="vento" 
                        <?php
                                if($_SESSION['segtDiarioAtivo'] === 'vento') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <hr/>

                <div class="fieldtempo">
                    <label class="grid-3"> Terça de manhã: </label>
                    
                    <label>
                        <input type="radio" name="climatercamanha" value="nublado" 
                            <?php
                                if($_SESSION['termDiarioAtivo'] === 'nublado') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climatercamanha" value="chuva" 
                        <?php
                                if($_SESSION['termDiarioAtivo'] === 'chuva') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climatercamanha" value="sol"
                        <?php
                                if($_SESSION['termDiarioAtivo'] === 'sol') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climatercamanha" value="vento" 
                        <?php
                                if($_SESSION['termDiarioAtivo'] === 'vento') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <div class="fieldtempo">
                    <label class="grid-3"> Terça de tarde: </label>
                    
                    <label>
                        <input type="radio" name="climatercatarde" value="nublado" 
                        <?php
                                if($_SESSION['tertDiarioAtivo'] === 'nublado') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climatercatarde" value="chuva" 
                        <?php
                                if($_SESSION['tertDiarioAtivo'] === 'chuva') {
                                    echo "checked";
                                } 
                            ?>/>
                        
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climatercatarde" value="sol" 
                        <?php
                                if($_SESSION['tertDiarioAtivo'] === 'sol') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climatercatarde" value="vento" 
                        <?php
                                if($_SESSION['tertDiarioAtivo'] === 'vento') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <hr/>
                
                <div class="fieldtempo">
                    <label class="grid-3"> Quarta de manhã: </label>
                    
                    <label>
                        <input type="radio" name="climaquartamanha" value="nublado" 
                        <?php
                                if($_SESSION['quamDiarioAtivo'] === 'nublado') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquartamanha" value="chuva" 
                        <?php
                                if($_SESSION['quamDiarioAtivo'] === 'chuva') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquartamanha" value="sol" 
                        <?php
                                if($_SESSION['quamDiarioAtivo'] === 'sol') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquartamanha" value="vento" 
                        <?php
                                if($_SESSION['quamDiarioAtivo'] === 'vento') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <div class="fieldtempo">
                    <label class="grid-3"> Quarta de tarde: </label>
                    
                    <label>
                        <input type="radio" name="climaquartarde" value="nublado" 
                        <?php
                                if($_SESSION['quatDiarioAtivo'] === 'nublado') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquartarde" value="chuva" 
                        <?php
                                if($_SESSION['quatDiarioAtivo'] === 'chuva') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquartarde" value="sol" 
                        <?php
                                if($_SESSION['quatDiarioAtivo'] === 'sol') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquartarde" value="vento" 
                        <?php
                                if($_SESSION['quatDiarioAtivo'] === 'vento') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <hr/>

                <div class="fieldtempo">
                    <label class="grid-3"> Quinta de manhã: </label>

                    <label>
                        <input type="radio" name="climaquintamanha" value="nublado" 
                        <?php
                                if($_SESSION['quimDiarioAtivo'] === 'nublado') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquintamanha" value="chuva"
                        <?php
                                if($_SESSION['quimDiarioAtivo'] === 'chuva') {
                                    echo "checked";
                                } 
                            ?>
                         />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquintamanha" value="sol" 
                        <?php
                                if($_SESSION['quimDiarioAtivo'] === 'sol') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquintamanha" value="vento" 
                        <?php
                                if($_SESSION['quimDiarioAtivo'] === 'vento') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <div class="fieldtempo">
                    <label class="grid-3"> Quinta de tarde: </label>

                    <label>
                        <input type="radio" name="climaquintatarde" value="nublado" 
                        <?php
                                if($_SESSION['quitDiarioAtivo'] === 'nublado') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquintatarde" value="chuva" 
                        <?php
                                if($_SESSION['quitDiarioAtivo'] === 'chuva') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquintatarde" value="sol" 
                        <?php
                                if($_SESSION['quitDiarioAtivo'] === 'sol') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquintatarde" value="vento" 
                        <?php
                                if($_SESSION['quitDiarioAtivo'] === 'vento') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <hr/>

                <div class="fieldtempo">
                    <label class="grid-3"> Sexta de manhã: </label>
                    
                    <label>
                        <input type="radio" name="climasextamanha" value="nublado" 
                        <?php
                                if($_SESSION['sexmDiarioAtivo'] === 'nublado') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasextamanha" value="chuva" 
                        <?php
                                if($_SESSION['sexmDiarioAtivo'] === 'chuva') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasextamanha" value="sol" 
                        <?php
                                if($_SESSION['sexmDiarioAtivo'] === 'sol') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasextamanha" value="vento" 
                        <?php
                                if($_SESSION['sexmDiarioAtivo'] === 'vento') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <div class="fieldtempo">
                    <label class="grid-3"> Sexta de tarde: </label>
                    
                    <label>
                        <input type="radio" name="climasextatarde" value="nublado" 
                        <?php
                                if($_SESSION['sextDiarioAtivo'] === 'nublado') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasextatarde" value="chuva" 
                        <?php
                                if($_SESSION['sextDiarioAtivo'] === 'chuva') {
                                    echo "checked";
                                } 
                            ?> />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasextatarde" value="sol" 
                        <?php
                                if($_SESSION['sextDiarioAtivo'] === 'sol') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasextatarde" value="vento" 
                        <?php
                                if($_SESSION['sextDiarioAtivo'] === 'vento') {
                                    echo "checked";
                                } 
                            ?>/>
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>
                </div>

                <hr/>

                <div class="grid-12">
                    <button type="button" class="btnBranco"> Cancelar </button>
                    <div class="botoes">
                        <button type="submit" class="btnVerde"> Salvar </button>
                    </div>
                </div>
            </form>

            <div class="titulo">
                <h1> Etapas </h1>
            </div>

            <?php include('../../../../server/src/diariodeobra/listarEtapaDiario.php'); ?>

        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="./main.js"></script>
</body>
</html>