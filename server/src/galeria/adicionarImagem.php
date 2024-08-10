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

// pegar dados do formulário
$data = $_POST['dataImg'];
$descricao = $_POST['descricao'];
$foto = $_FILES['foto'];
$idproj = $_SESSION['idProjAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    // configurações da foto
    $extensao = strtolower(substr($foto['name'], -4)); //pega a extensao do arquivo
    $nomeFoto = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "../../../web/assets/imgProj/"; //define o diretorio para onde enviar o arquivo

    if (move_uploaded_file($foto['tmp_name'], $diretorio.$nomeFoto)) {
    
        // inserir dados
        $result = $db->query("INSERT INTO foto(imagem, descricao, dataimg, idproj)
        VALUES ('".$nomeFoto."', '".$descricao."', '".$data."','".$idproj."')");


        header('location:../../../web/pages/galeria/index.php');
    }
}
    
    // $conn->close();
?>