<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../../server/database/pleng.db');
   }
}

$db = new MyDB();

$projeto = $_SESSION['idProjAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT etapa_projeto.descricao, etapa_projeto.pos,
                            (SELECT etapa_projeto.pos 
                                FROM etapa_projeto 
                                WHERE etapa_projeto.idproj = $projeto 
                                AND etapa_projeto.situacao = 'A' LIMIT 0,1) AS posA 
                            FROM etapa_projeto 
                            WHERE etapa_projeto.idproj = $projeto  
                            AND etapa_projeto.pos = posA-1 
                            OR etapa_projeto.pos = posA+1 
                            OR etapa_projeto.pos = posA 
                            ORDER BY etapa_projeto.pos");

    while ($row = $result->fetchArray()) {
        echo "<span>". $row['descricao'] ."</span>";
    }

    $resultQtde = $db->query("SELECT count(etapa_projeto.situacao) AS qtdeTotal, 
                    (SELECT count(etapa_projeto.situacao) 
                        FROM etapa_projeto WHERE etapa_projeto.situacao = 'F' 
                        AND etapa_projeto.idproj = $projeto) AS qtde
                    FROM etapa_projeto
                    WHERE etapa_projeto.idproj = $projeto limit 1;");

    while($rowPerc = $resultQtde->fetchArray()) {
        echo "<span></span>";
        echo "<span style=width:".number_format($rowPerc['qtde'] * 100 / $rowPerc['qtdeTotal'], 2, ".", " ")."%> 
        </span>";
    }
}
?>