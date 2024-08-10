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
    // Page header
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
        $iddiario = $_GET['id'];

        $result = $db->query("SELECT * FROM diariodeobra WHERE iddiario = $iddiario");

        while ($row = $result->fetchArray()) {
            $this->SetFont('Arial','b',12);
            $this->Cell(78,8,utf8_decode($row['data']. ' - ' .$row['nome']),0, 0, 'L');
            $this->Ln();
            
            $this->Line(5, 57, 200, 57);

            $this->Ln();

             // Header
            foreach($header as $col) {
                $this->SetFont('Arial','b',11);

                if($col == 'Periodo')  {
                    $this->Cell(30,8,utf8_decode($col),0);
                } else{
                    $this->Cell(31,8,utf8_decode($col),0);
                }
            }

            $this->Ln();

            $this->SetFont('Arial','b',10);

            $this->Cell(30,8,utf8_decode('Manhã'),1);
            $this->SetFont('Arial','',10);

            $this->Cell(31,8,utf8_decode($row['temsegmanha']),1);
            $this->Cell(31,8,utf8_decode($row['temtermanha']),1);
            $this->Cell(31,8,utf8_decode($row['temquamanha']),1);
            $this->Cell(31,8,utf8_decode($row['temquimanha']),1);
            $this->Cell(31,8,utf8_decode($row['temsexmanha']),1);

            $this->Ln();

            $this->SetFont('Arial','b',10);

            $this->Cell(30,8,utf8_decode('Tarde'),1);
            $this->SetFont('Arial','',10);

            $this->Cell(31,8,utf8_decode($row['temsegtarde']),1);
            $this->Cell(31,8,utf8_decode($row['temtertarde']),1);
            $this->Cell(31,8,utf8_decode($row['temquatarde']),1);
            $this->Cell(31,8,utf8_decode($row['temquitarde']),1);
            $this->Cell(31,8,utf8_decode($row['temsextarde']),1);

            $this->Ln();
            $this->Ln();

            $this->SetFont('Arial','b',11);
            $this->Cell(78,8,utf8_decode('Observação'),0, 0, 'L');
            $this->Ln();

            $this->SetFont('Arial','',10);
            $this->MultiCell(185,8,utf8_decode($row['observacao']),1);

            $this->Ln();
            $this->Ln();

            $this->SetFont('Arial','b',12);
            $this->Cell(78,8,utf8_decode('Etapas alteradas'),0, 0, 'L');
            $this->Ln(); 

            $resultEtapa = $db->query("SELECT etapa_diario.*, etapa.nome FROM etapa_diario, 
                                etapa WHERE iddiario = $iddiario and etapa_diario.idetapa = etapa.idetapa");

            while ($rowEtapa = $resultEtapa->fetchArray()) {
                $this->SetFont('Arial','b',11);
                $this->Cell(78,8,utf8_decode('Nome: '. $rowEtapa['nome']),0, 0, 'L');
                $this->Ln();
                
                $this->SetFont('Arial','b',10);

                $this->Cell(37,8,utf8_decode('Tamanho atual'),1);
                $this->Cell(37,8,utf8_decode('Tamanho total'),1);
                $this->Cell(37,8,utf8_decode('Unidade'),1);
                $this->Cell(37,8,utf8_decode('Posição'),1);
                $this->Cell(37,8,utf8_decode('Situação'),1);
                $this->Ln();

                $this->SetFont('Arial','',10);

                $this->Cell(37,8,utf8_decode($rowEtapa['tamanho_atual']),1);
                $this->Cell(37,8,utf8_decode($rowEtapa['tamanho_total']),1);
                $this->Cell(37,8,utf8_decode($rowEtapa['unidade']),1);
                $this->Cell(37,8,utf8_decode($rowEtapa['pos']),1);
                $this->Cell(37,8,utf8_decode($rowEtapa['situacao']),1);
                $this->Ln();

                $this->SetFont('Arial','b',10);

                $this->Cell(185,8,utf8_decode('Descrição'),1);
                $this->Ln();

                $this->SetFont('Arial','',10);

                $this->MultiCell(185,8,utf8_decode($rowEtapa['descricao']),1);
                $this->Ln();

            }

        }   
        
    }
}

$pdf = new PDF();

// title
$title = 'Relatório de diário de obra';
$pdf->SetTitle(utf8_decode($title));

// Iniciar pdf
$pdf->AddPage();
$pdf->AliasNbPages();

$pdf->Ln();

$header = array('Periodo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta');

$pdf->BasicTable($header);

$pdf->Output();
?>