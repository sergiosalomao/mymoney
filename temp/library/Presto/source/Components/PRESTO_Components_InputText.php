<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 17:07
 */

class PRESTO_Components_InputText implements PRESTO_Components_Interface

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
    private $value;

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


    public function setValue($value)
    {
        return $this->value = $value;
    }
    public function setHidden($hidden)
    {
        if ($hidden == 'true') $this->hidden = 'hidden';
        return $this->hidden;
    }

      public function setLabel($label)
    {
        return $this->label = $label;
    }

    public function setPlaceHolder($placeholder)
    {
        return $this->placeholder = $placeholder;
    }

    public function addElement($obj)
    {
        $html = null;
        $html.= "<div class='form-group'>";

        $html.= "<label for='$obj->id'  $this->hidden>{$obj->label}</label>";

        $html.= "<input style='{$obj->styles}'";
        $html.= "id='{$obj->id}' type='text'";
        $html.= "class='form-control form-control-sm {$obj->class}'";
        $html.= "id='$obj->id}'";
        $html.= "name='{$obj->name}'";
        $html.= "value='{$obj->value}'";
        $html.= "placeholder='{$obj->placeholder}'";
        $html.= "title='{$obj->title}'";
        $html.= "$this->hidden>";

        $html.= "</div>";

        return $html;

    }

}