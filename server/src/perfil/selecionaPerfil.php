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

$idusu = $_SESSION['idUsuAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT * FROM usuario WHERE idusu = '$idusu'");

    while ($row = $result->fetchArray()) {
        $_SESSION['nomeUsuAtivo'] = $row['nome'];
        $_SESSION['emailUsuAtivo'] = $row['email'];
        $_SESSION['senhaUsuAtivo'] = $row['senha'];
    }

    header('location:../../../web/pages/perfil/index.php');
}
?>