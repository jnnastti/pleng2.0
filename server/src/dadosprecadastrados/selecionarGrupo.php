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

$_SESSION['idGrupoQtdeMat'] = $_POST['idgrupo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    header('location:../../../web/pages/dadosprecadastrados/etapagrupo/index.php');
}
?>