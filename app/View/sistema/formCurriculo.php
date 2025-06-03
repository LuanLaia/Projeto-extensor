<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário Currículo</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- AOS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="<?= baseUrl() ?>assets/css/formCurriculo.css" rel="stylesheet">
</head>
<body>

    <div class="container my-5" data-aos="fade-up">
        <?= formTitulo("📄 Currículo") ?>

        <div class="m-2">
            <form method="POST" action="<?= $this->request->formAction() ?>" enctype="multipart/form-data">

                <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
                <input type="hidden" name="pessoa_fisica_id" id="pessoa_fisica_id" value="1252">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="logradouro" class="form-label">Logradouro (Rua)</label>
                        <input type="text" class="form-control" id="logradouro" name="logradouro" maxlength="60" placeholder="Ex: Rua das Flores" value="<?= setValor("logradouro") ?>" required autofocus>
                        <?= setMsgFilderError("logradouro") ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" class="form-control" id="numero" name="numero" maxlength="10" placeholder="Ex: 123" value="<?= setValor("numero") ?>" required>
                        <?= setMsgFilderError("numero") ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="complemento" class="form-label">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento" maxlength="20" value="<?= setValor("complemento") ?>" required>
                        <?= setMsgFilderError("complemento") ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" maxlength="50" value="<?= setValor("bairro") ?>" required>
                        <?= setMsgFilderError("bairro") ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" maxlength="8" value="<?= setValor("cep") ?>" required>
                        <?= setMsgFilderError("cep") ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" maxlength="11" value="<?= setValor("celular") ?>" required>
                        <?= setMsgFilderError("celular") ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cidade_id" class="form-label">Cidade</label>
                        <select id="cidade_id" name="cidade_id" class="form-control" required>
                            <option value="">Selecione</option>
                            <?php $valorCidade = setValor("cidade_id"); ?>
                            <?php foreach ($dados['aCidade'] as $cidade): ?>
                                <option value="<?= $cidade['id'] ?>" <?= $valorCidade == $cidade['id'] ? 'selected' : '' ?>>
                                    <?= $cidade['cidade'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?= setMsgFilderError("cidade_id") ?>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="<?= setValor("dataNascimento") ?>" required>
                        <?= setMsgFilderError("dataNascimento") ?>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select id="sexo" name="sexo" class="form-control" required>
                            <?php $valorsexo = setValor("sexo"); ?>
                            <option value="M" <?= $valorsexo == "M" ? "selected" : "" ?>>Masculino</option>
                            <option value="F" <?= $valorsexo == "F" ? "selected" : "" ?>>Feminino</option>
                        </select>
                        <?= setMsgFilderError("sexo") ?>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="foto" class="form-label">Foto (URL)</label>
                        <input type="text" class="form-control" id="foto" name="foto" maxlength="100" value="<?= setValor("foto") ?>" required>
                        <?= setMsgFilderError("foto") ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">E-mail de contato</label>
                        <input type="email" class="form-control" id="email" name="email" maxlength="120" value="<?= setValor("email") ?>" required>
                        <?= setMsgFilderError("email") ?>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="apresentacaoPessoal" class="form-label">Apresentação Pessoal</label>
                        <textarea class="form-control" id="apresentacaoPessoal" name="apresentacaoPessoal" rows="4" required><?= setValor("apresentacaoPessoal") ?></textarea>
                        <?= setMsgFilderError("apresentacaoPessoal") ?>
                    </div>
                </div>

                <div class="mt-4">
                    <?= formButton() ?>
                </div>

            </form>
        </div>
    </div>

        <div class="row">
             <div class="col-3 mb-3">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control"
                    id="complemento"
                    name="complemento"
                    placeholder="Complemento"
                    maxlength="20"
                    value="<?= setValor("complemento") ?>"
                    required
                    autofocus>

                    <?= setMsgFilderError("complemento") ?>
            </div>


            <div class="col-3 mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control"
                    id="bairro"
                    name="bairro"
                    placeholder="Bairro"
                    maxlength="50"
                    value="<?= setValor("bairro") ?>"
                    required
                    autofocus>

                    <?= setMsgFilderError("bairro") ?>
            </div>


            <div class="col-3 mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control"
                    id="cep"
                    name="cep"
                    maxlength="8"
                    value="<?= setValor("cep") ?>"
                    required>

                    <?= setMsgFilderError("cep") ?>
            </div>

            <div class="col-3 mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" class="form-control"
                    id="celular"
                    name="celular"
                    maxlength="11"
                    value="<?= setValor("celular") ?>"
                    required>

                    <?= setMsgFilderError("celular") ?>
            </div>

        </div>

        <div class="row">
            <div class="col-3 mb-3">
                <label for="cidade_id" class="form-label">Cidade</label>
                <select id="cidade_id" name="cidade_id" required class="form-control">
                    <option value="">Selecione</option>
                    <?php $valorCidade = setValor("cidade_id"); ?>
                    <?php foreach ($dados['aCidade'] as $cidade): ?>
                        <option value="<?= $cidade['id'] ?>" <?= $valorCidade == $cidade['id'] ? 'selected' : '' ?>>
                            <?= $cidade['cidade'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= setMsgFilderError("cidade_id") ?>
            </div>

             <div class="col-2 mb-3">
                <label for="dataNascimento" class="form-label">Data Nascimento</label>
                <input type="date" class="form-control"
                    id="dataNascimento"
                    name="dataNascimento"
                    value="<?= setValor("dataNascimento") ?>"
                    required>

                    <?= setMsgFilderError("dataNascimento") ?>
            </div>

            <div class="col-2 mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select id="sexo" name="sexo" required>
                    <?php $valorsexo = setValor("sexo"); ?>
                    <option value="M" <?= $valorsexo == "M" ? "selected" : "" ?>>Masculino</option>
                    <option value="F" <?= $valorsexo == "F" ? "selected" : "" ?>>Feminino</option>
                </select>

                <?= setMsgFilderError("sexo") ?>
            </div>

            <div class="row">
            <?php if (in_array($this->request->getAction(), ['insert', 'update'])): ?>
                <div class="mb-3 col-12">
                    <label for="foto" class="form-label">Sua Foto 4X4</label>
                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Anexar a Imagem" maxlength="100" value="<?= setValor('foto') ?>">
                    <?= setMsgFilderError('foto') ?>
                </div>
            <?php endif; ?>

            <?php if (!empty(setValor("foto"))): ?>
                <div class="mb-3 col-12">
                    <h5>Imagem</h5>
                    <img src="<?= baseUrl() . 'imagem.php?file=curriculo/' . setValor("foto") ?>" class="img-thumbnail" height="120" width="240" alt="Imagem foto">
                    <input type="hidden" name="nomeImagem" id="nomeImagem" value="<?= setValor("foto") ?>">
                </div>
            <?php endif; ?>
            </div>

        </div>

        <div class="row">

            <div class="col-3 mb-3">
                <label for="email" class="form-label">Email de contato</label>
                <input type="text" class="form-control"
                    id="email"
                    name="email"
                    maxlength="120"
                    value="<?= setValor("email") ?>"
                    required>

                    <?= setMsgFilderError("email") ?>
            </div>

            <div class="col-3 mb-3">
                <label for="apresentacaoPessoal" class="form-label">Apresentação Pessoal</label>
                <input type="text" class="form-control"
                    id="apresentacaoPessoal"
                    name="apresentacaoPessoal"
                    value="<?= setValor("apresentacaoPessoal") ?>"
                    required>

                    <?= setMsgFilderError("apresentacaoPessoal") ?>
            </div>

        </div>

        <?= formButton() ?>
    </form>

        

            

            
</div>
