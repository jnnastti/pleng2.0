<?php

class Empreiteiro
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarEmpreiteiro(string $nome)
    {
        $insertEmpreiteiro = $this->sqlite->prepare('INSERT INTO empreiteiro(nome) 
                                                VALUES (:nome)');
                                
        $insertEmpreiteiro->bindParam(':nome', $nome);

        $insertEmpreiteiro->execute();
    }

    public function editarEmpreiteiro(string $nome, int $idemp)
    {
        $insertEmpreiteiro = $this->sqlite->prepare('UPDATE empreiteiro SET nome = :nome 
                                                        WHERE idempreiteiro = :idemp');
                                
        $insertEmpreiteiro->bindParam(':nome', $nome);
        $insertEmpreiteiro->bindParam(':idemp', $idemp);

        $insertEmpreiteiro->execute();
    }

    public function deletarEmpreiteiro(int $idemp)
    {
        $deleteEmpreiteiro = $this->sqlite->prepare('DELETE FROM empreiteiro 
                                                        WHERE idempreiteiro = :idemp');
                                
        $deleteEmpreiteiro->bindParam(':idemp', $idemp);

        $deleteEmpreiteiro->execute();
    }

    public function listarEmpreiteiro()
    {
        $selectEmpreiteiro = $this->sqlite->prepare('SELECT * FROM empreiteiro');

        $empreiteiros = $selectEmpreiteiro->execute();

        return $empreiteiros;
    }

    public function listarEmpreiteiroComFiltro(string $filtro)
    {
        $selectEmpreiteiroFiltrado = $this->sqlite->prepare('SELECT * FROM empreiteiro 
                                                        WHERE upper(nome) 
                                                        LIKE :filtro');

        $selectEmpreiteiroFiltrado->bindParam(':filtro', $filtro);

        $empreiteirosFiltrados = $selectEmpreiteiroFiltrado->execute();

        return $empreiteirosFiltrados;
    }

    public function selecionarEmpreiteiro(int $id)
    {
        $selectEmpreiteiroEspecifico = $this->sqlite->prepare('SELECT * FROM empreiteiro 
                                                                WHERE idempreiteiro = :id');

        $selectEmpreiteiroEspecifico->bindParam(':id', $id);

        $empreiteiroEspecifico = $selectEmpreiteiroEspecifico->execute()->fetchArray();

        return $empreiteiroEspecifico;
    }
}

?>