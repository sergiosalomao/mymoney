<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 11:45
 */

class PRESTO_Components_Pagination implements PRESTO_Components_Interface
{

    #properties
    private $id;
    private $name;
    private $styles;
    private $class;
    private $title;

    private $repository;
    private $lineLimit;
    private $lineOffset;
    private $totalRecords;
    private $pages;


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


    public function setRepository($table)
    {
        return $this->repository = $table;
    }

    public function setLineLimit($lines)
    {
        $this->lineLimit = $lines;
    }

    public function setLineOffset($lines)
    {
        $this->lineOffset = $lines;
    }


    public function setTotalRecords($totalRecords)
    {
        $this->totalRecords = (int)$totalRecords['count'];
    }

    public function addElement($obj)
    {

        $this->pages = $this->totalRecords / $this->lineLimit;

        $rest = $this->totalRecords % $this->lineLimit;

        if ($rest == 0) $this->pages--;


        $prev = 0;
        if (isset($_GET['page']) && ($_GET['page'] > 0))
            $prev = $_GET['page'] - 1;

        $next = $this->pages;
        if (isset($_GET['page']) && $_GET['page'] < $this->pages)
            $next = $_GET['page'] + 1;


        $html = null;


        $html .= "<nav aria-label='Page navigation' title='{$obj->title}'>";
        $html .= "<ul class='pagination justify-content-center {$obj->class}'>";


        $html .= "<li class='page-item '><a class='page-link' href='?page=$prev&offset=$this->lineOffset&limit=$this->lineLimit''>&laquo;</a></li>";

        for ($i = 0; $i <= $this->pages; $i++) {
            $html .= "<li class='page-item'><a class='page-link' href='?page=$i&offset=$this->lineOffset&limit=$this->lineLimit'  >$i</a></li>";
        }


        $html .= "<li class='page-item ' ><a class='page-link' href='?page=$next&offset=$this->lineOffset&limit=$this->lineLimit''>&raquo;</a></li>";
        $html .= "</ul>";
        $html .= "</nav>";
        return $html;
    }

}