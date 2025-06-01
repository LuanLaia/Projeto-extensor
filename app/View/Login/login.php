<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="<?= baseUrl() ?>assets/css/login.css" rel="stylesheet">
</head>
<body>
  <div class="background-card"></div>
  
  <div class="login-container">
    <div class="login-card">
      <a href="<?= baseUrl()?>Home" class="back-arrow">&#8592;</a>
      <h3 class="title">Login</h3>
      <form>
        <div class="input-group">
          <input type="email" placeholder="E-mail" required>
        </div>
        <div class="input-group">
          <input type="password" placeholder="Senha" required>
        </div>
        <button type="submit" class="btn-login">Entrar</button>
      </form>
      <p class="register-link">
        Não tem uma conta? <a href="#">Registre-se</a>
      </p>
    </div>
  </div>
</body>
</html>
