<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Usuário</title>
  <link rel="stylesheet" href="/assets/styleLogin.css"> 
</head>
<body>

  <h1>Cadastro de usuário</h1>

  <form action="/usuario/add" method="post" class="form-container">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <input type="submit" value="Adicionar">
  </form>

  <form action="/usuario/login" method="GET" class="form-container">
    <button type="submit">Já tenho uma conta!</button>
  </form>

</body>
</html>
