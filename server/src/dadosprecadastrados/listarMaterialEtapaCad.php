<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../../../server/database/pleng.db');
   }
}

$db = new MyDB();

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $resultEtapa = $db->query('SELECT * FROM material_etapa');

    while($rowEtapa = $resultEtapa->fetchArray()) {

        $resultMat = $db->query("SELECT material_etapa.*, etapa.nome as nomeetapa, material.nome as nomemat FROM material_etapa
                                INNER JOIN etapa ON material_etapa.idetapa = etapa.idetapa 
                                INNER JOIN material ON material_etapa.idmat = material.idmat 
                                WHERE material_etapa.idetapa = " .$rowEtapa['idetapa'] );

        while ($rowMat = $resultMat->fetchArray()) {

            $idMatEtapa = $rowMat['idmatetapa'];
            $nomeMatEtapa = $rowMat['nomemat']; 
            
            echo "<div class='items'>";
                echo "<div class='item'>";
                    echo "<div class='field'>";
                        echo "<label> Material cadastrado: </label>";
                        echo "<input type='text' value='$nomeMatEtapa' name='matetapa' disabled>";
                    echo "</div>";
                echo "</div>"
                echo "<div class='item'>";    
                    echo "<button type='button' class='btnVermelho' onclick='deletarDados($idMatEtapa, 'idmatetapa', 'material_etapa', 'materialetapa');'> X </button>";
                echo "</div>";
            echo "</div>";
        }
    }
}

?>