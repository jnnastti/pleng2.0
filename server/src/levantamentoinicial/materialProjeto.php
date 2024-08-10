<?php

session_start();

$id = $_SESSION['idProjAtivo'];

$db = new MyDB();

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT * FROM projeto WHERE idproj = $id");

    while ($row = $result->fetchArray()) {
        echo "<div class='grid-12 etapa'>";
            echo "<h2> Projeto: " .$row['nome']. "</h2>";
            echo "<h3> Materiais </h3>";

            echo "<table>";

                $resultMat = $db->query("SELECT material_etapa.idmat, 
                                            material.nome as nome, 
                                            SUM(qtde_material.qtde * etapa_projeto.tamanho_total) as qtde
                                        FROM etapa_projeto
                                        INNER JOIN material_etapa ON material_etapa.idetapa = etapa_projeto.idetapa
                                        INNER JOIN material ON material.idmat = material_etapa.idmat
                                        INNER JOIN qtde_material ON qtde_material.idgrupo = etapa_projeto.idgrupo
                                        WHERE etapa_projeto.idproj = $id 
                                        AND material_etapa.idmat = qtde_material.idmat 
                                        GROUP BY material_etapa.idmat"
                );
    
                while($rowMat = $resultMat->fetchArray()) {
                    include('./materialproj/index.php');
                }

            echo "</table>";

        echo "</div>";
        
    }
}

?>