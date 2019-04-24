<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 26/03/2019
 * Time: 22:33
 */

class LancamentosController extends PRESTO_Controller
{
    public function __construct()
    {
        $this->setLayout("default");
    }

    public function indexAction()
    {
        $this->formList = new Form_Lancamentos_List();
        $this->listAction();
        $this->render("index");
        $this->render("list");
    }

    public function listAction()
    {
        $this->formOptions = new Form_Lancamentos_Modal_Options();
        #passa para view as contas
        $contasTable = new ContasTable();
        $this->dadosConta = $contasTable->getAll();
        #passa para view tabela de lancamentos
        $this->lancamentosTable = new LancamentosTable();

    }

    public function createAction()
    {
        $this->formCreate = new Form_Lancamentos_Create();
        $this->render("create");
    }

    public function saveAction()
    {
        $params = $this->getParamsPost();
        $lancamentosTable = new LancamentosTable();

        #define D ou C
        $tipo = $params['tipo'];
        $valor = 0;
        $valor = ($tipo == 'C') ? $params['valor'] : $valor;
        $valor = ($tipo == 'D') ? -$params['valor'] : $valor;
        $params['valor'] = $valor;

        $lancamentosTable->save($params);


        $this->indexAction();
    }

    public function deleteAction()
    {
        $params = $this->getParams();
        if (isset($params['get']['params']['id'])) {
            $id = $params['get']['params']['id'];
            $lancamentosTable = new LancamentosTable();
            $retorno = $lancamentosTable->delete($id);
            if ($retorno == NULL)
                $this->indexAction();
            else
                json_encode(array("retorno" => "Não foi possivel excluir o registro", "erro" => 1));
        } else
            json_encode(array("retorno" => "Nao foi possivel excluir o registro", "erro" => 1));
    }

    public function editAction()
    {
        $this->formEdit = new Form_Lancamentos_Edit();
        $this->render("edit");
    }


    public function calcSaldo($conta = null)
    {
        #calcula saldo e salva
        $saldoAnterior = 0;
        $lancamentosTable = new LancamentosTable();

        $whereConta = isset($conta) ? "conta_id = {$conta}":"1=1";
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
                c.agencia,
                b.numero,
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