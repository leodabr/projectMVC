<p> ROTA HOME CASA ATUAL E OPERANTE </P>



<body>

  <h1>Cadastro de usuário</h1>
  <form action="/usuario/create" method="post">
    <input type="text" name="nome">
    <input type="email" name="email">
    <input type="password" name="senha">
    <input type="submit" value="Enviar">
  </form>
  
</body>

<?php 
    
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Lista de Usuários</title>
    </head>
    <body>
        <h1>Usuários Cadastrados</h1>
        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['nome'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><a href="/usuario/edit?id=<?= $usuario['id'] ?>">Editar</a></td>                    
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
    </html>
<?php