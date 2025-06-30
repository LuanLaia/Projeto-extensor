<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Vaga</title>

    <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="<?= baseUrl() ?>assets/css/formVagas.css" rel="stylesheet">
</head>
<body>

    <div class="container" >
        <?= formTitulo("📝 Cadastro de Vaga", true) ?>

        <div class="form-container" data-aos="zoom-in">

            <form method="POST" action="<?= $this->request->formAction() ?>">

                <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
                <input type="hidden" name="estabelecimento_id" id="estabelecimento_id" value="1202">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="descricao" class="form-label">Descrição da Vaga</label>
                        <input type="text" class="form-control"
                            id="descricao"
                            name="descricao"
                            placeholder="Digite a descrição da vaga"
                            maxlength="60"
                            value="<?= setValor("descricao") ?>"
                            required
                            autofocus>
                        <?= setMsgFilderError("descricao") ?>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="sobreaVaga" class="form-label">Sobre a vaga</label>
                        <input type="text" class="form-control"
                            id="sobreaVaga"
                            name="sobreaVaga"
                            placeholder="Descreva a vaga"
                            maxlength="60"
                            value="<?= setValor("sobreaVaga") ?>"
                            required>
                        <?= setMsgFilderError("sobreaVaga") ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="modalidade" class="form-label">Modalidade</label>
                        <select id="modalidade" name="modalidade" class="form-control" required>
                            <?php $valorModalidade = setValor("modalidade"); ?>
                            <option value="1" <?= $valorModalidade == "1" ? "selected" : "" ?>>Presencial</option>
                            <option value="2" <?= $valorModalidade == "2" ? "selected" : "" ?>>Remoto</option>
                        </select>
                        <?= setMsgFilderError("modalidade") ?>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="vinculo" class="form-label">Vínculo</label>
                        <select id="vinculo" name="vinculo" class="form-control" required>
                            <?php $valorVinculo = setValor("vinculo"); ?>
                            <option value="1" <?= $valorVinculo == "1" ? "selected" : "" ?>>CLT</option>
                            <option value="2" <?= $valorVinculo == "2" ? "selected" : "" ?>>Pessoa Jurídica</option>
                        </select>
                        <?= setMsgFilderError("vinculo") ?>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="dtInicio" class="form-label">Data Início</label>
                        <input type="date" class="form-control"
                            id="dtInicio"
                            name="dtInicio"
                            value="<?= setValor("dtInicio") ?>"
                            required>
                        <?= setMsgFilderError("dtInicio") ?>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="dtFim" class="form-label">Data Final</label>
                        <input type="date" class="form-control"
                            id="dtFim"
                            name="dtFim"
                            value="<?= setValor("dtFim") ?>"
                            required>
                        <?= setMsgFilderError("dtFim") ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="statusVaga" class="form-label">Status da Vaga</label>
                        <select id="statusVaga" name="statusVaga" class="form-control" required>
                            <?php $valorStatus = setValor("statusVaga"); ?>
                            <option value="1" <?= $valorStatus == "1" ? "selected" : "" ?>>Pré Vaga</option>
                            <option value="11" <?= $valorStatus == "11" ? "selected" : "" ?>>Em aberto</option>
                            <option value="91" <?= $valorStatus == "91" ? "selected" : "" ?>>Suspensa</option>
                            <option value="99" <?= $valorStatus == "99" ? "selected" : "" ?>>Finalizada</option>
                        </select>
                        <?= setMsgFilderError("statusVaga") ?>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label for="cargo_id" class="form-label">Cargo</label>
                        <select id="cargo_id" name="cargo_id" class="form-control" required>
                            <option value="">Selecione</option>
                            <?php $valorCargo = setValor("cargo_id"); ?>
                            <?php foreach ($dados['aCargo'] as $cargo): ?>
                                <option value="<?= $cargo['id'] ?>" <?= $valorCargo == $cargo['id'] ? 'selected' : '' ?>>
                                    <?= $cargo['descricao'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?= setMsgFilderError("cargo_id") ?>
                    </div>
                </div>

                <!-- Botão -->
                <div class="text-end mt-4">
                    <?= formButton(['class' => 'btn btn-primary']) ?>
                </div>

            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>