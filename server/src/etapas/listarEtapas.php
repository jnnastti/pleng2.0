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

    $result = $db->query("SELECT etapa_projeto.*, etapa.nome as nomeEtapa 
                          FROM etapa_projeto, etapa WHERE etapa_projeto.idproj = $id 
                          AND etapa_projeto.idetapa = etapa.idetapa");

    while ($row = $result->fetchArray()) {
        include('./etapa/index.php');
    }
}

?>