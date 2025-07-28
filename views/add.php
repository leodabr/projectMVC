<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Usuário</title>
</head>
<body>

  <h1>Cadastro de Usuário</h1>
  <form method="post" action="/waguinho1">
    <label>Nome: <input type="text" name="nome" required></label><br><br>
    <label>Email: <input type="email" name="email" required></label><br><br>
    <label>Senha: <input type="password" name="senha" required></label><br><br>
    <input type="submit" value="Enviar">
  </form>

  <hr>

  <h1>Usuários Cadastrados</h1>
  <table border="1" cellpadding="8">
      <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
      </tr>
      <?php foreach ($usuarios as $usuario): ?>
          <tr>
              <td><?= htmlspecialchars($usuario['id']) ?></td>
              <td><?= htmlspecialchars($usuario['nome']) ?></td>
              <td><?= htmlspecialchars($usuario['email']) ?></td>
          </tr>
      <?php endforeach; ?>
  </table>

</body>
</html>
