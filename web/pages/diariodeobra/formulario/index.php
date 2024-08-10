<?php

    require('../../../../server/config/conexaosubpastas.php');
    require('../../../../server/config/redireciona.php');

    include('../../../../server/src/DiarioDeObra.php');
    include('../../../../server/src/LevantamentoInicial.php');
    include('../../../../server/src/PrevisaoTempo.php');
    include('../../../../server/src/EtapaDiario.php');
    include('../../../../server/src/MaterialEtapaDiario.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../../login/login.php');

        return;
    }

    if(!isset($_SESSION['projeto'])) {
        redireciona('../../projetos/index.php');

        return;
    }

    $diarios = new DiarioDeObra($db);
    $etapas = new LevantamentoInicial($db);
    $previsaoTempo = new PrevisaoTempo($db);
    $etapaDiario = new EtapaDiario($db);
    $matEtapaDiario = new MaterialEtapaDiario($db);

    $infos = isset($_GET['id']) ? $diarios->selecionarDiario($_GET['id']) : '';
    $infosPrevisao = isset($_GET['id']) ? $previsaoTempo->selecionarPrevisaoTempo($_GET['id']) : '';
    
    $etapa = $etapas->listarLevantamento($_SESSION['projeto']);

    $listaEtapaDiario = (isset($_GET['id'])) ? $etapaDiario->selecionarEtapaDiario($_GET['id']) : '';
    $listaMatEtapaDiario = (isset($_GET['id'])) ? $matEtapaDiario->selectMaterialEtapaDiario($_GET['id']) : '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

        // var_dump($diarioDados);
        if(trim($action) == "cadastrar") {
            $diarioDados = (object) array (
                'datadiario' => $_POST['datadiario'],
                'nome' => $_POST['nome'],
                'observacao' => $_POST['observacao'],
                'idprojeto' => $_SESSION['projeto']
            );
    
            $previsaoTempoDados = (object) array (
                'temsegmanha' => $_POST['temsegmanha'],
                'temsegtarde' => $_POST['temsegtarde'],
                'temtermanha' => $_POST['temtermanha'],
                'temtertarde' => $_POST['temtertarde'],
                'temquamanha' => $_POST['temquamanha'],
                'temquatarde' => $_POST['temquatarde'],
                'temquimanha' => $_POST['temquimanha'],
                'temquitarde' => $_POST['temquitarde'],
                'temsexmanha' => $_POST['temsexmanha'],
                'temsextarde' => $_POST['temsextarde'],
                'idprojeto' => $_SESSION['projeto']
            );
    
            $etapasDiario = explode("\\", $_POST['etpValue']);
            $materiaisEtapa = explode("\\", $_POST['matValue']);

            $diarios->cadastrarDiarioDeObra($diarioDados, $previsaoTempoDados, $etapasDiario, $materiaisEtapa);

        } else if(trim($action) == "editar"){
            $diarioDados = (object) array (
                'datadiario' => $_POST['datadiario'],
                'nome' => $_POST['nome'],
                'observacao' => $_POST['observacao'],
                'iddiario' => $_POST['iddiario']
            );
    
            $previsaoTempoDados = (object) array (
                'temsegmanha' => $_POST['temsegmanha'],
                'temsegtarde' => $_POST['temsegtarde'],
                'temtermanha' => $_POST['temtermanha'],
                'temtertarde' => $_POST['temtertarde'],
                'temquamanha' => $_POST['temquamanha'],
                'temquatarde' => $_POST['temquatarde'],
                'temquimanha' => $_POST['temquimanha'],
                'temquitarde' => $_POST['temquitarde'],
                'temsexmanha' => $_POST['temsexmanha'],
                'temsextarde' => $_POST['temsextarde'],
                'iddiario' => $_POST['iddiario']
            );
    
            $etapasDiario = explode("\\", $_POST['etpValue']);
            $materiaisEtapa = explode("\\", $_POST['matValue']);

            // var_dump($diarioDados);
            $diarios->editarDiarioDeObra($diarioDados, $previsaoTempoDados, $etapasDiario, $materiaisEtapa);
        }
        
        redireciona('../index.php');
    }

    if(isset($_GET['id'])) {
        $actionParam = "editar";
    } else {
        $actionParam = "cadastrar";
    }
