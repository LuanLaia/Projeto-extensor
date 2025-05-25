<?= formTitulo("Vagas") ?>

<div class="m-2">

    <form method="POST" action="<?= $this->request->formAction() ?>">

        <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
        <input type="hidden" name="estabelecimento_id" id="estabelecimento_id" value="1202">

        <div class="row">
            <div class="col-6 mb-3">
                <label for="descricao" class="form-label">Descrição da Vaga</label>
                <input type="text" class="form-control"
                    id="descricao"
                    name="descricao"
                    placeholder="descricao da Vaga"
                    maxlength="60"
                    value="<?= setValor("descricao") ?>"
                    required
                    autofocus>

                    <?= setMsgFilderError("descricao") ?>
            </div>

            <div class="col-6 mb-3">
                <label for="sobreaVaga" class="form-label">Sobre a vaga</label>
                <input type="text" class="form-control"
                    id="sobreaVaga"
                    name="sobreaVaga"
                    placeholder="sobreaVaga da Vaga"
                    maxlength="60"
                    value="<?= setValor("sobreaVaga") ?>"
                    required>

                    <?= setMsgFilderError("sobreaVaga") ?>
            </div>
        </div>

        <div class="row">
            <div class="col-3 mb-3">
                <label for="modalidade" class="form-label">Modalidade</label>
                <select id="modalidade" name="modalidade" required>
                    <?php $valorModalidade = setValor("modalidade"); ?>
                    <option value="1" <?= $valorModalidade == "1" ? "selected" : "" ?>>Presencial</option>
                    <option value="2" <?= $valorModalidade == "2" ? "selected" : "" ?>>Remoto</option>
                </select>

                <?= setMsgFilderError("modalidade") ?>
            </div>


            <div class="col-3 mb-3">
                <label for="vinculo" class="form-label">Vinculo</label>
                <select id="vinculo" name="vinculo" required>
                    <?php $valorVinculo = setValor("vinculo"); ?>
                    <option value="1" <?= $valorVinculo == "1" ? "selected" : "" ?>>CLT</option>
                    <option value="2" <?= $valorVinculo == "2" ? "selected" : "" ?>>Pessoa Juridica</option>
                </select>

                <?= setMsgFilderError("vinculo") ?>
            </div>


            <div class="col-2 mb-3">
                <label for="dtInicio" class="form-label">Data Inicio</label>
                <input type="date" class="form-control"
                    id="dtInicio"
                    name="dtInicio"
                    value="<?= setValor("dtInicio") ?>"
                    required>

                    <?= setMsgFilderError("dtInicio") ?>
            </div>

            <div class="col-2 mb-3">
                <label for="dtFim" class="form-label">Data Final</label>
                <input type="date" class="form-control"
                    id="dtFim"
                    name="dtFim"
                    value="<?= setValor("dtFim") ?>"
                    required>

                    <?= setMsgFilderError("dtFim") ?>
            </div>

            <div class="col-2 mb-3">
                <label for="statusVaga" class="form-label">status Vaga</label>
                <select id="statusVaga" name="statusVaga"  required >
                     <?php $valorStatus = setValor("statusVaga"); ?>
                    <option value="1" <?= $valorStatus == "1" ? "selected" : "" ?>>Pré Vaga</option>
                    <option value="11" <?= $valorStatus == "11" ? "selected" : "" ?>>Em aberto</option>
                    <option value="91" <?= $valorStatus == "91" ? "selected" : "" ?>>Suspensa</option>
                    <option value="99" <?= $valorStatus == "99" ? "selected" : "" ?>>Finalizada</option>
                </select>

                    <?= setMsgFilderError("statusVaga") ?>
            </div>

        </div>

        <div class="row">
            <div class="col-6 mb-3">
                <label for="cargo_id" class="form-label">Cargo</label>
                <select id="cargo_id" name="cargo_id" required class="form-control">
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

        <?= formButton() ?>
    </form>

        

            

            
</div>