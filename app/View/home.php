<?php
    use Core\Library\Session;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Currículos</title>

    <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="<?= baseUrl() ?>assets/css/listaCurriculo.css" rel="stylesheet">
</head>
<body>
<?= exibeAlerta() ?>
<h1>Seja bem-vindo ao <strong>Descubra Muriaé</strong> loge para continuar</h1>