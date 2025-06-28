<?php 
    use Core\Library\Session;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AtomPHP, microframework">
    <meta name="author" content="Aldecir Fonseca">

    <title>Descubra Muriaé | FASM 2025</title>

    <link href="<?= baseUrl() ?>assets/img/AtomPHP-icone.png" rel="icon" type="image/png">
    <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="<?= baseUrl() ?>assets/css/cabecalho.css" rel="stylesheet">
</head>
<body>

    <header class="container-fluid mb-4 shadow-sm">
        <nav class="navbar navbar-expand-lg bg-primary border-bottom">
            <div class="container">
              <a class="navbar-brand fw-bold" href="<?= baseUrl() ?>Home">Descubra Muriaé</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <?php if (Session::get("userId")): ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->request->getController() === 'Home' ? 'active' : '' ?>" href="<?= baseUrl() ?>Sistema">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->request->getController() === 'Vagas' ? 'active' : '' ?>" href="<?= baseUrl() ?>Vagas">Vagas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->request->getController() === 'Curriculo' ? 'active' : '' ?>" href="<?= baseUrl() ?>Curriculo">Currículo</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Usuário
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?= baseUrl() ?>login/signOut">Sair</a></li>               
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?= baseUrl() ?>Usuario/formTrocarSenha">Trocar a Senha</a></li>
                                </ul>
                            </li>
                         <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= baseUrl() ?>Login">Login</a>
                            </li>
                         <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
