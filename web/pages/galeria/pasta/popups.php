<!-- popup de editar -->
<div id="editarModal" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">
            <div class="close-container">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </a>
        <h2>Pasta</h2>

        <form method="POST" action="./index.php?id=<?= $info['idpasta']; ?>&action=editar">
            <input type="hidden" name="id" value="<?= $info['idpasta']; ?>" />
            <fieldset>
                <input type="text" name="nome" placeholder="Nome da pasta" value="<?= $info['nome']; ?>" />
            </fieldset>
            
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
        <h2>Deseja excluir essa pasta?</h2>
        <p>Uma vez deletada, todos os dados relacionados ao mesmo serão apagados e não poderão mais ser recuperados.</p>

        <form method="POST" action="./index.php?id=<?= $info['idpasta']; ?>&action=deletar">
            <fieldset class="btn">
                <input type="hidden" name="id" value="<?= $info['idpasta']; ?>" />
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

<div id="cadastrarModal" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">
            <div class="close-container">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </a>

        <h2>Cadastrar uma nova foto</h2>

        <form enctype="multipart/form-data" method="POST" action="./index.php?id=<?= $_GET['id']; ?>&action=cadastrar">
            <input type="hidden" name="id" value="<?= $_GET['id']; ?>" />

            <fieldset>
                <input type="file" name="foto" />
            </fieldset>

            <div class="items">
                <div class="item">
                    <fieldset>
                        <label> Nome: </label>
                        <input type="text" name="nome" />
                    </fieldset>
                </div>
                <div class="item">
                    <fieldset>
                        <label> Data: </label>
                        <input type="date" name="data_foto" />
                    </fieldset>
                </div>
            </div>
            <fieldset>
            <label> Descrição: </label>
                <textarea name="descricao"></textarea>
            </fieldset>
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

<div  id="editarFotoModal" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">
            <div class="close-container">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </a>

        <h2>Editar foto</h2>

        <form method="POST" action="./index.php?id=<?= $_GET['id']; ?>&action=editarFoto">
            <input type="hidden" name="id" value="<?= $_GET['idfoto']; ?>" />
            <input type="hidden" name="pasta" value="<?= $_GET['id']; ?>" />

            <div class="items">
                <div class="item">
                    <fieldset>
                        <img src="./imgproj/<?= $infoFoto['foto']; ?>" alt="<?= $infoFoto['nome']; ?>" />
                    </fieldset>
                </div>

                <div>
                    <div class="items">
                        <div class="item">
                            <fieldset>
                                <label> Nome: </label>
                                <input type="text" name="nome" value="<?= $infoFoto['nome']; ?>" />
                            </fieldset>
                        </div>
                        <div class="item">
                            <fieldset>
                                <label> Data: </label>
                                <input type="date" name="data_foto" value="<?= $infoFoto['data_foto']; ?>" />
                            </fieldset>
                        </div>
                    </div>
                    <fieldset>
                    <label> Descrição: </label>
                        <textarea name="descricao"> <?= $infoFoto['descricao']; ?> </textarea>
                    </fieldset>
                    <div class="items">
                        <div class="item">
                            <a 
                                href="?id=
                                    <?= trim($infoFoto['idpasta']);?>
                                    &idfoto=
                                    <?= trim($infoFoto['idgaleria']); ?>
                                    #deletarFotoModal"
                            >
                                <button type="button" class="btnExcluir"> Excluir </button>
                            </a>
                        </div>
                        <div class="item">
                            <button type="submit" class="btnPrincipal"> Editar </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- popup de deletar foto -->
<div id="deletarFotoModal" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">
            <div class="close-container">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </a>
        <h2>Deseja excluir essa foto?</h2>
        <p>Uma vez deletada, todos os dados relacionados ao mesmo serão apagados e não poderão mais ser recuperados.</p>

        <form method="POST" action="./index.php?id=<?= $infoFoto['idpasta']; ?>&action=deletarFoto">
            <fieldset class="btn">
                <input type="hidden" name="id" value="<?= $infoFoto['idgaleria']; ?>" />
                <input type="hidden" name="pasta" value="<?= $infoFoto['idpasta']; ?>" />
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