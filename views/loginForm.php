<?php
view('header',['titulo'=> 'Acesso de Usuario'])
?>

<body>

  <div class="form-container">
    <h1>Login de Acesso</h1>
    <form action="/usuario/login" method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>

    <form action="/usuario/add" method="GET">
      <button type="submit" class="create-button">Criar Conta</button>
    </form>
  </div>

</body>
</html>
