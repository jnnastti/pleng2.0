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

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    
    $result = $db->query('SELECT * FROM projeto WHERE idusu = ' .$_SESSION['idUsuAtivo']);

    while ($row = $result->fetchArray()) {

        $img = $db->query('SELECT * FROM foto WHERE idproj = ' .$row['idproj']. ' LIMIT 0, 1');

        while ($rowImg = $img->fetchArray()) {
            $_SESSION['imgProjetoAtivo'] = $rowImg['imagem'];
        }
        
        include('./projeto/index.php');
    }
}

?>