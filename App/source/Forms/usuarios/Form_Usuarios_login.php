<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 18:03
 */

class Form_Usuarios_Login extends PRESTO_Forms
{

    public function __construct()
    {
        #titulo
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText($this->translate("Tela de Autenticacao"));
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



        #btnEntrar
        $btnEntrar = new PRESTO_Components_Buttons('btn-entrar');
        $btnEntrar->setId("btn-entrar");
        $btnEntrar->setType('submit');
        $btnEntrar->setClass("btn btn-success btn-sm");
        $btnEntrar->setText($this->translate("Entrar"));
        $btnEntrar->addElement($btnEntrar);
        $this->btnEntrar = $btnEntrar->addElement($btnEntrar);

        #$btnSair
        $btnSair = new PRESTO_Components_Buttons('btn-sair');
        $btnSair->setId("btn-sair");
        $btnSair->setType('button');
        $btnSair->setClass("btn btn-secondary btn-sm");
        $btnSair->setText($this->translate("Sair"));
        $btnSair->addElement($btnSair);
        $this->btnSair = $btnSair->addElement($btnSair);

    }


}