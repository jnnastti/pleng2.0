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

$idetapaproj = $_POST['id'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT etapa_projeto.*, etapa.nome as nomeEtapa 
    FROM etapa_projeto, etapa WHERE etapa_projeto.idetapaproj = '$idetapaproj' 
    AND etapa_projeto.idetapa = etapa.idetapa");

    while($row = $result->fetchArray()) {
      $_SESSION['nomeEtapaEpAtiva'] = $row['nomeEtapa'];
      $_SESSION['idEtapaEpAtiva'] = $row['idetapa'];
      $_SESSION['idEtapaProjEpAtiva'] = $row['idetapaproj'];
      $_SESSION['tamanhoEtapaEpAtiva'] = $row['tamanho_total'];
      $_SESSION['unidadeEtapaEpAtiva'] = $row['unidade'];
      $_SESSION['posEtapaEpAtiva'] = $row['pos'];
      $_SESSION['situacaoEtapaEpAtiva'] = $row['situacao'];
      $_SESSION['descricaoEtapaEpAtiva'] = $row['descricao'];
    }

    header('location:../../../web/pages/etapas/editar/index.php');
}


?>