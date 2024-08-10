<div class="grid-4">
    <form method="POST" name="etapa" action="../../../../server/src/etapas/selecionarEtapa.php">
        <h3> <?php echo $row['nomeEtapa']; ?> </h3>

        <p><b>Situação: </b> <?php echo $row['situacao']; ?> </p>

        <input type="hidden" name="id" value="<?php echo $row['idetapaproj'];?>">
        
        <button type="submit" class="btnVerde"> Editar </button>
        <button type="button" class="btnVermelho" onclick="deletarEtapa(<?php echo $row['idetapaproj']; ?>);"> Deletar </button>
    </form>
</div>