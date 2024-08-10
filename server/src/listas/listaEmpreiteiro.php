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

    $result = $db->query("SELECT * FROM empreiteiro");

    while ($row = $result->fetchArray()) {
        echo "<option value='" .$row['idemp']. "'";
        if($_SESSION['empProjAtivo'] == $row['idemp']) {
            echo "selected";
        }
        echo">".$row['nome']. "</option>";
    }
}
?>