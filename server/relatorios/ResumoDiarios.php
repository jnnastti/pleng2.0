<?

session_start();

session_start();

require('./fpdf/fpdf.php');
require('../src/Projeto.php');
require('../src/DiarioDeObra.php');
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
        $this->Cell(0,10,utf8_decode('Relatório geral de diários de obra'),0,5,'C');
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
    function BasicTable()
    {
        global $db;

        $id = $_SESSION['projeto'];

        $Diarios = new DiarioDeObra($db);

        $diario = $Diarios->listarDiario($id);

        while($di = $diario->fetchArray()) {
            $this->SetFont('Arial','b',8);
            $this->Cell(52.5,8,utf8_decode('Data do diário'),1);
            $this->Cell(132.5,8,utf8_decode('Nome'),1);
            $this->Ln(); 

            $this->SetFont('Arial','',8);

            $this->Cell(52.5,8,utf8_decode($di['datadiario']),1);
            $this->Cell(132.5,8,utf8_decode($di['nome']),1);
            $this->Ln(); 

            $this->SetFont('Arial','b',8);

            $this->Cell(185,8,utf8_decode('Observação'),1);
            $this->Ln();     

            $this->SetFont('Arial','',8);

            $this->MultiCell(185,8,utf8_decode($di['observacao']),1);
            $this->Ln();
        }

       
    }
}

$pdf = new PDF();

// Iniciar pdf
$pdf->AddPage();
$pdf->AliasNbPages();

$title = 'Relatório geral de diários de obra';
$pdf->SetTitle(utf8_decode($title));

$pdf->Ln();

$pdf->BasicTable();

$pdf->Output();
?>