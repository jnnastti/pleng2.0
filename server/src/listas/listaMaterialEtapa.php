<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../database/pleng.db');
   }
}

$db = new MyDB();

$id = $_SESSION['idProjAtivo'];

$etapaSelecionada = $_POST['data'];
$etapa = json_decode($etapaSelecionada, true);

if(!$etapa) {
    $etapa = 1;
}

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT material.nome as nome, material_etapa.idmat as idmat FROM material
                        INNER JOIN material_etapa ON material.idmat = material_etapa.idmat
                        INNER JOIN etapa_projeto ON etapa_projeto.idetapa = material_etapa.idetapa
                        WHERE etapa_projeto.idproj = $id AND etapa_projeto.idetapaproj = $etapa");

    while ($row = $result->fetchArray()) {
        echo "<option value='" .$row['idmat']."'";
//         // if($_SESSION['etapaAti'] == $row['idemp']) {
//         //     echo "selected";
//         // }
        echo">".$row['nome']. "</option>";
    }

}
?>