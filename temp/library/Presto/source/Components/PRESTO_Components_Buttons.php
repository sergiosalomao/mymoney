<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 23/03/2019
 * Time: 14:07
 */

class PRESTO_Components_Buttons implements PRESTO_Components_Interface
{

    #properties
    private $id;
    private $name;
    private $styles;
    private $class;
    private $title;

    private $text;
    private $type;

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

    public function setText($text)
    {
        return $this->text = $text;
    }
    public function setType($type)
    {
        return $this->type = $type;
    }

    public function addElement($obj)
    {
        return $html = "<button 
        id='{$obj->id}'
       
        type='{$obj->type}'
        class='{$obj->class}'
        title='{$obj->title}'>
        {$obj->text} 
        </button>";
    }

}