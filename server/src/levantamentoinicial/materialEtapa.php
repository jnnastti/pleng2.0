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

                    $resultMat = $db->query("SELECT etapa_projeto.idetapaproj, etapa_projeto.tamanho_total, material.nome, qtde_material.qtde, 
                    (qtde_material.qtde * etapa_projeto.tamanho_total) as qtde_final 
                    FROM etapa_projeto 
                    INNER JOIN qtde_material ON etapa_projeto.idetapa = qtde_material.idetapa 
                    INNER JOIN material ON qtde_material.idmat = material.idmat 
                    WHERE qtde_material.idgrupo = etapa_projeto.idgrupo  
                    AND etapa_projeto.idetapa = " .$row['idetapa']. "
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