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

$idproj = $_SESSION['idProjAtivo'];

$iddiario = $_POST['data'];
$diario = json_decode($iddiario, true);

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT * FROM diariodeobra WHERE iddiario = $diario");

    while ($row = $result->fetchArray()) {

       $_SESSION['idDiarioAtivo'] = $row['iddiario'];
       $_SESSION['dataDiarioAtivo'] = $row['datadiario'];
       $_SESSION['nomeDiarioAtivo'] = $row['nome'];
       $_SESSION['obsDiarioAtivo'] = $row['observacao'];

       // dia da semana - periodo. Ex: segm = segunda manhã
       $_SESSION['segmDiarioAtivo'] = $row['temsegmanha'];
       $_SESSION['segtDiarioAtivo'] = $row['temsegtarde'];
       $_SESSION['termDiarioAtivo'] = $row['temtermanha'];
       $_SESSION['tertDiarioAtivo'] = $row['temtertarde'];
       $_SESSION['quamDiarioAtivo'] = $row['temquamanha'];
       $_SESSION['quatDiarioAtivo'] = $row['temquatarde'];
       $_SESSION['quimDiarioAtivo'] = $row['temquimanha'];
       $_SESSION['quitDiarioAtivo'] = $row['temquitarde'];
       $_SESSION['sexmDiarioAtivo'] = $row['temsexmanha'];
       $_SESSION['sextDiarioAtivo'] = $row['temsextarde'];
    }
}
?>