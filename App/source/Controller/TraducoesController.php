<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 26/03/2019
 * Time: 22:33
 */

class TraducoesController extends PRESTO_Controller
{
    public function __construct()
    {
        $this->setLayout("default");
        $this->formList = new Form_Traducoes_List();
        $this->formCreate = new Form_Traducoes_Create();
        $this->formEdit = new Form_Traducoes_Edit();
    }

    public function indexAction()
    {
        $this->listAction();
        $this->render("index");
        $this->render("list");
    }

    public function listAction()
    {
        $dados = $traducoesTable = new TraducoesTable();
        $params = $this->getParams();
        if (isset($params['get']['params']['page'])) {
            $page = $params['get']['params']['page'];
            $offset = $params['get']['params']['offset'];
            $limit = $params['get']['params']['limit'];
            $offset = ($page == 0 ? "0" : $page * $offset);
            $this->dados = $dados->listTraducoesIdioma(array(
                "offset" => $offset,
                "limit" => $limit,
                "order" => 'id desc'
            ));
        } else {

            $search = (isset($params['post']['input_search']) ? $params['post']['input_search'] : '');
            if (isset($params['post']['input_search'])) {
                $this->dados = $dados->listTraducoesIdioma(array("where" => "descricao like '%{$search}%'"));
            }

            if (!isset($params['post']['input_search'])) {

                $this->dados = $dados->listTraducoesIdioma(array(
                    "offset" => 0,
                    "limit" => 10,
                    "order" => 'id desc'
                ));
            }
        }
    }

    public function createAction()
    {
        $this->render("create");
    }

    public function saveAction()
    {
        $params = $this->getParams();
        $traducoesTable = new TraducoesTable();
        $traducoesTable->save($params['post']);
        $this->listAction();
        $this->render("index");
        $this->render("list");
    }

    public function deleteAction()
    {
        $params = $this->getParams();
        $traducoesTable = new TraducoesTable();
        $id = (isset($params['get']['params']['id']) ? $params['get']['params']['id'] : '');
        $traducoesTable->delete($id);
        $this->listAction();
        $this->render("index");
        $this->render("list");
    }

    public function editAction()
    {
        $this->render("edit");
    }


}