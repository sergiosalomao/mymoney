<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 18:03
 */

class Form_Traducoes_Edit extends PRESTO_Forms
{

    public function __construct()
    {
        #procura pelo ID
        $entidadesTable = new TraducoesTable();
        $id = (isset($_GET['id']) ? $_GET['id'] : '');
        $selecionado = $entidadesTable->getAll(array("where" => "id = {$id}"));

        #passa valores dos campos encontrados
        $idField = (isset($selecionado[0]['id']) ? trim($selecionado[0]['id']) : '');
        $nomeField = (isset($selecionado[0]['chave']) ? trim($selecionado[0]['chave']) : '');
        $descricaoField = (isset($selecionado[0]['descricao']) ? trim($selecionado[0]['descricao']) : '');


        #tituloEntidade
        $titulo = new PRESTO_Components_Title('titulo_entidade_edit');
        $titulo->setText($this->translate("Alterar Entidades"));
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

        #inputText = chave
        $chave = new PRESTO_Components_InputText('chave');
        $chave->setId("chave");
        $chave->setValue($nomeField);
        $chave->setTitle($this->translate('Digite a chave'));
        $chave->setLabel($this->translate('Nome da Chave'));
        $this->chave = $chave->addElement($chave);

        #inputText = descricao
        $descricao = new PRESTO_Components_InputText('descricao');
        $descricao->setId("descricao");
        $descricao->setValue($descricaoField);
        $descricao->setTitle($this->translate('Digite a descricao'));
        $descricao->setLabel($this->translate('Descricao'));
        $this->descricao = $chave->addElement($descricao);


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