<div class="grid-4">
    <form method="POST" name="editarmaterial" action="../../../../server/src/dadosprecadastrados/cadastrarMaterialEtapa.php">
        <h3> <?php echo $row['nome']; ?> </h3>

        <input type="hidden" value="<?php echo $row['idetapa']; ?>" name="idetapa">

        <div class="field">
            <label> Material: </label>
            <select name="material">
            <?php 

                $resultMat = $db->query('SELECT * FROM material');

                while ($rowMat = $resultMat->fetchArray()) {
                    
                    echo "<option value = '" .$rowMat['idmat']. "'>" .$rowMat['nome']. "</option>";
                }

                ?>
            </select>
        </div>
        
        <div class="grid-12">
            <button type="submit" class="btnVerde"> Adicionar </button>
        </div>

        <div>
            <h3> Materiais já cadastrados </h3>
        </div>
        <?php 

            $resultMat = $db->query('SELECT material_etapa.idmat as idmat, material.nome as nome FROM material_etapa 
                                    INNER JOIN material ON material.idmat = material_etapa.idmat 
                                    WHERE material_etapa.idetapa = ' .$row['idetapa']);

            while ($rowMat = $resultMat->fetchArray()) {
                
                echo "<div class='items'>";
                echo "<div class='item'>";
                    echo "<div class='field'>";
                        echo "<input type='text' value='".$rowMat['nome']."' name='matetapa' disabled>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='item'>";    
                    echo "<button type='button' class='btnVermelho dell' onclick='deletarMaterialEtapa(".$row['idetapa'].", ".$rowMat['idmat'].");'> X </button>";
                echo "</div>";
            echo "</div>";
            }
        ?>
    </form>
</div>