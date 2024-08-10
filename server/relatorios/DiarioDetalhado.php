<?

session_start();

session_start();

require('./fpdf/fpdf.php');

require('../src/Projeto.php');
require('../src/DiarioDeObra.php');
require('../src/PrevisaoTempo.php');
require('../src/EtapaDiario.php');

require('../config/redireciona.php');

header("Content-type: text/html; charset=utf-8");

if(!isset($_SESSION['projeto'])) {
    redireciona('../../web/pages/projetos/index.php');
}

if(!isset($_GET['id'])) {
    redireciona('../../web/pages/diariodeobra/index.php');
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
        $this->Image('../../web/assets/imgs/logo.png',10,6, 30, 30, '', '');
        
        $this->SetFont('Arial','B',8);

        $this->Cell(80);
        $this->Ln(5);

    //     // Title
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,utf8_decode('Relatório do diário de obra'),0,5,'C');
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

        $iddiario = $_GET['id'];

        $Diarios = new DiarioDeObra($db);

        $diario = $Diarios->selecionarDiario($iddiario);


        $this->SetFont('Arial','b',10);

        $this->Cell(78,8,utf8_decode($diario['datadiario']. ' - ' .$diario['nome']),0, 0, 'L');
        $this->Ln();
            
        $this->Line(5, 57, 200, 57);

        $this->Ln();

            // Header
        foreach($header as $col) {
            $this->SetFont('Arial','b',10);

            $this->Cell(31,8,utf8_decode($col),0);
        }

        $this->Ln();

        $this->SetFont('Arial','b',8);
        $this->Cell(31,8,utf8_decode('Manhã'),1);

        $this->SetFont('Arial','',8);

        $PrevisaoTempo = new PrevisaoTempo($db);

        $previsao = $PrevisaoTempo->selecionarPrevisaoTempo($iddiario);

        $this->Cell(31,8,utf8_decode($previsao['temsegmanha']),1, '', 'R');
        $this->Cell(31,8,utf8_decode($previsao['temtermanha']),1, '', 'R');
        $this->Cell(31,8,utf8_decode($previsao['temquamanha']),1, '', 'R');
        $this->Cell(31,8,utf8_decode($previsao['temquimanha']),1, '', 'R');
        $this->Cell(31,8,utf8_decode($previsao['temsexmanha']),1, '', 'R');

        $this->Ln();

        $this->SetFont('Arial','b',8);
        $this->Cell(31,8,utf8_decode('Tarde'),1);
        
        $this->SetFont('Arial','',8);

        $this->Cell(31,8,utf8_decode($previsao['temsegtarde']),1, '', 'R');
        $this->Cell(31,8,utf8_decode($previsao['temtertarde']),1, '', 'R');
        $this->Cell(31,8,utf8_decode($previsao['temquatarde']),1, '', 'R');
        $this->Cell(31,8,utf8_decode($previsao['temquitarde']),1, '', 'R');
        $this->Cell(31,8,utf8_decode($previsao['temsextarde']),1, '', 'R');

        $this->Ln();
        $this->Ln();

        $this->SetFont('Arial','b',10);
        $this->Cell(78,8,utf8_decode('Observação'),0, 0, 'L');
        
        $this->Ln();

        $this->SetFont('Arial','',8);
        $this->MultiCell(186,8,utf8_decode($diario['observacao']),1);

        $this->Ln();

        $this->SetFont('Arial','b',10);
        $this->Cell(78,8,utf8_decode('Etapas alteradas'),0, 0, 'L');
        
        $this->Ln(); 

        $EtapasDiario = new EtapaDiario($db);

        $etapas = $EtapasDiario->selecionarEtapaDiario($iddiario);

        while($etp = $etapas->fetchArray()) {
            $this->SetFont('Arial','b',8);
            $this->Cell(78,8,utf8_decode('Nome: '. $etp['nome']),0, 0, 'L');
            $this->Ln();
            
            $this->SetFont('Arial','b',8);

            $this->Cell(62,8,utf8_decode('Tamanho executado'),1);
            $this->Cell(62,8,utf8_decode('Tamanho total'),1);
            $this->Cell(62,8,utf8_decode('Situação'),1);
            
            $this->Ln();

            $this->SetFont('Arial','',8);

            $this->Cell(62,8,utf8_decode($etp['qtde']),1, '', 'R');
            $this->Cell(62,8,utf8_decode($etp['tamanho_total']),1, '', 'R');

            switch($etp['situacao']) {
                case 'F': {
                    $sit = "Finalizada";
                    break;
                }
                case 'A': {
                    $sit = "Em andamento";
                    break;
                }
                case 'N': {
                    $sit = "Não iniciada";
                    break;
                }
                default: {
                    $sit = "Indefinido";
                }
            }

            $this->Cell(62,8,utf8_decode($sit),1, '', 'R');
            
            $this->Ln();
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