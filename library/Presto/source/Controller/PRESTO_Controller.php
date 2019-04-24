<?php

class PRESTO_Controller implements PRESTO_Forms_Controller
{
    protected $_controller;
    protected $_method;
    protected $_params;
    protected $_layout;
    protected $_layoutCssPathFile;
    protected $_view;
    protected $_translate;
    protected $_language_id;


    public function __construct()
    {

        $this->_translate = new TranslateService();
        $this->_language_id = $this->_translate->getLanguage();
    }

    public function translate($text){
        $this->_translate = new TranslateService();
        return $this->_translate->getTranslateKey($text);
    }


    public function getLayoutCssPathFile()
    {
        return $this->_layoutCssPathFile;
    }

    public function setLayoutCssFile($cssPathFile)
    {
        $this->_layoutCssPathFile = $cssPathFile;

    }

    public function getParams()
    {
        return $this->_params;
    }

    public function setParams($params)
    {
        $this->_params = $params;
    }

    public function getParamsPost(){
       $this->getParams();
       return $this->_params['post'];
    }

    public function getParamsGet(){
        $this->getParams();
        return $this->_params['get'];
    }


    public function setController($controller)
    {
        $control = explode("Controller", $controller);
        $this->_controller = strtolower($control[0]);
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function setMethod($method)
    {
        $this->_method = $method;
        $this->_view = $method[0];
    }

    public function getMethod()
    {
        return $this->_method;
    }

    public function setView($view)
    {
        $this->_view = $view;
    }

    public function getView()
    {
        return $this->_view;
    }

    public function getLayout()
    {


        $pathLayout = "../App/source/Views/layouts/";
        if (($this->_layout == NULL))
            return require_once "{$pathLayout}default/layout.phtml";
        #se for diferente de noLayout seta o padrao
        if ($this->_layout != 'noLayout') {

            if (file_exists($pathLayout . $this->_layout . '/layout.phtml'))
                return require_once "{$pathLayout}{$this->_layout}/layout.phtml";
            else
                die("layout not found {$pathLayout}{$this->_layout}/layout.phtml");
        }
    }

    public function setLayout($layout)
    {
        $this->_layout = $layout;
        $this->_layoutCssPathFile = "../../App/source/Views/layouts/{$this->_layout}/{$this->_layout}.css";
    }

    public function noLayout()
    {
        $this->_layout = 'noLayout';
    }


    public function parts($partFileName, $type = null)
    {
        if ($type != 'layout') {
            $pathParts = '../App/source/Views/' . $this->_controller . '/parts/';
            if (file_exists($pathParts . $partFileName . '.phtml'))
                return require_once "{$pathParts}{$partFileName}.phtml";
            else
                die("Parts not found:  {$pathParts}{$partFileName}.phtml");
        }

        if ($type == 'layout') {
            $pathParts = '../App/source/Views/layouts/' . $this->_layout . '/parts/';
            if (file_exists($pathParts . $partFileName . '.phtml'))
                return require_once "{$pathParts}{$partFileName}.phtml";
            else
                die("Parts not found:  {$pathParts}{$partFileName}.phtml");
        }
    }

    public function render($view)
    {
        $this->getLayout();
        $this->_view = $view;
        $pathView = "../App/source/Views/";

        if (file_exists("{$pathView}{$this->_controller}/{$this->_view}/{$this->_view}.phtml")) {
            return require_once "{$pathView}{$this->_controller}/{$this->_view}/{$this->_view}.phtml";
        } else
            die("View not found:  {$pathView}{$this->_controller}/{$this->_view}/{$this->_view}.phtml");
    }

}