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

$diario =  $_SESSION['idDiarioAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT etapa_diario.idetapadiario as idetapadiario, 
                        etapa_diario.idgrupo as idgrupo, 
                        etapa_diario.tamanho_total as tamanho_total, 
                        etapa_diario.tamanho_atual as tamanho_atual, 
                        etapa_diario.idetapa as idetapa, etapa.nome as nomeetapa
                        FROM etapa_diario, etapa WHERE iddiario = $diario AND 
                        etapa_diario.idetapa = etapa.idetapa");

    while ($row = $result->fetchArray()) {
        include('./etapa/index.php');
    }
}

?>