<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../database/pleng.db');
   }
}

$db = new MyDB();

$idproj = $_SESSION['idProjAtivo'];
$iddiario = $_SESSION['idDiarioAtivo'];

$idetapadiario = $_POST['etapadiario'];

$idetapaproj = $_POST['etapa'];
$idmaterial = $_POST['material'];
$tamanho_atual = $_POST['tamanhoatual'];
$qtde_atual = $_POST['qtdematatual'];

$page = $_POST['Editar'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    if($page === 'editar') {
        $result = $db->query("UPDATE etapa_diario SET
                        tamanho_atual = '$tamanho_atual' 
                        WHERE idproj = '$idproj' 
                        AND idetapadiario = '$idetapadiario'"); 

    } else if($page === 'etapaCadastro'){
        // atualizar a etapa projeto
        $result = $db->query("UPDATE etapa_projeto SET
                        tamanho_atual = '$tamanho_atual' 
                        WHERE idproj = '$idproj' 
                        AND idetapaproj = '$idetapaproj'");    

    // salvar a quantidade de material da etapa do projeto
    $result = $db->query("SELECT material_etapa.idmatetapa as idmatetapa FROM material_etapa
                        INNER JOIN etapa_projeto ON etapa_projeto.idetapa = material_etapa.idetapa
                        WHERE etapa_projeto.idproj = $idproj
                        AND etapa_projeto.idetapaproj = $idetapaproj
                        AND material_etapa.idmat = $idmaterial");

    while ($row = $result->fetchArray()) {
        $idmatetapa = $row['idmatetapa'];

        $resultMep = $db->query("SELECT COUNT(idmep) as contador FROM material_etapa_proj 
                            WHERE idproj = $idproj AND idmatetapa = $idmatetapa");

        // verificar se o material já existe, assim, atualizar
         while ($rowMep = $resultMep->fetchArray()) {
            if($rowMep['contador'] > 0) {
                $resultUp = $db->query("UPDATE material_etapa_proj SET
                                    qtde_atual = '$qtde_atual'
                                    WHERE idproj = $idproj AND
                                    idmatetapa = $idmatetapa");
                
            } else {
                $resultIn = $db->query("INSERT INTO material_etapa_proj(idproj, idmatetapa, qtde_atual)
                                        VALUES('".$idproj."', '".$idmatetapa."', '".$qtde_atual."')");
            }
        }
    }

    }

    // adicionar no etapa_diario para gerar o historico de edição das etapas
    $result = $db->query("INSERT INTO etapa_diario(idetapa, tamanho_total, unidade, pos, situacao, descricao, idproj, idgrupo, tamanho_atual)
                            SELECT idetapa, tamanho_total, unidade, pos, situacao, descricao, idproj, idgrupo, tamanho_atual FROM etapa_projeto 
                            WHERE etapa_projeto.idetapaproj = $idetapaproj");
    
    $resultDiario = $db->query("SELECT * FROM diariodeobra WHERE idproj = '$idproj' 
                          AND iddiario = (SELECT MAX(iddiario) FROM diariodeobra)");

    while ($row = $resultDiario->fetchArray()) {
        $resultUp = $db->query("UPDATE etapa_diario SET 
                        iddiario =  ". $row['iddiario'] ."
                        WHERE idetapadiario = (SELECT MAX(idetapadiario) from etapa_diario)");
    }

    if($page === 'editar') {
        header('location:../../../web/pages/diariodeobra/editar/index.php');   
    } else if($page === 'etapaCadastro'){
        header('location:../../../web/pages/diariodeobra/etapascadastro/index.php');    
    }

    }

?>