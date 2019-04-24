<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 18:03
 */

class Form_Entidades_Edit extends PRESTO_Forms
{

    public function __construct()
    {
        #procura pelo ID
        $entidadesTable = new EntidadesTable();

        $id = (isset($_GET['id']) ? $_GET['id'] : '');
        $selecionado = $entidadesTable->getAll(array("where" => "id = {$id}"));

        #passa valores dos campos encontrados
        $idField = (isset($selecionado[0]['id']) ? trim($selecionado[0]['id']) : '');
        $nomeField = (isset($selecionado[0]['nome']) ? trim($selecionado[0]['nome']) : '');


        #tituloEntidade
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText($this->translate("Alterar Entidade"));
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

        #inputText = entidade
        $id = new PRESTO_Components_InputText('id');
        $id->setId("id");
        $id->setHidden(true);
        $id->setvalue($idField);
        $this->id = $id->addElement($id);

        #inputText = nome
        $nome = new PRESTO_Components_InputText('nome');
        $nome->setId("nome");
        $nome->setValue($nomeField);
        $nome->setTitle($this->translate("Digite o nome da entidade"));
        $nome->setLabel($this->translate("Nome da entidade"));
        $this->nome = $nome->addElement($nome);


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