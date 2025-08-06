<?php

session_start();

use Aluno\ProjectMvc2\Controllers\UsuarioController;

require_once __DIR__ . '/../vendor/autoload.php';

        $recurso = $_SERVER['PATH_INFO'] ?? "/";
        $metodo = $_SERVER['REQUEST_METHOD'];


$rota = "$metodo|$recurso";

$rotas = [
  "GET|/tabuada" =>[UsuarioController::class, 'tabuada'],
  "GET|/resto" =>[UsuarioController::class, 'resto'],
  "GET|/mult" =>[UsuarioController::class, 'mult'],
  "GET|/usuario/create" => [UsuarioController::class, 'formCreate'],
  "POST|/usuario/create" => [UsuarioController::class, 'create'],

  "GET|/usuario/add" => [UsuarioController::class, 'addForm'],
  "POST|/usuario/add" => [UsuarioController::class, 'add'],

  "GET|/usuario/login" => [UsuarioController::class, 'loginForm'],
  "POST|/usuario/login" => [UsuarioController::class, 'login'],

  "GET|/usuario/all" => [UsuarioController::class, 'dashboard'],
  "GET|/usuario/all" => [UsuarioController::class, 'dashboard'],
  "GET|/usuario/edit" => [UsuarioController::class, 'formEditar'],
  'POST|/usuario/edit' => [UsuarioController::class, 'editar'],
  'GET|/usuario/delete' => [UsuarioController::class, 'excluir'],

];

if(array_key_exists($rota, $rotas)){

  $controlador = new $rotas[$rota][0];
  $funcao = $rotas[$rota][1];
  
  $controlador->$funcao();
}else{
  http_response_code(404);
}

// $resultado = $rotas[$rota];
// $controlador = new $resultado[0]();
// $funcao = $resultado[1];
// $controlador->$funcao(); 


// // echo "<pre>";
// // var_dump($funcao);
// // exit;

// // $controlador = new $rotas[$rota][0];
// // $funcao = $rotas[$rota][1];

// // $controlador->$funcao();




// if($rota == '/casa' && $metodo  == "GET"){
//             // var_dump($_GET);
//             include_once __DIR__ . '/../views/html.php';

                      
// } else if ($rota == '/create' && $metodo  == "GET"){  

//          include_once  __DIR__ . '/../models/insertlogin.php';
//         //  var_dump($_GET);
//          include_once  __DIR__ . '/../views/add.php';

// } else if ($rota == '/wagner' && $metodo  == "POST"){  
 
//         $nome = $_POST['nome'] ?? '';
//         $email = $_POST['email'] ?? '';
//         $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    
//         if (!empty($nome) && !empty ($email) && !empty ($_POST ['senha'])){
//         $sqlinsert = "INSERT INTO usuarios (nome, email, senha)
//                       VALUES (:nome, :email, :senha)";
//         $stmt = $pdo->prepare($sqlinsert);
//         $stmt ->bindParam(':nome', $nome);
//         $stmt ->bindParam(':email', $email);
//         $stmt ->bindParam(':senha', $senha);
        
//         if ($stmt-> execute()){
//           header("Location: /create?sucesso=1");
//          exit();
//         }else{
//           echo  "erro!";
//         }
        
//       }
// } else if ($rota == '/wagner' && $metodo  == "POST"){  
 
//         $nome = $_POST['nome'] ?? '';
//         $email = $_POST['email'] ?? '';
//         $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    
//         if (!empty($nome) && !empty ($email) && !empty ($_POST ['senha'])){
//         $sqlinsert = "INSERT INTO usuarios (nome, email, senha)
//                       VALUES (:nome, :email, :senha)";
//         $stmt = $pdo->prepare($sqlinsert);
//         $stmt ->bindParam(':nome', $nome);
//         $stmt ->bindParam(':email', $email);
//         $stmt ->bindParam(':senha', $senha);
        
//         if ($stmt-> execute()){
//           header("Location: /create?sucesso=1");
//          exit();
//         }else{
//           echo  "erro!";
//         }
        
//       }
// } else if ($rota == '/waguinho' && $metodo == "POST") {
    
//     $id = $_POST['id'] ?? '';
//     $nome = $_POST['nome'] ?? '';
//     $email = $_POST['email'] ?? '';
//     $senha = !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : '';

//     if (!empty($id) && !empty($nome) && !empty($email)) {
//         // Se senha for fornecida, atualiza também
//         if (!empty($senha)) {
//             $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
//             $stmt = $pdo->prepare($sql);
//             $stmt->bindParam(':senha', $senha);
//         } else {
//             // Atualiza sem a senha
//             $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
//             $stmt = $pdo->prepare($sql);
//         }

//         $stmt->bindParam(':nome', $nome);
//         $stmt->bindParam(':email', $email);
//         $stmt->bindParam(':id', $id, PDO::PARAM_INT);

//         if ($stmt->execute()) {
//             header("Location: /create?editado=1");
//             exit();
//         } else {
//             echo "Erro ao editar o usuário!";
//         }
//     } else {
//         echo "ID, nome e email são obrigatórios.";
//     }

// } else {
    
//     http_response_code(404);
//     echo "<h1> ROTA NÃO EXISTE </h1>";
// }


