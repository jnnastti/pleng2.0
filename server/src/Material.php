<?php

class Material
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarMaterial(object $material)
    {
        $insertMaterial = $this->sqlite->prepare('INSERT INTO material(nome, unidade) 
                                                VALUES (:nome, :unidade)');
                                
        $insertMaterial->bindParam(':nome', $material->nome);
        $insertMaterial->bindParam(':unidade', $material->unidade);

        $insertMaterial->execute();
    }

    public function editarMaterial(object $material)
    {
        $updateMaterial = $this->sqlite->prepare('UPDATE material SET 
                                                    nome = :nome,
                                                    unidade = :unidade 
                                                WHERE idmat = :idmat');
                                
        $updateMaterial->bindParam(':nome', $material->nome);
        $updateMaterial->bindParam(':unidade', $material->unidade);
        $updateMaterial->bindParam(':idmat', $material->idmat);

        $updateMaterial->execute();
    }

    public function deletarMaterial(int $idmat)
    {
        $deleteMaterial = $this->sqlite->prepare('DELETE FROM material WHERE idmat = :idmat');
                                
        $deleteMaterial->bindParam(':idmat', $idmat);

        $deleteMaterial->execute();
    }

    public function listarMaterial()
    {
        $selectMaterial = $this->sqlite->prepare('SELECT * FROM material');

        $materiais = $selectMaterial->execute();

        return $materiais;
    }

    public function listarMaterialComFiltro(string $filtro)
    {
        $selectMaterialFiltrado = $this->sqlite->prepare('SELECT * FROM material 
                                                            WHERE upper(nome) 
                                                            LIKE :filtro');

        $selectMaterialFiltrado->bindParam(':filtro', $filtro);

        $materiais = $selectMaterialFiltrado->execute();

        return $materiais;
    }

    public function selecionarMaterial(int $idmat)
    {
        $selectMaterialEspecifico = $this->sqlite->prepare('SELECT * FROM material
                                                            WHERE idmat = :id');

        $selectMaterialEspecifico->bindParam(':id', $idmat);

        $materialEspecifico = $selectMaterialEspecifico->execute()->fetchArray();

        return $materialEspecifico;

    }
}

?>