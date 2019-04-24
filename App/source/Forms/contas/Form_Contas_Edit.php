<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 18:03
 */

class Form_Contas_Edit extends PRESTO_Forms
{

    public function __construct()
    {
        #procura pelo ID
        $ContasTable = new ContasTable();

        $id = (isset($_GET['id']) ? $_GET['id'] : '');
        $selecionado = $ContasTable->getAll(array("where" => "id = {$id}"));

        #passa valores dos campos encontrados
        $idField = (isset($selecionado[0]['id']) ? trim($selecionado[0]['id']) : '');
        $agenciaField = (isset($selecionado[0]['agencia']) ? trim($selecionado[0]['agencia']) : '');
        $contaField = (isset($selecionado[0]['conta']) ? trim($selecionado[0]['conta']) : '');
        $tipoField = (isset($selecionado[0]['tipo']) ? trim($selecionado[0]['tipo']) : '');
        $banco_idField = (isset($selecionado[0]['banco_id']) ? trim($selecionado[0]['banco_id']) : '');


        #tituloContas
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText($this->translate("Alterar Conta"));
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

        #inputText = ContasTable
        $id = new PRESTO_Components_InputText('id');
        $id->setId("id");
        $id->setHidden(true);
        $id->setvalue($idField);
        $this->id = $id->addElement($id);

        #inputText = agencia
        $agencia = new PRESTO_Components_InputText('agencia');
        $agencia->setId("agencia");
        $agencia->setValue($agenciaField);
        $agencia->setLabel($this->translate("Nome do Contas"));
        $this->agencia = $agencia->addElement($agencia);

        #inputText = conta
        $conta = new PRESTO_Components_InputText('conta');
        $conta->setId("conta");
        $conta->setValue($contaField);
        $conta->setLabel($this->translate("Conta."));
        $this->conta = $conta->addElement($conta);


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


        #select = tipo
        switch ($tipoField){
            case "C":
                $tipoConta = 'Corrente';
                break;
            case "P":
                $tipoConta = 'Poupanca';
                break;
            case "CA":
                $tipoConta = 'Carteira';
                break;
        }

        $tipo = new PRESTO_Components_Select('tipo');
        $tipo->setId("tipo");
        $tipo->setSelected( array("value"=>$tipoField, "text"=>"{$tipoConta}"));
        $tipo->setLabel($this->translate("Tipo"));

        $i[] = (array(
            ""=>"Selecione",
            "C"=>"Corrente",
            "P"=>"Poupança",
            "CA"=>"Carteira"));
        $tipo->setOptions($i);
        $this->tipo = $tipo->addElement($tipo);


        #select = banco
        $banco_id = new PRESTO_Components_Select('banco_id');
        $banco_id->setId("banco_id");
        $banco_id->setLabel($this->translate("Banco"));
        $banco_id->setSelected( array("value"=>$banco_idField, "text"=>$banco_idField));


        $dados = $bancosTable = new BancosTable();

        $j[] = (array(""=>"Selecione"));

        foreach ($dados->getAll() as $field){
            $j[] = array(
                "{$field['id']}"=>$field['descricao'] );
        }
        $banco_id->setOptions($j);

        $this->banco_id = $banco_id->addElement($banco_id);


    }


}