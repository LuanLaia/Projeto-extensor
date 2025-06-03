<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vagas</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #eef2f3, #8e9eab);
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        .card-title i {
            color: #0d6efd;
        }

        .btn {
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .filter-bar {
            background: #ffffffdd;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

main {
    flex-grow: 1;
}
    </style>
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
                        <option value="Ativa">✅ Ativa</option>
                        <option value="Inativa">❌ Inativa</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Lista de Vagas -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="listaVagas">

            <?php foreach ($aDados as $value): ?>
                <div class="col vaga" 
                    data-descricao="<?= strtolower($value['descricao']) ?>" 
                    data-status="<?= strtolower($value['statusVaga']) ?>" 
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
                                <span class="badge bg-<?= $value['statusVaga'] === 'Ativa' ? 'success' : 'secondary' ?>">
                                    <?= htmlspecialchars($value['statusVaga']) ?>
                                </span>
                            </p>

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

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();

        // Script de Filtro/Busca
        const buscaInput = document.getElementById('buscaInput');
        const filtroStatus = document.getElementById('filtroStatus');
        const vagas = document.querySelectorAll('.vaga');

        function filtrarVagas() {
            const termo = buscaInput.value.toLowerCase();
            const status = filtroStatus.value.toLowerCase();

            vagas.forEach(vaga => {
                const descricao = vaga.dataset.descricao;
                const vagaStatus = vaga.dataset.status;
                const mostrar = (!termo || descricao.includes(termo)) && (!status || vagaStatus === status);
                vaga.style.display = mostrar ? 'block' : 'none';
            });
        }

        buscaInput.addEventListener('input', filtrarVagas);
        filtroStatus.addEventListener('change', filtrarVagas);
    </script>

</body>
</html>
