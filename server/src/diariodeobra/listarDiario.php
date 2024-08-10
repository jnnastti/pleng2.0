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

    $result = $db->query("SELECT * FROM diariodeobra WHERE idproj = $id ORDER BY datadiario DESC");

    while ($row = $result->fetchArray()) {

        echo "
        <tr onclick='selecionaDiario(" .$row['iddiario']. ")'>
            <td class='iddiario'> ".$row['iddiario']." </td>
            <td class='nomediario'> ".$row['nome']." </td>
            <td class='data'> ".$row['datadiario']." </td>
        </tr>
        ";
    }
}

?>