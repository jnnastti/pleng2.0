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

$dados = $_POST['data'];
$infos = json_decode($dados, true);

$etapaSelecionada = $infos['etapa'];
$materialSelecionado = $infos['material'];
$grupo = $infos['grupo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT qtde_material.qtde FROM material
                        INNER JOIN material_etapa ON material.idmat = material_etapa.idmat
                        INNER JOIN qtde_material ON qtde_material.idmat = material_etapa.idmat
                        INNER JOIN etapa_diario ON etapa_diario.idetapa = etapa_diario.idetapa
                        WHERE etapa_diario.idproj = $id 
                        AND etapa_diario.idetapadiario = $etapaSelecionada
                        AND material_etapa.idmat = $materialSelecionado
                        AND qtde_material.idgrupo = $grupo 
                        group by material_etapa.idmat");

    while ($row = $result->fetchArray()) {
        
        echo $row['qtde'];
    }
}

?>