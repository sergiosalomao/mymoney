<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 20:18
 */

class PRESTO_Components_InputSearch implements PRESTO_Components_Interface
{
    #properties
    private $id;
    private $name;
    private $styles;
    private $class;
    private $title;

    private $label;
    private $placeholder;
    private $hidden;
    private $method;
    private $value;
    private $action;


    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        return $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStyles()
    {
        return $this->styles;
    }

    public function setStyles($styles)
    {
        $this->styles = $styles;
        $style = null;
        foreach ($this->styles as $key => $value) {
            $style .= $key . ':' . $value . ';';
        }
        return $this->styles = $style;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function setClass($class)
    {
        $this->class = $class;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setLabel($label)
    {
        return $this->label = $label;
    }

    public function setPlaceHolder($placeholder)
    {
        return $this->placeholder = $placeholder;
    }

    public function setHidden($hidden)
    {
        if ($hidden == 'true') $this->hidden = 'hidden';
        return $this->hidden;
    }

    public function setMethod($method)
    {
        return $this->method = $method;
    }

    public function setValue($value)
    {
        return $this->value = $value;
    }

    public function setAction($action)
    {
        return $this->action = $action;
    }


    public function addElement($obj)
    {
        $html = null;
        $html .= "<form class='form-inline'";
        $html .= "action='{$obj->action}' method='{$obj->method}'>";
        $html .= "<div class='input-group input-group-sm mr-sm-3'>";
        $html .= "<label for='{$obj->styles}'  $this->hidden>{$obj->label}</label>&nbsp";
        $html .= "<input id='{$obj->styles}'";
        $html .= "style='{$obj->styles}' type='text'";
        $html .= "name='{$obj->name}'";
        $html .= "class='{$obj->class}'";
        $html .= "placeholder='{$obj->placeholder}'";
        $html .= "title='{$obj->title}'>";
        $html .= "</div>";
        $html .= "<button class='btn btn-outline-success my-2 my-sm-0 btn-sm'";
        $html .= "type='submit'>";
        $html .= "{$obj->label}";
        $html .= "</button>";
        $html .= "</form>";
        return $html;
    }


}