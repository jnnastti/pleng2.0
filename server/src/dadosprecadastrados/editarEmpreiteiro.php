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

$idemp = $_POST['idemp'];
$nome = $_POST['nome'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("UPDATE empreiteiro SET
                            nome = '$nome'
                          WHERE idemp = '$idemp'");

    header('location:../../../web/pages/dadosprecadastrados/empreiteiro/index.php');
}

?>