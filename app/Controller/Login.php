<?php

namespace App\Controller;

use App\Model\UsuarioModel;
use App\Model\PessoaFisicaModel;
use Core\Library\ControllerMain;
use Core\Library\Email;
use Core\Library\Redirect;
use Core\Library\Session;

class Login extends ControllerMain
{
    public function __construct()
    {
        $this->auxiliarConstruct();
        $this->model = new UsuarioModel();
        $this->loadHelper("formHelper");
    }

    public function index()
    {
        return $this->loadView("login/login", [], True);
    }

    public function signIn()
    {
        $post = $this->request->getPost();

        if (!isset($post['email']) || !isset($post['senha'])) {
            return Redirect::page("login", [
                "msgError" => "Preencha e-mail e senha corretamente.",
                "inputs" => ["email" => $post["email"] ?? ""]
            ]);
        }

        $aUser = $this->model->getUserEmail($post['email']);

        if (!$aUser) {
            return Redirect::page("login", [
                "msgError" => 'Login ou senha inválido.',
                "inputs" => ["email" => $post["email"]]
            ]);
        }

        if (!password_verify(trim($post["senha"]), $aUser['senha'])) {
            return Redirect::page("login", [
                "msgError" => 'Login ou senha inválido.',
                "inputs" => ["email" => $post["email"]]
            ]);
        }

        // Sessão
        Session::set("userId", $aUser['id']);
        Session::set("userNome", $aUser['nome']);
        Session::set("userEmail", $aUser['email']);
        Session::set("userNivel", $aUser['nivel']);
        Session::set("userSenha", $aUser['senha']);
        Session::set("pessoaFisicaId", $aUser['pessoa_fisica_id']);


        return Redirect::page("sistema");
    }

    public function signOut()
    {
        Session::destroy('userId');
        Session::destroy('userNome');
        Session::destroy('userEmail');
        Session::destroy('userNivel');
        Session::destroy('userSenha');
        Session::destroy("pessoaFisicaId");

        return Redirect::Page("home");
    }

    public function esqueciASenha()
    {
        return $this->loadView("login/esqueciASenha");
    }

    // ... outros métodos (recuperar senha etc.) mantidos iguais ...

    /**
     * Cria o super usuário com inserção em pessoa_fisica + usuario
     */
    public function criaSuperUser()
{
    $pessoaFisicaModel = $this->loadModel("PessoaFisica");

    $email = "luanpr.laia@gmail.com";
    $nome  = "Luan  Pereira Rosa Laia";

    $usuarioExistente = $this->model->getUserEmail($email);
    if ($usuarioExistente) {
        return Redirect::Page("login", ["msgError" => "Login já existe."]);
    }

    // Insere a pessoa física
    $pessoaFisicaId = $pessoaFisicaModel->criar([
    "nome" => $nome,
    "cpf"  => null
    ]);

    if (!$pessoaFisicaId) {
        return Redirect::Page("login", ["msgError" => "Erro ao criar pessoa física."]);
    }

    // Agora insere o usuário vinculado à pessoa física
    $dadosUsuario = [
        "pessoa_fisica_id" => $pessoaFisicaId,
        "email"            => $email,
        "senha"            => password_hash("fasm@2025", PASSWORD_DEFAULT),
        "nivel"            => 1,
        "tipo"             => "G"
    ];

    if ($this->model->insert($dadosUsuario)) {
        return Redirect::Page("login", ["msgSucesso" => "Super usuário criado com sucesso."]);
    } else {
        return Redirect::Page("login", ["msgError" => "Erro ao criar usuário."]);
    }
}

}
