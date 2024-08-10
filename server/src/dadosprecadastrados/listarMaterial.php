<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
    $this->open('../../../../server/database/pleng.db');
   }
}

$db2 = new MyDB();

if(!$db2) {
    echo $db2->lastErrorMsg();
} else {

    $resultMat = $db2->query('SELECT * FROM material');

    while ($row = $resultMat->fetchArray()) {
        
        include('./material/index.php');
    }
}

?>