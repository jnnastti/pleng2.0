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

    $result = $db->query('SELECT etapa.idetapa as idetapa, etapa.nome as nome 
                    FROM etapa');

    while($row = $result->fetchArray()) {
        include('./materialetapa/index.php');
    }
  
}

?>