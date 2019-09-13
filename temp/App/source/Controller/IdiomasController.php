<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 26/03/2019
 * Time: 22:33
 */

class IdiomasController extends PRESTO_Controller
{
    public function __construct()
    {
        $this->setLayout("default");
        $this->formList = new Form_Idiomas_List();
        $this->formCreate = new Form_Idiomas_Create();
        $this->formEdit = new Form_Idiomas_Edit();
    }

    public function indexAction()
    {
        $this->listAction();
        $this->render("index");
        $this->render("list");
    }

    public function listAction()
    {
        $dados = $idiomasTable = new IdiomasTable();
        $params = $this->getParams();
        if (isset($params['get']['params']['page'])) {
            $page = $params['get']['params']['page'];
            $offset = $params['get']['params']['offset'];
            $limit = $params['get']['params']['limit'];
            $offset = ($page == 0 ? "0" : $page * $offset);
            $this->dados = $dados->getAll(array(
                "offset" => $offset,
                "limit" => $limit,
                "order" => 'id'
            ));
        } else {
            $search = (isset($params['post']['input_search']) ? $params['post']['input_search'] : '');
            if (isset($search)) {
                $this->dados = $dados->getAll(array("where" => "descricao like '%{$search}%'"));
            }

            if (!isset($search)) {
                $this->dados = $dados->getAll(array(
                    "offset" => 0,
                    "limit" => 10,
                    "order" => 'id'
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
        $idiomasTable = new IdiomasTable();
        $idiomasTable->save($params['post']);
        $this->listAction();
        $this->render("index");
        $this->render("list");
    }

    public function deleteAction()
    {
        $params = $this->getParams();
        $idiomasTable = new IdiomasTable();
        $id = (isset($params['get']['params']['id']) ? $params['get']['params']['id'] : '');
        $idiomasTable->delete($id);
        $this->listAction();
        $this->render("index");
        $this->render("list");
    }

    public function editAction()
    {
        $this->render("edit");
    }


}