<?= formTitulo("Vagas") ?>

<div class="m-2">

    <form method="POST" action="<?= $this->request->formAction() ?>">

        <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
        <input type="hidden" name="pessoa_fisica_id" id="pessoa_fisica_id" value="1">

        <div class="row">
            <div class="col-6 mb-3">
                <label for="logradouro" class="form-label">Logradouro (Rua)</label>
                <input type="text" class="form-control"
                    id="logradouro"
                    name="logradouro"
                    placeholder="logradouro"
                    maxlength="60"
                    value="<?= setValor("logradouro") ?>"
                    required
                    autofocus>

                    <?= setMsgFilderError("logradouro") ?>
            </div>

            <div class="col-6 mb-3">
                <label for="numero" class="form-label">Numero</label>
                <input type="text" class="form-control"
                    id="numero"
                    name="numero"
                    placeholder="Numero"
                    maxlength="10"
                    value="<?= setValor("numero") ?>"
                    required>

                    <?= setMsgFilderError("numero") ?>
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

            <div class="col-3 mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="text" class="form-control"
                    id="foto"
                    name="foto"
                    maxlength="100"
                    value="<?= setValor("foto") ?>"
                    required>

                    <?= setMsgFilderError("foto") ?>
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