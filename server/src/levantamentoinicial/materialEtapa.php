<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../../../server/database/pleng.db');
   }
}

$id = $_SESSION['idProjAtivo'];

$db = new MyDB();

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT etapa_projeto.*, etapa.nome as nome_etapa
                           FROM etapa_projeto, etapa WHERE etapa_projeto.idproj = $id 
                           AND etapa_projeto.idetapa = etapa.idetapa");

    while ($row = $result->fetchArray()) {

        echo "<div class='grid-10 etapa'>";
            echo "<label>";
                echo "<h2>" .$row['nome_etapa']. "</h2>";
                echo "<input type='checkbox' />";

                echo "<div class='collapse' id='col3Content'>";
                    echo "<div class='grid-12'>";
                        echo "<div class='grid-10 desc'>";
                            echo "<h4> Descrição </h4>";
                            echo "<p>" .$row['descricao']. "</p>";
                        echo "</div>";
                    echo "</div>";

                    echo "<h3> Materiais </h3>";
                    echo "<table>";

                    $resultMat = $db->query("SELECT etapa_projeto.idetapaproj, 
                                    material_etapa.idmat, 
                                    material.nome as material_nome, 
                                    (qtde_material.qtde * etapa_projeto.tamanho_total) as qtde
                                FROM etapa_projeto
                                INNER JOIN material_etapa ON material_etapa.idetapa = etapa_projeto.idetapa
                                INNER JOIN material ON material.idmat = material_etapa.idmat
                                INNER JOIN qtde_material ON qtde_material.idgrupo = etapa_projeto.idgrupo
                                WHERE etapa_projeto.idetapa =" .$row[idetapa]. 
                                " AND material_etapa.idmat = qtde_material.idmat 
                                AND etapa_projeto.idetapaproj = " .$row['idetapaproj']);
    
                    while($rowMaterial = $resultMat->fetchArray()) {
                        include('./material/index.php');
                    }
                    echo "</table>";
                echo "</div>";
            echo "</label>";
        echo "</div>";
    }
}

?>