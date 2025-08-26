<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/home.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
  <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= baseUrl() ?>assets/css/login.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <!-- 🎥 Fundo de vídeo YouTube -->
  <div class="youtube-background">
    <iframe 
      src="https://www.youtube.com/embed/vPXoeMMBr90?autoplay=1&mute=1&loop=1&playlist=vPXoeMMBr90&controls=0&showinfo=0&autohide=1&modestbranding=1" 
      frameborder="0" 
      allow="autoplay; encrypted-media" 
      allowfullscreen>
    </iframe>
  </div>

  <div class="overlay"></div>

  <!-- 📄 Formulário de Login -->
  <div class="login-container">
    <div class="login-card">
      <div class="title-with-back">
        <a href="<?= baseUrl() ?>Home" class="back-arrow">&#8592;</a>
        <h2 class="title">Login</h2>
      </div>

      
      <form action="<?= baseUrl() ?>login/signIn" method="post">
        <div class="input-group">
          <input type="email" name="email" placeholder="E-mail" value="<?= setValor("email") ?>" required autofocus>
        </div>
        <div class="input-group">
          <input type="password" name="senha" placeholder="Senha" required>
        </div>
        <h6><a href="<?= baseUrl() ?>Login/esqueciASenha" class="text-decoration-none text-light">Esqueci minha senha!</a></h6>
        <button type="submit" class="btn-login">Entrar</button>
      </form>

      <?= exibeAlerta() ?>

      <p class="register-link text-light">
        Não tem uma conta? <a href="<?= baseUrl() ?>Cadastro">Registre-se</a>
      </p>
    </div>
  </div>

</body>
</html>
