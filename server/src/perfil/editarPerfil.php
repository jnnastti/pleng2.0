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

$id = $_SESSION['idUsuAtivo'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("UPDATE usuario SET
                            nome = '$nome',
                            email = '$email',
                            senha = '$senha'
                          WHERE idusu = '$id'");

    $result = $db->query("SELECT * FROM usuario WHERE idusu = '$id'");


    while ($row = $result->fetchArray()) {
        $_SESSION['nomeUsuAtivo'] = $row['nome'];
        $_SESSION['emailUsuAtivo'] = $row['email'];
        $_SESSION['senhaUsuAtivo'] = $row['senha'];
    }

    header('location:../../../web/pages/perfil/index.php');
}

?>