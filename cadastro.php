<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tela de Cadastro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./_css/cad.css'>
</head>

<body>
    <div class="container">
        <form id="formCadastro">
            <div id="colunass">
                <h1>INFORMAÇÕES DE CADASTRO</h1>
                <label for="nomesobrenome">Nome Completo</label>
                <br>
                <input type="text" id="nomesobrenome" class="input-padrao" required placeholder="Nome Completo">
                <br>
                <label for="cpf">CPF</label>
                <br>
                <input type="text" id="cpf" class="input-padrao" required>
                <span id="resposta"></span>
                <br>
                <label for="date">Data de Nascimento</label>
                <br>
                <input type="text" id="date" class="input-padrao" required placeholder="00/00/0000">
                <br>
                <label for="telefone">Telefone</label>
                <br>
                <input type="tel" id="fone" class="input-padrao" required placeholder="(99) 9 9999-9999">
                <br>
                <label for="email">E-mail</label>
                <br>
                <input type="email" id="email" class="input-padrao" required placeholder="seuemail@dominio.com">
                <br>
                <label for='senha'>Senha:</label>
                <br>
                <input type='password' id='senha' class="input-padrao" required placeholder="Digite sua senha:">
                <br>
                <label for='csenha'>Confirmar Senha:</label>
                <br>
                <input type='password' id='csenha' class="input-padrao" required placeholder="Digite sua senha:">
                <br>
            </div>
            <div id="colunas">
                <h1>ENDEREÇO</h1>
                <label for="cep">cep:</label>
                <br>
                <input type="text" class="form-control" id="cep" required>
                <br>
                <label for="rua">Rua</label>
                <br>
                <input type="text" class="form-control" id="rua" required placeholder="Rua dos Bobos">
                <br>
                <label for="numero">N.º</label>
                <br>
                <input type="text" class="form-control" id="numero" required placeholder="nº 0">
                <br>
                <label for="bairro">Bairro</label>
                <br>
                <input type="text" class="form-control" id="bairro" required placeholder="Apartamento, hotel, casa, etc.">
                <br>
                <label for="cidade">Cidade</label>
                <br>
                <input type="text" class="form-control" id="cidade" required>
                <br>
                <label for="estado">Estado</label>
                <br>
                <input type="text" class="form-control" id="estado" required>
                <br>
                <label for="complemento">complemento</label>
                <br>
                <input type="text" class="form-control" id="complemento">
            </div>
            <br>
            <button type="submit" id="glow-on-hover" class="botao">CADASTRAR</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        'use strict'; //Modo "Restrito"

        // Consumindo API de CEP, do ViaCep
        // https://viacep.com.br/

        // Limpa o Form (do CEP pra baixo)...
        const limparFormulario = () => {
            document.getElementById('rua').value = '';
            document.getElementById('bairro').value = '';
            document.getElementById('cidade').value = '';
            document.getElementById('estado').value = '';
        }

        // Preenche os campos relacionados ao CEP...
        const preencherForumulario = (endereco) => {
            document.getElementById('rua').value = endereco.logradouro;
            document.getElementById('bairro').value = endereco.bairro;
            document.getElementById('cidade').value = endereco.localidade;
            document.getElementById('estado').value = endereco.uf;
        }

        // Verifica se o CEP é válido...
        const eNumero = (numero) => /^[0-9]+$/.test(numero); //Expressão Regular
        // É possível testar e entender a RegEx em https://www.regexpal.com/
        const cepValido = (cep) => cep.length == 8 && eNumero(cep);

        // Consumindo API... 2- passo
        const pesquisarCep = async () => {
            limparFormulario();
            const url = `https://viacep.com.br/ws/${cep.value}/json/`;

            if (cepValido(cep.value)) {
                const dados = await fetch(url); //await = esperar
                const addres = await dados.json(); // fetch = promessa

                // hasOwnProperty  retorna um booleano indicando se o objeto possui a propriedade especificada como uma propriedade definida no próprio objeto em questão
                if (addres.hasOwnProperty('erro')) {
                    // document.getElementById('rua').value = 'CEP não encontrado!';
                    alert('CEP não encontrado!');
                } else {
                    preencherForumulario(addres);
                }
            } else {
                // document.getElementById('rua').value = 'CEP incorreto!';
                alert('CEP incorreto!');
            }
        }

        // Adicionando um evento DOM, no input CEP... 1- passo
        document.getElementById('cep').addEventListener('focusout', pesquisarCep);

        function CPF() {
            "user_strict";
            function r(r) {
                for (var t = null, n = 0; 9 > n; ++n)
                    t += r.toString().charAt(n) * (10 - n);
                var i = t % 11; return i = 2 > i ? 0 : 11 - i
            }
            function t(r) {
                for (var t = null, n = 0; 10 > n; ++n) t += r.toString().charAt(n) * (11 - n);
                var i = t % 11; return i = 2 > i ? 0 : 11 - i
            }
            var n = "CPF Inválido", i = "CPF Válido";
            this.gera = function () {
                for (var n = "", i = 0; 9 > i; ++i) n += Math.floor(9 * Math.random()) + "";
                var o = r(n), a = n + "-" + o + t(n + "" + o); return a
            }
                , this.valida = function (o) {
                    for (var a = o.replace(/\D/g, ""), u = a.substring(0, 9), f = a.substring(9, 11), v = 0; 10 > v; v++) if ("" + u + f == "" + v + v + v + v + v + v + v + v + v + v + v) return n;
                    var c = r(u), e = t(u + "" + c);
                    return f.toString() === c.toString() + e.toString() ? i : n
                }
        }

        var CPF = new CPF();
        // document.write(CPF.valida("123.456.789-00"));

        $("#cpf").keypress(function () {
            $("#resposta").html(CPF.valida($(this).val()));
        });

        $("#cpf").blur(function () {
            $("#resposta").html(CPF.valida($(this).val()));
        });

        document.getElementById('formCadastro').addEventListener('submit', function (event) {
            event.preventDefault();

            // Verificação de CPF
            if (CPF.valida($("#cpf").val()) === "CPF Inválido") {
                alert("CPF Inválido!");
                return false;
            }
            // Verificação de senhas
            const senha = document.getElementById('senha').value;
            const csenha = document.getElementById('csenha').value;
            if (senha !== csenha) {
                alert("Senhas não coincidem!");
                return false;
            }

            // Se todos os campos estiverem válidos, redireciona para a página index.php
            window.location.href = 'login.php';
        });
    </script>
</body>
</html>
