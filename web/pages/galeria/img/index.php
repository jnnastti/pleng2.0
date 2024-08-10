<div class="grid-4">
    <div class="projeto">
        <h3> <?php echo $row['nome']; ?> </h3>
        <img src="../../assets/imgProj/<?php echo $row['imagem']; ?>
        " />

        <div class="field">
            <label> Data: <b> <?php echo $row['dataimg']; ?> </b> </label>
        </div>
        <div class="field">
            <label> Descrição: <b> <?php echo $row['descricao']; ?> </b> </label>
        </div>

        <div class="grid-12 btn">
            <form method="POST" name="projetoExcluir" action="../../../server/src/galeria/deletarImagem.php">
                
                <input type="hidden" value="<? echo $row['idfoto']?>" name="id" />
                <button type="submit" class="grid-12 btnVermelho"> Excluir </button>
            </form>
        </div>
    </div>
</div>