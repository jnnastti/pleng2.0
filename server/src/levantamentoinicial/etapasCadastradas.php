<?php

session_start();

$db = new MyDB();

$id = $_SESSION['idProjAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT etapa_projeto.*, etapa.nome as nome_etapa 
    FROM etapa_projeto, etapa WHERE idproj = $id AND etapa_projeto.idetapa = etapa.idetapa ORDER BY pos ASC");

    while ($row = $result->fetchArray()) {
        include('./etapa/index.php');
    }
}


?>