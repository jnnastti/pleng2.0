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

$material = $_POST['material'];
$grupo = $_POST['grupo'];
$qtde = $_POST['qtde'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("UPDATE qtde_material SET
                            qtde = '$qtde'
                          WHERE idmat = '$material' 
                          AND idgrupo = '$grupo'");

    header('location:../../../web/pages/dadosprecadastrados/materialgrupo/index.php');
}

?>