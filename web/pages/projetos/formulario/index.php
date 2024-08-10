<?php

    require('../../../../server/config/conexaosubpastas.php');
    require('../../../../server/config/redireciona.php');

    include('../../../../server/src/Projeto.php');
    include('../../../../server/src/Empreiteiro.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../../login/login.php');

        return;
    }

    $projetos = new Projeto($db);
    $empreiteiros = new Empreiteiro($db);

    $itemEmpreiteiro = $empreiteiros->listarEmpreiteiro();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $projetoDados = (object) array (
            'nome' => $_POST['nome'],
            'descricao' => $_POST['descricao'],
            'endereco' => $_POST['endereco'],
            'cidade' => $_POST['city'],
            'estado' => $_POST['state'],
            'dataini' => $_POST['data_inicio'],
            'qtdedias' => $_POST['qtde_dias'],
            'idempreiteiro' => $_POST['empreiteiro'],
            'idusuario' => $_SESSION['usuario']
        );

        $projetos->cadastrarProjeto($projetoDados);

        redireciona('../index.php');
    }
?>

<html>
    <head>
        
        <?php 
            include('../../../assets/cmp/subpastas/head.php');
        ?>

        <link href="../../../assets/styles/formulario.css" rel="stylesheet" />

        <title> PLENG | Cadastrar projeto </title>
    </head>

    <body>

        
        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>

        <main class="container">
            <h1> Cadastre um novo projeto </h1>
            <form class="grid-12" method="POST" action="./index.php">
                <div class="grid-8 cont" id="parte1">
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

                    <fieldset>
                        <label> Nome: </label>
                        <input type="text" name="nome" />
                    </fieldset>

                    <fieldset>
                        <label> Descrição: </label>
                        <textarea name="descricao"></textarea>
                    </fieldset>
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
                            <fieldset>
                                <label> Estado: </label>  
                                <select name="state" id="state" onchange="selectedState(this)">
                                    <option></option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="item">
                            <fieldset>
                                <label> Cidade: </label>  
                                <select name="city" id="city">
                                    <option>Selecionar cidade</option>
                                </select> 
                            </fieldset>
                        </div>
                    </div>

                    <fieldset>
                        <label> Endereço: </label>
                        <input type="text" name="endereco" />
                    </fieldset>
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

                    <fieldset>
                        <label> Empreiteiro: </label>
                        <select name="empreiteiro">
                            <?php while($emp = $itemEmpreiteiro->fetchArray()) : ?>
                                <option value="<?= $emp['idempreiteiro']; ?>">
                                    <?= $emp['nome']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </fieldset>

                    <div class="items">
                        <div class="item">
                            <fieldset>
                                <label> Data de início: </label>
                            <input type="date" id="dataIni" class="grid-10" name="data_inicio" onchange="calculaDias();" />
                            </fieldset>
                        </div>
                        <div class="item">
                            <fieldset>
                                <label> Quantidade de dias: </label>
                            <input type="text" id="qtdeDias" class="grid-12" name="qtde_dias" readonly />
                            </fieldset>
                        </div>
                    </div>
                </div>
                
                <div class="grid-4 menulateral">
                    <div class="grid-10 op isActive" id="titulo1">
                        <h4> Nome e descrição </h4>
                        <p> 
                            O nome e a descrição são importantes para que você possa
                            identificar melhor seu projeto no futuro.
                        </p>
                    </div>
                    <div class="grid-10 op" id="titulo2">
                        <h4> Endereço </h4>
                        <p> 
                            A localização do seu projeto é crucial para
                            ser apresentada na emissão do relatório final.
                        </p>
                    </div>
                    <div class="grid-10 op" id="titulo3">
                        <h4> Empreiteiro e data </h4>
                        <p> 
                            é importante que o empreiteiro seja informado para que você saiba
                            com quem entrar em contato e a data para que seja calculado a quantidade 
                            de dias até o término da obra.
                        </p>
                    </div>
                </div>

                <div class="grid-8 btns">
                    <a href="../index.php"><button type="button" class="btnSecundario"> Cancelar </button></a>
                    <div>
                        <button type="button" onclick="onClickVoltar();"> < Voltar </button>
                        <button type="button" onclick="onClickAvancar();" id="btnEditar"> Avançar > </button>
                        <button type="submit" class="isHidden" id="btnSalvar"> Salvar </button>
                    </div>
                </div>
            </form>
        </main>
        <script src="./main.js"></script>
        <script src="./estadoCidade.js"></script>
    </body>
</html>