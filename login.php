<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tela de Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./_css/login.css'>
    <link rel="shortcut icon" href="./favicon/favicon.ico" type="image/x-icon">
    <script src='./JS/login.js' defer></script>
</head>

<body>
    <form id="formLogin">
        <h1>LOGIN</h1>
        <p>
            <label for='email'>E-mail:</label>
            <input type='email' id='email' name='email' placeholder="Digite seu email:" required>
        </p>
        <p>
            <label for='senha'>Senha:</label>
            <input type='password' id='senha' placeholder="Digite sua senha:" required>
        </p>
        <button type="submit">Enviar</button>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('formLogin').addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission

                let email = document.getElementById('email').value;
                let senha = document.getElementById('senha').value;

                if (!email || !senha) {
                    alert("Campos de preenchimento obrigatório. Favor preencher");
                } else {
                    window.location.href = "index.php";
                }
            });
        });
    </script>
</body>

</html>