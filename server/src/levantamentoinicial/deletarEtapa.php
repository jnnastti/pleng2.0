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

$idetapaproj = $_POST['id'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("DELETE FROM etapa_projeto WHERE idetapaproj = '$idetapaproj'");

    header('location:../../../web/pages/levantamentoinicial/index.php');
}

?>