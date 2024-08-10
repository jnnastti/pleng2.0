<form method="POST" name="etapadiariodeobra" action="../../../../server/src/diariodeobra/editarEtapa.php" class="formEtapa">
    <div class="etapa">
        <label>
            <h2> <?php echo $row['nomeetapa'];?> </h2>
            <input type="checkbox" />
            
            <div class="collapse" id="col3Content">

                    
                <div class="items">
                    <div class="item">
                        <div class="field">
                            <label> Etapa: </label>
                            <input type="text" value="<?php echo $row['nomeetapa']; ?>" disabled>
                            <input type="hidden" value="<?php echo $row['idetapadiario']; ?>" id="etapa" name="etapadiario">
                            <input type="hidden" value="<?php echo $row['idgrupo']; ?>" id="grupo" name="grupo">
                        </div>
                    </div>
                    <div class="item">
                        <div class="field">
                            <label> Material: </label>
                            <select id="material" name="material" onchange="editarQtdeMaterial()">

                            <?php
                                $resultMat = $db->query("SELECT material_etapa.*, etapa.nome as nomeetapa, material.idmat as idmat, 
                                material.nome as nomemat FROM material_etapa
                                INNER JOIN etapa ON material_etapa.idetapa = etapa.idetapa 
                                INNER JOIN material ON material_etapa.idmat = material.idmat 
                                WHERE material_etapa.idetapa = " .$row['idetapa']);
        
                                while ($rowMat = $resultMat->fetchArray()) {
                                    echo "<option value='" .$rowMat['idmat']. "'>" .$rowMat['nomemat']. "</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="items">
                    <div class="item">
                        <div class="field">
                            <label> Quantidade de material usado até agora: </label>
                            <input type="text" name="qtdematatual" value="0"/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="field">
                            <div class="field">
                                <label> Quantidade de material a ser usado até a finalização: </label>
                                <input type="text" name="qtdemattotal" id="qtdemattotal" readonly />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="items">
                    <div class="item">
                        <div class="field">
                            <label> Tamanho concluido: </label>
                            <input type="text" name="tamanhoatual" value="<?php echo $row['tamanho_atual']; ?>" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="field">
                            <div class="field">
                                <label> Tamanho total: </label>
                                <input type="text" name="tamanhototal" value="<?php echo $row['tamanho_total']?>" readonly />
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" value="editar" name="Editar">

                <div class="grid-12">
                    <button type="button" class="grid-4 btnVermelho" onclick="excluirEtapa(<?php echo $row['idetapadiario'] ?>);"> Excluir </button>
                    <div class="botoes">
                        <button type="submit" class="btnVerde"> Salvar </button>
                    </div>
                </div>
            </div>
        </label>
    </div>
</form>