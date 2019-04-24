<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 23/03/2019
 * Time: 11:56
 */

class Form_Lancamentos_List extends PRESTO_Forms
{
    public function __construct()
    {

        #tituloLancamentos
        $titulo = new PRESTO_Components_Title('titulo');
        $titulo->setText( $this->translate("Lancamentos"));
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
        $input_search->setPlaceHolder($this->translate("Localizar por descricao "));
        $input_search->setLabel($this->translate("Localizar"));
        $input_search->setMethod('post');
        $input_search->setClass('form-control');
        $input_search->setAction(APP_PATH . "/lancamentos/");
        $this->inputSearch = $input_search->addElement($input_search);

        #pagination
        $pagination = new PRESTO_Components_Pagination('pagination');
        $pagination->setLineOffset(10);
        $pagination->setTotalRecords((new LancamentosTable())->getTotalRecords(['count']));
        $pagination->setLineLimit(10);
        $pagination->setTitle($this->translate("Lista de paginas"));
        $pagination->addElement($pagination);
        $this->pagination = $pagination->addElement($pagination);

        #btnAdd
        $btnAdd = new PRESTO_Components_Buttons('btn-add');
        $btnAdd->setId("btn-add");
        $btnAdd->setType('button');
        $btnAdd->setClass("btn btn-primary btn-sm");
        $btnAdd->setText($this->translate("Novo Lancamento"));
        $btnAdd->addElement($btnAdd);
        $this->btnAdd = $btnAdd->addElement($btnAdd);


    }


}