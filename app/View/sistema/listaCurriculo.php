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
    <!-- Estilo personalizado -->
    <link href="<?= baseUrl() ?>assets/css/listaCurriculo.css" rel="stylesheet">
    <!-- IMPORTAÇÃO DO CSS DA FOLHA -->
    <link href="<?= baseUrl() ?>assets\css\folhaCurriculo.css" rel="stylesheet">

</head>
<body>

    <!-- Título da página -->
    <?= formTitulo("📄 Lista de Currículos", true) ?>

    <div class="container my-5">
        <div class="row row-cols-1 g-4">
            <!-- Loop para exibir cada currículo -->
            <?php foreach ($aDados as $value): ?>
                <div class="col" data-aos="fade-up">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <!-- Endereço principal -->
                            <h4 class="card-title mb-3">
                                <?= htmlspecialchars($value['logradouro']) ?>, <?= htmlspecialchars($value['numero']) ?>
                                <?= $value['complemento'] ? ' - ' . htmlspecialchars($value['complemento']) : '' ?>
                            </h4>
                            <h6 class="text-muted mb-3"><?= htmlspecialchars($value['bairro']) ?> - CEP: <?= htmlspecialchars($value['cep']) ?></h6>

                            <!-- Colunas com dados pessoais -->
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

                            <!-- Botões de ação -->
                            <div class="mt-3 text-end">
                                <!-- Botão que agora abre o modal -->
                                <button class="btn btn-outline-primary btn-sm me-2" onclick='visualizarCurriculo(<?= json_encode($value) ?>)'>
                                    <i class="bi bi-eye"></i> Visualizar
                                </button>
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

    <!-- Modal que simula a folha de papel -->
    <div class="modal fade" id="modalCurriculo" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content paper-style">
          <div class="modal-header">
            <h2 class="modal-title">Currículo Completo</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body" id="conteudoCurriculo">
            <!-- Conteúdo do currículo será inserido via JS -->
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();

        // Função para abrir o modal e exibir os dados do currículo
       function visualizarCurriculo(dados) {
            const sexo = dados.sexo === 'M' ? 'Masculino' : 'Feminino';
            const conteudo = `
                <p><strong>ID:</strong> ${dados.id}</p>
                <p><strong>Endereço:</strong> ${dados.logradouro}, ${dados.numero} ${dados.complemento ? '- ' + dados.complemento : ''}</p>
                <p><strong>Bairro:</strong> ${dados.bairro} - CEP: ${dados.cep}</p>
                <p><strong>Cidade:</strong> ${dados.cidade_id}</p>
                <p><strong>Celular:</strong> ${dados.celular}</p>
                <p><strong>Email:</strong> ${dados.email}</p>
                <p><strong>Data de Nascimento:</strong> ${dados.dataNascimento}</p>
                <p><strong>Sexo:</strong> ${sexo}</p>
                <p><strong>Apresentação Pessoal:</strong><br>${dados.apresentacaoPessoal.replace(/\n/g, "<br>")}</p>
                <p><strong>Foto:</strong><br><img src="<?= baseUrl() ?>imagem.php?file=curriculo/${dados.foto}" class="img-fluid rounded" style="max-width: 100%; height: auto;"></p>
            `;
            document.getElementById('conteudoCurriculo').innerHTML = conteudo;
            new bootstrap.Modal(document.getElementById('modalCurriculo')).show();
        }
    </script>
</body>
</html>