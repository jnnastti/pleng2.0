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

$id = $_SESSION['idProjAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {
    $result = $db->query("SELECT etapa_projeto.*, etapa.nome as nome_etapa
                           FROM etapa_projeto, etapa WHERE etapa_projeto.idproj = $id 
                           AND etapa_projeto.idetapa = etapa.idetapa 
                           AND etapa_projeto.situacao = 'F'");

    while ($row = $result->fetchArray()) {
        $resultMat = $db->query("SELECT etapa_projeto.idetapaproj, material.nome as nome,  
                    (qtde_material.qtde * etapa_projeto.tamanho_total) as qtde_final 
                    FROM etapa_projeto 
                    INNER JOIN qtde_material ON etapa_projeto.idetapa = qtde_material.idetapa 
                    INNER JOIN material ON qtde_material.idmat = material.idmat 
                    AND etapa_projeto.idetapaproj = " .$row['idetapaproj']);
    
                    while($rowMaterial = $resultMat->fetchArray()) {
                        array_push($data, array(utf8_decode($rowMaterial['nome']), $rowMaterial['qtde_final']));
                    }
        
    }   
}

$plot = new PHPlot(750,500);

function mycallback($str)
{
    list($percent, $label) = explode(' ', $str, 2);
    return sprintf('(%.1f%%) %s ', $percent, $label);
}

$plot->SetPlotType('pie');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);

$plot->SetBackgroundColor('yellow');
$plot->SetTransparentColor('yellow');

$plot->SetPieLabelType(array('percent', 'label'), 'custom', 'mycallback');
$plot->DrawGraph();
?>