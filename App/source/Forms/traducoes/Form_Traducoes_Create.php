<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 18:03
 */

class Form_Traducoes_Create extends PRESTO_Forms
{

    public function __construct()
    {

        #tituloEntidade
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText($this->translate("Adicionar traducao"));
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
        $id->setvalue('default');
        $this->id = $id->addElement($id);

        #inputText = descricao
        $descricao = new PRESTO_Components_InputText('descricao');
        $descricao->setId("descricao");
        $descricao->setTitle($this->translate("Digite a traducao"));
        $descricao->setLabel($this->translate("Digite a traducao"));
        $this->descricao = $descricao->addElement($descricao);

        #inputText = chave
        $chave = new PRESTO_Components_InputText('chave');
        $chave->setId("chave");
        $chave->setTitle($this->translate("Chave"));
        $chave->setLabel($this->translate("Descricao"));
        $this->chave = $chave->addElement($chave);

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

        #select = idioma
        $idioma = new PRESTO_Components_Select('idioma_id');
        $idioma->setId("chave");
        $idioma->setLabel($this->translate("Idioma"));


        $dados = $idiomaTable = new IdiomasTable();

        $i[] = (array(""=>"Selecione"));

        foreach ($dados->getAll() as $field){
            $i[] = array(
                "{$field['id']}"=>$field['descricao'] );
        }
        $idioma->setOptions($i);

        $this->idioma = $idioma->addElement($idioma);
    }
}