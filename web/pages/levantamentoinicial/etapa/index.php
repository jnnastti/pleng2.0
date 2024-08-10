<div class="grid-4 etapa">
    <form method="POST" name="etapalevantamentocadastrada" action="../../../server/src/levantamentoinicial/deletarEtapa.php">
        <h3> <?php echo $row['nome_etapa']; ?> </h3>
        <p><b> Situação atual: </b><?php echo $row['situacao']; ?> </p>

        <input type="hidden" value="<?php echo $row['idetapaproj']; ?>" name="id">
        <button type="submit" class="btnVermelho"> Deletar </button>
    </form>
</div>