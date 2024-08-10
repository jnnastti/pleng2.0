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
        <tr>
            <td onclick='selecionaDiario(" .$row['iddiario']. ")' class='iddiario'> ".$row['iddiario']." </td>
            <td onclick='selecionaDiario(" .$row['iddiario']. ")' class='nomediario'> ".$row['nome']." </td>
            <td onclick='selecionaDiario(" .$row['iddiario']. ")' class='data'> ".$row['datadiario']." </td>
            <td class='btn'> <a target='_blank' href='../../../../server/src/relatorios/diarioDeObra.php?id=".$row['iddiario']."'>
                <button type='button'> <i class='gg-file-document'></i> </button> </a> </td>
        </tr>
        ";
    }
}

?>