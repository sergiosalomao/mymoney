<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 26/03/2019
 * Time: 22:33
 */

class UsuariosController extends PRESTO_Controller
{
    public function __construct()
    {
        $this->setLayout("default");
    }

    public function indexAction()
    {
        $this->formList = new Form_Usuarios_List();
        $this->listAction();
        $this->render("index");
        $this->render("list");
    }

    public function listAction()
    {
        $dados = $UsuariosTable = new UsuariosTable();
        $params = $this->getParams();
        if (isset($params['get']['params']['page'])) {
            $page = $params['get']['params']['page'];
            $offset = $params['get']['params']['offset'];
            $limit = $params['get']['params']['limit'];
            $offset = ($page == 0 ? "0" : $page * $offset);
            $this->dados = $dados->getAll(array(
                "offset" => $offset,
                "limit" => $limit,
                "order" => 'id desc'
            ));
        } else {
            $search = (isset($params['post']['input_search']) ? $params['post']['input_search'] : '');
            if (isset($search)) {
                $this->dados = $dados->getAll(array("where" => "nome like '%{$search}%'"));
            }

            if (!isset($search)) {
                $this->dados = $dados->getAll(array(
                    "offset" => 0,
                    "limit" => 10,
                    "order" => 'id desc'
                ));
            }
        }
    }

    public function createAction()
    {
        $this->formCreate = new Form_Usuarios_Create();
        $this->render("create");
    }

    public function saveAction()
    {
        $params = $this->getParams();
        $usuariosTable = new UsuariosTable();

        #verifica se usuarioa ja existe consultando email
        $email = null;

        if (isset($params['post']['email']))
            $email = $params['post']['email'];
        $usuarioId = $usuariosTable->getAll(array("where" => "email = '{$email}'"));

        $senha = $params['post']['senha'];
        $params['post']['senha'] = SecurityService::createhashSha1($senha);
        unset($params['post']['senha_confirma']);

        $usuariosTable->save($params['post']);
        $this->indexAction();
    }

    public function deleteAction()
    {
        $params = $this->getParams();
        if (isset($params['post']['id'])) {
            $id = $params['post']['id'];
            $usuariosTable = new UsuariosTable();
            $retorno = $usuariosTable->delete($id);

            if ($retorno == NULL)
                echo json_encode(array("retorno" => "deletado com sucesso", "erro" => 0));
            else
                echo json_encode(array("retorno" => "Não foi possivel excluir o registro", "erro" => 1));
        } else
            echo json_encode(array("retorno" => "Nao foi possivel excluir o registro", "erro" => 1));
    }

    public function editAction()
    {
        $this->formEdit = new Form_Usuarios_Edit();
        $this->render("edit");
    }

    public function loginAction()
    {
            $this->formLogin = new Form_Usuarios_Login();
            $this->render("login");
    }

    public function authAction()
    {
        $params = $this->getParams();
        if (isset($params['post']['senha'])) {
            $emailLogin = isset($params['post']['email']) ? "{$params['post']['email']}":"";
            $senhaLogin = isset($params['post']['senha']) ? "{$params['post']['senha']}":"";
        }

        $usuariosTable = new UsuariosTable();
        $senhaBanco= $usuariosTable->getAll(array("where"=>"email = '{$emailLogin}'"));

        if (isset($senhaBanco[0]['senha'])) {
            $senhaBanco = $senhaBanco[0]['senha'];
            $_SESSION['logged'] = SecurityService::compareSha1Password($senhaLogin, $senhaBanco);
        }

        if (($_SESSION['logged']) == true) {
           header('location: '.APP_PATH.'/index/');
        }
        else
            $this->loginAction();
    }


}