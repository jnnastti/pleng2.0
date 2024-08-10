<?php

require_once '../../phplot-6.2.0/phplot.php';

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../database/pleng.db');
   }
}

$db = new MyDB();

$data = array();
$legenda = array();
$barras = array();

if(!$db) {
    echo $db->lastErrorMsg();
} else {

  $result = $db->query('SELECT * FROM projeto WHERE idusu = ' .$_SESSION['idUsuAtivo']);

  while ($row = $result->fetchArray()) {

    $resultPerc = $db->query("SELECT count(etapa_projeto.situacao) AS qtdeTotal, 
                              (SELECT count(etapa_projeto.situacao) from etapa_projeto 
                                WHERE etapa_projeto.situacao = 'F' AND etapa_projeto.idproj = ".$row['idproj'].") as qtde
                              FROM etapa_projeto
                              WHERE etapa_projeto.idproj = " .$row['idproj'] ." LIMIT 10");

    while ($rowPerc = $resultPerc->fetchArray()) {
      $porcentagem = number_format($rowPerc['qtde'] * 100 / $rowPerc['qtdeTotal'], 2, ".", " ");
    }
    
    array_push($data, array($row['nome'],$porcentagem));

    array_push($legenda, $row['nome']);
  }



}

$p = new PHPlot(1100, 400);

$p->SetPlotType('bars');

$p->SetMarginsPixels(25, 200, 10, 30);

$p->SetLegend($legenda);
$p->SetLegendpixels(920,10);

$p->SetYDataLabelPos('plotin');

$p->SetDataType('text-data');
$p->SetDataValues($data);

$p->SetDataColors('blue');

$p->SetXDataLabelPos('plotdown');
$p->SetXTickPos('none');
$p->SetXTickLabelPos('none');

$p->DrawGraph();