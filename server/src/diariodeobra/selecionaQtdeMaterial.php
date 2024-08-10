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
                            INNER JOIN etapa_projeto ON etapa_projeto.idetapa = material_etapa.idetapa
                            WHERE etapa_projeto.idproj = $id 
                            AND etapa_projeto.idetapaproj = $etapaSelecionada 
                            AND material_etapa.idmat = $materialSelecionado 
                            AND qtde_material.idgrupo = $grupo");

    while ($row = $result->fetchArray()) {
        echo $row['qtde'];
    }
}

?>