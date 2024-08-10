<?

class MaterialEtapaDiario 
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarMateriais(array $materiais, int $idprojeto) 
    {
        $DiarioObra = new DiarioDeObra($this->sqlite);

        $id = $DiarioObra->selecionaUltimoDiario($idprojeto);

        foreach($materiais as $material) {
            $material = json_decode($material);
            
            $insertMatDiario = $this->sqlite->prepare('INSERT INTO material_etapa_diario(qtde, idmatetapa, iddiario) 
                                                    VALUES (:qtde, :matetapa, :diario)');

            $insertMatDiario->bindParam(':qtde', $material->qtdeUsada);
            $insertMatDiario->bindParam(':matetapa', $material->id);
            $insertMatDiario->bindParam(':diario', $id);

            $insertMatDiario->execute();
        }
    }

    public function selectMaterialEtapaDiario(int $id) 
    {
        $selectMatEtapaDiario = $this->sqlite->prepare('SELECT material.nome, material_etapa_diario.*, material_etapa.idetapa 
                                                                FROM material_etapa_diario 
                                                                    INNER JOIN material_etapa
                                                                    ON material_etapa.idmatetapa = material_etapa_diario.idmatetapa 
                                                                    INNER JOIN material 
                                                                    ON material.idmat = material_etapa.idmat
                                                                WHERE material_etapa_diario.iddiario = :id');

        $selectMatEtapaDiario->bindParam(':id', $id);

        $materialEtapaDiario = $selectMatEtapaDiario->execute();

        return $materialEtapaDiario;
    }

    public function deletarTodosMateriaisEtapaDiario(int $iddiario)
    {
        $deleteMaterialEtapaDiario = $this->sqlite->prepare('DELETE FROM material_etapa_diario
                                                        WHERE iddiario = :id');
              
        $deleteMaterialEtapaDiario->bindParam(':id', $iddiario);

        $deleteMaterialEtapaDiario->execute();
    }

    public function editarMateriais(array $materiais, int $id)
    {
        $this->deletarTodosMateriaisEtapaDiario($id);

        foreach($materiais as $material) {
            $material = json_decode($material);
            
            $insertMatDiario = $this->sqlite->prepare('INSERT INTO material_etapa_diario(qtde, idmatetapa, iddiario) 
                                                    VALUES (:qtde, :matetapa, :diario)');

            $insertMatDiario->bindParam(':qtde', $material->qtdeUsada);
            $insertMatDiario->bindParam(':matetapa', $material->id);
            $insertMatDiario->bindParam(':diario', $id);

            $insertMatDiario->execute();
        }

    }
}

?>