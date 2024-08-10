<div class="grid-4">
    <div class="projeto">
        <h3> <?php echo $row['nome']; ?> </h3>
        <img src="
            <?php

                if($rowImg['foto'] == null) {
                    echo '../../assets/imgs/page-not-found.svg';
                } else {
                    echo $rowImg['foto'];
                }
            ?>
        " />

        <div class="field">
            <label> Cidade: <b> <?php echo $row['cidade']; ?> </b> </label>
        </div>
        <div class="field">
            <label> Endereço: <b> <?php echo $row['endereco']; ?> </b> </label>
        </div>

        <div class="grid-12 btn">
            <form method="POST" name="projetoExcluir" action="../../../server/src/home/deletaProjeto.php" class="grid-6">
                
                <input type="hidden" value="<? echo $row['idproj']?>" name="id" />
                <button type="submit" class="grid-12 btnVermelho"> Excluir </button>
            </form>
            <form method="POST" name="projetoSelecionar" action="../../../server/src/home/selecionaProjeto.php" class="grid-6">
                    
                <input type="hidden" value="<? echo $row['idproj']?>" name="id" />
                <button type="submit" class="grid-12 btnVerde"> Selecionar </button>
            </form>
        </div>
    </div>
</div>