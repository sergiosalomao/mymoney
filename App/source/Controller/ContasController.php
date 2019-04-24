<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 26/03/2019
 * Time: 22:33
 */

class ContasController extends PRESTO_Controller
{
    public function __construct()
    {
        $this->setLayout("default");
    }

    public function indexAction()
    {
        $this->formList = new Form_Contas_List();
        $this->listAction();
        $this->render("index");
        $this->render("list");
    }

    public function listAction()
    {
        $this->formList = new Form_Contas_List();
        $dados = $ContasTable = new ContasTable();
        $params = $this->getParams();
        if (isset($params['get']['params']['page'])) {
            $page = $params['get']['params']['page'];
            $offset = $params['get']['params']['offset'];
            $limit = $params['get']['params']['limit'];

            $offset = ($page == 0 ? "0" : $page * $offset);
            $this->dados = $dados->listContasBancos(array(
                "offset" => $offset,
                "limit" => $limit,
                "order" => 'id desc'
            ));
        } else {

            if (isset($params['post']['input_search'])) {
                $search = (isset($params['post']['input_search']) ? $params['post']['input_search'] : '');
                $this->dados = $dados->listContasBancos(array("where" => "conta like '%{$search}%'"));
            }

            if (!isset($params['post']['input_search'])) {
                $this->dados = $dados->listContasBancos(array(
                    "offset" => 0,
                    "limit" => 10,
                    "order" => 'id desc'
                ));
            }
        }
    }

    public function createAction()
    {
        $this->formCreate = new Form_Contas_Create();
        $this->render("create");
    }

    public function saveAction()
    {
        $params = $this->getParams();
        $ContasTable = new ContasTable();
        $ContasTable->save($params['post']);
        $this->indexAction();
    }

    public function deleteAction()
    {
        $params = $this->getParams();
        if (isset($params['post']['id'])) {
            $id = $params['post']['id'];
            $ContasTable = new ContasTable();
            $retorno = $ContasTable->delete($id);

            if ($retorno == NULL)
                echo json_encode(array("retorno" => "deletado com sucesso", "erro" => 0));
            else
                echo json_encode(array("retorno" => "Não foi possivel excluir o registro", "erro" => 1));
        } else
            echo json_encode(array("retorno" => "Nao foi possivel excluir o registro", "erro" => 1));
    }

    public function editAction()
    {
        $this->formEdit = new Form_Contas_Edit();
        $this->render("edit");
    }

    public function relContasAction()
    {
        $this->formList = new Form_Lancamentos_List();
        $this->formOptions = new Form_Lancamentos_Modal_Options();
        #passa para view as contas
        $contasTable = new ContasTable();
        $this->dadosConta = $contasTable->getAll();
        #passa para view tabela de lancamentos
        $this->lancamentosTable = new LancamentosTable();

        $this->render("relcontas");
    }

    public function calcSaldo($conta = null)
    {

        #calcula saldo e salva
        $saldoAnterior = 0;
        $lancamentosTable = new LancamentosTable();

        $whereConta = isset($conta) ? "conta_id = {$conta}" : "1=1";
        $dados = $lancamentosTable->listLancamentos(array(
            "group" => " 
                l.id,
                c.id,
                cc.id,
                f.id,
                f.codigo,
                l.tipo,
                l.data_lancamento, 
                l.descricao,
                l.valor,
                l.saldo, 
                c.conta,
                b.numero,
                 c.agencia,
                cc.descricao,
                f.descricao",
            "order" => "data_lancamento,id asc",
            "where" => "{$whereConta}",
        ));

        $contaLinhaAnterior = null;
        foreach ($dados as $key => $value) {



            $saldo = $saldoAnterior + $value['valor'];
            $saldoAnterior = $saldo;


            $dados[$key]['saldo'] = $saldo;


            #retira os alias
            unset($dados[$key]['agencia']);
            unset($dados[$key]['fluxo_codigo']);
            unset($dados[$key]['conta']);
            unset($dados[$key]['banco']);
            unset($dados[$key]['centrocusto']);
            unset($dados[$key]['fluxo']);

            $lancamentosTable->save($dados[$key]);
        }
    }

}