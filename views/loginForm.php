 <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h1>Login de Acesso</h1>
  <form action="/usuario/login" method="POST">
  <input type="email" name="email" required>
  <input type="password" name="senha" required>
  <button type="submit">Entrar</button>
  </form>
  <form action="/usuario/add" method="GET" style="margin-top: 10px;">
  <button type="submit">Criar Conta</button>
</form>
  

  
</body>

   