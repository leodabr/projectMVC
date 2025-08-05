<?php

namespace Aluno\ProjectMvc2\models;

use InvalidArgumentException;

class Login
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = conn();
    }

    public function autenticarUsuario($email, $senha)
    {
        $sql = "SELECT id, nome, email, senha_hash FROM usuarios WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha_hash'])) {
            return $usuario; // Login bem-sucedido
        }

        return null; // Falha na autenticação
    }
}
?>