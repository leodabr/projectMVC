<?php

namespace Aluno\ProjectMvc2\models;

use InvalidArgumentException;

class Excluir
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = conn();
    }

    public function deleteUsuario($id)
    {
        
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>