<?php

namespace App\Controller;

use App\Model\UsuarioModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Email;
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
        return $this->loadView("login/login", [], false);
    }

    public function signIn()
    {
        $post = $this->request->getPost();
        $aUser = $this->model->getUserByLogin($post['login']);

        if ($aUser) {
            if (!password_verify(trim($post["senha"]), $aUser['senha'])) {
                return Redirect::page("login", [
                    "msgError" => 'Login ou senha invalido.',
                    "inputs" => ["login" => $post["login"]]
                ]);
            }

            Session::set("userLogin", $aUser['login']);
            Session::set("userTipo", $aUser['tipo']);

            return Redirect::page("Home");

        } else {
            return Redirect::page("login", [
                "msgError" => 'Login ou senha invalido.',
                "inputs" => ["login" => $post["login"]]
            ]);
        }
    }

    public function signOut()
    {
        Session::destroy('userLogin');
        Session::destroy('userTipo');
        return Redirect::Page("home");
    }

    public function criaSuperUser()
    {
        $dados = [
            "pessoa_fisica_id" => "1252",
            "login" => "luanpr.laia@gmail.com",
            "senha" => password_hash(trim("fasm@2025"), PASSWORD_DEFAULT),
            "tipo" => "G"
        ];

        $aSuperUser = $this->model->getUserByLogin($dados['login']);

        if ($aSuperUser) {
            return Redirect::Page("login", ["msgError" => "Login ja existe."]);
        } else {
            if ($this->model->insert($dados)) {
                return Redirect::Page("login", ["msgSucesso" => "Login criado com sucesso."]);
            } else {
                return Redirect::Page("login", ["msgError" => "Erro ao criar login."]);
            }
        }
    }
public function esqueciASenha()
{
    return $this->loadView("login/esqueciASenha");
}

public function esqueciASenhaEnvio()
{
    $post = $this->request->getPost();
    $user = $this->model->getUserByLogin($post['login']); // usa 'login' no lugar de 'email'

    if (!$user) {
        return Redirect::page("Login/esqueciASenha", [
            "msgError" => "Login nao encontrado!"
        ]);
    }

    $created_at = date('Y-m-d H:i:s');
    $chave = sha1($user['id'] . $user['senha'] . $created_at);
    $link = baseUrl() . "login/recuperarSenha/" . $chave;

    // Envia email
    Email::enviaEmail(
        $_ENV['MAIL.USER'],
        $_ENV['MAIL.NOME'],
        "Recuperacao de Senha",
        "Clique no link para redefinir sua senha: <a href='{$link}'>{$link}</a>",
        $user['login'] // usa login como email
    );

    // Usa model correto para salvar a chave
    $recuperaModel = new \App\Model\UsuarioRecuperaSenhaModel();
    $idChave = $recuperaModel->insert([
        "usuario_id" => $user['id'],
        "chave" => $chave,
        "created_at" => $created_at,
        "statusRegistro" => 1
    ]);
    $recuperaModel->desativaChaveAntigas($idChave);

    return Redirect::page("login", [
        "msgSucesso" => "Link enviado. Verifique seu e-mail."
    ]);
}

public function recuperarSenha($chave)
{
    $recuperaModel = new \App\Model\UsuarioRecuperaSenhaModel();
    $chaveDados = $recuperaModel->getRecuperaSenhaChave($chave);

    if (!$chaveDados) {
        return Redirect::page("login", ["msgError" => "Chave invalida ou expirada."]);
    }

    if (strtotime($chaveDados['created_at']) < strtotime("-1 hour")) {
        $recuperaModel->desativaChaveAntigas($chaveDados['usuario_id']);
        return Redirect::page("login", ["msgError" => "Link expirado."]);
    }

    $user = $this->model->getById($chaveDados['usuario_id']);

    return $this->loadView("login/recuperarSenha", [
        "usuario_id" => $user['id'],
        "chave_id" => $chaveDados['id']
    ]);
}

public function atualizaRecuperaSenha()
{
    $post = $this->request->getPost();

    if ($post["NovaSenha"] !== $post["NovaSenha2"]) {
        return Redirect::page("login/recuperarSenha", [
            "msgError" => "Senhas nao conferem.",
            "usuario_id" => $post["usuario_id"],
            "chave_id" => $post["chave_id"]
        ]);
    }

    // Atualiza senha
    $this->model->update($post["usuario_id"], [
        "senha" => password_hash($post["NovaSenha"], PASSWORD_DEFAULT)
    ]);

    // Desativa chave usada
    $recuperaModel = new \App\Model\UsuarioRecuperaSenhaModel();
    $recuperaModel->desativaChave($post["chave_id"]);

    return Redirect::page("login", ["msgSucesso" => "Senha atualizada com sucesso."]);
}


}
