<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 18:03
 */

class Form_Bancos_Edit extends PRESTO_Forms
{

    public function __construct()
    {
        #procura pelo ID
        $BancosTable = new BancosTable();

        $id = (isset($_GET['id']) ? $_GET['id'] : '');
        $selecionado = $BancosTable->getAll(array("where" => "id = {$id}"));

        #passa valores dos campos encontrados
        $idField = (isset($selecionado[0]['id']) ? trim($selecionado[0]['id']) : '');
        $descricaoField = (isset($selecionado[0]['descricao']) ? trim($selecionado[0]['descricao']) : '');
        $numeroField = (isset($selecionado[0]['numero']) ? trim($selecionado[0]['numero']) : '');


        #tituloBancos
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText($this->translate("Alterar BancosTable"));
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

        #inputText = BancosTable
        $id = new PRESTO_Components_InputText('id');
        $id->setId("id");
        $id->setHidden(true);
        $id->setvalue($idField);
        $this->id = $id->addElement($id);

        #inputText = descricao
        $descricao = new PRESTO_Components_InputText('descricao');
        $descricao->setId("descricao");
        $descricao->setValue($descricaoField);

        $descricao->setLabel($this->translate("Nome do Bancos"));
        $this->descricao = $descricao->addElement($descricao);

        #inputText = numero
        $numero = new PRESTO_Components_InputText('numero');
        $numero->setId("numero");
        $numero->setValue($numeroField);
        $numero->setLabel($this->translate("Nro."));
        $this->numero = $numero->addElement($numero);


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

    }


}