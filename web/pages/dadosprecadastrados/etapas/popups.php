<!-- popup de cadastrar -->
<div id="cadastrarModal" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">
            <div class="close-container">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </a>
        <h2> Etapas </h2>

        <form method="POST" action="./index.php?action=cadastrar">
            <input type="hidden" name="matValue" id="matValue" multiple/>
            <fieldset>
                <input type="text" name="nome" placeholder="Nome da etapa" />
            </fieldset>

            <div class="items">
                <div class="item">
                    <fieldset>
                        <select name="material">
                            <?php while($mat = $itemMaterial->fetchArray()) : ?>
                                <option value="<?= $mat['idmat']; ?>">
                                    <?= $mat['nome']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </fieldset>
                </div>

                <div class="item">
                    <fieldset>
                        <input type="text" name="qtde" placeholder="Quantidade" />
                    </fieldset>
                </div>

                <div class="item btnMaterial">
                    <button type="button" onclick="onClickSalvarMaterial('cadastrar')" class="btnPrincipal"> s </button>
                </div>
            </div>
            
            <div class="lista">

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

<!-- popup de deletar -->
<div id="deletarModal" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">
            <div class="close-container">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </a>
        <h2>Deseja excluir essa etapa?</h2>
        <p>Uma vez deletado, todos os dados relacionados ao mesmo serão apagados e não poderão mais ser recuperados.</p>

        <form method="POST" action="./index.php?action=deletar">
            <fieldset class="btn">
                <input type="hidden" name="id" value="<?= $_GET['idetapa']; ?>" />
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

<!-- popup de editar -->
<div id="editarModal" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">
            <div class="close-container">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </a>
        <h2> Etapas </h2>

        <form method="POST" action="./index.php?action=editar">
            <input type="hidden" name="id" value="<?= $info['idetapa']; ?>" />
            <input type="hidden" name="matValueEdit" id="matValueEdit" multiple/>
            <fieldset>
                <input type="text" name="nome" placeholder="Nome da etapa" value="<?= $info['nome']; ?>" />
            </fieldset>

            <div class="items">
                <div class="item">
                    <fieldset>
                        <select name="materialEdit">
                            <?php while($mat = $itemMaterial->fetchArray()) : ?>
                                <option value="<?= $mat['idmat']; ?>">
                                    <?= $mat['nome']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </fieldset>
                </div>

                <div class="item">
                    <fieldset>
                        <input type="text" name="qtdeEdit" placeholder="Quantidade" />
                    </fieldset>
                </div>

                <div class="item btnMaterial">
                    <button type="button" onclick="onClickSalvarMaterial('editar')" class="btnPrincipal"> s </button>
                </div>
            </div>
            
            <div class="listaEdit">
                <?php while($matEtapa = $listaMaterialEtapa->fetchArray()) : ?>
                    <script>
                        var material = {
                            id: '<?= $matEtapa['idmat']; ?>',
                            nome: '<?= $matEtapa['nome']; ?>',
                            qtde: '<?= $matEtapa['qtde']; ?>'
                        }

                        listaMateriais.push(material);

                        this.onAtualizarListaEditar();
                    </script>
                <?php endwhile;?>
            </div>
            
            <div class="items">
                <div class="item">
                    <a href="#"><button type="button" class="btnSecundario"> Cancelar </button></a>
                </div>
                <div class="item">
                    <button type="submit" class="btnPrincipal"> Salvar </button>
                </div>
            </div>
        </form>
    </div>
</div>