<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/cadastro.css">
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Fundo de vídeo com overlay -->
<div class="youtube-background">
  <iframe
    src="https://www.youtube.com/embed/vPXoeMMBr90?autoplay=1&mute=1&loop=1&playlist=vPXoeMMBr90&controls=0&showinfo=0&autohide=1&modestbranding=1"
    frameborder="0"
    allow="autoplay; encrypted-media"
    allowfullscreen>
  </iframe>
</div>

<div class="overlay"></div>

<!-- Card de cadastro -->
<div class="container">
  <div class="register-card">
    <a href="<?= baseUrl()?>Home" class="back-arrow">←</a>
    <h2 class="title">Cadastro</h2>

    <div class="tabs">
      <button onclick="showForm('usuario')" id="usuarioBtn" class="active">Usuário</button>
      <button onclick="showForm('empresa')" id="empresaBtn">Empresa</button>
    </div>

    <!-- Formulário Usuário -->
    <form id="form-usuario" class="form active" action="<?= baseUrl() ?>Cadastro/store" method="post">
      <input type="hidden" name="tipo_cadastro" value="usuario">
      <input type="text" name="nome" placeholder="Nome completo" required>
      <input type="text" name="cpf" placeholder="CPF" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <input type="password" name="senha_confirmar" placeholder="Repetir Senha" required>
      <label><input type="checkbox" name="termos"> Aceito os termos de uso</label>
      <button type="submit">Registrar</button>
    </form>

    <!-- Formulário Empresa -->
    <form id="form-empresa" class="form" action="<?= baseUrl() ?>Cadastro/store" method="post">
      <input type="hidden" name="tipo_cadastro" value="empresa">
      <input type="text" name="nome" placeholder="Nome da Empresa" required>
      <input type="text" name="cnpj" placeholder="CNPJ" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <input type="password" name="senha_confirmar" placeholder="Repetir Senha" required>
      <label><input type="checkbox" name="termos"> Aceito os termos de uso</label>
      <button type="submit">Registrar</button>
    </form>

    <p class="login-link">Já tem uma conta? <a href="<?= baseUrl()?>Login">Entrar</a></p>
  </div>
</div>

<script src="<?= baseUrl() ?>assets/js/cadastro.js"></script>
</body>
</html>
