<div class="grid-4">
    <form method="POST" name="editarempreiteiro" action="../../../../server/src/dadosprecadastrados/editarEmpreiteiro.php">
        <h3> <?php echo $row['nome']; ?> </h3>

        <div class="field">
            <label> Nome: </label>
            <input type="text" name="nome" value="<?php echo $row['nome']; ?>" />
        </div>

        <input type="hidden" name="idemp" value="<?php echo $row['idemp']; ?>" />

        <div class="grid-12">
            <button type="submit" class="btnVerde"> Editar </button>
            <button type="button" class="btnVermelho" onclick="deletarDados(<?php echo $row['idemp']; ?>, 'idemp', 'empreiteiro', 'empreiteiro');"> Deletar </button>
        </div>
    </form>
</div>