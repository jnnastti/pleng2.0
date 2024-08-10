<?

session_start();

require('../../fpdf/fpdf.php');

header("Content-type: text/html; charset=utf-8");

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../database/pleng.db');
   }
}

class PDF extends FPDF
{

    function Header()
    {
        $data = date('d/m/Y');
        // Logo
        $this->Image('../../../web/assets/imgs/logo.png',10,6, 30, 30, '', '');
        
        $this->SetFont('Arial','B',8);

        $this->Cell(80);
        $this->Ln(5);

        // Title
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,utf8_decode('Relatório de diário de obra'),0,5,'C');
        $this->SetFont('Arial','B',10);

        $db = new MyDB();
        $idproj = $_SESSION['idProjAtivo'];
        $resultTitle = $db->query("SELECT * FROM projeto WHERE idproj = $idproj");

        while ($rowTitle = $resultTitle->fetchArray()) {
            $this->Cell(0,10,utf8_decode('Projeto: '. $rowTitle['nome']),0,0,'C');

        }

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
        $db = new MyDB();
        $id = $_SESSION['idProjAtivo'];

        $result = $db->query("SELECT * FROM diariodeobra WHERE idproj = $id");

        while ($row = $result->fetchArray()) {
                $this->SetFont('Arial','b',10);

                $this->Cell(52.5,8,utf8_decode('Data do diário'),1);
                $this->Cell(132.5,8,utf8_decode('Nome'),1);
                $this->Ln(); 

                $this->SetFont('Arial','',10);

                $this->Cell(52.5,8,utf8_decode($row['datadiario']),1);
                $this->Cell(132.5,8,utf8_decode($row['nome']),1);
                $this->Ln(); 

                $this->SetFont('Arial','b',10);

                $this->Cell(185,8,utf8_decode('Observação'),1);
                $this->Ln();     

                $this->SetFont('Arial','',10);

                $this->MultiCell(185,8,utf8_decode($row['observacao']),1);
                $this->Ln();     
        }   
    }
}

$pdf = new PDF();

// Iniciar pdf
$pdf->AddPage();
$pdf->AliasNbPages();

$title = 'Relatório de diário de obra';
$pdf->SetTitle(utf8_decode($title));

$pdf->Ln();

$pdf->BasicTable($header);

$pdf->Output();
?>