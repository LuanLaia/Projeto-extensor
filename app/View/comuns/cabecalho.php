<?php 
    use Core\Library\Session;
    use Core\Library\Request
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" href="<?= baseUrl() ?>assets/img/favicon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Emprega Muriaé">
    <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="<?= baseUrl() ?>assets/css/cabecalho.css" rel="stylesheet">
    <script src="<?= baseUrl() ?>assets/js/cabecalho.js"></script>
</head>
<body>
<header>
    <div>
 <a class="logo-container" href="<?= baseUrl() ?>Home">
 <img src="<?= baseUrl() ?>assets/img/logo.png" alt="Emprega Muriaé Logo" style="height: 100px;"> </a>
    </div>
    <nav>
        
        <ul>
            <?php if (Session::get("userId")): ?>
                <li><a href="<?= baseUrl() ?>Sistema">Home</a></li>
                <li><a href="<?= baseUrl() ?>Vagas">Vagas</a></li>
                <li><a href="<?= baseUrl() ?>#">Sobre Nós</a></li>
            <?php if (Session::get("userNivel") == 21): ?>
                <li >
                    <a href="<?= baseUrl() ?>Curriculo">Currículos</a>
                </li>
            <?php endif; ?>
                <div class="user-dropdown">
                    <button class="dropdown-toggle" onclick="toggleDropdown()">
                        <i class="bi bi-person-circle"></i>
                    </button>
                    <ul class="dropdown-menu" id="dropdownMenu">
                        <li><a href="<?= baseUrl() ?>Perfil">Meu Perfil</a></li>
                        <li><a href="<?= baseUrl() ?>login/signOut">Sair</a></li>
                    </ul>
                </div> 
            <?php else: ?>
                <?php if ($this->request->getController() == "Login"):  ?> 
                    <li class="nav-item">
                        <a class="login-btn" href="<?= baseUrl() ?>Cadastro">Registrar</a>
                    </li> 
                <?php else: ?>
                    <li class="nav-item">
                        <a class="login-btn" href="<?= baseUrl() ?>Login">Login</a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </nav>
</header>


