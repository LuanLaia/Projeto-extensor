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
        return $this->loadView("login/cadastro", [], false);
    }

    /**
     * store - Processa o cadastro do usuario
     */
    public function store()
    {
        $post = $this->request->getPost();

        // Validacao basica
        if (!isset($post['nome'], $post['email'], $post['senha'], $post['senha_confirmar'])) {
            return Redirect::page("CadastroUsuario", [
                "msgError" => "Todos os campos sao obrigatorios.",
                "inputs" => $post
            ]);
        }

        if ($post['senha'] !== $post['senha_confirmar']) {
            return Redirect::page("CadastroUsuario", [
                "msgError" => "As senhas nao conferem.",
                "inputs" => $post
            ]);
        }

        // Verifica se email ja esta cadastrado
        $usuarioExistente = $this->model->getUserEmail($post['email']);
        if ($usuarioExistente) {
            return Redirect::page("CadastroUsuario", [
                "msgError" => "Email ja cadastrado.",
                "inputs" => $post
            ]);
        }

        // Cria usuario
        $dados = [
            'nome' => trim($post['nome']),
            'email' => trim($post['email']),
            'senha' => password_hash(trim($post['senha']), PASSWORD_DEFAULT),
            'nivel' => 3, // nivel padrao para usuarios comuns
            'statusRegistro' => 1
        ];

        if ($this->model->insert($dados)) {
            return Redirect::page("login", [
                "msgSucesso" => "Cadastro realizado com sucesso! Efetue login."
            ]);
        } else {
            return Redirect::page("CadastroUsuario", [
                "msgError" => "Erro ao cadastrar usuario. Tente novamente.",
                "inputs" => $post
            ]);
        }
    }
}
