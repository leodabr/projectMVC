<?php

function conn(): PDO
{
    @define("DB_NAME", "iroutedb");
    @define("DB_HOST", "localhost");
    @define("DB_USER", "root");
    @define("DB_PASS", "");

    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erro ao conectar com o banco de dados: " . $e->getMessage());
    }
}



// // Dados que você vai inserir (normalmente vindos de um formulário)
// $nome = 'nome';
// $email = 'email';
// $senha = password_hash('senha', PASSWORD_DEFAULT); // Criptografar a senha
// $nivel_acesso = 'nivel_acesso'; // ou 'usuario', etc.

// // Preparar o SQL
// $sql = "INSERT INTO usuarios (nome, email, senha, nivel_acesso) 
//         VALUES (:nome, :email, :senha, :nivel_acesso)";

// // Preparar e executar
// $stmt = $pdo->prepare($sql);
// $stmt->bindParam(':nome', $nome);
// $stmt->bindParam(':email', $email);
// $stmt->bindParam(':senha', $senha);
// $stmt->bindParam(':nivel_acesso', $nivel_acesso);

// if ($stmt->execute()) {
//     echo "Usuário inserido com sucesso!";
// } else {
//     echo "Erro ao inserir usuário.";
// }
// 
// 
?>

