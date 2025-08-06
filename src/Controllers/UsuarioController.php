<?php

namespace Aluno\ProjectMvc2\Controllers;

use Aluno\ProjectMvc2\models\Excluir;
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

  public function tabuada()
  {
    
    for($j = 1; $j <= 10; $j++){

      for($i = 0; $i <= 10 ; $i++){
        echo "$j : $i = ". ($i * $j) . "<br>";
      }
      echo "<hr>";
    }
  }

  public function mult(){
    for($a = 0; $a <= 10; $a++){
      for($b = 0; $b <= 10; $b++){
        echo "$a x $b= " . ($a * $b) . "<br>";
    }
    echo "<hr>";
  }
}


  public function resto() {
  for ($j = 1; $j <= 10; $j++) {
    for ($i = 1; $i <= 10; $i++) { 
      $resto = $j % $i;
      $sobra = ($resto % 2 == 0) ? "é par" : "é impar";

      echo "$j / $i = $resto → $sobra<br>";
    }
    echo "<hr>";
  }
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

    $sql = "SELECT id, nome, email FROM usuarios WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$_GET['id']]);

    $usuarios = $stmt->fetch(PDO::FETCH_ASSOC);

    include_once __DIR__ . '/../../views/edit.php';
    
  }

public function editar()
{
    $id = $_POST['id'];
    // var_dump($id); exit;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);

    $senha = password_hash($senha, PASSWORD_ARGON2ID);

    $stmt->execute([$nome, $email, $senha, $id]);

    header("Location: /usuario/create");
}
public function excluir()
{
  $excluir = new Excluir();
  $excluir-> deleteUsuario($_GET['id']);
    header("Location: /usuario/create");
    exit;
}
public function loginForm()
{
    view('loginForm');
}

public function login()
{
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($email) || empty($senha)) {
        header("Location: /usuario/login?erro=faltando_dados");
        exit;
    }

    $sql = "SELECT id, nome, email, senha FROM usuarios WHERE email = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        session_start();
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];

        header("Location: /usuario/create"); // redireciona após login
        exit;
    } else {
        header("Location: /usuario/login?erro=credenciais_invalidas");
        exit;
    }
}

public function addForm()
  {

    $sql = "SELECT id, nome, email FROM usuarios";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    view ('add');
    
  }

  public function add()
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

    public function dashboard(){


    }


}
