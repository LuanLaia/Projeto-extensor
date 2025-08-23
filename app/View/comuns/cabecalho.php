<?php 
    use Core\Library\Session;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Emprega Muriaé">
    <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="<?= baseUrl() ?>assets/css/cabecalho.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="logo">EMPREGA MURIAÉ</div>
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
                <li><a  href="<?= baseUrl() ?>login/signOut">Sair</a></li> 
            <?php else: ?>
                <li class="nav-item">
                    <a class="login-btn" href="<?= baseUrl() ?>Login">Login</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
