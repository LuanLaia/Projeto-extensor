<?= formTitulo("Lista Vagas", true) ?>

<div class="m-2 row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">

    <?php foreach ($aDados as $value): ?>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">ID: <?= $value['id'] ?> - <?= htmlspecialchars($value['descricao']) ?></h5>
                    <p class="card-text mb-1"><strong>Sobre a vaga:</strong> <?= htmlspecialchars($value['sobreaVaga']) ?></p>
                    <p class="card-text mb-1"><strong>Modalidade:</strong> <?= htmlspecialchars($value['modalidade']) ?></p>
                    <p class="card-text mb-1"><strong>Vínculo:</strong> <?= htmlspecialchars($value['vinculo']) ?></p>
                    <p class="card-text mb-1"><strong>Data Início:</strong> <?= htmlspecialchars($value['dtInicio']) ?></p>
                    <p class="card-text mb-1"><strong>Data Fim:</strong> <?= htmlspecialchars($value['dtFim']) ?></p>
                    <p class="card-text mb-3"><strong>Status:</strong> <?= htmlspecialchars($value['statusVaga']) ?></p>

                    <div class="mt-auto">
                        <a href="<?= baseUrl() ?>Vagas/form/view/<?= $value['id'] ?>" class="btn btn-primary btn-sm me-1" title="Visualizar">Visualizar</a>
                        <a href="<?= baseUrl() ?>Vagas/form/update/<?= $value['id'] ?>" class="btn btn-warning btn-sm me-1" title="Alterar">Alterar</a>
                        <a href="<?= baseUrl() ?>Vagas/form/delete/<?= $value['id'] ?>" class="btn btn-danger btn-sm" title="Excluir">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
