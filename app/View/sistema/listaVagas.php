<!DOCTYPE html> 
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vagas</title>

    <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- Seu CSS -->
    <link href="<?= baseUrl() ?>assets/css/listaVagas.css" rel="stylesheet">
</head>
<body>

    <div class="container py-5">
        <?= formTitulo("🎯 Lista de Vagas", true) ?>

        <!-- Barra de Busca e Filtro -->
        <div class="filter-bar mb-4">
            <div class="row g-2">
                <div class="col-md-6">
                    <input type="text" id="buscaInput" class="form-control" placeholder="🔎 Buscar por descrição...">
                </div>
                <div class="col-md-6">
                    <select id="filtroStatus" class="form-select">
                        <option value="">🎚️ Filtrar por status</option>
                        <option value="ativa">✅ Ativa</option>
                        <option value="fechada">🚫 Fechada</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Lista de Vagas -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="listaVagas">

            <?php foreach ($aDados as $value): ?>
                <?php
                    // Define o status filtrável: "fechada" se for "Finalizada", senão "ativa"
                    $statusOriginal = strtolower($value['statusVaga']);
                    $statusFiltrado = $statusOriginal === 'finalizada' ? 'fechada' : 'ativa';
                ?>
                <div class="col vaga"
                    data-descricao="<?= strtolower($value['descricao']) ?>"
                    data-status="<?= $statusFiltrado ?>"
                    data-aos="fade-up">

                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary fw-bold">
                                <i class="bi bi-briefcase me-2"></i>
                                ID: <?= $value['id'] ?> - <?= htmlspecialchars($value['descricao']) ?>
                            </h5>

                            <p class="card-text"><strong>Sobre:</strong> <?= htmlspecialchars($value['sobreaVaga']) ?></p>
                            <p class="card-text"><strong>Modalidade:</strong> <?= htmlspecialchars($value['modalidade']) ?></p>
                            <p class="card-text"><strong>Vínculo:</strong> <?= htmlspecialchars($value['vinculo']) ?></p>
                            <p class="card-text"><strong>Início:</strong> <?= htmlspecialchars($value['dtInicio']) ?></p>
                            <p class="card-text"><strong>Fim:</strong> <?= htmlspecialchars($value['dtFim']) ?></p>
                            <p class="card-text">
                                <strong>Status:</strong>
                                <span class="badge bg-<?= $statusFiltrado === 'ativa' ? 'success' : 'secondary' ?>">
                                    <?= $statusFiltrado === 'fechada' ? 'Fechada' : 'Ativa' ?>
                                </span>
                            </p>

                            <!-- Botões -->
                            <div class="mt-auto d-flex justify-content-end gap-2">
                                <a href="<?= baseUrl() ?>Vagas/form/view/<?= $value['id'] ?>" class="btn btn-outline-primary btn-sm" title="Visualizar">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="<?= baseUrl() ?>Vagas/form/update/<?= $value['id'] ?>" class="btn btn-outline-warning btn-sm" title="Alterar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="<?= baseUrl() ?>Vagas/form/delete/<?= $value['id'] ?>" class="btn btn-outline-danger btn-sm" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir esta vaga?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();

        const buscaInput = document.getElementById('buscaInput');
        const filtroStatus = document.getElementById('filtroStatus');
        const vagas = document.querySelectorAll('.vaga');

        function filtrarVagas() {
            const termo = buscaInput.value.toLowerCase();
            const status = filtroStatus.value.toLowerCase();

            vagas.forEach(vaga => {
                const descricao = vaga.dataset.descricao;
                const vagaStatus = vaga.dataset.status;

                const correspondeBusca = !termo || descricao.includes(termo);
                const correspondeStatus = !status || vagaStatus === status;

                vaga.style.display = (correspondeBusca && correspondeStatus) ? 'block' : 'none';
            });
        }

        buscaInput.addEventListener('input', filtrarVagas);
        filtroStatus.addEventListener('change', filtrarVagas);
    </script>
</body>
</html>
