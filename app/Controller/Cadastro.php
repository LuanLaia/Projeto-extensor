<?php

namespace App\Controller;

use App\Model\UsuarioModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Session;

class Cadastro extends ControllerMain
{
    public function __construct()
    {
        $this->auxiliarConstruct();
        $this->model = new UsuarioModel();
        $this->loadHelper("formHelper");
    }

    /**
     * index - Exibe o formulario de cadastro
     */
    public function index()
    {
        return $this->loadView("login/cadastro", [], true);
    }

    /**
     * store - Processa o cadastro do usuario
     */
    public function store()
{
    $post = $this->request->getPost();

    // Validação inicial
    if (!isset($post['nome'], $post['email'], $post['senha'], $post['senha_confirmar'], $post['tipo_cadastro'])) {
        return Redirect::page("Cadastro", [
            "msgError" => "Todos os campos são obrigatórios.",
            "inputs" => $post
        ]);
    }

    if ($post['senha'] !== $post['senha_confirmar']) {
        return Redirect::page("Cadastro", [
            "msgError" => "As senhas não conferem.",
            "inputs" => $post
        ]);
    }

    // Verifica se o e-mail já está em uso
    $usuarioExistente = $this->model->getUserEmail($post['email']);
    if ($usuarioExistente) {
        return Redirect::page("Cadastro", [
            "msgError" => "E-mail já cadastrado.",
            "inputs" => $post
        ]);
    }

    // Model de pessoa física
    $pessoaFisicaModel = $this->loadModel("PessoaFisica");

    // Define tipo de cadastro
    $isEmpresa = $post['tipo_cadastro'] === 'empresa';
    $documento = $isEmpresa ? $post['cnpj'] ?? null : $post['cpf'] ?? null;

    if (!$documento) {
        return Redirect::page("Cadastro", [
            "msgError" => $isEmpresa ? "CNPJ é obrigatório." : "CPF é obrigatório.",
            "inputs" => $post
        ]);
    }

    // Cria pessoa física (mesmo para empresa)
    $pessoaFisicaId = $pessoaFisicaModel->criar([
        "nome" => trim($post["nome"]),
        "cpf"  => preg_replace("/\D/", "", $documento)
    ]);

    if (!$pessoaFisicaId) {
        return Redirect::page("Cadastro", [
            "msgError" => "Erro ao criar pessoa física.",
            "inputs" => $post
        ]);
    }

    // Prepara dados do usuário
    $dadosUsuario = [
        "pessoa_fisica_id" => $pessoaFisicaId,
        "email"            => trim($post['email']),
        "senha"            => password_hash(trim($post['senha']), PASSWORD_DEFAULT),
        "nivel"            => $isEmpresa ? 22 : 21,
        "tipo"             => $isEmpresa ? "A" : "CN"
    ];

    if ($this->model->insert($dadosUsuario)) {
        return Redirect::page("login", [
            "msgSucesso" => "Cadastro realizado com sucesso! Faça login."
        ]);
    } else {
        return Redirect::page("Cadastro", [
            "msgError" => "Erro ao cadastrar usuário.",
            "inputs" => $post
        ]);
    }
}



}
