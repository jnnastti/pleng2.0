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
$projeto = $_SESSION['idProjAtivo'];

$data = array();

if(!$db) {
    echo $db->lastErrorMsg();
} else {
    $result = $db->query("SELECT sum(material.preco) AS preco, etapa.nome as nome,
                            count(etapa_projeto.idetapa), etapa_projeto.idetapa
                            FROM etapa_projeto 
                            INNER JOIN material_etapa ON material_etapa.idetapa = etapa_projeto.idetapa
                            INNER JOIN material ON material.idmat = material_etapa.idmat 
                            INNER JOIN etapa ON etapa.idetapa = material_etapa.idetapa
                            WHERE etapa_projeto.idproj = $projeto 
                            GROUP BY etapa_projeto.idetapa ORDER BY etapa_projeto.pos DESC LIMIT 5;");

    while ($row = $result->fetchArray()) {
        array_push($data, array(utf8_decode($row['nome']),number_format($row['preco'])));
    }   
}


$plot = new PHPlot(820, 250);

$plot->SetPlotType('linepoints');
$plot->SetDataType('text-data');
$plot->SetDataValues($data);

$plot->SetYDataLabelPos('plotin');

$plot->SetDrawXDataLabelLines(True);

$plot->SetMarginsPixels(25, 200, 10, 30);

$plot->SetYTickLabelPos('none');
$plot->SetYTickPos('none');
$plot->SetDrawYGrid(False);

$plot->SetXTickPos('none');
$plot->SetXTickLabelPos('none');

$plot->DrawGraph();
?>