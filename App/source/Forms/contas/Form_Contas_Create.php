<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 18:03
 */

class Form_Contas_Create extends PRESTO_Forms
{

    public function __construct()
    {
        #tituloContas
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText($this->translate("Adicionar Contas"));
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

        #inputText = agencia
        $agencia = new PRESTO_Components_InputText('agencia');
        $agencia->setId("agencia");
        $agencia->setLabel($this->translate("agencia."));
        $this->agencia = $agencia->addElement($agencia);

        #inputText = conta
        $conta = new PRESTO_Components_InputText('conta');
        $conta->setId("conta");
        $conta->setLabel($this->translate("Conta"));
        $this->conta = $conta->addElement($conta);

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

        #select = tipo
        $tipo = new PRESTO_Components_Select('tipo');
        $tipo->setId("chave");
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