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

$id = $_SESSION['idDiarioAtivo'];

$data_diario = $_POST['data_diario'];
$nome = $_POST['nome'];
$obs = $_POST['obs'];

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


if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("UPDATE diariodeobra SET
                            datadiario = '$data_diario',
                            nome = '$nome',
                            observacao = '$obs',
                            temsegmanha = '$segManha', 
                            temsegtarde = '$segTarde', 
                            temtermanha = '$terManha', 
                            temtertarde = '$terTarde', 
                            temquamanha = '$quaManha', 
                            temquatarde = '$quaTarde', 
                            temquimanha = '$quiManha', 
                            temquitarde = '$quiTarde', 
                            temsexmanha = '$sexManha', 
                            temsextarde = '$sexTarde'
                          WHERE iddiario = '$id'");

    $result = $db->query("SELECT * FROM diariodeobra WHERE iddiario = '$id'");

    while ($row = $result->fetchArray()) {
       $_SESSION['dataDiarioAtivo'] = $row['datadiario'];
       $_SESSION['nomeDiarioAtivo'] = $row['nome'];
       $_SESSION['obsDiarioAtivo'] = $row['observacao'];

       // dia da semana - periodo. Ex: segm = segunda manhã
       $_SESSION['segmDiarioAtivo'] = $row['tempsegmanha'];
       $_SESSION['segtDiarioAtivo'] = $row['tempsegtarde'];
       $_SESSION['termDiarioAtivo'] = $row['temptermanha'];
       $_SESSION['tertDiarioAtivo'] = $row['temptertarde'];
       $_SESSION['quamDiarioAtivo'] = $row['tempquamanha'];
       $_SESSION['quatDiarioAtivo'] = $row['tempquatarde'];
       $_SESSION['quimDiarioAtivo'] = $row['tempquimanha'];
       $_SESSION['quitDiarioAtivo'] = $row['tempquitarde'];
       $_SESSION['sexmDiarioAtivo'] = $row['tempsexmanha'];
       $_SESSION['sextDiarioAtivo'] = $row['tempsextarde'];
    }

    header('location:../../../web/pages/diariodeobra/editar/index.php');
}

?>