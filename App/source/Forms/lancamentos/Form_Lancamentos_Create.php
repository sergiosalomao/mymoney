<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 18:03
 */

class Form_Lancamentos_Create extends PRESTO_Forms
{

    public function __construct()
    {
        #titulo
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText($this->translate("Novo Lancamento"));
        $titulo->setStyles(array(
                "font-size" => "18px",
                "color" => "dimgrey",
                "height" => "40px",
                "padding" => "6px",
                "margin-bottom" => "8px",
                "border-radius" => "5px",
                "background-color" => "beige")
        );
        $this->titulo = $titulo->addElement($titulo);

        #inputText = id
        $id = new PRESTO_Components_InputText('id');
        $id->setId("id");
        $id->setHidden(true);
        $id->setName('id');
        $id->setvalue('');
        $this->id = $id->addElement($id);

        #inputText = data_lancamento
        $data_lancamento = new PRESTO_Components_InputText('data_lancamento');
        $data_lancamento->setId("data_lancamento");
        $data_lancamento->setName('data_lancamento');
        $data_lancamento->setLabel('Data');
        $data_lancamento->setvalue(DateService::DateNow());
        $this->data_lancamento = $data_lancamento->addElement($data_lancamento);

        #inputText = valor
        $valor = new PRESTO_Components_InputNumber('valor');
        $valor->setId("valor");
        $valor->setName('valor');
        $valor->setLabel('Valor');
        $valor->setvalue(0);
        $this->valor = $valor->addElement($valor);

        #inputText = descricao
        $descricao = new PRESTO_Components_InputNumber('descricao');
        $descricao->setId("descricao");
        $descricao->setName('descricao');
        $descricao->setLabel('Descricao');
        $this->descricao = $descricao->addElement($descricao);

        #pega dados da tabela da Contas
        $dados = $contasTable = new ContasTable();
        $j[] = (array("" => "Selecione"));
        foreach ($dados->getAll() as $field) {
            $j[] = array(
                "{$field['id']}" => $field['conta']);
        }

        #select = conta
        $conta_id = new PRESTO_Components_Select('conta_id');
        $conta_id->setId("conta_id");
        $conta_id->setLabel($this->translate("Conta"));
        $conta_id->setOptions($j);
        $this->conta_id = $conta_id->addElement($conta_id);

        $i[] = (array(
            "" => "Selecione",
            "D" => "Debito",
            "C" => "Credito",
        ));

        #select = tipo
        $tipo = new PRESTO_Components_Select('tipo');
        $tipo->setId("tipo");
        $tipo->setLabel($this->translate("Tipo"));
        $tipo->setOptions($i);
        $this->tipo = $tipo->addElement($tipo);


        #pega dados da tabela da Fluxo
        $dados = $fluxoTable = new FluxosTable();
        $k[] = (array("" => "Selecione"));
        foreach ($dados->getAll() as $field) {
            $k[] = array(
                "{$field['id']}" => $field['codigo'] . '-' . $field['descricao']);
        }

        #select = fluxo_id
        $fluxo_id = new PRESTO_Components_Select('fluxo_id');
        $fluxo_id->setId("fluxo_id");
        $fluxo_id->setLabel($this->translate("Fluxo"));
        $fluxo_id->setOptions($k);
        $this->fluxo_id = $fluxo_id->addElement($fluxo_id);


        #pega dados da tabela centroCusto
        $dados = $centroCustoTable = new CentroCustoTable();
        $o[] = (array("" => "Selecione"));
        foreach ($dados->getAll() as $field) {
            $o[] = array(
                "{$field['id']}" => $field['descricao']);
        }

        #select = centro_custo_id
        $centro_custo_id = new PRESTO_Components_Select('centro_custo_id');
        $centro_custo_id->setId("centro_custo_id");
        $centro_custo_id->setLabel($this->translate("Centro Custo"));
        $centro_custo_id->setOptions($o);
        $this->centro_custo_id = $centro_custo_id->addElement($centro_custo_id);


        #btnSalvar
        $btnSalvar = new PRESTO_Components_Buttons('btn-add');
        $btnSalvar->setId("btn-salvar");
        $btnSalvar->setType('submit');
        $btnSalvar->setClass("btn btn-success btn-sm");
        $btnSalvar->setText($this->translate("Salvar"));
        $btnSalvar->setTitle($this->translate("Salvar registro"));
        $btnSalvar->addElement($btnSalvar);
        $this->btnSalvar = $btnSalvar->addElement($btnSalvar);

        #btnFechar
        $btnFechar = new PRESTO_Components_Buttons('btn-fechar');
        $btnFechar->setId("btn-fechar");
        $btnFechar->setType('button');
        $btnFechar->setClass("btn btn-secondary btn-sm");
        $btnFechar->setText($this->translate("Fechar"));
        $btnFechar->setTitle($this->translate("Fechar janela"));
        $btnFechar->addElement($btnFechar);
        $this->btnFechar = $btnFechar->addElement($btnFechar);


    }

}