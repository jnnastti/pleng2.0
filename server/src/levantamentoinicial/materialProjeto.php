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

                $resultMat = $db->query("SELECT etapa_projeto.tamanho_total, material.nome, qtde_material.qtde, (qtde_material.qtde * etapa_projeto.tamanho_total) as qtde_final, 
                SUM(qtde_material.qtde * etapa_projeto.tamanho_total) as soma  
                FROM etapa_projeto 
                INNER JOIN qtde_material ON etapa_projeto.idetapa = qtde_material.idetapa 
                INNER JOIN material ON qtde_material.idmat = material.idmat 
                WHERE etapa_projeto.idproj = $id group by qtde_material.idmat"
                );
    
                while($rowMat = $resultMat->fetchArray()) {
                    include('./materialproj/index.php');
                }

            echo "</table>";

        echo "</div>";
        
    }
}

?>