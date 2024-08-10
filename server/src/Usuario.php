<?php

class Usuario
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function acessarConta(string $email, string $senha)
    {
        $loginUsuario = $this->sqlite->prepare('SELECT * FROM usuario WHERE email = :email AND senha = :senha LIMIT 0,1');

        $loginUsuario->bindParam(':email', $email);
        $loginUsuario->bindParam(':senha', $senha);

        $usuario = $loginUsuario->execute()->fetchArray();

        return $usuario;
    } 

    public function editarUsuario(object $usuario)
    {
        $updateUsuario = $this->sqlite->prepare('UPDATE usuario SET
                                                    nome = :nome,
                                                    email = :email,
                                                    senha = :senha
                                                WHERE idusuario = :idusu');
        
        $updateUsuario->bindParam(':nome', $usuario->nome);
        $updateUsuario->bindParam(':email', $usuario->email);
        $updateUsuario->bindParam(':senha', $usuario->senha);
        $updateUsuario->bindParam(':idusu', $usuario->idusu);

        $updateUsuario->execute();
    }

    public function selecionarUsuario(int $idusuario) 
    {
        $selectUsuario = $this->sqlite->prepare('SELECT * FROM usuario WHERE idusuario = :id LIMIT 0,1');

        $selectUsuario->bindParam(':id', $idusuario);

        $usuario = $selectUsuario->execute()->fetchArray();

        return $usuario;
    }
}

?>