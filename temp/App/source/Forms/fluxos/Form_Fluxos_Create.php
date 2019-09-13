<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 18:03
 */

class Form_Fluxos_Create extends PRESTO_Forms
{

    public function __construct()
    {
        #tituloFluxos
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText($this->translate("Adicionar Fluxos"));
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

        #inputText = codigo
        $codigo = new PRESTO_Components_InputText('codigo');
        $codigo->setId("codigo");
        $codigo->setLabel($this->translate("Codigo"));
        $this->codigo = $codigo->addElement($codigo);

        #inputText = descricao
        $descricao = new PRESTO_Components_InputText('descricao');
        $descricao->setId("descricao");
        $descricao->setLabel($this->translate("Fluxo"));
        $this->descricao = $descricao->addElement($descricao);

        #select = tipo
        $tipo = new PRESTO_Components_Select('tipo');
        $tipo->setId("tipo");
        $tipo->setLabel($this->translate("Tipo"));

        $i[] = (array(
            "D"=>"Debito",
            "C"=>"Credito",
            ));


        $tipo->setOptions($i);

        $this->tipo = $tipo->addElement($tipo);
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