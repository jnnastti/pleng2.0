<div class="grid-4">
    <form method="POST" name="editarmaterial" action="../../../../server/src/dadosprecadastrados/editarMaterial.php">
        <h3> <?php echo $row['nome']; ?> </h3>

        <div class="field">
            <label> Nome: </label>
            <input type="text" name="nome" value="<?php echo $row['nome']; ?>" />
        </div>

        <div class="field">
            <label> Fornecedor: </label>
            <input type="text" name="fornecedor" value="<?php echo $row['fornecedor']; ?>" />
        </div>

        <div class="field">
            <label> Unidade: </label>
            <input type="text" name="unidade" value="<?php echo $row['unidade']; ?>" />
        </div>

        <div class="field">
            <label> Preço: </label>
            <input type="text" name="preco" value="<?php echo $row['preco']; ?>" />
        </div>

        <input type="hidden" name="idmat" value="<?php echo $row['idmat']; ?>" />

        <div class="grid-12">
            <button type="submit" class="btnVerde"> Editar </button>
            <button type="button" class="btnVermelho" onclick="deletarDados(<?php echo $row['idmat']; ?>, 'idmat', 'material', 'material');"> Deletar </button>
        </div>
    </form>
</div>