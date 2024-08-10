<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Cadastrar projeto </title>

</head>

<body>
    <div id="page-cadastrarprojeto" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>
    
        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main>
            <div class="titulo">
                <h1> Cadastre um novo projeto </h1>
            </div>

            <form method="POST" name="cadastroprojeto" action="../../../../server/src/projetos/cadastrarProjeto.php" class="grid-10">
                <div class="grid-8 cont parte1" id="parte1">
                    <div class="grid-3">
                        <img src="../../../assets/imgs/iconnum1.svg" />
                    </div>
                    <div class="grid-9">
                        <h3> Digite um nome e uma descrição </h3>
                        <p> 
                            O nome e a descrição são importantes para que você possa
                            identificar melhor seu projeto no futuro.
                        </p>
                    </div>

                    <div class="field">
                        <label> Nome: </label>
                        <input type="text" name="nome" />
                    </div>

                    <div class="field">
                        <label> Descrição: </label>
                        <textarea name="descricao"></textarea>
                    </div>
                </div>

                <div class="grid-8 cont isHidden" id="parte2">
                    <div class="grid-3">
                        <img src="../../../assets/imgs/iconnum2.svg" />
                    </div>
                    <div class="grid-9">
                        <h3> Informe o endereço </h3>
                        <p> 
                            A localização do seu projeto é crucial para
                            ser apresentada na emissão do relatório final.
                        </p>
                    </div>

                    <div class="items">
                        <div class="item">
                            <div class="field">
                                <label> Estado: </label>  
                                <select name="state" id="state" onchange="selectedState(this)">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="item">
                            <div class="field">
                                <label> Cidade: </label>  
                                <select name="city" id="city">
                                    <option>Selecionar cidade</option>
                                </select> 
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label> Endereço: </label>
                        <input type="text" name="endereco" />
                    </div>
                </div>

                <div class="grid-8 cont isHidden" id="parte3">
                    <div class="grid-3">
                        <img src="../../../assets/imgs/iconnum3.svg" />
                    </div>
                    <div class="grid-9">
                        <h3> Selecione o empreiteiro e informe a data de início </h3>
                        <p> 
                            é importante que o empreiteiro seja informado para que você saiba
                            com quem entrar em contato e a data para que seja calculado a quantidade 
                            de dias até o término da obra.
                        </p>
                    </div>

                    <div class="field">
                        <label> Empreiteiro: </label>
                        <select name="empreiteiro">
                            <?php include('../../../../server/src/listas/listaEmpreiteiro.php'); ?>
                        </select>
                    </div>

                    <div class="items">
                        <div class="item">
                            <div class="field">
                                <label> Data de iniciação: </label>
                            <input type="date" id="dataIni" class="grid-10" name="data_inicio" onchange="calculaDias();" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="field">
                                <label> Quantidade de dias: </label>
                            <input type="text" id="qtdeDias" class="grid-12" name="qtde_dias" readonly />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid-8">
                    <a href="../../home/index.php"><button type="button" class="btnBranco btnCancelar"> Cancelar </button></a>
                    <button type="submit" class="btnVerde btnSalvar isHidden" id="btnSalvar"> Salvar </button>

                    <button type="button" class="btnVerde btnSalvar" onclick="onClickAvancar();" id="btnEditar"> Avançar > </button>
                    <button type="button" class="btnVerde btnSalvar" onclick="onClickVoltar();"> < Voltar </button>
                </div>
                
            <div class="grid-3 menulateral">
                <div class="grid-12 op isActive" id="titulo1">
                    <h4> Nome e descrição </h4>
                    <p> 
                        O nome e a descrição são importantes para que você possa
                        identificar melhor seu projeto no futuro.
                    </p>
                </div>
                <div class="grid-12 op" id="titulo2">
                    <h4> Endereço </h4>
                    <p> 
                        A localização do seu projeto é crucial para
                        ser apresentada na emissão do relatório final.
                    </p>
                </div>
                <div class="grid-12 op" id="titulo3">
                    <h4> Empreiteiro e data </h4>
                    <p> 
                        é importante que o empreiteiro seja informado para que você saiba
                        com quem entrar em contato e a data para que seja calculado a quantidade 
                        de dias até o término da obra.
                    </p>
                </div>
            </div>
            </form>

        </main>
    </div>

    <script src="./main.js"></script>
    <script src="../../../assets/scripts/estadoCidade.js"></script>
</body>
</html>