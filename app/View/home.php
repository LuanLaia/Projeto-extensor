<style>
           body {
            background: linear-gradient(to right, #f8f9fa, #dceefb);
            font-family: 'Segoe UI', sans-serif;
        }
    .hero {
        background: linear-gradient(to right, #0d6efd, #0d6efd);
        color: white;
        padding: 80px 20px;
        text-align: center;
        border-radius: 12px;
        margin-bottom: 40px;
    }

    .hero img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin-top: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .btn-home {
        margin-top: 30px;
    }
</style>

<div class="hero">
    <h1>Seja bem-vindo ao <strong>Descubra Muriaé</strong></h1>
    <p class="lead">O portal que conecta talentos e oportunidades na nossa cidade!</p>

    <!-- IMAGEM DESTACADA -->
    <img src="<?= baseUrl() ?>assets/img/logodescubramuriaé.png" alt="Vista de Muriaé">

    <div class="btn-home">
        <a href="<?= baseUrl() ?>Vagas" class="btn btn-light btn-lg me-2">Ver Vagas</a>
        <a href="<?= baseUrl() ?>Curriculo" class="btn btn-outline-light btn-lg">Cadastrar Currículo</a>
    </div>
</div>
