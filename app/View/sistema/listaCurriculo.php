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
    <link href="<?= baseUrl() ?>assets/css/folhaCurriculo.css" rel="stylesheet">
</head>
<body>

    <?= formTitulo("📄 Seus Currículos", true) ?>

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
                                    <p><strong>Nome Completo:</strong> <?= htmlspecialchars(Session::get("userNome")) ?></p>
                                    <p><strong>Cidade:</strong> <?= htmlspecialchars($value['cidade_id']) ?></p>
                                    <p><strong>Celular:</strong> <?= htmlspecialchars($value['celular']) ?></p>
                                    <p><strong>Data de Nascimento:</strong> <?= htmlspecialchars($value['dataNascimento']) ?></p>
                                    <p><strong>Sexo:</strong> <?= $value['sexo'] == 'M' ? 'Masculino' : 'Feminino' ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Email:</strong> <?= htmlspecialchars($value['email']) ?></p>
                                    <p><strong>Foto:</strong> <img src="<?= baseUrl() . 'imagem.php?file=curriculo/' . $value['foto'] ?>" class="img-thumbnail" height="120" width="240" alt="Imagem Curriculo"></p>
                                    <p><strong>Apresentação Pessoal:</strong><br><span class="text-truncate-multiline"><?= nl2br(htmlspecialchars($value['apresentacaoPessoal'])) ?></span></p>
                                </div>
                            </div>

                            <div class="mt-3 text-end">
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

    <div class="modal fade" id="modalCurriculo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content paper-style">
                <div class="modal-header">
                    <h2 class="modal-title">Currículo Completo</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="conteudoCurriculo"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();

        function mostrarFotoCompleta(foto) {
            const fotoExpandida = document.getElementById('fotoExpandida');
            if (fotoExpandida) {
                fotoExpandida.style.display = 'block';
                fotoExpandida.scrollIntoView({ behavior: 'smooth' });
            }
        }
function visualizarCurriculo(dados) {
    const sexo = dados.sexo === 'M' ? 'Masculino' : 'Feminino';
    const userNome = "<?= htmlspecialchars(Session::get('userNome')) ?>";
    const conteudo = `
        <div class="d-flex justify-content-between flex-wrap">
            <div style="flex: 1; min-width: 250px;">
                <p><strong>Nome Completo:</strong> ${userNome}</p>
                <p><strong>Endereço:</strong> ${dados.logradouro}, ${dados.numero} ${dados.complemento ? '- ' + dados.complemento : ''}</p>
                <p><strong>Bairro:</strong> ${dados.bairro} - CEP: ${dados.cep}</p>
                <p><strong>Cidade:</strong> ${dados.cidade_id}</p>
                <p><strong>Celular:</strong> ${dados.celular}</p>
                <p><strong>Email:</strong> ${dados.email}</p>
                <p><strong>Data de Nascimento:</strong> ${dados.dataNascimento}</p>
                <p><strong>Sexo:</strong> ${sexo}</p>
                <p><strong>Apresentação Pessoal:</strong><br><span style="word-break: break-word;">${dados.apresentacaoPessoal.replace(/\n/g, "<br>")}</span></p>
            </div>
            <div class="text-center ms-4">
<img 
  src="<?= baseUrl() ?>imagem.php?file=curriculo/${dados.foto}" 
  alt="Foto 3x4" 
  onclick="mostrarFotoCompleta('${dados.foto}')" 
  class="foto-3x4" 
>
            </div>
        </div>
        <div id="fotoExpandida"></div>
    `;
    document.getElementById('conteudoCurriculo').innerHTML = conteudo;
    document.getElementById('fotoExpandida').style.display = 'none';
    new bootstrap.Modal(document.getElementById('modalCurriculo')).show();
}

function mostrarFotoCompleta(foto) {
    const container = document.getElementById('fotoExpandida');
    container.innerHTML = `
        <hr>
        <p><strong>Foto Completa:</strong></p>
        <img src="<?= baseUrl() ?>imagem.php?file=curriculo/${foto}" class="img-fluid rounded mt-2" style="max-width: 100%; height: auto;">
    `;
    container.style.display = 'block';
    container.scrollIntoView({ behavior: 'smooth' });
}
</script>

</body>
</html>