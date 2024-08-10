<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Editar etapa </title>

    <link href="../../../assets/styles/radioButton.css" rel="stylesheet" />
</head>

<body>
    <div id="page-editaretapa" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>
    
        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>
        
        <main>
            <div class="titulo">
                <h1> Editar etapa </h1>
            </div>

            <div class="grid-12">
                <form method="POST" name="etapalevantamento" action="../../../../server/src/etapas/editarEtapa.php">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['idEtapaProjEpAtiva']; ?>" >
                
                    <div class="grid-12">
                        <div class="grid-3">
                            <img src="../../../assets/imgs/iconnum1.svg" />
                        </div>
                        <div class="grid-9">
                            <h3> Etapa </h3>
                            <p> 
                                Verifique a etapa, seu tamanho total e a unidade de medida.
                                Caso a etapa que deseja não esteja cadastrada, vá até a aba "Dados pré-cadastrados" 
                                e faça as alterações necessárias.
                            </p>
                        </div>

                        <div class="field">
                            <label> Etapa: </label>
                            <input type="text" value="<?php echo $_SESSION['nomeEtapaEpAtiva']; ?>" readonly />
                        </div>

                        <div class="items">
                            <div class="item">
                                <div class="field">
                                    <label> Tamanho total: </label>
                                    <input type="text" name="tamanhototal" value="<?php echo $_SESSION['tamanhoEtapaEpAtiva']; ?>" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="field">
                                    <label> Unidade: </label>
                                    <input type="text" name="unidade" value="<?php echo $_SESSION['unidadeEtapaEpAtiva']; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-12">
                        <div class="grid-3">
                            <img src="../../../assets/imgs/iconnum2.svg" />
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
                                    <input type="number" name="posicao" value="<?php echo $_SESSION['posEtapaEpAtiva']; ?>" >
                                </div>
                            </div>
                            <div class="item">
                                <div class="field">
                                    <label> Situação: </label>
                                    
                                    <div class="container">
                                        <div class="contRadio">
                                            <input type="radio" class="hidden" id="input1" name="situacao" value="N"
                                            <?php 
                                                if($_SESSION['situacaoEtapaEpAtiva'] === 'N') {
                                                    echo "checked";
                                                }
                                            ?>
                                            >
                                            <label class="entry" for="input1"><div class="circle"></div>
                                                <div class="entry-label">Não iniciada</div>
                                            </label>
                                            <input type="radio" class="hidden" id="input2" name="situacao" value="A"
                                            <?php 
                                                if($_SESSION['situacaoEtapaEpAtiva'] === 'A') {
                                                    echo "checked";
                                                }
                                            ?>>
                                            <label class="entry" for="input2">
                                                <div class="circle"></div>
                                                <div class="entry-label">Em andamento</div>
                                            </label>
                                            <input type="radio" class="hidden" id="input3" name="situacao" value="F"
                                            <?php 
                                                if($_SESSION['situacaoEtapaEpAtiva'] === 'F') {
                                                    echo "checked";
                                                }
                                            ?>>
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
                            <img src="../../../assets/imgs/iconnum3.svg" />
                        </div>
                        <div class="grid-9">
                            <h3> Descrição </h3>
                            <p> 
                                Acrescente uma descrição extra para essa etapa caso necessário.
                            </p>
                        </div>

                        <div class="field">
                            <label> Descrição: </label>
                            <textarea name="descricao"><?php echo $_SESSION['descricaoEtapaEpAtiva']; ?></textarea>
                        </div>
                    </div>

                    <div class="grid-12">
                        <a href="../listaetapas"><button type="button" class="btnBranco btnCancelar"> Cancelar </button></a>
    
                        <button type="submit" class="btnVerde btnSalvar"> Salvar </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>