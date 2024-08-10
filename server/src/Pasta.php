<?php

class Pasta
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function listarPastas(int $idprojeto)
    {
        $selectPastas = $this->sqlite->prepare('SELECT * FROM pasta WHERE idprojeto = :id');

        $selectPastas->bindParam(':id', $idprojeto);

        $pastas = $selectPastas->execute();

        return $pastas;
    }

    public function listarPastasFiltrada(int $idprojeto, string $filtro)
    {
        $selectPastasFiltrada = $this->sqlite->prepare('SELECT * FROM pasta 
                                                WHERE idprojeto = :id
                                                AND upper(nome) LIKE :filtro');

        $selectPastasFiltrada->bindParam(':id', $idprojeto);
        $selectPastasFiltrada->bindParam(':filtro', $filtro);

        $pastasFiltrada = $selectPastasFiltrada->execute();

        return $pastasFiltrada;
    }

    public function cadastrarPasta(string $nome, int $projeto)
    {
        $insertPasta = $this->sqlite->prepare('INSERT INTO pasta(nome, idprojeto) 
                                                VALUES (:nome, :projeto)');
                                
        $insertPasta->bindParam(':nome', $nome);
        $insertPasta->bindParam(':projeto', $projeto);

        $insertPasta->execute();
    }

    public function editarPasta(string $nome, int $idpasta)
    {
        $updatePasta = $this->sqlite->prepare('UPDATE pasta SET nome = :nome 
                                                        WHERE idpasta = :idpasta');
                                
        $updatePasta->bindParam(':nome', $nome);
        $updatePasta->bindParam(':idpasta', $idpasta);

        $updatePasta->execute();
    }

    public function deletarPasta(int $idpasta)
    {
        $deletePasta = $this->sqlite->prepare('DELETE FROM pasta 
                                                        WHERE idpasta = :idpasta');
                                
        $deletePasta->bindParam(':idpasta', $idpasta);

        $deletePasta->execute();
    }

    public function selecionarPasta(int $id)
    {
        $selectPastaEspecifica = $this->sqlite->prepare('SELECT * FROM pasta 
                                                                WHERE idpasta = :id');

        $selectPastaEspecifica->bindParam(':id', $id);

        $pastaEspecifica = $selectPastaEspecifica->execute()->fetchArray();

        return $pastaEspecifica;
    }
}
?>