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

$_SESSION['idEtapaQtdeMat'] = $_POST['idetapa'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    header('location:../../../web/pages/dadosprecadastrados/materiaisetapagrupo/index.php');
}
?>