<?php

session_start();

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT * FROM grupo_material");

    while ($row = $result->fetchArray()) {
        echo "<option value='" .$row['idgrupo']. "'";
        // if($_SESSION['etapaAti'] == $row['idemp']) {
        //     echo "selected";
        // }
        echo">".$row['nome']. "</option>";
    }
}
?>