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

$idgrupo = $_SESSION['idGrupoQtdeMat'];
$idetapa = $_SESSION['idEtapaQtdeMat'];
$idmat = $_POST['material'];
$qtde = $_POST['qtde'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("INSERT INTO qtde_material(idgrupo, idmat, idetapa, qtde) 
        VALUES ('".$idgrupo."', '".$idmat."', '".$idetapa."', '".$qtde."')");

    header('location:../../../web/pages/dadosprecadastrados/materiaisetapagrupo/index.php');
}

?>