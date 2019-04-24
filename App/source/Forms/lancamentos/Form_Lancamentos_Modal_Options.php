<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 18:03
 */

class Form_Lancamentos_Modal_Options extends PRESTO_Forms
{

    public function __construct()

    {
        #titulo
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText($this->translate("Novo Lancamento"));
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

        #tituloModal
        $tituloModal = new PRESTO_Components_Title('titulo');
        $tituloModal->setText($this->translate("Lancamento"));
        $tituloModal->setStyles(array(
                "font-size" => "18px",
                "color" => "dimgrey",
                "height" => "40px",
                "padding" => "6px",
                "margin-bottom" => "8px",
                "border-radius" => "5px",
                )
        );
        $this->tituloModal = $tituloModal->addElement($tituloModal);


        #btnEditar
        $btnEditar = new PRESTO_Components_Buttons('btn-edit');
        $btnEditar->setId("btn-editar");
        $btnEditar->setType('button');
        $btnEditar->setClass("btn btn-primary btn-sm");
        $btnEditar->setText($this->translate("Editar"));
        $btnEditar->setTitle($this->translate("Editar registro"));
        $btnEditar->addElement($btnEditar);
        $this->btnEditar = $btnEditar->addElement($btnEditar);

        #btnDeletar
        $btnDeletar = new PRESTO_Components_Buttons('btn-deletar');
        $btnDeletar->setId("btn-deletar");
        $btnDeletar->setType('button');
        $btnDeletar->setClass("btn btn-danger btn-sm");
        $btnDeletar->setText($this->translate("Deletar"));
        $btnDeletar->setTitle($this->translate("Deletar registro"));
        $btnDeletar->addElement($btnDeletar);
        $this->btnDeletar = $btnDeletar->addElement($btnDeletar);

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