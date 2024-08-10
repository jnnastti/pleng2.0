<?php

session_start();

// class MyDB extends SQLite3
// {
//    function __construct()
//    {
//       $this->open('../../database/pleng.db');
//    }
// }

$db = new MyDB();

$idgrupo = $_SESSION['idGrupoQtdeMat'];
$idetapa = $_SESSION['idEtapaQtdeMat'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT material.*, qtde_material.qtde, qtde_material.idqtde 
    from qtde_material inner join material on qtde_material.idmat = material.idmat
    where qtde_material.idetapa = $idetapa AND qtde_material.idgrupo = $idgrupo");

    while ($row = $result->fetchArray()) {
        echo "<form method='POST' action='../../../../server/src/dadosprecadastrados/editarMaterialGrupo.php'>";
        echo "<div class='items'>";
        echo "<div class='item'>";
        echo "<div class='field'>";
        echo "<input type='text' value='".$row['nome']."' name='matgrupo' readOnly>";
        echo "</div>";
        echo "</div>";
        echo "<div class='item'>";
        echo "<div class='field'>";
        echo "<input type='text' id='qtde' value='".$row['qtde']."' name='qtde'>";
        echo "<input type='hidden' value='".$row['idqtde']."' name='idqtde'>";
        echo "</div>";
        echo "</div>";
        echo "<div class='item'>";    
        echo "<button type='submit' class='btnVerde'> v </button>";
        echo "</div>";
        echo "<div class='item'>";    
        echo "<button type='button' class='btnVermelho' onclick='deletarMaterialGrupo(".$row['idqtde'].");'> X </button>";
        echo "</div>";
        echo "</div>";
        echo "</form>";
    }
}

?>