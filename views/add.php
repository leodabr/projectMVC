<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Usuário</title>
</head>
<body>

  <body>

  <h1>Cadastro de usuário</h1>
  <form action="/usuario/add" method="post">
    <input type="text" name="nome">
    <input type="email" name="email">
    <input type="password" name="senha">
    <input type="submit" value="Adicionar">
  </form>
  <form action="/usuario/login" method="GET" style="margin-top: 10px;">
  <button type="submit">Já tenho uma conta!</button>
</form>
  
</body>

  