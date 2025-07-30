<?php //echo "<pre>"; var_dump($usuarios); echo "</pre>"; ?>

<!DOCTYPE html> 
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Edição de Usuário</title>
</head>
<body>

  <h1>Editar Usuário</h1>
  <form method="post" action="/usuario/edit">
    <input type="hidden" name="id" value="<?= htmlspecialchars($usuarios['id']) ?>">
    <label>Nome: <input type="text" name="nome" value="<?= htmlspecialchars($usuarios['nome']) ?>" required></label><br><br>
    <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($usuarios['email']) ?>" required></label><br><br>
    <label>Nova Senha (deixe em branco para não alterar): 
      <input type="password" name="senha">
    </label><br><br>

    <input type="submit" value="Salvar Alterações">
  </form>

  <hr>

</body>
</html>
