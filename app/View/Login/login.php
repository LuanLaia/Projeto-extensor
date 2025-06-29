<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="<?= baseUrl() ?>assets/css/login.css" rel="stylesheet">
  <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <div class="background-card"></div>
  
  <div class="login-container">
    <div class="login-card">
      <a href="<?= baseUrl()?>Home" class="back-arrow">&#8592;</a>
      <h3 class="title">Login</h3>
      
      <form action="<?= baseUrl() ?>login/signIn" method="post">
        <div class="input-group">
          <input type="email" name="email" placeholder="E-mail" value="<?= setValor("email")?>" required autofocus>
        </div>
        <div class="input-group">
          <input type="password" name="senha" placeholder="Senha" required>
        </div>
        <h6><a href="<?= baseUrl() ?>Login/esqueciASenha" class="text-decoration-none">Esqueci minha senha!</a></h6>
        <button type="submit" class="btn-login">Entrar</button>
      </form>
      
      <?= exibeAlerta() ?>

      <p class="register-link">
        Não tem uma conta? <a href="<?= baseUrl()?>Cadastro">Registre-se</a>
      </p>
    </div>
  </div>
</body>
</html>
