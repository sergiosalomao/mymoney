<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 17:07
 */

class PRESTO_Components_Select implements PRESTO_Components_Interface

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
    private $options;
    private $selected = null;

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

    public function setOptions(array $options)
    {
        $this->options = $options;

    }

    public function setSelected(array $selected)
    {

        $this->selected = $selected;

    }


    public function addElement($obj)
    {
        $html = null;
        $html .= "<div class='form-group'>";

        $html .= "<label for='$obj->id'  $this->hidden>{$obj->label}</label>";

        $html .= "<select style='{$obj->styles}'";
        $html .= "id='{$obj->id}' type='text'";
        $html .= "class='form-control form-control-sm {$obj->class}'";
        $html .= "id='$obj->id}'";
        $html .= "name='{$obj->name}'";
        $html .= "placeholder='{$obj->placeholder}'";
        $html .= "title='{$obj->title}'";
        $html .= "type='{$obj->title}'";
        $html .= "$this->hidden>";

        $selected = '';
        foreach ($obj->options as $option) {
            foreach ($option as $key => $o) {
                if ($this->selected != null)
                    if ($key == $this->selected['value'])
                        $selected = 'selected';
                    else
                        $selected = '';

                $html .= "<option value='{$key}' $selected>{$o}</option>";
            }

        }


        $html .= "</select>";
        $html .= "</div>";

        return $html;

    }

}