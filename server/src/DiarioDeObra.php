<?php 

class DiarioDeObra
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarDiarioDeObra(object $diario, object $previsaoTem, array $etapa, array $materiais)
    {
        $PrevisaoTempo = new PrevisaoTempo($this->sqlite);
        $EtapaDiario = new EtapaDiario($this->sqlite);
        $MaterialEtapaDiario = new MaterialEtapaDiario($this->sqlite);

        $insertDiario = $this->sqlite->prepare('INSERT INTO diario_obra( datadiario, nome, observacao, idprojeto) 
                                                VALUES (:datadiario, :nome, :observacao, :idprojeto)');
                                
        $insertDiario->bindParam(':datadiario', $diario->datadiario);
        $insertDiario->bindParam(':nome', $diario->nome);
        $insertDiario->bindParam(':observacao', $diario->observacao);
        $insertDiario->bindParam(':idprojeto', $diario->idprojeto);

        $insertDiario->execute();

        $PrevisaoTempo->cadastrarPrevisaoTempo($previsaoTem);
        $EtapaDiario->cadastrarEtapa($etapa, $diario->idprojeto);
        $MaterialEtapaDiario->cadastrarMateriais($materiais, $diario->idprojeto);
    }

    public function editarDiarioDeObra(object $diario, object $previsaoTem, array $etapas, array $materiais)
    {
        $PrevisaoTempo = new PrevisaoTempo($this->sqlite);
        $EtapaDiario = new EtapaDiario($this->sqlite);
        $MaterialEtapaDiario = new MaterialEtapaDiario($this->sqlite);

        $updateDiario = $this->sqlite->prepare('UPDATE diario_obra 
                                                SET datadiario = :datadiario, 
                                                    nome = :nome, 
                                                    observacao = :observacao 
                                                WHERE iddiario = :iddiario');
                                
        $updateDiario->bindParam(':datadiario', $diario->datadiario);
        $updateDiario->bindParam(':nome', $diario->nome);
        $updateDiario->bindParam(':observacao', $diario->observacao);
        $updateDiario->bindParam(':iddiario', $diario->iddiario);

        $updateDiario->execute();

        $PrevisaoTempo->editarPrevisaoTempo($previsaoTem);
        $MaterialEtapaDiario->editarMateriais($materiais, $diario->iddiario);
        $EtapaDiario->editarEtapa($etapas, $diario->iddiario);
    }

    public function excluirDiario(int $iddiario)
    {
        $deleteDiario = $this->sqlite->prepare('DELETE FROM diario_obra WHERE iddiario = :iddiario');

        $deleteDiario->bindParam(':iddiario', $iddiario);

        $deleteDiario->execute();
    }

    public function listarDiario(int $idprojeto)
    {
        $selectDiario = $this->sqlite->prepare('SELECT * FROM diario_obra WHERE idprojeto = :idprojeto');

        $selectDiario->bindParam(':idprojeto', $idprojeto);

        $diarios = $selectDiario->execute();

        return $diarios;
    }

    public function listarDiarioFiltrado(int $idprojeto, string $nome, string $dataDiario)
    {
        if(!empty($nome) && !empty($dataDiario)) {
            $expressao = "upper(nome) LIKE :filtro AND  datadiario = :data";
        }

        if(empty($nome) && !empty($dataDiario)) {
            $expressao = "datadiario = :data";
        }

        if(!empty($nome) && empty($dataDiario)) {
            $expressao = "upper(nome) LIKE :filtro";
        }

        if(empty($nome) && empty($dataDiario)) {
            return $this->listarDiario($idprojeto);
        }

        $selectDiarioFiltrados = $this->sqlite->prepare('SELECT * FROM diario_obra 
                                                WHERE idprojeto = :idprojeto AND ' . $expressao);
                                
        $selectDiarioFiltrados->bindParam(':idprojeto', $idprojeto);
        
        if(!empty($nome) && !empty($dataDiario)) {
            $selectDiarioFiltrados->bindParam(':filtro', $nome);
            $selectDiarioFiltrados->bindParam(':data', $dataDiario);
        }

        if(empty($nome) && !empty($dataDiario)) {
            $selectDiarioFiltrados->bindParam(':data', $dataDiario);
        }

        if(!empty($nome) && empty($dataDiario)) {
            $nome = '%' . strtoupper($nome) . '%';
            $selectDiarioFiltrados->bindParam(':filtro', $nome);
        }

        $diariosFiltrados = $selectDiarioFiltrados->execute();

        return $diariosFiltrados;
    }

    public function selecionarDiario(int $id) {
        $selectDiarioEspecifico = $this->sqlite->prepare('SELECT * FROM diario_obra 
                                                WHERE iddiario = :id');

        $selectDiarioEspecifico->bindParam(':id', $id);

        $diarioEspecifico = $selectDiarioEspecifico->execute()->fetchArray();

        return $diarioEspecifico;
    }

    public function selecionaUltimoDiario(int $idprojeto) {
        $selectUltimoDiario = $this->sqlite->prepare('SELECT MAX(iddiario) AS id FROM diario_obra
                                                        WHERE idprojeto = :idprojeto');

        $selectUltimoDiario->bindParam(':idprojeto', $idprojeto);

        $ultimoDiario = $selectUltimoDiario->execute()->fetchArray();

        return $ultimoDiario['id'];
    }
    
    public function duplicarDiarioDeObra(int $idprojetoVelho, int $idProjetoDuplicado)
    {
        $PrevisaoTempo = new PrevisaoTempo($this->sqlite);
        $EtapaDiario = new EtapaDiario($this->sqlite);
        $MaterialEtapaDiario = new MaterialEtapaDiario($this->sqlite);

        $diarios = $this->listarDiario($idprojetoVelho);

        while($diario = $diarios->fetchArray()) {

            $etpDiario = $EtapaDiario->selecionarEtapaDiario($diario['iddiario']);
            $prevTempo = $PrevisaoTempo->selecionarPrevisaoTempo($diario['iddiario']);
            $matEtp    = $MaterialEtapaDiario->selectMaterialEtapaDiario($diario['iddiario']);

            $diario['idprojeto'] = $idProjetoDuplicado;

            $this->cadastrarDiarioDeObraDuplicado((object)$diario, $prevTempo, $etpDiario, $matEtp);
        }
    }

    public function cadastrarDiarioDeObraDuplicado(object $diario, array $prevTempo, SQLite3Result $etapa, SQLite3Result $matEtp)
    {
        $PrevisaoTempo = new PrevisaoTempo($this->sqlite);
        $EtapaDiario = new EtapaDiario($this->sqlite);
        $MaterialEtapaDiario = new MaterialEtapaDiario($this->sqlite);

        $insertDiario = $this->sqlite->prepare('INSERT INTO diario_obra( datadiario, nome, observacao, idprojeto) 
                                                VALUES (:datadiario, :nome, :observacao, :idprojeto)');
                                
        $insertDiario->bindParam(':datadiario', $diario->datadiario);
        $insertDiario->bindParam(':nome', $diario->nome);
        $insertDiario->bindParam(':observacao', $diario->observacao);
        $insertDiario->bindParam(':idprojeto', $diario->idprojeto);

        $insertDiario->execute();

        $diario->iddiario = $this->selecionaUltimoDiario($diario->idprojeto);

        $PrevisaoTempo->cadastrarPrevisaoTempoDuplicada($prevTempo, $diario->iddiario);
        $EtapaDiario->cadastrarEtapaDuplicada($etapa, $diario->iddiario);
        $MaterialEtapaDiario->cadastrarMateriaisDuplicada($matEtp, $diario->iddiario);
    }
}

?>