<!-- popup de cadastrar -->
<?php if(isset($_GET['id'])): ?>
    <div id="cadastrarModal" class="modalDialog">
        <div>
            <a href="#" title="Close" class="close">
                <div class="close-container">
                    <div class="leftright"></div>
                    <div class="rightleft"></div>
                </div>
            </a>
            <h2> Material </h2>

            <form method="POST" action="./index.php?action=cadastrar">
                <input type="hidden" id="levcad" value="<?= $_GET['id']; ?>" name="idlevantamento" />
                <fieldset>
                    <select id="material" name="material">
                        <?php while($matetp = $listaMaterialEtapa->fetchArray()): ?>

                        <option value="<?= $matetp['idmat']; ?>"> <?= $matetp['nome']; ?></option>

                        <?php endwhile; ?>
                    </select>
                </fieldset>

                <fieldset>
                    <input type="text" name="fornecedor" placeholder="Fornecedor" />
                </fieldset>

                <div class="items">
                    <div class="item">
                        <fieldset>
                            <input type="text" onchange="onCalculaQtdeFaltanteCad()" id="qtdeccad"name="qtde_comprada" placeholder="Quantidade comprada" />
                        </fieldset>
                    </div>
                    
                    <div class="item">
                        <fieldset>
                            <input type="text" readonly name="qtde_faltante" id="qtdefcad" placeholder="Quantidade faltante" />
                        </fieldset>
                    </div>
                </div>

                <div class="items">
                    <div class="item">
                        <fieldset>
                            <input type="text" name="valor_compra" placeholder="Valor total" />
                        </fieldset>
                    </div>
                    
                    <div class="item">
                        <fieldset>
                            <input type="date" name="data_compra" />
                        </fieldset>
                    </div>
                </div>
                
                <div class="items">
                    <div class="item">
                        <a href="#"><button type="button" class="btnSecundario"> Cancelar </button></a>
                    </div>
                    <div class="item">
                        <button type="submit" class="btnPrincipal"> Cadastrar </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<!-- popup de editar -->
<?php if(isset($_GET['idmat'])): ?>
    <div id="editarModal" class="modalDialog">
        <div>
            <a href="#" title="Close" class="close">
                <div class="close-container">
                    <div class="leftright"></div>
                    <div class="rightleft"></div>
                </div>
            </a>
            <h2> Material </h2>

            <form method="POST" action="./index.php?action=editar">
                <input type="hidden" value="<?= $_GET['idmat']; ?>" name="idorcamento" />

                <input type="hidden" value="<?= $info['idmaterial'] ?>" id="idmat" />
                <input type="hidden" value="<?= $info['idlevantamento'] ?>" id="idlevantamento" />

                <fieldset>
                    <label> Material </label>
                    <input type="text" name="material" value="<?= $info['nome']; ?>" readonly>
                </fieldset>
                
                <fieldset>
                    <label> Fornecedor </label>
                    <input type="text" name="fornecedor" placeholder="Fornecedor" value="<?= $info['fornecedor']; ?>" />
                </fieldset>
                
                <div class="items">
                    <div class="item">
                        <fieldset>
                            <label> Qtde. Comprada </label>
                            <input onchange="onCalculaValorFaltanteEdit()" type="text" id="qtde_comprada" name="qtde_comprada" placeholder="Quantidade comprada" value="<?= $info['qtde_comprada']; ?>"/>
                        </fieldset>
                    </div>
                    
                    <div class="item">
                        <fieldset>
                            <label> Qtde. Faltante </label>
                            <input type="text" id="qtde_faltante" name="qtde_faltante" placeholder="Quantidade faltante" value="<?= $info['qtde_faltante']; ?>" readonly/>
                        </fieldset>
                    </div>
                </div>
                
                <div class="items">
                    <div class="item">
                        <fieldset>
                            <label> Valor total </label>
                            <input type="text" name="valor_compra" placeholder="Valor total" value="<?= $info['valor_compra']; ?>" />
                        </fieldset>
                    </div>
                    
                    <div class="item">
                        <fieldset>
                            <label> Data </label>
                            <input type="date" name="data_compra" value="<?= $info['data_compra']; ?>"/>
                        </fieldset>
                    </div>
                </div>
                
                <div class="items">
                    <div class="item">
                        <a href="#"><button type="button" class="btnSecundario"> Cancelar </button></a>
                    </div>
                    <div class="item">
                        <button type="submit" class="btnPrincipal"> Editar </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<!-- popup de deletar -->
<div id="deletarModal" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">
            <div class="close-container">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </a>
        <h2>Deseja excluir esse material?</h2>
        <p>Uma vez deletado, todos os dados relacionados ao mesmo serão apagados e não poderão mais ser recuperados.</p>

        <form method="POST" action="./index.php?id=<?= $info['idorcamento']; ?>&action=deletar">
            <fieldset class="btn">
                <input type="hidden" name="id" value="<?= $info['idorcamento']; ?>" />
                <div class="items">
                    <div class="item">
                        <a href="#"><button type="button" class="btnSecundario"> Cancelar </button></a>
                    </div>
                    <div class="item">
                        <button type="submit" class="btnPrincipal"> Deletar </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<?php endif; ?>

<!-- popup de logo -->
<div id="logoModal" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">
            <div class="close-container">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </a>
        <h2>Selecione o logo do seu relatório</h2>
        <p>Selecione o melhor logo da sua empresa para que ele esteja presente na emissão do seu relatório.</p>

        <form method="POST" action="./index.php?action=relatorio">
            <fieldset class="btn">
                <input type="hidden" name="nomerel" value="<?= $_GET['nomerel'] ?>" />
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />

                <div>

                    <?php
                        while($logo = $listaLogo->fetchArray()):
                    ?>

                    <label class="rad-label">
                        <input type="radio" class="rad-input" name="foto" value="<?= $logo['idgaleria']?>">
                        <div class="rad-design"></div>
                        <div class="rad-text"><?= $logo['nome']; ?></div>
                    </label>

                    <?php
                        endwhile;
                    ?>

                </div>

                <div class="items">
                    <div class="item">
                        <a href="#"><button type="button" class="btnSecundario"> Cancelar </button></a>
                    </div>
                    <div class="item">
                        <button type="submit" class="btnPrincipal"> Emitir </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
