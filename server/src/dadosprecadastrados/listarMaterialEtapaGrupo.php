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

    $result = $db->query("SELECT material.nome, material.idmat FROM material 
    INNER JOIN material_etapa ON material_etapa.idmat = material.idmat 
    WHERE material_etapa.idetapa = " .$_SESSION['idEtapaQtdeMat']);

    while ($row = $result->fetchArray()) {
        echo "<option value='" .$row['idmat']. "'>";
        echo $row['nome']. "</option>";
    }
}
?>