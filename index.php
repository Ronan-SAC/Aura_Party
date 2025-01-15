<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 
    <title>Login</title>
</head>
<body>
<section id="section_login">
    <form action="./backend/router/LoginRouter.php?acao=validarLogin" method="POST">
        <h1>Login</h1>
        <div class="container_login">
            <h2>Insira seu Nome</h2>
             <input type="text" name="nome" class="input">
             <h2>Insira sua Senha</h2>
             <input type="password" name="senha" class="input">
             <button type="submit" class="button-6" role="button">Logar</button>
        </div>
    </form>

    </section>
    
</body>
</html>