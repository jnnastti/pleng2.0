<?php

session_start();

require('./fpdf/fpdf.php');

require('../src/Projeto.php');
require('../src/Galeria.php');
require('../src/Orcamento.php');

require('../config/redireciona.php');

header("Content-type: text/html; charset=utf-8");

if(!isset($_SESSION['projeto'])) {
    redireciona('../../web/pages/projetos/index.php');
}

if(!isset($_GET['id'])) {
    redireciona('../../web/pages/orcamento/index.php');
}

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../database/pleng.db');
   }
}

$db = new MyDB();

$orcamento = new Orcamento($db);

$orcamentoInfos = $orcamento->gerarInfosRelatorio($_GET['id']);

class PDF extends FPDF
{
    function Header()
    {
        global $db;

        global $orcamentoInfos;
        
        $data = date('d/m/Y');
        // Logo
        $Galeria = new Galeria($db);
        $foto = $Galeria->selecionarFoto($_GET['foto']);
        
        $this->Image('../../web/pages/galeria/pasta/imgproj/' . $foto['foto'],10,6, 30, 30, '', '');
        
        
        $this->SetFont('Arial','B',8);

        $this->Cell(80);
        $this->Ln(5);

        // Title
        while($inf = $orcamentoInfos->fetchArray()) {
            $nomeEtapa = $inf['etapa'];
        }

        $this->SetFont('Arial','B',15);
        $this->Cell(0,5,utf8_decode('Orçamento detalhado da etapa'),0,5,'C');
        $this->Cell(0,7,utf8_decode($nomeEtapa),0,5,'C');
        $this->SetFont('Arial','B',10);

        $Projetos = new Projeto($db);

        $projeto = $Projetos->selecionarProjeto($_SESSION['projeto']);

        $this->Cell(0,10,utf8_decode('Projeto: '. $projeto['nome']),0,0,'C');

        $this->SetFont('Arial','B',8);

        $this->Cell(-4,-5, $data,0,5,'R');

        $this->Cell(0,-10,utf8_decode('Página: '.$this->PageNo().' de {nb}'),0,0,'R');

        $this->Ln(30);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Pleng - Planejamento de engenharia',0,0,'C');
    }

    // Simple table
    function BasicTable($header)
    {

        global $orcamentoInfos;

        // Header
        foreach($header as $col) {
            $this->SetFont('Arial','b',10);

            switch($col) {
                case 'Material': {
                    $this->Cell(45,8,utf8_decode($col),0);
                    break;
                }
                case 'Fornecedor': {
                    $this->Cell(35,8,utf8_decode($col),0);
                    break;
                }
                case 'Data': {
                    $this->Cell(25,8,utf8_decode($col),0);
                    break;
                }
                case 'Valor': {
                    $this->Cell(25,8,utf8_decode($col),0);
                    break;
                }
                default: {
                    $this->Cell(30,8,utf8_decode($col),0);
                    break;

                }
            }
        }

        while($inf = $orcamentoInfos->fetchArray()) {
            $this->SetFont('Arial','b',10);

            $this->Ln();
            
            $this->SetFont('Arial','',8);
            
            $this->Cell(45,8,utf8_decode($inf['material']),1, '', 'l');
            $this->Cell(30,8,utf8_decode(number_format($inf['qtde_comprada'], 2, ',', '.')),1, '', 'R');
            $this->Cell(30,8,utf8_decode(number_format($inf['qtde_faltante'], 2, ',', '.')),1, '', 'R');
            $this->Cell(25,8,utf8_decode(date('d/m/Y', strtotime($inf['data_compra']))),1, '', 'R');
            $this->Cell(25,8,utf8_decode('R$ '. number_format($inf['valor_compra'], 2, ',', '.')),1, '', 'R');
            $this->Cell(35,8,utf8_decode($inf['fornecedor']),1, '', 'l');
        }
            
    }

}


$pdf = new PDF();

// title
$title = 'Relatório de orçamento';
$pdf->SetTitle(utf8_decode($title));

// Iniciar pdf
$pdf->AddPage();
$pdf->AliasNbPages();

$pdf->Ln();

$header = array('Material', 'Qtde. comp.', 'Qtde. falt.', 'Data', 'Valor', 'Fornecedor',);

$pdf->BasicTable($header);

$pdf->Output();

?>