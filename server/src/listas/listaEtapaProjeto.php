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

$id = $_SESSION['idProjAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT etapa.nome as nome, etapa_projeto.idetapaproj as idetapaproj
                          FROM etapa, etapa_projeto 
                          WHERE etapa_projeto.idproj = $id AND etapa_projeto.idetapa = etapa.idetapa");

    while ($row = $result->fetchArray()) {
        echo "<option value='" .$row['idetapaproj']."'";
        if($_SESSION['idEtapaProj'] == $row['idetapaproj']) {
            echo "selected";
        }
        echo">"  .$row['idetapaproj']. " - " .$row['nome']. "</option>";
    }
}
?>