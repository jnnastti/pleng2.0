<?php

session_start();

require('./fpdf/fpdf.php');
require('../src/Projeto.php');
require('../src/MaterialEtapa.php');
require('../src/Galeria.php');

require('../config/redireciona.php');

header("Content-type: text/html; charset=utf-8");

if(!isset($_SESSION['projeto'])) {
    redireciona('../../web/pages/projetos/index.php');
}

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../database/pleng.db');
   }
}

$db = new MyDB();


class PDF extends FPDF
{
    function Header()
    {
        global $db;
        
        $data = date('d/m/Y');
        // Logo
        $Galeria = new Galeria($db);
        $foto = $Galeria->selecionarFoto($_GET['foto']);
        
        $this->Image('../../web/pages/galeria/pasta/imgproj/' . $foto['foto'],10,6, 30, 30, '', '');
        
        
        $this->SetFont('Arial','B',8);

        $this->Cell(80);
        $this->Ln(5);

    //     // Title
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,utf8_decode('Relatório de materiais por projeto'),0,5,'C');
        $this->SetFont('Arial','B',10);

        $Projetos = new Projeto($db);

        $projeto = $Projetos->selecionarProjeto($_SESSION['projeto']);

        $this->Cell(0,10,utf8_decode('Projeto: '. $projeto['nome']),0,0,'C');

        $this->SetFont('Arial','B',8);

        $this->Cell(-4,-5, $data,0,5,'R');

        $this->Cell(0,-5,utf8_decode('Página: '.$this->PageNo().' de {nb}'),0,0,'R');

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
        global $db;

        $Projetos = new Projeto($db);

        $projeto = $Projetos->selecionarProjeto($_SESSION['projeto']);

        $this->SetFont('Arial','b',10);
        $this->Cell(92,8,utf8_decode('Projeto: '. $projeto['nome']),0,0,'L');
        $this->Ln();           
        
        // Header
        foreach($header as $col) {
            $this->SetFont('Arial','b',8);
            
            if($col == "Material") {
                $this->Cell(71,8,$col,1);
            } else if($col == "Unidade") {
                $this->Cell(25,8,$col,1);
            } else{
                $this->Cell(45,8,$col,1);
            }
        }

        $this->Ln();           

        $this->SetFont('Arial','',8);

        $MateriaisEtapa = new MaterialEtapa($db);
        
        $material = $MateriaisEtapa->infoMaterialProjeto($_SESSION['projeto']);
        
        while ($mat = $material->fetchArray()) {
            $this->Cell(71,8,utf8_decode($mat['nome']),1);
            $this->Cell(45,8,utf8_decode($mat['qtde_atual']),1, '', 'R');
            $this->Cell(45,8,utf8_decode($mat['qtde_total']),1, '', 'R');
            $this->Cell(25,8,utf8_decode($mat['unidade']),1);
            
            $this->Ln();           
        } 
    }
}


$pdf = new PDF();

// title
$title = 'Relatório de materiais por projeto';
$pdf->SetTitle(utf8_decode($title));

// Iniciar pdf
$pdf->AddPage();
$pdf->AliasNbPages();

$pdf->Ln();

$header = array('Material', 
                 utf8_decode('Qtde. utilizada até o momento'),
                 utf8_decode('Qtde. a ser utilizada até o final'),
                'Unidade');

$pdf->BasicTable($header);

$pdf->Output();
?>
