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

$idgrupo = $_POST['idgrupo'];
$nome = $_POST['nome'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("UPDATE grupo_material SET
                            nome = '$nome'
                          WHERE idgrupo = '$idgrupo'");

    header('location:../../../web/pages/dadosprecadastrados/grupo/index.php');
}

?>