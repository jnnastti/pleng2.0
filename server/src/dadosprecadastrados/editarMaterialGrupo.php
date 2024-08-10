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

$idqtde = $_POST['idqtde'];
$material = $_POST['material'];
$qtde = $_POST['qtde'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("UPDATE qtde_material SET
                            qtde = '$qtde'
                          WHERE idqtde = '$idqtde'");

    header('location:../../../web/pages/dadosprecadastrados/materiaisetapagrupo/index.php');
}

?>