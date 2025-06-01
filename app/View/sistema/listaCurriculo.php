<?= formTitulo("Lista de Currículos", true) ?>

<div class="container my-4">
    <div class="row row-cols-1 g-4">

        <?php foreach ($aDados as $value): ?>
            <div class="col">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h4 class="card-title mb-3"><?= htmlspecialchars($value['logradouro']) ?>, <?= htmlspecialchars($value['numero']) ?> <?= $value['complemento'] ? ' - ' . htmlspecialchars($value['complemento']) : '' ?></h4>
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
                                <p><strong>Foto:</strong> <img src="<?= baseUrl() . 'imagem.php?file=curriculo/' . $value['foto'] ?>" class="img-thumbnail" height="120" width="240" alt="Imagem Curriculo"></p>
                                <p><strong>Apresentação Pessoal:</strong><br><?= nl2br(htmlspecialchars($value['apresentacaoPessoal'])) ?></p>
                            </div>
                        </div>

                        <div class="mt-3 text-end">
                            <a href="<?= baseUrl() ?>Curriculo/form/view/<?= $value['id'] ?>" class="btn btn-outline-primary btn-sm me-2">Visualizar</a>
                            <a href="<?= baseUrl() ?>Curriculo/form/update/<?= $value['id'] ?>" class="btn btn-outline-warning btn-sm me-2">Alterar</a>
                            <a href="<?= baseUrl() ?>Curriculo/form/delete/<?= $value['id'] ?>" class="btn btn-outline-danger btn-sm">Excluir</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
