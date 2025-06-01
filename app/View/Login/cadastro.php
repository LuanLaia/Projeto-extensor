<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Registro</title>
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/cadastro.css">
    <script src="<?= baseUrl() ?>assets/js/cadastro.js"></script>
</head>
<body>
    <div class="container">
        
        <div class="tabs">
            <button onclick="showForm('usuario')" id="usuarioBtn" class="active">Usuário</button>
            <button onclick="showForm('empresa')" id="empresaBtn">Empresa</button>
        </div>
        <a href="<?= baseUrl()?>Home" class="back-arrow">←</a>
        <form id="form-usuario" class="form active">
            <h2>Registro de Usuário</h2>
            <input type="text" placeholder="Nome" required>
            <input type="text" placeholder="CPF" required>
            <input type="email" placeholder="Email" required>
            <input type="password" placeholder="Senha" required>
            <input type="password" placeholder="Repetir Senha" required>
            <label><input type="checkbox"> Aceito os termos de uso</label>
            <button type="submit">Registrar</button>
        </form>
        <form id="form-empresa" class="form">
            <h2>Registro de Empresa</h2>
            <input type="text" placeholder="Nome da Empresa" required>
            <input type="text" placeholder="CNPJ" required>
            <input type="email" placeholder="Email" required>
            <input type="password" placeholder="Senha" required>
            <input type="password" placeholder="Repetir Senha" required>
            <label><input type="checkbox"> Aceito os termos de uso</label>
            <button type="submit">Registrar</button>
        </form>

        <p style="margin-top: 1rem; text-align: center;">
            Já possui um login? <a href="<?= baseUrl()?>Login">Entrar</a>
        </p>
    </div>
    
</body>
</html>