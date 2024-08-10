<div class="grid-6 containerForm">
    <form method="POST" name="editarmaterial" action="../../../../server/src/dadosprecadastrados/selecionarGrupo.php">
        <h3> <?php echo $row['nome']; ?> </h3>

        <input type="hidden" value="<?php echo $row['idgrupo']; ?>" name="idgrupo">


        <div class="grid-12">
            <button type="submit" class="btnVerde"> Selecionar </button>
        </div>

    </form>
</div>