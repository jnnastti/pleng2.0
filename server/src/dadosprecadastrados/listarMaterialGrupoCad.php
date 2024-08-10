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

    $resultGrupo = $db->query('SELECT * FROM material_grupo');

    while($rowGrupo = $resultGrupo->fetchArray()) {

        $resultMat = $db->query("SELECT material_grupo.*, grupo.nome as nomegrupo, material.nome as nomemat FROM material_grupo
                                INNER JOIN grupo ON material_grupo.idgrupo = grupo.idgrupo 
                                INNER JOIN material ON material_grupo.idmat = material.idmat 
                                WHERE material_grupo.idgrupo = " .$rowGrupo['idGrupo'] );

        while ($rowMat = $resultMat->fetchArray()) {

            $idMatGrupo = $rowMat['idmatgrupo'];
            $nomeMatGrupo = $rowMat['nomemat']; 
            
            echo "<div class='items'>";
                echo "<div class='item'>";
                    echo "<div class='field'>";
                        echo "<label> Material cadastrado: </label>";
                        echo "<input type='text' value='$nomeMatGrupo' name='matgrupo' disabled>";
                    echo "</div>";
                echo "</div>"
                echo "<div class='item'>";    
                    echo "<button type='button' class='btnVermelho' onclick='deletarDados($idMatGrupo, 'idmatgrupo', 'material_grupo', 'materialgrupo');'> X </button>";
                echo "</div>";
            echo "</div>";
        }
    }
}

?>