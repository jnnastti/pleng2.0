<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../../../server/database/pleng.db');
   }
}

$db = new MyDB();

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT * FROM material");

    while ($row = $result->fetchArray()) {
        echo "<option value='" .$row['idmat']. "'";
        // if($_SESSION['etapaAti'] == $row['idemp']) {
        //     echo "selected";
        // }
        echo">".$row['nome']. "</option>";
    }
}
?>