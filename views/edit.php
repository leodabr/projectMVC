<!DOCTYPE html> 
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Edição de Usuário</title>
</head>
<body>

  <h1>Editar Usuário</h1>
  <form method="post" action="/usuario/edit">
    <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
    
    <label>Nome: <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required></label><br><br>
    <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required></label><br><br>
    <label>Nova Senha (deixe em branco para não alterar): 
      <input type="password" name="senha">
    </label><br><br>

    <input type="submit" value="Salvar Alterações">
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
