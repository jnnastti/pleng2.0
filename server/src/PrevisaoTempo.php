<?php

class PrevisaoTempo
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarPrevisaoTempo(object $previsaoTempo)
    {
        $insertPrevisao = $this->sqlite->prepare('INSERT INTO previsao_tempo(
                                                    temsegmanha, temsegtarde, 
                                                    temtermanha, temtertarde, 
                                                    temquamanha, temquatarde, 
                                                    temquimanha, temquitarde, 
                                                    temsexmanha, temsextarde, iddiario)
                                                VALUES (:temsegmanha, :temsegtarde, 
                                                        :temtermanha, :temtertarde, 
                                                        :temquamanha, :temquatarde, 
                                                        :temquimanha, :temquitarde, 
                                                        :temsexmanha, :temsextarde, 
                                                        (
                                                            SELECT MAX(iddiario) FROM diario_obra
                                                            WHERE idprojeto = :idprojeto
                                                        )
                                                       )');
                                
        
        $insertPrevisao->bindParam(':temsegmanha', $previsaoTempo->temsegmanha);
        $insertPrevisao->bindParam(':temsegtarde', $previsaoTempo->temsegtarde);
        $insertPrevisao->bindParam(':temtermanha', $previsaoTempo->temtermanha);
        $insertPrevisao->bindParam(':temtertarde', $previsaoTempo->temtertarde);
        $insertPrevisao->bindParam(':temquamanha', $previsaoTempo->temquamanha);
        $insertPrevisao->bindParam(':temquatarde', $previsaoTempo->temquatarde);
        $insertPrevisao->bindParam(':temquimanha', $previsaoTempo->temquimanha);
        $insertPrevisao->bindParam(':temquitarde', $previsaoTempo->temquitarde);
        $insertPrevisao->bindParam(':temsexmanha', $previsaoTempo->temsexmanha);
        $insertPrevisao->bindParam(':temsextarde', $previsaoTempo->temsextarde);
        
        $insertPrevisao->bindParam(':idprojeto', $previsaoTempo->idprojeto);

        $insertPrevisao->execute();
    }

    public function editarPrevisaoTempo(object $previsaoTempo)
    {
        $updatePrevisao = $this->sqlite->prepare('UPDATE previsao_tempo 
                                                SET temsegmanha = :temsegmanha, 
                                                    temsegtarde = :temsegtarde, 
                                                    temtermanha = :temtermanha, 
                                                    temtertarde = :temtertarde, 
                                                    temquamanha = :temquamanha, 
                                                    temquatarde = :temquatarde, 
                                                    temquimanha = :temquimanha, 
                                                    temquitarde = :temquitarde, 
                                                    temsexmanha = :temsexmanha, 
                                                    temsextarde = :temsextarde 
                                                WHERE iddiario = :iddiario');
                                
        $updatePrevisao->bindParam(':temsegmanha', $previsaoTempo->temsegmanha);
        $updatePrevisao->bindParam(':temsegtarde', $previsaoTempo->temsegtarde);
        $updatePrevisao->bindParam(':temtermanha', $previsaoTempo->temtermanha);
        $updatePrevisao->bindParam(':temtertarde', $previsaoTempo->temtertarde);
        $updatePrevisao->bindParam(':temquamanha', $previsaoTempo->temquamanha);
        $updatePrevisao->bindParam(':temquatarde', $previsaoTempo->temquatarde);
        $updatePrevisao->bindParam(':temquimanha', $previsaoTempo->temquimanha);
        $updatePrevisao->bindParam(':temquitarde', $previsaoTempo->temquitarde);
        $updatePrevisao->bindParam(':temsexmanha', $previsaoTempo->temsexmanha);
        $updatePrevisao->bindParam(':temsextarde', $previsaoTempo->temsextarde);
        $updatePrevisao->bindParam(':iddiario', $previsaoTempo->iddiario);

        $updatePrevisao->execute();
    }

    public function selecionarPrevisaoTempo(int $id) {
        $selectPrevisaoTempo = $this->sqlite->prepare('SELECT * FROM previsao_tempo 
                                                WHERE iddiario = :id');

        $selectPrevisaoTempo->bindParam(':id', $id);

        $previsaoTempo = $selectPrevisaoTempo->execute()->fetchArray();

        return $previsaoTempo;
    }
}
?>