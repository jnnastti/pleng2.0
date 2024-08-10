<div class="grid-4">
    <form method="POST" name="editargrupo" action="../../../../server/src/dadosprecadastrados/editarGrupo.php">
        <h3> <?php echo $row['nome']; ?> </h3>

        <div class="field">
            <label> Nome: </label>
            <input type="text" name="nome" value="<?php echo $row['nome']; ?>" />
        </div>

        <input type="hidden" name="idgrupo" value="<?php echo $row['idgrupo']; ?>" />

        <div class="grid-12">
            <button type="submit" class="btnVerde"> Editar </button>
            <button type="button" class="btnVermelho" onclick="deletarDados(<?php echo $row['idgrupo']; ?>, 'idgrupo', 'grupo_material', 'grupo');"> Deletar </button>
        </div>
    </form>
</div>