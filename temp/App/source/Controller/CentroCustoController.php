<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 26/03/2019
 * Time: 22:33
 */

class CentroCustoController extends PRESTO_Controller
{
    public function __construct()
    {
        $this->setLayout("default");
    }

    public function indexAction()
    {
        $this->formList = new Form_CentroCusto_List();
        $this->listAction();
        $this->render("index");
        $this->render("list");
    }

    public function listAction()
    {
        $this->formList = new Form_CentroCusto_List();
        $dados = $CentroCustosTable = new CentroCustoTable();
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

            if (isset($params['post']['input_search'])) {
                $search = (isset($params['post']['input_search']) ? $params['post']['input_search'] : '');
                $this->dados = $dados->getAll(array("where" => "descricao like '%{$search}%'"));
            }

            if (!isset($params['post']['input_search'])) {
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
        $this->formCreate = new Form_CentroCusto_Create();
        $this->render("create");
    }

    public function saveAction()
    {
        $params = $this->getParams();
        $CentroCustoTable = new CentroCustoTable();

        #verifica se essa CentroCustoTable ja existe
        $nome = null;

        if (isset($params['post']['nome']))
            $nome = $params['post']['nome'];
        $CentroCustoId = $CentroCustoTable->getAll(array("where" => "nome = '{$nome}'"));

        if (isset($CentroCustoId[0])) {
            $CentroCustoTable->save($CentroCustoId[0]);
        } else
            $CentroCustoTable->save($params['post']);

        $this->indexAction();
    }

    public function deleteAction()
    {
        $params = $this->getParams();
        if (isset($params['post']['id'])) {
            $id = $params['post']['id'];
            $CentroCustosTable = new CentroCustoTable();
            $retorno = $CentroCustosTable->delete($id);

            if ($retorno == NULL)
                echo json_encode(array("retorno" => "deletado com sucesso", "erro" => 0));
            else
                echo json_encode(array("retorno" => "Não foi possivel excluir o registro", "erro" => 1));
        }
        else
            echo json_encode(array("retorno" => "Nao foi possivel excluir o registro", "erro" => 1));

        
    }

    public function editAction()
    {
        $this->formEdit = new Form_CentroCusto_Edit();
        $this->render("edit");
    }


}