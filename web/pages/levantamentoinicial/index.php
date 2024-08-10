<html>
<head>
    <?php include('../../assets/cmp/head/HeadPrincipal.php'); ?>
    <title> Pleng | Levantamento inicial </title>

    <link href="../../assets/styles/radioButton.css" rel="stylesheet" />
</head>

<body>
    <div id="page-levantamentoinicial" class="container">

    <?php include('../../assets/cmp/menulateral/index.php'); ?>
        
        <header>
            <img src="../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main>
            <div class="titulo">
                <h1> Iniciar levantamento de obra </h1>
            </div>

            <div class="grid-12">
                <form method="POST" name="etapalevantamento" action="../../../server/src/levantamentoinicial/cadastrarLevantamento.php">
                    <div class="grid-12">
                        <div class="grid-3">
                            <img src="../../assets/imgs/iconnum1.svg" />
                        </div>
                        <div class="grid-9">
                            <h3> Etapa </h3>
                            <p> 
                                Selecione a etapa, informe seu tamanho total e a unidade de medida.
                                Caso a etapa que deseja não esteja cadastrada, vá até a aba "Dados pré-cadastrados" 
                                e faça as alterações necessárias.
                            </p>
                        </div>

                        
                        <div class="items">
                            <div class="item">
                                <div class="field">
                                    <label> Etapa: </label>
                                    <select name="etapa">
                                        <?php include('../../../server/src/listas/listaEtapas.php'); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item">
                                <div class="field">
                                    <label> Grupo: </label>
                                    <select name="grupo">
                                        <?php include('../../../server/src/listas/listaGrupos.php'); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="items">
                            <div class="item">
                                <div class="field">
                                    <label> Tamanho total: </label>
                                    <input type="text" name="tamanho_total" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="field">
                                    <label> Unidade: </label>
                                    <input type="text" name="unidade" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-12">
                        <div class="grid-3">
                            <img src="../../assets/imgs/iconnum2.svg" />
                        </div>
                        <div class="grid-9">
                            <h3> Classificação </h3>
                            <p> 
                                Classifique a etapa, informando a sua posição de realização e sua
                                atual situação. Caso coloque a mesma posição para diferentes etapas, significa 
                                que as duas podem ser efetuadas juntas.
                            </p>
                        </div>

                        <div class="items">
                            <div class="item">
                                <div class="field">
                                    <label> Posição: </label>
                                    <input type="number" name="posicao">
                                </div>
                            </div>
                            <div class="item">
                                <div class="field">
                                    <label> Situação: </label>
                                    
                                    <div class="container">
                                        <div class="contRadio">
                                            <input checked type="radio" class="hidden" id="input1" name="situacao" value="N">
                                            <label class="entry" for="input1"><div class="circle"></div>
                                                <div class="entry-label">Não iniciada</div>
                                            </label>
                                            <input type="radio" class="hidden" id="input2" name="situacao" value="A">
                                            <label class="entry" for="input2">
                                                <div class="circle"></div>
                                                <div class="entry-label">Em andamento</div>
                                            </label>
                                            <input type="radio" class="hidden" id="input3" name="situacao" value="F">
                                            <label class="entry" for="input3">
                                                <div class="circle"></div>
                                                <div class="entry-label">Finalizada</div>
                                            </label>
                                            
                                            <div class="highlight"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-12">
                        <div class="grid-3">
                            <img src="../../assets/imgs/iconnum3.svg" />
                        </div>
                        <div class="grid-9">
                            <h3> Descrição </h3>
                            <p> 
                                Acrescente uma descrição extra para essa etapa caso necessário.
                            </p>
                        </div>

                        <div class="field">
                            <label> Descrição: </label>
                            <textarea name="descricao"></textarea>
                        </div>
                    </div>

                    <div class="grid-12">
                        <a href="../medicoes"><button type="button" class="btnBranco btnCancelar"> Cancelar </button></a>
    
                        <a href="./materialetapa"><button type="button" class="btnVerde btnSalvar"> Continuar </button></a>
                        <button type="submit" class="btnVerde btnSalvar"> Cadastrar etapa </button>
                    </div>
                </form>
            </div>

            <h1> Etapas cadastradas </h1>
            <?php include('../../../server/src/levantamentoinicial/etapasCadastradas.php'); ?>

        </main>
    </div>
</body>
</html>