?>

<html>
    <head>
        
        <?php 
            include('../../../assets/cmp/subpastas/head.php');
        ?>

        <link href="../../../assets/styles/formulario.css" rel="stylesheet" />

        <link href="./climaButton.css" rel="stylesheet" />

        <title> PLENG | Configurar diário </title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./main.js"></script>
    </head>
    
    <body>

        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>

        <main class="container">
            <h1> Configure o diário de obra </h1>


            <form method="POST" action="./index.php?action=<?= $actionParam?>">
                <div class="tabs">
  
                    <input type="radio" id="tab1" name="tab-control" checked>
                    <input type="radio" id="tab2" name="tab-control">
                    <input type="radio" id="tab3" name="tab-control">  
                    <input type="radio" id="tab4" name="tab-control">  

                    <ul>
                        <li title="Geral">
                            <label for="tab1" role="button">
                                <img src="" />
                                <span>Geral</span>
                            </label>
                        </li>
                        
                        <li title="Tempo e clima">
                            <label for="tab2" role="button">
                                <img src="" />
                                <span> Tempo e clima </span>
                            </label>
                        </li>  
                        <li title="Etapas">
                            <label for="tab3" role="button">
                                <img src="" />
                                <span> Etapas </span>
                            </label>
                        </li> 
                        <li title="Materiais">
                            <label for="tab4" role="button">
                                <img src="" />
                                <span> Materiais </span>
                            </label>
                        </li> 
                        
                    </ul>
                    
                    <div class="slider">
                        <div class="indicator"></div>
                    </div>

                    <div class="content">
                        <section>
                            <h2>Geral</h2>
                            <p> 
                                Cadastre as informações gerais do seu diário e mantenha-o sempre em dia, além de 
                                adicionar uma observação em seu diário de obra e detalhar as demais informações para 
                                que você tenha todos os dados registrados e possa emitir seus relatórios completos 
                                quando necessário.
                            </p>
                            <input type="hidden" value="<?= $infos['iddiario']?>" name="iddiario" />
                            <div class="items">
                                <div class="item">
                                    <fieldset>
                                        <label> Data: </label>
                                        <input type="date" value="<?= $infos['datadiario']?>" name="datadiario" />
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Nome: </label>
                                        <input type="text" value="<?= $infos['nome']?>" name="nome" />
                                    </fieldset>
                                </div>
                            </div>
                            <fieldset>
                                <label> Observação: </label>
                                <textarea name="observacao"><?= $infos['observacao']?></textarea>
                            </fieldset>
                        </section>
                        
                        <?php require('./previsaoTempo.php');?>

                        <section class="etapas">
                            <h2>Etapas</h2>

                            <div class="items">
                                <div class="item">
                                    <fieldset>
                                        <label> Etapa: </label>
                                        <input list="etapa" name="obs" id="obs" />
                                        <input type="hidden" name="levantamento" id="levantamento" />

                                        <datalist id="etapa">
                                            
                                            <?php while($etp = $etapa->fetchArray()) : ?>

                                            <option value="<?= $etp['idlevantamento'];?> - <?= $etp['nome'];?>"> 
                                                <?= $etp['nome']; ?> - 
                                                <span id="<?= $etp['idlevantamento']; ?>">
                                                    <?= $etp['tamanho_total'];?> m
                                                </span>
                                            </option>

                                            <?php endwhile; ?>
                                        </datalist>
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Tamanho concluido: </label>
                                        <input type="text" name="tamconc" />
                                    </fieldset>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item">
                                    <fieldset>
                                        <label> Tamanho total: </label>
                                        <input type="text" readonly id="tamTotal" name="tamtotal" />
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <button type="button" onclick="onClickSalvarEtapa()"> Salvar etapa </button>
                                    </fieldset>
                                </div>
                            </div>

                            <h3> Etapas </h3>
                            <input type="hidden" name="etpValue" id="etpValue" multiple/>

                            <div id="listaEtapa" class="lista grid-12">     
                                <?php 
                                    if(isset($_GET['id'])) :
                                        while($etpDiario = $listaEtapaDiario->fetchArray()) : 
                                ?>
                                            <script>
                                                var etapa = {
                                                    id: '<?= $etpDiario['idlevantamento']; ?>',
                                                    nome: '<?= $etpDiario['nome']; ?>',
                                                    tamConcluido: '<?= $etpDiario['qtde']; ?>',
                                                    tamTotal: '<?= $etpDiario['tamanho_total']; ?> m'
                                                }

                                                listaEtapas.push(etapa);

                                                this.onAtualizarListaEtapa();
                                            </script>
                                <?php 
                                        endwhile;
                                    else:
                                ?>
                                    <div class="itemlista">
                                        <label> <b> Nome da etapa </b></label>
                                        <label> <b> Tamanho concluido </b></label>
                                        <label> <b> Tamanho total </b></label>

                                        <label> <b> X </b></label>
                                    </div>
                                <? 
                                    endif;
                                ?>
                            </div>
                        </section>

                        <section class="etapas">
                            <h2>Materiais</h2>

                            <input type="hidden" name="matValue" id="matValue" multiple/>
                            <div class="items">
                                <div class="item">
                                    <fieldset>
                                        <label> Etapa: </label>
                                        <input list="etapa" name="obs" id="obs2" />
                                        <input type="hidden" name="levantamento" id="levantamento" />

                                        <datalist id="etapa">
                                            
                                            <?php while($etp = $etapa->fetchArray()) : ?>

                                            <option value="<?= $etp['idlevantamento'];?> - <?= $etp['nome'];?>"> 
                                                <?= $etp['nome']; ?> - 
                                                <span id="<?= $etp['idlevantamento']; ?>">
                                                    <?= $etp['tamanho_total'];?> m
                                                </span>
                                            </option>

                                            <?php endwhile; ?>
                                        </datalist>
                                    </fieldset>
                                </div>
                                
                                <div class="item">
                                    <fieldset>
                                        <label> Material: </label>
                                        <select name="material" class="material">
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="items">
                                
                                <div class="item">
                                    <fieldset>
                                        <label> Qtde. usada: </label>
                                        <input type="text" name="qtdeMatUsada" />
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <button type="button" onclick="onClickSalvarMaterial()"> Salvar material </button>
                                    </fieldset>
                                </div>
                            </div>

                            <h3> Materiais </h3>

                            <div id="listaMaterial" class="lista grid-12">
                                
                                <?php 
                                    if(isset($_GET['id'])) :
                                        while($matEtpDiario = $listaMatEtapaDiario->fetchArray()) : 
                                ?>
                                            <script>
                                                var material = {
                                                    id: '<?= $matEtpDiario['idmatetapa']; ?>',
                                                    nome: '<?= $matEtpDiario['nome']; ?>',
                                                    qtdeUsada: '<?= $matEtpDiario['qtde']; ?>',
                                                    etapa: '<?= $matEtpDiario['idetapa']?>'
                                                }

                                                listaMateriais.push(material);

                                                this.onAtualizarListaMaterial();
                                            </script>
                                <?php 
                                        endwhile;
                                    else:
                                ?>
                                
                                    <div class="itemlista">
                                        <label> <b> Nome do material </b></label>
                                        <label> <b> Qtde usada </b></label>
                                        <label> <b> Etapa </b></label>

                                        <label> <b> X </b></label>
                                    </div>
                                <? 
                                    endif;
                                ?>
                                
                            </div>
                        </section>
                    </div>
                </div> 
                <button type="submit"> Salvar </button>      
                <button type="button" class="btnSecundario"> Cancelar </button>      
            </form>
        </main>
        <script src="./events.js"></script>

    </body>
</html>