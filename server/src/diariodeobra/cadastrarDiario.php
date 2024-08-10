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

$data = $_POST['data_diario'];
$nome = $_POST['nome'];
$observacao = $_POST['obs'];

$segManha = $_POST['climasegundamanha'];
$segTarde = $_POST['climasegundatarde'];
$terManha = $_POST['climatercamanha'];
$terTarde = $_POST['climatercatarde'];
$quaManha = $_POST['climaquartamanha'];
$quaTarde = $_POST['climaquartarde'];
$quiManha = $_POST['climaquintamanha'];
$quiTarde = $_POST['climaquintatarde'];
$sexManha = $_POST['climasextamanha'];
$sexTarde = $_POST['climasextatarde'];

$projeto = $_SESSION['idProjAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("INSERT INTO diariodeobra(datadiario, nome, observacao, temsegmanha, temsegtarde, temtermanha, temtertarde, temquamanha, temquatarde, temquimanha, temquitarde, temsexmanha, temsextarde, idproj) 
    VALUES ('".$data."', '".$nome."', '".$observacao."', '".$segManha."', '".$segTarde."', '".$terManha."', '".$terTarde."', '".$quaManha."', '".$quaTarde."', '".$quiManha."', '".$quiTarde."', '".$sexManha."', '".$sexTarde."', $projeto)");

    $result = $db->query("SELECT * FROM diariodeobra WHERE idproj = '$id' 
                          AND iddiario = (SELECT MAX(iddiario) FROM diariodeobra)");

    while ($row = $result->fetchArray()) {
        $_SESSION['idDiarioAtivo'] = $row['iddiario'];
    }
    header('location:../../../web/pages/diariodeobra/etapasCadastro/index.php');
}


?>