<?php

class Projeto
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarProjeto(object $projeto)
    {
        $insertProjeto = $this->sqlite->prepare('INSERT INTO projeto(nome, descricao, endereco, cidade, estado, dataini, qtdedias, idusuario, idempreiteiro)
                                                VALUES(:nome, :descricao, :endereco, :cidade, :estado, :dataini, :qtdedias, :idusu, :idempreiteiro)');
        
        $insertProjeto->bindParam(':nome', $projeto->nome);
        $insertProjeto->bindParam(':descricao', $projeto->descricao);
        $insertProjeto->bindParam(':endereco', $projeto->endereco);
        $insertProjeto->bindParam(':cidade', $projeto->cidade);
        $insertProjeto->bindParam(':estado', $projeto->estado);
        $insertProjeto->bindParam(':dataini', $projeto->dataini);
        $insertProjeto->bindParam(':qtdedias', $projeto->qtdedias);
        $insertProjeto->bindParam(':idempreiteiro', $projeto->idempreiteiro);
        $insertProjeto->bindParam(':idusu', $projeto->idusuario);

        $insertProjeto->execute();
    }

    public function editarProjeto(object $projeto)
    {
        $updateProjeto = $this->sqlite->prepare('UPDATE projeto SET
                                                    nome = :nome,
                                                    descricao = :descricao,
                                                    endereco = :endereco,
                                                    dataini = :dataini,
                                                    qtdedias = :qtdedias,
                                                    idempreiteiro = :idempreiteiro
                                                WHERE idprojeto = :idproj');
        
        $updateProjeto->bindParam(':nome', $projeto->nome);
        $updateProjeto->bindParam(':descricao', $projeto->descricao);
        $updateProjeto->bindParam(':endereco', $projeto->endereco);
        $updateProjeto->bindParam(':dataini', $projeto->dataini);
        $updateProjeto->bindParam(':qtdedias', $projeto->qtdedias);
        $updateProjeto->bindParam(':idempreiteiro', $projeto->idempreiteiro);
        $updateProjeto->bindParam(':idproj', $projeto->projeto);

        $updateProjeto->execute();
    }

    public function deletarProjeto(int $id)
    {
        $deleteProjeto = $this->sqlite->prepare('DELETE FROM projeto 
                                                    WHERE idprojeto = :idproj');

        $deleteProjeto->bindParam(':idproj', $id);

        $deleteProjeto->execute();
    }

    public function listarProjetos(int $idusuario)
    {
        $selectProjeto = $this->sqlite->prepare('SELECT * FROM projeto WHERE idusuario = :idusu');

        $selectProjeto->bindParam(':idusu', $idusuario);

        $projetos = $selectProjeto->execute();

        return $projetos;
    }

    public function listarProjetosFiltrado(int $idusuario, string $filtro)
    {
        $selectProjeto = $this->sqlite->prepare('SELECT * FROM projeto 
                                                    WHERE idusuario = :idusu
                                                    AND upper(nome) LIKE :filtro');

        $selectProjeto->bindParam(':idusu', $idusuario);
        $selectProjeto->bindParam(':filtro', $filtro);

        $projetos = $selectProjeto->execute();

        return $projetos;
    }

    private function selecionarProjetoAtualizar(int $idprojeto) 
    {

        $selecionaProjeto = $this->sqlite->prepare('SELECT * FROM projeto WHERE idprojeto = :id LIMIT 0,1');

        $selecionaProjeto->bindParam(':id', $idprojeto);

        $projeto = $selecionaProjeto->execute()->fetchArray();

        return $projeto;  
    }

    private function atualizarQtdeDias(int $idprojeto) 
    {

        $projeto = $this->selecionarProjetoAtualizar($idprojeto);

        $dataAtual = date('Y-m-d');
        $dataRegistrada = $projeto['dataini'];

        $diferenca = strtotime($dataAtual) - strtotime($dataRegistrada);

        $dias = floor($diferenca / (60 * 60 * 24));

        $atualizaDia = $this->sqlite->prepare('UPDATE projeto 
                                                SET qtdedias = :dia
                                               WHERE idprojeto = :id');
                    
        $atualizaDia->bindParam(':id', $idprojeto);
        $atualizaDia->bindParam(':dia', $dias);

        $atualizaDia->execute();

        return $this->selecionarProjetoAtualizar($idprojeto);
    }

    public function selecionarProjeto(int $idprojeto) 
    {
        return $this->atualizarQtdeDias($idprojeto);
    }

    public function somaQtdeProjetos(int $idUsuario) 
    {
        $qtdeProjetos = $this->sqlite->prepare('SELECT COUNT(idprojeto) AS qtde FROM projeto WHERE idusuario = :id');

        $qtdeProjetos->bindParam(':id', $idUsuario);

        $qtde = $qtdeProjetos->execute()->fetchArray();

        return $qtde; 
    }
}
?>