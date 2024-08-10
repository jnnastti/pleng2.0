<?php

class Etapa
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function listarEtapa()
    {
        $selectEtapa = $this->sqlite->prepare('SELECT * FROM etapa');

        $etapa = $selectEtapa->execute();

        return $etapa;
    }

    public function listarEtapaComFiltro(string $filtro)
    {
        $selectEtapaComFiltro = $this->sqlite->prepare('SELECT * FROM etapa
                                                WHERE upper(nome)
                                                LIKE :filtro');

        $selectEtapaComFiltro->bindParam(':filtro', $filtro);

        $etapaFiltrada = $selectEtapaComFiltro->execute();

        return $etapaFiltrada;
    }

    public function deletarEtapa(int $id)
    {

        $materialEtapa = new MaterialEtapa($this->sqlite);

        $materialEtapa->deletarMaterialEtapa($id);

        $deleteEtapa = $this->sqlite->prepare('DELETE FROM etapa WHERE idetapa = :id');
                                
        $deleteEtapa->bindParam(':id', $id);

        $deleteEtapa->execute();
    }


    public function cadastrarEtapa(string $nome, array $materiais)
    {
        $materialEtapa = new MaterialEtapa($this->sqlite);

        $insertEtapa = $this->sqlite->prepare('INSERT INTO etapa(nome) 
                                                VALUES (:nome)');
                                
        $insertEtapa->bindParam(':nome', $nome);

        $insertEtapa->execute();

        $materialEtapa->cadastrarMaterialEtapa($materiais);
    }

    public function editarEtapa(string $nome, int $id, array $materiais)
    {
        $materialEtapa = new MaterialEtapa($this->sqlite);

        $updateEtapa = $this->sqlite->prepare('UPDATE etapa 
                                                SET nome = :nome
                                                WHERE idetapa = :id');
                                
        $updateEtapa->bindParam(':nome', $nome);
        $updateEtapa->bindParam(':id', $id);

        $updateEtapa->execute();

        $materialEtapa->editarMaterialEtapa($id, $materiais);
    }

    public function selecionarEtapaEspecifica(int $id)
    {
        $selectEtapaEspecifica = $this->sqlite->prepare('SELECT * FROM etapa WHERE idetapa = :id');

        $selectEtapaEspecifica->bindParam(':id', $id);

        $etapaEspecifica = $selectEtapaEspecifica->execute()->fetchArray();

        return $etapaEspecifica;
    }

    
}
?>