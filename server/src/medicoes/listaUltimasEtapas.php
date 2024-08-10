<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../../server/database/pleng.db');
   }
}

$db = new MyDB();

$id = $_SESSION['idProjAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT * from diariodeobra order by datadiario desc limit 5");

    while ($row = $result->fetchArray()) {
        
        echo "
        <tr>
            <td> ".$row['iddiario']." </td>
            <td class='etapa'> ".$row['nome']." </td>
            <td class='data'> ".$row['datadiario']." </td>
        </tr>
        ";

    }
}

?>