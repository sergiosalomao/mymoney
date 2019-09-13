<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 18:03
 */

class Form_Lancamentos_Edit extends PRESTO_Forms
{

    public function __construct()
    {
        #procura pelo ID
        $ContasTable = new LancamentosTable();


        $id = (isset($_GET['id']) ? $_GET['id'] : '');
        $selecionado = $ContasTable->listLancamentos(array("where" => "l.id = {$id}"));


        #passa valores dos campos encontrados
        $idField = (isset($selecionado[0]['id']) ? trim($selecionado[0]['id']) : '');
        $data_lancamentoField = (isset($selecionado[0]['data_lancamento']) ? trim($selecionado[0]['data_lancamento']) : '');
        $conta_idField = (isset($selecionado[0]['conta_id']) ? trim($selecionado[0]['conta_id']) : '');
        $contaField = (isset($selecionado[0]['conta']) ? trim($selecionado[0]['conta']) : '');
        $tipoField = (isset($selecionado[0]['tipo']) ? trim($selecionado[0]['tipo']) : '');
        $valorField = (isset($selecionado[0]['valor']) ? trim($selecionado[0]['valor']) : '');
        $descricaoField = (isset($selecionado[0]['descricao']) ? trim($selecionado[0]['descricao']) : '');
        $fluxo_idField = (isset($selecionado[0]['fluxo_id']) ? trim($selecionado[0]['fluxo_id']) : '');
        $fluxoField = (isset($selecionado[0]['fluxo']) ? trim($selecionado[0]['fluxo']) : '');
        $fluxoCodigoField = (isset($selecionado[0]['fluxo_codigo']) ? trim($selecionado[0]['fluxo_codigo']) : '');
        $centro_custo_idField = (isset($selecionado[0]['centro_custo_id']) ? trim($selecionado[0]['centro_custo_id']) : '');
        $centrocustoField = (isset($selecionado[0]['centrocusto']) ? trim($selecionado[0]['centrocusto']) : '');


        #tituloContas
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText($this->translate("Editar Lançamento"));
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
        $id->setvalue($idField);
        $this->id = $id->addElement($id);


        #inputText = data_lancamento
        $data_lancamento = new PRESTO_Components_InputText('data_lancamento');
        $data_lancamento->setId("data_lancamento");
        $data_lancamento->setName('data_lancamento');
        $data_lancamento->setLabel('Data');
        $data_lancamento->setvalue(DateService::DateEngToBr($data_lancamentoField));
        $this->data_lancamento = $data_lancamento->addElement($data_lancamento);


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
        $conta_id->setSelected( array("value"=>$conta_idField, "text"=>$contaField));
        $this->conta_id = $conta_id->addElement($conta_id);

        #inputText = valor
        $valor = new PRESTO_Components_InputNumber('valor');
        $valor->setId("valor");
        $valor->setName('valor');
        $valor->setLabel('Valor');
        $valor->setvalue($valorField);
        $this->valor = $valor->addElement($valor);

        #inputText = descricao
        $descricao = new PRESTO_Components_InputNumber('descricao');
        $descricao->setId("descricao");
        $descricao->setName('descricao');
        $descricao->setLabel('Descricao');
        $descricao->setValue($descricaoField);
        $this->descricao = $descricao->addElement($descricao);



        #pega dados da tabela da fluxos
        $dados = $fluxosTable = new FluxosTable();
        $k[] = (array("" => "Selecione"));
        foreach ($dados->getAll() as $field) {
            $k[] = array(
                "{$field['id']}" => $field['codigo'] .'-'.$field['descricao']);
        }

        #select = fluxo_id
        $fluxo_id = new PRESTO_Components_Select('fluxo_id');
        $fluxo_id->setId("fluxo_id");
        $fluxo_id->setLabel($this->translate("Fluxos"));
        $fluxo_id->setOptions($k);
        $fluxo_id->setSelected( array("value"=>$fluxo_idField, "text"=>$fluxoCodigoField.'-'.$fluxoField));
        $this->fluxo_id = $fluxo_id->addElement($fluxo_id);


        #pega dados da tabela da centrocusto
        $dados = $centrocustoTable = new CentroCustoTable();
        $c[] = (array("" => "Selecione"));
        foreach ($dados->getAll() as $field) {
            $c[] = array(
                "{$field['id']}" => $field['descricao']);
        }

        #select = centro_custo_id
        $centro_custo_id = new PRESTO_Components_Select('centro_custo_id');
        $centro_custo_id->setId("centro_custo_id");
        $centro_custo_id->setLabel($this->translate("Centro Custo"));
        $centro_custo_id->setOptions($c);
        $centro_custo_id->setSelected( array("value"=>$centro_custo_idField, "text"=>$centrocustoField));
        $this->centro_custo_id = $centro_custo_id->addElement($centro_custo_id);



        #btnSalvar
        $btnSalvar = new PRESTO_Components_Buttons('btn-add');
        $btnSalvar->setId("btn-salvar");
        $btnSalvar->setType('submit');
        $btnSalvar->setClass("btn btn-success btn-sm");
        $btnSalvar->setText($this->translate("Alterar"));
        $btnSalvar->setTitle($this->translate("Salvar alteracoes"));
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

        $tipoConta = null;
        #select = tipo
        switch ($tipoField){
            case "D":
                $tipoConta = 'Debito';
                break;
            case "C":
                $tipoConta = 'Credito';
                break;

        }



        $tipo = new PRESTO_Components_Select('tipo');
        $tipo->setId("tipo");
        $tipo->setSelected( array("value"=>$tipoField, "text"=>"{$tipoConta}"));
        $tipo->setLabel($this->translate("Tipo"));

        $i[] = (array(
            ""=>"Selecione",
            "D"=>"Debito",
            "C"=>"Credito",
            ));
        $tipo->setOptions($i);
        $this->tipo = $tipo->addElement($tipo);




    }


}