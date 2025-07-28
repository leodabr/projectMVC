<?php

namespace Aluno\ProjectMvc2\Controllers;

use PDO;
use Ramsey\Uuid\Uuid;

class UsuarioController implements Controller
{
  private PDO $pdo;

  public function __construct()
  {
    // require_once __DIR__ . '/../../pdo.php'; 

    $this->pdo = conn();
  }

  public function formCreate()
  {

    $sql = "SELECT id, nome, email FROM usuarios";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    include_once __DIR__ . '/../../views/html.php';
    
  }

  public function create()
  {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (id, nome, email, senha) VALUES (?, ?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);

    $senha = password_hash($senha,PASSWORD_ARGON2ID);

    $stmt->execute([Uuid::uuid4()->toString(), $nome, $email, $senha]);

    header("location: /usuario/create");

  }
public function formeditar()
  {

    $sql = "SELECT id, nome, email FROM usuarios";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    include_once __DIR__ . '/../../views/edit.php';
    
  }

public function editar($id=1)
{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);

    $senha = password_hash($senha, PASSWORD_ARGON2ID);

    $stmt->execute([$nome, $email, $senha, $id]);

    header("Location: /usuario/edit/$id");
}

}