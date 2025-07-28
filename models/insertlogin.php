<?php
// include_once  __DIR__ . '..PDO.php';
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Tratamento do formulário (inserção)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = password_hash($_POST['senha'] ?? '', PASSWORD_DEFAULT);

    if (!empty($nome) && !empty($email) && !empty($_POST['senha'])) {
        $sqlInsert = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $pdo->prepare($sqlInsert);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        if ($stmt->execute()) {
            echo "✅ Usuário inserido com sucesso!";
        } else {
            echo "❌ Erro ao inserir usuário.";
        }
    } else {
        echo "⚠️ Todos os campos são obrigatórios.";
    }
}

// Busca os usuários cadastrados
$sql = "SELECT * FROM usuarios";
$stmt = $pdo->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);