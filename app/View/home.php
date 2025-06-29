<?php
    use Core\Library\Session;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Currículos</title>
    <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="<?= baseUrl() ?>assets/css/listaCurriculo.css" rel="stylesheet">
</head>
<body>
<?php if ($mensagem = Session::get("msgError")): ?>
    <div class="container mt-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $mensagem ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    </div>
    <?php Session::destroy("msgError"); ?>
<?php endif; ?>
<h1>Seja bem-vindo ao <strong>Descubra Muriaé</strong> loge para continuar</h1>