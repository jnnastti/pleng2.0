<?php

class Galeria
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarFoto(object $foto)
    {
        $nomeArquivo = $this->gerarNome($foto->foto);

        $insertFoto = $this->sqlite->prepare('INSERT INTO galeria(nome, descricao, data_foto, foto, idpasta) 
                                                VALUES (:nome, :descricao, :data_foto, :foto, :pasta)');
                                
        $insertFoto->bindParam(':nome', $foto->nome);
        $insertFoto->bindParam(':descricao', $foto->descricao);
        $insertFoto->bindParam(':data_foto', $foto->data_foto);
        $insertFoto->bindParam(':foto', $nomeArquivo);
        $insertFoto->bindParam(':pasta', $foto->pasta);

        $insertFoto->execute();
    }

    public function gerarNome($foto)
    {
        $extensao = strtolower(substr($foto['name'], -4)); //pega a extensao do arquivo
        $nomeFoto = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "./imgproj/"; //define o diretorio para onde enviar o arquivo
    
        if (move_uploaded_file($foto['tmp_name'], $diretorio.$nomeFoto)) {
        
            return $nomeFoto;
        }
    }

    public function listarFotos(int $id)
    {
        $selectFotos = $this->sqlite->prepare('SELECT * FROM galeria WHERE idpasta = :id');

        $selectFotos->bindParam(':id', $id);

        $fotos = $selectFotos->execute();

        return $fotos;
    }

    public function deletarFoto(int $idgaleria)
    {
        $deletarFoto = $this->sqlite->prepare('DELETE FROM galeria 
                                                        WHERE idgaleria = :idgaleria');
                                
        $deletarFoto->bindParam(':idgaleria', $idgaleria);

        $deletarFoto->execute();
    }

    public function selecionarFoto(int $idfoto)
    {
        $selectFotoEspecifica = $this->sqlite->prepare('SELECT * FROM galeria WHERE idgaleria = :id');

        $selectFotoEspecifica->bindParam(':id', $idfoto);

        $fotoEspecifica = $selectFotoEspecifica->execute()->fetchArray();

        return $fotoEspecifica;
    }

    public function editarFoto(object $foto)
    {
        $updateGaleria = $this->sqlite->prepare('UPDATE galeria 
                                                    SET nome = :nome,
                                                        data_foto = :data_foto,
                                                        descricao = :descricao 
                                                    WHERE idgaleria = :idgaleria');
                                
        $updateGaleria->bindParam(':nome', $foto->nome);
        $updateGaleria->bindParam(':data_foto', $foto->data_foto);
        $updateGaleria->bindParam(':descricao', $foto->descricao);
        $updateGaleria->bindParam(':idgaleria', $foto->idgaleria);

        $updateGaleria->execute();
    }

    public function selecionarUltimasFotos(int $idprojeto)
    {
        $selectUltimasFotos = $this->sqlite->prepare('SELECT pasta.nome AS pasta, galeria.nome, galeria.foto  
                                                        FROM pasta
                                                        INNER JOIN galeria
                                                        ON pasta.idpasta = galeria.idpasta
                                                        WHERE pasta.idprojeto = :id
                                                        ORDER BY galeria.data_foto DESC
                                                        LIMIT 5');

        $selectUltimasFotos->bindParam(':id', $idprojeto);

        $ultimasFotos = $selectUltimasFotos->execute();

        return $ultimasFotos;
    }

    public function selecionarFotosLogo(int $id) {
        $selectLogos = $this->sqlite->prepare("SELECT galeria.nome, galeria.foto, galeria.idgaleria 
                                                        FROM galeria
                                                        INNER JOIN pasta
                                                        ON pasta.idpasta = galeria.idpasta
                                                        WHERE pasta.nome = 'logo'
                                                        AND pasta.idprojeto = :id");

        $selectLogos->bindParam(':id', $id);

        $logos = $selectLogos->execute();

        return $logos;
    }
}
?>