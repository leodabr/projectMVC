<?php
view('header',['titulo'=> 'Cadastro e Lista de Usuários'])
?>
<body>

  <h1>Cadastro de Usuário</h1>
  <form action="/usuario/create" method="post">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <input type="submit" value="Adicionar">
  </form>

  <h1>Usuários Cadastrados</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
      <tr>
        <td><?= htmlspecialchars($usuario['id']) ?></td>
        <td><?= htmlspecialchars($usuario['nome']) ?></td>
        <td><?= htmlspecialchars($usuario['email']) ?></td>
        <td>
          <a href="/usuario/edit?id=<?= $usuario['id'] ?>">Editar</a>
          <a href="/usuario/delete?id=<?= $usuario['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

</body>
</html>
