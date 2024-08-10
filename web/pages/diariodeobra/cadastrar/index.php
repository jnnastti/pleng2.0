<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Cadastrar novo diário </title>

    <link href="../../../assets/styles/climaButton.css" rel="stylesheet" />
</head>

<body>
    <div id="page-cadastrardiariodeobra" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>
    
        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main>
            <div class="titulo">
                <h1> Cadastrar novo diário </h1>
            </div>
                <form method="POST" name="cadastrodiariodeobra" action="../../../../server/src/diariodeobra/cadastrarDiario.php" id="form1">
                    <div class="cont parte1" id="parte1">
                        
                        <div class="cabecalho">
                        </div>

                        <div class="infocab">
                            <div class="grid-3">
                                <img src="../../../assets/imgs/iconnum1.svg" />
                            </div>
                            <div class="grid-9">
                                <h3> Data e tempo </h3>
                                <p> 
                                    Informe o dia que foi efetuado o diário de obra e a condição climatica de cada dia da semana. 
                                    Caso não saiba, deixe em branco.
                                </p>
                            </div>
                        </div>
                        
                        <div class="items">
                            <div class="item">
                                <div class="field">
                                    <label> Data: </label>
                                    <input type="date" name="data_diario" />
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="field">
                                    <label> Nome: </label>
                                    <input type="text" name="nome" />
                                </div>
                            </div>
                        </div>
                    

                        <div class="fieldtempo">
                            <label class="grid-3"> Segunda de manhã: </label>
                            
                            <label>
                                <input type="radio" name="climasegundamanha" value="nublado" checked />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2 small-cloud"></div>
                                        <div class="cloud2"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climasegundamanha" value="chuva" />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2"></div>
                                        <div class="rain"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climasegundamanha" value="sol" />
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
                                <input type="radio" name="climasegundamanha" value="vento" />
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
                                <input type="radio" name="climasegundatarde" value="nublado" checked />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2 small-cloud"></div>
                                        <div class="cloud2"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climasegundatarde" value="chuva" />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2"></div>
                                        <div class="rain"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climasegundatarde" value="sol" />
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
                                <input type="radio" name="climasegundatarde" value="vento" />
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
                                <input type="radio" name="climatercamanha" value="nublado" checked />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2 small-cloud"></div>
                                        <div class="cloud2"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climatercamanha" value="chuva" />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2"></div>
                                        <div class="rain"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climatercamanha" value="sol" />
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
                                <input type="radio" name="climatercamanha" value="vento" />
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
                                <input type="radio" name="climatercatarde" value="nublado" checked />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2 small-cloud"></div>
                                        <div class="cloud2"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climatercatarde" value="chuva" />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2"></div>
                                        <div class="rain"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climatercatarde" value="sol" />
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
                                <input type="radio" name="climatercatarde" value="vento" />
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
                                <input type="radio" name="climaquartamanha" value="nublado" checked />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2 small-cloud"></div>
                                        <div class="cloud2"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climaquartamanha" value="chuva" />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2"></div>
                                        <div class="rain"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climaquartamanha" value="sol" />
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
                                <input type="radio" name="climaquartamanha" value="vento" />
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
                                <input type="radio" name="climaquartarde" value="nublado" checked />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2 small-cloud"></div>
                                        <div class="cloud2"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climaquartarde" value="chuva" />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2"></div>
                                        <div class="rain"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climaquartarde" value="sol" />
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
                                <input type="radio" name="climaquartarde" value="vento" />
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
                                <input type="radio" name="climaquintamanha" value="nublado" checked />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2 small-cloud"></div>
                                        <div class="cloud2"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climaquintamanha" value="chuva" />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2"></div>
                                        <div class="rain"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climaquintamanha" value="sol" />
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
                                <input type="radio" name="climaquintamanha" value="vento" />
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
                                <input type="radio" name="climaquintatarde" value="nublado" checked />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2 small-cloud"></div>
                                        <div class="cloud2"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climaquintatarde" value="chuva" />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2"></div>
                                        <div class="rain"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climaquintatarde" value="sol" />
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
                                <input type="radio" name="climaquintatarde" value="vento" />
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
                                <input type="radio" name="climasextamanha" value="nublado" checked />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2 small-cloud"></div>
                                        <div class="cloud2"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climasextamanha" value="chuva" />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2"></div>
                                        <div class="rain"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climasextamanha" value="sol" />
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
                                <input type="radio" name="climasextamanha" value="vento" />
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
                                <input type="radio" name="climasextatarde" value="nublado" checked />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2 small-cloud"></div>
                                        <div class="cloud2"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climasextatarde" value="chuva" />
                                <span>
                                    <div class="icon">
                                        <div class="cloud2"></div>
                                        <div class="rain"></div>
                                    </div>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="climasextatarde" value="sol" />
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
                                <input type="radio" name="climasextatarde" value="vento" />
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
                              
                        <div class="grid-12">
                            <a href="index.php"><button type="button" class="btnCancelar"> Cancelar </button></a>
                            <div class="botoes">
                                <button type="button" class="btnAvancar" onClick="onClickAvancar();"> Continuar </button>
                            </div>
                        </div>
                    </div> <!--- fecha parte1 --->

                    
                    <div class="cont parte2 isHidden" id="parte2">
                        
                        <div class="cabecalho">
                        </div>

                        <div class="infocab">
                            <div class="grid-3">
                                <img src="../../../assets/imgs/iconnum2.svg" />
                            </div>
                            <div class="grid-9">
                                <h3> Observação </h3>
                                <p> 
                                    Adicione uma observação e demais informações ao seu diário caso necessário e tenha tudo anotado 
                                    aqui mesmo.
                                </p>
                            </div>
                        </div>
                        
                        <div class="field">
                            <label> Observacao: </label>
                            <textarea name="obs"></textarea>
                        </div>

                        <div class="grid-12">
                            <button type="button" class="btnCancelar" onClick="onClickVoltar();"> Voltar </button>
                            <div class="botoes">
                                <button type="submit" class="btnAvancar" onClick="onClickAvancar();"> Continuar </button>
                            </div>
                        </div>
                              
                    </div> <!--- fecha parte2 --->
                </form>

        </main>
    </div>

    <script src="./main.js"></script>
</body>
</html>

<!-- https://codepen.io/code4food/pen/rLvggd -->