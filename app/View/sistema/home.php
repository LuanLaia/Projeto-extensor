<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprega Muriaé - Bem-vindo</title>
    
    <!-- IMPORTANTE: Link para o NOVO arquivo CSS -->
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/home.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Fundo de Vídeo do YouTube (O mesmo de antes) -->
    <div class="youtube-background">
        <iframe 
            src="https://www.youtube.com/embed/vPXoeMMBr90?autoplay=1&mute=1&loop=1&playlist=vPXoeMMBr90&controls=0&showinfo=0&autohide=1&modestbranding=1" 
            frameborder="0" 
            allow="autoplay; encrypted-media" 
            allowfullscreen>
        </iframe>
    </div>
    <div class="overlay"></div>
    <!-- ========== Conteúdo Principal (Adaptado para a home logada) ========== -->
    <main class="content-logged-in">
        <div class="hero">
            <h1>Seja bem-vindo ao <strong>Emprega Muriaé</strong></h1>
            <p class="lead">O portal que conecta talentos e oportunidades na nossa cidade!</p>
        
            <!-- IMAGEM DESTACADA -->
            <img src="<?= baseUrl() ?>assets/img/logoempregamuriae.png" alt="Logo Emprega Muriaé">
        
            <div class="btn-home">
                <a href="<?= baseUrl() ?>Vagas" class="btn btn-light">Ver Vagas</a>
                <a href="<?= baseUrl() ?>Curriculo" class="btn btn-outline-light">Cadastrar Currículo</a>
            </div>
        </div>
    </main>
</body>
</html>
