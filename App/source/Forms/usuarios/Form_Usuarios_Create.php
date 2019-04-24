<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 18:03
 */

class Form_Usuarios_Create extends PRESTO_Forms
{

    public function __construct()
    {
        #tituloEntidade
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText($this->translate("Adicionar Usuarios"));
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

        #inputText = nome
        $nome = new PRESTO_Components_InputText('nome');
        $nome->setId("nome");
        $nome->setLabel($this->translate("Nome"));
        $this->nome = $nome->addElement($nome);

        #inputText = email
        $email = new PRESTO_Components_InputText('email');
        $email->setId("email");
        $email->setLabel($this->translate("Email"));
        $this->email = $email->addElement($email);

        #inputText = senha
        $senha = new PRESTO_Components_InputText('senha');
        $senha->setId("senha");
        $senha->setLabel($this->translate("Senha"));
        $this->senha = $senha->addElement($senha);

        #inputText = senhaConfirma
        $senha_confirma = new PRESTO_Components_InputText('senha_confirma');
        $senha_confirma->setId("senha_confirma");
        $senha_confirma->setLabel($this->translate("Confirma senha"));
        $this->senha_confirma = $senha_confirma->addElement($senha_confirma);

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