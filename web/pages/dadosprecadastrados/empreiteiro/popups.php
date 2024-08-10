<!-- popup de cadastrar -->
<div id="cadastrarModal" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">
            <div class="close-container">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </a>
        <h2>Empreiteiros</h2>

        <form method="POST" action="./index.php?action=cadastrar">
            <fieldset>
                <input type="text" name="nome" placeholder="Nome do empreiteiro" />
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

<!-- popup de deletar -->
<div id="deletarModal" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">
            <div class="close-container">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </a>
        <h2>Deseja excluir esse empreiteiro?</h2>
        <p>Uma vez deletado, todos os dados relacionados ao mesmo serão apagados e não poderão mais ser recuperados.</p>

        <form method="POST" action="./index.php?action=deletar">
            <fieldset class="btn">
                <input type="hidden" name="id" value="<?= $_GET['idemp']; ?>" />
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
        <h2>Empreiteiros</h2>

        <form method="POST" action="./index.php?action=editar">
            <input type="hidden" name="id" value="<?= $info['idempreiteiro']; ?>" />

            <fieldset>
                <input type="text" name="nome" value="<?= $info['nome']; ?>"/>
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
