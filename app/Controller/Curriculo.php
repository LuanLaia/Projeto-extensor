<?php

namespace App\Controller;

use App\Model\CidadeModel;
use App\Model\CurriculoModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Files;
use Core\Library\Validator;
use Core\Library\Session;

class Curriculo extends ControllerMain
{
    protected $files;

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
        $this->files = new Files();
        $this->validaAcesso();
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return $this->loadView("sistema\listaCurriculo", $this->model->lista("id"));
    }

    public function form($action, $id)
    {
        $CidadeModel = new CidadeModel();

        $dados = [
            "data" => $this->model->getById($id),
            "aCidade" => $CidadeModel->lista('cidade')
        ];
        return $this->loadView("sistema/formCurriculo", $dados);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->request->getPost();

         if (Validator::make($post, $this->model->validationRules)) {
            return Redirect::page($this->controller . "/form/insert/0");
        } else {

             if (!empty($_FILES['foto']['name'])) {
                
                // Faz upload da imagem
                $nomeRetornado = $this->files->upload($_FILES, 'curriculo');

                // se for boolean, significa que o upload falhou
                if (is_bool($nomeRetornado)) {
                    Session::set('inputs', $post);
                    return Redirect::page($this->controller . "/form/insert/" . $post['id']);
                } else {
                    $post['foto'] = $nomeRetornado[0];
                }
            } else {
                $post['foto'] = $post['nomeImagem'];
            }

            if ($this->model->insert($post)) {
                return Redirect::page($this->controller, ["msgSucesso" => "Registro inserido com sucesso."]);
            } else {
                return Redirect::page($this->controller . "/form/insert/0");
            }
        }
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $post = $this->request->getPost();

         if (Validator::make($post, $this->model->validationRules)) {
            return Redirect::page($this->controller . "/form/update/" . $post['id']);    // error
        } else {

            if (!empty($_FILES['foto']['name'])) {

                // Faz uploado da imagem
                $nomeRetornado = $this->files->upload($_FILES, 'curriculo');

                // se for boolean, significa que o upload falhou
                if (is_bool($nomeRetornado)) {
                    Session::set( 'inputs', $post);
                    return Redirect::page($this->controller . "/form/update/" . $post['id']);
                } else {
                    $post['foto'] = $nomeRetornado[0];
                }
                
                if (isset($post['nomeImagem'])) {
                    $this->files->delete($post['nomeImagem'], 'curriculo');
                }
                
            } else {
                $post['foto'] = $post['nomeImagem'];
            }

            unset($post['nomeImagem']);

             if ($this->model->update($post)) {
                return Redirect::page($this->controller, ["msgSucesso" => "Registro alterado com sucesso."]);
            } else {
                return Redirect::page($this->controller . "/form/update/" . $post['id']);
            }
        }
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        $post = $this->request->getPost();

        if ($this->model->delete($post)) {
            $this->files->delete($post['nomeImagem'], "curriculo");
            return Redirect::page($this->controller, ["msgSucesso" => "Registro Excluído com sucesso."]);
        } else {
            return Redirect::page($this->controller);
        }
    }
}