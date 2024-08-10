<div class="grid-6 containerForm">
    <form method="POST" name="editarmaterial" action="../../../../server/src/dadosprecadastrados/cadastrarMaterialGrupo.php">
        <h3> <?php echo $row['nome']; ?> </h3>

        <input type="hidden" value="<?php echo $row['idgrupo']; ?>" name="idgrupo">

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

        <div class="field">
            <label> Quantidade: </label>
            <input type="text" name="qtde">
        </div>

        <div class="grid-12">
            <button type="submit" class="btnVerde"> Adicionar </button>
        </div>

    </form>

    <form method="POST" name="editarmaterial" action="../../../../server/src/dadosprecadastrados/editarMaterialGrupo.php">
        <div>
            <h3> Materiais já cadastrados </h3>
        </div>
        <?php 

            $resultMat = $db->query('SELECT grupo_material.idgrupo as idgrupo, material.nome as nome, material.idmat as idmat, qtde_material.qtde as qtde from grupo_material 
                                    INNER JOIN qtde_material ON grupo_material.idgrupo = qtde_material.idgrupo 
                                    INNER JOIN material ON qtde_material.idmat = material.idmat 
                                    WHERE  grupo_material.idgrupo = ' .$row['idgrupo']);

            while ($rowMat = $resultMat->fetchArray()) {
   
                echo "<div class='items'>";
                    echo "<div class='item'>";
                        echo "<div class='field'>";
                            echo "<input type='text' value='".$rowMat['nome']."' name='matgrupo' readOnly>";
                            echo "<input type='hidden' value='".$rowMat['idmat']."' name='material' readOnly>";
                            echo "<input type='hidden' value='".$rowMat['idgrupo']."' name='grupo' readOnly>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='item'>";
                        echo "<div class='field'>";
                            echo "<input type='text' id='qtde' value='".$rowMat['qtde']."' name='qtde'>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='item'>";    
                        echo "<button type='submit' class='btnVerde'> v </button>";
                    echo "</div>";
                    echo "<div class='item'>";    
                        echo "<button type='button' class='btnVermelho' onclick='deletarMaterialGrupo(".$row['idgrupo'].", ".$rowMat['idmat'].");'> X </button>";
                    echo "</div>";
            echo "</div>";
            }
        ?>
    </form>
</div>