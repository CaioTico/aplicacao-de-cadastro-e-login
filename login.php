<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tela de Loguin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./_css/login.css'>
    <link rel="shortcut icon" href="./favicon/favicon.ico" type="image/x-icon">
    <script src= './JS/login.js'></script>
</head>

<body>
    <form action=''>
            <h1>
                LOGIN
            </h1>
            <p>
                <label for='email'>E-mail:</label>
                <input type='email' id='email'name='email' placeholder="Digite seu email:">
            </p>
            <p>
                <label for='senha'>Senha:</label>
                <input type='password' id='senha' placeholder="Digite sua senha:">
            </p>
            <button onclick="acessar(); return false;">
                Enviar
            </button>
    </form>
</body>

</html>