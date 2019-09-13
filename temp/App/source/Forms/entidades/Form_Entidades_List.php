<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 23/03/2019
 * Time: 11:56
 */

class Form_Entidades_List extends PRESTO_Forms
{
    public function __construct()
    {

        #tituloEntidade
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText( $this->translate("Lista de Entidades"));
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

        #inputSearch
        $input_search = new PRESTO_Components_inputSearch('input_search');
        $input_search->setId("search");
        $input_search->setPlaceHolder($this->translate("Localizar por nome"));
        $input_search->setLabel($this->translate("Localizar"));
        $input_search->setMethod('post');
        $input_search->setClass('form-control');
        $input_search->setTitle($this->translate("Digite o nome da entidade"));
        $input_search->setAction(APP_PATH . "/entidades/");
        $this->inputSearch = $input_search->addElement($input_search);

        #pagination
        $pagination = new PRESTO_Components_Pagination('pagination');
        $pagination->setLineOffset(10);
        $pagination->setTotalRecords((new EntidadesTable())->getTotalRecords(['count']));
        $pagination->setLineLimit(10);
        $pagination->setTitle($this->translate("Lista de paginas"));
        $pagination->addElement($pagination);
        $this->pagination = $pagination->addElement($pagination);

        #btnAdd
        $btnAdd = new PRESTO_Components_Buttons('btn-add');
        $btnAdd->setId("btn-add");
        $btnAdd->setType('button');
        $btnAdd->setClass("btn btn-primary btn-sm");
        $btnAdd->setText($this->translate("Adicionar Nova Entidade"));
        $btnAdd->setTitle($this->translate("Adicionar nova entidade"));
        $btnAdd->addElement($btnAdd);
        $this->btnAdd = $btnAdd->addElement($btnAdd);


    }


}