<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Registro</title>
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/cadastro.css">
    <script src="<?= baseUrl() ?>assets/js/cadastro.js"></script> <!-- Meio que puxa o arquivo do JavaScript pra 
    funcionar a tela de cadastro -->
</head>
<body>
    
<div class="background-card">

    <div class="container">
        <div class="tabs">
            <button onclick="showForm('usuario')" id="usuarioBtn" class="active">Usuário</button>
            <button onclick="showForm('empresa')" id="empresaBtn">Empresa</button>
        </div>
        <a href="<?= baseUrl()?>Home" class="back-arrow">←</a>

        <form id="form-usuario" class="form active" action="<?= baseUrl() ?>Cadastro/store" method="post">
            <h2>Registro de Usuário</h2>
            <input type="hidden" name="tipo_cadastro" value="usuario">
            <input type="text" name="nome" placeholder="Nome" maxlength="150" required>
            <input type="text" name="cpf" placeholder="CPF"  maxlength="11" required>
            <input type="email" name="email" placeholder="Email" maxlength="50" required>
            <input type="password" name="senha" placeholder="Senha" minlength="8" required>
            <input type="password" name="senha_confirmar" placeholder="Repetir Senha" minlength="8" required>
            <label><input type="checkbox" name="termos"> Aceito os termos de uso</label>
            <button type="submit">Registrar</button>
        </form>

        <form id="form-empresa" class="form" action="<?= baseUrl() ?>Cadastro/store" method="post">
            <h2>Registro de Empresa</h2>
            <input type="hidden" name="tipo_cadastro" value="empresa">
            <input type="text" name="nome" placeholder="Nome da Empresa" maxlength="150" required>
            <input type="text" name="cnpj" placeholder="CNPJ" maxlength="14" required>
            <input type="email" name="email" placeholder="Email" maxlength="50" required>
            <input type="password" name="senha" placeholder="Senha" inlength="8" required>
            <input type="password" name="senha_confirmar" placeholder="Repetir Senha" minlength="8" required>
            <label><input type="checkbox" name="termos"> Aceito os termos de uso</label>
            <button type="submit">Registrar</button>
        </form>

        <p style="margin-top: 1rem; text-align: center;">
            Já possui um login? <a href="<?= baseUrl()?>Login">Entrar</a>
        </p>
    </div>   
</body>
</html>
