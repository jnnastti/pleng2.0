<?php

class EtapaDiario 
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarEtapa(array $etapas, int $idprojeto)
    {

        foreach($etapas as $etapa) {
            $etapa = json_decode($etapa);
            
            $insertEtapaDiario = $this->sqlite->prepare('INSERT INTO etapa_diario(
                                                            iddiario, idlevantamento, qtde
                                                        ) VALUES (
                                                            (
                                                                SELECT MAX(iddiario) FROM diario_obra
                                                                WHERE idprojeto = :idprojeto
                                                            ), :idlevantamento, :qtde)');
                                
            $insertEtapaDiario->bindParam(':idprojeto', $idprojeto);
            $insertEtapaDiario->bindParam(':idlevantamento', $etapa->id);
            $insertEtapaDiario->bindParam(':qtde', $etapa->tamConcluido);
    
            $insertEtapaDiario->execute();
        }
    }

    public function selectQtdeEtapaDiario(int $id) 
    {

        $selectQtdeEtapaDiario = $this->sqlite->prepare('SELECT qtde
                                                        FROM etapa_diario 
                                                        WHERE idlevantamento = :id');

        $selectQtdeEtapaDiario->bindParam(':id', $id);

        $qtdeEtapaDiario = $selectQtdeEtapaDiario->execute()->fetchArray();

        return $qtdeEtapaDiario;
    }

    public function selecionarEtapaDiario(int $id) 
    {
        $selectEtapaDiario = $this->sqlite->prepare('SELECT etapa.nome, etapa_diario.*, 
                                                        levantamento_inicial.situacao, 
                                                        levantamento_inicial.tamanho_total
                                                        FROM etapa_diario 
                                                            INNER JOIN levantamento_inicial 
                                                            ON levantamento_inicial.idlevantamento = etapa_diario.idlevantamento
                                                            INNER JOIN etapa
                                                            ON etapa.idetapa = levantamento_inicial.idetapa
                                                        WHERE etapa_diario.iddiario = :id ');

        $selectEtapaDiario->bindParam(':id', $id);

        $etapaDiario = $selectEtapaDiario->execute();

        return $etapaDiario;
    }

    public function deletarTodasEtapasDiario(int $iddiario)
    {
        $deleteEtapaDiario = $this->sqlite->prepare('DELETE FROM etapa_diario
                                                        WHERE iddiario = :id');
              
        $deleteEtapaDiario->bindParam(':id', $iddiario);

        $deleteEtapaDiario->execute();
    }

    public function editarEtapa(array $etapas, int $id)
    {
        $this->deletarTodasEtapasDiario($id);

        foreach($etapas as $etapa) {
            $etapa = json_decode($etapa);
            
            $insertEtapaDiario = $this->sqlite->prepare('INSERT INTO etapa_diario(
                                                            iddiario, idlevantamento, qtde
                                                        ) VALUES (:iddiario, :idlevantamento, :qtde)');
                                
            $insertEtapaDiario->bindParam(':iddiario', $id);
            $insertEtapaDiario->bindParam(':idlevantamento', $etapa->id);
            $insertEtapaDiario->bindParam(':qtde', $etapa->tamConcluido);
    
            $insertEtapaDiario->execute();
        }
    }
}

?>