<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Currículos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- AOS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="<?= baseUrl() ?>assets/css/listaCurriculo.css" rel="stylesheet">
</head>
<body>

    <?= formTitulo("📄 Lista de Currículos", true) ?>

    <div class="container my-5">
        <div class="row row-cols-1 g-4">
            <?php foreach ($aDados as $value): ?>
                <div class="col" data-aos="fade-up">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <h4 class="card-title mb-3">
                                <?= htmlspecialchars($value['logradouro']) ?>, <?= htmlspecialchars($value['numero']) ?>
                                <?= $value['complemento'] ? ' - ' . htmlspecialchars($value['complemento']) : '' ?>
                            </h4>
                            <h6 class="text-muted mb-3"><?= htmlspecialchars($value['bairro']) ?> - CEP: <?= htmlspecialchars($value['cep']) ?></h6>

                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>ID:</strong> <?= $value['id'] ?></p>
                                    <p><strong>Cidade:</strong> <?= htmlspecialchars($value['cidade_id']) ?></p>
                                    <p><strong>Celular:</strong> <?= htmlspecialchars($value['celular']) ?></p>
                                    <p><strong>Data de Nascimento:</strong> <?= htmlspecialchars($value['dataNascimento']) ?></p>
                                    <p><strong>Sexo:</strong> <?= $value['sexo'] == 'M' ? 'Masculino' : 'Feminino' ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Email:</strong> <?= htmlspecialchars($value['email']) ?></p>
                                    <p><strong>Foto:</strong>
                                        <?= $value['foto']
                                            ? '<img src="' . baseUrl() . 'uploads/' . $value['foto'] . '" alt="Foto" class="img-thumbnail" width="100">'
                                            : 'Não enviada' ?>
                                    </p>
                                    <p><strong>Apresentação Pessoal:</strong><br><?= nl2br(htmlspecialchars($value['apresentacaoPessoal'])) ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Email:</strong> <?= htmlspecialchars($value['email']) ?></p>
                                <p><strong>Foto:</strong> <img src="<?= baseUrl() . 'imagem.php?file=curriculo/' . $value['foto'] ?>" class="img-thumbnail" height="120" width="240" alt="Imagem Curriculo"></p>
                                <p><strong>Apresentação Pessoal:</strong><br><?= nl2br(htmlspecialchars($value['apresentacaoPessoal'])) ?></p>
                            </div>
                        </div>

                            <div class="mt-3 text-end">
                                <a href="<?= baseUrl() ?>Curriculo/form/view/<?= $value['id'] ?>" class="btn btn-outline-primary btn-sm me-2">
                                    <i class="bi bi-eye"></i> Visualizar
                                </a>
                                <a href="<?= baseUrl() ?>Curriculo/form/update/<?= $value['id'] ?>" class="btn btn-outline-warning btn-sm me-2">
                                    <i class="bi bi-pencil-square"></i> Alterar
                                </a>
                                <a href="<?= baseUrl() ?>Curriculo/form/delete/<?= $value['id'] ?>" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-trash"></i> Excluir
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>
