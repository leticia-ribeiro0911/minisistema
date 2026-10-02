<?php
require_once __DIR__ . '/../includes/functions.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <h1>Faça o login para entrar</h1>
    <main>
        <form action="" method="post">
            <label for="email">E-mail: </label>
            <input type="text" name="email" id="email"><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha"><br>
        <br>
            <input type="submit" value="Entrar">
            <input type="reset" value="Limpar">
        </form>

        <?php 
        if($_SERVER['REQUEST_METHOD'] == "POST") {
        $usuario = consultauser($conexao, $_POST['email']);
            if($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']){
                session_start();
                $_SESSION['id'] = $usuario['id'];
                header("Location: ../index.php");
                exit();
            } else {
                echo "Usuário ou senha inválidos.";
            }
        header("Location: ../index.php");
        exit();
        }
        ?>

    </main>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>