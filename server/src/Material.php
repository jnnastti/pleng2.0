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
        $insertMaterial = $this->sqlite->prepare('INSERT INTO material(nome, fornecedor, unidade, preco) 
                                                VALUES (:nome, :fornecedor, :unidade, :preco)');
                                
        $insertMaterial->bindParam(':nome', $material->nome);
        $insertMaterial->bindParam(':fornecedor', $material->fornecedor);
        $insertMaterial->bindParam(':unidade', $material->unidade);
        $insertMaterial->bindParam(':preco', $material->preco);

        $insertMaterial->execute();
    }

    public function editarMaterial(object $material)
    {
        $updateMaterial = $this->sqlite->prepare('UPDATE material SET 
                                                    nome = :nome,
                                                    fornecedor = :fornecedor,
                                                    unidade = :unidade,
                                                    preco = :preco 
                                                WHERE idmat = :idmat');
                                
        $updateMaterial->bindParam(':nome', $material->nome);
        $updateMaterial->bindParam(':fornecedor', $material->fornecedor);
        $updateMaterial->bindParam(':unidade', $material->unidade);
        $updateMaterial->bindParam(':preco', $material->preco);
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