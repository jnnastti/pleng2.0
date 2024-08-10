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
        $this->Cell(0,10,utf8_decode('Relatório de materiais por etapa'),0,5,'C');
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

        $result = $db->query("SELECT etapa_projeto.*, etapa.nome as nome_etapa
                              FROM etapa_projeto, etapa WHERE etapa_projeto.idproj = $id
                              AND etapa_projeto.idetapa = etapa.idetapa");

        while ($row = $result->fetchArray()) {
            $this->SetFont('Arial','b',12);
            $this->Cell(78,8,utf8_decode('> ' .$row['nome_etapa']),0, 0, 'L');
            $this->Ln();

             // Header
            foreach($header as $col) {
                $this->SetFont('Arial','b',11);

                if($col == 'Unidade') {
                    $this->Cell(33,8,$col,1);
                } else {
                    $this->Cell(76,8,$col,1);
                }
            }

            $this->Ln();

            $resultMat = $db->query("SELECT etapa_projeto.idetapaproj, material.unidade, 
                                etapa_projeto.tamanho_total, 
                                material.nome, qtde_material.qtde, 
                                (qtde_material.qtde * etapa_projeto.tamanho_total) as qtde_final 
                                FROM etapa_projeto 
                                INNER JOIN qtde_material ON etapa_projeto.idetapa = qtde_material.idetapa 
                                INNER JOIN material ON qtde_material.idmat = material.idmat 
                                WHERE qtde_material.idgrupo = etapa_projeto.idgrupo  
                                AND etapa_projeto.idetapa = " .$row['idetapa']. "
                                AND etapa_projeto.idetapaproj = " .$row['idetapaproj']);
            
            while($rowMaterial = $resultMat->fetchArray()) {
                $this->SetFont('Arial','',10);

                $this->Cell(76,8,utf8_decode($rowMaterial['nome']),1);
                $this->Cell(33,8,utf8_decode($rowMaterial['unidade']),1);
                $this->Cell(76,8,utf8_decode($rowMaterial['qtde_final']),1);

                $this->Ln();
            }   
            $this->Ln();         
        }   
    }
}

$pdf = new PDF();

// title
$title = 'Relatório de materiais por etapa';
$pdf->SetTitle(utf8_decode($title));

// Iniciar pdf
$pdf->AddPage();
$pdf->AliasNbPages();

$pdf->Ln();

$header = array('Material', 'Unidade', utf8_decode('Quantidade total para a execução'));

$pdf->BasicTable($header);

$pdf->Output();
?>